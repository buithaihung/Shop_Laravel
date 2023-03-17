<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\UploadService;


class UploadController extends Controller
{
    protected $upload;

    public function __construct(UploadService $upload){
        $this->upload = $upload;
    }
    public function store(Request $request) {
        if ($request->hasFile('file')) {

            return "File đã được upload";
        }
        return "Lỗi upload";
    }
}
