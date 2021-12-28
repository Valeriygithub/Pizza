<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminCome extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    // наз-вание таблицы
    protected $table = "admin";

    protected $fillable = [
        'name',
        'password',
        'created_at',
        'updated_at'
    ];
}
