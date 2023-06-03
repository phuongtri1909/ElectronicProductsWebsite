

<div class="cotainer">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="card-header text-center">Thêm sản phẩm</h3>

            @if (session('errorCreate'))
            <div class="  alert alert-danger">
                {{ session('errorCreate') }}
            </div>
        @endif
        
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
             
                <div class="form-group mb-3">
                    <label for="productCategory">Danh mục</label>
                    <select class="form-select form-control" aria-label="Default select example" id="productCategory"
                        name="productCategory"> 
                       
                            <option value="{{ $categories->id }}">{{ $categories->categoryName }}</option>
                    </select>
                </div>
    
                <div class="form-floating mb-3">
                    <label for="productName">Tên sản phẩm</label>
                    <input type="text" placeholder="Tên sản phẩm" id="productName" class="form-control"
                        name="productName" required autofocus>
                    @if ($errors->has('productName'))
                        <span class="text-danger">{{ $errors->first('productName') }}</span>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="productPrice">Giá sản phẩm</label>
                    <input value="{{ old('productPrice') }} " type="number" placeholder="Gía sản phẩm" id="productPrice" class="form-control"
                        name="productPrice" required autofocus>
                    @if ($errors->has('productPrice'))
                        <span class="text-danger">{{ $errors->first('productPrice') }}</span>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="productManu">Hãng sản xuất</label>
                    <select class="form-select form-control" aria-label="Default select example" id="productManu"
                        name="productManu">
                        @foreach ($manufacturer as $value)
                            <option value="{{ $value->id }}">{{ $value->manufacturerName }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="productImage">Hình ảnh</label>
                    <input multiple type="file" id="productImage" class="form-control" name="productImage[]" required>
                    @if ($errors->has('productImage'))
                        <span class="text-danger">{{ $errors->first('productImage') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="descriptionProduct" class="form-label">Mô tả sản phẩm</label>
                    <textarea value="{{ old('descriptionProduct') }} "class="form-control" id="descriptionProduct" name="descriptionProduct" rows="3"></textarea>
                    @if ($errors->has('descriptionProduct'))
                        <span class="text-danger">{{ $errors->first('descriptionProduct') }}</span>
                    @endif
                </div>

                <label for="attributes">Các thuộc tính:</label>
                @foreach ($result as $attribute)
                <div class="form-group mb-3">
                    <label for="attribute_{{ $attribute->id }}">{{ $attribute->propertiesName }}</label>
                    <input type="text" placeholder="{{ $attribute->propertiesName }}" id="attribute_{{ $attribute->id }}" class="form-control"
                        name="attributes[{{ $attribute->id }}]" required >
                    @if ($errors->has('propertiesValue'))
                        <span class="text-danger">{{ $errors->first('propertiesValue') }}</span>
                    @endif
                </div>
                @endforeach

                {{-- <div class="form-group mb-3">
                    <label for="optionList">Chọn thuộc tính cho sản phẩm:</label>
                    <select multiple id="optionList" class="form-select form-control">
                        @foreach ($properties as $item)
                            <option value="{{ $item->id }}">{{ $item->propertiesName }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="selectedOptions">Các thuộc tính đã chọn:</label>
                    <div class='sl_p form-group mb-3' id="selectedOptions"></div>
                </div>

                <a id="addProperties" class="btn btn-primary" onclick="addAttributes()">Thêm thuộc tính</a> --}}


                <div class="d-grid mx-auto text-center">
                    <button type="submit" class="btn btn-outline-success ">Thêm</button>
                </div>
            </form>


        </div>
    </div>
</div>
