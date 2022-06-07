<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Service extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table='services';
    protected $primaryKey='service_id';

    protected $fillable = [
        'service_id',
        'name',
        'body',
        'image'
    ];

    public function scopeValidation($value, $request){
        return Validator::make($request, [
            'name' => 'string | required | max:15 | min:3',
            'body' => 'required',
            'image' => 'required',
        ])->validate();
    }

    public function scopeImage($value, $request){
         $image = array();
        if ($request->hasFile('image')) {
            foreach ($request->image as $key => $photo) {
                $path = $photo->store('service/photos');
                array_push($image, $path);
            }
        }
        return $image;
    }


    public function scopeFindID($q, $id)
    {
        return self::where('service_id', $id)->first();
    }

}
