<div class="cotainer">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="card-header text-center">Thêm Thuộc Tính</h3>
            <form action="{{route('properties.store')}}" method="POST" >
                @csrf
                <div class="form-group mb-3">
                    <input type="text" placeholder="Tên thuộc tính" id="propertiesName" class="form-control"
                        name="propertiesName" required autofocus>
                    @if ($errors->has('propertiesName'))
                        <span class="text-danger">{{ $errors->first('propertiesName') }}</span>
                    @endif
                </div>
                
                <div class="form-group mb-3">
                    <label for="category">Danh mục</label>
                    <select class="form-select form-control" aria-label="Default select example" id="category"
                        name="category">
                        @foreach ($categories as $value)
                            <option value="{{ $value->id }}">{{ $value->categoryName }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="d-grid mx-auto text-left">                 
                    <button type="submit" class="btn btn-outline-success ">Thêm</button>
                    <a href="{{route('properties.index')}}" class="btn btn-outline-secondary ">                 
                        <span class="text">Trở về</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
