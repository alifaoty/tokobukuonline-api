<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'transaction_id',
        'book_id',
        'user_id',
        'payment_total',
        'payment_date'
    ];

    public function payment()
    {
        return $this->belongsTo(payment::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
