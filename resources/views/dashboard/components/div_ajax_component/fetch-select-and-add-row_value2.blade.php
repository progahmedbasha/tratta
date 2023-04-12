<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>

<div class="col-md-3">
    <select class="form-control" id="variables20" onchange="selectVariable2(0)" name="variable2[]"
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
    <select class="js-example-basic-test form-control" multiple="multiple" id="variable_data20" required />
    </select>
</div>
<div class="col-1">
    <div class="input-group-append">
        {{-- <button class="btn bg-gradient-dark mb-0 " onclick="addRow2()" type="button"><i class="fas fa-plus"></i></button> --}}
        <x-dashboard.add-button onclick="addRow2()"></x-dashboard.add-button>
    </div>
</div>
{{-- </div> --}}
<div id="duplicate2"></div>
<br><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    ////////////////////for fetch variables////////////
	   function selectVariable2(number) {
              var variable = document.getElementById('variables2'+number).value;
              console.log(variable);
              $.ajax({
                  url: "{{route('forbidden_fetch_variables')}}",
                  type: "POST",
                  data: {
                      variable: variable,
                      _token: '{{csrf_token()}}'
                  },
                 success:function(response){
					     document.getElementById('variable_data2'+number).innerHTML = (response.result);
                         var name = 'object_id2['+variable+'][]'
                         document.getElementById('variable_data2'+number).name = name;
                  },
              });
      }
    ////////////////////for fetch variables////////////

    ////////////////////add row////////////
    var currentRow = 0;
	   function addRow2() {
        currentRow++;
                 $.ajax({
                     url: "{{route('add_row_value2')}}",
                     type: "POST",
                     data: {
                         number:currentRow,
                         _token: '{{csrf_token()}}'
                     },
                  success:function(response){
					      $('#duplicate2').append(response.result);
                  },
                 });
        }
    ////////////////////for fetch branch////////////
</script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
   $('.js-example-basic-test').select2();
});
</script>