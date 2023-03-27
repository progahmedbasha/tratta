@extends('dashboard.layouts.master')
@section('content')
@if(Session::has('success'))
<script>
    toastr.success(" {{ Session::get('success') }} ");
</script>
@endif
<div class="container-fluid py-4">
    <div class="row">
           <h1 style="text-align: center;font-family: cursive;color:black;">Basic Data</h1>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-11 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0 p-2">
                            <div class="row">
                                <a href="{{ route('categories.index') }}">
                                    {{-- <div class="col-6 d-flex align-items-center"> --}}
                                    <h6 class="mb-0">Drug Data
                                        <img src="{{ url('dashboard/assets/icons/play.svg') }}"
                                            style="float:right;display:block;" alt='' />
                                    </h6>
                                    {{-- </div> --}}
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid ">
    <div class="col-md-11 mb-lg-0 mb-4">
    <div class="card">
        <div class="card-header pb-0 p-2">
            <div class="row">
                <a href="{{ route('illness_categories.index') }}">
                    <h6 class="mb-0">Illness Data
                        <img src="{{ url('dashboard/assets/icons/play.svg') }}" style="float:right;display:block;"
                            alt='' />
                    </h6>
                </a>
            </div>
        </div>
        <div class="card-body p-1">
        </div>
    </div>
    </div>
</div>
<br>
<div class="container-fluid ">
    <div class="col-md-11 mb-lg-0 mb-4">
    <div class="card">
        <div class="card-header pb-0 p-2">
            <div class="row">
                <a href="{{ route('indications.index') }}">
                    <h6 class="mb-0">Indication Data
                        <img src="{{ url('dashboard/assets/icons/play.svg') }}" style="float:right;display:block;"
                            alt='' />
                    </h6>
                </a>
            </div>
        </div>
        <div class="card-body p-1">
        </div>
    </div>
    </div>
</div>


{{-- /***************** Gender ***********/ --}}
@include('dashboard.components.gender')
{{-- /***************** age ***********/ --}}
@include('dashboard.components.age')
{{-- /***************** Weight ***********/ --}}
@include('dashboard.components.weight')
{{-- /***************** Pregnancy stages ***********/ --}}
@include('dashboard.components.pregnancy_stages')
{{-- /***************** Pregnancy Safty Category  ***********/ --}}
@include('dashboard.components.pregnancy_safties')
{{-- /***************** Pregnancy Nursing Safty Category  ***********/ --}}
{{-- @include('dashboard.components.nursing_safties_categories') --}}
{{-- /***************** Drug formula  ***********/ --}}
@include('dashboard.components.drug-formula')
{{-- /***************** Effects  ***********/ --}}
@include('dashboard.components.effects')
{{-- /***************** Weight_Gender_range_relation  ***********/ --}}
@include('dashboard.components.weight_gender')
{{-- /***************** Crcl range & Synonym Illness ***********/ --}}
@include('dashboard.components.crcl_range')
{{-- /***************** Kidneys ***********/ --}}
@include('dashboard.components.kidneys')
{{-- /***************** Calculator  ***********/ --}}
@include('dashboard.components.claculator')
{{-- /***************** S.cr & Synonym Illness ***********/ --}}
@include('dashboard.components.srcs')
{{-- /***************** InteractionSeverity***********/ --}}
@include('dashboard.components.interaction-severity')
@endsection