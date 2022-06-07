<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, CrudTrait;

    protected $fillable = [
        'service_id',
        'name',
        'body',
        'image'
    ];


    

}
