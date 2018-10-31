<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        return view('admin.products.index', compact('products'));

    }
    public function create(){
        $product = new Product();
        return view ('admin.products.create', compact('product'));
    }

    public function store(Request $request){
        //dd($request->all());

        //Validate the form 
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'image|required',
        ]);

        //Upload the image 
        if($request->hasFile('image')){
            $image = $request->image;
            $image->move('uploads', $image->getClientOriginalName());
        }

        //Save the data into database
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $request->image->getClientOriginalName()
            
        ]);

        //Session message
        $request->session()->flash('msg', 'Your product has been added');

        //Redirect
        return redirect('products/create');
    }
    
    //Edit Product 
    public function edit($id){
        $product = Product::find($id);

        return view('admin.products.edit', compact('product'));
    }

    //Update Image 
    public function update(Request $request, $id){

        //find  the product
        $product = Product::find($id);

        //Validate the form
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            
        ]);

        //Check if there is any image
        if($request->hasFile('image')){
            //Check if there's an old image in the folder
            if(file_exists(public_path('uploads/').$product->image)){
                unlink(public_path('uploads/') . $product->image);
            }

            //upload new image
            $image = $request->image;
            $image->move('uploads', $image->getClientOriginalName());

            $product->image = $request->image->getClientOriginalName();

        }

        //Update the product
        $product->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'image'=>$product->image,
        ]);

        //Store the message in session 
        $request->session()->flash('msg', 'Product has been updated');

        //Redirect back
        return redirect('/products');

    }

    public function show($id){
        //return $id;
        $product = Product::find($id);
        return view('admin.products.details', compact('product'));
    }

    //Delete Product
    public function destroy($id){
        Product::destroy($id);

        //Store message
        session()->flash('msg', 'Product has been deleted');

        //Redirect
        return redirect('/products');
    }

    
}
