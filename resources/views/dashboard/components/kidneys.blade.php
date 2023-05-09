<div class="container-fluid py-4" id="kidney">
    <div class="row">
        <div class="col-lg-12">
            <div class="row" style=" justify-content: center; ">
                <div class="col-md-11 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Kidneys
                                        <label class="rounded-circle" style="box-sizing: border-box; position: absolute;width: 28px;height: 25px;text-align: center;background-color: #333333;"> <img src="{{ url('data/kidney.svg') }}" alt='' /> </label>
                                    </h6>
                                </div>
                                <div class="col-6 text-end">
                                    <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            {{-- <form action="{{route('kidneys.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <select class="form-control" name="illness_sub_id" required>
                                        <option value="">Select Sub</option>
                                        @foreach ($illness_subs as $illness_sub)
                                        <option value="{{$illness_sub->id}}">
                                            {{$illness_sub->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('illness_sub_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Text" value="{{old('text')}}"
                                        name="text" required />
                                    @error('text')
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
                            <hr class="horizontal dark mt-0"> --}}
                            @foreach ($kidneys as $kidneys )
                            <form action="{{route('kidneys.update',$kidneys->id)}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="illness_sub_id" required>
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
                                            value="{{$kidneys->text}}" name="text" required />
                                        @error('text')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1">
                                        <div class="input-group-append">
                                            <x-dashboard.edit-button></x-dashboard.edit-button>
                                        </div>
                                    </div>
                            </form>
                            {{-- <div class="col-1">
                                        <form action="{{route('kidneys.destroy',$kidneys->id)}}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <x-dashboard.delete-button></x-dashboard.delete-button>
                            </form>
                        </div> --}}
                    </div>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>