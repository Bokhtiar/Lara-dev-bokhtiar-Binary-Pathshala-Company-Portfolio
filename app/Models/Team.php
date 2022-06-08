<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Team extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table='teams';
    protected $primaryKey='team_id';

    protected $fillable = [
        'team_id',
        'name',
        'designation',
        'image',
        'fb',
        'instagram',
        'twitter',
        'linkdin'
    ];

    public function scopeValidation($value, $request){
        return Validator::make($request, [
            'name' => 'string | required | max:15 | min:3',
            'designation' => 'required',
        ])->validate();

    }

    public function scopeImage($value, $request){
         $image = array();
        if ($request->hasFile('image')) {
            foreach ($request->image as $key => $photo) {
                $path = $photo->store('team/photos');
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
