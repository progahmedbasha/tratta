<h1>Dose</h1>
<h2>{{$dose_result->doseMessage->recommended_dosage}}</h2>
<h2>{{$dose_result->doseMessage->dosage_note}}</h2>
<h2>{{$dose_result->doseMessage->titration_note}}</h2>

@if ($note_result != null || $note_result->count() > 0) 
<br><br>
<h1>Notes</h1>
@foreach($note_result as $note)
<h2>{{$note->noteMessage->note}}</h2>
@endforeach
@endif