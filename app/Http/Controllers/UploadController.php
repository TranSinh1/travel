<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function nameAvatar($img)
    {
        $name = $img->getClientOriginalName();
        $avatar_name = str_random(10)."_".$name;

        while (file_exists("upload/avatar/".$avatar_name))
        {
            $avatar_name = str_random(10)."_".$name;
        }

        return $avatar_name;
    }

    public function uploadAvatar($img, $avatar)
    {
    		$img->move("upload/avatar", $avatar);
    }
}
