<form action="{{route('pregnancy_stage_variable')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="variable_id" value="{{ $id }}">
    <div class="row">
        <label>Pregnancy Stages</label>
        <div class="col-md-6">
            <select class="js-example-basic-multiple form-control" multiple="multiple" name="pregnancy_stage_id[]"
                required />
            @foreach ($pregnancy_stages as $pregnancy_stage)
            <option value="{{$pregnancy_stage->id}}" {{(old($pregnancy_stage->id)==$pregnancy_stage->id)?
                'selected':''}}>
                {{$pregnancy_stage->pregnancy_stage}}
            </option>
            @endforeach
            </select>
            @error('pregnancy_stage_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <select class="form-control" name="effect_id" required />
            <option value="">Note</option>
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
        <div class="col-1">
            <div class="input-group-append">
                <button class="btn bg-gradient-dark mb-0" type="submit"><i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>
</form>
<hr>
@foreach ($pregnancy_stage_variables as $pregnancy_stage_variable)
<div class="row">
    <div class="col-md-6">
        <input type="text" class="form-control" placeholder="" value="{{ $pregnancy_stage_variable->pregnancyStage->pregnancy_stage }}"
            name="name" required />
    </div>
    <div class="col-md-4">
        <input type="text" class="form-control" placeholder=""
            style="background-color: {{ $pregnancy_stage_variable->effect->color }}; color: azure; "
            value="{{ $pregnancy_stage_variable->effect->effect_type  }}" name="name" disapled />
    </div>
    <hr>
</div>
@endforeach
<hr class="horizontal dark mt-0">