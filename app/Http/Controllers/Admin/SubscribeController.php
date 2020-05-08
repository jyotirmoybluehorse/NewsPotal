<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ExtraController;
use App\Models\Subscribe;

class SubscribeController extends Controller{
    public function index(){
        $user = Auth::user();
        $items=Subscribe::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.subscriber.index',compact('items','user'));
    }
}
