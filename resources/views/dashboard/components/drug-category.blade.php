<div class="container-fluid py-4">
   <h1 style="text-align: center;font-family: cursive;color:black;">Drug Data</h1>
   <div class="row">
      <div class="col-lg-12">
         <div class="row">
            <div class="col-md-11 mb-lg-0 mb-4">
               <div class="card">
                  <div class="card-header pb-0 p-3">
                     <div class="row">
                        <div class="col-6 d-flex align-items-center">
                           <h6 class="mb-0">Drug Category</h6>
                        </div>
                        <div class="col-6 text-end">
                           <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                        </div>
                     </div>
                  </div>
                  <div class="card-body p-3">
                     <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           <div class="col-md-11">
                              <input type="text" class="form-control" placeholder="Drug Category" name="name"
                                 value="{{old('name')}}" required />
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
                     @foreach ($categories as $category )
                     <form action="{{route('categories.update',$category->id)}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row">
                           <div class="col-md-11">
                              <input type="text" class="form-control" placeholder="Drug Category"
                                 value="{{$category->name}}" name="name" required />
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