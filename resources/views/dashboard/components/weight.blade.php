<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-11 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Weight</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <form action="{{route('weights.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-11">
                                        <input type="text" class="form-control" placeholder="Weight" name="weight"
                                            value="{{old('weight')}}" required />
                                        @error('weight')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1">
                                        <div class="input-group-append">
                                            <button class="btn bg-gradient-dark mb-0" type="submit"><i
                                                    class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <hr class="horizontal dark mt-0">
                            @foreach ($weights as $weight )
                            <form action="{{route('weights.update',$weight->id)}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col-md-11">
                                        <input type="text" class="form-control" placeholder="Weight"
                                            value="{{$weight->weight}}" name="weight" required />
                                        @error('weight')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1">
                                        <div class="input-group-append">
                                            <button class="btn bg-gradient-info mb-0" type="submit"><i
                                                    class="fas fa-edit"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>