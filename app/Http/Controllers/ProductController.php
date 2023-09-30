<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth', ['except' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        // $products = Product::all();
        // dd($products);
        return view('elements.products.index')->with('products', $products);
        // Retornar vista inyectando todos los usuarios

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('role_id','1' or 'role_id','2')->get();
        $categories = Category::all();
        return view('elements.products.create')->with('categories',$categories)
                                            ->with('users',$users);
        // Retornar la vista elements.products.create
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = new Product;

        $product->name = $request->name;
        $product->description = $request->description;
        $product->brand = $request->brand;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->slide = $request->slide;
        $product->section = $request->section;
        if($request->hasFile('image')){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/products/'), $file);
            $product->image = 'images/products/'.$file;
        }
        $product->category_id = $request->category_id;
        

        if($product->save()){
            return redirect('products')->with('message', 'El producto: '.$product->name.' fue creado con éxito!!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('elements.products.show')->with('product',$product);
        // Retornar la vista
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $users = User::where('role_id','1' or 'role_id','2')->get();
        $categories = Category::all();
        return view('elements.products.edit')->with('product',$product)
                                            ->with('categories',$categories)
                                            ->with('users',$users);
        //Retorna la vista con el formulario de edición del usuario 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->brand = $request->brand;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->slide = $request->slide;
        $product->section = $request->section;
        if($request->hasFile('image')){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/products/'), $file);
            $product->image = 'images/products/'.$file;
        }
        $product->category_id = $request->category_id;

        if($product->save()){
            return redirect('products')->with('message', 'El producto: '.$product->name.' fue actualizadp con éxito!!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $file = public_path().'/'.$product->image;
        if (getimagesize($file) && $product->image != 'images/no-image.png') {
            unlink($file);
        }

        if($product->delete()){
            return redirect('products')->with('message', 'El producto: '.$product->name.' fue eliminado con éxito!!');
        }
    }
}