{{-- formula card  --}}
<div class="card">
    <div class="card-header pb-0 p-3">
        <div class="row">
            <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">Trade Name</h6>
            </div>
            <div class="col-6 text-end">
                <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
            </div>
        </div>
    </div>
    <div class="card-body p-3">
        <form action="{{route('trades.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $drug->id }}" name="drug_id">
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" name="country_id" required />
                    <option value="">Select Countries</option>
                    @foreach ($countries as $country)
                    <option value="{{$country->id}}" {{(old($country->id)==$country->id)?
                        'selected':''}}>
                        {{$country->name}}
                    </option>
                    @endforeach
                    </select>
                    @error('country_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <input class="form-control" placeholder="Name Sub" value="{{old('name_sub')}}" name="name_sub"
                        required />
                    @error('name_sub')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('effect_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <input class="form-control" placeholder="Name Key" value="{{old('name_key')}}" name="name_key"
                        required />
                    @error('name_key')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-2"></div>
                <div class="col-1">
                    <div class="input-group-append">
                        <button class="btn bg-gradient-dark mb-0" type="submit"><i class="fas fa-save"></i></button>
                    </div>
                </div>
            </div>
            <br>
        </form>
        <br>
        <hr class="horizontal dark mt-0">
        @foreach ($trades as $trade )
        <form action="{{route('trades.update',$trade->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <input type="hidden" value="{{ $drug->id }}" name="drug_id">
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" name="country_id" required />
                    <option value="">Select Countries</option>
                    @foreach ($countries as $country)
                    <option value="{{$country->id}}" {{($trade->country_id==$country->id)?
                        'selected':''}}>
                        {{$country->name}}
                    </option>
                    @endforeach
                    </select>
                    @error('country_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <input class="form-control" placeholder="Name Sub" value="{{$trade->name_sub}}" name="name_sub"
                        required />
                    @error('name_sub')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('effect_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <input class="form-control" placeholder="Name Key" value="{{$trade->name_key}}" name="name_key"
                        required />
                    @error('name_key')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-1"></div>
                <div class="col-md-1">
                    <div class="input-group-append">
                        <button class="btn bg-gradient-info mb-0" type="submit"><i class="fas fa-edit"></i></button>
                    </div>
                </div>
        </form>
        <div class="col">
            <form action="{{route('trades.destroy',$trade->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </form>
        </div>
    </div>
    <br>
    @endforeach
</div>
</div>
<br>