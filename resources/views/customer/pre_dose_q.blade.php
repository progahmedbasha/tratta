<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d45e7e578e.js" crossorigin="anonymous"></script>


<style>

  .mymenu .nav-link{
    color: black;
  }

  .nav-link[data-toggle].collapsed:after {
    font-family: "Font Awesome 5 Free"; 
    font-weight: 900; 
    content: "\f078"; 
    color:  #444444;
    float: right;
    right: 40px;
    position: relative;
}
.nav-link[data-toggle]:not(.collapsed):after {
    font-family: "Font Awesome 5 Free"; 
    font-weight: 900; 
    content: "\f077"; 
    color:  #444444;
    float: right;
    right: 40px;
    position: relative;
}
</style>

<center>
<!-- The Modal Q1-->
<div class="modal fade" id="myModal_q1" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius:60px;">
      <!-- Modal body -->
      <div class="modal-body">
        <button  data-bs-dismiss="modal" style="float:right;float: right; background-color: unset; border: unset; color: red;"><i class="fa fa-times" ></i></button>
        <div style="width: 200px; height: 50px; background: #F79EA4; border-radius: 9px;color:white;display: flex; align-items: center; justify-content: center;">
            Tratta Says
        </div>
        <br>
        <div id="question1">
            You can put the result here and it will be appear in the pop up
            You can put the result here and it will be appear in the pop up
        </div>
        <button data-bs-dismiss="modal" style="background: #CFBEB6;border-radius: 27px;height: 50px; width: 100px;border:none;color:white;">Okay</button>
      </div>
    </div>
  </div>
</div>
</center>

<center>
<!-- The Modal Q2-->
<div class="modal fade" id="myModal_q2" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius:60px;">
      <!-- Modal body -->
      <div class="modal-body">
       
      <button  data-bs-dismiss="modal" style="float:right;float: right; background-color: unset; border: unset; color: red;"><i class="fa fa-times" ></i></button>
        <div style="width: 200px; height: 50px; background: #F79EA4; border-radius: 9px;color:white;display: flex; align-items: center; justify-content: center;">
            Tell Tratta 1st
        </div>
        <br>
        <div style="width:150px;display:none;" id="q2-range-block">
          <span class="q2-range-popover" id="q2-range-message"></span>
          <span class="q2-triangle-down"></span>
        </div>
        <br>
        <div class="mb-3">
            <form>
                <span class="me-3" id="q2_lable">TSH1</span>
                <input type="hidden" id="q2_id">
                <input type="text" placeholder="" id="q2_value" name="range" style="width:100px;" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Content">
                <span class="ms-3" id="q2_unit">mIU/L1</span>
            </form>
        </div>
        <button style="background: #CFBEB6;border-radius: 27px;height: 50px; width: 100px;border:none;color:white;" onclick="question2Result()">Go</button>
      </div>
    </div>
  </div>
</div>
</center>

<center>
<!-- The Modal Q3-->
<div class="modal fade" id="myModal_q3" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius:60px;">
      <!-- Modal body -->
      <div class="modal-body">
      <button  data-bs-dismiss="modal" style="float:right;float: right; background-color: unset; border: unset; color: red;"><i class="fa fa-times" ></i></button>
        <div style="width: 200px; height: 50px; background: #F79EA4; border-radius: 9px;color:white;display: flex; align-items: center; justify-content: center;">
          Tell Tratta 1st
        </div>
        <br>
        <div class="mb-3">
        <div class="scroll mt-3" style="overflow-x: hidden;  overflow-y: scroll;height:200px;">
            <ul class="ms-5" style="list-style: none;padding-left: 0rem;text-align: left;" id="question3">
            </ul>
        </div>
        </div>
        <button style="background: #CFBEB6;border-radius: 27px;height: 50px; width: 100px;border:none;color:white;" onclick="question3Result()">Go</button>
      </div>
    </div>
  </div>
</div>
</center>

<center>
<!-- The Modal Q4-->
<div class="modal fade" id="myModal_q4" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius:60px;">
      <!-- Modal body -->
      <div class="modal-body">
      <button  data-bs-dismiss="modal" style="float:right;float: right; background-color: unset; border: unset; color: red;"><i class="fa fa-times" ></i></button>
        <div style="width: 200px; height: 50px; background: #F79EA4; border-radius: 9px;color:white;display: flex; align-items: center; justify-content: center;">
        Tell Tratta 1st
        </div>
        <br>
        <div class="mb-3">
            <div class="scroll mt-3" style="overflow-x: hidden;  overflow-y: scroll;height:200px;" id="question4">
            </div>
        </div>
        <button style="background: #CFBEB6;border-radius: 27px;height: 50px; width: 100px;border:none;color:white;" onclick="question4Result()">Go</button>
      </div>
    </div>
  </div>
</div>
</center>



<!------------------------------------------------Re-check----------------------------------------------------------------->
<center>
<!-- The Modal Recheck-->
<div class="modal fade" id="myModal_recheck" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius:10px;">
      <!-- Modal body -->
      <div class="modal-body">
        <div class="mt-5" id="recheck">
          No significant drug-drug interactions found in your patient’s past drug history
        </div>
        <button data-bs-dismiss="modal" style="background: #BEDE7A;border-radius: 27px;height: 50px; width: 100px;border:none;">Okay</button>
      </div>
    </div>
  </div>
</div>
</center>




