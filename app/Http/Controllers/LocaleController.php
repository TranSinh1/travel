<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function language($language)
    {
    	\Session::put('website_language', $language);

    	return redirect()->back();
    }
}
