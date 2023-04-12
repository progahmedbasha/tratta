<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>

<div class="col-md-3">
    <select class="form-control" id="variables0" onchange="selectVariable(0)" name="variable[]"
        style="background-color: #333333;color:#3F7090;" required />
    <option value="">Varirables</option>
    <option value="ages">Ages</option>
    <option value="weights">Weights</option>
    <option value="genders">Genders</option>
    <option value="pregnancy_stages">Pregnancy Stages</option>
    <option value="illness">Illness Data</option>
    <option value="drugs">Drug Data</option>
    <option value="indications">Indication</option>
    </select>
    @error('variable')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-3">
    <select class="js-example-basic-multiple form-control" multiple="multiple" id="variable_data0" required />
    </select>
</div>
<div class="col-1">
    <div class="input-group-append">
        <x-dashboard.add-button onclick="addRow()"></x-dashboard.add-button>
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
                  url: "{{route('forbidden_fetch_variables')}}",
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
                     url: "{{route('forbidden_add_row')}}",
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

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>