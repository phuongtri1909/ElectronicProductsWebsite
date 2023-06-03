<div class="cotainer">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="card-header text-center">Chọn danh mục thêm sản phẩm</h3>
            <form action="{{ route('product.create') }}" method="get" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="category">Danh mục</label>
                    <select class="form-select form-control" aria-label="Default select example" id="category"
                        name="category">
                        @foreach ($categories as $value)
                            <option value="{{ $value->id }}">{{ $value->categoryName }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="d-grid mx-auto text-center">
                    <button type="submit" class="btn btn-outline-success ">Tiếp tục thêm</button>
                </div>
            </form>


        </div>
    </div>
</div>
