<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ThemeController extends Controller
{
    //

    public function themeColorSkin($color){

        $lifetime = time() + 60 * 60 * 24 * 365; // one year

        if($color == 'purple'){
            Cookie::queue('color_skin',$color, $lifetime);
        }elseif($color == 'blue'){
            Cookie::queue('color_skin',$color, $lifetime);
        }elseif($color == 'cyan'){
            Cookie::queue('color_skin',$color, $lifetime);
        }elseif($color == 'green'){
            Cookie::queue('color_skin',$color, $lifetime);
        }elseif($color == 'orange'){
            Cookie::queue('color_skin',$color, $lifetime);
        }elseif($color == 'blush'){
            Cookie::queue('color_skin',$color, $lifetime);
        }

        return redirect()->back()->with([
            'success' => 'color skin changed successfully'
        ]);
    }
}
