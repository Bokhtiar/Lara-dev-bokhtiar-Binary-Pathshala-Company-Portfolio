<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Contact extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table='contacts';
    protected $primaryKey='contact_id';

    protected $fillable = [
        'contact_id',
        'name',
        'email',
        'subject',
        'body'
    ];

    public function scopeValidation($value, $request){
        return Validator::make($request, [
            'name' => 'string | required | max:15 | min:3',
            'email' => 'required',
            'subject' => 'required',
            'body' => 'required'
        ])->validate();

    }

    public function scopeFindID($q, $id)
    {
        return self::find($id);
    }
}
