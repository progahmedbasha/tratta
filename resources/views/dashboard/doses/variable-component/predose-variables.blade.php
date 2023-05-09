@if($variables->count() > 0 )
@foreach ($variables as $variable)
<option value="{{ $variable->id }}">
    @if ($var_name == "ages")
    {{ $variable->name}}
    @elseif ($var_name == "weights")
    {{ $variable->weight}}
    @elseif ($var_name == "genders")
    {{ $variable->name}}
    @elseif ($var_name == "pregnancy_stages")
    {{ $variable->pregnancy_stage}}
    @elseif ($var_name == "illness")
    {{ $variable->name}}
    @elseif ($var_name == "drugs")
    {{ $variable->name}}
    @elseif ($var_name == "indications")
    {{ $variable->indication->indication_title}}
    @endif
</option>
@endforeach
@endif