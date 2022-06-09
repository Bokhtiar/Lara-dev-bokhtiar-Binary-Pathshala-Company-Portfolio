<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class WebSetting extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table='web_settings';
    protected $primaryKey='web_setting_id';

    protected $fillable = [
        'title',
        'heading_1',
        'heading_2',
        'location',
        'phone',
        'email',
    ];

    public function scopeValidation($value, $request){
        return Validator::make($request, [
            'title' => 'string | required',
            'heading_2' => 'required| max:30 | min:15',
            'heading_1' => 'required| max:30 | min:15',
            'location' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ])->validate();

    }

    public function scopeFindID($q, $id)
    {
        return self::find($id);
    }
}
