<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ExtraController;
use App\Models\Content;

class ContentController extends Controller{
    public function index(){
        $user = Auth::user();
        $item=Content::first();
        return view('admin.content.edit',compact('item','user'));
    }
    public function update(Request $request){
        $errMsgs = [
            'about.required' => 'Please enter About',
            'footer_about.required' => 'Please enter Footer About',
            'address.required' => 'Please enter Address',
            'email.required' => 'Please enter Mail Address'
        ];
        $validation_expression = [
            'about' => ['required'],
            'footer_about' => ['required'],
            'address' => ['required'],
            'email' => ['required']
        ];
        $validator = Validator::make($request->all(), $validation_expression, $errMsgs);
        if(!$validator->fails()):
            $data = $validator->validate();
            if($request->logo){
                $data['logo'] = ExtraController::savePhoto($request->logo);
            }
            if($request->facebook){
                $data['facebook'] = $request->facebook;
            }
            if($request->twiter){
                $data['twiter'] = $request->twiter;
            }
            if($request->google){
                $data['google'] = $request->google;
            }
            if($request->linkdin){
                $data['linkdin'] = $request->linkdin;
            }
            $item = Content::first()->update($data);
            if($item):
                return redirect()->back()->with('success','Content successfully updated!');
            endif;
            return redirect()->back()->with('error','Not updated, please try again!')->withInput();
        else:
            return redirect()->back()->withErrors($validator->errors())->withInput();
        endif;
    }
}
