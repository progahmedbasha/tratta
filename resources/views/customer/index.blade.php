<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tratta Application</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


<style>
 
@import "https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css";

@font-face {
    font-family: 'Inkfree';
    src: url('{{ url('customer_assets/font/Inkfree.ttf') }}') format('truetype'); /* Chrome 4+, Firefox 3.5, Opera 10+, Safari 3—5 */
} 

body {
  background: #F2F4F8;
  font-family: 'Inkfree';
  
}

h1, h2, h3, h4, h5, h6, p {
  font-family: 'Inkfree';
}

.circular-menu {
  width: 250px;
  height: 250px;
  margin: 0 auto;
  position: relative;
}

.circle {
  width: 250px;
  height: 250px;
  opacity: 0;
  
  -webkit-transform: scale(0);
  -moz-transform: scale(0);
  transform: scale(0);

  -webkit-transition: all 0.4s ease-out;
  -moz-transition: all 0.4s ease-out;
  transition: all 0.4s ease-out;
}

.open.circle {
  opacity: 1;

  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  transform: scale(1);
}

.circle a {
  text-decoration: none;
  color: black;
  display: block;
  height: 60px;
  width: 60px;
  line-height: 60px;
  margin-left: -30px;
  margin-top: -30px;
  position: absolute;
  text-align: center;
  background: #F1F3F6;
  box-shadow: -30px -30px 80px #FFFFFF, 30px 30px 80px rgba(55, 84, 170, 0.1);
  border-radius: 50%;
  text-align: center;
}

.circle a:hover {
  color: black;
}

.menu-button {
  position: absolute;
  top: calc(50% - 30px);
  left: calc(50% - 30px);
  text-decoration: none;
  text-align: center;
  color: #444;
  border-radius: 50%;
  display: block;
  height: 60px;
  width: 60px;
  line-height: 40px;
  padding: 5px;
  background: #F1F3F6;
  box-shadow: -30px -30px 80px #FFFFFF, 30px 30px 80px rgba(55, 84, 170, 0.1);
}

.menu-button:hover {
  background-color: #F1F3F6;
}

/* Author stuff */
h1.author {
  text-align:center;
  color: white;
  font-family: Helvetica, Arial, sans-serif;
  font-weight: 300;
}

h1.author a {
  color: #348;
  text-decoration:none;
}

h1.author a:hover {
  color: #ddd;
} 

/*.has-search .form-control {
    padding-left: 5rem;
}

.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 3.375rem;
    height: 3.375rem;
    line-height: 3.8rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
    padding-left: 3rem;
    font-size:18px;
}*/

.form-group .form-control {
    padding-left: 6rem;
    padding-right: 8rem;
}
.form-group{
  position:relative;
}
.form-group .form-control-icon {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
    right:0;
    top: 10px;
    font-size:18px;
    padding-right: 4rem;
}

.form-group .form-control-radio1 {
    position: absolute;
    z-index: 11111111111111;
    display: block;
    color: #aaa;
    right:70px;
    top: 16px;
    background: #ffbf00;
}

.form-group .form-control-radio2 {
    position: absolute;
    z-index: 1111111111111;
    display: block;
    color: #aaa;
    right:90px;
    top: 16px;
    background: #9ea5f9;

}

.form-group .form-control-radio3 {
    position: absolute;
    z-index: 1111111111111;
    display: block;
    color: #aaa;
    right:110px;
    top: 16px;
    background: #C4A595;

}

.form-group .form-control-icon2 {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
    left:0;
    top: 10px;
    padding-left: 4rem;
}

.form-group .form-control-icon3 {
    position: absolute;
    z-index: 2;
    display: block;
    width: fit-content;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: white;
    right:0;
    top: 10px;
    font-size:18px;
    margin-right: 1rem;
}

.custom-search {
  position: relative;
  width: 300px;
}
.custom-search-input {
  width: 100%;
  border: 1px solid #ccc;
  border-radius: 100px;
  padding: 10px 100px 10px 20px; 
  line-height: 1;
  box-sizing: border-box;
  outline: none;
}
.custom-search-botton {
  position: absolute;
  right: 3px; 
  top: 3px;
  bottom: 3px;
  border: 0;
  background: linear-gradient(180deg, #CFBEB6 0%, #C8AC9F 100%);;
  color: white;
  outline: none;
  margin: 0;
  padding: 0 10px;
  border-radius: 100px;
  z-index: 2;
  text-transform: uppercase;
}

select option {
  background: #fff;
}

select{
  foreground-image:url(stock:chevron-down);
}


select::after {
  color:black;
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
        <span class="fa fa-repeat form-control-icon" ></span>

        <form>
        <input type="radio" class="form-check-input form-control-radio1" id="radio1" name="optradio" value="option1" >
        <input type="radio" class="form-check-input form-control-radio2" id="radio2" name="optradio" value="option2" >
        <input type="radio" class="form-check-input form-control-radio3" id="radio3" name="optradio" value="option3" >
        </form>
 
        <input type="text" class="form-control" placeholder="Search Drug Key" style="border-radius:60px;background-color:black;color:white;height:60px;">
      </div> 

    
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-3">
  <select class="form-select mt-1" style="height:60px;border-radius: 8px;border: 0px; box-shadow: 0 4px 7px -1px rgba(0, 0, 0, 0.11), 0 2px 4px -1px rgba(0, 0, 0, 0.07);">
    <option>Select Formula</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>
</div>
</div>

  <div class="row justify-content-center">
    <div class="col-md-3">
  <select class="form-select mt-1" style="color: #000;background: #E2E9FF;height:60px;border-radius: 8px;border: 0px;  box-shadow: 0 4px 7px -1px rgba(0, 0, 0, 0.11), 0 2px 4px -1px rgba(0, 0, 0, 0.07);">
    <option>For What Indication ?</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>
</div>
</div>



<nav class="circular-menu mt-5">

  <div class="circle">
    <a href="" ><img src="{{ url('customer_assets/images/Weight.svg') }}"></a>
    <a href="" ><img src="{{ url('customer_assets/images/calculator.svg') }}"></a>
    <a href="" ><img src="{{ url('customer_assets/images/Titration.svg') }}"></a>
    <a href="" class="fa fa-linkedin fa-2x" style="display:none;"></a>
    <a href="" class="fa fa-github fa-2x" style="display:none;"></a>
    <a href="" class="fa fa-rss fa-2x" style="display:none;"></a>
    <a href="" ><img src="{{ url('customer_assets/images/Female.svg') }}"></a>
    <a href="" ><img src="{{ url('customer_assets/images/Elderly.svg') }}"></a>
  </div>
  
  <a href="" class="menu-button"><img src="{{ url('customer_assets/images/Stethoscope.svg') }}"></a>

</nav>

</div>

<div style="position:absolute;top:24%;right:25px;">
<img  src="{{ url('customer_assets/images/bg2.svg') }}">
</div>

<!--<div style="background-image: url('images/bg2.svg'); background-repeat: no-repeat; background-attachment: fixed; background-position: right center;">
  saaaaaaaaaaaadd
  </div>-->


<div style="display: flex; justify-content: center; align-items: center;top:-10px;position:relative;z-index:111111111111111;text-align:center;height:200px;width:100%;background-color:rgba(242, 244, 248, 0.62);">
  <h1><b>Recommended <br> Dosage</b></h1>
</div>

<div style="text-align:center;font-size: 24px;">
  <p>Dosage Note</p>
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


<script>

  // Demo by http://creative-punch.net

var items = document.querySelectorAll('.circle a');

for(var i = 0, l = items.length; i < l; i++) {
  items[i].style.left = (50 - 35*Math.cos(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";
  
  items[i].style.top = (50 + 35*Math.sin(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";
}

document.querySelector('.menu-button').onclick = function(e) {
   e.preventDefault(); document.querySelector('.circle').classList.toggle('open');
}

</script>


</div>

</body>
</html>
