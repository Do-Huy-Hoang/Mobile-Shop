<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdcutAddRequest;
use App\Product;
use App\ProductImage;
use App\View\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use App\View\Components\Recursive;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $product;
    private $recursive;
    private $productImage;
    public function __construct(Product $product, Recursive $recursive, ProductImage $productImage){
        $this->product = $product;
        $this->recursive = $recursive;
        $this->productImage = $productImage;
    }
    public function index(Request $request){
        if ($request->search != null){
            $products = $this->product::where('name','like', '%'.$request->search.'%')->latest()->paginate(5);
        }else{
            $products = $this->product->latest()->paginate(5);
        }
        return view('Admin.product.index', compact('products'));
    }

    public function create(){
        $htmlOptions = $this->recursive->categoryRecursive();
        return view('Admin.product.add', compact('htmlOptions'));
    }

    public function store(ProdcutAddRequest $request){
        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'category_id'=> $request->category_id
            ];
            $dataUploadImage = $this->storageTraitUpload($request, 'feature_img_path', 'product');
            if (!empty($dataUploadImage)){
                $dataProductCreate['feature_img_name'] = $dataUploadImage['file_name'];
                $dataProductCreate['feature_img_path'] = $dataUploadImage['file_path'];
            }
            $product = $this->product::create($dataProductCreate);
            //Insert data to product_images
            if ($request->hasFile('img_path')){
                foreach ($request->img_path as $item){
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($item,'productImg');
                    $product->images()->create([
                        'product_id' => $product->id,
                        'img_path' => $dataProductImageDetail['file_path'],
                        'img_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('product.index')->with('toast_success','Product Created Successfully!');;
        }catch (\Exception $exception){
            DB::rollBack();
             Log::channel('daily')->error('Message: '.$exception->getMessage().' Line :'.$exception->getLine());
            return redirect()->route('product.index')->with('toast_error','Product Created Error !');
        }
    }

    public function edit($id, Recursive $recursive){
        $product = $this->product->find($id);
        $htmlOptions = $this->recursive->categoryRecursiveEdit($product->category_id);
        return view('Admin.product.edit', compact('htmlOptions', 'product'));
    }

    public function update($id, Request $request){
        try {
            DB::beginTransaction();
            $dataProductUpdate= [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'category_id'=> $request->category_id
            ];
            if ($request->feature_img_path != ''){
                Storage::disk('public')->delete('product/'.$this->product::find($id)->feature_img_name);
            }
            $dataUploadImage = $this->storageTraitUpload($request, 'feature_img_path', 'product');
            if (!empty($dataUploadImage)){
                $dataProductUpdate['feature_img_name'] = $dataUploadImage['file_name'];
                $dataProductUpdate['feature_img_path'] = $dataUploadImage['file_path'];
            }
            $product = $this->product::find($id)->update($dataProductUpdate);
            $product = $this->product::find($id);
            //Insert data to product_images
            if ($request->hasFile('img_path')){
                foreach ($this->productImage::where('product_id', $id)->get() as $item){
                    Storage::disk('public')->delete('productImg/'.$item->img_name);
                }
                $this->productImage::where('product_id', $id)->delete();
                foreach ($request->img_path as $item){
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($item,'productImg');
                    $product->images()->create([
                        'product_id' => $product->id,
                        'img_path' => $dataProductImageDetail['file_path'],
                        'img_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('product.index')->with('toast_success','Product Updated Successfully!');;
        }catch (\Exception $exception){
            DB::rollBack();
             Log::channel('daily')->error('Message: '.$exception->getMessage().' Line :'.$exception->getLine());
            return redirect()->route('product.index')->with('toast_error','Product Updated Error !');
        }
    }

    public function delete($id){
        try {
            DB::beginTransaction();
            $this->product::find($id)->delete();
            DB::commit();
            return redirect()->route('product.index')->with('toast_success','Product Delete Successfully!');;
        }catch (\Exception $exception){
            DB::rollBack();
            Log::channel('daily')->error('Message: '.$exception->getMessage().' Line :'.$exception->getLine());
            return redirect()->route('product.index')->with('toast_error','Product Delete Error !');
        }
    }

    public function garbage_can(Request $request){
        if ($request->search != null){
            $products = $this->product::where('name','like', '%'.$request->search.'%')->latest()->paginate(5);
        }else{
            $products = $this->product::onlyTrashed()->latest()->paginate(5);
        }
        return view('Admin.product.GarbageCan', compact('products'));
    }

    public function un_trash($id){
        try {
            DB::beginTransaction();
            $product_untrash = $this->product::withTrashed()->find($id);
            $product_untrash->restore();
            DB::commit();
            return redirect()->route('product-trash')->with('toast_success','Product successfully restored!');;
        }catch (\Exception $exception){
            DB::rollBack();
            Log::channel('daily')->error('Message: '.$exception->getMessage().' Line :'.$exception->getLine());
            return redirect()->route('product-trash')->with('toast_error','Product error restored!');
        }
    }

    public function permanently_deleted($id){;
        try {
            DB::beginTransaction();
            if ($this->productImage::where('product_id', $id) != ''){
                foreach ($this->productImage::where('product_id', $id)->get() as $item){
                    Storage::disk('public')->delete('productImg/'.$item->img_name);
                }
                $this->productImage::where('product_id', $id)->delete();

            }
            Storage::disk('public')->delete('product/'.$this->product::withTrashed()->find($id)->feature_img_name);
            $product_permanently_deleted = $this->product::withTrashed()->find($id);
            $product_permanently_deleted->forceDelete();
            DB::commit();
            return redirect()->route('product-trash')->with('toast_success','The product has been successfully deleted permanently!');;
        }catch (\Exception $exception){
            DB::rollBack();
            Log::channel('daily')->error('Message: '.$exception->getMessage().' Line :'.$exception->getLine());
            return redirect()->route('product-trash')->with('toast_error','The product has been error deleted permanently');
        }
    }
}
