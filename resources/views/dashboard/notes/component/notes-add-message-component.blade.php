<div class="row">
    <div class="col-7">
        <textarea class="form-control" placeholder="Note" name="note"
            required>{{old('note')}}</textarea>
        @error('note')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-2">
        <input type="number" min="1" step="any" class="form-control" placeholder="Priority" value="{{old('priority')}}" name="priority" required>
        @error('priority')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
       <div class="col-1">
        <div class="input-group-append">
            <x-dashboard.save-button></x-dashboard.save-button>
        </div>
    </div>
</div>