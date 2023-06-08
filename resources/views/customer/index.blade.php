<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tratta Application</title>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{asset('customer_assets/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}" rel="stylesheet">

  <script src="{{asset('customer_assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  
  <link href="{{asset('customer_assets/css/front.css')}}" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>  
    new WOW().init();  
</script>  

<style>
@font-face {
    font-family: 'Inkfree';
    src: url('{{ url('customer_assets/font/Inkfree.ttf') }}') format('truetype'); /* Chrome 4+, Firefox 3.5, Opera 10+, Safari 3—5 */
} 

@font-face {
    font-family: 'BreadIdol';
    src: url('{{ url('customer_assets/font/BreadIdol.ttf') }}') format('truetype'); /* Chrome 4+, Firefox 3.5, Opera 10+, Safari 3—5 */
} 


:root {
  --animate-duration: 800ms;
  --animate-delay: 0.9s;
}

#pc1 {
  display: inline-block;
  transition        : all .3s ease;
  -webkit-transition: all .3s ease;
  -webkit-animation-duration: 1s;
            animation-duration: 1s; 
            -webkit-animation-fill-mode: both; 
            animation-fill-mode: both; 
}

#pc1.hide {
  display: none;
  transition        : all .3s ease;
  -webkit-transition: all .3s ease;
  -webkit-animation-duration: 1s;
            animation-duration: 1s; 
            -webkit-animation-fill-mode: both; 
            animation-fill-mode: both; 

}

#pc2 {
  display: inline-block;
  transition        : all .3s ease;
  -webkit-transition: all .3s ease;
  -webkit-animation-duration: 1s;
            animation-duration: 1s; 
            -webkit-animation-fill-mode: both; 
            animation-fill-mode: both; 
}

#pc2.hide {
  display: none;
  transition        : all .3s ease;
  -webkit-transition: all .3s ease;
  -webkit-animation-duration: 1s;
            animation-duration: 1s; 
            -webkit-animation-fill-mode: both; 
            animation-fill-mode: both; 

}

#pc3 {
  display: inline-block;
  transition        : all .3s ease;
  -webkit-transition: all .3s ease;
  -webkit-animation-duration: 1s;
            animation-duration: 1s; 
            -webkit-animation-fill-mode: both; 
            animation-fill-mode: both; 
}

#pc3.hide {
  display: none;
  transition        : all .3s ease;
  -webkit-transition: all .3s ease;
  -webkit-animation-duration: 1s;
            animation-duration: 1s; 
            -webkit-animation-fill-mode: both; 
            animation-fill-mode: both; 

}

.item-style {
  top: 72% !important;
  width: 80px !important;
  font-size:10px !important;
  border-radius:5px !important;
  background-color: #ED4756 !important;
  line-height:20px !important;
  height:20px !important;
  Color:white !important;
  margin-left: -40px !important; 
  box-shadow: 0 4px 7px -1px rgba(0, 0, 0, 0.11), 0 2px 4px -1px rgba(0, 0, 0, 0.07);
  cursor: pointer;
}

.triangle-up {
	width: 0;
	height: 0;
	border-left: 5px solid transparent;
	border-right: 5px solid transparent;
	border-bottom: 10px solid #ED4756;
  display: flex;
  position: absolute;
  top: -4px;
  left: 35px;
}



.scroll::-webkit-scrollbar {
    width: 8px;
}

.scroll::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
}

.scroll::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}


.form-group .form-control-icon-search-illness {
  position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    color: #aaa;
    left: 0;
    top: -5px;
    padding-left: 0.25rem;
}

.form-group .form-control-icon-reset-illness {
    position: absolute;
    z-index: 11111111111111;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    color: #aaa;
    right: 0;
    top: -3px;
    font-size: 15px;
    padding-right: 0.25rem;
}

.autocomplete #illnessSearchResult {
    list-style: none;
    padding: 0px;
    width: 100%;
    position: absolute;
    margin: 0;
    background: white;
}

.autocomplete #illnessSearchResult li {
    background: #F2F3F4;
    padding: 4px;
    margin-bottom: 1px;
    font-size:12px;
}

.autocomplete #drugsSearchResult {
    list-style: none;
    padding: 0px;
    width: 100%;
    position: absolute;
    margin: 0;
    background: white;
}

.autocomplete #drugsSearchResult li {
    background: #F2F3F4;
    padding: 4px;
    margin-bottom: 1px;
    font-size:12px;
}

</style>

</head>
<body>

<div class="container" >
  
    <div class="card mt-3 mb-3" style="background-color:transparent;border-radius:50px;border:4px solid silver;">
        <div class="card-body">

          <div style="background-image:url('{{ url('customer_assets/images/bg1.svg') }}');background-repeat: no-repeat; background-color: white;border-radius:25px;padding:10px;margin:10px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;">  

          <!-------------------------navbar Starrt------------------------------------------------>
                    <nav class="navbar navbar-expand-sm" style="padding-right:40px;padding-left:40px;">
                              <div class="container-fluid">
                                  <a class="navbar-brand" href="javascript:void(0)"> <img src="{{ url('customer_assets/images/Tratta_prescribe.svg') }}" ></a>
                                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                                    <span class="navbar-toggler-icon"></span>
                                  </button>
                                  <div class="collapse navbar-collapse" id="mynavbar">
                                    <ul class="navbar-nav me-auto">
                                      <!--<li class="nav-item">
                                        <a class="nav-link" href="javascript:void(0)">Link</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" href="javascript:void(0)">Link</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" href="javascript:void(0)">Link</a>
                                      </li>-->
                                    </ul>
                                    <div class="d-flex wow bounceInUp">
                                      <img src="{{ url('customer_assets/images/setting.svg') }}" style="padding-right:40px;">
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" style=" width: 90px; height: 40px;">
                                      </div>
                                    </div>
                                  </div>
                              </div>
                        </nav>
          <!-------------------------End Search Box-------------------------------------------->

          <!-------------------------Search Box------------------------------------------------>
            <div class="row justify-content-center" style="margin-top:-30px;">
              <div class="col-md-6">    
                    <!-- Actual search box -->
                    <div class="form-group">
                      <span class="fa fa-search form-control-icon2"></span>

                      <form>
                      <a onclick="refresh()" class="form-control-icon"><span class="fa fa-repeat" ></span></a>

                      <div class="animate__animated animate__wobble" style="position: absolute;z-index: 11111111111111;left:75%;top: 16px;">
                      <span class="form-check-input form-control-radio3 animate__animated animate__wobble" id="pc1" onclick="changeSearchType(3)" ></span>
                      <span class="form-check-input form-control-radio2 animate__animated animate__wobble hide" id="pc2" onclick="changeSearchType(1)"  ></span>
                      <span class="form-check-input form-control-radio1 animate__animated animate__wobble hide" id="pc3" onclick="changeSearchType(2)"  ></span>
                      </div>
                    
                    </form>

                      <div class='autocomplete'>
                          <div>
                            <input type="text" class="form-control" onkeyup="search()" id="search_box" placeholder="Search Drug Key" style="border-radius:60px;background-color:black;color:white;height:60px;">
                          </div>
                          <ul id="searchResult"></ul>
                      </div>
                    </div> 
                </div>
            </div>
          <!-------------------------End Search Box-------------------------------------------->


<div class="row justify-content-center">
  <div class="col-md-3">
    <select class="form-select mt-1" style="height:60px;border-radius: 8px;border: 0px; box-shadow: 0 4px 7px -1px rgba(0, 0, 0, 0.11), 0 2px 4px -1px rgba(0, 0, 0, 0.07);" id="main_drug" onchange="setIndicationOptions()">
      <option selected disabled>Select Drug</option>
    </select>
  </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-3">
      <select class="form-select mt-1" style="color: #000;background: #E2E9FF;height:60px;border-radius: 8px;border: 0px;  box-shadow: 0 4px 7px -1px rgba(0, 0, 0, 0.11), 0 2px 4px -1px rgba(0, 0, 0, 0.07);" id="drug_indication" onchange="setIndication()">
        <option>For What Indication ?</option>
      </select>
    </div>
</div>

<br><br>
<div class="row justify-content-center">
  <div class="col-md-4">
    <br>
    <br>
    <br>
    <br>
    <br>
        </div>
        <div class="col-md-4">
<!--Weight-->
<center>
  <div id="weightSubMenu" class="animate__animated animate__pulse mt-5" style="width:180px;height:50px;background: #A5D9EB; border-radius: 50px;padding:8px;text-align:center;display:none;">
      <span id="weightOption1" onclick="weightSelectedValue(1)" style="background: #F1F3F6;width:35px;height:35px;border-radius:35px;display:inline-block;line-height:35px;cursor: pointer;"><small style="font-size:8px;">Average</small></span>
      <span id="weightOption2" onclick="weightSelectedValue(2)" style="background: #F1F3F6;width:35px;height:35px;border-radius:35px;display:inline-block;line-height:35px;cursor: pointer;"><small style="font-size:8px;">Overbuilt</small></span>
      <span id="weightOption3" onclick="weightSelectedValue(3)" style="background: #F1F3F6;width:35px;height:35px;border-radius:35px;display:inline-block;line-height:35px;cursor: pointer;"><small style="font-size:7px;">Underbuilt</small></span>
  </div>
</center>
        </div>
        <div class="col-md-4">
        </div>

        </div>




<div class="row justify-content-center">
 
    <div class="col-md-4" style="padding-left: 0; padding-right: 0;">
         <br><br>
        <!--Female-->

        <div id="femaleSubMenu" class="mt-5 float-end animate__animated animate__pulse" style="width:300px;height:50px;background: #FEB4CB; border-radius: 50px;padding:8px;text-align:center;display:none;">
          @foreach($pregnancy as $i => $pregnant)
            <span id="option{{$i}}" onclick="femaleSelectedValue({{$pregnancy}},{{$i}})" style="background: #F1F3F6;width:35px;height:35px;border-radius:35px;display:inline-block;line-height:35px;cursor: pointer;"><small style="font-size:10px;">{{substr($pregnant->pregnancy_stage,0,7)}}</small></span>
          @endforeach
            <span onclick="pregnancyCategory()" style="background: #5E556A;width:75px;height:35px;border-radius:18px;display:inline-block;line-height:35px;color:white;cursor: pointer;"><small style="font-size:12px;">Category</small></span>
        </div>

    </div>
 
    <div class="col-md-4" style="width: 25%; padding-left: 0; padding-right: 0;">
      <nav class="circular-menu mt-1">
      <div class="circle">
        <a  id="weightItem" onclick="menuItemAction('weight')" style="cursor: pointer;"><img src="{{ url('customer_assets/images/Weight.svg') }}"> </a>
        <a  id="calculatorItem" onclick="menuItemAction('calculator')" style="cursor: pointer;"><img src="{{ url('customer_assets/images/calculator.svg') }}"></a>
        <a  id="titrationItem" onclick="menuItemAction('titration')" style="cursor: pointer;"><img src="{{ url('customer_assets/images/Titration.svg') }}"></a>
        <a href="" class="fa fa-linkedin fa-2x" style="display:none;"></a>
        <a class="item-style" onclick="illnessDrugShow()" ><span class="triangle-up"></span>Clinical History</a>
        <a href="" class="fa fa-rss fa-2x" style="display:none;"></a>
        <a  id="femaleItem" onclick="setGender({{$pregnancy}})" style="cursor: pointer;"><img src="{{ url('customer_assets/images/Female.svg') }}"></a>
        <a  id="elderlyItem" onclick="setAge()" style="cursor: pointer;"><img src="{{ url('customer_assets/images/Elderly.svg') }}"></a>
      </div>
      <a  class="menu-button" style="cursor: pointer;"><img src="{{ url('customer_assets/images/Stethoscope.svg') }}"  onclick = "menu()"></a>
      </nav>
    </div>

    <div class="col-md-4" style="padding-left: 0; padding-right: 0;">
      <!--calculator-->
        <div id="calculatorSubMenu" class="mt-4 float-start animate__animated animate__pulse" style="width:310px;height:50px;background: #427A95; border-radius: 50px;padding:8px;text-align:center;display:none;z-index: 1; position: relative;">
            <input type="text" id="ageField" style="background: #F1F3F6;width:35px;height:35px;border-radius:35px;display:inline-block;line-height:35px;text-align:center;border:none;outline: none;" placeholder="Age">
            <input type="text" id="scrField" style="background: #F1F3F6;width:35px;height:35px;border-radius:35px;display:inline-block;line-height:35px;text-align:center;border:none;outline: none;" placeholder="S.cr">
            <span id="resultBtn" onclick="resultCalculate()" style="background: #43BD8C;width:75px;height:35px;border-radius:18px;display:inline-block;line-height:35px;color:white;cursor: pointer;"><small style="font-size:12px;">Result</small></span>
            <span onclick="clearCalculate()" style="background: #F1F3F6;width:35px;height:35px;border-radius:35px;display:inline-block;line-height:35px;cursor: pointer;"><small style="font-size:20px;"><span class="fa fa-trash-o"></span></small></span>
            <span style="background: black;width:35px;height:35px;border-radius:35px;display:inline-block;line-height:35px;color:white;"><small style="font-size:20px;">Q</small></span>
        </div>
      </div>

    </div>

</div>


<!------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------part2 second section--------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------->

<section>
<div>
<div style="position:absolute;top:20%;right:25px;">
<img  src="{{ url('customer_assets/images/bg2.svg') }}">
</div>

<!--<div style="background-image: url('images/bg2.svg'); background-repeat: no-repeat; background-attachment: fixed; background-position: right center;">
  saaaaaaaaaaaadd
  </div>-->



  <div class="row justify-content-center" style="display:none;top: -10px; position: relative;" id="category_section">
      <div class="col-md-12 text-center animate__animated animate__pulse" style="padding-right:22px;padding-left:22px;width: 96%;position: absolute;background: #5E556A;z-index:11;height: 220px;align-items: center; justify-content: center; display: flex;">
          <div style="color:white;" id="additional_message">
            <p style="font-family: 'BreadIdol';font-style: normal; font-weight: 400; font-size: 32px;">B - Safe</p><br>
            <p style="font-family: 'BreadIdol';">Pregnancy Note</p>
          </div>
      </div>
  </div>

  <!--------------list taps--------------------------------------------->
  <div class="row justify-content-center" style="display:none;" id="illness_drug_list">
  <div class="col-md-4">
    <div style="background: white;  border-radius: 38px;width:350px;height:300px;position:absolute;z-index:22;padding:10px;">
    <img src="{{ url('customer_assets/images/Titration.svg') }}" style="position: absolute; top: 10px; right: 60px;">
        <!-- Nav tabs -->
        <center>
<ul class="nav nav-tabs" style="background: #CFBEB6; border-radius: 9px;width: fit-content; font-size: 10px;padding: 2px;">
  <li class="nav-item">
    <a class="nav-link active" data-bs-toggle="tab" href="#home">Illness</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="tab" href="#menu1">Drug</a>
  </li>

</ul>
</center>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container active" id="home">
  
   
       <!-- Actual search box -->
      <div class="form-group mt-2">
        <span class="fa fa-search form-control-icon-search-illness"></span>

        <form>
        <a onclick="" class="form-control-icon-reset-illness"><span class="fa fa-repeat" ></span></a>
      </form>

        <div class='autocomplete'>
            <div>
              <input type="text" class="form-control" id="illness_search" onkeyup="searchIllnesses()"  placeholder="Search Patient History" style="border-radius:60px;background-color:#42215A;color:white;height:30px;padding-left: 2rem;  padding-right: 2rem;font-size:14px;">
            </div>
            <ul id="illnessSearchResult"></ul>
        </div>
      </div> 


    <div class="scroll mt-3" style="overflow-x: hidden;  overflow-y: scroll;height:150px;">
      <ul style="list-style: none;padding-left: 0rem;" id="illness_list">
      </ul>
    </div>
    
  </div>
  <div class="tab-pane container" id="menu1">

<!-- Actual search box -->
<div class="form-group mt-2">
        <span class="fa fa-search form-control-icon-search-illness"></span>

        <form>
        <a onclick="" class="form-control-icon-reset-illness"><span class="fa fa-repeat" ></span></a>
      </form>

        <div class='autocomplete'>
            <div>
              <input type="text" class="form-control" id="drugs_search" onkeyup="searchDrugs()"  placeholder="Search Patient History" style="border-radius:60px;background-color:#42215A;color:white;height:30px;padding-left: 2rem;  padding-right: 2rem;font-size:14px;">
            </div>
            <ul id="drugsSearchResult"></ul>
        </div>
      </div> 


    <div class="scroll mt-3" style="overflow-x: hidden;  overflow-y: scroll;height:150px;">
      <ul style="list-style: none;padding-left: 0rem;" id="drug_list">
      </ul>
</div>
</div>

</div>
    </div>
  </div>
</div>



<div  style="display: flex; justify-content: center; align-items: center;margin-top:-10px;position:relative;z-index:2;text-align:center;height:200px;width:100%;background-color:rgba(242, 244, 248, 0.62);">
  <p style="font-family: 'BreadIdol';font-style: normal; font-weight: 500; font-size: 28px;"><b id="recommended_dose">Recommended <br> Dosage</b></p>
</div>

<div style="text-align:center;font-size: 24px;">
  <p id="dosage_note">Dosage Note</p>
</div>

<div style="text-align:center;">
  <textarea id="notes" rows="4" style="background:transparent;width:100%;border:none;text-align:center;outline: none;" readonly>Notes</textarea>
</div>
    

<!--------------------------------------------------------->

 
</div>

</section>
  





<div style="overflow: hidden;max-height:380px;">
  <img   src="{{ url('customer_assets/images/bg3.svg') }}">
  <img  style="float:right;" src="{{ url('customer_assets/images/bg4.svg') }}">
</div>


<div class="row justify-content-center" style="margin-top:-100px;">
  
<div class="col-md-12 text-center" style="margin-top:-80px;">
  <img src="{{ url('customer_assets/images/Foot_line.svg') }}">
</div>

  <div class="col-md-3" >
    <span style="padding-left:80px;">Download</span>
     <a  href="javascript:void(0)" style="padding-left:20px;"> <img src="{{ url('customer_assets/images/apple.svg') }}" ></a>
    <a  href="javascript:void(0)" style="padding-left:20px;"> <img src="{{ url('customer_assets/images/googleplay.svg') }}" ></a>
  </div>

  <div class="col-md-6 text-center" style="margin-top:-60px;">

     <img class="center" src="{{ url('customer_assets/images/footer_logo.svg') }}" >
     <br>
     <form>
      <div class="form-group">
          <span class="fa fa-envelope form-control-icon2"></span>
          <button class="custom-search-botton form-control-icon3" type="button" >Subscribe</button>
          <input type="text" class="form-control" placeholder="Your E-mail" style="border-radius:60px;height:60px;">
      </div> 
    </form>

    <!--<div class="custom-search">
      <input type="text" class="custom-search-input" placeholder="Enter your email">
      <button class="custom-search-botton" type="submit">Subscribe</button>  
    </div>-->
  </div>

  <div class="col-md-3 text-center">
      <span style="padding-left:100px;padding-right:20px;">Contacts</span>
      <img src="{{ url('customer_assets/images/facebook.svg') }}" style="padding-right:20px;">
      <img src="{{ url('customer_assets/images/youtube.svg') }}" style="padding-right:20px;">
  </div>

</div>
<br>


<br>


</div>
</div>


<br>
</div>

</div>


<script src="{{asset('customer_assets/js/front.js')}}"></script>


</body>
</html>





