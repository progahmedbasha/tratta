@extends('dashboard.layouts.master')
@section('content')
@if(Session::has('success'))
<script>
    toastr.success(" {{ Session::get('success') }} ");
</script>
@endif
{{-- /***************** illness category ***********/ --}}
@include('dashboard.components.illness')

@endsection