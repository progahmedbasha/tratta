<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tratta Application</title>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  
  <link href="{{asset('customer_assets/css/front.css')}}" rel="stylesheet">

<style>
@font-face {
    font-family: 'Inkfree';
    src: url('{{ url('customer_assets/font/Inkfree.ttf') }}') format('truetype'); /* Chrome 4+, Firefox 3.5, Opera 10+, Safari 3—5 */
} 

</style>


<style>
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

.animated { 

            -webkit-animation-duration: 1s;
            animation-duration: 1s; 
            -webkit-animation-fill-mode: both; 
            animation-fill-mode: both; 
         }
         
         @-webkit-keyframes bounce { 
            0%, 20%, 50%, 80%, 100% {-webkit-transform: translateY(0);} 
            40% {-webkit-transform: translateY(-30px);} 
            60% {-webkit-transform: translateY(-15px);} 
         } 
         
         @keyframes bounce { 
            0%, 20%, 50%, 80%, 100% {transform: translateY(0);} 
            40% {transform: translateY(-30px);} 
            60% {transform: translateY(-15px);} 
         }
         
         .bounce { 
            -webkit-animation-name: bounce; 
            animation-name: bounce; 
         }

</style>

</head>
<body>

<div class="container" >
  <div class="card mt-3 mb-3" style="background-color:transparent;border-radius:50px;border:4px solid silver;">
    <div class="card-body">

  

<div style="background-image:url('{{ url('customer_assets/images/bg1.svg') }}');background-repeat: no-repeat; background-color: white;border-radius:25px;padding:10px;margin:10px;">  
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
        <div class="d-flex">
          <img src="{{ url('customer_assets/images/setting.svg') }}" style="padding-right:40px;">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" style=" width: 90px; height: 40px;">
          </div>
        </div>
      </div>
    </div>
  </nav>


  <div class="row justify-content-center" style="margin-top:-30px;">
    <div class="col-md-6">    
       <!-- Actual search box -->
      <div class="form-group">
        <span class="fa fa-search form-control-icon2"></span>

        <form>
        <a onclick="refresh()" class="form-control-icon"><span class="fa fa-repeat" ></span></a>

        <div style="position: absolute;z-index: 11111111111111;left:75%;top: 16px;">
        <span class="form-check-input form-control-radio3" id="pc1" onclick="changeSearchType(3)" ></span>
        <span class="form-check-input form-control-radio2 " id="pc2" onclick="changeSearchType(2)"  ></span>
        <span class="form-check-input form-control-radio1 " id="pc3" onclick="changeSearchType(1)"  ></span>
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
<!--Weight-->
<center>
  <div id="weightSubMenu" class="mt-5" style="width:180px;height:50px;background: #A5D9EB; border-radius: 50px;padding:8px;text-align:center;visibility: hidden;">
      <span style="background: #F1F3F6;width:35px;height:35px;border-radius:35px;display:inline-block;line-height:35px;"><small style="font-size:8px;">Average</small></span>
      <span style="background: #F1F3F6;width:35px;height:35px;border-radius:35px;display:inline-block;line-height:35px;"><small style="font-size:8px;">Overbuilt</small></span>
      <span style="background: #F1F3F6;width:35px;height:35px;border-radius:35px;display:inline-block;line-height:35px;"><small style="font-size:7px;">Underbuilt</small></span>
  </div>
</center>

<div class="row justify-content-center">
 
    <div class="col-md-4" style="padding-left: 0; padding-right: 0;">
         <br><br>
        <!--Female-->
        <div id="femaleSubMenu" class="mt-5 float-end" style="width:279px;height:50px;background: #FEB4CB; border-radius: 50px;padding:8px;text-align:center;display:none;">
            <span style="background: #F1F3F6;width:35px;height:35px;border-radius:35px;display:inline-block;line-height:35px;"><small style="font-size:10px;">1st Tri</small></span>
            <span style="background: #F1F3F6;width:35px;height:35px;border-radius:35px;display:inline-block;line-height:35px;"><small style="font-size:10px;">2nd Tri</small></span>
            <span style="background: #F1F3F6;width:35px;height:35px;border-radius:35px;display:inline-block;line-height:35px;"><small style="font-size:10px;">3rd Tri</small></span>
            <span style="background: #F1F3F6;width:35px;height:35px;border-radius:35px;display:inline-block;line-height:35px;"><small style="font-size:10px;">Nursing</small></span>
            <span style="background: #5E556A;width:75px;height:35px;border-radius:18px;display:inline-block;line-height:35px;color:white;"><small style="font-size:12px;">Category</small></span>
        </div>
    </div>
 
    <div class="col-md-4" style="width: 25%; padding-left: 0; padding-right: 0;">
      <nav class="circular-menu mt-1">
      <div class="circle">
        <a href="#" id="weightItem" onclick="menuItemAction('weight')"><img src="{{ url('customer_assets/images/Weight.svg') }}"> </a>
        <a href="#" id="calculatorItem" onclick="menuItemAction('calculator')"><img src="{{ url('customer_assets/images/calculator.svg') }}"></a>
        <a href="#" id="titrationItem" onclick="menuItemAction('titration')"><img src="{{ url('customer_assets/images/Titration.svg') }}"></a>
        <a href="" class="fa fa-linkedin fa-2x" style="display:none;"></a>
        <a href="" class="fa fa-github fa-2x" style="display:none;"></a>
        <a href="" class="fa fa-rss fa-2x" style="display:none;"></a>
        <a href="#" id="femaleItem" onclick="menuItemAction('female')"><img src="{{ url('customer_assets/images/Female.svg') }}"></a>
        <a href="#" id="elderlyItem" onclick="menuItemAction('elderly')"><img src="{{ url('customer_assets/images/Elderly.svg') }}"></a>
      </div>
      <a href="" class="menu-button"><img src="{{ url('customer_assets/images/Stethoscope.svg') }}"></a>
      </nav>
    </div>

    <div class="col-md-4" style="padding-left: 0; padding-right: 0;">
      <!--calculator-->
        <div id="calculatorSubMenu" class="mt-4 float-start" style="width:322px;height:50px;background: #427A95; border-radius: 50px;padding:8px;text-align:center;display:none;">
            <span style="background: #F1F3F6;width:35px;height:35px;border-radius:35px;display:inline-block;line-height:35px;"><small style="font-size:12px;">Age</small></span>
            <span style="background: #F1F3F6;width:35px;height:35px;border-radius:35px;display:inline-block;line-height:35px;"><small style="font-size:12px;">S.cr</small></span>
            <span style="background: #43BD8C;width:75px;height:35px;border-radius:18px;display:inline-block;line-height:35px;color:white;"><small style="font-size:12px;">Result</small></span>
            <span style="background: #F1F3F6;width:35px;height:35px;border-radius:35px;display:inline-block;line-height:35px;"><small style="font-size:20px;"><span class="fa fa-trash-o"></span></small></span>
            <span style="background: black;width:35px;height:35px;border-radius:35px;display:inline-block;line-height:35px;color:white;"><small style="font-size:20px;">Q</small></span>
        </div>
      </div>

    </div>

</div>

<div style="position:absolute;top:20%;right:25px;">
<img  src="{{ url('customer_assets/images/bg2.svg') }}">
</div>

<!--<div style="background-image: url('images/bg2.svg'); background-repeat: no-repeat; background-attachment: fixed; background-position: right center;">
  saaaaaaaaaaaadd
  </div>-->


<div style="display: flex; justify-content: center; align-items: center;top:-10px;position:relative;z-index:111111111111111;text-align:center;height:150px;width:100%;background-color:rgba(242, 244, 248, 0.62);">
  <h1><b id="recommended_dose">Recommended <br> Dosage</b></h1>
</div>

<div style="text-align:center;font-size: 24px;">
  <p id="dosage_note">Dosage Note</p>
</div>

<div style="text-align:center;">
<p id="notes">Notes</p>
</div>


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
          <button class="custom-search-botton form-control-icon3" type="submit" >Subscribe</button>
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

</body>
</html>


<script src="{{asset('customer_assets/js/front.js')}}"></script>
