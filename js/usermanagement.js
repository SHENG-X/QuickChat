$("#log-in").click(function(){
    var username=$("#username").val();
    var password=$('#password').val();
	  var postdata={'command':'sigin','username':username,'password':password};
    $.ajax({
      url:'model.php',
      data:postdata,
      dataType:'text',
      success: function(data){
        if(data==1){
            $(location).attr('href','index.php');
        }else{
          alert(data);
        }
      },
      type: 'POST'
    });
  });