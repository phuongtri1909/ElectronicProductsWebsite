<div class="cotainer">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="card-header text-center">Chọn danh mục sửa sản phẩm</h3>

            <form action="{{ route('editCategories') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="category">Danh mục</label>
                    <select class="form-select form-control" aria-label="Default select example" id="category"
                        name="category">
                        @foreach ($categories as $value)
                            @if ($value->id == $thisCategory)
                                <option selected="selected" value="{{ $value->id }}">{{ $value->categoryName }}
                                </option>
                            @else
                                <option value="{{ $value->id }}">{{ $value->categoryName }}</option>
                            @endif
                        @endforeach

                    </select>

                </div>
                <input hidden value="{{ $thisCategory }}"  id="idCategory" class="form-control"
                    name="idCategory" >
                    
                <input hidden value="{{ $idProduct }}" id="idProduct" class="form-control"
                    name="idProduct" >

                <div class="d-grid mx-auto text-center">
                    <button type="submit" class="btn btn-outline-success ">Tiếp tục sửa</button>
                    <a href="{{route('product.index')}}" class="btn btn-outline-secondary ">                 
                        <span class="text">Trở về</span>
                    </a>
                </div>
            </form>


        </div>
    </div>
</div>
