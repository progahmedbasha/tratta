<div class="container-fluid py-4" id="crcl_calculator">
    <div class="row">
        <div class="col-lg-12">
            <div class="row" style=" justify-content: center; ">
                <div class="col-md-11 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Crcl Calculator</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <label>Age Range</label>
                            @foreach ($ages as $age )
                            <form action="{{route('ages.update',$age->id)}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Ages"
                                            value="{{$age->name}}" name="name" disabled />
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="From"
                                            value="{{$age->from}}" name="from" disabled />
                                        @error('from')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="To" value="{{$age->to}}"
                                            name="to" disabled />
                                        @error('to')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1">
                                        <div class="input-group-append">
                                            {{-- <button class="btn bg-gradient-info mb-0" type="submit"><i
                                                    class="fas fa-edit"></i></button> --}}
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <br>
                            @endforeach
                            <br>
                            <hr class="horizontal dark mt-0">
                            <label>Weight range in relation to Gender</label>
                            @foreach ($weight_genders as $weight_gender )
                            <form action="{{route('weight_genders.update',$weight_gender->id)}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="weight_id" disabled/>
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
                                        <select class="form-control" name="gender_id" disabled/>
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
                                            value="{{$weight_gender->range_from}}" name="range_from" disabled />
                                        @error('range_from')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="To"
                                            value="{{$weight_gender->range_to}}" name="range_to" disabled />
                                        @error('range_to')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1">
                                        <div class="input-group-append">
                                            {{-- <button class="btn bg-gradient-info mb-0" type="submit"><i
                                                    class="fas fa-edit"></i></button> --}}
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <br>
                            @endforeach
                            <hr class="horizontal dark mt-0">
                            <label>Crcl range & Synonym Illness</label>
                            @foreach ($crcl_ranges as $crcl_range )
                            <form action="{{route('crcl_ranges.update',$crcl_range->id)}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="illness_sub_id" disabled/>
                                            <option value="">Select Sub</option>
                                            @foreach ($category_illness_subs as $category_illness_sub)
                                            @foreach ( $category_illness_sub->illnessSub as $category_sub_sub)
                                            <option value="{{$category_sub_sub->id}}" {{($crcl_range->
                                                illness_sub_id==$category_sub_sub->id)?
                                                'selected':''}}>
                                                {{$category_sub_sub->name}}
                                            </option>
                                            @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="From"
                                            value="{{$crcl_range->range_from}}" name="range_from" disabled />
                                        @error('range_from')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="To"
                                            value="{{$crcl_range->range_to}}" name="range_to" disabled />
                                        @error('range_to')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1">
                                        <div class="input-group-append">
                                            {{-- <button class="btn bg-gradient-info mb-0" type="submit"><i
                                                    class="fas fa-edit"></i></button> --}}
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <br>
                            @endforeach
                             <hr class="horizontal dark mt-0">
                            <label>Kidneys                                        <label class="rounded-circle" style="box-sizing: border-box; position: absolute;width: 28px;height: 25px;text-align: center;background-color: #333333;"> <img src="{{ url('data/kidney.svg') }}" alt='' /> </label>
</label>
                             @foreach ($kidneys as $kidneys )
                            <form action="{{route('crcl_ranges.update',$kidneys->id)}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="illness_sub_id" disabled>
                                            <option value="">Select Sub</option>
                                            @foreach ($illness_subs as $illness_sub)
                                            <option value="{{$illness_sub->id}}" {{($kidneys->
                                                illness_sub_id==$illness_sub->id)?
                                                'selected':''}}>
                                                {{$illness_sub->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="From"
                                            value="{{$kidneys->text}}" name="text" disabled />
                                        @error('text')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1">
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