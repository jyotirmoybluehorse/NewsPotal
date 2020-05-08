<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ExtraController;
use App\Models\SocialVideo;

class SocialvideoController extends Controller{
    public function index(){
        $user = Auth::user();
        $items=SocialVideo::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.social-video.index',compact('items','user'));
    }
    public function add(){
      $user = Auth::user();
      return view('admin.social-video.add',compact('user'));
    }
    public function save(Request $request){
        $errMsgs = [
            'video.required' => 'Please Submit Your Video'
        ];
        $validation_expression = [
            'video' => ['required', 'mimes:mp4,mov,ogg','max:20000']
        ];
        $validator = Validator::make($request->all(), $validation_expression, $errMsgs);
        if(!$validator->fails()):
            $data = $validator->validate();
            $data['video'] = ExtraController::saveVideo($request->video);
            if($request->caption){
                $data['caption'] = $request->caption;
            }
            if($request->date){
                $data['date'] = $request->date;
            }
            $item = SocialVideo::create($data);
            if($item):
                return redirect()->route('admin.social-video.view')->with('success','successfully created!');
            endif;
            return redirect()->back()->with('error','can\'t create, please try again!')->withInput();
        else:
            return redirect()->back()->withErrors($validator->errors())->withInput();
        endif;
    }
    public function edit($id){
      $user = Auth::user();
      $item = SocialVideo::find($id);
      return view('admin.social-video.edit', compact('item','user'));
    }
    public function update($id, Request $request){
        $errMsgs = [

        ];
        $validation_expression = [

        ];
        $validator = Validator::make($request->all(), $validation_expression, $errMsgs);
        if(!$validator->fails()):
            $data = $validator->validate();
            if($request->video){
            $data['video'] = ExtraController::saveVideo($request->video);
            }
            if($request->caption){
                $data['caption'] = $request->caption;
            }
            if($request->date){
                $data['date'] = $request->date;
            }
            $item = SocialVideo::find($id)->update($data);
            if($item):
                return redirect()->route('admin.social-video.view')->with('success','Social Video successfully updated!');
            endif;
            return redirect()->back()->with('error','Not updated, please try again!')->withInput();
        else:
            return redirect()->back()->withErrors($validator->errors())->withInput();
        endif;
    }
    public function delete($uid){
        $item = SocialVideo::where('id', $uid)->first();
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
