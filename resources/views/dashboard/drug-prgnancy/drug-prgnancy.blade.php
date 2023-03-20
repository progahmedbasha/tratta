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
                <h1 style="text-align: center;font-family: cursive;color:black;">Pregnancy</h1>
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
                                    <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <form action="{{route('drug_pregnancy.store')}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $id }}" name="variable_id">
                                <div class="row">
                                    <div class="col-md-4">
                                        <select class="form-control" name="effect_id" required />
                                        <option value="">Select Effect</option>
                                        @foreach ($effects as $effect)
                                        <option value="{{$effect->id}}" {{(old($effect->id)==$effect->id)?
                                            'selected':''}}>
                                            {{$effect->effect_type}}
                                        </option>
                                        @endforeach
                                        </select>
                                        @error('effect_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="pregnancy_stage_id" required />
                                        <option value="">Select Stage</option>
                                        @foreach ($pregnancy_stages as $pregnancy_stage)
                                        <option value="{{$pregnancy_stage->id}}" {{(old($pregnancy_stage->
                                            id)==$pregnancy_stage->id)?
                                            'selected':''}}>
                                            {{$pregnancy_stage->pregnancy_stage}}
                                        </option>
                                        @endforeach
                                        </select>
                                        @error('effect_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="pregnancy_safety_id" required />
                                        <option value="">Select Category</option>
                                        @foreach ($prganancy_safties as $prganancy_safty)
                                        <option value="{{$prganancy_safty->id}}" {{(old($prganancy_safty->
                                            id)==$prganancy_safty->id)?
                                            'selected':''}}>
                                            {{$prganancy_safty->type}}
                                        </option>
                                        @endforeach
                                        </select>
                                        @error('effect_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1">

                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-10">
                                        <textarea class="form-control" placeholder="Note" name="note"
                                            required>{{old('note')}}</textarea>
                                        @error('note')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1">
                                        <div class="input-group-append">
                                            <button class="btn bg-gradient-dark mb-0" type="submit"><i
                                                    class="fas fa-save"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </form>
                            <br>
                            <hr class="horizontal dark mt-0">
                            @foreach ($prgnancies as $prgnancy )
                            <form action="{{route('drug_pregnancy.update',$prgnancy->id)}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <input type="hidden" value="{{ $id }}" name="variable_id">
                                <div class="row">
                                    <div class="col-md-4">
                                        <select class="form-control" name="effect_id" required />
                                        <option value="">Select Effect</option>
                                        @foreach ($effects as $effect)
                                        <option value="{{$effect->id}}" {{($prgnancy->effect_id==$effect->id)?
                                            'selected':''}}>
                                            {{$effect->effect_type}}
                                        </option>
                                        @endforeach
                                        </select>
                                        @error('effect_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="pregnancy_stage_id" required />
                                        <option value="">Select Stage</option>
                                        @foreach ($pregnancy_stages as $pregnancy_stage)
                                        <option value="{{$pregnancy_stage->id}}" {{($prgnancy->
                                            pregnancy_stage_id==$pregnancy_stage->id)?
                                            'selected':''}}>
                                            {{$pregnancy_stage->pregnancy_stage}}
                                        </option>
                                        @endforeach
                                        </select>
                                        @error('effect_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="pregnancy_safety_id" required />
                                        <option value="">Select Category</option>
                                        @foreach ($prganancy_safties as $prganancy_safty)
                                        <option value="{{$prganancy_safty->id}}" {{($prgnancy->
                                            pregnancy_safety_id==$prganancy_safty->id)?
                                            'selected':''}}>
                                            {{$prganancy_safty->type}}
                                        </option>
                                        @endforeach
                                        </select>
                                        @error('effect_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1">

                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-8">
                                        <textarea class="form-control" placeholder="Note" name="note"
                                            required>{{$prgnancy->note}}</textarea>
                                        @error('note')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <div class="input-group-append">
                                            <button class="btn bg-gradient-info mb-0" type="submit"><i
                                                    class="fas fa-edit"></i></button>
                                        </div>
                                    </div>
                                    <br>
                            </form>
                            <div class="col">
                                <form action="{{route('fixed_doses.destroy',$prgnancy->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>


                        </div>
                        <br>
                        <hr class="horizontal dark mt-0">
                        @endforeach
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