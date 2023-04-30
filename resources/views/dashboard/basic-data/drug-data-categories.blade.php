@extends('dashboard.layouts.master')
@section('content')
@if(Session::has('success'))
<script>
    toastr.success(" {{ Session::get('success') }} ");
</script>
@endif
{{-- /***************** Drug category ***********/ --}}
{{-- @include('dashboard.components.drug-category') --}}
@include('dashboard.components.drug-generic')

@endsection