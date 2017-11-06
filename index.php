<!DOCTYPE html>
<html>
<head>
  <?php
    include ('classes/Login.php');
    if(!Login::isLoggedin()){
      header('Location:login.html');
    }
  ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0 , maximum-scale=1.0, user-scalable=0">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src='js/list-controller.js'></script>
  <script type="text/javascript" src='js/notification.js'></script>

  <title>Quick Chat</title>
  <link rel="stylesheet" type="text/css" href="css/chatting.css">
  </head>
<body>
  <!--Support for moible-->
  <div id='header-container'>

    <div id='home' class='menu-item header-menu' >
      <i class="fa fa-navicon" style="font-size:36px;width: 40px;height: 40px;text-align: center;"></i>
    </div>
    <div class="header-menu search-bar">
          <input type="text" class="form-control" placeholder="Search" id="search1">
          <span id='group_chating_name' class='chat_to_groupname'>Testing Group My</span>
    </div>
  </div>

            <div class="btn-group-vertical user_options" >
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal1" id='changeprofile'>Change Profile Image</button>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal4" id='resetpassword'>Reset Password</button>
                <button type="button" class="btn btn-default" id='signoutall'>Sign Out All Devices</button>
             </div>

  <div id='menu-container'>
    <!--Menu bar container-->
    <div id='menu-bar' class='menu-item'>
      <div style='width: 50px;text-align: center;display: inline-block;' id='menu-items'>
          <i class="fa fa-cog" style="width: 100%" id='setting' class='menu'></i>
        <hr>

        <i class="fa fa-sign-out" title="Sign Out" id='signout'></i>
        <hr>
        <i class="fa fa-sitemap" title="Create Group" id='creategroup' data-toggle="modal" ></i>
        <hr>
        <i class="fa fa-plus-circle" title='Add Group' id='addgroup' data-toggle="modal" ></i>
        <hr>
        <i class="fa fa-search" title='Look up user info' id='lookupusers' data-toggle="modal" ></i>
        <hr>
        <i class="fa fa-chain-broken" title='Leave a group' id='leavegroup' data-toggle="modal"></i>
        <hr>
        <i class="fa fa-close" title='Close' id='close'></i>
      </div>
    </div>
    <!--Menu bar end-->

    <!--Group container-->
    <div id='groupnames_m' class="groupnames">
      <div id='groupsearch'>
        <input type="text" class="form-control" placeholder="Search" id="search2">
      </div>
       <ul class="list-group" id="groups-list2" style="background:white;">
            <!--Where group names goes-->
           <!--  <li class='list-group-item' style='padding: 3px'>
                <div class='col-xs-4' >
                    <img  src='http://www.agrostis.cz/data/gallery_53/326-kvetnate-louky-vilik.jpg'  style='display:block;height: 8vh;width: 8vh' />
                </div>
                <div class='col-xs-8 ' style='height: 8vh;text-align: left;'>
                  <h4 style='overflow-x: auto;padding: 0px;margin: 0px;position: relative;height: 8vh;width: 100%;text-align: center;display: table-cell;vertical-align: middle;font-size: 2.7vh'>Testing Group</h4>
                </div>
                <div class='clearfix'></div>
            </li>
             -->
      </ul>
    </div>
    <!--Group container end -->
  </div>

  <div id='groups-container' class="groupnames">
    <!--Group container-->
      <ul class="list-group" id="groups-list1" style="background:white;">
            <!--Where group names goes-->
      </ul>
    <!--Group container end -->
  </div>
  
  <!--Chatting container-->
  <div id='chatting_container'>
    <div id='chat_to' class='chat_to_groupname'>Testing</div>
    <div id='message-holder' style="display: none"></div>
    <div id='message_display'>
      <!--message-->
    </div>
    <div id='sendmessage_control'>
      <textarea  style='height:100%;resize: none;display:inline-block;width:90%;margin:0px;padding: 0px' id='message'></textarea>
      <button class="btn btn-default"  style="width:10%;height: 10%;margin:0px;padding: 0px;position: absolute;display: inline-block;" id='sendmessage-btn'><i class="fa fa-send-o" style="font-size:1.5em;"></i>
      </button>
    </div>
  </div>

<!--Change profile image modal window-->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Profile Image</h4>
        </div>
        <div class="modal-body" style="text-align: center;">
          <h5>Enter URL to Your Image</h5>
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Image URL" id='url'>
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit" id='url_submit'>
                <i class="glyphicon glyphicon-ok-sign"></i>
              </button>
            </div>
          </div>

          <div style="color: red;display: none" id='changeprofileimage-error'>
            <span class="glyphicon glyphicon-remove-sign"></span>
            <span id='changeprofileimage-error-indicator'></span>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!--Change password modal window-->
<div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Password</h4>
        </div>
        <div class="modal-body" style="text-align: center;margin: auto;" >
          <div class="form-group">
            
<!--             <div class="form-group has-error has-feedback">
 -->        <input class="form-control" id="oldpass" type="password" placeholder="Old Password">
            <!--   <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            </div> -->

<!--             <div class="form-group has-success has-feedback">
 -->        <input class="form-control" id="newpass" type="password" placeholder="New Password">
             <!--  <span class="glyphicon glyphicon-ok form-control-feedback"></span>
            </div> -->

            <!-- <div class="form-group has-success has-feedback"> -->
            <input class="form-control" id="confirmpass" type="password" placeholder="Confirm Password">
             <!--  <span class="glyphicon glyphicon-ok form-control-feedback"></span>
            </div> -->

            <input type="submit" class='btn btn-default' id="changepassword" value="Confirm" >
          </div>

           <div style="color: red;display: none" id='changepass-error'>
            <span class="glyphicon glyphicon-remove-sign"></span>
            <span id='changepass-error-indicator'></span>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
          <h4 class="modal-title">User Lookup</h4>
        </div>
        <div class="modal-body" style="text-align: center;">
          <div id='profile_info'>
            <!--table for user info-->
          </div>
          <div class="input-group">
            <input type="text" class="form-control" placeholder="User Name" id='lookup-username'>
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit" id='lookup-username-btn'>
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </div>

          <div style="color: red;display: none" id='userlookup-error'>
            <span class="glyphicon glyphicon-remove-sign"></span>
            <span id='userlookup-error-indicator'>Forbidden</span>
          </div>

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
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Group Name" id='leavegroup-name'>
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit" id='leavegroup-btn'>
                <i class="glyphicon glyphicon-ok-sign"></i>
              </button>
            </div>
          </div>

          <div style="color: red;display: none" id='leavegroup-error'>
            <span class="glyphicon glyphicon-remove-sign"></span>
            <span id='leavegroup-error-indicator'>Forbidden</span>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!--Create group modal window-->
  <div class="modal fade" id="myModal5" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Group</h4>
        </div>
        <div class="modal-body" style="text-align: center;">
          <h5>Enter Group Name to Create a Group</h5>
          <!--Only allow user to look up other user info if they are in the same group-->
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Group Name" id='create-groupname'>
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit" id='create'>
                <i class="glyphicon glyphicon-ok-sign"></i>
              </button>
            </div>
          </div>

           <div style="color: red;display: none" id='creategroup-error'>
            <span class="glyphicon glyphicon-remove-sign"></span>
            <span id='creategroup-error-indicator'></span>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!--Add a group modal window-->
  <div class="modal fade" id="myModal6" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Group</h4>
        </div>
        <div class="modal-body" style="text-align: center;">
          <h5>Enter Group Name to Add the Group</h5>
          <!--Only allow user to look up other user info if they are in the same group-->
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Group Name" id='add-groupname'>
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit" id='add-group'>
                <i class="glyphicon glyphicon-ok-sign"></i>
              </button>
            </div>
          </div>
          <div style="color: red;display: none" id='groupname-search-error'>
            <span class="glyphicon glyphicon-remove-sign"></span>
            <span>Group Was not Found</span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</body>
<script type="text/javascript" src='js/interact.js'></script>
<script type="text/javascript" src='js/chatmenu.js'></script>

</html>


