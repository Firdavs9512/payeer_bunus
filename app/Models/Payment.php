<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [ 'payeer_adress', 'summ', 'number', 'name', 'user_id' ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
