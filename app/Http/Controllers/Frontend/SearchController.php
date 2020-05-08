<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ExtraController;
use App\Models\Category;
use App\Models\Contact;
use App\Models\News;
use Illuminate\Support\Facades\Crypt;


class SearchController extends Controller{
    public function index(Request $request){
        $qe=$request->qe;
        $items=News::where(function($query) use ($qe) {
            $query->where('name', 'like', '%' . $qe . '%')
            ->orWhere('autor','like', '%' . $qe . '%')
            ->orWhere('description', 'like', '%' . $qe . '%');
            })->orWhereHas('refCategory', function($query) use ($qe){
                $query->Where('name', 'like', '%' . $qe . '%');
            })->orderBy('created_at', 'desc')->orderBy('name')->with(['refCategory','refComment'])->paginate(5);
            return view('front-end.search',compact('qe','items'));
    }
}
