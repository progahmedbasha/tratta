@extends('dashboard.layouts.master')
@section('content')
@if(Session::has('success'))
<script>
    toastr.success(" {{ Session::get('success') }} ");
</script>
@endif
<div class="container-fluid py-4">
    <div class="row">
        <h1 style="text-align: center;font-family: cursive;color:black;">New Drug</h1>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-11 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-header pb-0 p-3">
                                    <div class="row">
                                        <div class="col-6 d-flex align-items-center">
                                            <h6 class="mb-0">Main ID</h6>
                                        </div>
                                        <div class="col-6 text-end">
                                            <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                                        </div>
                                    </div>
                                </div>
                                <table id="datatable" class="table table-striped table-bordered p-0"
                                    style="width: 80%;align-self:center">
                                    <thead>
                                        <tr>
                                            <th style="width:21px;">#</th>
                                            <th>name</th>
                                            <th>code</th>
                                            <th style="width:21px;"><i style="font-size:24px" class="fa">&#xf013;</i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($drugs as $index=>$drug)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $drug->name }}</td>
                                            <td>{{ $drug->code }}</td>
                                            <td>
                                                <div class="btn-icon-list">
                                                    <a class="btn bg-gradient-info mb-0"
                                                        href="{{ route('drugs.show', $drug->id) }}"><i
                                                            class="fas fa-edit"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection