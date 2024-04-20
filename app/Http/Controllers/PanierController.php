<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function panier(){
        $products=[];
        if(session()->has("panier")){
            $products=session()->get("panier");
        }


        return view("website.panier",compact("products"));
    }
    public function delprodpanier($indice){
        $products=session()->get("panier");
        // dd($products);
        //ecraser uen variable
        //sup un produit du panier
     unset($products[$indice]);

     session()->put("panier",$products);
        return redirect()->back();
    }
    public function viderpanier(){
        session()->put("panier",[]);
        return redirect()->back();
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
if(!session()->has("panier")){
session()->put('panier',[]);
} else {
    //ajouter un produit dans la session
    session()->push('panier',['id'=>$id, "name"=>$name, "price"=>$price, "photo1"=>$photo1, "qty"=>$qty ]);
}

//ajouter un produit dans la session

    return redirect()->back()->with('success',"un nouveau produit est ajouté dans le panier ");
   }
}
