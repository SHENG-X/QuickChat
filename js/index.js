$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});

$("#username").change(function(){
    var username=$('#username').val();
    $.ajax({
            url: "register.php",
            data:{'username':username},
            dataType:'text',
            success: function(data){
            if(data==0&&username!=''){
              $('#username-warning').show();
              $('#username').val('');
              $('#username').css('border-color', 'red');
            }
        },
        type:'POST'
        });
  });

  $("#password").change(function(){
    var password=$('#password').val();
    $.ajax({
            url: "register.php",
            data:{'password':password},
            dataType:'text',
            success: function(data){
            if(data==0&&password!=''){
              $('#password-warning').show();
              $('#password').val('');
              $('#password').css('border-color', 'red');
            }
        },
        type:'POST'
        });
  });

  $("#email").change(function(){
    var email=$('#email').val();
    $.ajax({
            url: "register.php",
            data:{'email':email},
            dataType:'text',
            success: function(data){
            if(data!=1){
              $('#email-warning').html("<strong>Warning: </strong>"+data);
              $('#email-warning').show();
              $('#email').val('');
              $('#email').css('border-color', 'red');
            }
        },
        type:'POST'
        });
  });

  $("#dob-dd").change(function(){
    var dd=$('#dob-dd').val();
    var mm=$('#dob-mm').val();
    $.ajax({
            url: "register.php",
            data:{'dob-dd':dd,'dob-mm':mm},
            dataType:'text',
            success: function(data){
            if(data==0&&dd!=''){
              $('#dob-warning').show();
              $('#dob-dd').val('');
              $('#dob-mm').val('');
            }
        },
        type:'POST'
        });
  });

  $("#dob-mm").change(function(){
    var mm=$('#dob-mm').val();
    var dd=$('#dob-dd').val();
    $.ajax({
            url: "register.php",
            data:{'dob-mm':mm,'dob-dd':dd},
            dataType:'text',
            success: function(data){
            if(data==0&&mm!=''||data=='10'){
              $('#dob-warning').show();
              $('#dob-dd').val('');
              $('#dob-mm').val('');
            }
        },
        type:'POST'
        });
  });

  $("#dob-yy").change(function(){
    var yy=$('#dob-yy').val();
    $.ajax({
            url: "register.php",
            data:{'dob-yy':yy},
            dataType:'text',
            success: function(data){
            if(data==0&&yy!=''){
              $('#dob-warning').show();
              $('#dob-yy').val('');
            }
        },
        type:'POST'
        });
  });

  $("#username").click(function(){
    $('#username').css('border-color', '#7ed321');
    $('#username-warning').hide();
  });

    $("#password").click(function(){
    $('#password').css('border-color', '#7ed321');
    $("#password-warning").hide();
  });

  $("#email").click(function(){
    $('#email').css('border-color', '#7ed321');
    $('#email-warning').hide();
  });

  $("#dob-dd").click(function(){
    $('#dob-dd').css('border-color', '#7ed321');
    $("#dob-warning").hide();
  });

  $("#dob-mm").click(function(){
    $('#dob-mm').css('border-color', '#7ed321');
    $("#dob-warning").hide();
  });

  $("#dob-yy").click(function(){
    $('#dob-yy').css('border-color', '#7ed321');
    $("#dob-warning").hide();
  });

  $("#gender").click(
    function(){
      $("#gender").css('border','0px solid red');
    }
    );

  $("#languages").click(
    function(){
      $("#languages").css('border','0px solid red');
    }
    );

  $("#sign-up").click(function(){
    if($('#terms').is(':checked')){
      var gender = $("input[name='gender']:checked").val();
      var language = $("input[name='language']:checked").val();
      var country = $('#countrys').find(":selected").val();
      var username=$('#username').val();
      var password=$("#password").val();
      var email=$("#email").val();
      var dobdd=$("#dob-dd").val();
      var dobmm=$("#dob-mm").val();
      var dobyy=$("#dob-yy").val();
      if(gender==undefined){
        $("#gender").css('border','1px solid red');
        $("#gender").css('border-radius','4px');
      }
      if(language==undefined){
        $("#languages").css('border','1px solid red');
        $("#languages").css('border-radius','4px');
      }

      if(username==''){
        $("#username").css('border','1px solid red');
        $("#username").css('border-radius','4px');
      }
      if(password==''){
        $("#password").css('border','1px solid red');
        $("#password").css('border-radius','4px');
      }
      if(email==''){
        $("#email").css('border','1px solid red');
        $("#email").css('border-radius','4px');
      }
      if(dobdd==''){
        $("#dob-dd").css('border','1px solid red');
        $("#dob-dd").css('border-radius','4px');
      }
      if(dobmm==''){
        $("#dob-mm").css('border','1px solid red');
        $("#dob-mm").css('border-radius','4px');
      }
      if(dobyy==''){
        $("#dob-yy").css('border','1px solid red');
        $("#dob-yy").css('border-radius','4px');
      }
      if(dobyy%4!=0&&(dobyy%100!=0&&dobyy%400!=0)&&dobmm==2&&dobdd>28){
            $("#dob-dd").val('');
            $("#dob-dd").css('border','1px solid red');
            $("#dob-dd").css('border-radius','4px');
        }
      if(gender&&language){
        var username=$('#username').val();
        var password=$("#password").val();
        var email=$("#email").val();
        var dobdd=$("#dob-dd").val();
        var dobmm=$("#dob-mm").val();
        var dobyy=$("#dob-yy").val();
        
        if(dobyy%4!=0&&(dobyy%100!=0&&dobyy%400!=0)&&dobmm==2&&dobdd>28){
            $("#dob-dd").val('');
            $("#dob-dd").css('border','1px solid red');
            $("#dob-dd").css('border-radius','4px');
        }
        else{
          $.ajax({
              url:"register.php",
              data:{'signup':1,'username2':username,'password2':password,'email2':email,'dobdd':dobdd,'dobmm':dobmm,'dobyy':dobyy,'gender':gender,'language':language,'country':country},
              dataType:'text',
              success: function(data){
                if(data==1){
                  $(location).attr('href','index.php');
                  $('input').val('');
                  $('#sign-up').val('Sign Up');
                  $(':radio').each(function () {
                    $(this).removeAttr('checked');
                    $('input[type="radio"]').prop('checked', false);
                    });
                }else{
                  alert('Please complete the form!');
                }
              },
              type:'POST'
            });
        }
      }
    }
    else{
      alert('Plase check the Privacy terms & Conditions confirm that you agreed with the terms.');
    }
  });



// create group control
  $('#hl').hide();
  $("#create").click(function(){
    var groupname=$('#createg').val();
    if(groupname.length<32&&groupname.indexOf('>')<0&&groupname.indexOf('<')<0){
      $("#createg").val("");
      if(groupname.length>3){
        $.ajax({
          url:'creategroup.php',
          data:{'groupname':groupname},
          dataType:'text',
          success:function(data){
            if(data==0){
              $('#hl').show();
              $('#hl').html('<strong>Warning: </strong> Group name taken');
            }
            else{
              alert('Group Created!');
              location.reload();
            }
          },
          type:'POST'
        });
      }
      else{
        $('#hl').show();
        $('#hl').html('<strong>Warning: </strong> Invalid group name');
      }
    }
    else{
            alert('Forbidden!');
    }    
  });
  $('#createg').click(function(){
      $('#hl').hide();
  });
  //end of create group control

  $('#addgroup').click(function(){
    $('#createGroups').hide();
    $("#imgupload").hide();
    $('#mtitle').text('Add a Group');
    $("#changepassword").hide();
    $('#addgroups').show();
  });

  $('#add-group').click(function(){
    $('#addwarning').html("");
  });

  $("#add").click(function(){
    var groupname=$('#add-group').val();
    if(groupname.length<3){
      $("#addwarning").html('<strong>Warning: </strong> Invalid group name');
    }
    else{
      $.ajax({
        url:'addgroup.php',
        data:{'groupname':groupname},
        dataType:'text',
        success:function(data){
          if(data==0){
            $("#addwarning").html('<strong>Warning: </strong>Group was not find');
          }
          else if(data=='Success!'){
            location.reload();
          }
          else{alert(data);}
        },
        type:'POST'
      });
    }
  });


$('document').ready(function(){
  $('li').click(function(){
    $("#cover").hide();
    var targetvar='#'+this.id+' h4';
    $("#messagetitle").text($(targetvar).text());
    var group=$("#messagetitle").text();
    $('#testing').html('');
    $.ajax({
      url:'messagecontrol.php',
      data:{'group':group},
      dataType:'text',
      success:function(data){
        $('#testing').html(data);
        var objDiv = document.getElementById("testing");
        objDiv.scrollTop = objDiv.scrollHeight;
      },
      type:'POST'
    });
});
});

//right side profile control
  $.ajax({
  url:'ownerprofile.php',
  success:function(data){
    $('#profile_info').html(data);
  }
});

//send message control
$('#sendmessage').click(function(){
  var message=$('#message').val();
  var group=$("#messagetitle").text();
  message=replaceAll(message,'<','&lt');
  message=replaceAll(message,'>','&gt');
  if(message==''||message.trim().length==0){
    alert('Can not send empty message!');
  }
  else{
    $.ajax({
      url:'messagecontrol.php',
      data:{'group':group,'message':message},
      dataType:'text',
      success:function(data){
        $('#testing').html(data);
        var objDiv = document.getElementById("testing");
        objDiv.scrollTop = objDiv.scrollHeight;
        $('#message').val('');
      },
      type:'POST'
    });
  }
});
$('#message').keydown(function (e){
    if(e.keyCode == 13){
      var message=$('#message').val();
  var group=$("#messagetitle").text();
  message=replaceAll(message,'<','&lt');
  message=replaceAll(message,'>','&gt');
  if(message==''){
    alert('Can not send empty message!');
  }
  else{
    $.ajax({
      url:'messagecontrol.php',
      data:{'group':group,'message':message},
      dataType:'text',
      success:function(data){
        $('#testing').html(data);
        var objDiv = document.getElementById("testing");
        objDiv.scrollTop = objDiv.scrollHeight;
        $('#message').val('');
      },
      type:'POST'
    });
  }
    }
})

//message feedback display control
$('document').ready(function(){
  setInterval(function(){
    if($('#messagetitle').html()!='Quick Chat'){
      var group=$('#messagetitle').html();
      var content=$('#testing').html();
      $.ajax({
      url:'messageupdate.php',
      data:{'group':group},
      dataType:'text',
      success:function(data){
        $('#testingmessage').html(data);
        var content2=$('#testingmessage').html();
        if(content!=content2){
          $('#testing').html(data);
          var objDiv = document.getElementById("testing");
          objDiv.scrollTop = objDiv.scrollHeight;
        }
      },
      type:'POST'
    });
  }
},500);
});

$('document').ready(function(){
  setInterval(function(){
    $.ajax({
      url:'kick.php',
      success:function(data){
        if(data==0){
          location.reload();
        }
        if(!$('#myModal2').is(':visible')&&$('#profile_info').html()!=''){
            $('#profile_info').html('');
        }
      }
    });
  
  },500);
});

//replace all function for cross site attacking
function replaceAll(str, find, replace) {
    return str.replace(new RegExp(find, 'g'), replace);
}

//look up user info
$('#lookupname').click(function(){
  var username=$('#user-name').val();
  $('#user-name').val('');
  $.ajax({
    url:'checkuserinfo.php',
    data:{'username':username},
    dataType:'text',
    success:function(data){
      if(data!=0){
        $('#profile_info').html(data);

      }
      else{
        alert('Forbidden!');
      }
    },
    type:'POST'
  });
});





$('#groupname_control').click(function(){
    var groupname=$('#group-name').val();
    $('#group-name').val('');
    if(groupname!=''){
      $.ajax({
        url:'leavegroup.php',
        data:{'groupname':groupname},
        dataType:'text',
        success:function(data){
          if(data=='Success!'){
            location.reload();
          }
          else{
            alert(data);
          }
        },
        type:'POST'
      });

    }
});



