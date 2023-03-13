@extends('dashboard.layouts.master')
@section('content')
@if(Session::has('success'))
<script>
    toastr.success(" {{ Session::get('success') }} ");
</script>
@endif

{{-- <div class="container-fluid py-4">
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
        <a class="btn bg-gradient-info mb-0" href="{{ route('drugs.show', $drug->id) }}"><i class="fas fa-edit"></i></a>
    </div>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div> --}}
<main id="main" class="main">
    <div class="pagetitle">
        <h1 style="text-align: center;font-family: cursive;color:black;">New Drug</h1>
    </div>
    <!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-xl-12 mb-30">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <div class="row">
                            <div class="col mb-3">
                                <form method="get" class="form-inline" action="{{url('admin/drugs/create')}}">
                                    <div class="row">
                                        <div class="col-4">
                                            <input class=" form-control form-control-solid w-250px ps-15" name="search"
                                                type="text" placeholder="Search Drugs" required="">
                                        </div>
                                        <div class="col-1">
                                            <button type="submit" class="btn btn-light-primary me-3"><i
                                                    class="fa fa-search"></i></button>
                                        </div>
                                        <div class="col-2">
                                            <a href="{{url('admin/drugs/create')}}" class="btn btn-light-primary me-3"
                                                style="margin-top:0px;"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if(Session::has('success'))
                        <script>
                            toastr.success(" {{ Session::get('success') }} ");
                        </script>
                        @endif
                        <div class="table-responsive" style="text-align:center;">
                            <table id="datatable" class="table table-striped table-bordered p-0">
                                <thead>
                                    <tr>
                                        <th style="width:21px;">#</th>
                                        <th style="text-align:center;">Name</th>
                                        <th style="text-align:center;">code</th>
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
                            {{ $drugs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


@endsection