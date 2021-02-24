<?php

namespace App\Models;
use App\models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title','slag'];
    public function getRouteKeyName()
    {
      return 'slug';
    }
    public function Products()
    {
      return $this->hasMany(Product::class);
    }
}
