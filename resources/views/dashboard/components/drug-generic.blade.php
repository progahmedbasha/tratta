<div class="container-fluid py-4">
  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <div class="col-md-11 mb-lg-0 mb-4">
          @foreach ($categories as $category )
          {{-- start card --}}
          <div class="card">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">{{ $category->name }}</h6>
                </div>
                <div class="col-6 text-end">
                  <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                </div>
              </div>
            </div>
            <div class="card-body p-3">
              <form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="row">
                  <div class="col-md-11">
                    <input type="text" class="form-control" placeholder="Drug Category" value="{{$category->name}}"
                      name="name" required />
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-1">
                    <div class="input-group-append">
                      <button class="btn bg-gradient-info mb-0" type="submit"><i class="fas fa-edit"></i></button>
                    </div>
                  </div>
                </div>
              </form>
              {{-- here to add sub --}}
              <label>Add Sub Category</label>
              <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col">
                    <input type="hidden" value={{ $category->id }} name="parent_id">
                    <input type="text" class="form-control" placeholder="Add Key" name="name" value="{{old('name')}}"
                      required />
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  {{-- <div class="col">
                    <input type="text" class="form-control" placeholder="Add Key" name="name" value="{{old('name')}}"
                  required />
                  @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div> --}}
                <div class="col-1">
                  <div class="input-group-append">
                    <button class="btn bg-gradient-dark mb-0" type="submit"><i class="fas fa-plus"></i></button>
                  </div>
                </div>
            </div>
            </form>
            <br>
            <hr class="horizontal dark mt-0">
            @foreach ($category->child as $category_sub )
            <form action="{{route('categories.update',$category_sub->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('patch')
              <div class="row">
                <div class="col-md-11">
                  <input type="hidden" name="parent_id" value="{{ $category_sub->parent_id }}">
                  <input type="text" class="form-control" placeholder="Key Name" value="{{$category_sub->name}}"
                    name="name" required />
                  @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-1">
                  <div class="input-group-append">
                    <button class="btn bg-gradient-info mb-0" type="submit"><i class="fas fa-edit"></i></button>
                  </div>
                </div>
              </div>
            </form>
            <form action="{{route('drugs.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <input type="hidden" name="parent_id" value="{{ $category_sub->id }}">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Add Sub (drug)" name="name"
                    value="{{old('name')}}" required />
                  @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-1">
                  <div class="input-group-append">
                    <button class="btn bg-gradient-dark mb-0" type="submit"><i class="fas fa-plus"></i></button>
                  </div>
                </div>
              </div>
            </form>
            <br>
            <div class="card col-6">
              <div class="card-header bg-info text-white" style="padding: 0.1rem;"> <label>Sub Subs :</label></div>
              <div class="card-body" style="padding: 0.5rem;">
                @foreach ($category_sub->drug as $drug )
                <form action="{{route('drugs.update',$drug->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('patch')
                  <div class="row">
                    <div class="col-md-5">
                      <input type="text" class="form-control" placeholder="Drug Category" value="{{$drug->name}}"
                        name="name" required />
                      @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-md-5">
                      <input type="text" class="form-control" value="{{$drug->code}}" disabled />
                    </div>
                    {{-- <input type="hidden" name="parent_id" value="{{ $drug->parent_id }}"> --}}
                    <div class="col-2">
                      <div class="input-group-append">
                        <button class="btn bg-gradient-info mb-0" type="submit"><i class="fas fa-edit"></i></button>
                      </div>
                    </div>
                  </div>
                </form>
                <br>
                @endforeach
              </div>
            </div>
            <br>
            @endforeach
            {{-- here to add sub sub  --}}
            <br>
          </div>
        </div>
        {{-- end card --}}
        <br>
        @endforeach
      </div>
    </div>
  </div>
</div>
</div>