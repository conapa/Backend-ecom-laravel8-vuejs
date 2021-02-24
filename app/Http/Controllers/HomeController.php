<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      return Inertia::render('Dashboard',[
        'products' => Product::get(),
        'categories' => Category::has('products')->get()

      ]);
    }
    public function getProductsByCategory(category $category)
    {
      $products = Product::where('category_id', $category->id)->get();
      return Inertia::render('Dashboard',[
        'products' => $products,
        'categories' => Category::has('products')->get()

      ]);
    }
}
