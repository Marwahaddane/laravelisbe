<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function panier(){
        $products=session()->get("panier");
        return view("website.panier",compact("products"));
    }
   public function  addToCart(Request $request){
    //recup les informations du produit
    $id=$request->id;
    $name=$request->name;
    $photo1=$request->photo1;
    $price=$request->price;
    $qty=$request->qty;

// verifier si la varibale panier existe dans la session ou pas
//sinon on l'initialise
if(session()->has("panier")){
session()->put('panier',[]);
}

//ajouter un produit dans la session
    session()->push('panier',["id"=>$id,"name"=>$name,"photo1"=>$photo1,"price"=>$price,"qty"=>$qty]);

    return redirect()->back()->with('success',"un nouveau produit est ajouté dans le panier ");
   }
}
