<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
    ];

    // protected $with = "user";

    public function getRealAmountAttribute()
    {
      // en realidad el IVA sería mejor guardarlo como una global, env o en config
      return round($this->amount*1.21,2);
    }

    public function sendSMS()
    {
      $id       = $this->id;
      $cantidad = $this->realAmount;
      error_log("SMS de pago con id $id de $cantidad €");
    }

    public function User()
    {
      return $this->belongsTo(User::class);
    }
}
