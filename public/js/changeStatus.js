$(document).ready(function(){

    $(document).on('click','.active_deactive_users',function(){
    const thisRef = $(this);
    thisRef.text("processing");
    console.log('success');
    
    $.ajax({
      type:'GET',
      url:'active_deactive_users/'+thisRef.attr('id'),
      success:function(response){
        var response = JSON.parse(response) ;
        if(response == 'success'){
          showAlert(200,'status updated successfully');
        }
        else if (JSON.parse(response)=="failed"){
          $('.userAlert').css('background','red');
          $('.userAlert').text('unable to response status at the moment');
        }
      }
    });
  });
  });
  
  
   function showAlert(code , message){
     $('.userAlert').css('background',(code === 200 ? 'green' : 'red'));
     $('.userAlert').fadeIn();
     $('.userAlert').text(message);
     setTimeout(() => {
          $('.userAlert').fadeOut();
     },3000);
    }