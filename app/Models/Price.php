<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Price extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table='prices';
    protected $primaryKey='price_id';

    protected $fillable = [
        'price_id',
        'title',
        'designation',
        'price',
        'item1',
        'item2',
        'item3',
        'item4',
        'item5',
    ];

    public function scopeValidation($value, $request){
        return Validator::make($request, [
            'title' => 'string | required | max:15 | min:3',
            'designation' => 'required',
            'price' => 'required'
        ])->validate();

    }


    public function scopeFindID($q, $id)
    {
        return self::find($id);
    }
}
