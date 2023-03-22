@if($effects->count() > 0 )
<br id="br{{ $number }}">
<div class="row" id="row{{ $number }}">
    <div class="col-md-3">
    </div>
    <div class="col-md-3">
        <select class="form-control" id="variables{{ $number }}" onchange="selectVariable({{ $number }})"
            name="variable[]" required />
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
        <select class="js-example-basic-multiple form-control" multiple="multiple" id="variable_data{{ $number }}" required />
        <option value="">Select object</option>
        </select>
    </div>
    <div class="col-1">
        <div class="input-group-append input_test{{ $number }}">
            <div id="block_show{{ $number }}" style="display: block;">
                <button class="btn bg-gradient-danger mb-0 " id="button_add_row{{ $number }}"
                    onclick="deleteFunction({{ $number }})" type="button"><i class="fas fa-trash"></i></button>
            </div>
        </div>
    </div>

</div>
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