<div class="container-fluid py-4">
  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <div class="col-md-11 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Illness</h6>
                </div>
                <div class="col-6 text-end">
                  <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                </div>
              </div>
            </div>
            <div class="card-body p-3">
              {{-- here to add sub --}}
              <form action="{{route('illness_categories.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col">
                    <select class="form-control" name="parent_id" required>
                      <option value="">Select Category</option>
                      @foreach ($parent_illness_categories as $parent_category)
                      <option value="{{$parent_category->id}}">
                        {{$parent_category->name}}
                      </option>
                      @endforeach
                    </select>
                    @error('parent_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Add Key" name="name" value="{{old('name')}}" />
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Add Sub Without Key" name="sub_name"
                      value="{{old('name')}}" />
                  </div>
                  <div class="col-1">
                    <div class="input-group-append">
                      <button class="btn bg-gradient-dark mb-0" type="submit"><i class="fas fa-plus"></i></button>
                    </div>
                  </div>
                </div>
              </form>
              <br>
              <hr class="horizontal dark mt-0">
              @foreach ($parent_illness_categories as $parent_cat )
              @foreach ($parent_cat->child as $category_sub )
              <form action="{{route('illness_categories.update',$category_sub->id)}}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="row">
                  <div class="col-3">
                    <input type="text" class="form-control" value="{{ $category_sub->parent->name }}" disabled>
                  </div>
                  <div class="col-md-8">
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
              <form action="{{route('illness_subs.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <input type="hidden" name="illness_category_id" value="{{ $category_sub->id }}">
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Add Sub" name="name" value="{{old('name')}}"
                      required />
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
                  @foreach ($category_sub->illnessSub as $category_sub_sub )
                  <form action="{{route('illness_subs.update',$category_sub_sub->id)}}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="row">
                      <div class="col-md-10">
                        <input type="text" class="form-control" placeholder="Drug Category"
                          value="{{$category_sub_sub->name}}" name="name" required />
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <input type="hidden" name="illness_category_id" value="{{ $category_sub->id }}">
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
              {{-- show subs without keys --}}
              {{-- @foreach ($parent_cat->illnessSub as $illness_sub ) --}}
              <div class="card col-6">
                <div class="card-header bg-secondary text-white" style="padding: 0.1rem;"> <label>Sub Subs without
                    key:</label></div>
                <div class="card-body" style="padding: 0.5rem;">
                @foreach ($parent_cat->illnessSub as $illness_sub )
                  <form action="{{route('illness_subs.update',$illness_sub->id)}}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="illness_category_id" value="{{ $illness_sub->illness_category_id }}">
                    <div class="row">
                      <div class="col-4">
                        <input type="text" class="form-control" placeholder="Sub Sub name"
                          value="{{$illness_sub->illnessCategory->name }}" disabled/>
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" placeholder="Sub Sub name"
                          value="{{$illness_sub->name}}" name="name" required />
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col">
                        <div class="input-group-append">
                          <button class="btn bg-gradient-info mb-0" type="submit"><i class="fas fa-edit"></i></button>
                        </div>
                      </div>
                    </div>
                  </form>
                  <br>
                   @endforeach
                  <br>
                </div>
              </div>
             
              <br>
              @endforeach
         
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>