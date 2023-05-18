// Demo by http://creative-punch.net

var items = document.querySelectorAll('.circle a');

for(var i = 0, l = items.length; i < l; i++) {
items[i].style.left = (50 - 35*Math.cos(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";

items[i].style.top = (50 + 35*Math.sin(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";
}

document.querySelector('.menu-button').onclick = function(e) {
    e.preventDefault(); document.querySelector('.circle').classList.toggle('open');
}

var gender = 1;
var age = null;
var wieght = null;
var search_type = 3;

function changeSearchType(type_value) {
    search_type = type_value;
}

function search(){
    var url = "search";
    var value = document.getElementById('search_box').value;
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
                $("#searchResult").append("<li onclick='setText("+JSON.stringify(response.data[i])+")' value='"+id+"'>"+name+"</li>");
            }
        }
    });
}


// Set Text to search box and get details
function setText(data){
    $("#searchResult").empty();
    console.log("val= " + data.id);
    document.getElementById('search_box').value = data.name;

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
            console.log(response);
            var len = response.data.length;
            var options = "<option selected disabled>Select Drug</option>";
            for( var i = 0; i<len; i++){
                var id = response.data[i]['id'];
                var name = response.data[i]['name'];
                options += "<option value='"+id+"'>"+name+"</option>";
            }
            document.getElementById('main_drug').innerHTML = options;
        }
    });

}


  