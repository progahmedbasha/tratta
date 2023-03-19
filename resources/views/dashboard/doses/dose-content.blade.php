<input type="hidden" value="{{ $id }}" name="variable_id">
<div class="row">
    <div class="col-md-3">
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
    <div class="col-md-3">
        <select class="form-control " id="variable" name="variable" required />
        <option value="">Select Varirables</option>
        <option value="Ages">Ages</option>
        <option value="Weights">Weights</option>
        <option value="Genders">Genders</option>
        <option value="pregnancy_stages">Pregnancy Stages</option>
        <option value="Illness">Illness Data</option>
        <option value="drug">Drug Data</option>
        </select>
        @error('effect_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-3">
        <select class="form-control" id="variable_data" name="object_id" required />
        <option value="">Select object</option>
        </select>
    </div>
    <div class="col-1">
        <div class="input-group-append">
            <button class="btn bg-gradient-dark mb-0 " id="button_add_row" type="button"><i class="fas fa-plus"></i></button>
        </div>
    </div>
</div>
<br>
<div id="duplicate"></div>
<br><br>
<div class="row">
    <div class="col-9"></div>
    <div class="col-1">
        <div class="input-group-append">
            <button class="btn bg-gradient-info mb-0" type="submit"><i class="fas fa-save"></i></button>
        </div>
    </div>
</div>
