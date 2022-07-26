<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\User;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $carts = User::find($user_id)->carts;
        return view('cart/view_cart')->with('carts', $carts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $cart = new Cart;
        $cart->user_id = Auth::id();
        $cart->shoe_id = $id;
        $cart->save();
        
        return redirect('/')->with('success', 'Add to cart success');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
/*   public function update(Request $request, $id)
    {
        $this->validate($request, [
            'quantity' => ['required', 'numeric', 'min:1']
        ]);

        $cart = Cart::find($id);
        $cart->quantity = $request->quantity;
        $cart->save();

        return redirect('viewCart')->with('success', 'Update quantity success');
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $cart = Cart::find($id);
        $cart->delete();
        return redirect('viewCart')->with('success', 'Remove item from cart success');
    }
}
