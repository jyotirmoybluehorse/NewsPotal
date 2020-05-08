<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ExtraController;
use App\Models\Contact;

class ContactController extends Controller{
    public function index(){
        $user = Auth::user();
        $items=Contact::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.contact.index',compact('items','user'));
    }
    public function delete($uid){
        $item = Contact::where('id', $uid)->first();
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
