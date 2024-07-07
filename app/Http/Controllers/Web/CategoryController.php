<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function show(int $id) : View
    {
        $data['id'] = $id;
        return view('categories.show',$data);
    }
}
