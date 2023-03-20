@if($effects->count() > 0 )
<br>
<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-3">
        <select class="form-control variable_row{{ $number }}" name="variable[]" required />
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
        <select class="form-control variable_data_row{{ $number }}" name="object_id[]" required />
        <option value="">Select object</option>
        </select>
    </div>
    <div class="col-1">
        <div class="input-group-append">
            <button class="btn bg-gradient-dark mb-0 " id="button_add_row" onclick="commentFunction({{ $number }})"
                type="button"><i class="fas fa-plus"></i></button>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    ////////////////////for fetch variables////////////
    $(document).ready(function () {
          $('.variable_row'+{{ $number }}).on('change', function () {
              var variable = $('.variable_row'+{{ $number }} ).val();
              $.ajax({
                  url: "{{route('fetch_variables')}}",
                  type: "POST",
                  data: {
                      variable: variable,
                      _token: '{{csrf_token()}}'
                  },
                 success:function(response){
					      $('.variable_data_row'+{{ $number }} ).html(response.result);
                  },
              });
          });
      });
      ////////////////////for fetch variables////////////
      ////////////////////for add row////////////
         function commentFunction(number) {
                 $.ajax({
                     url: "{{route('add_row')}}",
                     type: "POST",
                     data: {
                         number:number,
                         _token: '{{csrf_token()}}'
                     },
                  success:function(response){
					      $('#duplicate').append(response.result);
                  },
                 });
        }
        ////////////////////for add row////////////
@endif