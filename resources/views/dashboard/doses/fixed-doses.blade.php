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
                <h1 style="text-align: center;font-family: cursive;color:black;">Fixed Dose</h1>
                <div class="col-md-11 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    @if ($variable_code->variableable_type == "App\Models\Drug" )
                                    <h6 class="mb-0">Main ID ({{ $drug_code->code }})</h6>
                                    @else
                                    <h6 class="mb-0">{{ $indication_code->Indication->indication_title }} ({{
                                        $indication_code->code }})</h6>
                                    @endif
                                </div>
                                <div class="col-6 text-end">
                                    <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <form action="{{route('fixed_doses.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $id }}" name="variable_id">
                                <div class="row">
                                    <div class="col-md-4">
                                        <select class="form-control" name="effect_id" required />
                                        <option value="">Effect</option>
                                        @foreach ($effects as $effect)
                                        <option value="{{$effect->id}}" {{(old($effect->id)==$effect->id)?
                                            'selected':''}}>
                                            {{$effect->effect_type}}
                                        </option>
                                        @endforeach
                                        </select>
                                        @error('effect_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <textarea class="form-control" placeholder="Recommended Dose"
                                            name="recommended_dosage" required>{{old('recommended_dosage')}}</textarea>
                                        @error('recommended_dosage')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1">

                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col">
                                        <textarea class="form-control" placeholder="Dosage Note" name="dosage_note"
                                            required>{{old('dosage_note')}}</textarea>
                                        @error('dosage_note')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col">
                                        <textarea class="form-control" placeholder="Titration Note"
                                            name="titration_note" required>{{old('titration_note')}}</textarea>
                                        @error('titration_note')
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
                            @foreach ($fixed_doses as $fixed_dose )
                            <form action="{{route('fixed_doses.update',$fixed_dose->id)}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <input type="hidden" value="{{ $id }}" name="variable_id">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder=""
                                            style="background-color: {{ $fixed_dose->effect->color }}; color: black; "
                                            value="{{ $fixed_dose->effect->effect_type  }}"
                                            name="{{ $fixed_dose->effect_id }}" disabled />
                                        @error('effect_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <textarea class="form-control" placeholder="Recommended Note"
                                            name="recommended_dosage"
                                            required>{{$fixed_dose->doseMessage->recommended_dosage}}</textarea>
                                        @error('recommended_dosage')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1">

                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-7">
                                        <textarea class="form-control" placeholder="Dosage Note" name="dosage_note"
                                            required>{{$fixed_dose->doseMessage->dosage_note}}</textarea>
                                        @error('dosage_note')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1">
                                        <div class="input-group-append">
                                            <x-dashboard.edit-button></x-dashboard.edit-button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col">
                                        <textarea class="form-control" placeholder="Titration Note"
                                            name="titration_note" required>{{$fixed_dose->doseMessage->titration_note}}</textarea>
                                        @error('titration_note')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                            </form>


                            <div class="col-1">
                                <form action="{{route('fixed_doses.destroy',$fixed_dose->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-dashboard.delete-button></x-dashboard.delete-button>
                                </form>
                            </div>

                        </div>
                        <br>
                        <hr class="horizontal dark mt-0">
                        @endforeach
                        <a href="{{ route('drugs.show', $variable_code->drug_id) }}" class="btn btn-primary">
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