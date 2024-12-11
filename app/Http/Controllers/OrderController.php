<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;

class OrderController extends Controller
{
   
    private $order;

    public function __construct()
    {
        $this->order = new Order();
        $this->middleware('checklogin');
    }

    public function index()
    {
        $this->middleware('logincheck');

        $user_id = auth()->id(); // Lấy mã người dùng từ đăng nhập
        $user = User::find($user_id); // Lấy thông tin người dùng

        if (!$user) {
            return redirect()->route('login')->with('error', 'Người dùng không tồn tại.');
        }

        $donHangList = Order::where('user_id', $user_id)->get(); // Lấy danh sách đơn hàng

        return view('orders.index', compact('user', 'donHangList'));
    }
    public function qldonhang(Request $request)
    {
        $query = $this->order->newQuery();
        $filtered = false;
    
        if ($request->has('order_date')) {
            $order_date = $request->order_date;
            $query->whereDate('order_date', 'like', '%' . $order_date . '%');
            $filtered = true;
        }
    
        if ($request->has('user_id')) {
            $user_id = $request->user_id;
            $query->where('user_id', 'like', '%' . $user_id . '%');
            $filtered = true;
        }
    
        $donHangs = $query->paginate(10); // Phân trang với 10 đơn hàng trên mỗi trang
    
        // Đếm số bản ghi thỏa mãn điều kiện tìm kiếm
        $recordCount = $query->count();
    
        return view('orders.qldonhang', compact('donHangs', 'filtered', 'recordCount'));
    }
    public function show($order_id)
    {
        $donHang = Order::where('order_id', $order_id)->firstOrFail();
        $chiTietDonHangData = OrderDetail::where('order_id', $order_id)->get();
    
        return view('orders.show', compact('donHang', 'chiTietDonHangData'));
    }
    public function placeOrder(Request $request)
    {
        $this->middleware('logincheck');
        
        $order_date = now();
        $user_id = auth()->id();
    
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu
        $product = Product::find($request->product_id);
        $total_amount = $product->price * $request->quantity;
    
        // Tạo mảng dữ liệu cho đơn hàng
        $order_data = [
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'order_date' => $order_date,
            'total_amount' => $total_amount,
            'user_id' => $user_id,
        ];
    
        // Tạo đơn hàng và lưu vào cơ sở dữ liệu
        $order = Order::create($order_data);
    
        // Lưu thông tin đơn hàng chi tiết vào bảng order_details
        if ($order) {
            // Giảm số lượng sản phẩm
            $product->quantity -= $request->quantity;
            $product->save();
        
            // Tạo đơn hàng chi tiết và lưu vào bảng order_details
            $orderDetail = [
                'order_id' => $order->order_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'unit_price' => $product->price,
            ];
        
            OrderDetail::create($orderDetail);
        }
        
    
        return redirect()->route('products.show', ['product_id' => $request->product_id])->with('success', 'Sản phẩm đã được thêm thành công.');
    }
    public function deleteOrder($order_id)
    {
        $order = Order::find($order_id);

        if (!$order) {
            return redirect()->route('orders.index')->with('error', 'Đơn hàng không tồn tại.');
        }

        // Xoá đơn hàng chi tiết trước
        OrderDetail::where('order_id', $order_id)->delete();

        // Xoá đơn hàng
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được xoá thành công.');
    }
    public function deleteOrder1($order_id)
    {
        $order = Order::find($order_id);

        if (!$order) {
            return redirect()->route('orders.index')->with('error', 'Đơn hàng không tồn tại.');
        }

        // Xoá đơn hàng chi tiết trước
        OrderDetail::where('order_id', $order_id)->delete();

        // Xoá đơn hàng
        $order->delete();

        return redirect()->route('orders.qldonhang')->with('success', 'Đơn hàng đã được xoá thành công.');
    }
}