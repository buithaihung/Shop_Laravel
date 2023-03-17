<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Services\Product\ProductAdminService;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $productService;

    public function __construct(ProductAdminService $productService) {
        $this->productService = $productService;
    }

    public function index()
    {
         return view('admin.product.list',[
            'title' => 'Danh sách sản phẩm',
             'products' => $this->productService->get()
         ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.product.add', [
            'title' => 'Thêm danh mục mới',
            "menus" => $this->productService->getMenu(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $this->productService->insert($request);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.edit',[
            'title' => 'Chỉnh sửa sản phẩm',
            'product' => $product,
            "menus" => $this->productService->getMenu(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $result = $this->productService->update($request,$product);
        if($result) {
            return redirect('admin/products/list');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $result = $this->productService->delete($request);

        if($result) {
            return response()->json([
                'error' => false,
                'message' => "Xoá thành công sản phẩm",
            ]);
        }
        return response()->json([
            'error' => true,
        ]);
    }
}
