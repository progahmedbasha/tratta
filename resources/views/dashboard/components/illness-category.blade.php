<div class="container-fluid py-4">
    <h1 style="text-align: center;font-family: cursive; color:black;">Illness Data</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-11 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Illness Category</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <form action="{{route('illness_categories.store')}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-11">
                                        <input type="text" class="form-control" placeholder="Illness Category"
                                            name="name" value="{{old('name')}}" required />
                                        @error('name')
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
                            @foreach ($parent_illness_categories as $illness_category )
                            <form action="{{route('illness_categories.update',$illness_category->id)}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" placeholder="Drug Category"
                                            value="{{$illness_category->name}}" name="name" required />
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1">
                                        <div class="input-group-append">
                                            <button class="btn bg-gradient-info mb-0" type="submit"><i
                                                    class="fas fa-edit"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        @if($illness_category->active =='0')
                                        <label class="switch">
                                            <input type="checkbox" class="actives" checked value="1" name="active"
                                                data-id="{{ $illness_category->id }}">
                                            <span class="slider round"></span>
                                        </label>
                                        @endif
                                        @if($illness_category->active =='1')
                                        <label class="switch">
                                            <input type="checkbox" class="actives" value="0" name="active"
                                                data-id="{{ $illness_category->id }}">
                                            <span class="slider round"></span>
                                        </label>
                                        @endif
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
@include('dashboard.components.radio_button_status_style')
@include('dashboard.components.illness_category_active_status')