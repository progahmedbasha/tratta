<div class="container-fluid py-4">
    <h1 style="text-align: center;font-family: cursive; color:black;">Add Subs Without Key</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-11 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Illness Subs</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <form action="{{route('illness_subs.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-5">
                                        <select class="form-control" name="illness_category_id" required>
                                            <option value="">Select Category</option>
                                            @foreach ($parent_illness_categories as $parent_category)
                                            <option value="{{$parent_category->id}}">
                                                {{$parent_category->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('illness_category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
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
                            @foreach ($illness_subs as $illness_sub )
                            <form action="{{route('illness_subs.update',$illness_sub->id)}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="illness_category_id" value="{{ $illness_sub->illness_category_id }}">
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" placeholder="Drug Category"
                                            value="{{$illness_sub->name}}" name="name" required />
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