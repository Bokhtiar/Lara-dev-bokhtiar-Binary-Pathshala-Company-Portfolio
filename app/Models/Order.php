<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Order extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table='orders';
    protected $primaryKey='order_id';

    protected $fillable = [
        'f_name',
        'l_name',
        'phone',
        'email',
        'address_1',
        'address_2',
        'paymentMethod',
        'send_number',
        'secretKey',
    ];

    public function price()
    {
        return $this->belongsTo(Price::class, 'price_id', 'price_id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id', 'cart_id');
    }

    public function scopeValidation($value, $request){
        return Validator::make($request, [
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address_1' => 'required',
            'paymentMethod' => 'required',
            'send_number' => 'required',
            'secretKey' => 'required',
        ])->validate();
    }

    public function scopeFindID($q, $id)
    {
        return self::find($id);
    }
}
