<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(6);
        return view('product.index', compact('products'));
    }

    /**
     * Add Product To Cart
     */
    public function addToCart(Product $product)
    {
        if (session()->has('cart')) {
            $cart = new cart(session()->get('cart'));
        } else {
            $cart = new Cart();
        }
        $cart->add($product);
        //dd($cart);
        session()->put('cart', $cart);
        return redirect()->route('product.index')->with('success', 'Product was added');
    }

    /**
     * Show Shopping Cart
     */

    public function showCart()
    {
        if (session()->has('cart')) {
            $cart = new cart(session()->get('cart'));
        } else {
            $cart = null;
        }
        //dd($cart);

        return view('cart.show', compact('cart'));
    }

    /**
     * Remove Item From Cart 
     */
    public function removeFromCart(Product $product)
    {
        $cart = new cart(session()->get('cart'));
        $cart->remove($product->id);
        if ($cart->totalQty <= 0) {
            session()->forget('cart');
        } else {
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.show');
    }

    /**
     * increase quantity for one items
     */

    public function increaseQty(Product $product)
    {
        $cart = new cart(session()->get('cart'));
        $cart->increase($product->id);
        session()->put('cart', $cart);
        return redirect()->route('cart.show');
    }

    /**
     * decrease quantity for one items
     */

    public function decreaseQty(Product $product)
    {
        $cart = new cart(session()->get('cart'));
        $cart->decrease($product->id);
        if ($cart->totalQty <= 0) {
            session()->forget('cart');
        } else {
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.show');
    }









    /*** Functions For Admins only ***********************************************************************/

    /** get all products */
    public function allProducts()
    {
        $products=Product::paginate(10);
        return view('admin.product.allProducts',compact('products'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'price'=>'required',
            'image'=>'required'
        ]);
        $product= new Product();
        $product->title=$request->title;
        $product->price=$request->price;
        
        //photo
        if ($request->file('image')) {
            $imagePhoto=$request->image;
            $newPhoto=time().$imagePhoto->getClientOriginalName();
            $imagePhoto->move('productImages',$newPhoto);
            $product->image='productImages/'.$newPhoto;
        }
        $product->save();
        return redirect()->route('product.all')->with('success','product added successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product =Product::find($id);
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        $request->validate([
            'title'=>'required',
            'price'=>'required',
            'image'=>'required'
        ]);
        if ($request->has('image')) {
            $photo=$request->image;
            $newPhoto=time().$photo->getClientOriginalName();
            $photo->move('productImages/',$newPhoto);
            $product->image='productImages/'.$newPhoto;
        }
        $product->title=$request->title;
        $product->price=$request->price;
        $product->save();
        return redirect()->route('product.all')->with('success','product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id)->delete();
        return redirect()->back();
    }
}
