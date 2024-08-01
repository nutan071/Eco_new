<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Products;
use DataTables;

class AdminController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('Admin.dashboard', compact('products'));
    }

    public function userdata()
    {
        if(\request()->ajax()){
            $data = User::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('Admin.user.table', compact('users'));
    }

}


