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
                           <form action="{{route('drugs.store')}}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                                 <div class="col-md-11">
                                    <input type="text" class="form-control" value="{{$drug->name}}"
                                       disabled>
                                 </div>
                              </div>
                              <br>
                           </form>
                        </div>
                     </div>
                     <br>
                     {{-- formula card  --}}
                     <div class="card">
                        <div class="card-header pb-0 p-3">
                           <div class="row">
                              <div class="col-6 d-flex align-items-center">
                                 <h6 class="mb-0">Formula_ICO</h6>
                              </div>
                              <div class="col-6 text-end">
                                 <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                              </div>
                           </div>
                        </div>
                        <div class="card-body p-3">
                           <form action="{{route('drug_formulas.store')}}" method="post"
                              enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" value="{{ $drug->id }}" name="drug_id">
                              <div class="row">
                                 <div class="col-md-11">
                                    <select class="form-control" name="formula_id" required>
                                       <option value="">Generic Name w formula</option>
                                       {{-- @if(isset($drug->to )) --}}
                                       @foreach ($formulas as $formula )
                                       <option value="{{$formula->id}}" {{($drug->
                                       formula_id==$formula->id)?
                                       'selected':''}}>
                                       {{$formula->name}}
                                       </option>
                                       @endforeach
                                    </select>
                                    @error('formula_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                 </div>
                              </div>
                              <br>
                              <div class="row">
                                 <div class="col-1" style="margin-left: 84%;">
                                    <div class="input-group-append">
                                       <button class="btn bg-gradient-dark mb-0" type="submit"><i
                                          class="fas fa-save"></i></button>
                                    </div>
                                 </div>
                              </div>
                           </form>
                           @foreach ($drug_formulas as $drug_formula)
                           <div class="row">
                              <div class="col-md-8">
                                 <input type="text" class="form-control"
                                    value="{{$drug_formula->formula->name}}" disabled>
                              </div>
                              <div class="col-1">
                                 <form action="{{route('drug_formulas.destroy',$drug_formula->id)}}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                 </form>
                              </div>
                           </div>
                           {{-- <br> --}}
                           @endforeach
                        </div>
                     </div>
                     <br>
                     {{-- indication card --}}
                     <div class="card">
                        <div class="card-header pb-0 p-3">
                           <div class="row">
                              <div class="col-6 d-flex align-items-center">
                                 <h6 class="mb-0">Indication</h6>
                              </div>
                              <div class="col-6 text-end">
                                 <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                              </div>
                           </div>
                        </div>
                        <div class="card-body p-3">
                           <form action="{{route('drug_indications.store')}}" method="post"
                              enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" value="{{ $drug->id }}" name="drug_id">
                              <div class="row">
                                 <div class="col-md-11">
                                    <select class="form-control" name="indication_id" required>
                                       <option value="">Indication</option>
                                       {{-- @if(isset($drug->to )) --}}
                                       @foreach ($indications as $indication )
                                       <option value="{{$indication->id}}" {{($drug->
                                       indication_id==$indication->id)?
                                       'selected':''}}>
                                       {{$indication->indication_title}}
                                       </option>
                                       @endforeach
                                    </select>
                                    @error('indication_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                 </div>
                              </div>
                              <br>
                              <div class="row">
                                 <div class="col-1" style="margin-left: 84%;">
                                    <div class="input-group-append">
                                       <button class="btn bg-gradient-dark mb-0" type="submit"><i
                                          class="fas fa-save"></i></button>
                                    </div>
                                 </div>
                              </div>
                           </form>
                           @foreach ($drug_indications as $drug_indication)
                           <div class="row">
                              <div class="col-md-5">
                                 <input type="text" class="form-control"
                                    value="{{$drug_indication->indication->indication_title}}" disabled>
                              </div>
                              <div class="col-md-4">
                                 <input type="text" class="form-control" value="{{$drug_indication->code}}"
                                    disabled>
                              </div>
                           </div>
                           <br>
                           @endforeach
                        </div>
                     </div>
                     <br>
                     {{-- Variable card --}}
                     <div class="card">
                        <div class="card-header pb-0 p-3">
                           <div class="row">
                              <div class="col-6 d-flex align-items-center">
                                 <h6 class="mb-0">1ry Variables</h6>
                              </div>
                              <div class="col-6 text-end">
                                 <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                              </div>
                           </div>
                        </div>
                        <div class="card-body p-3">
                           <form action="{{route('variables.store')}}" method="post"
                              enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" value="{{ $drug->id }}" name="drug_id">
                              <div class="row">
                                 <div class="col-md-3">
                                    <input type="radio" name="option" value="main_id" id="flexRadioDefault1"
                                       checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                    Main Id : ( {{ $drug->code }} )
                                    </label>
                                 </div>
                                 <div class="col-md-3">
                                    <input type="radio" name="option" value="sub_id" id="flexRadioDefault2">
                                    <select class="form-control" name="indication_id"
                                       style="width: 75%; display:inline;">
                                       <option value="">Indication</option>
                                       {{-- @if(isset($drug->to )) --}}
                                       @foreach ($variable_indications as $variable_indication)
                                       <option value="{{$variable_indication->id}}" {{($drug->
                                       indication_id==$variable_indication->id)?
                                       'selected':''}}>
                                       {{$variable_indication->indication->indication_title}}
                                       ({{$variable_indication->code}})
                                       </option>
                                       @endforeach
                                    </select>
                                 </div>
                                 <div class="col-2">
                                    <div class="input-group-append">
                                       <button class="btn bg-gradient-dark mb-0" type="submit"><i
                                          class="fas fa-save"></i></button>
                                    </div>
                                 </div>
                              </div>
                           </form>
                        </div>
                        <div class="card-body p-3">
                           <div class="col">
                              <table class="table table-striped">
                                 <thead>
                                    <tr>
                                       <th scope="col">Drug</th>
                                       <th scope="col">code</th>
                                       <th scope="col"><i style="font-size:24px" class="fa">&#xf013;</i>
                                          Action
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($variables as $variable)
                                    <tr>
                                       @if ($variable->variableable_type == "App\Models\Drug")
                                       <td>{{ $variable->drug->name }}</td>
                                       <td>{{ $variable->drug->code }}</td>
                                       @else
                                       <td>{{ $variable->drugIndication->indication->indication_title }}
                                       </td>
                                       <td>{{ $variable->drugIndication->code }}</td>
                                       @endif
                                       <td>
                                          {{-- 
                                          <div class="btn-icon-list">
                                             --}}
                                             <form action="{{route('variables.destroy',$variable->id)}}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="row">
                                                   <div class="col-1">
                                                      <a class="btn bg-gradient-info mb-0"
                                                         href="{{ route('variables.show', ['variable'=>$variable->id]) }}"><i
                                                         class="fas fa-edit"></i></a>
                                                   </div>
                                                   <div class="col-1">
                                                      <button class="btn btn-danger"><i
                                                         class="fa fa-trash"></i></button>
                                                   </div>
                                                   <div class="col-2">
                                                      <a class="btn bg-gradient-dark mb-0"
                                                         href="{{ route('fixed_doses_create', $variable->id) }}">Fixed Dose</a>
                                                   </div>
                                                   <div class="col-2">
                                                      <a class="btn bg-gradient-dark mb-0"
                                                         href="{{ route('fixed_doses_create', $variable->id) }}">Fixed Or</a>
                                                   </div>
                                                   <div class="col">
                                                      <a class="btn bg-gradient-dark mb-0"
                                                         href="{{ route('fixed_doses_create', $variable->id) }}">Fixed And</a>
                                                   </div>
                                                </div>
                                             </form>
                                             {{-- 
                                          </div>
                                          --}}
                                       </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection