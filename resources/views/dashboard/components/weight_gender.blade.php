<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-11 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Weight Gender Ranges</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <form action="{{route('weight_genders.store')}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="weight_id">
                                            <option value="">Select Weight</option>
                                            @foreach ($weights as $weight)
                                            <option value="{{$weight->id}}">
                                                {{$weight->weight}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('weight_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="gender_id">
                                            <option value="">Select Gender</option>
                                            @foreach ($genders as $gender)
                                            <option value="{{$gender->id}}">
                                                {{$gender->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('gender_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="From" name="range_from"
                                            value="{{old('range_from')}}" required />
                                        @error('range_from')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="To" name="range_to"
                                            value="{{old('range_to')}}" required />
                                        @error('range_to')
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
                            @foreach ($weight_genders as $weight_gender )
                            <form action="{{route('weight_genders.update',$weight_gender->id)}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="weight_id">
                                            <option value="">Select Weight</option>
                                            @foreach ($weights as $weight)
                                            <option value="{{$weight->id}}" {{($weight_gender->
                                                weight_id==$weight->id)?
                                                'selected':''}}>
                                                {{$weight->weight}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="gender_id">
                                            <option value="">Select Gender</option>
                                            @foreach ($genders as $gender)
                                            <option value="{{$gender->id}}" {{($weight_gender->
                                                gender_id==$gender->id)?
                                                'selected':''}}>
                                                {{$gender->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('gender_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="From"
                                            value="{{$weight_gender->range_from}}" name="range_from" required />
                                        @error('range_from')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="To"
                                            value="{{$weight_gender->range_to}}" name="range_to" required />
                                        @error('range_to')
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