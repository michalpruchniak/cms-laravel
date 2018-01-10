<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard')
                ->with('post_count', Post::all()->count())
                ->with('users_count', User::all()->count())
                ->with('trashed_count', POST::onlyTrashed()->get()->count())
                ->with('categorys_count', Category::all()->count());
    }
}
