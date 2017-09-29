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
  <title>Quick Chat</title>

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
        <i class="fa fa-sign-out" style="font-size:36px;position:relative;left: calc(50% - 18px);color: #777" title="Sign Out" id='signout'></i>
        <hr>
        <i class="fa fa-plus" style="font-size:36px;position:relative;left: calc(50% - 18px);color: #777" title="Add Contact" id='addcontact' data-toggle="modal" data-target="#myModal"></i>
      </div>
      <div style='height:92vh;background: blue;padding: 0px' class='col-sm-10'>
        <ul class="list-group col-sm-12" id="contact-list">
          <li class="list-group-item">
              <div class="col-xs-12 col-sm-5">
                  <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens" class="img-responsive img-circle" />
                  <p style="text-align: center;margin-top: 1em" class='income-msg-num'><span class='badge'>1</span></p>
              </div>
              <div class="col-xs-12 col-sm-7">
                  <span class="name">Scott Stevens</span><br/>
                  <hr style="margin:0px">
                  <span class='moment'>Nice day today! Where do you go? I am okay!</span><br/>
              </div>
              <div class="clearfix"></div>
          </li>
          <li class="list-group-item">
              <div class="col-xs-12 col-sm-5">
                  <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens" class="img-responsive img-circle" />
                  <p style="text-align: center;margin-top: 1em" class='income-msg-num'><span class='badge'>1</span></p>
              </div>
              <div class="col-xs-12 col-sm-7">
                  <span class="name">Scott Stevens</span><br/>
                  <hr style="margin:0px">
                  <span class='moment'>Nice day today! Where do you go? I am okay!</span><br/>
              </div>
              <div class="clearfix"></div>
          </li>
          <li class="list-group-item">
              <div class="col-xs-12 col-sm-5">
                  <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens" class="img-responsive img-circle" />
                  <p style="text-align: center;margin-top: 1em" class='income-msg-num'><span class='badge'>1</span></p>
              </div>
              <div class="col-xs-12 col-sm-7">
                  <span class="name">Scott Stevens</span><br/>
                  <hr style="margin:0px">
                  <span class='moment'>Nice day today! Where do you go? I am okay!</span><br/>
              </div>
              <div class="clearfix"></div>
          </li>
          <li class="list-group-item">
              <div class="col-xs-12 col-sm-5">
                  <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens" class="img-responsive img-circle" />
                  <p style="text-align: center;margin-top: 1em" class='income-msg-num'><span class='badge'>1</span></p>
              </div>
              <div class="col-xs-12 col-sm-7">
                  <span class="name">Scott Stevens</span><br/>
                  <hr style="margin:0px">
                  <span class='moment'>Nice day today! Where do you go? I am okay!</span><br/>
              </div>
              <div class="clearfix"></div>
          </li>
          <li class="list-group-item">
              <div class="col-xs-12 col-sm-5">
                  <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens" class="img-responsive img-circle" />
                  <p style="text-align: center;margin-top: 1em" class='income-msg-num'><span class='badge'>1</span></p>
              </div>
              <div class="col-xs-12 col-sm-7">
                  <span class="name">Scott Stevens</span><br/>
                  <hr style="margin:0px">
                  <span class='moment'>Nice day today! Where do you go? I am okay!</span><br/>
              </div>
              <div class="clearfix"></div>
          </li>
          <li class="list-group-item">
              <div class="col-xs-12 col-sm-5">
                  <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens" class="img-responsive img-circle" />
                  <p style="text-align: center;margin-top: 1em" class='income-msg-num'><span class='badge'>1</span></p>
              </div>
              <div class="col-xs-12 col-sm-7">
                  <span class="name">Scott Stevens</span><br/>
                  <hr style="margin:0px">
                  <span class='moment'>Nice day today! Where do you go? I am okay!</span><br/>
              </div>
              <div class="clearfix"></div>
          </li>
          <li class="list-group-item">
              <div class="col-xs-12 col-sm-5">
                  <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens" class="img-responsive img-circle" />
                  <p style="text-align: center;margin-top: 1em" class='income-msg-num'><span class='badge'>1</span></p>
              </div>
              <div class="col-xs-12 col-sm-7">
                  <span class="name">Scott Stevens</span><br/>
                  <hr style="margin:0px">
                  <span class='moment'>Nice day today! Where do you go? I am okay!</span><br/>
              </div>
              <div class="clearfix"></div>
          </li>
          <li class="list-group-item">
              <div class="col-xs-12 col-sm-5">
                  <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens" class="img-responsive img-circle" />
                  <p style="text-align: center;margin-top: 1em" class='income-msg-num'><span class='badge'>1</span></p>
              </div>
              <div class="col-xs-12 col-sm-7">
                  <span class="name">Scott Stevens</span><br/>
                  <hr style="margin:0px">
                  <span class='moment'>Nice day today! Where do you go? I am okay!</span><br/>
              </div>
              <div class="clearfix"></div>
          </li>

        </ul>
      </div>
    </div>
  </div>

  <div class='col-sm-7' style='background: green;height: 100vh;padding: 0px'>
    <div style='height:8vh;background: white;'>
      <h3 style="margin:0px;text-align: center;height:100%;padding-top:0.5em">Talk to <span id='#2name'>Scott Stevens<span></h3>
    </div>
    <div>
      <div style='height:80vh;background:yellow;overflow-y:auto;overflow-y: none' class="col-sm-12">

        <div class="row msg_container base_receive">
          <div class="col-md-2 col-xs-2 avatar">
              <img src="http://api.randomuser.me/portraits/men/49.jpg" class=" img-responsive img-circle ">
          </div>
          <div class="col-md-10 col-xs-10">
              <div class="messages msg_receive">
                  <p>that mongodb thing looks good, huh?
                  tiny master db, and huge document store</p>
                  <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
              </div>
          </div>
        </div>

        <div class="row msg_container base_sender">
          <div class="col-md-10 col-xs-10">
              <div class="messages msg_receive" style="text-align: right;">
                  <p >that mongodb thing looks good, huh?
                  tiny master db, and huge document store</p>
                  <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
              </div>
          </div>
          <div class="col-md-2 col-xs-2 avatar">
              <img src="http://api.randomuser.me/portraits/men/49.jpg" class=" img-responsive img-circle ">
          </div>
        </div>

        <div class="row msg_container base_receive">
          <div class="col-md-2 col-xs-2 avatar">
              <img src="http://api.randomuser.me/portraits/men/49.jpg" class=" img-responsive img-circle ">
          </div>
          <div class="col-md-10 col-xs-10">
              <div class="messages msg_receive">
                  <p>that mongodb thing looks good, huh?
                  tiny master db, and huge document store</p>
                  <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
              </div>
          </div>
        </div>

        <div class="row msg_container base_sender">
          <div class="col-md-10 col-xs-10">
              <div class="messages msg_receive" style="text-align: right;">
                  <p >that mongodb thing looks good, huh?
                  tiny master db, and huge document store</p>
                  <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
              </div>
          </div>
          <div class="col-md-2 col-xs-2 avatar">
              <img src="http://api.randomuser.me/portraits/men/49.jpg" class=" img-responsive img-circle ">
          </div>
        </div>

        <div class="row msg_container base_receive">
          <div class="col-md-2 col-xs-2 avatar">
              <img src="http://api.randomuser.me/portraits/men/49.jpg" class=" img-responsive img-circle ">
          </div>
          <div class="col-md-10 col-xs-10">
              <div class="messages msg_receive">
                  <p>that mongodb thing looks good, huh?
                  tiny master db, and huge document store</p>
                  <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
              </div>
          </div>
        </div>

        <div class="row msg_container base_sender">
          <div class="col-md-10 col-xs-10">
              <div class="messages msg_receive" style="text-align: right;">
                  <p >that mongodb thing looks good, huh?
                  tiny master db, and huge document store</p>
                  <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
              </div>
          </div>
          <div class="col-md-2 col-xs-2 avatar">
              <img src="http://api.randomuser.me/portraits/men/49.jpg" class=" img-responsive img-circle ">
          </div>
        </div>

      </div>
      <div>
         <form style='height:12vh;background: red;position:absolute;bottom: 0px;z-index: 10;width: 100%'>
          <div class="form-group" >
            <textarea  style='height:100%;resize: none;display:inline-block;position: absolute;left:0px;width:90%;margin:0px;padding: 0px'></textarea>
            <div class="input-group-btn" style="display: inline-block; background: green;position: absolute;width: 10%;height:12vh;position: absolute;z-index: 10;right: 0px">
              <button class="btn btn-default" type="submit" style="display: inline-block;width: 100%;height:12vh">
              <i class="fa fa-send-o" style="font-size:36px"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div class='col-sm-2' style='background: blue;height: 100vh;padding: 0px'>
    <div style='height:8vh;background: yellow;text-align: center;'>
      <i class="fa fa-comments-o" style="font-size:36px"></i>
    </div>
    <div id='profile' style="height: 30%;background: red">
      <div id='profile-img' style="height: 70%;background: red">
        <img src='https://www.w3schools.com/w3css/img_avatar3.png' class="img-circle" width="100px" height="100px" style="position: relative;left: calc(50% - 50px);top:calc(50% - 50px)">
      </div>
      <div id='profile-n' style="height: 30%;background: green;text-align: center;">
        <h4 style="background: green;margin: 0px;height: 5vh;padding-top:8px">Kirsten McKellar</h4>
        <h5 style="background: Lightgreen;margin: 0px;height: 4vh" >Cape Town RSA</h5>
      </div>
    </div>
    <div id='profile_info'>
      <table style="width: 100%">
        <tr><td>Nickmame:</td><td>Miky Don</td></tr>
        <tr><td>Tel:</td><td>2503200181</td></tr>
        <tr><td>Date of Birth:</td><td>Jul. 12,1988</td></tr>
        <tr><td>Gender:</td><td>Female</td></tr>
        <tr><td>Language:</td><td>English</td></tr>
      </table>
    </div>
  </div>





 <!-- Trigger the modal with a button -->
  <button type="button"  data-toggle="modal" data-target="#myModal">Open Modal</button>

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

            <div  id='addcontacts' style="display: none">
              Add Contact:<input type="text" name="contact" id='contact'>
              <input type="submit" name="addcontact" value="Add" id='add'>
              <p id='hl' style="color: red"></p>
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
  // add contact control
  $('#hl').hide();
  $("#add").click(function(){
    var username=$('#contact').val();
    $("#contact").val("");
    if(username.length>3){
      $.ajax({
        url:'addContacts.php',
        data:{'username':username},
        dataType:'text',
        success:function(data){
          alert(data);
        },
        type:'POST'
      });
    }
    else{
      $('#hl').show();
      $('#hl').html('<strong>Warning: </strong> Invalid username');
    }    
  });
  $('#contact').click(function(){
      $('#hl').hide();
  });
  //end of add contact control
</script>
</html>


