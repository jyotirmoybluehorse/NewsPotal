<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\BreakingNews;

class BreakingnewsController extends Controller{
    public function index(){
        $user = Auth::user();
        $items=BreakingNews::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.breaking-news.index',compact('items','user'));
    }
    public function add(){
      $user = Auth::user();
      return view('admin.breaking-news.add',compact('user'));
    }
    public function save(Request $request){
        $errMsgs = [
            'name.required' => 'Please Enter Breaking News Title',
        ];
        $validation_expression = [
            'name' => ['required', 'max:190'],
        ];
        $validator = Validator::make($request->all(), $validation_expression, $errMsgs);
        if(!$validator->fails()):
            $data = $validator->validate();
            if($request->time){
                $data['time'] = $request->time;
            }
            $item = BreakingNews::create($data);
            if($item):
                return redirect()->route('admin.breaking-news.view')->with('success','successfully created!');
            endif;
            return redirect()->back()->with('error','can\'t create, please try again!')->withInput();
        else:
            return redirect()->back()->withErrors($validator->errors())->withInput();
        endif;
    }
    public function edit($id){
      $user = Auth::user();
      $item = BreakingNews::find($id);
      return view('admin.breaking-news.edit', compact('item','user'));
    }
    public function update($id, Request $request){
        $errMsgs = [
            'name.required' => 'Please Enter Breaking News Title',
        ];
        $validation_expression = [
            'name' => ['required', 'max:190'],
        ];
        $validator = Validator::make($request->all(), $validation_expression, $errMsgs);
        if(!$validator->fails()):
            $data = $validator->validate();
            if($request->time){
                $data['time'] = $request->time;
            }
            $item = BreakingNews::find($id)->update($data);
            if($item):
                return redirect()->route('admin.breaking-news.view')->with('success','News successfully updated!');
            endif;
            return redirect()->back()->with('error','Not updated, please try again!')->withInput();
        else:
            return redirect()->back()->withErrors($validator->errors())->withInput();
        endif;
    }
    public function delete($uid){
        $item = BreakingNews::where('id', $uid)->first();
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
