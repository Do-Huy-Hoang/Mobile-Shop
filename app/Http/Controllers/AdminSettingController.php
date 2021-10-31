<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingAddRequest;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminSettingController extends Controller
{
    private $settings;
    public function __construct(Settings $settings){
        $this->settings = $settings;
    }

    public function index(){
        $setting = $this->settings->paginate(5);
        return view('Admin.setting.index', compact('setting'));
    }

    public function create(){
        return view('Admin.setting.add');
    }

    public function store(SettingAddRequest $request){
        try {
            DB::beginTransaction();
                $this->settings::create([
                    'config_key' => $request->config_key,
                    'config_value' => $request->config_value,
                    'type' => $request->type
                ]);
            DB::commit();
            return redirect()->route('setting.index')->with('toast_success','Settings Created Successfully!');;
        }catch (\Exception $exception){
            DB::rollBack();
             Log::channel('daily')->error('Message: '.$exception->getMessage().' Line :'.$exception->getLine());
            return redirect()->route('setting.index')->with('toast_error','Settings Created Error !');
        }
    }

    public function edit($id){
            $setting = $this->settings::find($id);
            return view('Admin.setting.edit', compact('setting'));
    }

    public function update(Request $request, $id){
        try {
            DB::beginTransaction();
            $this->settings::find($id)->update([
                'config_key' => $request->config_key,
                'config_value' => $request->config_value
            ]);
            DB::commit();
            return redirect()->route('setting.index')->with('toast_success','Settings Updated Successfully!');
        }catch (\Exception $exception){
            DB::rollBack();
             Log::channel('daily')->error('Message: '.$exception->getMessage().' Line :'.$exception->getLine());
            return redirect()->route('setting.index')->with('toast_error','Settings Updated Error !');
        }
    }

    public function delete($id){
        try {
            DB::beginTransaction();
            $this->settings::find($id)->delete();
            DB::commit();
            return redirect()->route('setting.index')->with('toast_success', 'The setting deleted Successfully!');;
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::channel('daily')->error('Message: ' . $exception->getMessage() . ' Line :' . $exception->getLine());
            return redirect()->route('setting.index')->with('toast_error', 'The setting deleted error');
        }
    }
}
