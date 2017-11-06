  $("#setting,.user_options").hover(function(){
    $(".user_options").css('z-index','100');
    $(".user_options").css('display','block');
  },
  function(){
    $(".user_options").css('display','none');
  }
  );

  $(".list-group-item").click(function(){
    // alert(12);
    $("#groups-container").hide();
    $("#chatting_container").show();
    $(".search-bar>input").hide();
    $("#group_chating_name").show();
    $(".chat_to_groupname").text($(this).text());
    if($(window).width()<726){
          $("#menu-container").css('left','-180vw');
    }
  });
  $('#home').click(function(){
    $("#groups-container").css('width','0px');
    $("#menu-container").css('left','0px');
  });
  $("#close").click(function(){
    $("#groups-container").css('width','100vw');
    $("#menu-container").css('left','-180vw');
  });
  $(window).resize(function(){
    if($(window).width()>726){
          $("#menu-container").css('left','0px');
    }
    if($(window).width()<726){
          $("#menu-container").css('left','-180vw');
    }
  });

  $('#lookupusers').click(function(){
    $('#myModal2').modal('toggle');
  });
   $('#leavegroup').click(function(){
    $('#myModal3').modal('toggle');
  });
  $('#creategroup').click(function(){
    $('#myModal5').modal('toggle');
  });
  $('#addgroup').click(function(){
    $('#myModal6').modal('toggle');
  });
  $('#add-groupname').click(function(){
    $('#groupname-search-error').hide();
  });
  $('#leavegroup-name').click(function(){
    $('#leavegroup-error').hide();
  });
  $('#lookup-username').click(function(){
    $('#userlookup-error').hide();
  });
  $('#create-groupname').click(function(){
    $('#creategroup-error').hide();
  });
  $('#oldpass').click(function(){
    $('#changepass-error').hide();
  });
  $('#newpass').click(function(){
    $('#changepass-error').hide();
  });
  $('#confirmpass').click(function(){
    $('#changepass-error').hide();
  });
$('#url').click(function(){
    $('#changeprofileimage-error').hide();
  });
$(".modal-footer>button").click(function(){
    $('#groupname-search-error').hide();
    $('#leavegroup-error').hide();
    $('#creategroup-error').hide();
    $('#userlookup-error').hide();
    $('#changepass-error').hide();
    $('#changeprofileimage-error').hide();
});
  var timer;

 if(typeof(EventSource)!=='undefined'){
    var source=new EventSource('kick.php');
    source.onmessage=function(event){
      if(event.data==0){
        clearInterval(timer);
        location.reload();
      }
    }
   
  }

  function message(ele){
    var targetvar='#groups-list1 #'+ele.id+' h4';
    $("#groups-container").hide();
    $("#chatting_container").show();
    $(".search-bar>input").hide();
    $("#group_chating_name").show();
    $(".chat_to_groupname").text($(targetvar).text());
    var group=$(targetvar).text();
    $('#message_display').html('');
    clearInterval(timer);
    timer=setInterval(function(){
      var group=$(targetvar).text();
      $.ajax({
        url:'messageupdate.php',
        data:{'command':'sendmessage','group':group},
        dataType:'text',
        type:'post',
        success:function(data){
          $('#message-holder').html(data);
          if($('#message-holder').html()!=$('#message_display').html()){
            if($('#message_display>div').last().attr('id')=='otheruser'){
              if($('#message-holder>div').length>$('#message_display>div').length){
                  notifyMe();
              }
            }
            $('#message_display').html(data);
            var objDiv = document.getElementById("message_display");
            objDiv.scrollTop = objDiv.scrollHeight;
          }
        }
        });
    },500);
      

    if($(window).width()<726){
      $("#menu-container").css('left','-180vw');
    }
  }

$("#sendmessage-btn").click(function(){
  var message=$("#message").val();
  var group=$(".chat_to_groupname").first().text();
  if(message.trim().length>0){
    message=replaceAll(message,'<','&lt');
    message=replaceAll(message,'>','&gt');
    $.ajax({
      url:'model.php',
      data:{'command':'sendmessage','group':group,'message':message},
      dataType:'text',
      type:'post',
      success:function(data){
        $("#message").val("");
        $('#message_display').html(data);
          var objDiv = document.getElementById("message_display");
          objDiv.scrollTop = objDiv.scrollHeight;
      }
    });
  }
  else{
    alert('Massage can not be empty!');
  }
});


$('#message').keydown(function(e){
  if(e.keyCode==13){
    e.preventDefault();
    $('#sendmessage-btn').click();
    $("#message").val("");
  }
});



function replaceAll(str, find, replace) {
    return str.replace(new RegExp(find, 'g'), replace);
}





