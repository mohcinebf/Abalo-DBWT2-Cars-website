<?php

namespace App\Http\Controllers;

use App\Models\AbShoppingCart;
use App\Models\AbShoppingCartItem;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class APIShoppingCartController extends Controller
{
    public function _apiAddToCart(Request $request): string {
        if(empty(DB::table('ab_shoppingcart')->count())){
            $cart = new AbShoppingCart();
            $cart->ab_creator_id = 1;
            $cart->save();
        }
        $cartItem = new AbShoppingCartItem();
        $cartItem->ab_shoppingcart_id = 2;
        $cartItem->ab_article_id = $request->article;
        if(!DB::table('ab_shoppingcart_item')->where('ab_article_id', $request->article)->exists()) {
            $cartItem->save();
            return 'add to cart successful';
        }
        else
            return 'the item was already in shopping cart';
    }

    public function _apiRemoveFromCart($id): string {
        if(DB::table('ab_shoppingcart_item')->where('ab_article_id', $id)->exists())
            DB::table('ab_shoppingcart_item')->where('ab_article_id', $id)->delete();
        else
            throw new Exception('Artikel nicht gefunden');
        return 'remove successful';
    }
}

