<input type="hidden" value="{{ $id }}" name="variable_id">
<div class="row">
    <div class="col-md-3">
        <select class="form-control" name="effect_id" required />
        <option value="">Select Effect</option>
        @foreach ($effects as $effect)
        <option value="{{$effect->id}}" {{(old($effect->id)==$effect->id)?
            'selected':''}}>
            {{$effect->effect_type}}
        </option>
        @endforeach
        </select>
        @error('effect_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-3">
        <select class="form-control variable"  name="variable[]" required />
        <option value="">Select Varirables</option>
        <option value="ages">Ages</option>
        <option value="weights">Weights</option>
        <option value="genders">Genders</option>
        <option value="pregnancy_stages">Pregnancy Stages</option>
        <option value="illness">Illness Data</option>
        <option value="drugs">Drug Data</option>
        </select>
        @error('effect_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-3">
        <select class="form-control variable_data"  name="object_id[]" required />
        <option value="">Select object</option>
        </select>
    </div>
    <div class="col-1">
        <div class="input-group-append">
            <button class="btn bg-gradient-dark mb-0 " id="button_add_row" type="button"><i class="fas fa-plus"></i></button>
        </div>
    </div>
</div>
<div id="duplicate"></div>
<br><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    ////////////////////for fetch variables////////////
	   $(document).ready(function () {
          $('.variable').on('change', function () {
              var variable = $('.variable').val();
              $.ajax({
                  url: "{{route('fetch_variables')}}",
                  type: "POST",
                  data: {
                      variable: variable,
                      _token: '{{csrf_token()}}'
                  },
                 success:function(response){
					      $('.variable_data').html(response.result);
                  },
              });
          });  	
      });
    ////////////////////for fetch variables////////////

    ////////////////////add row////////////
	   $(document).ready(function () {
          $('#button_add_row').on('click', function () {
            var number = 0;
              $.ajax({
                  url: "{{route('add_row')}}",
                  type: "post",
                  data: {
                    number:number,
                         _token: '{{csrf_token()}}'
                     },
                 success:function(response){
					      $('#duplicate').append(response.result);
                  },
              });
          });  	
      });
    ////////////////////for fetch branch////////////
</script>