<style>
   /* .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
   } */
   .switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 28px;
}

   .switch input {
      opacity: 0;
      width: 0;
      height: 0;
   }

   /* .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
   } */
   .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0px;
    border: 2px solid #5E5E5E;
    bottom: 0;
    background-color: #ffffff;
    -webkit-transition: .4s;
    transition: .4s;
}

   /* .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
   } */
   .slider:before {
    position: absolute;
    content: "";
    height: 18px;
    width: 15px;
    left: 4px;
    /* opacity: 0.4; */
    bottom: 4px;
    border: 2px solid #5E5E5E;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}

   input:checked+.slider {
      background-color: #AE3C7A
;
   }

   /* input:focus+.slider {
      box-shadow: 0 0 1px #2196F3;
   } */

   input:checked+.slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
   }

   /* Rounded sliders */
   .slider.round {
      border-radius: 34px;
   }

   .slider.round:before {
      border-radius: 50%;
   }
</style>