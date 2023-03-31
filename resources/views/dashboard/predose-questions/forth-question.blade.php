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
                <h1 style="text-align: center;font-family: cursive;color:black;">Fourth Question</h1>
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
                            <form action="{{route('fourth_questions.store')}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $id }}" name="predose_id">
                                @include('dashboard.predose-questions.component.renge-row')
                                <div class="row">
                                    <div class="col-10"></div>
                                    <div class="col-1">
                                        <div class="input-group-append">
                                            <x-dashboard.save-button></x-dashboard.save-button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @foreach ($question->predoseQuestionRange as $range)
                            <div class="row">
                                <div class="col">
                                    <input class="form-control" type="number" step="any" placeholder="from"
                                        value="{{$range->from}}" name="from[]" required>
                                    @error('from')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input class="form-control" type="number" step="any" placeholder="to"
                                        value="{{$range->to}}" name="to[]" required>
                                    @error('to')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <select class="form-control" name="illness_sub_id[]" required>
                                        <option value="">Select Illness Category</option>
                                        @foreach ($illness_subs as $illness_sub)
                                        <option value="{{$illness_sub->id}}" {{($range->
                                            illness_sub_id==$illness_sub->id)?
                                            'selected':''}}>
                                            {{$illness_sub->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            @endforeach
                            <hr class="horizontal dark mt-0">
                            <form action="{{route('save_q4_score')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $id }}" name="predose_id">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input inlineRadio1" type="radio" name="type"
                                                id="inlineRadio1" value="label">
                                            <label class="form-check-label" for="inlineRadio1">Label</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="type" id="inlineRadio2"
                                                value="sub">
                                            <label class="form-check-label" for="inlineRadio2">Sub</label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row" id="row_label" style="display: none;">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Label"
                                            value="{{ old('label') }}" name="label_score" requierd />
                                    </div>
                                </div>
                                <br>
                                <div id="row_sub" style="display: none;">
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-control" id="variables0" onchange="selectVariable2(0)"
                                                name="variable" />
                                            <option value="">Select Varirables</option>
                                            <option value="ages">Ages</option>
                                            <option value="weights">Weights</option>
                                            <option value="genders">Genders</option>
                                            <option value="pregnancy_stages">Pregnancy Stages</option>
                                            <option value="illness">Illness Data</option>
                                            <option value="drugs">Drug Data</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-control" style="width: 100%;" id="variable_data0" />
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Label"
                                                value="{{ old('label_sub') }}" name="label_sub" requierd />
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Point"
                                                value="{{ old('point') }}" name="point" requierd />
                                        </div>
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
                            @foreach ($question->fourthQuestionScore as $score)
                            @php
                            $point = null;
                            @endphp
                            @if ($score->is_sub == 0)
                            <label>label</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Label"
                                        value="{{ $score->score_label }}" name="label_score" requierd />
                                </div>
                            </div>
                            <form action="{{route('save_q4_score')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="type" value="sub">
                                <input type="hidden" name="parent_id" value="{{ $score->id }}">
                                <input type="hidden" value="{{ $id }}" name="predose_id">
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" id="variables{{ $score->id }}"
                                            onchange="selectVariable2({{ $score->id }})" name="variable" />
                                        <option value="">Select Varirables</option>
                                        <option value="ages">Ages</option>
                                        <option value="weights">Weights</option>
                                        <option value="genders">Genders</option>
                                        <option value="pregnancy_stages">Pregnancy Stages</option>
                                        <option value="illness">Illness Data</option>
                                        <option value="drugs">Drug Data</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" style="width: 100%;"
                                            id="variable_data{{ $score->id }}" />
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Label"
                                            value="{{ old('label_sub') }}" name="label_sub" requierd />
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Point"
                                            value="{{ old('point') }}" name="point" requierd />
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-8"></div>
                                    <div class="col">
                                        <div class="input-group-append">
                                            <x-dashboard.save-button></x-dashboard.save-button>
                                        </div>
                                    </div>
                            </form>
                            <div class="col-1">
                                <form action="{{route('delete_score',$score->id)}}" method="POST">
                                    @csrf
                                    <x-dashboard.delete-button></x-dashboard.delete-button>
                                </form>
                            </div>
                        </div>

                        @foreach ($score->child as $point)
                        @include('dashboard.predose-questions.component.show-variables')
                        @endforeach
                        @endif
                        @if ($score->is_sub == 1)
                        @php
                        $point = $score;
                        @endphp
                        <label>sub</label>
                        @include('dashboard.predose-questions.component.show-variables')
                        @endif
                        <br>
                        <hr class="horizontal dark mt-0">
                        @endforeach
                        <br>
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
	   function selectVariable2(number) {
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
                         var name = 'object_id['+variable+']'
                         document.getElementById('variable_data'+number).name = name;
                  },
              });
      }
    ////////////////////for fetch variables////////////
      $(document).ready(function () {  
            $("#inlineRadio1").change(function() {
                var row1 = document.getElementById('row_label');
                var row2 = document.getElementById('row_sub');
                
                if (row1.style.display === "none") {
                    row1.style.display = "block";
                    row2.style.display = "none";
                } else {
                    row1.style.display = "none";
                }
            });

            $("#inlineRadio2").change(function() {
                var row1 = document.getElementById('row_label');
                var row2 = document.getElementById('row_sub');
              var select = document.getElementById('variable_data0');
                if (row2.style.display === "none") {
                    row2.style.display = "block";
                    row1.style.display = "none";
                    select.style.width = "100%";
                } else {
                    row2.style.display = "none";
                }
            });
        });   
</script>