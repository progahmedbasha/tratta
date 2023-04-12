@if($illness_subs->count() > 0 )
<br id="br{{ $number }}">
<div class="row" id="row{{ $number }}">
   <div class="col">
        <input class="form-control" type="number" step="any" placeholder="from" value="{{old('from')}}" name="from[]"
            required>
        @error('from')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col">
        <input class="form-control" type="number" step="any" placeholder="to" value="{{old('to')}}" name="to[]" required>
        @error('to')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col">
        <select class="form-control" name="illness_sub_id[]" required>
            <option value="">Illness Category</option>
            @foreach ($illness_subs as $illness_sub)
            <option value="{{$illness_sub->id}}">
                {{$illness_sub->name}}
            </option>
            @endforeach
        </select>
    </div>
        <div class="col-1">
        <div class="input-group-append input_test{{ $number }}">
            <div id="block_show{{ $number }}" style="display: block;">
                {{-- <button class="btn bg-gradient-danger mb-0 " id="button_add_row{{ $number }}"
                    onclick="deleteFunction({{ $number }})" type="button"><i class="fas fa-trash"></i></button> --}}
                    <x-dashboard.delete-ajax id="button_add_row{{ $number }}"
                    onclick="deleteFunction({{ $number }})"></x-dashboard.delete-ajax>
            </div>
        </div>
    </div>
</div>
<br>
<script>
    ////////////////////delete row////////////
         function deleteFunction(number) {
                var row = document.getElementById('row'+number);
                var br = document.getElementById('br'+number);
                row.remove();
                br.remove();
            }
    ////////////////////delete row////////////
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});

</script>
@endif