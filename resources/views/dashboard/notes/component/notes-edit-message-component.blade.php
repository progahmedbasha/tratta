@foreach ($fixed_doses as $fixed_dose )
@foreach ($fixed_dose->noteMessage as $dose_message )
<form action="{{route('notes.update',$fixed_dose->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <input type="hidden" value="{{ $id }}" name="variable_id">
    <div class="row">
        <div class="col-md-4">
            <input type="text" class="form-control" placeholder=""
                style="background-color: {{ $fixed_dose->effect->color }}; color: black; "
                value="{{ $fixed_dose->effect->effect_type  }}" name="{{ $fixed_dose->effect_id }}" disabled />
            @error('effect_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-1">

        </div>
    </div>
    <br>
    {{-- show variables --}}
    <div class="row">
        @foreach ($fixed_dose->noteDoseVariables as $var)
        @if ($var->variableable_type == 'App\Models\Age')
        <div class="row">
            <div class="col-2">
                <input type="text" class="form-control" value="Age" disabled />
            </div>
            <div class="col-2">
                <input type="text" class="form-control" value="{{ $var->age->name }}" disabled />
            </div>
        </div><br><br>
        @elseif ($var->variableable_type == 'App\Models\Weight')
        <div class="row">
            <div class="col-2">
                <input type="text" class="form-control" value="Weight" disabled />
            </div>
            <div class="col-2">
                <input type="text" class="form-control" value="{{ $var->weight->weight }}" disabled />
            </div>
        </div><br><br>
        @elseif ($var->variableable_type == 'App\Models\Gender')
        <div class="row">
            <div class="col-2">
                <input type="text" class="form-control" value="Gender" disabled />
            </div>
            <div class="col-2">
                <input type="text" class="form-control" value="{{ $var->gender->name }}" disabled />
            </div>
        </div><br><br>
        @elseif ($var->variableable_type == 'App\Models\PregnancyStage')
        <div class="row">
            <div class="col-2">
                <input type="text" class="form-control" value="Pregnancy Stage" disabled />
            </div>
            <div class="col-2">
                <input type="text" class="form-control" value="{{ $var->pregnancyStage->pregnancy_stage }}" disabled />
            </div>
        </div><br><br>
        @elseif ($var->variableable_type == 'App\Models\IllnessSub')
        <div class="row">
            <div class="col-2">
                <input type="text" class="form-control" value="Illness Data" disabled />
            </div>
            <div class="col-2">
                <input type="text" class="form-control" value="{{ $var->illnessSub->name }}" disabled />
            </div>
        </div><br><br>
        @elseif ($var->variableable_type == 'App\Models\Drug')
        <div class="row">
            <div class="col-2">
                <input type="text" class="form-control" value="Drug Data" disabled />
            </div>
            <div class="col-2">
                <input type="text" class="form-control" value="{{ $var->drug->name }}" disabled />
            </div>
        </div>
        @endif

        @endforeach
    </div>
    <br>
    <div class="row">
        <div class="col-7">
            <textarea class="form-control" placeholder="Note" name="note" required>{{$dose_message->note}}</textarea>
            @error('note')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-2">
        <input type="number" step="any" class="form-control" placeholder="Priority" value="{{$fixed_dose->priority}}" name="priority" required>
        @error('priority')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
        <div class="col-1">
            <div class="input-group-append">
                <button class="btn bg-gradient-info mb-0" type="submit"><i class="fas fa-edit"></i></button>
            </div>
        </div>
</form>
        <div class="col-1">
            <form action="{{route('notes.destroy',$fixed_dose->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </form>
        </div>
        <br>



</div>
<div class="row">




</div>
<br>
<hr class="horizontal dark mt-0">
@endforeach
@endforeach