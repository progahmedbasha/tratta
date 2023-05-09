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
             <div class="row" style=" justify-content: center; ">
                <div class="col-md-11 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Recheck Drug Hx</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <form action="{{route('hx_drugs.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Drug Value 1</label>
                                        <select class="js-example-basic-multiple form-control" multiple="multiple"
                                            name="value1[]" required />
                                        <option value="" disabled>Drugs</option>
                                        @foreach ($drugs as $drug)
                                        <option value="{{$drug->id}}" {{(old($drug->id)==$drug->id)?
                                            'selected':''}}>
                                            {{$drug->name}}
                                        </option>
                                        @endforeach
                                        </select>
                                        @error('drug_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Drug Value 2</label>
                                        <select class="js-example-basic-multiple form-control" multiple="multiple"
                                            name="value2[]" required />
                                        <option value="" disabled>Drugs</option>
                                        @foreach ($drugs as $drug)
                                        <option value="{{$drug->id}}" {{(old($drug->id)==$drug->id)?
                                            'selected':''}}>
                                            {{$drug->name}}
                                        </option>
                                        @endforeach
                                        </select>
                                        @error('drug_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <hr class="horizontal dark mt-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <textarea class="form-control" placeholder="Interaction Note" name="note"
                                            required />{{ old('note') }}</textarea>
                                    </div>
                                    <div class="col-3">
                                        <select class="form-control" name="interaction_severity_id" required />
                                        <option value="">Sevrity</option>
                                        @foreach ($interaction_severities as $interaction_severity)
                                        <option value="{{$interaction_severity->id}}" {{(old($interaction_severity->
                                            id)==$interaction_severity->id)?
                                            'selected':''}}>
                                            {{$interaction_severity->type}}
                                        </option>
                                        @endforeach
                                        </select>
                                        @error('interaction_severity_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1">
                                        <div class="input-group-append">
                                            <x-dashboard.save-button></x-dashboard.save-button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <hr class="horizontal dark mt-0">
                            @foreach ($hx_drugs as $hx_drug )
                            <div class="card-body p-3">
                                <form action="{{route('hx_drugs.update', $hx_drug->id)}}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Drug Value 1</label>
                                            @foreach ($hx_drug->hxDrugValue as $values)
                                            @if ($values->value == "value1")
                                            <input type="text" class="form-control" value="{{ $values->drug->name }}"
                                                disabled /><br>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Drug Value 2</label>
                                            @foreach ($hx_drug->hxDrugValue as $values)
                                            @if ($values->value == "value2")
                                            <input type="text" class="form-control" value="{{ $values->drug->name }}"
                                                disabled /><br>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <hr class="horizontal dark mt-0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <textarea class="form-control"
                                                style="background-color: {{ $hx_drug->interactionSeverity->color }}; color:azure; "
                                                placeholder="Interaction Note"
                                                name="note">{{ $hx_drug->note }}</textarea>
                                        </div>
                                        <div class="col-3">
                                            <select class="form-control" name="interaction_severity_id" required />
                                            <option value="">Sevrity</option>
                                            @foreach ($interaction_severities as $interaction_severity)
                                            <option value="{{$interaction_severity->id}}" {{($hx_drug->
                                                interaction_severity_id
                                                ==$interaction_severity->id)?
                                                'selected':''}}>
                                                {{$interaction_severity->type}}
                                            </option>
                                            @endforeach
                                            </select>
                                            @error('interaction_severity_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-1">
                                            <div class="input-group-append">
                                                <x-dashboard.edit-button></x-dashboard.edit-button>
                                            </div>
                                        </div>
                                </form>
                                <div class="col">
                                    <form action="{{route('hx_drugs.destroy',$hx_drug->id)}}" method="POST">
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
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
   $('.js-example-basic-multiple').select2();
   });
</script>
@endsection