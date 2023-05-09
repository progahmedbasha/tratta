{{-- <form>
    <input type="hidden" name="dose_type_id" value="1"/>
    @include('dashboard.doses.dose-content')
</form> --}}
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
                <h1 style="text-align: center;font-family: cursive;color:black;">Notes Or</h1>
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
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <form action="{{route('notes.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="dose_type_id" value="4" />
                                @include('dashboard.doses.dose-content')
                                {{-- here messages --}}
                                @include('dashboard.notes.component.notes-add-message-component')
                            </form>
                            <br>
                            <hr class="horizontal dark mt-0">
                            @include('dashboard.notes.component.notes-edit-message-component')
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