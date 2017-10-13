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
            else if(data!=2){
              if($('#dob-mm').val()==2){
                if($('#dob-dd').val()==29){
                  $('#dob-dd').val('');
                }
              }
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

      if(gender&&language){
        var username=$('#username').val();
        var password=$("#password").val();
        var email=$("#email").val();
        var dobdd=$("#dob-dd").val();
        var dobmm=$("#dob-mm").val();
        var dobyy=$("#dob-yy").val();
        $.ajax({
          url:"register.php",
          data:{'signup':1,'username2':username,'password2':password,'email2':email,'dobdd':dobdd,'dobmm':dobmm,'dobyy':dobyy,'gender':gender,'language':language,'country':country},
          dataType:'text',
          success: function(data){
            if(data==1){
              $(location).attr('href','index.html');
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
    else{
      alert('Plase check the Privacy terms & Conditions confirm that you agreed with the terms.');
    }
  });
