@extends('dashboard.layouts.master')
@section('content')
@if(Session::has('success'))
<script>
    toastr.success(" {{ Session::get('success') }} ");
</script>
@endif
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <h1 style="text-align: center;font-family: cursive;color:black;">Third Question</h1>
                <div class="col-md-11 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <div class="row">

                                <div class="col-6 text-end">
                                    <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <form action="{{route('third_questions.store')}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $id }}" name="predose_id">
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" id="variables0" onchange="selectVariable(0)"
                                            name="variable[]" required />
                                        <option value="">Select Varirables</option>
                                        <option value="ages">Ages</option>
                                        <option value="weights">Weights</option>
                                        <option value="genders">Genders</option>
                                        <option value="pregnancy_stages">Pregnancy Stages</option>
                                        <option value="illness">Illness Data</option>
                                        <option value="drugs">Drug Data</option>
                                        </select>
                                        @error('variable')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <select class=" form-control" id="variable_data0" required />
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="text"
                                            value="{{old('text')}}" name="text" required>
                                        @error('from')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-10"></div>
                                    <div class="col-1">
                                        <div class="input-group-append">
                                            <x-dashboard.save-button></x-dashboard.save-button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <hr class="horizontal dark mt-0">
                            @foreach ($questions as $question )
                            <input type="hidden" value="{{ $id }}" name="predose_id">
                            @if ($question->variableable_type == 'App\Models\Age')
                            <div class="row">
                                <div class="col-3">
                                    <input type="text" class="form-control" value="Age" disabled /><br>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control" value="{{ $question->age->name }}"
                                        disabled /><br>
                                </div>
                            </div>
                            @elseif ($question->variableable_type == 'App\Models\Gender')
                            <div class="row">
                                <div class="col-3">
                                    <input type="text" class="form-control" value="Gender" disabled /><br>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control" value="{{ $question->gender->name }}"
                                        disabled /><br>
                                </div>
                            </div>
                            @elseif ($question->variableable_type == 'App\Models\Weight')
                            <div class="row">
                                <div class="col-3">
                                    <input type="text" class="form-control" value="Weight" disabled /><br>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control" value="{{ $question->weight->weight }}"
                                        disabled /><br>
                                </div>
                            </div>
                            @elseif ($question->variableable_type == 'App\Models\PregnancyStage')
                            <div class="row">
                                <div class="col-3">
                                    <input type="text" class="form-control" value="Pregnancy Stage" disabled /><br>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control"
                                        value="{{ $question->pregnancyStage->pregnancy_stage }}" disabled /><br>
                                </div>
                            </div>
                            @elseif ($question->variableable_type == 'App\Models\IllnessSub')
                            <div class="row">
                                <div class="col-3">
                                    <input type="text" class="form-control" value="Illness Data" disabled /><br>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control" value="{{ $question->illnessSub->name }}"
                                        disabled /><br>
                                </div>
                            </div>
                            @elseif ($question->variableable_type == 'App\Models\Drug')
                            <div class="row">
                                <div class="col-3">
                                    <input type="text" class="form-control" value="Drug" disabled /><br>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control" value="{{ $question->drug->name }}"
                                        disabled /><br>
                                </div>
                            </div>
                            @endif
                            <br>
                            <form action="{{route('third_questions.update',$question->id)}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="text"
                                            value="{{$question->text}}" name="text" required>
                                        @error('from')
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
                                <form action="{{route('third_questions.destroy',$question->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-dashboard.delete-button></x-dashboard.delete-button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                        <a href="{{ route('drugs.show', $predose_drug_id->drug_id) }}" class="btn btn-primary">
                            <span class="fas fa-backward"></span> Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    ////////////////////for fetch variables////////////
	   function selectVariable(number) {
              var variable = document.getElementById('variables'+number).value;
              console.log(variable);
              $.ajax({
                  url: "{{route('forbidden_fetch_variables')}}",
                  type: "POST",
                  data: {
                      variable: variable,
                      _token: '{{csrf_token()}}'
                  },
                 success:function(response){
					     document.getElementById('variable_data'+number).innerHTML = (response.result);
                         var name = 'object_id['+variable+'][]'
                         document.getElementById('variable_data'+number).name = name;
                  },
              });
      }
    ////////////////////for fetch variables////////////
</script>