<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Sliders;
use App\View\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdminSliderController extends Controller
{
    use StorageImageTrait;
    private $slider;
    public function  __construct(Sliders $slider){
        $this->slider = $slider;
    }

    public function index(){
        $sliders= $this->slider->paginate(5);
        return view('Admin.slider.index', compact('sliders'));
    }

    public function create(){
        return view('Admin.slider.add');
    }

    public function store(SliderAddRequest $request){
        try {
            DB::beginTransaction();
            $dataSliderCreate = [
              'name'=> $request->name,
              'description' => $request->description
            ];
            $dataSliderImg = $this->storageTraitUpload($request,'image_path','slider');
            if (!empty($dataSliderImg)){
                $dataSliderCreate['image_path'] = $dataSliderImg['file_path'];
                $dataSliderCreate['image_name'] = $dataSliderImg['file_name'];
            }
            $this->slider::create($dataSliderCreate);
            DB::commit();
            return redirect()->route('slider.index')->with('toast_success','Sliders Created Successfully!');;
        }catch(\Exception $exception){
            DB::rollBack();
             Log::channel('daily')->error('Message: '.$exception->getMessage().' Line :'.$exception->getLine());
            return redirect()->route('slider.index')->with('toast_error','Sliders Created Error !');
        }
    }

    public function edit($id){
        $editSlider= $this->slider::find($id);
        return view('Admin.slider.edit', compact('editSlider'));
    }

    public function update($id,SliderAddRequest $request){
        try {
            DB::beginTransaction();
            $dataSliderUpdate = [
                'name'=> $request->name,
                'description' => $request->description
            ];
            if ($request->image_path != ''){
                Storage::disk('public')->delete('slider/'.$this->slider::find($id)->image_name);
            }
            $dataSliderImg = $this->storageTraitUpload($request,'image_path','slider');
            if (!empty($dataSliderImg)){
                $dataSliderUpdate['image_path'] = $dataSliderImg['file_path'];
                $dataSliderUpdate['image_name'] = $dataSliderImg['file_name'];
            }
            $this->slider::find($id)->update($dataSliderUpdate);
            DB::commit();
            return redirect()->route('slider.index')->with('toast_success','Sliders Updated Successfully!');;
        }catch (\Exception $exception){
            DB::rollBack();
             Log::channel('daily')->error('Message: '.$exception->getMessage().' Line :'.$exception->getLine());
            return redirect()->route('slider.index')->with('toast_error','Sliders Updated Error !');
        }
    }
    public function delete($id){
        try {
            DB::beginTransaction();
            Storage::disk('public')->delete('slider/'.$this->slider::find($id)->image_name);
            $this->slider::find($id)->delete();
            DB::commit();
            return redirect()->route('slider.index')->with('toast_success', 'The slider deleted Successfully!');;
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::channel('daily')->error('Message: ' . $exception->getMessage() . ' Line :' . $exception->getLine());
            return redirect()->route('slider.index')->with('toast_error', 'The slider deleted error');
        }
    }
}
