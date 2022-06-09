<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Blog extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table='blogs';
    protected $primaryKey='blog_id';

    protected $fillable = [
        'blog_id',
        'service_id',
        'user_id',
        'title',
        'body',
        'image'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'service_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeValidation($value, $request){
        return Validator::make($request, [
            'title' => 'string | required | min:3',
            'service_id' => 'required',
            'body' => 'required',
        ])->validate();

    }

    public function scopeImage($value, $request){
         $image = array();
        if ($request->hasFile('image')) {
            foreach ($request->image as $key => $photo) {
                $path = $photo->store('blog/photos');
                array_push($image, $path);
            }
        }
        return $image;
    }


    public function scopeFindID($q, $id)
    {
        return self::find($id);
    }

}
