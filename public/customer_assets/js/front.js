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
    indication_id = document.getElementById('drug_indication').value;
    preDoseQ("DrugIndication",indication_id);
    doseNoteResult();
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
    if (age_id == 1) {
        age_id = 2;
        document.getElementById("elderlyItem").style.backgroundColor = "#D7FE72";
    }else{
        age_id = 1;
        document.getElementById("elderlyItem").style.backgroundColor = "#F1F3F6";
    }
    preDoseQ("Age",age_id);
    doseNoteResult();
}

function setGender(pregnancy = null) {

    if (gender_id == 1) {
        gender_id = 2;
        document.getElementById("femaleItem").style.backgroundColor = "#D7FE72";
        document.getElementById("femaleSubMenu").style.display = 'block';
    }else{
        gender_id = 1;
        document.getElementById("femaleItem").style.backgroundColor = '#F1F3F6';
        document.getElementById("femaleSubMenu").style.display = 'none';
        clearPregnancy(pregnancy);
    }
    preDoseQ("Gender",gender_id);
    doseNoteResult();
}

//Weight select value border color
function weightSelectedValue(option_value) {

    document.getElementById("weightOption1").style.backgroundColor = "#F1F3F6";
    document.getElementById("weightOption2").style.backgroundColor = "#F1F3F6";
    document.getElementById("weightOption3").style.backgroundColor = "#F1F3F6";

    document.getElementById("weightOption"+option_value).style.backgroundColor = "#F2CC8F";

    weight_id = option_value;
    preDoseQ("Weight",weight_id);
    doseNoteResult();
}

function clearPregnancy(pregnancy) {
    for (var i = 0; i < pregnancy.length; i++) 
        document.getElementById("option"+i).style.backgroundColor = "#F1F3F6";

    pregnancy_stage_id = null;
}

//female select value border color
function femaleSelectedValue(pregnancy,option_value) {
    clearPregnancy(pregnancy);

    document.getElementById("option"+option_value).style.backgroundColor = "#F2CC8F";

    pregnancy_stage_id = pregnancy[option_value].id;
    preDoseQ("PregnancyStage",pregnancy_stage_id);
    doseNoteResult();
    pregnancy_category_toggle = !pregnancy_category_toggle;
    pregnancyCategory();
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
                document.getElementById('recommended_dose_background').style.backgroundColor = response.dose_result.effect.color;
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
    illnessObj.push({id: illnessObjectData.id, name: illnessObjectData.name});
    illness_category_id.push(illnessObjectData.id);
    setIllness();
    preDoseQ("IllnessSub",illness_category_id);
    doseNoteResult();
}

function deleteIllnessElement(key) {
    delete illnessObj[key];
    illness_category_id.pop(key);
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
    drugObj.push({id: drugObjectData.id, name: drugObjectData.name});
    drug_drug_id.push(drugObjectData.id);
    setDrugObj();
    preDoseQ("Drug",drug_drug_id);
    doseNoteResult();
}

function deleteDrugElement(key) {
    delete drugObj[key];
    drug_drug_id.pop(key)
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
                if(response.recheck_results != ""){
                    $note = "";
                    response.recheck_results.forEach(hx => {
                        $note += '<p style="color:'+hx.interaction_severity.color+';">'+hx.note + '</p>';
                    });
                    document.getElementById("recheck").innerHTML = $note;
                    $('#myModal_recheck').modal('show');
                }
            }
        }); 
    }
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
    $('#myModal_q1').modal('show');
}

function secondQuestions(questions) {
    document.getElementById('q2_lable').innerHTML = questions[0].label;
    document.getElementById('q2_unit').innerHTML = questions[0].unit;
    document.getElementById('q2_id').value = questions[0].id;
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
            if(response.result != ""){
                if(!illness_category_id.includes(response.result.illness_sub_id))
                    insertIllnessObjVal(response.result.illness_sub)
            }
            $('#myModal_q2').modal('hide');
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
    $('#myModal_q3').modal('show');
}

function question3Result(){
    var q3_value = $("input[name='q3_id']:checked").val();
    var q3_selected = q3_options[q3_value];
    if (isNaN(q3_value) || q3_value == '') {
      alert("Input not valid");
    } else {
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
        q3_options = [];
        $('#myModal_q3').modal('hide');
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
        async: true,
        data: {
            id : question.id,
        },
        success: function(response) {
            console.log(response);
            var row = '';
            (response.question).forEach(function (q4, i) {
                if(q4.is_sub == 0){
                    row += `<li class="nav-item"> 
                        <a class="nav-link " href="#submenu`+i+`" data-toggle="collapse" data-target="#submenu`+i+`" aria-expanded="true">
                        <span><b>`+q4.score_label+`</b></span></a>
                        <div class="collapse show" id="submenu`+i+`" aria-expanded="true">
                        <ul class="flex-column nav">`;
                    var cols = '';
                    (q4.child).forEach(child => {
                        cols += `<li class="nav-item"><a class="nav-link py-0" href="#">
                            <span>`+child.score_label+`</span> 
                            <input type="radio" class="form-check-input pull-right me-5" id="radioq11" name="optradio" value="`+child.id+`" >
                            </a></li>`;
                    });
                    row += cols + `</ul></div></li>`;
                }else{
                    row += `<li class="nav-item"><a class="nav-link py-0" href="#"><span>`+q4.score_label+`</span> 
                        <input type="checkbox" class="form-check-input pull-right me-5" id="radio1113" name="optradio" value="`+q4.id+`" >
                    </a></li>`;
                }

                document.getElementById("question4").innerHTML = row;
            });
            $('#myModal_q4').modal('show');
        }
    }); 
}

function question4Result() {
    var values = [];
    if(values.length > 0){
        
    }else{
        alert("Input not valid");
    }
}