<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Products;
use DataTables;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\order;

// use DataTables;

class AdminController extends Controller
{
        public function index()
        {
            $products = Products::all();
            return view('Admin.dashboard', compact('products'));
        }

        public function productdata()
        {
            if (request()->ajax()) {
                $data = Products::select('name', 'description', 'price', 'quantity', 'image_url')->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a>
                                      <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('Admin.products.table');
        }



    public function userdata()
    {
        if(\request()->ajax()){
            $data = User::select('name', 'email')->get();
            return DataTables::of($data)
                ->addIndexColumn()

                ->make(true);
        }
        return view('Admin.user.table');
    }

    public function wishlistdata()
    {
    
        if(\request()->ajax()){
         
            $data = Wishlist::select('user_id', 'product_id')->get();
            return DataTables::of($data)
                ->addIndexColumn()

                ->make(true);
        }
        return view('Admin.wishlist.table');
    }

    public function orderdata()
    {
        $orders = order::all();
        return view('Admin.order.table',compact('orders'));
        $users = User::all();
        return view('Admin.user.table', compact('users'));
    }

}




