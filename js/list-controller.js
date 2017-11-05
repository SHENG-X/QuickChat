$.ajax({
        url:'insertgroup.php',
        dataType:'text',
        success:function(data){
          if(data!=''){
          var groups=[];
          groups=data.split(',');
          grouplength=groups.length;
          for(i=0;i<grouplength;i++){
            var groupname1="<li class='list-group-item' style='padding: 3px' onclick='message(this)' id='group"+i+"'><div class='col-xs-4' ><img  src='http://i0.kym-cdn.com/entries/icons/original/000/021/364/Google_Allo_App_Logo.png' style='display:block;height: 8vh;width: 8vh'></div><div class='col-xs-8 ' style='height: 8vh;'><h4 style='overflow-x: auto;margin: auto;position: relative;height: 8vh;font-size: 4vh;top:2vh;'>%data%</h4></div><div class='clearfix'></div></li>";
            var groupname2="<li class='list-group-item' style='padding: 3px' onclick='message(this)' id='group"+i+"'><div class='col-xs-4' ><img  src='http://i0.kym-cdn.com/entries/icons/original/000/021/364/Google_Allo_App_Logo.png'  style='display:block;height: 8vh;width: 8vh' /></div><div class='col-xs-8 ' style='height: 8vh;text-align: left;'><h4 style='overflow-x: auto;padding: 0px;margin: 0px;position: relative;height: 8vh;width: 100%;text-align: center;display: table-cell;vertical-align: middle;font-size: 2.7vh;overflow-x:auto'>%data%</h4></div><div class='clearfix'></div></li>";
            groupname1=groupname1.replace('%data%',groups[i]);
            groupname2=groupname2.replace('%data%',groups[i]);

            $("#groups-list1").append(groupname1);
            $("#groups-list2").append(groupname2);
          }
          }
        }
      });