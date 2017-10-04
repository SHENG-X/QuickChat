$('#signout').click(function(){
    $.ajax({
      url:'signout.php',
      success:function(){
        location.reload();
      }
    })
  });

$('#signoutall').click(function(){
    $.ajax({
      url:'signout.php',
      data:{'signoutall':1},
      dataType:'text',
      success:function(data){
        location.reload();
      },
      type:'POST'
    })
  });

  //menu color control
  $('#signout').mouseover(function(){
    $('#signout').css('color','#999');
  });
  $('#signout').mouseout(function(){
    $('#signout').css('color','#777');
  });
  $('#creategroup').mouseover(function(){
    $('#creategroup').css('color','#999');
  });
  $('#creategroup').mouseout(function(){
    $('#creategroup').css('color','#777');
  });
  $('#addgroup').mouseover(function(){
    $('#addgroup').css('color','#999');
  });
  $('#addgroup').mouseout(function(){
    $('#addgroup').css('color','#777');
  });
  $('#setting').mouseover(function(){
    $('#setting').css('color','#999');
  });
  $('#setting').mouseout(function(){
    $('#setting').css('color','#777');
  });
  $('#lookupusers').mouseover(function(){
    $('#lookupusers').css('color','#999');
  });
  $('#lookupusers').mouseout(function(){
    $('#lookupusers').css('color','#777');
  });
   $('#leavegroup').mouseover(function(){
    $('#leavegroup').css('color','#999');
  });
  $('#leavegroup').mouseout(function(){
    $('#leavegroup').css('color','#777');
  });

  $("#upload-img").on('change', function () {
     //Get count of selected files
     var countFiles = $(this)[0].files.length;
     var imgPath = $(this)[0].value;
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     var image_holder = $("#image-holder");
     image_holder.empty();
     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
         if (typeof (FileReader) != "undefined") {
             //loop for each file selected for uploaded.
             for (var i = 0; i < countFiles; i++) {
                 var reader = new FileReader();
                 reader.onload = function (e) {
                     $("<img />", {
                         "src": e.target.result,
                             "class": "thumb-image",
                             'width':'200px'
                     }).appendTo(image_holder);
                 }
                 image_holder.show();
                 $('#submiting').show();
                 reader.readAsDataURL($(this)[0].files[i]);
             }
         } else {
             alert("This browser does not support FileReader.");
         }
     } else {
         alert("Pls select only images");
     }
 });

//upload img to php
 $('#imgupload').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
              alert(data);
            },
            error: function(data){
              alert(data);
            }
        });
    }));

 $('#resetpassword').click(function(){
  $('#imgupload').hide();
  $('#changepassword').show();
  $('#createGroups').hide();
  $('#addgroups').hide();
  $('#mtitle').text('Reset Password');
 });
 $('#changeprofile').click(function(){
  $('#changepassword').hide();
  $('#imgupload').show();
  $('#addgroups').hide();
  $('#createGroups').hide();
  $('#mtitle').text('Change Profile Image');

 });
 //change password
 $("#submiting2").click(function(){
  var oldpassword=$('#oldpassword').val();
  var newpassword=$('#newpassword').val();
  var confirmpassword=$('#confirmpassword').val();
  if(oldpassword!=''&&newpassword!=''&&confirmpassword!=''){
    if(newpassword==confirmpassword){
      if(newpassword.length>5&&newpassword.length<80){
        $.ajax({
          url:'changepassword.php',
          data:{'oldpassword':oldpassword,'newpassword':newpassword},
          dataType:'text',
          success:function(data){
            //need change to display feedback
            alert(data);
          },
          error:function(){
            alert('Error..');
          },
          type:'POST'
        });
      }
      else{
        $("#newpassword").css('border-color','red');
        $("#confirmpassword").css('border-color','red');
        $('#indicator').html('<strong>Warning:</strong>Password should contain more than 5 characters');
        alert('Invalid password');
      }
    }
    else{
      $("#newpassword").css('border-color','red');
      $("#confirmpassword").css('border-color','red');
      $('#indicator').html('<strong>Warning:</strong>Password dose not match');
      alert('Password does not match');
    }
  }
  else{
    if(oldpassword==''){$("#oldpassword").css('border-color','red');}
    if(newpassword==''){$("#newpassword").css('border-color','red');}
    if(confirmpassword==''){$("#confirmpassword").css('border-color','red');}
    $('#indicator').html('<strong>Warning:</strong>Please complete the form');
    alert('Please complete the form');
  }
 });
$("#oldpassword").click(function(){
  $('#oldpassword').css('border-color','');
  $('#indicator').html("");
});
$("#newpassword").click(function(){
    $('#newpassword').css('border-color','');
    $('#indicator').html("");
});
$("#confirmpassword").click(function(){
    $('#confirmpassword').css('border-color','');
    $('#indicator').html("");
});
$('#creategroup').click(function(){
    $("#imgupload").hide();
    $('#mtitle').text('Create Group');
    $("#changepassword").hide();
    $('#addgroups').hide();
    $('#createGroups').show();
});


//search control---------------------
$("#search").keyup(function(){
  searchgroup();
});
function searchgroup(){
  var input,filter,ul,li,h4,i;
  input=document.getElementById('search');
  filter=input.value;
  ul=document.getElementById('groups-list');
  li=ul.getElementsByTagName('li');
  for(i=0;i<li.length;i++){
    h4=li[i].getElementsByTagName('h4')[0];
    if(h4.innerHTML.indexOf(filter)>-1){
      li[i].style.display='';
    }else{
            li[i].style.display='none';
    }
  }
}
//-----------------------------------
