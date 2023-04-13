@foreach ($fixed_doses as $fixed_dose )
{{-- <form action="{{route('note_doses.update',$fixed_dose->id)}}" method="post" enctype="multipart/form-data">
@csrf --}}
{{-- @method('patch') --}}
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
        <div class="col">
            <form action="{{route('variable_dose_delete',$var->id)}}" method="POST">
                @csrf
                <x-dashboard.delete-button></x-dashboard.delete-button>
            </form>
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
        <div class="col">
            <form action="{{route('variable_dose_delete',$var->id)}}" method="POST">
                @csrf
                <x-dashboard.delete-button></x-dashboard.delete-button>
            </form>
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
        <div class="col">
            <form action="{{route('variable_dose_delete',$var->id)}}" method="POST">
                @csrf
                <x-dashboard.delete-button></x-dashboard.delete-button>
            </form>
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
        <div class="col">
            <form action="{{route('variable_dose_delete',$var->id)}}" method="POST">
                @csrf
                <x-dashboard.delete-button></x-dashboard.delete-button>
            </form>
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
        <div class="col">
            <form action="{{route('variable_dose_delete',$var->id)}}" method="POST">
                @csrf
                <x-dashboard.delete-button></x-dashboard.delete-button>
            </form>
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
        <div class="col">
            <form action="{{route('variable_dose_delete',$var->id)}}" method="POST">
                @csrf
                <x-dashboard.delete-button></x-dashboard.delete-button>
            </form>
        </div>
    </div><br><br>
    @endif

    @endforeach
</div>
<br>
<form action="{{route('note_doses.update',$fixed_dose->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="row">
        <div class="col-7">
            <textarea class="form-control" placeholder="Recommended Note" name="recommended_dosage"
                required>{{$fixed_dose->doseMessage->recommended_dosage}}</textarea>
            @error('recommended_dosage')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-2">
            <input type="number" min="1" step="any" class="form-control" placeholder="Priority"
                value="{{$fixed_dose->priority}}" name="priority" required>
            @error('priority')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-7">
            <textarea class="form-control" placeholder="Dosage Note" name="dosage_note"
                required>{{$fixed_dose->doseMessage->dosage_note}}</textarea>
            @error('dosage_note')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-1">
            <div class="input-group-append">
                <x-dashboard.edit-button></x-dashboard.edit-button>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-7">
            <textarea class="form-control" placeholder="Titration Note" name="titration_note"
                required>{{$fixed_dose->doseMessage->titration_note}}</textarea>
            @error('titration_note')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
</form>


<div class="col-1">
    <form action="{{route('note_doses.destroy',$fixed_dose->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <x-dashboard.delete-button></x-dashboard.delete-button>
    </form>
</div>

</div>
<br>
<hr class="horizontal dark mt-0">
@endforeach