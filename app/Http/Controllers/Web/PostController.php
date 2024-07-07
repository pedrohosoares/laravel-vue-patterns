<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PostController extends Controller{
    
    public function show(string $slug) : View
    {
        $data['slug'] = $slug;
        return view('posts.show',$data);
    }

}