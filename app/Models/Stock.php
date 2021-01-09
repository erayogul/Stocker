<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public $table = "stock";
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'stock_id',
        'location',
        'quantity',
        'supplier',
        'notification',
        'notificationUser',
        'notificationQuantity',
    ];
}
