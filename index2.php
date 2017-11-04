<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0 , maximum-scale=1.0, user-scalable=0">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>Quick Chat</title>
  <style type="text/css">
  hr{
    margin-top: 12px;
  }
  textarea{
    border:1px solid #eee;
  }
  .fa{
    font-size:40px;
    position:relative;
    color: #777
  }
  .fa:hover{
    cursor: pointer;
    color: #aaa;
  }
  #header-container{
    position: absolute;
    padding: 20px;
    top: 0px;
    width: 100vw;
    height: 50px;
    border-bottom: 1px solid #eee;
  }
  .header-menu{
    padding-top:8px;
    display: inline-block;
    position: absolute;
    top: 0px;
    text-align: center;
  }    
  .search-bar{
    width: calc(100vw - 50px);
    height: 40px;
    margin: auto;
    left: 50px;
  }
  .search-bar>input{
    width: calc(80vw - 32px);
    margin: auto;
/*    display: none;
*/  }
  #group_chating_name{
    display: none;
  }
  .search-bar>span{
    display: inline-block;
    font-size: 28px;
    margin:0px;
    padding: 0px;
  }

  @media screen and (max-width: 726px){
    #menu-container{
    width: 100vw;
    height: 100vh;
    position: absolute;
    background: white;
    left: -180vw;
    z-index: 1;    
    transition: 1.2s;
  }
  #chat_to{
    display: none;
  }
  }
  #menu-container *{
    z-index: 3;
  }
  #menu-bar{
    width: 50px;
    display: inline-block;
    height: 100%;
    z-index: 5;
    position: absolute;
    overflow-y: auto;
  }

  #groupnames_m{
    width: calc(100vw - 50px);
    display: inline-block;
    height: 100%;
    position: absolute;
    left: 50px;
    background: white;
  }
  #groups-container{
    position: absolute;
    top: 50px;
    width: 100vw;
    height: calc(100vh - 50px);
    overflow-y: auto;
/*    background: black;*/
/*    display: none;
*/  }
  #chatting_container{
    position: absolute;
    width: 100vw;
    height: calc(100vh - 50px);
    top:50px;
    left: 0px;
    margin:0px;
    display: none;
  }
  #message_display{
    width: 100%;
    height: 90%;
  }
  #sendmessage_control{
    width: 100%;
    height: 10%;
    z-index: 2;
  }
  #menu-items{
    border-right: 1px solid #eee;
    height: 100vh;
  }

  @media screen and (min-width: 726px){
    #header-container{
      display: none;
    }
    #menu-container{
      width: 30vw;
      height: 100vh;
      position: absolute;
      background: white;
      left:0px;
      z-index: 1;    
    }
    #groupnames_m{
    width: calc(35vw - 50px);
    display: inline-block;
    height: 100%;
    position: absolute;
    left: 50px;
    border-right: 1px solid #eee;
  }
  ul>li h4{
    width:8vh;
    height: 8vh;
  }
  #groups-container{
    display: none;
  }
  #chatting_container{
    position: absolute;
    width: 65vw;
    height: calc(100% - 40px);
    top:0px;
    left: 35vw;
    margin:0px;
    display: none;
  }
  .fa-close{
    display: none;
  }
   #chat_to{
    height:40px;
    display: table-cell;
    text-align:center;
    width: 100vw;
    vertical-align: middle;
    font-size: 28px;
    border-bottom: 1px solid #eee;
  }
  }

  @media screen and (min-width: 900px){
    #header-container{
      display: none;
    }
    #menu-container{
      width: 30vw;
      height: 100vh;
      position: absolute;
      background: white;
      left:0px;
      z-index: 1;    
    }
    #groupnames_m{
    width: calc(25vw - 50px);
    display: inline-block;
    height: 100%;
    position: absolute;
    left: 50px;
  }
  ul>li h4{
    width:8vh;
    height: 8vh;
  }
  #groups-container{
    display: none;
  }
  #chatting_container{
    position: absolute;
    width: 75vw;
    height: calc(100% - 40px);
    top:0px;
    left:25vw;
    margin:0px;
    display: none;
    z-index: 11;
  }
  .fa-close{
    display: none;
  }
   #chat_to{
    height:40px;
    display: table-cell;
    text-align:center;
    width: 100vw;
    vertical-align: middle;
    font-size: 28px;
    border-bottom: 1px solid #eee;
  }
  }

  </style>
  </head>
<body>
  <!--Support for moible-->
  <div id='header-container'>

    <div id='home' class='menu-item header-menu' >
      <i class="fa fa-navicon" style="font-size:36px;width: 40px;height: 40px;text-align: center;"></i>
    </div>
    <div class="header-menu search-bar">
          <input type="text" class="form-control" placeholder="Search" name="search">
          <span id='group_chating_name'>Testing Group My</span>
    </div>
  </div>


  <div id='menu-container'>
    <!--Menu bar container-->
    <div id='menu-bar' class='menu-item'>
      <div style='width: 50px;text-align: center;display: inline-block;' id='menu-items'>
          <i class="fa fa-cog" style="width: 100%" id='setting' class='menu'></i>
             <div class="btn-group-vertical" style="position: fixed;top:0px;left: 50px;display: none;z-index:10;min-width: 150px" >
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" id='changeprofile'>Change Profile Image</button>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" id='resetpassword'>Reset Password</button>
                <button type="button" class="btn btn-default" id='signoutall'>Sign Out All Devices</button>
             </div>
        <hr>

        <i class="fa fa-sign-out" title="Sign Out" id='signout'></i>
        <hr>
        <i class="fa fa-sitemap" title="Create Group" id='creategroup' data-toggle="modal" data-target="#myModal"></i>
        <hr>
        <i class="fa fa-plus-circle" title='Add Group' id='addgroup' data-toggle="modal" data-target="#myModal"></i>
        <hr>
        <i class="fa fa-search" title='Look up user info' id='lookupusers' data-toggle="modal" data-target="#myModal2"></i>
        <hr>
        <i class="fa fa-chain-broken" title='Leave a group' id='leavegroup' data-toggle="modal" data-target="#myModal3"></i>
        <hr>
        <i class="fa fa-close" title='Close' id='close'></i>
      </div>
    </div>
    <!--Menu bar end-->

    <!--Group container-->
    <div id='groupnames_m' class="groupnames">
      <div id='groupsearch'>
        <input type="text" class="form-control" placeholder="Search" name="search">
      </div>
       <ul class="list-group" id="groups-list" style="background:white;">
            <!--Where group names goes-->
            <li class='list-group-item' style='padding: 3px'>
                <div class='col-xs-4' >
                    <img  src='http://www.agrostis.cz/data/gallery_53/326-kvetnate-louky-vilik.jpg'  style='display:block;height: 8vh;width: 8vh' />
                </div>
                <div class='col-xs-8 ' style='height: 8vh;text-align: left;'>
                  <h4 style='overflow-x: auto;padding: 0px;margin: 0px;position: relative;height: 8vh;width: 100%;text-align: center;display: table-cell;vertical-align: middle;font-size: 2.7vh'>Testing Group</h4>
                </div>
                <div class='clearfix'></div>
            </li> 
      </ul>
    </div>
    <!--Group container end -->
  </div>

  <div id='groups-container' class="groupnames">
    <!--Group container-->
      <ul class="list-group" id="groups-list" style="background:white;">
            <!--Where group names goes-->
            <li class='list-group-item' style='padding: 3px'>
                <div class='col-xs-4' >
                    <img  src='http://www.agrostis.cz/data/gallery_53/326-kvetnate-louky-vilik.jpg'  style='display:block;height: 8vh;width: 8vh' />
                </div>
                <div class='col-xs-8 ' style='height: 8vh;'>
                  <h4 style='overflow-x: auto;margin: auto;position: relative;height: 8vh;font-size: 4vh;top:2vh;'>Testing Group</h4>
                </div>
                <div class='clearfix'></div>
            </li> 
            
      </ul>
    <!--Group container end -->
  </div>
  
  <!--Chatting container-->
  <div id='chatting_container'>
    <div id='chat_to'>Testing</div>
    <div id='message_display'>
      <!--message-->
    </div>
    <div id='sendmessage_control'>
      <textarea  style='height:100%;resize: none;display:inline-block;width:90%;margin:0px;padding: 0px' id='message'></textarea>
      <button class="btn btn-default"  style="width:10%;height: 10%;margin:0px;padding: 0px;position: absolute;display: inline-block;" id='sendmessage'><i class="fa fa-send-o" style="font-size:1.5em;"></i>
      </button>
    </div>
  </div>

  <!-- <div id='menu-p'>
    <i class="fa fa-navicon" style="font-size:36px;position: absolute;width: 40px;height: 40px;margin: auto;text-align: center;color: #777;"></i>
  </div>

  <div id='menu-content' >
     <div style='width: 40px;text-align: center;display: inline-block;' id='menu-container'>
           <i class="fa fa-cog" style="font-size:40px;position: relative;color: #777;" id='setting' class='menu'></i>
          <div id='settingitem' style="background: #ffffff;z-index: 99;position: absolute;left:40px;max-height: 100px;top:0px;padding: 0px;">
             <div class="btn-group-vertical" style="display: none">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" id='changeprofile'>Change Profile Image</button>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" id='resetpassword'>Reset Password</button>
                <button type="button" class="btn btn-default" id='signoutall'>Sign Out All Devices</button>
             </div>
         </div>
       <hr>
        <i class="fa fa-sign-out" style="font-size:40px;position:relative;color: #777" title="Sign Out" id='signout'></i>
        <hr>
        <i class="fa fa-sitemap" style="font-size:40px;position:relative;color: #777" title="Create Group" id='creategroup' data-toggle="modal" data-target="#myModal"></i>
        <hr>
        <i class="fa fa-plus-circle" style="font-size:40px;position:relative;color: #777" title='Add Group' id='addgroup' data-toggle="modal" data-target="#myModal"></i>
         <hr>
        <i class="fa fa-search" style="font-size:40px;position:relative;color: #777" title='Look up user info' id='lookupusers' data-toggle="modal" data-target="#myModal2"></i>
        <hr>
        <i class="fa fa-chain-broken" style="font-size:40px;position:relative;color: #777" title='Leave a group' id='leavegroup' data-toggle="modal" data-target="#myModal3"></i>
      </div> -->
      
      <!-- <div style='background: yellow;' id='group-container'>
        <div id='searchgroup'>
           <div id='groupnames'>
           <div class="input-group">
              <input type="text" class="form-control" placeholder="Search" name="search">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
              </div>
            </div>
        </div>
        </div>
        <div id='groupnames'>
          <ul class="list-group" id="groups-list" style="background:white;"> -->
          <!--Where group names goes-->
         <!--  <li class='list-group-item' style='padding: 3px'>
              <div class='col-xs-4' >
                  <img  src='http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens" class="img-responsive img-circle'  style='display:block;height: 8vh;width: 8vh' />
              </div>
              <div class='col-xs-8 ' style='height: 8vh;text-align: left;'>
                <h4 style='overflow-x: auto;padding: 0px;margin: 0px;position: relative;height: 4vh;top:2.5vh;font-size: 2.7vh'>Testing Group</h4>
              </div>
              <div class='clearfix'></div>
          </li> 
          </ul>
        </div>

      </div>
    
  </div> -->

   <!--   

      <div style='height:100vh;' id='message-container' >
      </div> -->
<!--        <div class='col-sm-3' style='height: 100vh;padding: 0px'>
 -->
    <!--    <div style='height:8vh;padding: 0px;border-right: 1px solid #aaa' class='col-sm-10'>
            <form action="" class="search-form col-sm-12">
                <div class="form-group has-feedback">
                  <label for="search" class="sr-only">Search</label>
                  <input type="text" class="form-control" name="search" id="search" placeholder="search">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
            </form>
      </div>  -->
<!--     <div>
 -->      <!-- <div style='height:92vh;padding: 0px;border-right: 1px solid #aaa' class='col-sm-10'> -->
<!--         <ul class="list-group col-sm-12" id="groups-list" style="background:white;">
 -->          <!--Where group names goes-->
       
      <!--   <li class='list-group-item' style='padding: 3px'>
              <div class='col-xs-12 col-sm-4' >
                  <img  src='http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens" class="img-responsive img-circle'  style='display:block;height: 8vh;width: 8vh' />
              </div>
              <div class='col-xs-12 col-sm-8' style='height: 8vh;text-align: left;'>
                <h4 style='overflow-x: auto;padding: 0px;margin: 0px;position: relative;height: 4vh;top:2.5vh;font-size: 2.7vh'>Testing Group</h4>
              </div>
              <div class='clearfix'></div>
          </li> 
        

        </ul>
      </div>
    </div> -->
<!--   </div>
 -->
<!--   <div class='col-sm-9' style='height: 100vh;padding: 0px;'>
 -->    <!-- <div id ='cover' style="width: 100%;height: 100vh;position:fixed;background: white;z-index: 99;background-image: url('http://www.powerpointhintergrund.com/uploads/2017/06/simple-backgrounds-pictures-wallpaper-cave-1.jpeg');background-size: cover;"></div> -->
<!-- 
     <div style='height:8vh;text-align: center;border-bottom: 1px solid #eee' class="col-sm-12"><h4 style="margin-top: 2vh;"><span id='messagetitle'>Quick Chat</span></h4></div> -->
    
<!--       <div id='testing' style="height: 80vh;overflow-y: auto;overflow-x: hidden; padding: 0px;" class="col-sm-12" >
 -->      <!--Where message goes
     </div>
 -->
<!--       <div>
 -->         <!--Message control-->
      <!--    <form style='height:12vh;position:absolute;bottom: 0px;z-index: 10;width: 100%'>
          <div class="form-group" >
            <textarea  style='height:100%;resize: none;display:inline-block;position: absolute;left:0px;width:90%;margin:0px;padding: 0px' id='message'></textarea>
            <div class="input-group-btn" style="display: inline-block; background: green;position: absolute;width: 10%;height:12vh;position: absolute;z-index: 10;right: 0px">
              <button class="btn btn-default" type="button" style="display: inline-block;width: 100%;height:12vh" id='sendmessage'>
              <i class="fa fa-send-o" style="font-size:36px"></i>
              </button>
            </div>
          </div>
        </form> -->
<!--       </div>
 -->            <!-- <div style="display: none;" id='testingmessage'></div> -->
<!--     </div>
 -->


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
  <!-- <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog"> -->
      <!-- Modal content-->
      <!-- <div class="modal-content">
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
  </div> -->




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
<script type="text/javascript">
  $("#setting,#setting+div").hover(function(){
    $("#setting+div").show();
  },
  function(){
    $("#setting+div").hide();
  }
  );

  $(".list-group-item").click(function(){
    alert($(this).index());
    $("#groups-container").hide();
    $("#chatting_container").show();
    $(".search-bar>input").hide();
    $("#group_chating_name").show();
    $("#group_chating_name").text($(this).text());
  });
  $('#home').click(function(){
    $("#menu-container").css('left','0px');
  });
  $("#close").click(function(){
    $("#menu-container").css('left','-180vw');
  });
</script>
<!-- <script type="text/javascript" src="js/csscontrol.js"></script>
<script type="text/javascript" src='js/chatmenu.js'></script>
<script type="text/javascript" src='js/notification.js'></script> -->
<!-- <script type="text/javascript">
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


// $('document').ready(function(){
//   $('li').click(function(){
//     alert('click');
//     $("#cover").hide();
//     var targetvar='#'+this.id+' h4';
//     $("#messagetitle").text($(targetvar).text());
//     var group=$("#messagetitle").text();
//     $('#testing').html('');
//     $.ajax({
//       url:'messagecontrol.php',
//       data:{'group':group},
//       dataType:'text',
//       success:function(data){
//         $('#testing').html(data);
//         var objDiv = document.getElementById("testing");
//         objDiv.scrollTop = objDiv.scrollHeight;
//       },
//       type:'POST'
//     });
// });
// });

function message(ele){
  $("#cover").hide();
    var targetvar='#'+ele.id+' h4';
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
}



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
    if(message==''||message.trim()==''){
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
// $('document').ready(function(){
//   setInterval(function(){
//     if($('#messagetitle').html()!='Quick Chat'){
//       var group=$('#messagetitle').html();
//       var content=$('#testing').html();
//       $.ajax({
//       url:'messageupdate.php',
//       data:{'group':group},
//       dataType:'text',
//       success:function(data){
//         $('#testingmessage').html(data);
//         var content2=$('#testingmessage').html();
//         if(content!=content2){
//           var str=data;
//           $('#testing').html(data);
//           var objDiv = document.getElementById("testing");
//           objDiv.scrollTop = objDiv.scrollHeight;
//           if(str.search('media-left')>0){
//             notifyMe();
//           }
//         }
//       },
//       type:'POST'
//     });
//   }

//   $.ajax({
//       url:'kick.php',
//       success:function(data){
//         if(data==0){
//           location.reload();
//         }
//         if(!$('#myModal2').is(':visible')&&$('#profile_info').html()!=''){
//             $('#profile_info').html('');
//         }
//       }
//     });

// },500);
// });

// $('document').ready(function(){
//   setInterval(function(){
    
  
//   },5000);
// });

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





</script> -->
</html>


