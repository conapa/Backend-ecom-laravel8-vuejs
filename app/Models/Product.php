<?php

namespace App\Models;
use App\models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
      'title','slug','description','price','image','category_id'
    ];

    public function getRouteKeyName()
    {
      return 'slug';
    }
    public function Category()
    {
      return $this->belongsTo(Category::class);
    }
}
