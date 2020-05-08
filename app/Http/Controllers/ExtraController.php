<?php
namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class ExtraController extends Controller{

    public static $is_demo = false;

    public static function isDemo(){

        return ExtraController::$is_demo;

    }

    public static function photoURL($file_name){
        if(ExtraController::$is_demo):
            $path = 'storage/app/public/uploads/'.$file_name;
            $image_url = asset($path);
        else:
            $image_path = 'storage/uploads/'.$file_name;
            $image_url = self::assetURL($image_path);
        endif;
        return $image_url;
    }

    public static function savePhoto($file, $index = false){
        $profile_photo_file_name = false;
        $response = false;
        if($file):
            $user = Auth::user();
            $profile_photo = $file;
            $file_ext = $profile_photo->extension();
            $current_timestamp = Carbon::now()->timestamp;
            $current_timestamp = $index?$current_timestamp."_".$index:$current_timestamp;
            $profile_photo_file_name = "img_".$user->id."_".$current_timestamp.".".$file_ext;
            $profile_photo->storeAs(
                'public/uploads/', $profile_photo_file_name
            );
            $response = $profile_photo_file_name;
        endif;
        return $response;
    }
    public static function saveVideo($file, $index = false){
        $profile_photo_file_name = false;
        $response = false;
        if($file):
            $user = Auth::user();
            $profile_photo = $file;
            $file_ext = $profile_photo->extension();
            $current_timestamp = Carbon::now()->timestamp;
            $current_timestamp = $index?$current_timestamp."_".$index:$current_timestamp;
            $profile_photo_file_name = "video_".$user->id."_".$current_timestamp.".".$file_ext;
            $profile_photo->storeAs(
                'public/uploads/', $profile_photo_file_name
            );
            $response = $profile_photo_file_name;
        endif;
        return $response;
    }
   public static function assetURL($path){

        if(ExtraController::$is_demo):

            $path = "public/".$path;

        endif;

        return asset($path);

    }

}
