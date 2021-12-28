<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    // наз-вание таблицы
    protected $table = "products";

    protected $fillable = [
        'productname',
        'price',
        'description',
        'imagePath',
        'created_at',
        'updated_at'
    ];
}
