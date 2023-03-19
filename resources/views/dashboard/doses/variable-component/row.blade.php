@if($effects->count() > 0 )
<div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-3">
        <select class="form-control" id="select_row" name="variable" required />
        <option value="">Select Varirables</option>
        <option value="Ages">Ages</option>
        <option value="Weights">Weights</option>
        <option value="Genders">Genders</option>
        <option value="pregnancy_stages">Pregnancy Stages</option>
        <option value="Illness">Illness Data</option>
        <option value="drug">Drug Data</option>
        </select>
        @error('effect_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-3">
        <select class="form-control" id="variable_data" name="object_id" required />
        <option value="">Select object</option>
        </select>
    </div>
    <div class="col-1">
        <div class="input-group-append">
            <button class="btn bg-gradient-dark mb-0 " id="button_add_row" type="button"><i class="fas fa-plus"></i></button>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    ////////////////////for fetch branch////////////
	   $(document).ready(function () {
          $('#select_row').on('change', function () {
              var variable = $('#variable').val();
              $.ajax({
                  url: "{{route('fetch_variables')}}",
                  type: "POST",
                  data: {
                      variable: variable,
                      _token: '{{csrf_token()}}'
                  },
                 success:function(response){
					      $('#variable_data').html(response.result);
                  },
              });
          });  	
      });
    ////////////////////for fetch branch////////////

    ////////////////////add row////////////
	   $(document).ready(function () {
          $('#button_add_row').on('click', function () {
              $.ajax({
                  url: "{{route('add_row')}}",
                  type: "get",
                 success:function(response){
					      $('#duplicate').append(response.result);
                  },
              });
          });  	
      });
    ////////////////////for fetch branch////////////
</script>
@endif