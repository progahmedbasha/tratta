{{-- {{ $point->scorePoint->scorePoint }} --}}
<form action="{{route('fourth_questions.update',$point->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="row">
        @if ($point->scorePoint->variableable_type == 'App\Models\Age')
        <div class="col-3">
            <input type="text" class="form-control" value="Age" disabled /><br>
        </div>
        <div class="col-3">
            <input type="text" class="form-control" value="{{ $point->scorePoint->age->name }}" disabled /><br>
        </div>

        @elseif ($point->scorePoint->variableable_type == 'App\Models\Gender')
        <div class="col-3">
            <input type="text" class="form-control" value="Gender" disabled /><br>
        </div>
        <div class="col-3">
            <input type="text" class="form-control" value="{{ $point->scorePoint->gender->name }}" disabled /><br>
        </div>

        @elseif ($point->scorePoint->variableable_type == 'App\Models\Weight')
        <div class="col-3">
            <input type="text" class="form-control" value="Weight" disabled /><br>
        </div>
        <div class="col-3">
            <input type="text" class="form-control" value="{{ $point->scorePoint->weight->weight }}" disabled /><br>
        </div>
        @elseif ($point->scorePoint->variableable_type == 'App\Models\PregnancyStage')
        <div class="col-3">
            <input type="text" class="form-control" value="Pregnancy Stage" disabled /><br>
        </div>
        <div class="col-3">
            <input type="text" class="form-control" value="{{ $point->scorePoint->pregnancyStage->pregnancy_stage }}"
                disabled /><br>
        </div>
        @elseif ($point->scorePoint->variableable_type == 'App\Models\IllnessSub')
        <div class="col-3">
            <input type="text" class="form-control" value="Illness Data" disabled /><br>
        </div>
        <div class="col-3">
            <input type="text" class="form-control" value="{{ $point->scorePoint->illnessSub->name }}" disabled /><br>
        </div>
        @elseif ($point->scorePoint->variableable_type == 'App\Models\Drug')
        <div class="col-3">
            <input type="text" class="form-control" value="Drug" disabled /><br>
        </div>
        <div class="col-3">
            <input type="text" class="form-control" value="{{ $point->scorePoint->drug->name }}" disabled /><br>
        </div>
        @elseif ($point->scorePoint->variableable_type == 'App\Models\Indication')
        <div class="col-3">
            <input type="text" class="form-control" value="Indication" disabled /><br>
        </div>
        <div class="col-3">
            <input type="text" class="form-control" value="{{ $point->scorePoint->indication->indication_title }}"
                disabled /><br>
        </div>
        @endif

        <div class="col">
            <input type="text" class="form-control" placeholder="Label" value="{{ $point->score_label }}"
                name="label_score" requierd />
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="point" value="{{ $point->scorePoint->point }}"
                name="point" requierd />
        </div>
        <div class="col-1">
            <div class="input-group-append">
                <x-dashboard.edit-button></x-dashboard.edit-button>
            </div>
        </div>
</form>
<div class="col">
    <form action="{{route('delete_score',$point->id)}}" method="POST">
        @csrf
        <x-dashboard.delete-button></x-dashboard.delete-button>
    </form>
</div>
</div>