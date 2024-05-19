<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    /**
     * Phương thức content để lấy tất cả các trường từ bảng checkouts
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function content()
    {
        return $this->all();
    }
}
