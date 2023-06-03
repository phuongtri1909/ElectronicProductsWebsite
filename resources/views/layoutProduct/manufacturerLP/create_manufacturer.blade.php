<div class="cotainer">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="card-header text-center">Thêm hãng sản xuất</h3>
            <form action="{{route('createManufacturer.admin')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" placeholder="Tên hãng sản xuất" id="manufacturerName" class="form-control"
                        name="manufacturerName" required autofocus>
                    @if ($errors->has('manufacturerName'))
                        <span class="text-danger">{{ $errors->first('manufacturerName') }}</span>
                    @endif
                </div>

                <div class="d-grid mx-auto text-left">                 
                    <button type="submit" class="btn btn-outline-success ">Thêm</button>
                    <a href="{{route('manufacturer')}}" class="btn btn-outline-secondary ">                 
                        <span class="text">Trở về</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
