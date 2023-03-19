8 lines (8 sloc)  242 Bytes

@if($variables->count() > 0 )
<select  class="form-control" name="{{ $var_name }}">
<option value="" >Select {{ $var_name }}</option>
@foreach ($variables  as $variable)
<option value="{{ $variable->id }}">
@if ($var_name == "Ages")
    {{ $variable->name}}
@elseif ($var_name == "Weights")
{{ $variable->weight}}
@endif
</option>
@endforeach
</select>	
@endif