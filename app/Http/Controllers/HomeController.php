<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['welcome','filter']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role->name == 'Admin'){
            return view('dashboard-admin');
        }else if(Auth::user()->role->name == 'Seller'){
            return view('dashboard-seller');
        }else if(Auth::user()->role->name == 'Client'){
            return view('dashboard-client');
        }
    }

        /**
     * Show the welcome page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('welcome')->with('products',$products)
                            ->with('categories', $categories);

    }

    public function filter(Request $request){
        if($request->category_id >= 0){
            $products = Product::where('category_id',$request->category_id)->get();
            $categories = Category::where('id',$request->category_id)->get();

        }else{
            $products = Product::all();
            $categories = Category::all();
        }

        return view('filter')->with('products',$products)
                            ->with('categories', $categories);
    }
}
