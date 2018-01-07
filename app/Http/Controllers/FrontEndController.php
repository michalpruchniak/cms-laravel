<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        return view('welcome')
                ->with('title', Setting::first()->site_name)
                ->with('categories', Category::take(5)->get())
                ->with('first_post', Post::orderBy('created_at', 'desc')->first())
                ->with('second_post', POST::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
                ->with('third_post', POST::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
                ->with('frontend', Category::find(7))
                ->with('backend', Category::find(8))
                ->with('wordpress', Category::find(9))
                ->with('settings', Setting::first());
    }
}
