<div class="container-fluid py-4" id="drug_formula">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-11 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Drug Formula</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <form action="{{route('formulas.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Name" name="name"
                                            value="{{old('name')}}" required />
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="file" class="form-control" id="customFile" name="icon" required />
                                        @error('icon')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1">
                                        <div class="input-group-append">
                                            <x-dashboard.add-button type="submit"></x-dashboard.add-button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <hr class="horizontal dark mt-0">
                            @foreach ($formulas as $formula )
                            <form action="{{route('formulas.update',$formula->id)}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col-5">
                                        <input type="text" class="form-control" placeholder="Name"
                                            value="{{$formula->name}}" name="name" required />
                                        @error('type')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- <div class="col">
                                        <div class="row"> --}}
                                            <div class="col col-lg-1">
                                                @if(!empty($formula->icon))
                                                <img src="{{url('/data/drug_formulas')}}/{{$formula->icon }}"
                                                    class="w3-round" width="50px" alt="Norway">
                                                @else
                                                <img src="{{url('/data/error.png')}}" class="w3-round" width="50px"
                                                    alt="Norway">
                                                @endif
                                            </div>
                                            <div class="col-4">
                                                <input type="file" class="form-control" id="customFile" name="icon" />
                                                @error('icon')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        {{-- </div> --}}
                                        @error('icon')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    {{-- </div> --}}
                                    <div class="col-1">
                                        <div class="input-group-append">
                                            <x-dashboard.edit-button></x-dashboard.edit-button>
                                        </div>
                                    </div>
                            </form>
                                    <div class="col-1">
                                        <form action="{{route('formulas.destroy',$formula->id)}}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <x-dashboard.delete-button></x-dashboard.delete-button>
                                        </form>
                                    </div>
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