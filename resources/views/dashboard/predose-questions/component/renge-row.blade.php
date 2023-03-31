<div class="row">
    <div class="col">
        <input class="form-control" type="number" step="any" placeholder="from" value="{{old('from')}}" name="from[]"
            required>
        @error('from')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col">
        <input class="form-control" type="number" step="any" placeholder="to" value="{{old('to')}}" name="to[]"
            required>
        @error('to')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col">
        <select class="form-control" name="illness_sub_id[]" required>
            <option value="">Select Illness Category</option>
            @foreach ($illness_subs as $illness_sub)
            <option value="{{$illness_sub->id}}">
                {{$illness_sub->name}}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-1">
        <div class="input-group-append">
            <x-dashboard.add-button onclick="addRow()"></x-dashboard.add-button>
        </div>
    </div>
</div>
<div id="duplicate"></div>
<br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    ////////////////////add row////////////
    var currentRow = 0;
	   function addRow() {
        currentRow++;
                 $.ajax({
                     url: "{{route('second_question_add_row')}}",
                     type: "POST",
                     data: {
                         number:currentRow,
                         _token: '{{csrf_token()}}'
                     },
                  success:function(response){
					      $('#duplicate').append(response.result);
                  },
                 });
        }
    ////////////////////for fetch branch////////////
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
   $('.js-example-basic-test').select2();
   });
</script>