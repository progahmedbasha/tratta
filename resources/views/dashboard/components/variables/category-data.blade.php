{{-- <div class="row">
    <div class="col-md-6">
        <select class="form-control" name="illness_category_id">
            <option value="">Category Data (sub sub)</option>
            @foreach ($category_subs as $category_sub )
            @foreach ($category_sub->subCategory as $category_sub_sub )
            <option value="{{$category_sub_sub->id}}" {{(old($category_sub_sub->id)==$category_sub_sub->id)?
                'selected':''}}>
                {{$category_sub_sub->name}}
            </option>
            @endforeach
            @endforeach
        </select>
        @error('age_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <select class="form-control" name="effect_id">
            <option value="">Note</option>
            @foreach ($effects as $effect)
            <option value="{{$effect->id}}" {{(old($effect->id)==$effect->id)?
                'selected':''}}>
                {{$effect->color}}
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
</div> --}}