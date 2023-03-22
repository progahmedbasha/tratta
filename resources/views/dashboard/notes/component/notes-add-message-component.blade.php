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
            <button class="btn bg-gradient-info mb-0" type="submit"><i class="fas fa-save"></i></button>
        </div>
    </div>
</div>