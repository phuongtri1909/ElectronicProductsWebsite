<div class="cotainer">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="card-header text-center">Thêm danh mục</h3>
            <form action="{{route('addCategory.admin')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" placeholder="Tên Danh mục" id="categoryName" class="form-control"
                        name="categoryName" required autofocus>
                    @if ($errors->has('categoryName'))
                        <span class="text-danger">{{ $errors->first('categoryName') }}</span>
                    @endif
                </div>

                <div class="d-grid mx-auto text-left">                 
                    <button type="submit" class="btn btn-outline-success ">Thêm</button>
                    <a href="{{route('category')}}" class="btn btn-outline-secondary ">                 
                        <span class="text">Trở về</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
