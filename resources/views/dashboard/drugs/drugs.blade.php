@extends('dashboard.layouts.master')
@section('content')
@if(Session::has('success'))
<script>
    toastr.success(" {{ Session::get('success') }} ");
</script>
@endif
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
                                <form method="get" class="form-inline" action="{{route('drugs.index')}}">
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
                                            <a href="{{route('drugs.index')}}" class="btn btn-light-primary me-3"
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
                            <table id="datatable" class="table table-bordered p-0">
                                <tbody>
                                    @foreach($drugs as $index=>$drug)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $drug->name }}</td>
                                        <td>{{ $drug->code }}</td>
                                        <td>
                                            <div class="btn-icon-list">
                                                <a class="btn btn-link" href="{{ route('drugs.show', $drug->id) }}"><img
                                                        src='{{ url(' data/VarIconsax.svg') }}' /></a>
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