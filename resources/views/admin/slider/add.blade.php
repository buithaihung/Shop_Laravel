@extends('admin.main')

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tiêu Đề</label>
                        <input type="text" value="{{old('name')}}" name="name" class="form-control" id="menu">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Đường Dẫn</label>
                        <input type="text" value="{{old('url')}}" name="url" class="form-control" id="menu">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Ảnh sản phẩm</label>
                <input type="file" name="file" class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>
            <div class="form-group">
                <label for="menu">
                    Sắp xếp
                </label>
                <input type="number" name="sort_by" value="1" class="form-control">
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
                <button type="submit" class="btn btn-primary">Tạo Slider</button>
            </div>
        @csrf
    </form>
@endsection


@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
