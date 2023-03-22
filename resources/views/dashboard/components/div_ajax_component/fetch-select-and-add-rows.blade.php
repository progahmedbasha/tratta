<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>

<div class="col-md-3">
    <select class="form-control" id="variables0" onchange="selectVariable(0)" name="variable[]" required />
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
    <select class="js-example-basic-multiple form-control" multiple="multiple" id="variable_data0" required />
    </select>
</div>
<div class="col-1">
    <div class="input-group-append">
        <button class="btn bg-gradient-dark mb-0 " onclick="addRow()" type="button"><i class="fas fa-plus"></i></button>
    </div>
</div>
</div>
<div id="duplicate"></div>
<br><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    ////////////////////for fetch variables////////////
	   function selectVariable(number) {
              var variable = document.getElementById('variables'+number).value;
              console.log(variable);
              $.ajax({
                  url: "{{route('fetch_variables')}}",
                  type: "POST",
                  data: {
                      variable: variable,
                      _token: '{{csrf_token()}}'
                  },
                 success:function(response){
					     document.getElementById('variable_data'+number).innerHTML = (response.result);
                         var name = 'object_id['+variable+'][]'
                         document.getElementById('variable_data'+number).name = name;
                  },
              });
      }
    ////////////////////for fetch variables////////////

    ////////////////////add row////////////
    var currentRow = 0;
	   function addRow() {
        currentRow++;
                 $.ajax({
                     url: "{{route('add_row')}}",
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
    $('.js-example-basic-multiple').select2();
});
</script>