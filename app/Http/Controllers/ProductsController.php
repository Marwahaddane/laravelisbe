<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view("admin.products.index",compact("products"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view("admin.products.create",compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:100|unique:products",
            "description"=>"required",
            "price"=>"numeric|required",
            "photo1"=>"image|required|mimes:jpeg,png,jpg,gif|max:2048",
            "photo2"=>"image|required|max:2048|mimes:jpeg,png,jpg,gif",
            "category_id"=>"required"


        ]);
        $inputs=$request->all();

        if($photo1=$request->file("photo1")){
            $newfile1= time().".".$photo1->getClientOriginalExtension();
            $photo1->move('images/products/',$newfile1);
            $inputs['photo1']=$newfile1;
        }
        if($photo2=$request->file("photo2")){
            $newfile2= time().time().".".$photo2->getClientOriginalExtension();
            $photo2->move('images/products/',$newfile2);
            $inputs['photo2']=$newfile2;
        }


        Product::create($inputs);
        return redirect()->route('products.index')->with("message","Un nouveau produit est ajouté avec succés");
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        return view("admin.products.edit",compact("product","categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            "name" => "required|max:100",
            "description"=>"required",
            "price"=>"numeric",
            "photo1"=>"image|mimes:jpeg,png,jpg,gif|max:2048",
            "photo2"=>"image|max:2048|mimes:jpeg,png,jpg,gif",
            "category_id"=>"required"


        ]);

        $inputs=$request->all();

        if($photo1=$request->file("photo1")){
            $newfile1= time().".".$photo1->getClientOriginalExtension();
            if(file_exists("images/products/".$product->photo1)){
            unlink("images/products/".$product->photo1);
            }
            $photo1->move('images/products/',$newfile1);
            $inputs['photo1']=$newfile1;
        }
        if($photo2=$request->file("photo2")){
            if(file_exists("images/products/".$product->photo2)){
                unlink("images/products/".$product->photo2);
            }
            $newfile2= time().time().".".$photo2->getClientOriginalExtension();
            $photo2->move('images/products/',$newfile2);
            $inputs['photo2']=$newfile2;
        }

        $product->update($inputs);
        return redirect()->route('products.index')->with("message","le produit est modifié avec succés");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if(file_exists("images/products/".$product->photo1)){
            unlink("images/products/".$product->photo1);
        }
        if(file_exists("images/products/".$product->photo2)){
            unlink("images/products/".$product->photo2);
        }
        $product->delete();
        return  redirect()->route("products.index")->with("message","Un produit est supprimé avec succés");

    }
}
