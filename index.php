<!DOCTYPE html>
<html>
<head>
  <?php
    include ('classes/Login.php');
    if(!Login::isLoggedin()){
      header('Location:login.html');
    }
  ?>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/chat.css">
</head>
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  $.ajax({
  url:'insertgroup.php',
  dataType:'text',
  success:function(data){
    if(data!=''){
    var groups=[];
    groups=data.split(',');
    grouplength=groups.length;
    for(i=0;i<grouplength;i++){
      var groupname="<li class='list-group-item' style='padding: 1.2vh'  id='group"+i+"'><div class='col-xs-12 col-sm-4' ><img  src='http://files.livechattools.webnode.com/200000508-ac725af604/live-chat-team.png' alt='Profile Image' class='img-responsive img-circle'  style='display:block;height: calc(4vh + 2vw);width: calc(4vh + 2vw)' /></div><div class='col-xs-12 col-sm-8' style='height: 8vh;text-align: left;'><h4 style='overflow-x: auto;padding: 0px;margin: 0px;position: relative;height: 4vh;top:2.5vh;font-size: calc(1vh + 1vw)'>%data%</h4></div><div class='clearfix'></div></li>";
      groupname=groupname.replace('%data%',groups[i]);
      $("#groups-list").append(groupname);
    }

    }
  }
});

</script>
  <title>Quick Chat</title>
  <style type="text/css">
    li:hover{
      cursor: pointer;
      background: #777;
    }
    .media{
      padding-left: 10px;
      padding-right: 10px;
    }
    #testing p{
      word-wrap: break-word;
    }
    textarea{
      border-left: none;
      border-right: 1px solid #aaa;
      border-top: 1px solid #aaa;
    }
  </style>

  </head>
<body>

  <div class='col-sm-3' style='height: 100vh;padding: 0px'>
    <div style='height:8vh;'>
      <div style='height:8vh;border-right: 1px solid #aaa' class='col-sm-2' id='settingcontainer'>
        <i class="fa fa-cog" style="font-size:46px;position: relative;top:calc(4vh - 23px);left:calc(50% - 20px);color: #777;" id='setting' class='menu'></i>
        <div id='settingitem' class="col-sm-10" style="background: #ffffff;z-index: 99;position: absolute;left:100%;top: 0px;max-height: 100px;padding: 0px;">
           <div class="btn-group-vertical">
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" id='changeprofile'>Change My Profile Image</button>
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" id='resetpassword'>Reset Password</button>
              <button type="button" class="btn btn-default" id='signoutall'>Sign Out All Devices</button>
           </div>
        </div>
      </div>
      <div style='height:8vh;padding: 0px;border-right: 1px solid #aaa' class='col-sm-10'>
            <form action="" class="search-form col-sm-12">
                <div class="form-group has-feedback">
                  <label for="search" class="sr-only">Search</label>
                  <input type="text" class="form-control" name="search" id="search" placeholder="search">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
            </form>
      </div>
    </div>
    <div>
      <div style='height:92vh;border-right: 1px solid #aaa' class='col-sm-2'>
        <hr>
        <i class="fa fa-sign-out" style="font-size:36px;position:relative;left: calc(50% - 15px);color: #777" title="Sign Out" id='signout'></i>
        <hr>
        <i class="fa fa-sitemap" style="font-size:36px;position:relative;left: calc(50% - 18px);color: #777" title="Create Group" id='creategroup' data-toggle="modal" data-target="#myModal"></i>
        <hr>
        <i class="fa fa-plus-circle" style="font-size:36px;position:relative;left: calc(50% - 18px);color: #777" title='Add Group' id='addgroup' data-toggle="modal" data-target="#myModal"></i>
         <hr>
        <i class="fa fa-search" style="font-size:36px;position:relative;left: calc(50% - 18px);color: #777" title='Look up user info' id='lookupusers' data-toggle="modal" data-target="#myModal2"></i>
        <hr>
        <i class="fa fa-chain-broken" style="font-size:36px;position:relative;left: calc(50% - 18px);color: #777" title='Leave a group' id='leavegroup' data-toggle="modal" data-target="#myModal3"></i>
      </div>
      <div style='height:92vh;padding: 0px;border-right: 1px solid #aaa' class='col-sm-10'>
        <ul class="list-group col-sm-12" id="groups-list" style="background:white;">
          <!--Where group names goes-->
       
      <!--   <li class='list-group-item' style='padding: 3px'>
              <div class='col-xs-12 col-sm-4' >
                  <img  src='http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens" class="img-responsive img-circle'  style='display:block;height: 8vh;width: 8vh' />
              </div>
              <div class='col-xs-12 col-sm-8' style='height: 8vh;text-align: left;'>
                <h4 style='overflow-x: auto;padding: 0px;margin: 0px;position: relative;height: 4vh;top:2.5vh;font-size: 2.7vh'>Testing Group</h4>
              </div>
              <div class='clearfix'></div>
          </li> 
         -->

        </ul>
      </div>
    </div>
  </div>

  <div class='col-sm-9' style='height: 100vh;padding: 0px;'>
    <div id ='cover' style="width: 100%;height: 100vh;position:fixed;background: white;z-index: 99;background-image: url('http://www.powerpointhintergrund.com/uploads/2017/06/simple-backgrounds-pictures-wallpaper-cave-1.jpeg');background-size: cover;"></div>

     <div style='height:8vh;text-align: center;border-bottom: 1px solid #eee' class="col-sm-12"><h4 style="margin-top: 2vh;"><span id='messagetitle'>Quick Chat</span></h4></div>
    
     <div id='testing' style="height: 80vh;overflow-y: auto;overflow-x: hidden; padding: 0px;" class="col-sm-12" >
      <!--Where message goes-->
     </div>

      <div>
         <!--Message control-->
         <form style='height:12vh;position:absolute;bottom: 0px;z-index: 10;width: 100%'>
          <div class="form-group" >
            <textarea  style='height:100%;resize: none;display:inline-block;position: absolute;left:0px;width:90%;margin:0px;padding: 0px' id='message'></textarea>
            <div class="input-group-btn" style="display: inline-block; background: green;position: absolute;width: 10%;height:12vh;position: absolute;z-index: 10;right: 0px">
              <button class="btn btn-default" type="button" style="display: inline-block;width: 100%;height:12vh" id='sendmessage'>
              <i class="fa fa-send-o" style="font-size:36px"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
            <div style="display: none;" id='testingmessage'></div>
    </div>



 <!-- <div class='col-sm-2' style='height: 100vh;padding: 0px'>
    <div style='height:8vh;background: yellow;text-align: center;'>
        <i class="fa fa-user-circle-o" style="font-size:2.5em;position: relative;top: 1vh"></i>
    </div>
    
    <div id='profile' style="height: 30%;background: red">
      <div id='profile-img' style="height: 70%;background: red">
        <img src='https://www.w3schools.com/w3css/img_avatar3.png' class="img-circle" style="position: relative;left: calc(50% - 9vh);top:calc(2vh);width:18vh; height:18vh ">
      </div>
      <div id='profile_info'>
      <table style="width: 100%">
        <tr><td>Name:</td><td>Miky Don</td></tr>
        <tr><td>Date of Birth:</td><td>Jul. 12,1988</td></tr>
        <tr><td>Gender:</td><td>Female</td></tr>
        <tr><td>Country:</td><td>Canada</td></tr>
        <tr><td>Language:</td><td>English</td></tr>
      </table>
    </div>
    </div>
  </div>-->


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id='mtitle'>Change Profile Image</h4>
        </div>
        <div class="modal-body"  style="text-align: center;">
          <div id="wrapper" >
            <form  action='upload.php' method="post" id='imgupload' >
              Image URL: <input id="upload-img" type="text" name="fileToUpload" placeholder="URL" class="form-control" />
              <input  type="submit"  id='submiting' value='Upload'  class="btn btn-default">
              <div id="image-holder"></div>
              <br>
            </form>

            <div  id='changepassword'>
              &nbsp&nbsp&nbsp&nbsp&nbsp&nbspOld Password: <input id="oldpassword" type="password" name="oldpassword" placeholder="old password" class="form-control"/><br><br>
               &nbsp&nbsp&nbsp&nbsp&nbspNew Password: <input id="newpassword" type="password" name="newpassword" placeholder="new password" class="form-control"/><br><br>
              Confirm Password: <input id="confirmpassword" type="password" name="confirmpassword" placeholder="confirm password" class="form-control"/><br><br>
              <p id='indicator' style='color: red'><p>
              <input  type="submit"  id='submiting2' value='Confirm' class="btn btn-default">
            </div>

            <div  id='createGroups' style="display: none">
              Group Name: <input type="text" name="contact" id='createg' class="form-control" placeholder="Group Name">
              <input type="submit"  value="Create" id='create' class="btn btn-default">
              <p id='hl' style="color: red"></p>
            </div>

            <div  id='addgroups' style="display: none">
              Add Group: <input type="text" name="contact" id='add-group' class="form-control" placeholder="Group Name">
              <input type="submit"  value="Add Group" id='add' class="btn btn-default">
              <p id='addwarning' style="color: red"></p>
            </div>

            <br/>
          </div>
        </div>
      </div>
    </div>
  </div>




  <!--Look up user modal window-->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Info Lookup</h4>
        </div>
        <div class="modal-body" style="text-align: center;">
          <div id='profile_info'>
            <!-- <table style="width: 100%">
              <tr><td>Name:</td><td>Miky Don</td></tr>
              <tr><td>Date of Birth:</td><td>Jul. 12,1988</td></tr>
              <tr><td>Gender:</td><td>Female</td></tr>
              <tr><td>Country:</td><td>Canada</td></tr>
              <tr><td>Language:</td><td>English</td></tr>
            </table> -->
          </div>
          <!--Only allow user to look up other user info if they are in the same group-->
          <input type="text" id='user-name' placeholder="Username" class="form-control"> <input type="button" id='lookupname' value="Lookup" class="btn btn-default">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!--Leave group user modal window-->
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Leave Group</h4>
        </div>
        <div class="modal-body" style="text-align: center;">
          <h5>Enter Group Name to Leave the Group</h5>
          <!--Only allow user to look up other user info if they are in the same group-->
          <input type="text" id='group-name' placeholder="Group Name" class="form-control"> <input type="button" id='groupname_control' value="Leave" class="btn btn-default">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>




</body>
<script type="text/javascript" src="js/csscontrol.js"></script>
<script type="text/javascript" src='js/chatmenu.js'></script>
<script type="text/javascript">
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





</script>
</html>


