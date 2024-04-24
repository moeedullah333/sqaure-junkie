<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentAuthToken extends Model
{
    use HasFactory;
    protected $table ="payment_authtoken";
    public $fillable = ['auth_token'];
}
