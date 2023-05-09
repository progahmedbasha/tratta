@extends('dashboard.layouts.master')
@section('content')


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@if(Session::has('success'))
<script>
    toastr.success(" {{ Session::get('success') }} ");
</script>
@endif
<div class="container-fluid py-4">
    <div class="row">
        <h1 style="text-align: center;color:black;">1ry Variables</h1>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                     <div class="row" style=" justify-content: center; ">
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
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    {{-- ages --}}
                                    @include('dashboard.components.variables.ages')
                                    <br>
                                    {{-- weights --}}
                                    @include('dashboard.components.variables.weights')
                                    <br>
                                    {{-- genders --}}
                                    @include('dashboard.components.variables.genders')
                                    <br>
                                    {{-- pregnancy stages --}}
                                    @include('dashboard.components.variables.pregnancy-stages')
                                    <br>
                                    {{-- illness-data --}}
                                    @include('dashboard.components.variables.illness-data')
                                    <br>
                                    {{-- drug -data sub sub --}}
                                    @include('dashboard.components.variables.category-data')
                                    <br>
                                    <a href="{{ route('drugs.show', $variable_code->drug_id) }}"
                                        class="btn btn-primary">
                                        <span class="fas fa-backward"></span> Back
                                    </a>
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