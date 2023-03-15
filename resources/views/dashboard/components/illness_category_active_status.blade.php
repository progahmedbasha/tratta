<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
   ////togle button
     $(document).ready(function(){
             //change status active
             $('.actives').on('click ', function (e) {
                 var active = $('.actives').val();
                  var new_id = $(this).attr('data-id');
                 $.ajax({
                     url: "{{route('illness_category_activation')}}",
                     type: "POST",
                     data: {
                         active: active,
                         new_id:new_id,
                         _token: '{{csrf_token()}}'
                     },
                    success:function(response){
                     if(response)
                        {
                           toastr.success(" Status Changed Succsesfilly ");
                        }
                     },
                 });
             });
   });
</script>