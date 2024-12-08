<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where('product_name', 'like', '%' . $searchTerm . '%');
        }

        $products = $query->paginate(10); // Phân trang với 10 sản phẩm trên mỗi trang

        return view('home.index', compact('products'));
    }
}
