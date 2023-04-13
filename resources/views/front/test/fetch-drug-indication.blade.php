@if($drug_indications->count() > 0 )
<option selected="true" disabled="disabled">Select Indecation</option>
@foreach ($drug_indications as $drug_indication)
<option value="{{ $drug_indication->id }}">
    {{ $drug_indication->indication->indication_title}}
</option>
@endforeach
@endif