<!DOCTYPE html>
<html>
<head>
  <?php
    include ('classes/Login.php');
    if(!Login::isLoggedin()){
      header('Location:index.html');
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
  <script type="text/javascript">$.ajax({
  url:'insertgroup.php',
  dataType:'text',
  success:function(data){
    var groups=[];
    groups=data.split(',');
    grouplength=groups.length;
    for(i=0;i<grouplength;i++){
      var groupname="<li class='list-group-item' id='group"+i+"'><div class='col-xs-12 col-sm-4'><img  src='http://api.randomuser.me/portraits/men/49.jpg' alt='Scott Stevens' class='img-responsive img-circle'  style='display:block;' /></div><div class='col-xs-12 col-sm-8' ><h4 style='overflow-x: auto;'>%data%</h4></div><div class='clearfix'></div></li>";
      groupname=groupname.replace('%data%',groups[i]);
      $("#groups-list").append(groupname);
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
  </style>

  </head>
<body>

  <div class='col-sm-3' style='height: 100vh;padding: 0px'>
    <div style='height:8vh;background: white'>
      <div style='height:8vh;background: white;' class='col-sm-2' id='settingcontainer'>
        <i class="fa fa-cog" style="font-size:46px;position: relative;top:calc(4vh - 23px);left:calc(50% - 20px);color: #777" id='setting' class='menu'></i>
        <div id='settingitem' class="col-sm-10" style="background: #ffffff;z-index: 99;position: absolute;left:100%;top: 0px;max-height: 100px;padding: 0px;">
           <div class="btn-group-vertical">
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" id='changeprofile'>Change My Profile Image</button>
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" id='resetpassword'>Reset Password</button>
              <button type="button" class="btn btn-default" id='signoutall'>Sign Out All Devices</button>
           </div>
        </div>
      </div>
      <div style='height:8vh;background: red;padding: 0px' class='col-sm-10'>
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
      <div style='height:92vh;background: red;' class='col-sm-2'>
        <hr>
        <i class="fa fa-sign-out" style="font-size:36px;position:relative;left: calc(50% - 15px);color: #777" title="Sign Out" id='signout'></i>
        <hr>
        <i class="fa fa-sitemap" style="font-size:36px;position:relative;left: calc(50% - 18px);color: #777" title="Create Group" id='creategroup' data-toggle="modal" data-target="#myModal"></i>
        <hr>
        <i class="fa fa-plus-circle" style="font-size:36px;position:relative;left: calc(50% - 18px);color: #777" title='Add Group' id='addgroup' data-toggle="modal" data-target="#myModal"></i>
      </div>
      <div style='height:92vh;background: blue;padding: 0px' class='col-sm-10'>
        <ul class="list-group col-sm-12" id="groups-list">
          <!--Where group names goes-->
          <li class="list-group-item">
              <div class="col-xs-12 col-sm-4">
                  <img  src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens" class="img-responsive img-circle"  style="display:block;" />
              </div>
              <div class="col-xs-12 col-sm-8" >
                <h4 style="overflow-x: auto;">Testing Group</h4>
              </div>
              <div class="clearfix"></div>
          </li>
         

        </ul>
      </div>
    </div>
  </div>

  <div class='col-sm-7' style='background: green;height: 100vh;padding: 0px'>

     <div style='height:8vh;background: white;text-align: center;display: table-cell;vertical-align: middle;width:100vw'><h4 ><span id='messagetitle'>Quick Chat</span></h4></div>
     <div id='testing' style="background:white;height: 80vh;overflow-y: auto;">
      <!--Where message goes-->
     </div>
      <div>
         <!--Message control-->
         <form style='height:12vh;background: red;position:absolute;bottom: 0px;z-index: 10;width: 100%'>
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
    </div>



  <div class='col-sm-2' style='background: blue;height: 100vh;padding: 0px'>
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
  </div>


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
            <form  action='upload.php' method="post" enctype="multipart/form-data" id='imgupload' >
              <input id="upload-img" type="file" name="fileToUpload" />
              <div id="image-holder"></div>
              <br>
              <input  type="submit"  id='submiting' value='Upload' style="display: none">
            </form>

            <div  id='changepassword'>
              &nbsp&nbsp&nbsp&nbsp&nbsp&nbspOld Password: <input id="oldpassword" type="password" name="oldpassword" placeholder="old password" class="form-control"/><br><br>
               &nbsp&nbsp&nbsp&nbsp&nbspNew Password: <input id="newpassword" type="password" name="newpassword" placeholder="new password" class="form-control"/><br><br>
              Confirm Password: <input id="confirmpassword" type="password" name="confirmpassword" placeholder="confirm password" class="form-control"/><br><br>
              <p id='indicator' style='color: red'><p>
              <input  type="submit"  id='submiting2' value='Confirm'>
            </div>

            <div  id='createGroups' style="display: none">
              Group Name:<input type="text" name="contact" id='createg' placeholder="Group Name">
              <input type="submit"  value="Create" id='create'>
              <p id='hl' style="color: red"></p>
            </div>

            <div  id='addgroups' style="display: none">
              Add Group:<input type="text" name="contact" id='add-group' placeholder="Group Name">
              <input type="submit"  value="Add Group" id='add'>
              <p id='addwarning' style="color: red"></p>
            </div>

            <br/>
          </div>
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
});
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

</script>
</html>


