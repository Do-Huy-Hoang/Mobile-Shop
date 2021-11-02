<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryAddRequets;
use App\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Category;
use App\View\Components\Recursive;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class AdminCategoryController extends Controller
{

    private $category;
    private $product;
    private $recursive;

    public function __construct(Category $category, Product $product, Recursive $recursive)
    {
        $this->category = $category;
        $this->product = $product;
        $this->recursive = $recursive;
    }

    public function index(Request $request)
    {
        if ($request->search != null) {
            $category = $this->category::where('name', 'like', '%' . $request->search . '%')->latest()->paginate(5);
        } else {
            $category = $this->category->latest()->paginate(5);
        }
        return view('Admin.category.index', compact('category'));
    }

    public function create()
    {
        $htmlOptions = $this->recursive->categoryRecursive();
        return view('Admin.category.add', compact('htmlOptions'));
    }

    public function store(CategoryAddRequets $request)
    {
        try {
            DB::beginTransaction();
            $this->category->create([
                'name' => $request->name,
                'id_parent' => $request->id_parent
            ]);
            DB::commit();
            return redirect()->route('category.index')->with('toast_success', 'Category Created Successfully!');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::channel('daily')->error('Message: ' . $exception->getMessage() . ' Line :' . $exception->getLine());
            return redirect()->route('category.index')->with('toast_error', 'Category Created Error !');
        }
    }

    public function edit($id, Recursive $recursive)
    {
        $category = $this->category::find($id);
        $htmlOptions = $this->recursive->categoryRecursiveEdit($category->id_parent, 0, '');
        return view('Admin.category.edit', compact('category', 'htmlOptions'));
    }

    public function update($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $this->category::find($id)->update([
                'name' => $request->name,
                'id_parent' => $request->id_parent
            ]);
            Db::commit();
            return redirect()->route('category.index')->with('toast_success', 'Category Updated Successfully!');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::channel('daily')->error('Message: ' . $exception->getMessage() . ' Line :' . $exception->getLine());
            return redirect()->route('category.index')->with('toast_error', 'Category Updated Error !');
        }
    }

    public function delete($id)
    {
        $check_category = '';
        $check_product = '';
        $product_childent = $this->product::where('category_id', $id)->get();
        $category_childent = $this->category::where('id_parent', $id)->get();
        foreach ($category_childent as $item){
            $check_category = $item;
        }
        foreach ($product_childent as $item){
            $check_product = $item;
        }

        if ( $check_category != '') {
            return redirect()->route('category.index')->with('toast_error', 'There are still sub-items that cannot be deleted!');
        } else {
            if ($check_product != ''){
                return redirect()->route('category.index')->with('toast_error', 'This category still has many products that cannot be deleted');
            }else {
                try {
                    DB::beginTransaction();
                    $this->category::find($id)->delete();
                    DB::commit();
                    return redirect()->route('category.index')->with('toast_success', 'Category Delete Successfully!');
                } catch (\Exception $exception) {
                    DB::rollBack();
                    Log::channel('daily')->error('Message: ' . $exception->getMessage() . ' Line :' . $exception->getLine());
                    return redirect()->route('category.index')->with('toast_error', 'Category Delete Error !');
                }
            }
        }
    }

    public function garbage_can(Request $request)
    {
        if ($request->search != null) {
            $category = $this->category::onlyTrashed()->where('name', 'like', '%' . $request->search . '%')->latest()->paginate(5);
        } else {
            $category = $this->category::onlyTrashed()->latest()->paginate(5);
        }
        return view('Admin.category.GarbageCan', compact('category'));
    }

    public function un_trash($id)
    {
        try {
            DB::beginTransaction();
            $category_untrash = $this->category::withTrashed()->find($id);
            $category_untrash->restore();
            DB::commit();
            return redirect()->route('category-trash')->with('toast_success', 'Category successfully restored!');;
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::channel('daily')->error('Message: ' . $exception->getMessage() . ' Line :' . $exception->getLine());
            return redirect()->route('category-trash')->with('toast_error', 'Category error restored!');
        }
    }

    public function permanently_deleted($id)
    {
        try {
            DB::beginTransaction();
            $category_permanently_deleted = $this->category::withTrashed()->find($id);
            $category_permanently_deleted->forceDelete();
            DB::commit();
            return redirect()->route('category-trash')->with('toast_success', 'The category has been successfully deleted permanently!');;
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::channel('daily')->error('Message: ' . $exception->getMessage() . ' Line :' . $exception->getLine());
            return redirect()->route('category-trash')->with('toast_error', 'The category has been error deleted permanently');
        }
    }
}
