<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;

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
            // pr($products);
            return view('Admin.dashboard', compact('products'));
        }


    public function exportProducts()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

        public function productdata()
            {
                if (request()->ajax()) {
                    $data = Products::select('id', 'name', 'description', 'price', 'quantity', 'image_url')->get();
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
                if(request()->ajax()){
                    $data = User::select('name', 'email')->get();
                    return DataTables::of($data)
                        ->addIndexColumn()

                        ->make(true);
                }
                return view('Admin.user.table');
            }

            public function wishlistdata()
            {

                if(request()->ajax()){

                    $data = Wishlist::select('user_id', 'product_id','created_at')->get();

                    return DataTables::of($data)
                        ->addIndexColumn()

                        ->make(true);
                }
                return view('Admin.wishlist.table');
            }

            public function create()
            {
                return view('Admin.products.create');
            }

            public function store(Request $request)
            {
                $request->validate([
                    'name' => 'required|string|max:255',
                    'description' => 'required|string',
                    'price' => 'required|numeric',
                    'quantity' => 'required|integer',
                    'image_url' => 'required|url',
                ]);

                Products::create([
                    'name' => $request->name,
                    'description' => $request->description,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                    'image_url' => $request->image_url,
                ]);

                return redirect()->route('Admin.products.table')->with('success', 'Product added successfully!');
            }





            public function orderdata()
            {
                $orders = order::all();
                return view('Admin.order.table',compact('orders'));
                $users = User::all();
                return view('Admin.user.table', compact('users'));


                if(request()->ajax()){

                    $data = Order::select('user_id', 'product_id','created_at')->get();

                    return DataTables::of($data)
                        ->addIndexColumn()

                        ->make(true);
                }
                return view('Admin.order.table');


            }


}




// <?php

// if (!function_exists('greet_user')) {
//     function greet_user($name)
//     {
//         return "Hello, " . ucfirst($name);
//     }
// }

// if (!function_exists('format_price')) {
//     function format_price($price)
//     {
//         return '$' . number_format($price, 2);
//     }
// }


// "autoload": {
//     "files": [
//         "app/Helpers/custom_helpers.php"
//     ],
//     "psr-4": {
//         "App\\": "app/"
//     }
// },


// composer dump-autoload


// public function show($name)
// {
//     $greeting = greet_user($name);
//     $price = format_price(1234.56);

//     return view('welcome', compact('greeting', 'price'));
// }
// <p>{{ greet_user('john') }}</p>
// <p>Price: {{ format_price(1234.56) }}</p>


// "autoload": {
//     "files": [
//         "app/Helpers/custom_helpers.php",
//         "app/Helpers/other_helpers.php"
//     ],
//     "psr-4": {
//         "App\\": "app/"
//     }
// },
// <?php

// if (!function_exists('die_and_print')) {
//     /**
//      * Print data and terminate the script.
//      *
//      * @param mixed $data
//      * @return void
//      */
//     function die_and_print($data)
//     {
//         echo '<pre>';
//         print_r($data);
//         echo '</pre>';
//         die();
//     }
// }

// if (!function_exists('printr')) {
//     /**
//      * Print data without terminating the script.
//      *
//      * @param mixed $data
//      * @return void
//      */
//     function printr($data)
//     {
//         echo '<pre>';
//         print_r($data);
//         echo '</pre>';
//     }
// }
// "autoload": {
//     "files": [
//         "app/Helpers/custom_helpers.php"
//     ],
//     "psr-4": {
//         "App\\": "app/"
//     }
// },
// // In a controller or any part of your application
// public function someFunction()
// {
//     $data = ['name' => 'John', 'age' => 30];

//     // Use die_and_print to output data and terminate
//     die_and_print($data);

//     // Use printr to output data without terminating
//     printr($data);
// }
