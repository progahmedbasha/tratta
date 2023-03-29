@extends('dashboard.layouts.master')
@section('content')
@if(Session::has('success'))
<script>
    toastr.success(" {{ Session::get('success') }} ");
</script>
@endif
{{-- Recheck card  --}}
<div class="card">
    <div class="card-header pb-0 p-3">
        <div class="row">
            <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">Logically Forbidden case (You can't Tratta)</h6>
            </div>
            <div class="col-6 text-end">
                <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
            </div>
        </div>
    </div>
    <div class="card-body p-3">
        <form action="{{route('forbidden_cases.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <label>Value 1 :</label>
                </div>
                @include('dashboard.forbidden-case.div_ajax_component.fetch-select-and-add-rows')
                {{-- </div> --}}
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label>Value 2 :</label>
                    </div>
                    @include('dashboard.components.div_ajax_component.fetch-select-and-add-row_value2')
                </div>
                <hr class="horizontal dark mt-0">
                <div class="row">
                    <div class="col-md-8">
                        <textarea class="form-control" placeholder="Note" name="note">{{ old('note') }}</textarea>
                    </div>
                    <div class="col-1">
                        <div class="input-group-append">
                            {{-- <button class="btn bg-gradient-dark mb-0" type="submit"><i class="fas fa-save"></i></button> --}}
                            <x-dashboard.save-button></x-dashboard.save-button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    <br>
    <hr class="horizontal dark mt-0">
    @foreach ($forbidden_cases as $forbidden_case )
    <div class="card-body p-3">
        <form action="{{route('forbidden_cases.update', $forbidden_case->id)}}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col-md-4">
                    <label>Value 1 :</label>
                    @foreach ($forbidden_case->forbiddenCaseValue as $values)
                    @if ($values->value == "1" && $values->variableable_type == 'App\Models\Age')
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" value="Age" disabled /><br>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $values->age->name }}" disabled /><br>
                        </div>
                    </div>
                    @elseif ($values->value == "1" && $values->variableable_type == 'App\Models\Gender')
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" value="Gender" disabled /><br>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $values->gender->name }}" disabled /><br>
                        </div>
                    </div>
                    @elseif ($values->value == "1" && $values->variableable_type == 'App\Models\Weight')
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" value="Weight" disabled /><br>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $values->weight->weight }}"
                                disabled /><br>
                        </div>
                    </div>
                    @elseif ($values->value == "1" && $values->variableable_type == 'App\Models\PregnancyStage')
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" value="Pregnancy Stage" disabled /><br>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control"
                                value="{{ $values->pregnancyStage->pregnancy_stage }}" disabled /><br>
                        </div>
                    </div>
                    @elseif ($values->value == "1" && $values->variableable_type == 'App\Models\IllnessSub')
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" value="Illness Data" disabled /><br>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $values->illnessSub->name }}"
                                disabled /><br>
                        </div>
                    </div>
                    @elseif ($values->value == "1" && $values->variableable_type == 'App\Models\Drug')
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" value="Drug" disabled /><br>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $values->drug->name }}" disabled /><br>
                        </div>
                    </div>
                     @elseif ($values->value == "1" && $values->variableable_type == 'App\Models\Indication')
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" value="Indication" disabled /><br>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $values->indication->indication_title }}" disabled /><br>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label>Value 2 :</label>
                    @foreach ($forbidden_case->forbiddenCaseValue as $values)
                    @if ($values->value == "2" && $values->variableable_type == 'App\Models\Age')
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" value="Age" disabled /><br>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $values->age->name }}" disabled /><br>
                        </div>
                    </div>
                    @elseif ($values->value == "2" && $values->variableable_type == 'App\Models\Gender')
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" value="Gender" disabled /><br>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $values->gender->name }}" disabled /><br>
                        </div>
                    </div>
                    @elseif ($values->value == "2" && $values->variableable_type == 'App\Models\Weight')
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" value="Weight" disabled /><br>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $values->weight->weight }}"
                                disabled /><br>
                        </div>
                    </div>
                    @elseif ($values->value == "2" && $values->variableable_type == 'App\Models\PregnancyStage')
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" value="Pregnancy Stage" disabled /><br>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control"
                                value="{{ $values->pregnancyStage->pregnancy_stage }}" disabled /><br>
                        </div>
                    </div>
                    @elseif ($values->value == "2" && $values->variableable_type == 'App\Models\IllnessSub')
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" value="Illness Data" disabled /><br>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $values->illnessSub->name }}"
                                disabled /><br>
                        </div>
                    </div>
                    @elseif ($values->value == "2" && $values->variableable_type == 'App\Models\Drug')
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" value="Drug" disabled /><br>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $values->drug->name }}" disabled /><br>
                        </div>
                    </div>
                    @elseif ($values->value == "2" && $values->variableable_type == 'App\Models\Indication')
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" value="Indication" disabled /><br>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $values->indication->indication_title }}" disabled /><br>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <hr class="horizontal dark mt-0">
            <div class="row">
                <div class="col-md-8">
                    <textarea class="form-control" placeholder="Note" name="note">{{ $forbidden_case->note }}</textarea>
                </div>

                <div class="col-1">
                    <div class="input-group-append">
                        <x-dashboard.edit-button></x-dashboard.edit-button>
                    </div>
                </div>
        </form>

        <div class="col">
            <form action="{{route('forbidden_cases.destroy',$forbidden_case->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <x-dashboard.delete-button></x-dashboard.delete-button>
            </form>
        </div>
    </div>
</div>
<hr class="horizontal dark mt-0">
@endforeach
</div>
<br>
@endsection