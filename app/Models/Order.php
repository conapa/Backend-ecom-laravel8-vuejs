<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
      'user_id','product_name','qty','price','total','paid','delivered'
    ];
    public function User()
    {
      return $this->belongsTo(User::class);
    }
}
