<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class About extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table='services';
    protected $primaryKey='service_id';

    protected $fillable = [
        'about_id',
        'title',
        'short_des',
        'left_des',
        'right_des',
        'status'
    ];

    public function scopeValidation($value, $request){
        return Validator::make($request, [
            'title' => 'string | required | max:30 | min:3',
        ])->validate();

    }

    public function scopeFindID($q, $id)
    {
        return self::find($id);
    }
}
