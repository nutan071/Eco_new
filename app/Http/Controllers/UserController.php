<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Products;
class UserController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('User.dashboard', compact('products'));
    }
}
