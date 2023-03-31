<div class="row">
    <div class="col-7">
        <textarea class="form-control" placeholder="Recommended Dose" name="recommended_dosage"
            required>{{old('recommended_dosage')}}</textarea>
        @error('recommended_dosage')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-2">
        <input type="number" min="1" step="any" class="form-control" placeholder="Priority" value="{{old('priority')}}" name="priority" required>
        @error('priority')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div><br>
<div class="row">
    <div class="col-7">
        <textarea class="form-control" placeholder="Dosage Note" name="dosage_note"
            required>{{old('dosage_note')}}</textarea>
        @error('dosage_note')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div><br>
<div class="row">
    <div class="col-7">
        <textarea class="form-control" placeholder="Titration Note" name="titration_note"
            required>{{old('titration_note')}}</textarea>
        @error('titration_note')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-2"></div>
    <div class="col-1">
        <div class="input-group-append">
            <x-dashboard.save-button></x-dashboard.save-button>
        </div>
    </div>
</div>