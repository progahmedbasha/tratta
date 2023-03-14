<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-11 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Crcl range & Synonym Illness</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <form action="{{route('crcl_ranges.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="illness_category_id" required>
                                            <option value="">Select Sub</option>
                                            @foreach ($category_illness_subs as $category_illness_sub)
                                            @foreach ( $category_illness_sub->subCategory as $category_sub_sub)
                                            <option value="{{$category_sub_sub->id}}">
                                                {{$category_sub_sub->name}}
                                            </option>
                                            @endforeach
                                            @endforeach
                                        </select>
                                        @error('illness_category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="number" step="any" class="form-control" placeholder="From"
                                            value="{{old('range_from')}}" name="range_from" required />
                                        @error('range_from')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="number" step="any" class="form-control" placeholder="To"
                                            value="{{old('range_to')}}" name="range_to" required />
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
                            @foreach ($crcl_ranges as $crcl_range )
                            <form action="{{route('crcl_ranges.update',$crcl_range->id)}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="illness_category_id" required>
                                            <option value="">Select Sub</option>
                                            @foreach ($category_illness_subs as $category_illness_sub)
                                            @foreach ( $category_illness_sub->subCategory as $category_sub_sub)
                                            <option value="{{$category_sub_sub->id}}" {{($crcl_range->
                                                illness_category_id==$category_sub_sub->id)?
                                                'selected':''}}>
                                                {{$category_sub_sub->name}}
                                            </option>
                                            @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="number" step="any" class="form-control" placeholder="From"
                                            value="{{$crcl_range->range_from}}" name="range_from" required />
                                        @error('range_from')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="number" step="any" class="form-control" placeholder="To"
                                            value="{{$crcl_range->range_to}}" name="range_to" required />
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