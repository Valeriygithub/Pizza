<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    // наз-вание таблицы
    protected $table = "cart-product";

    protected $fillable = [
        'productname',
        'username',
        'address',
        'house_number',
        'phone',
        'price',
        "countprod",
        "apartment",
        "telegram_user_id",
        'created_at',
        'updated_at'
    ];
    public function routeNotificationForTelegram()
    {
        return $this->telegram_user_id;
    }
}
