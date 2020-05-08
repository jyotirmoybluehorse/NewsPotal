<?php
namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller{
    public function index(){
        $user = Auth::user();
        $items=Category::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.category.index',compact('items','user'));
    }
    public function add(){
      $user = Auth::user();
        return view('admin.category.add',compact('user'));
    }
    public function save(Request $request){
        $errMsgs = [
            'name.required' => 'Please enter Category Name',
        ];
        $validation_expression = [
            'name' => ['required', 'max:190']
        ];
        $validator = Validator::make($request->all(), $validation_expression, $errMsgs);
        if(!$validator->fails()):
            $data = $validator->validate();
                $item = Category::create($data);
            if($item):
                return redirect()->route('admin.category.view')->with('success','successfully created!');
            endif;
            return redirect()->back()->with('error','can\'t create, please try again!')->withInput();
        else:
            return redirect()->back()->withErrors($validator->errors())->withInput();
        endif;
    }
    public function edit($id){
      $user = Auth::user();
        $item = Category::find($id);
        return view('admin.category.edit', compact('item','user'));
    }
    public function update($id, Request $request){
        $errMsgs = [
            'name.required' => 'Please enter Title',
        ];
        $validation_expression = [
            'name' => ['required', 'max:190']
        ];
        $validator = Validator::make($request->all(), $validation_expression, $errMsgs);
        if(!$validator->fails()):
            $data = $validator->validate();
            $item = Category::find($id)->update($data);
            if($item):
                return redirect()->route('admin.category.view')->with('success','Category successfully updated!');
            endif;
            return redirect()->back()->with('error','Not updated, please try again!')->withInput();
        else:
            return redirect()->back()->withErrors($validator->errors())->withInput();
        endif;
    }
    public function delete($uid){
        $item = Category::where('id', $uid)->first();
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
