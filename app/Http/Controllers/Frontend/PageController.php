<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ExtraController;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\News;
use App\Models\Subscribe;
use App\Models\AdvertisementRequest;
use Illuminate\Support\Facades\Crypt;


class PageController extends Controller{
    public function index(){
        return view('front-end.home');
    }
    public function category($category_name,$id){
        $category=$category_name;
        $dct_id = Crypt::decrypt($id);
        $items=News::where('ref_category',$dct_id)->orderBy('created_at', 'desc')->with(['refCategory','refComment'])->paginate(5);
        return view('front-end.category',compact('category','items'));
    }
    public function NewsDetails($name,$id){
        $name=$name;
        $dct_id = Crypt::decrypt($id);
        $item=News::where('id',$dct_id)->with(['refCategory'])->first();
        if($item !=null):
            return view('front-end.news-details',compact('name','item'));
        else:
            return view('front-end.404');
        endif;
    }
    public function contact(){
        return view('front-end.contact');
    }
    public function contactMessage(Request $request){
        $errMsgs = [
            'name.required' => 'Please enter Your Name',
            'email.required' => 'Please Select Your Email',
            'phone.required' => 'Please Enter Your Contact Number',
            'comment.required' => 'Please Select Your Message'
        ];
        $validation_expression = [
            'name' => ['required', 'max:190'],
            'email' => ['required','email', 'max:190'],
            'phone' => ['required','min:10'],
            'comment' => ['required']
        ];
        $validator = Validator::make($request->all(), $validation_expression, $errMsgs);
        if(!$validator->fails()):
            $data = $validator->validate();
            $item = Contact::create($data);
            if($item):
                return redirect()->back()->with('success','Your Message Succesfully Send!');
            endif;
            return redirect()->back()->with('error','can\'t send, please try again!')->withInput();
        else:
            return redirect()->back()->withErrors($validator->errors())->withInput();
        endif;
    }
    public function Advertisement(){
        return view('front-end.advertisement');
    }
    public function AdvertisementRequest(Request $request){
        $errMsgs = [
            'name.required' => 'Please enter Your Name',
            'email.required' => 'Please Select Your Email',
            'phone.required' => 'Please Enter Your Contact Number',
            'comment.required' => 'Please Select Your Message'
        ];
        $validation_expression = [
            'name' => ['required', 'max:190'],
            'email' => ['required','email', 'max:190'],
            'phone' => ['required','min:10'],
            'comment' => ['required']
        ];
        $validator = Validator::make($request->all(), $validation_expression, $errMsgs);
        if(!$validator->fails()):
            $data = $validator->validate();
            $item = AdvertisementRequest::create($data);
            if($item):
                return redirect()->back()->with('success','Your Message Succesfully Send!');
            endif;
            return redirect()->back()->with('error','can\'t send, please try again!')->withInput();
        else:
            return redirect()->back()->withErrors($validator->errors())->withInput();
        endif;
    }
    public function about(){
        return view('front-end.about');
    }
    public function comment(Request $request,$id){
        $errMsgs = [
            'name.required' => 'Please enter Your Name',
            'email.required' => 'Please Select Your Email',
            'phone.required' => 'Please Enter Your Contact Number',
            'comment.required' => 'Please Select Your Message'
        ];
        $validation_expression = [
            'name' => ['required', 'max:190'],
            'email' => ['required', 'max:190','email'],
            'phone' => ['required','min:10'],
            'comment' => ['required']
        ];
        $validator = Validator::make($request->all(), $validation_expression, $errMsgs);
        if(!$validator->fails()):
            $data = $validator->validate();
            $data['ref_news'] = $id;
            $item = Comment::create($data);
            if($item):
                return redirect()->back()->with('success','Your Message Succesfully Send!');
            endif;
            return redirect()->back()->with('error','can\'t send, please try again!')->withInput();
        else:
            return redirect()->back()->withErrors($validator->errors())->withInput();
        endif;
    }
    public function subscribe(Request $request){
        $errMsgs = [
            'email.required' => 'Please Select Your Email'
        ];
        $validation_expression = [
            'email' => ['required', 'max:190','email','unique:subscribers']
        ];
        $validator = Validator::make($request->all(), $validation_expression, $errMsgs);
        if(!$validator->fails()):
            $data = $validator->validate();
            $item = Subscribe::create($data);
            if($item):
                return redirect()->back()->with('success','Thanks For Subscribe Us!');
            endif;
            return redirect()->back()->with('error','can\'t subscribe, please try again!')->withInput();
        else:
            return redirect()->back()->withErrors($validator->errors())->withInput();
        endif;
    }
}
