<?php
namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ExtraController;

class NewsController extends Controller{
    public function index(){
        $user = Auth::user();
        $items=News::orderBy('created_at', 'desc')->with(['refCategory'])->paginate(10);
        return view('admin.news.index',compact('items','user'));
    }
    public function add(){
      $user = Auth::user();
      $categories=Category::get();
      return view('admin.news.add',compact('user','categories'));
    }
    public function save(Request $request){
        $errMsgs = [
            'name.required' => 'Please enter News Title',
            'ref_category.required' => 'Please Select News Category',
            'description.required' => 'Please Enter News Description',
            'feature.required' => 'Please Select Top feature tab',
            'top.required' => 'Please Select Top bar tab'
        ];
        $validation_expression = [
            'name' => ['required', 'max:190'],
            'ref_category' => ['required'],
            'description' => ['required'],
            'feature' => ['required'],
            'top' => ['required']
        ];
        $validator = Validator::make($request->all(), $validation_expression, $errMsgs);
        if(!$validator->fails()):
            $data = $validator->validate();
            if($request->photo){
                $data['photo'] = ExtraController::savePhoto($request->photo);
            }
            if($request->image_caption){
                $data['image_caption'] = $request->image_caption;
            }
            if($request->date){
                $data['date'] = $request->date;
            }
            if($request->autor){
                $data['autor'] = $request->autor;
            }
            $item = News::create($data);
            if($item):
                return redirect()->route('admin.news.view')->with('success','successfully created!');
            endif;
            return redirect()->back()->with('error','can\'t create, please try again!')->withInput();
        else:
            return redirect()->back()->withErrors($validator->errors())->withInput();
        endif;
    }
    public function edit($id){
      $user = Auth::user();
      $categories=Category::get();
      $item = News::find($id);
      return view('admin.news.edit', compact('item','user','categories'));
    }
    public function update($id, Request $request){
        $errMsgs = [
            'name.required' => 'Please enter News Title',
            'ref_category.required' => 'Please Select News Category',
            'description.required' => 'Please Enter News Description',
            'feature.required' => 'Please Select Top feature tab',
            'top.required' => 'Please Select Top bar tab'
        ];
        $validation_expression = [
            'name' => ['required', 'max:190'],
            'ref_category' => ['required'],
            'description' => ['required'],
            'feature' => ['required'],
            'top' => ['required']
        ];
        $validator = Validator::make($request->all(), $validation_expression, $errMsgs);
        if(!$validator->fails()):
            $data = $validator->validate();
            if($request->photo){
                $data['photo'] = ExtraController::savePhoto($request->photo);
            }
            if($request->image_caption){
                $data['image_caption'] = $request->image_caption;
            }
            if($request->date){
                $data['date'] = $request->date;
            }
            if($request->autor){
                $data['autor'] = $request->autor;
            }
            $item = News::find($id)->update($data);
            if($item):
                return redirect()->route('admin.news.view')->with('success','News successfully updated!');
            endif;
            return redirect()->back()->with('error','Not updated, please try again!')->withInput();
        else:
            return redirect()->back()->withErrors($validator->errors())->withInput();
        endif;
    }
    public function delete($uid){
        $item = News::where('id', $uid)->first();
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
