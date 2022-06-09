<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Question extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table='services';
    protected $primaryKey='service_id';

    protected $fillable = [
        'question_id',
        'question',
        'ans',
    ];

    public function scopeValidation($value, $request){
        return Validator::make($request, [
            'question' => 'string | required ',
            'ans' => 'required',
        ])->validate();

    }


    public function scopeFindID($q, $id)
    {
        return self::find($id);
    }

}
