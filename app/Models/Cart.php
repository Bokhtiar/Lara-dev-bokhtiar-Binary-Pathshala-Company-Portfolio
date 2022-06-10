<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Cart extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table='carts';
    protected $primaryKey='cart_id';

    protected $fillable = [
        'cart_id',
        'price_id',
        'user_id',
        'order_id',
        'qty',
    ];

    public function scopeValidation($value, $request){
        return Validator::make($request, [
            'price_id' => 'required',
        ])->validate();
    }

    public function scopeFindID($q, $id)
    {
        return self::find($id);
    }



    public static function total_item_cart(){

        if (Auth::check()) {
          $cart=Cart::where('user_id',Auth::id())
                    ->where('order_id',NULL)
                    ->get();
        }else {
            $cart=Cart::where('order_id',NULL)
                      ->get();
          }
        $total_item=0;
        foreach ($cart as $v_cart) {
                    $total_item +=$v_cart->quantity;
        }
        return $total_item;
        }


        public static function item_cart(){
        if (Auth::check()) {
        $cart=Cart::where('user_id',Auth::id())
                ->where('order_id',NULL)
                ->get();
        }else {
            $cart=Cart::where('order_id',NULL)
                      ->get();
          }
        return $cart;
        }
}
