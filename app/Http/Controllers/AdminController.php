<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Products;
use App\Models\User;
// use DataTables;

class AdminController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('Admin.dashboard', compact('products'));
    }

    public function userdata()
    {
        $users = User::all();
        return view('Admin.user.table', compact('users'));
    }

}


