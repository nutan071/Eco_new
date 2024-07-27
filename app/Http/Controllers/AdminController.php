<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Products;

class AdminController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('Admin.dashboard', compact('products'));
    }

}

