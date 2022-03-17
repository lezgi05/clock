<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\ProductModel;

class BasketController extends Controller
{
    public function basket(Request $request) {
        $products = new ProductModel;
        $cart = session('cart');
        return view('basket', ['cart' => $cart,'products'=>$products]);
    }

    public function basket_welcome($id, $colvo) {
        $cart = session('cart');
        if($cart != ''){
            foreach($cart as $item){
                if($item['tovar'] == $id){$status = 1;}
            }
        }

        if(!isset($status)){
            $cart[] = array(
                'tovar' => $id,
                'colvo' => $colvo
            );
        }

        session(['cart'=>$cart]);
    }
}
