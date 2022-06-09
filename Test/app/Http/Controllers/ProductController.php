<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $data['title'] = 'Product List';
        $data['products'] = Product::all();

        return view ('products', $data);
    }
}
