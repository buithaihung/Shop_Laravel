<?php

namespace App\Http\Services\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductAdminService
{
    protected function isValidPrice($request) {
        if($request->input('price') != 0 && $request->input('price_sale') != 0 &&
            $request->input('price_sale') >= $request->input('price'))
        {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }
        if($request->input('price_sale') != 0 && $request->input('price') == 0){
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }
        if($request->input('price_sale') <0 || $request->input('price') <0){
            Session::flash('error', 'Giá tiền phải lớn hơn 0');
            return false;
        }
        return true;
    }
    public function insert($request){
        $isValidPrice = $this->isValidPrice($request);
        if($isValidPrice == false) {
            return false;
        }
        try {
            $request->except('_token');
            Product::create($request->all());
            Session::flash('success', 'Thêm sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm sản phẩm lỗi');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }
}
