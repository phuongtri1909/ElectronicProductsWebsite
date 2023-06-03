<div class="cotainer">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="card-header text-center">Sửa hãng sản xuất</h3>
            <form action="{{route('updateManufacturer.admin', $manufacturer->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group mb-3">
                    <input value="{{$manufacturer['manufacturerName']  }}" type="text" placeholder="Tên hãng sản xuất" id="manufacturerName" class="form-control"
                        name="manufacturerName" required autofocus>
                    @if ($errors->has('manufacturerName'))
                        <span class="text-danger">{{ $errors->first('manufacturerName') }}</span>
                    @endif
                </div>

                <div class="d-grid mx-auto text-left">                 
                    <button type="submit" class="btn btn-outline-success ">Sửa</button>
                    <a href="{{route('manufacturer')}}" class="btn btn-outline-secondary ">                 
                        <span class="text">Trở về</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
