<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
class SliderController extends Controller
{
    protected $slider;

    public function __construct(SliderService $slider) {
        $this->slider = $slider;
    }
    public function create() {
        return view('admin.slider.add', [
            'title' => "Thêm Slider mới"
        ]);
    }

    public function  store(Request $request) {
        $request->validate([
           'name' => 'required',
           'thumb' => 'required',
            'url' => 'required'
        ]);

        $this->slider->insert($request);

        return redirect()->back();
    }

    public function index() {
        return view('admin.slider.list', [
            'title' => 'Danh sách Slider Mới Nhất',
            'sliders' => $this->slider->get()
        ]);
    }
}
