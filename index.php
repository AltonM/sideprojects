<?php
//new Calendar
$user_id = 1;
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Calendar</title>
	<style type="text/css">
	<!--
		body{
			padding:2px 0px 0px;
			margin:0px;
			font-family:sans-serif;
		}
		#cal_holder{
			width:100%;
			min-height:500px;
			min-width:900px;
			max-width:1200px;
			margin:auto;
			border-style:none solid solid none;
			border-width:1px;
			border-color:rgba(200,200,200,1);
			font-size:12px;
		}
		
		.clear{
			clear:both;
			height:0px;
			width:0px;
		}
		
		#cal_tools{
			min-width:900px;
		}
		
		.button{
			background-color:rgba(230,230,230,1);
			padding:7px;
			font-size:12px;
			color:rgba(100,100,100,1);
			min-width:50px;
			float:left;
			border-radius:2px;
			text-align:center;
			cursor:pointer;
			margin-right:10px;
			font-weight:bolder;
			border:solid 1px rgb(170,170,170);
		}
		#month{
			font-size:14px;
		}
		/*table set up*/
		.table{
			width:100%;
			height:100%;
		}
		.table_row{
			
		}
		.table_cell{
			width:180px;
			border-style:solid none none solid;
			border-width:1px;
			border-color:rgba(200,200,200,1);
			margin:0px -1px 0px 0px;
			padding:2px;
			cursor:pointer;
		}
		
		.table_cell:hover{
			/*border:solid 1px rgb(170,170,170);
			margin:0px -1px -1px 0px;
			background-color:rgba(100,100,100,1);*/
		}
		
		.day_number{
			position:absolute;
			top:inherit;
			left:inherit;
			margin:-55px 0px 0px;
			color:rgba(160,160,160,1);
		}
		/*End table set up*/
		
		/*add event*/
		#add_event{
			width:300px;
			min-height:70px;
			padding:10px;
			background-color:rgb(255,255,255);
			position:absolute;
			z-index:5;
			border:solid 1px rgb(180,180,180);
			box-shadow:0px 5px 5px rgb(200,200,200);
		}
		
		.event_task{
			color:rgb(0,0,0);
			font-weight:bold;
			color:blue;
			text-decoration:underline;
		}
		
		.event_task>div{
			margin:0px 0px 10px 0px;
		}
		#pointerDown{
			position:absolute;
			top:inherit;
			left:inherit;
			margin:60px 0px 0px 100px;
			border-style:solid;
			border-color:white transparent transparent;
			border-width:10px;
		}
		
		.close{
			float:right;
			padding:4px;
			font-size:10px;
			font-weight:bolder;
		}
		
		.close:hover{
			
			background-color:rgb(100,100,100);
			color:rgb(220,220,220);
		}
		
		/*end add event*/
	-->
	</style>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript">
		function id(x){
			return document.getElementById(x);
		}
		function clas(x){
			return document.getElementsByClassName(x);
		}
		
		var event = new Array(),task = new Array();
		
		//script to  get the calendar
		var days = new Array();
		days[0] = 'Sunday';
		days[1] = 'Monday';
		days[2] = 'Tuesday';
		days[3] = 'Wednesday';
		days[4] = 'Thursday';
		days[5] = 'Friday';
		days[6] = 'Saturday';
		
		var months = new Array();
		months[0] = 'January';
		months[1] = 'February';
		months[2] = 'March';
		months[3] = 'April';
		months[4] = 'May';
		months[5] = 'June';
		months[6] = 'July';
		months[7] = 'August';
		months[8] = 'September';
		months[9] = 'October';
		months[10] = 'November';
		months[11] = 'December';
		//user view
		var user_view = 'month';
		var d = new Date();
		var curDate = d.getDate();
		var curDay = d.getDay();
		var curMonth = d.getMonth();
		var curYear = d.getFullYear();
		
		function print_calendar(){
			//get the first day of the month
			first_day_of_month = new Date(curYear,curMonth,1).getDay();
			$.get('cal_function.php',{view:user_view,year:curYear,month:curMonth,day:curDay,date:curDate,fday:first_day_of_month},function(data){
				id('cal_holder').innerHTML = data;
			});
		}
		
function next(){
	if(curMonth<12){
		curMonth++;
	}else{
		curMonth = 0;
		curYear++;
	}
	print_calendar();
}

function previous(){
	if(curMonth>0){
		curMonth--;
	}else{
		curMonth = 11;
		curYear--;
	}
	print_calendar();
}
var remove = 'true';
//function to add events
function add_event(x){
	if(x.lastChild.id == 'add_event'&&remove=='true'){
		x.removeChild(x.lastChild);
	}else{
		if(id('add_event')!=null){
			//if there was another element with the id remove it
			id('add_event').parentNode.removeChild(id('add_event').parentNode.lastChild);
		}
			var top = (x.offsetTop>19)?-240:-30;
			var left = (x.offsetLeft>0)?-50:-3;
		
			//add the element
			var div = document.createElement('DIV');
			var event_time = x.childNodes[1].childNodes[1].innerHTML.split('-');
			var day = new Date(event_time[0],event_time[1],event_time[2]).getDay();
			var cont = 
				'<div>'
				+'<div class="close" onclick="close_(this.parentNode.parentNode.parentNode);">X</div>'
				+'<span class="event_task" onclick="switchUp(0);" style="text-decoration:none;color:black;font-weight:normal">Event</span> | <span class="event_task" onclick="switchUp(1);">Task</span></div>'
				+'<div class="event_type" style="display:inline;" type="event">'
					+'<div style="font-weight:bolder;margin:10px 0px;">Add Event</div>'
					+'<div style="margin:5px 0px;">'
						+'When: &nbsp;'+days[day].substr(0,3)+', '+months[event_time[1]]+' '+event_time[2]
					+'</div>'
					+'<div style="margin:5px 0px;">'
						+'What: <input type="text" />'
					+'</div>'
					+'<div style="margin:5px 0px;">'
						+'Description: <br /><textarea cols="25" rows="3"></textarea>'
					+'</div>'
					+'<div>'
						+'<div class="button" style="margin:10px 0px;font-size:12px;" onclick="check_added_event('+x.childNodes[1].childNodes[1].innerHTML+');">Create Event</div>'
					+'</div>'
				+'</div>'
				
				+'<div class="event_type" style="display:none;" type="task">'
					+'<div style="font-weight:bolder;margin:10px 0px;">Add Task</div>'
					+'<div style="margin:5px 0px;">'
						+'Event Name: <input type="text" />'
					+'</div>'
					+'<div style="margin:5px 0px;">'
						+'Due Date: &nbsp;'+days[day].substr(0,3)+', '+months[event_time[1]]+' '+event_time[2]
					+'</div>'
					+'<div style="margin:5px 0px;">'
						+'Note: <br /><textarea cols="25" rows="3"></textarea>'
					+'</div>'
					+'<div style="margin:5px 0px;">'
						+'<div class="button" style="margin:10px 0px 0px;font-size:12px;" onclick="check_added_event('+x.childNodes[1].childNodes[1].innerHTML+');">Create Event</div>'
					+'</div>'
				+'</div>';
			div.innerHTML = cont;
			div.id = 'add_event';
			div.style.marginTop = top+'px';
			div.style.marginLeft = left+'px';
			div.onmouseover = function(){remove = 'false';x.onclick='';}
			div.onmouseout = function(){remove = 'true';x.onclick=function(){add_event(x);}}
			x.appendChild(div);
	}
}

function switchUp(x){
	for(i=0;i<clas('event_type').length;i++){
		clas('event_task')[i].style.color = 'blue';
		clas('event_task')[i].style.textDecoration = 'underline';
		clas('event_task')[i].style.fontWeight = 'bold';
		clas('event_type')[i].style.display = 'none';
	}
	clas('event_task')[x].style.color = 'black';
	clas('event_task')[x].style.textDecoration = 'none';
	clas('event_task')[x].style.fontWeight = 'normal';
	clas('event_type')[x].style.display = 'inline';
}

function close_(x){
	remove = 'true';
	add_event(x);
	x.onclick=function(){remove = 'true';x.onclick=function(){add_event(x);}}
}

function check_added_event(d){
	//check what section is showing to check
	for(i=0;i<clas('event_type').length;i++){
		if(clas('event_type')[i].style.display!='none'){
			break;
		}
	}
	var err = 0,desc = '', name = '',event_date = d;
	
	var err,event_type='',event_des='',event_name='',event_date='';
	//check fo element
	if(i==0){
		//clas('event_type')[i].childNodes
		//description
		if(clas('event_type')[i].childNodes[3].childNodes[2].value==''){
			err++;
			clas('event_type')[i].childNodes[3].childNodes[2].style.border = 'solid 1px red';
			clas('event_type')[i].childNodes[3].childNodes[2].style.backgroundColor = 'pink';
		}else{
			clas('event_type')[i].childNodes[3].childNodes[2].style.border = 'solid 1px rgb(190,190,190)';
			clas('event_type')[i].childNodes[3].childNodes[2].style.backgroundColor = 'inherit';
			event_des = clas('event_type')[i].childNodes[3].childNodes[2].innerHTML
		}
		//event name
		if(clas('event_type')[i].childNodes[2].childNodes[1].value==''){
			err++;
			clas('event_type')[i].childNodes[2].childNodes[1].style.border = 'solid 1px red';
			clas('event_type')[i].childNodes[2].childNodes[1].style.backgroundColor = 'pink';
		}else{
			clas('event_type')[i].childNodes[2].childNodes[1].style.border = 'solid 1px rgb(190,190,190)';
			clas('event_type')[i].childNodes[2].childNodes[1].style.backgroundColor = 'white';
			event_name = clas('event_type')[i].childNodes[3].childNodes[2].innerHTML;
		}
	}else{
		//event name
		if(clas('event_type')[i].childNodes[1].childNodes[1].value==''){
			err++;
			clas('event_type')[i].childNodes[1].childNodes[1].style.border = 'solid 1px red';
			clas('event_type')[i].childNodes[1].childNodes[1].style.backgroundColor = 'pink';
		}else{
			clas('event_type')[i].childNodes[1].childNodes[1].style.border = 'solid 1px rgb(190,190,190)';
			clas('event_type')[i].childNodes[1].childNodes[1].style.backgroundColor = 'white';
		}
		//description
		if(clas('event_type')[i].childNodes[3].childNodes[2].value==''){
			err++;
			clas('event_type')[i].childNodes[3].childNodes[2].style.border = 'solid 1px red';
			clas('event_type')[i].childNodes[3].childNodes[2].style.backgroundColor = 'pink';
			event_name = clas('event_type')[i].childNodes[3].childNodes[2].innerHTML;
		}else{
			clas('event_type')[i].childNodes[3].childNodes[2].style.border = 'solid 1px rgb(190,190,190)';
			clas('event_type')[i].childNodes[3].childNodes[2].style.backgroundColor = 'inherit';
			event_des = clas('event_type')[i].childNodes[3].childNodes[2].innerHTML
		}
		
	}
	
	if(err<1){
		
		if(clas('event_type')[i].getAttribute('type') == 'event'){
			event[event.length] = {"date":event_date,"eventName":event_name,"eventDescription":event_des}
			var di = document.createElement('DIV');
			di.innerHTML = '<div>'+event_name+'</div>';
			clas('event_type')[i].parentNode.parentNode.appendChild(di);
		}else if(clas('event_type')[i].getAttribute('type') == 'task'){
			
		}
	}
}

</script>
</head>
<body>
	<!--new calendar script-->
	<div id="cal_tools">
			<div style="float:left;">Calendar</div>
			<div class="button">Today</div>
			<div class="button" onclick="previous();"><</div>
			<div class="button" onclick="next();">></div>
			<div id="month">March 23 - 29, 2014</div>
			<div class="button" style="float:right">More</div>
			<div class="button" style="float:right">Agenda</div>
			<div class="button" style="float:right">Month</div>
			<div class="button" style="float:right">Week</div>
			<div class="button" style="float:right">Day</div>
			<div class="clear"></div>
	</div>
	<div id="cal_holder">
		<script type="text/javascript">print_calendar();</script>
	</div>
</body>
</html>
