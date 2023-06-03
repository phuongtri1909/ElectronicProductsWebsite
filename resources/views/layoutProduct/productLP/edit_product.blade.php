<div class="cotainer">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="card-header text-center">Sửa sản phẩm</h3>
          
            <form method="POST" action="{{route('product.update', $idProduct)}}"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="productCategory">Danh mục</label>
                    <select class="form-select form-control" aria-label="Default select example" id="productCategory"
                        name="productCategory">  
                            <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                    </select>
                </div>
    
                <div class="form-floating mb-3">
                    <label for="productName">Tên sản phẩm</label>
                    <input value="{{$product[0]->productName }}" type="text" placeholder="Tên sản phẩm" id="productName" class="form-control"
                        name="productName" required autofocus>
                    @if ($errors->has('productName'))
                        <span class="text-danger">{{ $errors->first('productName') }}</span>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="productPrice">Giá sản phẩm</label>
                    <input value="{{$product[0]->productPrice }}" type="number" placeholder="Gía sản phẩm" id="productPrice" class="form-control"
                        name="productPrice" required autofocus>
                    @if ($errors->has('productPrice'))
                        <span class="text-danger">{{ $errors->first('productPrice') }}</span>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="productManu">Hãng sản xuất</label>
                    <select class="form-select form-control" aria-label="Default select example" id="productManu"
                        name="productManu">
                        @foreach ($manufacturers as $value)
                        @if ($value->id == $product[0]->productManu)
                        <option selected="selected" value="{{ $value->id }}">{{ $value->manufacturerName }}</option>
                        @else
                        <option value="{{ $value->id }}">{{ $value->manufacturerName }}</option>
                        @endif         
                        @endforeach
                    </select>
                </div>

                {{-- <div class="form-group mb-3">
                    <label for="productImage">Hình ảnh</label>
                    <input multiple type="file" id="productImage" class="form-control" name="productImage[]" required>
                    @if ($errors->has('productImage'))
                        <span class="text-danger">{{ $errors->first('productImage') }}</span>
                    @endif
                </div> --}}

                <div class="mb-3">
                    <label for="descriptionProduct" class="form-label">Mô tả sản phẩm</label>
                    <textarea class="form-control" id="descriptionProduct" name="descriptionProduct" rows="3">{{$product[0]->descriptionProduct }} </textarea>
                    @if ($errors->has('descriptionProduct'))
                        <span class="text-danger">{{ $errors->first('descriptionProduct') }}</span>
                    @endif
                </div>

                <label for="attributes">Các thuộc tính:</label>

                 @if($category->id == $idCategoryBefor)
                 
                    @foreach ($productAttributes as $attribute)

                <div class="form-group mb-3">
                    <label for="attribute_{{ $attribute->id }}">{{ $attribute->propertiesName }}</label>
                    <input value="{{ $attribute->attribute_value }}" type="text" placeholder="{{ $attribute->propertiesName }}" id="attribute_{{ $attribute->id }}" class="form-control"
                        name="attributesBefore[{{ $attribute->id }}]" required >
                    @if ($errors->has('attribute_{{ $attribute->attribute_id }}'))
                        <span class="text-danger">{{ $errors->first('') }}</span>
                    @endif
                </div>

                @endforeach

                 @else

                    @foreach ($result as $attribute)
                <div class="form-group mb-3">
                    <label for="attribute_{{ $attribute->id }}">{{ $attribute->propertiesName }}</label>
                    <input type="text" placeholder="{{ $attribute->propertiesName }}" id="attribute_{{ $attribute->id }}" class="form-control"
                        name="attributesAfter[{{ $attribute->id }}]" required >
                    @if ($errors->has('propertiesValue'))
                        <span class="text-danger">{{ $errors->first('propertiesValue') }}</span>
                    @endif
                </div>

                @endforeach                
                 
                @foreach ($productAttributes as $attribute)

                <div class="form-group mb-3">        
                    <input hidden  value="{{ $attribute->id }}"type="text" placeholder="{{ $attribute->propertiesName }}" id="attribute_{{ $attribute->id }}" class="form-control"
                        name="attributes[{{ $attribute->id }}]" required >
                </div>
                
                @endforeach

                @endif


                <div class="d-grid mx-auto text-center">

                    <button type="submit" class="btn btn-outline-success ">Sửa</button>

                    <a href="{{route('product.index')}}" class="btn btn-outline-secondary ">                 
                        <span class="text">Hủy</span>
                    </a>
                </div>
            </form>


        </div>
    </div>
</div>
