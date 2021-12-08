<?php

namespace App\Http\Controllers;
 
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {   
        
        return view('cart.cart');
    }

    public function addToCart($id)
    {
        $cartItems=session()->get('cartItems',[]); 

        $product=Product::findOrFail($id);

        if( isset($cartItems[$id] ) )
        {
            $cartItems[$id]['quantity']++;

        }
        else{
            $cartItems[$id]=[
                'image_path'=>$product->image_path,
                'name' =>$product->name,
                'details' =>$product->details,
                'quantity' =>1,
                'price' =>$product->price,
                'brand' =>$product->brand,

            ];

        }
        session()->put('cartItems',$cartItems);
        return redirect()->back()->with('success','product added to cart !');
    } 
    public function delete(Request $request)
    {
        if($request->id){

            //get session array of all items
            $cartItems=session()->get('cartItems');

            //check if the requested delted itam is in the session
            if(isset($cartItems[$request->id])){
                //remove this item from the session array
                unset($cartItems[$request->id]);
                session()->put('cartItems',$cartItems);
            }

            return redirect()->back()->with('success','item deleted successfully');

        }
    }
    public function updateQuantity(Request $request)
    {
        $cartItems=session()->get('cartItems');

        if( $request->id && $request->quantity )
        {
            $cartItems[$request->id]['quantity']=$request->quantity;
            session()->put('cartItems', $cartItems);


        }
        return redirect()->back()->with('success','quantity changed successfully');

    }

}
