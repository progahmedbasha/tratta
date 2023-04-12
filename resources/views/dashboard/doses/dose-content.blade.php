<input type="hidden" value="{{ $id }}" name="variable_id">
<div class="row">
    <div class="col-md-3">
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
@include('dashboard.components.div_ajax_component.fetch-select-and-add-rows')