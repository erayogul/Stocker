<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock_category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'category_name',
    ];

}
