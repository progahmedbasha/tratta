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
            <div class="row">
                <h1 style="text-align: center;font-family: cursive;color:black;">First Question</h1>
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
                            <form action="{{route('first_questions.store')}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $id }}" name="predose_id">

                                <div class="col">
                                    <textarea class="form-control" placeholder="Text" name="text"
                                        required>{{old('text')}}</textarea>
                                    @error('text')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-10"></div>
                                    <div class="col-1">
                                        <div class="input-group-append">
                                            <x-dashboard.save-button></x-dashboard.save-button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <hr class="horizontal dark mt-0">
                            @foreach ($questions as $question )
                            <form action="{{route('first_questions.update',$question->id)}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col-md-10">
                                        <textarea class="form-control" placeholder="Text" name="text"
                                            required>{{$question->text}}</textarea>
                                        @error('text')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1">
                                        <div class="input-group-append">
                                            <x-dashboard.edit-button></x-dashboard.edit-button>
                                        </div>
                                    </div>
                                <br>
                            </form>
                            <div class="col-1">
                                <form action="{{route('first_questions.destroy',$question->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-dashboard.delete-button></x-dashboard.delete-button>
                                </form>
                            </div>

                        </div>
                        <br>
                        <hr class="horizontal dark mt-0">
                        @endforeach
                        <a href="{{ route('drugs.show', $predose_drug_id->drug_id) }}" class="btn btn-primary">
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