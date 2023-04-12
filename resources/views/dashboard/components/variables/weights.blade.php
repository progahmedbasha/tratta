<form action="{{route('weight_variable')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="variable_id" value="{{ $id }}">
    <div class="row">
        <label>Weight</label>
        <div class="col-md-6">
            <select class="js-example-basic-multiple form-control" multiple="multiple" name="weight_id[]" required />
            @foreach ($weights as $weight)
            <option value="{{$weight->id}}" {{(old($weight->id)==$weight->id)?
                'selected':''}}>
                {{$weight->weight}}
            </option>
            @endforeach
            </select>
            @error('weight_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <select class="form-control" name="effect_id" required />
            <option value="">Effect</option>
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
                <x-dashboard.add-button type="submit"></x-dashboard.add-button>
            </div>
        </div>
    </div>
</form>
<hr>
@foreach ($weight_variables as $weight_variable)
<div class="row">
    <div class="col-md-6">
        <input type="text" class="form-control" placeholder="" value="{{ $weight_variable->weight->weight }}" name="name" disabled />
    </div>
    <div class="col-md-4">
        <input type="text" class="form-control" placeholder=""
            style="background-color: {{ $weight_variable->effect->color }}; color: black; "
            value="{{ $weight_variable->effect->effect_type  }}" name="name" disabled />
    </div>
    <div class="col-2">
        <form action="{{route('variable_details.destroy',$weight_variable->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <x-dashboard.delete-button></x-dashboard.delete-button>
        </form>
    </div>
    <hr>
</div>
@endforeach
<hr class="horizontal dark mt-0">