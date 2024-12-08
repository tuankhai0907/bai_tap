<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductController extends Controller
{
   
    protected $product;  

    public function __construct(Product $product)  
    {  
        $this->product = $product; // Gán model vào thuộc tính  
    }  

    public function index(Request $request)  
    {  
        // Khởi tạo một query builder mới từ model Product  
        $query = $this->product->newQuery();  
        $filtered = false;  

        // Kiểm tra nếu có tham số tìm kiếm  
        if ($request->filled('search')) {  
            $searchTerm = $request->input('search'); // Lấy giá trị tìm kiếm  
            $query->where('product_name', 'like', '%' . $searchTerm . '%');  
            $filtered = true;  
        }  

        // Phân trang với 10 sản phẩm trên mỗi trang  
        $products = $query->paginate(10);  

        // Trả về view với các biến cần thiết  
        return view('products.index', compact('products', 'filtered'));  
    }  
    public function nike(Request $request)  
    {  
        // Khởi tạo một query builder mới từ model Product  
        $query = $this->product->newQuery();  

        // Lọc sản phẩm có thuộc tính 'thuong_hieu' là 'nike'
        $query->where('thuong_hieu', 'nike');

        // Phân trang với 10 sản phẩm trên mỗi trang  
        $products = $query->paginate(10);  

        // Trả về view với các biến cần thiết  
        return view('products.nike', compact('products'));  
    }
    public function adidas(Request $request)  
    {  
        // Khởi tạo một query builder mới từ model Product  
        $query = $this->product->newQuery();  

        // Lọc sản phẩm có thuộc tính 'thuong_hieu' là 'nike'
        $query->where('thuong_hieu', 'adidas');

        // Phân trang với 10 sản phẩm trên mỗi trang  
        $products = $query->paginate(10);  

        // Trả về view với các biến cần thiết  
        return view('products.adidas', compact('products'));  
    }
    public function puma(Request $request)  
    {  
        // Khởi tạo một query builder mới từ model Product  
        $query = $this->product->newQuery();  

        // Lọc sản phẩm có thuộc tính 'thuong_hieu' là 'nike'
        $query->where('thuong_hieu', 'puma');

        // Phân trang với 10 sản phẩm trên mỗi trang  
        $products = $query->paginate(10);  

        // Trả về view với các biến cần thiết  
        return view('products.puma', compact('products'));  
    }
    public function qlsanpham(Request $request)
    {
        $query = $this->product->newQuery();
        $filtered = false;
    
        if ($request->filled('search')) {  
            $searchTerm = $request->input('search'); // Lấy giá trị tìm kiếm  
            $query->where('product_name', 'like', '%' . $searchTerm . '%');  
            $filtered = true;  
        }  
    
        $products = $query->paginate(6); // Phân trang với 4 sản phẩm trên mỗi trang
    
        return view('products.qlsanpham', compact('products', 'filtered'));
    }
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'quantity' => 'nullable|numeric',
            'thuong_hieu' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Xử lý upload hình ảnh nếu có
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }
    
        // Lưu dữ liệu vào cơ sở dữ liệu
        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->thuong_hieu = $request->input('thuong_hieu');
        $product->image_url = $imagePath;
        $product->save();
    
        return redirect()->route('products.qlsanpham')->with('success', 'Sản phẩm đã được thêm thành công.');
    }

    public function show($product_id)
    {
        $products  = Product::find($product_id);
        return view('products.show', compact('products'));
    }

    public function edit($product_id)
    {
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu dựa vào $product_id
        $product = Product::find($product_id);

        // Kiểm tra nếu sản phẩm không tồn tại
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Sản phẩm không tồn tại.');
        }

        // Trả về view 'products.edit' với dữ liệu sản phẩm cần chỉnh sửa
        return view('products.edit', compact('product'));
    }
    public function update(Request $request, Product $product)  
    {  
        // Xác thực dữ liệu đầu vào  
        $request->validate([  
            'product_name' => 'required',  
            'description' => 'nullable',  
            'price' => 'required|numeric',  
            'quantity' => 'nullable|numeric',
            'thuong_hieu' => 'nullable|string', 
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  
        ]);
        
      
        // Khởi tạo biến hình ảnh từ thông tin sản phẩm hiện tại  
        $imagePath = $product->image_url; 
     
    
        // Xử lý upload hình ảnh mới nếu có  
        if ($request->hasFile('image_url')) {  
            // Xóa hình ảnh cũ nếu có  
            if ($imagePath) {  
                Storage::disk('public')->delete($imagePath);  
            }  
            
            // Upload hình ảnh mới  
            $imagePath = $request->file('image_url')->store('images', 'public');  
        }          
    
        // Cập nhật thông tin sản phẩm  
        $product->update([  
            'product_name' => $request->input('product_name'),  
            'description' => $request->input('description'),  
            'price' => $request->input('price'),  
            'quantity' => $request->input('quantity'),
            'thuong_hieu' => $request->input('thuong_hieu'),
            'image_url' => $imagePath // Duy trì đường dẫn hình ảnh nếu không có hình mới  
        ]);  
    
        return redirect()->route('products.qlsanpham')->with('success', 'Cập nhật thông tin sản phẩm thành công.');  
    }

    public function destroy(Product $product)
    {
        // Kiểm tra và xóa hình ảnh nếu có
        if ($product ->image_url) {
            Storage::disk('public')->delete($product->image_url);
        }

        // Xóa sản phẩm
        $product->delete();

        session()->flash('success', 'Xoá sản phẩm thành công.');
        return redirect()->route('products.qlsanpham');
    }
}