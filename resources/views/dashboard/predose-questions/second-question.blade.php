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
                <h1 style="text-align: center;font-family: cursive;color:black;">Second Question</h1>
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
                            <form action="{{route('second_questions.store')}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $id }}" name="predose_id">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="label"
                                            value="{{old('label')}}" name="label" required>
                                        @error('label')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="unit"
                                            value="{{old('unit')}}" name="unit" required>
                                        @error('unit')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                @include('dashboard.predose-questions.component.renge-row')
                                
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
                            <form action="{{route('second_questions.update',$question->id)}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <input type="hidden" value="{{ $id }}" name="predose_id">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="label"
                                            value="{{$question->label}}" name="label" required>
                                        @error('label')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="unit"
                                            value="{{$question->unit}}" name="unit" required>
                                        @error('unit')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1">
                                        <div class="input-group-append">
                                            <x-dashboard.edit-button></x-dashboard.edit-button>
                                        </div>
                                    </div>
                            </form>

                            <div class="col-1">
                                <form action="{{route('second_questions.destroy',$question->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-dashboard.delete-button></x-dashboard.delete-button>
                                </form>
                            </div>
                        </div>
                        <br>
                        @foreach ($question->predoseQuestionRange as $range)
                        @if ($range->variableable_type == 'App\Models\PredoseSecondQuestion')
                        <form action="{{route('second_question_range_update',$range->id)}}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <input class="form-control" type="number" step="any" placeholder="from"
                                        value="{{$range->from}}" name="from" required>
                                    @error('from')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input class="form-control" type="number" step="any" placeholder="to"
                                        value="{{$range->to}}" name="to" required>
                                    @error('to')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <select class="form-control" name="illness_sub_id" required>
                                        <option value="">Select Illness Category</option>
                                        @foreach ($illness_subs as $illness_sub)
                                        <option value="{{$illness_sub->id}}" {{($range->
                                            illness_sub_id==$illness_sub->id)?
                                            'selected':''}}>
                                            {{$illness_sub->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-1">
                                    <div class="input-group-append">
                                        <x-dashboard.edit-button></x-dashboard.edit-button>
                                    </div>
                                </div>
                        </form>
                        <div class="col-1">
                            <form action="{{route('second_question_range_delete',$range->id)}}" method="POST">
                                @csrf
                                <x-dashboard.delete-button></x-dashboard.delete-button>
                            </form>
                        </div>
                    </div>
                    <br>
                    @endif
                    @endforeach
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