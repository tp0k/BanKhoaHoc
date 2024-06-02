<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vpayment extends Model
{
    use HasFactory;

    protected $table = 'vpayments';
    protected $fillable = [
        'transaction_id', 'user_id', 'amount', 'note', 'vpn_response_code',
        'code_vnpay', 'code_bank', 'time'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
