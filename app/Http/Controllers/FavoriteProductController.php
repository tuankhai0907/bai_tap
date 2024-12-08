<?php

namespace App\Http\Controllers;

use App\Models\FavoriteProduct;
use Illuminate\Http\Request;

class FavoriteProductController extends Controller
{
    public function __construct()
        {
            $this->middleware('checklogin');
        }
    public function index()
    {
        $this->middleware('logincheck');
        // Lấy thông tin giỏ hàng từ cơ sở dữ liệu
        $cartItems = FavoriteProduct::with('product')->where('user_id', auth()->id())->get();
    
        // Tính tổng số lượng và tổng giá trị của giỏ hàng
        $totalQuantity = $cartItems->sum('quantity');
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
    
        // Trả về view hiển thị thông tin giỏ hàng
        return view('cart.index', compact('cartItems', 'totalQuantity', 'totalPrice'));
    }

    public function store(Request $request)
    {
        $this->middleware('logincheck');

        $user_id = auth()->id();
        $product_id = $request->product_id;
        $quantity = $request->quantity;
    
        $cartItem = FavoriteProduct::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();
    
        if ($cartItem) {
            // Nếu sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
            $cartItem->quantity += $quantity;
            $cartItem->save();
            $message = 'Sản phẩm đã được cập nhật trong giỏ hàng.';
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, tạo mới
            FavoriteProduct::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'quantity' => $quantity,
            ]);
            $message = 'Đã thêm sản phẩm vào giỏ hàng.';
        }
    
        // Gửi thông báo sử dụng session
        session()->flash('success', $message);
    
        return redirect()->route('products.show', ['product_id' => $request->product_id])->with('success', 'Sản phẩm đã được thêm vào mục yêu thích.');
    
    }
    

    public function update(Request $request, FavoriteProduct $favoriteProduct)
    {
        // Logic để cập nhật thông tin favorite product
    }

    public function destroy($favorite_id)
    {
        $cartItem = FavoriteProduct::findOrFail($favorite_id);
    
        // Giảm số lượng sản phẩm hoặc xoá sản phẩm khỏi giỏ hàng
        if ($cartItem->quantity > 1) {
            $cartItem->update([
                'quantity' => $cartItem->quantity - 1
            ]);
        } else {
            $cartItem->delete();
        }
    
        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được xoá khỏi giỏ hàng');
    }
}