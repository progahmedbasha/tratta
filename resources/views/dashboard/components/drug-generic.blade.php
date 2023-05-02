<div class="container-fluid py-4">
  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <div class="col-md-11 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Drug Generic</h6>
                </div>
                <div class="col-6 text-end">
                  <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                </div>
              </div>
            </div>
            <div class="card-body p-3">
              {{-- here to add sub --}}
              <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col">
                    <select class="form-control" name="parent_id" required>
                      <option value="">Select Category</option>
                      @foreach ($categories as $parent_category)
                      <option value="{{$parent_category->id}}" {{($id==$parent_category->id)?
                        'selected':''}}>
                        {{$parent_category->name}}
                      </option>
                      @endforeach
                    </select>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Add Key" name="name" value="{{old('name')}}"
                      required />
                    @error('name')
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
              @foreach ($category_child as $category)
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control" value="{{ $category->name }}" style="background-color: #FFE976;"
                  disabled>
              </div>
              @foreach ($category->child as $category_sub )
              <form action="{{route('categories.update',$category_sub->id)}}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="row">
                  <div class="col-md-6">
                    <input type="hidden" name="parent_id" value="{{ $category_sub->parent_id }}">
                    <input type="text" class="form-control" placeholder="Key Name" style="background-color: #F5F5F5;"
                      value="{{$category_sub->name}}" name="name" required />
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-1">
                    <div class="input-group-append">
                      <x-dashboard.edit-button></x-dashboard.edit-button>
                    </div>
                  </div>
              </form>
              <div class="col-1">
                <form action="{{route('categories.destroy',$category_sub->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <x-dashboard.delete-button></x-dashboard.delete-button>
                </form>
              </div>
            </div>
            <form action="{{route('drugs.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <input type="hidden" name="parent_id" value="{{ $category_sub->id }}">
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Add Sub" name="name" value="{{old('name')}}"
                    required />
                  @error('name')
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
            @foreach ($category_sub->drug as $drug )
            <form action="{{route('drugs.update',$drug->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('patch')
              <div class="row">
                <div class="col-md-4">
                  <input type="text" class="form-control" placeholder="Drug Category" value="{{$drug->name}}"
                    name="name" required />
                  @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-2">
                  <input type="text" class="form-control" value="{{$drug->code}}" disabled />
                </div>
                {{-- <input type="hidden" name="parent_id" value="{{ $drug->parent_id }}"> --}}
                <div class="col-1">
                  <div class="input-group-append">
                    <x-dashboard.edit-button></x-dashboard.edit-button>
                  </div>
                </div>
            </form>
            <div class="col-1">
              <form action="{{route('drugs.destroy',$drug->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <x-dashboard.delete-button></x-dashboard.delete-button>
              </form>
            </div>
            @endforeach

          </div>

          @endforeach
          @endforeach

          {{-- here to add sub sub  --}}
        </div>
        <a href="{{ route('categories.index') }}" class="btn btn-primary">
          <span class="fas fa-backward"></span> Back
        </a>
      </div>
    </div>
  </div>
</div>
</div>
</div>