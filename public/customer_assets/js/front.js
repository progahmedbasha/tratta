// Demo by http://creative-punch.net

var items = document.querySelectorAll('.circle a');

for(var i = 0, l = items.length; i < l; i++) {
    items[i].style.left = (50 - 35*Math.cos(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";

    items[i].style.top = (50 + 35*Math.sin(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";
}

document.querySelector('.menu-button').onclick = function(e) {
    e.preventDefault(); document.querySelector('.circle').classList.toggle('open');
}

//---------------------------------------------------------------------------------------------
//------------------------search type animation and transition---------------------------------
//---------------------------------------------------------------------------------------------

function pcsh1() {
    var x = document.getElementById("pc2");
    var y = document.getElementById("pc3");
    if (x.classList.contains("hide")) {
      x.classList.remove("hide");
    } else {
      x.classList.add("hide");
    }

    if (y.classList.contains("hide")) {
      y.classList.remove("hide");
    } else {
      y.classList.add("hide");
    }
}

function pcsh2() {
var x = document.getElementById("pc1");
var y = document.getElementById("pc3");
if (x.classList.contains("hide")) {
    x.classList.remove("hide");
} else {
    x.classList.add("hide");
}

if (y.classList.contains("hide")) {
    y.classList.remove("hide");
} else {
    y.classList.add("hide");
}
}

function pcsh3() {
var x = document.getElementById("pc1");
var y = document.getElementById("pc2");

if (x.classList.contains("hide")) {
    x.classList.remove("hide");
} else {
    x.classList.add("hide");
}

if (y.classList.contains("hide")) {
    y.classList.remove("hide");
} else {
    y.classList.add("hide");
}
}

  //---------------------------------------------------------------------------------------------

var search_type = 3;

///// toggle  ///////
var menu_toggle = false;
var weight_toggle = false;
var titration_toggle = false;
var pregnancy_category_toggle = false;
var calculator_toggle = false;
var drug_illness_toggle = false;

///// main drug /////////
var drug_id = null;
var indication_id = null;

///////// variables //////////////
var gender_id = 1;
var age_id = 1;
var weight_id = null;
var pregnancy_stage_id = null;
var illness_category_id = [];
var drug_drug_id = [];

//////// titration dose ///////////
var titration_note = null;


function refresh() {
    document.getElementById('search_box').value = '';
    document.getElementById('main_drug').innerHTML = "<option selected disabled>Select Drug</option>";
    document.getElementById('drug_indication').innerHTML = "<option selected disabled>For What Indication ?</option>";
    drug_id = null;
    indication_id = null;
}

function changeSearchType(type_value) {
    search_type = type_value;
    refresh();

    if(type_value == 3)
        pcsh1();
    else if(type_value == 1)
        pcsh2();
    else if(type_value == 2)
        pcsh3();
}

function search(){
    var url = "search";
    var value = document.getElementById('search_box').value;
    drug_id = null;
    indication_id = null;
    document.getElementById('main_drug').innerHTML = "<option selected disabled>Select Drug</option>";
    document.getElementById('drug_indication').innerHTML = "<option selected disabled>For What Indication ?</option>";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        type: 'post',
        cache: false,
        async: true,
        data: {
            type: search_type,
            search: value
        },
        success: function(response) {
            var len = response.data.length;
            $("#searchResult").empty();
            for( var i = 0; i<len; i++){
                var id = response.data[i]['id'];
                var name = response.data[i]['name'];
                if(search_type == 1){
                    var name = response.data[i]['name_key'];
                }
                
                $("#searchResult").append("<li onclick='setDrugs("+JSON.stringify(response.data[i])+")' value='"+id+"'>"+name+"</li>");
            }
        }
    });
}

// Set Text to search box and get details
function setDrugs(data){
    $("#searchResult").empty();
    document.getElementById('search_box').value = ((search_type == 1)?data.name_key:data.name);

    var url = "search-drugs";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        type: 'post',
        cache: false,
        async: true,
        data: {
            type: search_type,
            search_id: data.id
        },
        success: function(response) {
            var len = response.data.length;
            var options = "<option selected disabled>Select Drug</option>";
            for( var i = 0; i<len; i++){
                var id = response.data[i]['id'];
                var name = response.data[i]['name'];
                if (search_type == 1) 
                    name = response.data[i]['trade']['name_sub'];
                options += "<option value='"+id+"'>"+name+"</option>";
            }
            document.getElementById('main_drug').innerHTML = options;
        }
    });

}

function setIndicationOptions() {
    drug_id = document.getElementById('main_drug').value;
    preDoseQ("Age",age_id);
    preDoseQ("Gender",gender_id);
    doseNoteResult();
    var url = "search-indications";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        type: 'post',
        cache: false,
        async: true,
        data: {
            drug_id: drug_id,
        },
        success: function(response) {
            var len = response.data.length;
            var options = "<option selected disabled>For What Indication ?</option>";
            for( var i = 0; i<len; i++){
                var id = response.data[i]['id'];
                var name = response.data[i]['indication']['indication_title'];
                options += "<option value='"+id+"'>"+name+"</option>";
            }
            document.getElementById('drug_indication').innerHTML = options;
        }
    });
}

function setIndication() {
    var old_value = indication_id;
    indication_id = document.getElementById('drug_indication').value;
    var check = forbiddenCases();
    if(check){
        indication_id = old_value;
        if(old_value == null)
            document.getElementById('drug_indication').selectedIndex = 0;
        else
            document.getElementById('drug_indication').value = old_value;

    }else{
        preDoseQ("DrugIndication",indication_id);
        doseNoteResult();
    }
}

function menu() {
    if(menu_toggle){
        document.getElementById("femaleSubMenu").style.display = 'none';
        document.getElementById("category_section").style.display = 'none';
        document.getElementById("weightSubMenu").style.display = 'none';
        document.getElementById("calculatorSubMenu").style.display = 'none';
        document.getElementById("weightItem").style.backgroundColor = "#F1F3F6";
        document.getElementById("calculatorItem").style.backgroundColor = '#F1F3F6';
        document.getElementById("titrationItem").style.backgroundColor = '#F1F3F6';
        weight_toggle = false;
        menu_toggle = false;
    }else{
        if(gender_id == 2)
            document.getElementById("femaleSubMenu").style.display = 'block';
        menu_toggle = true;
    }
}

function menuItemAction(itemValue) {

    if (itemValue == 'weight'){
        if(weight_toggle){
            document.getElementById("weightItem").style.backgroundColor = '#F1F3F6';
            document.getElementById("weightSubMenu").style.display = 'none';
            weight_toggle = false;
        }else{
            document.getElementById("weightItem").style.backgroundColor = "#D7FE72";
            document.getElementById("weightSubMenu").style.display = 'block';
            weight_toggle = true;
        }
    }
    else if (itemValue == 'calculator'){
        if(calculator_toggle){
            document.getElementById("calculatorItem").style.backgroundColor = "#F1F3F6";
            document.getElementById("calculatorSubMenu").style.display = 'none';
            calculator_toggle = false;
        }else{
            document.getElementById("calculatorItem").style.backgroundColor = "#D7FE72";
            document.getElementById("calculatorSubMenu").style.display = 'block';
            calculator_toggle = true;
        }
    }
    else if (itemValue == 'titration'){
        if(titration_toggle){
            document.getElementById("titrationItem").style.backgroundColor = "#F1F3F6";
            titration_toggle = false;
            additionalMessage(titration_toggle);

        }else{
            document.getElementById("titrationItem").style.backgroundColor = "#D7FE72";
            titration_toggle = true;
            additionalMessage(titration_toggle,'<p>'+titration_note+'</p>');
        }
        
    }
    
    
}

function setAge() {
    age_id = ((age_id == 1)? 2 : 1);
    var check = forbiddenCases();
    if(check){
        age_id = ((age_id == 1)? 2 : 1);
    }else{
        if (age_id == 2) {
            document.getElementById("elderlyItem").style.backgroundColor = "#D7FE72";
        }else{
            document.getElementById("elderlyItem").style.backgroundColor = "#F1F3F6";
        }
        preDoseQ("Age",age_id);
        doseNoteResult();
    }
}

function setGender(pregnancy = null) {
    gender_id = ((gender_id == 1)? 2 : 1);
    var check = forbiddenCases();
    if(check){
        gender_id = ((gender_id == 1)? 2 : 1); 
    }else{
        if (gender_id == 2) {
            document.getElementById("femaleItem").style.backgroundColor = "#D7FE72";
            document.getElementById("femaleSubMenu").style.display = 'block';
        }else{
            document.getElementById("femaleItem").style.backgroundColor = '#F1F3F6';
            document.getElementById("femaleSubMenu").style.display = 'none';
            clearPregnancy(pregnancy);
        }
        preDoseQ("Gender",gender_id);
        doseNoteResult();
    }
}

//Weight select value border color
function weightSelectedValue(option_value) {
    var old_value = weight_id;
    weight_id = option_value;
    var check = forbiddenCases();
    if(check){
        weight_id = old_value;
    }else{
        document.getElementById("weightOption1").style.backgroundColor = "#F1F3F6";
        document.getElementById("weightOption2").style.backgroundColor = "#F1F3F6";
        document.getElementById("weightOption3").style.backgroundColor = "#F1F3F6";

        document.getElementById("weightOption"+option_value).style.backgroundColor = "#F2CC8F";

        preDoseQ("Weight",weight_id);
        doseNoteResult();
    }
}

function clearPregnancy(pregnancy) {
    for (var i = 0; i < pregnancy.length; i++) 
        document.getElementById("option"+i).style.backgroundColor = "#F1F3F6";

    pregnancy_stage_id = null;
}

//female select value border color
function femaleSelectedValue(pregnancy,option_value) {
    old_value = pregnancy_stage_id;
    pregnancy_stage_id = pregnancy[option_value].id;
    var check = forbiddenCases();
    if(check){
        pregnancy_stage_id = old_value;
    }else{
        clearPregnancy(pregnancy);
        document.getElementById("option"+option_value).style.backgroundColor = "#F2CC8F";
        pregnancy_stage_id = pregnancy[option_value].id;
        preDoseQ("PregnancyStage",pregnancy_stage_id);
        doseNoteResult();
        pregnancy_category_toggle = !pregnancy_category_toggle;
        pregnancyCategory();
    }
}

function pregnancyCategory() {
    pregnancy_category_toggle = !pregnancy_category_toggle;
    if(pregnancy_stage_id != null && drug_id != null && pregnancy_category_toggle){
        var url = "drug-pregnancy-result";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'post',
            cache: false,
            async: true,
            data: {
                drug_id : drug_id,
                pregnancy_stage_id : pregnancy_stage_id,
            },
            success: function(response) {
                var message = `<p style="font-family: 'BreadIdol';font-style: normal; font-weight: 400; font-size: 32px;">`+response.result.safety.type+` - Safe</p><br>
                <p style="font-family: 'BreadIdol';">`+response.result.note+`</p>`;
                additionalMessage(true,message); 
            }
        });
    }else{
        additionalMessage(false);
    }
}

function clearCalculate () {
    document.getElementById("ageField").value = '';
    document.getElementById("scrField").value = '';
    document.getElementById("resultBtn").innerHTML = "Result";
}

function resultCalculate () {
    var age = document.getElementById('ageField').value;
    var scr = document.getElementById('scrField').value;

    if (age != "" && scr != ""){
        calculator(age, scr);
    }
}

function calculator(age, scr) {
    if (weight_id != null){
        var url = "calculator";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'post',
            cache: false,
            async: true,
            data: {
                gender_id : gender_id,
                weight_id : weight_id,
                age : age,
                scr : scr
            },
            success: function(response) {
                document.getElementById("resultBtn").innerHTML = response.result;
                if(response.scr != ""){
                    if(!illness_category_id.includes(response.scr.illness_sub_id))
                        insertIllnessObjVal(response.scr.illness_sub);
                }
                if(response.calc_result != ""){
                    if(!illness_category_id.includes(response.calc_result.illness_sub_id))
                        insertIllnessObjVal(response.calc_result.illness_sub);
                }
                if (response.age.id != age_id)
                    setAge();
            }
        }); 
    }else{
        alert('You should select weight first');
    }
}

function kidneys() {
    var url = "kidneys";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        type: 'post',
        cache: false,
        async: true,
        success: function(response) {
            if(!illness_category_id.includes(response.result.illness_sub_id))
                insertIllnessObjVal(response.result.illness_sub);
        }
    }); 
}

function additionalMessage(open,message = null) {
    if (!open) {
        document.getElementById("category_section").style.display = 'none';
    }else {
        document.getElementById("category_section").style.display = 'flex';
        document.getElementById("additional_message").innerHTML = message ;
    }
}

function doseNoteResult() {
    var data = setVariableData();

    if(drug_id != null){
        var url = "dose-note-result";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'post',
            cache: false,
            async: true,
            data: data,
            success: function(response) {
                document.getElementById('recommended_dose').innerHTML = response.dose_result.dose_message.recommended_dosage;
                document.getElementById('recommended_dose_background').style.backgroundColor = fromHexToRGB(response.dose_result.effect.color);
                document.getElementById('dosage_note').innerHTML = response.dose_result.dose_message.dosage_note;
                titration_note = response.dose_result.dose_message.titration_note;
                var notes = "";
                for (var i = 0; i < response.note_result.length ; i++)
                    notes += response.note_result[i].note_message.note + '\n';
                document.getElementById('notes').innerHTML = (notes != "")?notes:'Notes';
            }
        });
    }
}

function fromHexToRGB(hex) {
    var r = parseInt(hex.slice(1, 3), 16);
    var g = parseInt(hex.slice(3, 5), 16);
    var b = parseInt(hex.slice(5, 7), 16);
    var opacityval = 0.6;
    var rgb = `rgb(`+r+`, `+g+`, `+b+`, 0.62)`;
    return rgb;
}

function setVariableData() {
    var data = {
        drug_id : drug_id,
        gender_id : gender_id,
        age_id : age_id,
    }

    if(indication_id != null)
        data['indication_id'] = indication_id;

    if(weight_id != null)
        data['weight_id'] = weight_id;

    if(pregnancy_stage_id != null)
        data['pregnancy_stage_id'] = pregnancy_stage_id;

    if(illness_category_id.length != 0 )
        data['illness_category_id'] = illness_category_id;

    if(drug_drug_id.length != 0)
        data['drug_drug_id'] = drug_drug_id;
        
    return data;
}

//---------------------calculator methods-------------------------------------------


function illnessDrugShow () {
    if(drug_illness_toggle){
        document.getElementById("illness_drug_list").style.display = "none";
        drug_illness_toggle = false;
    }else{
        document.getElementById("illness_drug_list").style.display = "flex";
        drug_illness_toggle = true;
    }
}

var illnessObj = [];
var drugObj = [];

function searchIllnesses() {
    var value = document.getElementById('illness_search').value;
    var url = "illness-search";
    $("#illnessSearchResult").empty();
    if (value != "") {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'post',
            cache: false,
            async: true,
            data: {
                search: value,
                illness_list : illness_category_id,
            },
            success: function(response) {
                var len = response.data.length;

                for( var i = 0; i<len; i++){
                    var id = response.data[i]['id'];
                    var name = response.data[i]['name'];
                    
                    $("#illnessSearchResult").append("<li style='cursor: pointer;' onclick='insertIllnessObjVal("+JSON.stringify(response.data[i])+")' value='"+id+"'>"+name+"</li>");
                }

            }
        });
    }
}

function insertIllnessObjVal(illnessObjectData) {
    illness_category_id.push(illnessObjectData.id);
    var check = forbiddenCases();
    if(check){
        var i = illness_category_id.indexOf(illnessObjectData.id);
        illness_category_id.splice(i, 1);
    }else{
        illnessObj.push({id: illnessObjectData.id, name: illnessObjectData.name});
        preDoseQ("IllnessSub",illnessObjectData.id);
        doseNoteResult();
    }
    setIllness();
}

function deleteIllnessElement(key) {
    illnessObj.splice(key, 1);
    illness_category_id.splice(key, 1);
    setIllness();
    doseNoteResult();
}

function setIllness() {
    $("#illnessSearchResult").empty();
    document.getElementById('illness_search').value = "";
    $("#illness_list").text('');
    for(var key in illnessObj)
    {
        var name = illnessObj[key].name;
        $("#illness_list").append("<li class='mb-2' >"+name+"   <span style='color:red;cursor: pointer;float:right;margin-right:5px;' onclick='deleteIllnessElement("+key+")'>X</span></li>");
    }

}

function searchDrugs() {
    var value = document.getElementById('drugs_search').value;
    var url = "drugs-search";
    $("#drugsSearchResult").empty();
    if (value != "") {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'post',
            cache: false,
            async: true,
            data: {
                search: value,
                drug_list: drug_drug_id,
            },
            success: function(response) {
                var len = response.data.length;
                
                for( var i = 0; i<len; i++){
                    var id = response.data[i]['id'];
                    var name = response.data[i]['name'];
                    
                    $("#drugsSearchResult").append("<li style='cursor: pointer;' onclick='insertDrugObjVal("+JSON.stringify(response.data[i])+")' value='"+id+"'>"+name+"</li>");
                }
            }
        });
    }
}

function insertDrugObjVal(drugObjectData) {
    drug_drug_id.push(drugObjectData.id);
    var check = forbiddenCases();
    if(check){
        var i = drug_drug_id.indexOf(drugObjectData.id);
        drug_drug_id.splice(i, 1);
    }else{
        drugObj.push({id: drugObjectData.id, name: drugObjectData.name});
        preDoseQ("Drug",drugObjectData.id);
        doseNoteResult();
    }
    setDrugObj();
}

function deleteDrugElement(key) {
    drugObj.splice(key, 1);
    drug_drug_id.splice(key, 1);
    setDrugObj();
    doseNoteResult();
}

function setDrugObj() {
    $("#drugsSearchResult").empty();
    document.getElementById('drugs_search').value = "";
    $("#drug_list").text('');
    for(var key in drugObj)
    {
        var name = drugObj[key].name;
        $("#drug_list").append("<li class='mb-2' >"+name+"   <span style='color:red;cursor: pointer;float:right;margin-right:5px;' onclick='deleteDrugElement("+key+")'>X</span></li>");
    }
}

function recheckDrugs() {
    if(drug_drug_id.length > 1){
        var url = "recheck-drugs";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'post',
            cache: false,
            async: true,
            data: {
                drug_drug_id : drug_drug_id
            },
            success: function(response) {
                $note = "";
                if(response.recheck_results != ""){
                    response.recheck_results.forEach(hx => {
                        $note += '<p style="color:'+hx.interaction_severity.color+';">'+hx.note + '</p>';
                    });
                }else {
                    $note = '<p>No Interaction</p>';
                }
                document.getElementById("recheck").innerHTML = $note;
                $('#myModal_recheck').modal('show');
            }
        }); 
    }
}

function forbiddenCases() {
    var data = setVariableData();
    var url = "forbidden-cases";
    var check = false;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'post',
            cache: false,
            async: false,
            data: data,
            success: function(response) {
                if(response.forbidden_cases.length > 0){
                    var cases = "";
                    (response.forbidden_cases).forEach(forbidden_case => {
                        cases += `<p>`+forbidden_case.note+`</p>`;
                    });
                    document.getElementById("recheck").innerHTML = cases;
                    $('#myModal_recheck').modal('show');
                    check = true;
                }
            }
        });

    return check;
}

function preDoseQ(model,id) {
    if(drug_id != null){
        var url = "preDoseQ";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'post',
            cache: false,
            async: true,
            data: {
                drug_id : drug_id,
                model : model,
                id : id
            },
            success: function(response) {
                if(response.questions != null && response.questions != ''){
                    if(response.questions.first_questions.length > 0)
                        firstQuestions(response.questions.first_questions);
                    if(response.questions.second_questions.length > 0)
                        secondQuestions(response.questions.second_questions);
                    if(response.questions.third_questions.length > 0)
                        thirdQuestions(response.questions.third_questions);
                    if(response.questions.fourth_question != null && response.questions.fourth_question != '')
                        fourthQuestions(response.questions.fourth_question);
                }
            }
        }); 
    }
}

function firstQuestions(questions) {
    var message = "";
    questions.forEach(question => {
        message += '<p>'+question.text+'</p>';
    });
    document.getElementById('question1').innerHTML = message;
    $('#myModal_q1').modal({backdrop: 'static', keyboard: false});
    $('#myModal_q1').modal('show');
}

function secondQuestions(questions) {
    document.getElementById('q2_lable').innerHTML = questions[0].label;
    document.getElementById('q2_unit').innerHTML = questions[0].unit;
    document.getElementById('q2_id').value = questions[0].id;
    document.getElementById('q2-range-block').display = "none";
    $('#myModal_q2').modal({backdrop: 'static', keyboard: false});
    $('#myModal_q2').modal('show');
}

function question2Result(){
  var q2_value = document.getElementById("q2_value").value;
  var q2_id = document.getElementById("q2_id").value;
  if (isNaN(q2_value) || q2_value == '') {
    alert("Input not valid");
  } else {
    var url = "question2-result";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        type: 'post',
        cache: false,
        async: true,
        data: {
            q2_value : q2_value,
            q2_id : q2_id
        },
        success: function(response) {
            if(response.result != "" && response.result != null){
                if(!illness_category_id.includes(response.result.illness_sub_id))
                    insertIllnessObjVal(response.result.illness_sub)
                $('#myModal_q2').modal('hide');
            }else{
                if(q2_value > response.max || q2_value < response.min){
                    document.getElementById('q2-range-block').style.display = "block";
                    document.getElementById('q2-range-message').innerHTML = `Out of range (`+response.min+` : `+response.max+`)`;
                }
                else
                    $('#myModal_q2').modal('hide');
            }
            
        }
    }); 
  }
}

var q3_options = [];
function thirdQuestions(questions) {
    var q3_value = '';
    questions.forEach(function (question, i) {
        q3_options[i] = question;
        q3_value += `<li class="mb-3"><span>`+question.text+`</span> <input type="radio" class="form-check-input pull-right me-5" name="q3_id" value="`+i+`" ></li>`;
    });
    document.getElementById("question3").innerHTML = q3_value;
    $('#myModal_q3').modal({backdrop: 'static', keyboard: false});
    setTimeout(() => {
        $('#myModal_q3').modal('show');
    }, 300)
    
}

function question3Result(){
    var q3_value = $("input[name='q3_id']:checked").val();
    var q3_selected = q3_options[q3_value];
    if (isNaN(q3_value) || q3_value == '') {
      alert("Input not valid");
    } else {
        q3_options = [];
        $('#myModal_q3').modal('hide');
        if(q3_selected.variableable_type == "App\\Models\\Age" && q3_selected.variableable_id != age_id)
            setAge();
        else if(q3_selected.variableable_type == "App\\Models\\Gender" && q3_selected.variableable_id != gender_id)
            setGender();
        else if(q3_selected.variableable_type == "App\\Models\\Weight" && q3_selected.variableable_id!= weight_id)
            weightSelectedValue(q3_selected.variableable_id);
        else if(q3_selected.variableable_type == "App\\Models\\PregnancyStage" && q3_selected.variableable_id!= pregnancy_stage_id && gender_id == 2)
            femaleSelectedValue(getPregnancyStage(),q3_selected.variableable_id);
        else if(q3_selected.variableable_type == "App\\Models\\Drug" && !drug_drug_id.includes(q3_selected.variableable_id))
            insertDrugObjVal(q3_selected.variableable);
        else if(q3_selected.variableable_type == "App\\Models\\IllnessSub" && !illness_category_id.includes(q3_selected.variableable_id))
            insertIllnessObjVal(q3_selected.variableable);
    }
}

function getPregnancyStage(){
    var url = "pregnancy-stage";
    var stages;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        type: 'post',
        cache: false,
        async: false,
        success: function(response){
            stages = response.stages;
        }
    }); 
    return stages;
}

let q4Options = [];

function fourthQuestions(question) {
    var url = "question4-data";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        type: 'post',
        cache: false,
        async: false,
        data: {
            id : question.id,
        },
        success: function(response) {
            var row = '<ul class="mymenu nav flex-column ms-5" style="text-align:left;" >';
            var row1 = '<ul class="mymenu nav flex-column ms-5 mt-4" style="text-align:left;" >';
            (response.question).forEach(function (q4, i) {
                if(q4.is_sub == 0){
                    row += `<li class="nav-item"> 
                        <a class="nav-link " href="#submenu`+i+`" data-toggle="collapse" data-target="#submenu`+i+`" aria-expanded="true">
                        <span><b>`+q4.score_label+`</b></span></a>
                        <div class="collapse show" id="submenu`+i+`" aria-expanded="true">
                        <ul class="flex-column nav">`;
                    var cols = '';
                    let optName = 'optradio'+i;
                    q4Options.push(optName);
                    
                    (q4.child).forEach(child => {
                        cols += `<li class="nav-item"><a class="nav-link py-0" href="#">
                            <span>`+child.score_label+`</span> 
                            <input type="radio" class="form-check-input pull-right me-5" name="`+ optName +`" value="`+child.id+`" >
                            </a></li>`;
                    });
                    row += cols + `</ul></div></li>`;
                }else{
                    row1 += `<li class="nav-item"><a class="nav-link py-0" href="#"><span>`+q4.score_label+`</span> 
                        <input type="checkbox" class="form-check-input pull-right me-5"  name="checkboxList" value="`+q4.id+`" >
                    </a></li>`;
                }
            });

            row += '</ul>';
            row1 += '</ul>';
            document.getElementById("question4").innerHTML = row + row1;
            $('#myModal_q4').modal({backdrop: 'static', keyboard: false});
            setTimeout(() => {
                $('#myModal_q4').modal('show');
            }, 300)
        }
    }); 

}

function question4Result() {
    var selectedOptionsID = [];
    q4Options.forEach(opt => {
        let res = $("input[name="+ opt +"]:checked").val();
        selectedOptionsID.push(res);
    });

    $.each($("input[name='checkboxList']:checked"), function () {
        selectedOptionsID.push($(this).val());
    });
    
    if(selectedOptionsID.length > 0){
        var url = "question4-result";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        type: 'post',
        cache: false,
        async: true,
        data: {
            score_id : selectedOptionsID,
        },
        success: function(response) {
            if(response.result != ""){
                if(!illness_category_id.includes(response.result.illness_sub_id))
                    insertIllnessObjVal(response.result.illness_sub)
            }
            (response.variables).forEach(variable => {
                if(variable.variableable_type == "App\\Models\\Age" && variable.variableable_id != age_id)
                    setAge();
                else if(variable.variableable_type == "App\\Models\\Gender" && variable.variableable_id != gender_id)
                    setGender();
                else if(variable.variableable_type == "App\\Models\\Weight" && variable.variableable_id!= weight_id)
                    weightSelectedValue(variable.variableable_id);
                else if(variable.variableable_type == "App\\Models\\PregnancyStage" && variable.variableable_id!= pregnancy_stage_id && gender_id == 2)
                    femaleSelectedValue(getPregnancyStage(),variable.variableable_id);
                else if(variable.variableable_type == "App\\Models\\Drug" && !drug_drug_id.includes(variable.variableable_id))
                    insertDrugObjVal(variable.variableable);
                else if(variable.variableable_type == "App\\Models\\IllnessSub" && !illness_category_id.includes(variable.variableable_id))
                    insertIllnessObjVal(variable.variableable);
            });
            q4Options = [];
            $('#myModal_q4').modal('hide');
        }
    }); 
    }else{
        alert("Input not valid");
    }
}