@extends('dashboard.layouts.master')
@section('content')
@if(Session::has('success'))
<script>
   toastr.success(" {{ Session::get('success') }} ");
</script>
@endif
<div class="container-fluid py-4">
   <div class="row">
      <h1 style="text-align: center;font-family: cursive;color:black;">New Drug</h1>
      <div class="col-lg-12">
         <div class="row">
            <div class="col-lg-12">
               <div class="row">
                  <div class="col-md-11 mb-lg-0 mb-4">
                     <div class="card">
                        <div class="card-header pb-0 p-3">
                           <div class="row">
                              <div class="col-6 d-flex align-items-center">
                                 <h6 class="mb-0">Main ID : ( {{ $drug->code }} )</h6>
                              </div>
                              <div class="col-6 text-end">
                                 <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                              </div>
                           </div>
                        </div>
                        <div class="card-body p-3">

                           <div class="row">
                              <div class="col-md-11">
                                 <input type="text" class="form-control" value="{{$drug->name}}" disabled>
                              </div>
                           </div>
                           <br>
                        </div>
                     </div>
                     <br>
                     {{-- formula card  --}}
                     @include('dashboard.drugs.component.formula-card')
                     <br>
                     {{-- indication card --}}
                     @include('dashboard.drugs.component.indication-card')
                     <br>
                     {{-- Variable card --}}
                     @include('dashboard.drugs.component.Variable-card')
                     <br>
                     {{-- pregnancy card --}}
                     @include('dashboard.drugs.component.pregnancy')
                     {{-- treade name card --}}
                     @include('dashboard.drugs.component.trade')

                     {{-- pre-dose q card --}}
                     @include('dashboard.drugs.component.predose-q')
                     {{-- Moa card --}}
                     @include('dashboard.drugs.component.drug-moa')
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection