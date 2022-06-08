<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Portfolio extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table='portfolios';
    protected $primaryKey='portfolio_id';

    protected $fillable = [
        'portfolio_id',
        'service_id',
        'title',
        'client_name',
        'project_url',
        'project_date',
        'body',
        'images'
    ];


    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'service_id');
    }

    public function scopeValidation($value, $request){
        return Validator::make($request, [
            'title' => 'string | required | max:15 | min:3',
            'body' => 'required',
            'service_id' => 'required'
        ])->validate();

    }

    public function scopeImages($value, $request){
         $images = array();
        if ($request->hasFile('images')) {
            foreach ($request->images as $key => $photo) {
                $path = $photo->store('service/photos');
                array_push($images, $path);
            }
        }
        return $images;
    }


    public function scopeFindID($q, $id)
    {
        return self::find($id);
    }

}
