@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên Sản Phẩm</label>
                <input type="text" value="{{old('name')}}" name="name" class="form-control" id="menu" placeholder="Nhập tên sản phẩm">
            </div>
            <div class="form-group">
                <label>Danh Mục</label>
                <select class="form-control" name="menu_id">
                    <option value="0">Danh Mục Cha</option>
                    @foreach ($menus as $menu)
                        <option value={{$menu->id}}>{{$menu->name}}</option>
                    @endforeach
                </select>
            </div>

            <div style="display: flex; justify-content: space-between">
                <div class="form-group" style="width: 40%">
                    <label>Giá Gốc</label>
                    <input value="{{old('price')}}" type="number" name="price" class="form-control">
                </div>
                <div class="form-group" style="width: 40%">
                    <label>Giá Giảm</label>
                    <input value="{{old('price_sale')}}" type="number" name="price_sale" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label>Mô tả</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <label>Ảnh sản phẩm</label>
                <input type="file" name="file" class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" checked="">
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tạo Sản Phẩm</button>
            </div>
        @csrf
    </form>
@endsection


@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
