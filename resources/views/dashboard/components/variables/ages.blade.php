<form action="{{route('age_variable')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="variable_id" value="{{ $id }}">
    <div class="row">
        <label>Ages</label>
        <div class="col-md-6">
            <select class="js-example-basic-multiple form-control" multiple="multiple" name="age_id[]" required />
            @foreach ($ages as $age)
            <option value="{{$age->id}}" {{(old($age->id)==$age->id)?
                'selected':''}}>
                {{$age->name}}
            </option>
            @endforeach
            </select>
            @error('age_id')
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
@foreach ($age_variables as $age_variable)
<div class="row">
    <div class="col-md-6">
        <input type="text" class="form-control" placeholder="" value="{{ $age_variable->age->name }}" name="name" required />
    </div>
    <div class="col-md-4">
             <input type="text" class="form-control" placeholder="" style="background-color: {{ $age_variable->effect->color }}; color: black; " value="{{ $age_variable->effect->effect_type  }}" name="name" disapled />
    </div>
    <hr>
</div>
@endforeach
<hr class="horizontal dark mt-0">