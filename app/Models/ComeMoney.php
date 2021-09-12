<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComeMoney extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'money_no',
        'money_explain',
        'money_date',
        'money_notice'
    ];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
