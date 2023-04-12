@if($drug_indications->count() > 0 )
@foreach ($drug_indications as $drug_indication)
<option value="{{ $drug_indication->id }}">
    {{ $drug_indication->indication->indication_title}}
</option>
@endforeach
@endif