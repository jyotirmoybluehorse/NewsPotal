<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ExtraController;
use App\Models\AimindiaPhoto;

class AimindiaimageController extends Controller{
    public function index(){
        $user = Auth::user();
        $items=AimindiaPhoto::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.aim-india-image.index',compact('items','user'));
    }
    public function add(){
      $user = Auth::user();
      return view('admin.aim-india-image.add',compact('user'));
    }
    public function save(Request $request){
        $errMsgs = [
            'photo.required' => 'Please Submit Your Image'
        ];
        $validation_expression = [
            'photo' => ['required', 'mimes:jpeg,jpg,png','max:20000']
        ];
        $validator = Validator::make($request->all(), $validation_expression, $errMsgs);
        if(!$validator->fails()):
            $data = $validator->validate();
            $data['photo'] = ExtraController::savePhoto($request->photo);
            $item = AimindiaPhoto::create($data);
            if($item):
                return redirect()->route('admin.aim-india-image.view')->with('success','successfully created!');
            endif;
            return redirect()->back()->with('error','can\'t create, please try again!')->withInput();
        else:
            return redirect()->back()->withErrors($validator->errors())->withInput();
        endif;
    }
    public function edit($id){
      $user = Auth::user();
      $item = AimindiaPhoto::find($id);
      return view('admin.aim-india-image.edit', compact('item','user'));
    }
    public function update($id, Request $request){
        $errMsgs = [
            'photo.required' => 'Please Submit Your Image'
        ];
        $validation_expression = [
            'photo' => ['required', 'mimes:jpeg,jpg,png','max:20000']
        ];
        $validator = Validator::make($request->all(), $validation_expression, $errMsgs);
        if(!$validator->fails()):
            $data = $validator->validate();
            $data['photo'] = ExtraController::savePhoto($request->photo);

            $item = AimindiaPhoto::find($id)->update($data);
            if($item):
                return redirect()->route('admin.aim-india-image.view')->with('success','successfully updated!');
            endif;
            return redirect()->back()->with('error','Not updated, please try again!')->withInput();
        else:
            return redirect()->back()->withErrors($validator->errors())->withInput();
        endif;
    }
    public function delete($uid){
        $item = AimindiaPhoto::where('id', $uid)->first();
        if($item):
            if($item->delete()):
                return redirect()->back()->with('success','Successfully Deleted!');
            else:
                return redirect()->back()->with('error','Can\'t Deleted Anyway, Please try again!');
            endif;
        endif;
        return redirect()->back()->with('error','Item Not Found!');
    }
}
