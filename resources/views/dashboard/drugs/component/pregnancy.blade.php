{{-- pregnancy card  --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

<div class="card">
    <div class="card-header pb-0 p-3">
        <div class="row">
            <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">Pregnancy</h6>
            </div>
            <div class="col-6 text-end">
                <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
            </div>
        </div>
    </div>
    <div class="card-body p-3">
        <form action="{{route('drug_pregnancy.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $drug->id }}" name="drug_id">
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
                <div class="col-md-4">
                    <select class="js-example-basic-multiple form-control" multiple="multiple"
                        name="pregnancy_stage_id[]" required />
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
                <div class="col-md-3">
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

            </div>
            <br>
            <div class="row">
                <div class="col-8">
                    <textarea class="form-control" placeholder="Note" name="note" required>{{old('note')}}</textarea>
                    @error('note')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-2"></div>
                <div class="col-1">
                    <div class="input-group-append">
                        <button class="btn bg-gradient-dark mb-0" type="submit"><i class="fas fa-save"></i></button>
                    </div>
                </div>
            </div>
            <br>
        </form>
        <br>
        <hr class="horizontal dark mt-0">
        @foreach ($prgnancies as $prgnancy )
        <form action="{{route('drug_pregnancy.update',$prgnancy->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <input type="hidden" value="{{ $drug->id }}" name="drug_id">
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" name="effect_id"
                        style="background-color: {{ $prgnancy->effect->color }}" required />
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
                <div class="col-md-3">
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

            </div>
            <br>
            <label>Stages :</label>
            @foreach ($prgnancy->drugPregnancyStage as $stage)
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control" value="{{ $stage->pregnancyStage->pregnancy_stage }}"
                        disabled />
                </div>
            </div><br>
            @endforeach
            <br>
            <div class="row">
                <div class="col-md-8">
                    <textarea class="form-control" placeholder="Note" name="note"
                        required>{{$prgnancy->note}}</textarea>
                    @error('note')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-1"></div>
                <div class="col-md-1">
                    <div class="input-group-append">
                        <button class="btn bg-gradient-info mb-0" type="submit"><i class="fas fa-edit"></i></button>
                    </div>
                </div>
        </form>

        <div class="col">
            <form action="{{route('drug_pregnancy.destroy',$prgnancy->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </form>
        </div>
    </div>
    <br>
    @endforeach
</div>
</div>
<br>