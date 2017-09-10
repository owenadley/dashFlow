function showSignIn() {
  document.getElementById('signin-display').style.visibility = "visible";
}

function closeSignIn() {
  document.getElementById('signin-display').style.visibility = "hidden";
}

function showRegisterForm() {
  document.getElementById('signup-form').style.display = "block";
  document.getElementById('signin-form').style.display = "none";
}

function showSigninForm() {
  document.getElementById('signup-form').style.display = "none";
  document.getElementById('signin-form').style.display = "block";

}
$(".rotate").click(function () {
  $(this).toggleClass("down");
});
$(".paintrotate").click(function () {
  $(this).toggleClass("up");
});
$(".closePopUp").click(function () {
  $("#addToDoIcon").toggleClass("down");
});
function addToDoDown() {
  document.getElementById('addToDoIcon').classList.toggle('down');
}
$(".closePopUp2").click(function () {
  $("#addSMAccIcon").toggleClass("down");
});
$(".closePopUp3").click(function () {
  $("#addEventNewIco").toggleClass("down");
});

$(".pickSiteCategory").change(function () {
  $(this).closest('label').toggleClass('tohighlight');

});

var bgNightArray = ['https://www.tentoesdwn.com/img/bg_night/1.jpg', 'https://www.tentoesdwn.com/img/bg_night/2.jpg', 'https://www.tentoesdwn.com/img/bg_night/3.jpg', 'https://www.tentoesdwn.com/img/bg_night/4.jpg', 'https://www.tentoesdwn.com/img/bg_night/5.jpg', 'https://www.tentoesdwn.com/img/bg_night/6.jpg', 'https://www.tentoesdwn.com/img/bg_night/7.jpg', 'https://www.tentoesdwn.com/img/bg_night/8.jpg', 'https://www.tentoesdwn.com/img/bg_night/0.jpg', 'https://www.tentoesdwn.com/img/bg_night/9.jpg', 'https://www.tentoesdwn.com/img/bg_night/10.jpg',
'https://www.tentoesdwn.com/img/bg_night/11.jpg'];
var bgMornArray = ['https://www.tentoesdwn.com/img/bg_morn/1.jpg', 'https://www.tentoesdwn.com/img/bg_morn/2.jpg', 'https://www.tentoesdwn.com/img/bg_morn/3.jpg', 'https://www.tentoesdwn.com/img/bg_morn/4.jpg', 'https://www.tentoesdwn.com/img/bg_morn/5.jpg', 'https://www.tentoesdwn.com/img/bg_morn/0.jpg', 'https://www.tentoesdwn.com/img/bg_morn/6.jpg', 'https://www.tentoesdwn.com/img/bg_morn/7.jpg', 'https://www.tentoesdwn.com/img/bg_morn/8.jpg', 'https://www.tentoesdwn.com/img/bg_morn/9.jpg', 'https://www.tentoesdwn.com/img/bg_morn/10.jpg', 'https://www.tentoesdwn.com/img/bg_morn/11.jpg', 'https://www.tentoesdwn.com/img/bg_morn/12.jpg', 'https://www.tentoesdwn.com/img/bg_morn/13.jpg', 'https://www.tentoesdwn.com/img/bg_morn/14.jpg',
'https://www.tentoesdwn.com/img/bg_morn/15.jpg', 'https://www.tentoesdwn.com/img/bg_morn/16.jpg', 'https://www.tentoesdwn.com/img/bg_morn/17.jpg', 'https://www.tentoesdwn.com/img/bg_morn/18.jpg'];
var bgDayArray = ['https://www.tentoesdwn.com/img/bg_day/0.jpg', 'https://www.tentoesdwn.com/img/bg_day/1.jpg', 'https://www.tentoesdwn.com/img/bg_day/2.jpg', 'https://www.tentoesdwn.com/img/bg_day/3.jpg', 'https://www.tentoesdwn.com/img/bg_day/4.jpg', 'https://www.tentoesdwn.com/img/bg_day/5.jpg', 'https://www.tentoesdwn.com/img/bg_day/6.jpg', 'https://www.tentoesdwn.com/img/bg_day/7.jpg', 'https://www.tentoesdwn.com/img/bg_day/8.jpg', 'https://www.tentoesdwn.com/img/bg_day/9.jpg', 'https://www.tentoesdwn.com/img/bg_day/10.jpg', 'https://www.tentoesdwn.com/img/bg_day/11.jpg', 'https://www.tentoesdwn.com/img/bg_day/12.jpg', 'https://www.tentoesdwn.com/img/bg_day/13.jpg', 'https://www.tentoesdwn.com/img/bg_day/14.jpg',
'https://www.tentoesdwn.com/img/bg_day/15.jpg', 
'https://www.tentoesdwn.com/img/bg_day/16.jpg', 
'https://www.tentoesdwn.com/img/bg_day/17.jpg'];

var currHour = (new Date()).getHours();
if (currHour <= "11") {
  randomCount = Math.floor(Math.random() * bgMornArray.length);
  $('#theGodlyBody').css({
    'background': 'url(img/bg_morn/' + randomCount + '.jpg)',
    'background-repeat': 'no-repeat',
    'background-size': '100% 100%'
  });
} else if (currHour > "11" && currHour <= "18") {
  randomCount = Math.floor(Math.random() * bgDayArray.length);
  $('#theGodlyBody').css({
    'background': 'url(img/bg_day/' + randomCount + '.jpg)',
    'background-repeat': 'no-repeat',
    'background-size': '100% 100%'
  });
} else if (currHour > "18") {
  randomCount = Math.floor(Math.random() * bgNightArray.length);
  $('#theGodlyBody').css({
    'background': 'url(img/bg_night/' + randomCount + '.jpg)',
    'background-repeat': 'no-repeat',
    'background-size': '100% 100%'
  });
}



function changeBackground() {
  var currHour = (new Date()).getHours();
  if (currHour <= "11") {
    randomCount = Math.floor(Math.random() * bgMornArray.length);
    $('#theGodlyBody').css({
      'background': 'url(img/bg_morn/' + randomCount + '.jpg)',
      'background-repeat': 'no-repeat',
      'background-size': '100% 100%'
    }).fadeTo('slow', 1);
  } else if (currHour > "11" && currHour <= "18") {
    randomCount = Math.floor(Math.random() * bgDayArray.length);
    $('#theGodlyBody').css({
      'background': 'url(img/bg_day/' + randomCount + '.jpg)',
      'background-repeat': 'no-repeat',
      'background-size': '100% 100%'
    }).fadeTo('slow', 1);
  } else if (currHour > "18") {
    randomCount = Math.floor(Math.random() * bgNightArray.length);
    $('#theGodlyBody').css({
      'background-image': 'url(img/bg_night/' + randomCount + '.jpg)',
      'background-repeat': 'no-repeat',
      'background-size': '100% 100%'
    }).fadeIn(1000);

  }
}


$("#sgs1").click(function () {
  $('input.create-newsite-input').val('www.twitter.com');
});
$("#sgs2").click(function () {
  $('input.create-newsite-input').val('www.facebook.com');
});
$("#sgs3").click(function () {
  $('input.create-newsite-input').val('www.instagram.com');
});
$("#sgs4").click(function () {
  $('input.create-newsite-input').val('www.amazon.com');
});
$("#sgs5").click(function () {
  $('input.create-newsite-input').val('www.reddit.com');
});
$("#sgs6").click(function () {
  $('input.create-newsite-input').val('www.stackoverflow.com');
});


function showViewScheduledEvents() {
  var scheduled = document.getElementById('scheduledEWrap');
  scheduled.classList.toggle('show');

  var weekly = document.getElementById('weeklyEWrap');
  if (weekly.classList.contains('show')) {
    weekly.classList.remove('show');
  }

  var colorBox1 = document.getElementById('event-weeklyEvent1');
  if (colorBox1.classList.contains('selectedEventBox')) {
    colorBox1.classList.remove('selectedEventBox');
  }
  var colorBox1 = document.getElementById('event-specificEvent1');
  colorBox1.classList.toggle('selectedEventBox');
}

function showViewWeeklyEvents() {
  var weekly = document.getElementById('weeklyEWrap');
  weekly.classList.toggle('show');

  var scheduled = document.getElementById('scheduledEWrap');
  if (scheduled.classList.contains('show')) {
    scheduled.classList.remove('show');

  }

  var colorBox1 = document.getElementById('event-specificEvent1');
  if (colorBox1.classList.contains('selectedEventBox')) {
    colorBox1.classList.remove('selectedEventBox');
  }
  var colorBox1 = document.getElementById('event-weeklyEvent1');
  colorBox1.classList.toggle('selectedEventBox');

}

function delSitesForm() {
  var favSites = document.getElementById('myFavSites');
  favSites.classList.toggle('show');
  var delSF = document.getElementById('delSitesForm');
  delSF.classList.toggle('show');
  var changeTxt = document.getElementById('delSites');
  changeTxt.classList.toggle('cancel');
}


function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);

  var nday = today.getDay(),
    nmonth = today.getMonth(),
    ndate = today.getDate();
  var tday = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
  var tmonth = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

  document.getElementById('clockbox').innerHTML = "" + tday[nday] + ", " + tmonth[nmonth] + " " + ndate + "";
  document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}


function checkTime(i) {
  if (i < 10) {
    i = "0" + i
  }; // add zero in front of numbers < 10
  return i;
}

function showcolorpicker() {
  document.getElementById('color-picker5').style.display = "block";
  document.getElementById('change-colorb').style.display = "block";
}

function hidecolorpicker() {
  document.getElementById('color-picker5').style.display = "none";
  document.getElementById('change-colorb').style.display = "none";
}

function showMySites() {
  document.getElementById('mydash-sites').style.display = "block";
  document.getElementById('mydash-home').style.display = "none";
}

function showMyHome() {
  document.getElementById('mydash-home').style.display = "block";
  document.getElementById('mydash-sites').style.display = "none";
}

function showAddSiteOptions() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}

function addNewSiteCategory() {
  document.getElementById("createNewCategory").style.display = "block";
  document.getElementById("mysetcategories").style.display = "none";
}

function showAddToDo() {
  var popup = document.getElementById("addToDoWrapper");
  popup.classList.toggle("show");
}


function showaddsocialmedia() {
  var popup = document.getElementById("addSocialMediaAcc");
  popup.classList.toggle("show");
  
}

function showNewEventf() {
  var popup = document.getElementById("showNewEvent");
  popup.classList.toggle("show");
}

function showSettings() {
  var popup = document.getElementById("settingsWrapper");
  popup.classList.toggle("show");
}

function closeSettings() {
  var popup = document.getElementById("settingsWrapper");
  popup.classList.toggle("show");
}

function showSchedulemon() {
  document.getElementById("monSchedule").style.display = "block";
}

function raiseWeeklyEvents() {
  var showSchedule = document.getElementById("weeklyScheduleWrap");
  showSchedule.classList.toggle("showSchedule");
}

function raiseallevents() {
  var showEvents = document.getElementById('every-event');
  showEvents.classList.toggle("showAllEvents");
  var showSchedule = document.getElementById("weeklyScheduleWrap");
  showSchedule.classList.toggle("showSchedule");
}

function closeallevents() {
  var showEvents = document.getElementById('every-event');
  showEvents.classList.toggle("showAllEvents");
}

function showColorSelect() {
  var showColor = document.getElementById("colorSelectorWrap");
  showColor.classList.toggle("showColorBox");
}

function changecol1() {


  var eventsToColor = document.getElementsByClassName("todoTodayWrap");

  for (var i = 0; i < eventsToColor.length; i++) {
    eventsToColor[i].style.borderColor = "#4986E7";
  }
  document.getElementById('front').style.backgroundColor = "#4986E7";

}

function changecol2() {

  var eventsToColor = document.getElementsByClassName("todoTodayWrap");

  for (var i = 0; i < eventsToColor.length; i++) {
    eventsToColor[i].style.borderColor = "#5484ED";

  }
  document.getElementById('front').style.backgroundColor = "#5484ED";

}

function changecol3() {

  var eventsToColor = document.getElementsByClassName("todoTodayWrap");

  for (var i = 0; i < eventsToColor.length; i++) {
    eventsToColor[i].style.borderColor = "#A4BDFC";
  }
  document.getElementById('front').style.backgroundColor = "#A4BDFC";

}

function changecol4() {

  var eventsToColor = document.getElementsByClassName("todoTodayWrap");

  for (var i = 0; i < eventsToColor.length; i++) {
    eventsToColor[i].style.borderColor = "#46D6DB";
  }
  document.getElementById('front').style.backgroundColor = "#46D6DB";

}

function changecol5() {

  var eventsToColor = document.getElementsByClassName("todoTodayWrap");

  for (var i = 0; i < eventsToColor.length; i++) {
    eventsToColor[i].style.borderColor = "#7AE7BF";
  }
  document.getElementById('front').style.backgroundColor = "#7AE7BF";

}

function changecol6() {

  var eventsToColor = document.getElementsByClassName("todoTodayWrap");

  for (var i = 0; i < eventsToColor.length; i++) {
    eventsToColor[i].style.borderColor = "#51B749";
  }
  document.getElementById('front').style.backgroundColor = "#51B749";

}

function changecol7() {

  var eventsToColor = document.getElementsByClassName("todoTodayWrap");

  for (var i = 0; i < eventsToColor.length; i++) {
    eventsToColor[i].style.borderColor = "#FBD75B";
  }
  document.getElementById('front').style.backgroundColor = "#FBD75B";

}

function changecol8() {

  var eventsToColor = document.getElementsByClassName("todoTodayWrap");

  for (var i = 0; i < eventsToColor.length; i++) {
    eventsToColor[i].style.borderColor = "#FFB878";
  }
  document.getElementById('front').style.backgroundColor = "#FFB878";

}

function changecol9() {

  var eventsToColor = document.getElementsByClassName("todoTodayWrap");

  for (var i = 0; i < eventsToColor.length; i++) {
    eventsToColor[i].style.borderColor = "#FF887C";
  }
  document.getElementById('front').style.backgroundColor = "#FF887C";

}

function changecol10() {

  var eventsToColor = document.getElementsByClassName("todoTodayWrap");

  for (var i = 0; i < eventsToColor.length; i++) {
    eventsToColor[i].style.borderColor = "#DC2127";
  }
  document.getElementById('front').style.backgroundColor = "#DC2127";

}

function changecol11() {

  var eventsToColor = document.getElementsByClassName("todoTodayWrap");

  for (var i = 0; i < eventsToColor.length; i++) {
    eventsToColor[i].style.borderColor = "#DBADFF";
  }
  document.getElementById('front').style.backgroundColor = "#DBADFF";

}

function changecol12() {

  var eventsToColor = document.getElementsByClassName("todoTodayWrap");

  for (var i = 0; i < eventsToColor.length; i++) {
    eventsToColor[i].style.borderColor = "#E1E1E1";
  }
  document.getElementById('front').style.backgroundColor = "#E1E1E1";

}

function selectDateEvent() {

  var selectDate = document.getElementById('timeanddaybox');
  var colorBox1 = document.getElementById('event-weeklyEvent');
  if (selectDate.classList.contains('showtimeanddatebox')) {
    selectDate.classList.remove('showtimeanddatebox');
  }
  if (colorBox1.classList.contains('selectedEventBox')) {
    colorBox1.classList.remove('selectedEventBox');
  }

  var selectDate = document.getElementById('dateandtimebox');
  var colorBox = document.getElementById('event-specificEvent');
  selectDate.classList.toggle('showdateandtimebox');
  colorBox.classList.toggle('selectedEventBox');

}

function selectWeeklyEvent() {

  var selectDate = document.getElementById('dateandtimebox');
  var colorBox1 = document.getElementById('event-specificEvent');
  if (selectDate.classList.contains('showdateandtimebox')) {
    selectDate.classList.remove('showdateandtimebox');
  }
  if (colorBox1.classList.contains('selectedEventBox')) {
    colorBox1.classList.remove('selectedEventBox');
  }

  var selectDate = document.getElementById('timeanddaybox');
  var colorBox = document.getElementById('event-weeklyEvent');
  selectDate.classList.toggle('showtimeanddatebox');
  colorBox.classList.toggle('selectedEventBox');
}

$(document).ready(function () {
  $('input.timepicker2').timepicker({});
});

$(document).ready(function () {
  // Datepicker Popups calender to Choose date.
  $(function () {
    $("#datepicker").datepicker();
    // Pass the user selected date format.
    $("#format").change(function () {
      $("#datepicker").datepicker("option", "dateFormat", $(this).val());
    });
  });
});
//webshim.activeLang('en');
//webshims.polyfill('forms');
//webshims.cfg.no$Switch = true;


function createNewToDo(event) {
  event.preventDefault(); // using this page stop being refreshing 
  var check = document.forms["newTDF"]["todo"].value;
  if (check != '') {
    var todo;
    $.ajax({
      type: 'POST',
      url: 'create-todo.php',
      data: $('#newtodoform').serialize(),
      success: function (data) {

        if ($('#rb2').is(':checked')) {
          todo = "todo-gen";
        } else if  ($('#rb1').is(':checked')) {
          todo = "todo-imp"; 
        }
        //alert(todo);

       showAddToDo();  

        
        $("#addToDoIcon").toggleClass("down");
        $("#"+todo).prepend(data);
        //alert(data);
      }
    }); 
  } else {
    //addToDoDown();
  }
}

function validateNewSite(e) {
  e.preventDefault(); // using this page stop being refreshing
  var check = document.forms["newSITEF"]["url"].value;
  if (check != '') {
    var url = document.getElementById('newSiteUrl').value;
    $.ajax({ 
      type: 'POST',
      url: 'create-newsite.php',   
      data: { url: url },
      success: function (data) {
        showaddsocialmedia();
        $("#addSMAccIcon").toggleClass("down");
        $('#myFavSites').empty();
      //  alert(data);
        $('#myFavSites').append(data);
        ajaxUpdateEditSites(event); 
      }  
    }); 
  }
 
  
}

function validateNewEvent() {
  
  var check = document.forms["newEVENTF"]["name"].value;
  if (check == '') {
    return false; 
  }
  var check2 = document.forms["newEVENTF"]
  ["selecteddate"].value;
  var check3 = document.forms["newEVENTF"]
  ["day"].value; 
  if (check2 == 'Pick A Date' && check3 == '') {
    return false;
  }
}

function clrTDName() {
  document.getElementById('newToDoTitle').value = '';
} 
function clrNSName() {
  document.getElementById('newSiteUrl').value = '';
} 
function ajaxAddToDo() {
  event.preventDefault(); // using this page stop being refreshing 
  var todo;
  $.ajax({
    type: 'POST',
    url: 'create-todo.php',
    data: $('#newtodoform').serialize(),
    success: function (data) {
      showAddToDo();

      if ($('#rb2').is(':checked')) {
        todo = '#todo-gen';
      } else if  ($('#rb1').is(':checked')) {
        todo = '#todo-imp'; 
      }
      
      $(todo).prepend(data);
    }
  }); 
}

function ajaxDelToDo(id) {
  event.preventDefault(); // using this page stop being refreshing 
  $.ajax({ 
    type: 'POST',
    url: 'del-todo.php',   
    data: { todoidn: id },
    success: function (data) {
      var todo = 'todo-'+id+'';
      document.getElementById(todo).style.display = "none";
    }
  });  
}

function ajaxUpdateEditSites(event) {
  event.preventDefault(); // using this page stop being refreshing
  $.ajax({ 
    type: 'GET',
    url: 'getNewSites.php',   
    success: function (data) {
      $('#delIconSitesChild').empty();
      $('#delIconSitesChild').append(data);
    }  
  });  
}

function ajaxDelSite(event) {
  event.preventDefault(); // using this page stop being refreshing
  var children = $('#delIconSitesChild').children();
  var childrenNI = $('#delnoIconSitesChild').children();

  var array = new Array();
  var todelI = new Array();
  var todelNI = new Array();
  
  $('#delIconSitesChild').find('input:checkbox').each(function() {
      if($(this).prop('checked')) {
      //  alert($(this).attr('value'));
        array.push($(this).attr('value'));  
        todelI.push($(this).attr('value'));  
      }
    });
  $('#delnoIconSitesChild').find('input:checkbox').each(function() {
      if($(this).prop('checked')) {
      //  alert($(this).attr('value'));
        array.push($(this).attr('value'));  
        todelNI.push($(this).attr('value'));  
      }
    });
  
  $.ajax({ 
    type: 'POST',
    url: 'deleteSites.php',   
    data: { sites: array },
    success: function (data) {
      for (var i=0; i<todelI.length; i++) {
        var d = 'iconFoundSites'.concat(todelI[i]);
        var e = 'iconF'.concat(todelI[i]);
        document.getElementById(d).style.display = "none";
        document.getElementById(e).style.display = "none";
      }
      for (var i=0; i<todelNI.length; i++) {
        var d = 'noiconFoundSites'.concat(todelNI[i]);
        var e = 'iconNF'.concat(todelNI[i]);
        document.getElementById(d).style.display = "none";
        document.getElementById(e).style.display = "none";
      }
    }  
  });   
}

function ajaxdelEvent(id) {
  event.preventDefault(); // using this page stop being refreshing 
  $.ajax({ 
    type: 'POST',
    url: 'del-event.php',   
    data: { eventDel: id },
    success: function (data) {
      var event = 'event-'+id+'';
      document.getElementById(event).style.display = "none";
    }
  });  
}
//paste this code under the head tag or in a separate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});