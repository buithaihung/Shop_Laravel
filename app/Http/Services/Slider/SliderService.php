<?php
namespace App\Http\Services\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class SliderService {

    public function insert($request) {
        try {
            $request->except('_token');
            Slider::create($request->input());
            Session::flash('success','Thêm slider mới thành công');
        } catch (\Exception $err) {
            Session::flash('error','Thêm slider mới lỗi');
            Log::info($err->getMessage());

            return false;
        }
        return true;
    }

    public function get() {
        return Slider::orderByDesc('id')->paginate(15);
    }
}
