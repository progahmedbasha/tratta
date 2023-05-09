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
                <h1 style="text-align: center;color:black;">New Drug</h1>
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
                            <div class="row">
                                <div class="col mb-3">
                                    <form method="get" class="form-inline" action="{{route('drugs.index')}}">
                                        <div class="row">
                                            <div class="col-4">
                                                <input class="form-control form-control-solid w-250px ps-15"
                                                    name="search" type="text" placeholder="Search Drugs" required="">
                                            </div>
                                            <div class="col-1">
                                                <button type="submit" class="btn btn-light-primary me-3"><i
                                                        class="fa fa-search"></i></button>
                                            </div>
                                            <div class="col-2">
                                                <a href="{{route('drugs.index')}}" class="btn btn-light-primary me-3"
                                                    style="margin-top:0px;"><i class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive" style="text-align:center;">
                                <table id="datatable" class="table">
                                    <tbody>
                                        @foreach($drugs as $index=>$drug)
                                        <tr style="border-bottom: 1px solid #F2CC8F;">
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $drug->name }}</td>
                                            <td>{{ $drug->code }}</td>
                                            <td>
                                                <div class="btn-icon-list">
                                                    <a href="{{ route('drugs.show', $drug->id) }}">
                                                        <x-dashboard.edit-button></x-dashboard.edit-button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $drugs->links() }}
                            </div>
                        </div>

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