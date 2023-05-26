// Demo by http://creative-punch.net

var items = document.querySelectorAll('.circle a');

for(var i = 0, l = items.length; i < l; i++) {
    items[i].style.left = (50 - 35*Math.cos(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";

    items[i].style.top = (50 + 35*Math.sin(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";
}

document.querySelector('.menu-button').onclick = function(e) {
    e.preventDefault(); document.querySelector('.circle').classList.toggle('open');
}

var search_type = 3;

var drug_id = null;
var indication_id = null;

var gender_id = 1;
var age_id = 1;
var weight_id = null;
var pregnancy_stage_id = null;
var illness_category_id = null;
var drug_drug_id = null;


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
    else if(type_value == 2)
        pcsh2();
    else if(type_value == 1)
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

function setAge() {
    if (age_id == 1) {
        age_id = 2;
        document.getElementById("elderlyItem").style.backgroundColor = "#D7FE72";
    }else{
        age_id = 1;
        document.getElementById("elderlyItem").style.backgroundColor = "#F1F3F6";
    }
    dose_note_result();
}

function setGender() {

    if (gender_id == 1) {
        gender_id = 2;
        document.getElementById("femaleItem").style.backgroundColor = "#D7FE72";
        document.getElementById("femaleSubMenu").style.display = 'block';
    }else{
        gender_id = 1;
        document.getElementById("femaleItem").style.backgroundColor = '#F1F3F6';
        document.getElementById("femaleSubMenu").style.display = 'none';

    }
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
                    var name = response.data[i]['trade']['name_sub'];
                options += "<option value='"+id+"'>"+name+"</option>";
            }
            document.getElementById('main_drug').innerHTML = options;
        }
    });

}

function setIndicationOptions() {
    drug_id = document.getElementById('main_drug').value;
    dose_note_result();
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
    dose_note_result();
}

function dose_note_result() {
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
            data: {
                drug_id : drug_id,
                indication_id : indication_id,
                gender_id : gender_id,
                age_id : age_id,
                weight_id : weight_id,
                pregnancy_stage_id : pregnancy_stage_id,
                illness_category_id : illness_category_id,
                drug_drug_id : drug_drug_id,
            },
            success: function(response) {
                document.getElementById('recommended_dose').innerHTML = response.dose_result.dose_message.recommended_dosage;
                document.getElementById('dosage_note').innerHTML = response.dose_result.dose_message.dosage_note;
                var notes = "";
                for (var i = 0; i < response.note_result.length ; i++)
                    notes += response.note_result[i].noteMessage.note + '<br>';
                document.getElementById('notes').innerHTML = (notes != "")?notes:'Notes';
            }
        });
    }
}

function menuItemAction(itemValue) {
    document.getElementById("weightItem").style.backgroundColor = '#F1F3F6';
    document.getElementById("calculatorItem").style.backgroundColor = '#F1F3F6';
    document.getElementById("titrationItem").style.backgroundColor = '#F1F3F6';

    document.getElementById("weightSubMenu").style.display = 'none';
    document.getElementById("femaleSubMenu").style.display = 'none';
    document.getElementById("calculatorSubMenu").style.display = 'none';

    if (itemValue == 'weight'){
        document.getElementById("weightItem").style.backgroundColor = "#D7FE72";
        document.getElementById("weightSubMenu").style.display = 'block';
    }
    else if (itemValue == 'calculator'){
        document.getElementById("calculatorItem").style.backgroundColor = "#D7FE72";
        document.getElementById("calculatorSubMenu").style.display = 'block';
    }
    else if (itemValue == 'titration'){
        document.getElementById("titrationItem").style.backgroundColor = "#D7FE72";
    }
    
    
}


//female select value border color
function femaleSelectedValue(option_value) {

    document.getElementById("option1").style.borderWidth = "0px";
    document.getElementById("option2").style.borderWidth = "0px";
    document.getElementById("option3").style.borderWidth = "0px";
    document.getElementById("option4").style.borderWidth = "0px";


        document.getElementById("option"+option_value).style.borderColor = "red";
        document.getElementById("option"+option_value).style.borderWidth = "1px";
        document.getElementById("option"+option_value).style.borderStyle = "solid";


  }



  //Weight select value border color
function weightSelectedValue(option_value) {

    document.getElementById("weightOption1").style.borderWidth = "0px";
    document.getElementById("weightOption2").style.borderWidth = "0px";
    document.getElementById("weightOption3").style.borderWidth = "0px";

        document.getElementById("weightOption"+option_value).style.borderColor = "red";
        document.getElementById("weightOption"+option_value).style.borderWidth = "1px";
        document.getElementById("weightOption"+option_value).style.borderStyle = "solid";
  }


  //CategoryActionButton

function categoryAction() {
    document.getElementById("category_section").style.display = 'flex';
}