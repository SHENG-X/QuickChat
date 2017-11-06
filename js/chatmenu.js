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
      url:'model.php',
      data:{'command':'signout','signoutall':1},
      success:function(data){
        location.reload();
      },
      type:'POST'
    })
  });

 
 //change password
 $("#changepassword").click(function(){
  var oldpassword=$('#oldpass').val();
  var newpassword=$('#newpass').val();
  var confirmpassword=$('#confirmpass').val();
  if(oldpassword!=''&&newpassword!=''&&confirmpassword!=''){
    if(newpassword==confirmpassword){
      if(newpassword.length>5&&newpassword.length<80){
        $.ajax({
          url:'model.php',
          data:{'command':'changepassword','oldpassword':oldpassword,'newpassword':newpassword},
          dataType:'text',
          success:function(data){
            //need change to display feedback
            $("#oldpass").css('border-color','red');
            alert(data);
            if(data=='Password Changed!'){
              $("#myModal4").modal('hide');
            }
          },
          error:function(){
            $("#changepass-error").show();
            $("#changepass-error-indicator").text('Error..');
          },
          type:'POST'
        });
      }
      else{
        $("#newpass").css('border-color','red');
        $("#confirmpass").css('border-color','red');
        $("#changepass-error").show();
        $("#changepass-error-indicator").text('Invalid Password!');
      }
    }
    else{
      $("#newpass").css('border-color','red');
      $("#confirmpass").css('border-color','red');
      $("#changepass-error").show();
      $("#changepass-error-indicator").text('Password Does Not Match!');
    }
  }
  else{
    if(oldpassword==''){$("#oldpass").css('border-color','red');}
    if(newpassword==''){$("#newpass").css('border-color','red');}
    if(confirmpassword==''){$("#confirmpass").css('border-color','red');}
    $("#changepass-error").show();
    $("#changepass-error-indicator").text('Please Complete the Form!');
  }
 });
$("#oldpass").click(function(){
  $('#oldpass').css('border-color','');
});
$("#newpass").click(function(){
    $('#newpass').css('border-color','');
});
$("#confirmpass").click(function(){
    $('#confirmpass').css('border-color','');
});

//upload img to php
 $('#url_submit').click(function() {
        var url=$('#url').val();
        $('#url').val('');
        $.ajax({
            type:'POST',
            url: 'model.php',
            data:{'command':'changeprofileimage','url':url},
            dataType:'text',
            success:function(data){
              if(data==1){
                alert('Success!');
                $("#myModal1").modal('hide');
              }
              else{
                $("#changeprofileimage-error").show();
                $("#changeprofileimage-error-indicator").text('Not a Image Forbidden!');
              }
            },
            type:'POST'
        });
    });

//search control---------------------
$("#search1").keyup(function(){
  searchgroup1();
});
function searchgroup1(){
  var filter,ul,li,h4,i;
  filter=$('#search1').val();
  ul=document.getElementById('groups-list1');
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
//search control---------------------
$("#search2").keyup(function(){
  searchgroup2();
});
function searchgroup2(){
  var filter,ul,li,h4,i;
  filter=$('#search2').val();
  ul=document.getElementById('groups-list2');
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
//create group
$("#create").click(function(){
  var groupname=$('#create-groupname').val();
  if(groupname.length<32&&groupname.indexOf('>')<0&&groupname.indexOf('<')<0){
    $("#create-groupname").val("");
    if(groupname.length>3){
      groupname=replaceAll(groupname,'<','&lt');
      groupname=replaceAll(groupname,'>','&gt');
      $.ajax({
        url:'model.php',
        data:{'command':'create-a-group','groupname':groupname},
        dataType:'text',
        success:function(data){
          if(data==0){
             $("#creategroup-error").show();
             $("#creategroup-error-indicator").text('Group Name Was Taken!');
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
      $("#creategroup-error").show();
      $("#creategroup-error-indicator").text('Invalid Group Name!');
    }
  }
  else{
      $("#creategroup-error").show();
      $("#creategroup-error-indicator").text('Forbidden!');
  }    
});
//add a group
$("#add-group").click(function(){
    var groupname=$('#add-groupname').val();
    if(groupname.length<3){
      $('#groupname-search-error').show();
    }
    else{
      $.ajax({
        url:'model.php',
        data:{'command':'addgroup','groupname':groupname},
        dataType:'text',
        success:function(data){
          if(data==0){
            $('#groupname-search-error').show();
          }
          else if(data=='Success!'){
            location.reload();
          }
          else{
                $('#groupname-search-error').show();
}
        },
        type:'POST'
      });
    }
  });

//look up user info
$('#lookup-username-btn').click(function(){
  var username=$('#lookup-username').val();
  $('#lookup-username').val('');
  $.ajax({
    url:'model.php',
    data:{'command':'lookupuser','username':username},
    dataType:'text',
    success:function(data){
      if(data!=0){
        $('#profile_info').html(data);

      }
      else{
        $("#userlookup-error").show();
      }
    },
    type:'POST'
  });
});
$('#myModal2').on('hidden.bs.modal', function () {
  $('#profile_info').html('');
})
//leave a group
$('#leavegroup-btn').click(function(){
    var groupname=$('#leavegroup-name').val();
    $('#leavegroup-name').val('');
    if(groupname!=''){
      $.ajax({
        url:'model.php',
        data:{'command':'leavegroup','groupname':groupname},
        dataType:'text',
        success:function(data){
          if(data=='Success!'){
            location.reload();
          }
          else{
            $("#leavegroup-error").show();
          }
        },
        type:'POST'
      });
    }
});
function replaceAll(str, find, replace) {
    return str.replace(new RegExp(find, 'g'), replace);
}