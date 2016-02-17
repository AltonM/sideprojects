<?php
//light pink 220,200,200
//functions for the calendars
	$days = array();
	$days[0] = 'Sunday';
	$days[1] = 'Monday';
	$days[2] = 'Tuesday';
	$days[3] = 'Wednesday';
	$days[4] = 'Thursday';
	$days[5] = 'Friday';
	$days[6] = 'Saturday';
	
function days_of_the_week(){
$days = array();
	$days[0] = 'Sunday';
	$days[1] = 'Monday';
	$days[2] = 'Tuesday';
	$days[3] = 'Wednesday';
	$days[4] = 'Thursday';
	$days[5] = 'Friday';
	$days[6] = 'Saturday';
	$days_of_ = '<tr class="table_row">';
	for($i=0;$i<count($days);$i++){
		$days_of_ .= '<td class="table_cell" style="border:none;">';
			$days_of_ .= substr($days[$i],0,3); 
		$days_of_ .= '</td>';
	}
	$days_of_ .= '</tr>';
	
	//return the full week
	return $days_of_;
}
	
switch($_GET['view']){

	case 'month':
		$year = $_GET['year'];
		$month = $_GET['month']+1;
		$date = $_GET['date'];
		$day = $_GET['day'];
		$first_day_of_month = $_GET['fday'];
		if($first_day_of_month>0){
			if($month-1>0){
				$month--;
			}else{
				$month = 12;
				$year--;
			}
		}
		$date = mktime(0,0,0,$month,1,$year);
		$last_date = date('t',$date);
		$day_ = 0;
		//begin the table
		$month_view = '<table class="table" border="0" cellspacing="0">';
		
		$month_view .= days_of_the_week();
		for($i=($last_date-$first_day_of_month);$i<$last_date;$i++){
			if($day_<1){
				$month_view .= '<tr class="table_row">';
				}
				//echo $days[$day_].' '.date('M',$date).' '.($i+1).' &nbsp;';$style = '';
				$style = '';
				if(($i+1)==date('d')&&$month==date('m')&&$year==date('Y')){
					$style = 'border:solid 1px red;background-color:rgba(180,180,180,1);';
				}else{
					$style = 'background-color:rgba(0,0,0,.1);';
				}
				$month_view .= '<td class="table_cell" style="'.$style.'" onclick="add_event(this);">
					<div class="day_number">';
						if($day_<1){
							$month_view .= date('M',$date).' ';
						}
					$month_view .=($i+1).'<span style="display:none;">'.$year.'-'.($month-1).'-'.($i+1).'</span></div>
				</td>';
				if($day_<6){
					$day_++;
				}else{
					$day_ = 0;
				}
		}
		if($day_>0){
			if($month+1<13){
				$month++;
			}else{
				$month = 1;
				$year++;
			}
		}
		$date = mktime(0,0,0,$month,1,$year);
		for($i=1;$i<=date('t',$date);$i++){
			if($day_<1){
				$month_view .= '<tr class="table_row">';
				}
				//echo $days[$day_].' '.date('M',$date).' '.($i+1).' &nbsp;';
				$style = '';
				if(($i)==date('d')&&$month==date('m')&&$year==date('Y')){
					$style = 'border:solid 1px red;background-color:rgba(240,240,240,1);';
				}else{
					$style = 'background-color:rgba(255,255,255,1);';
				}
				$month_view .= '<td class="table_cell" style="height:120px;'.$style.'" onclick="add_event(this);">
					<div class="day_number">';
						if($i<2){
							$month_view .= date('M',$date).' ';
						}
					$month_view .= ($i).'<span style="display:none;">'.$year.'-'.($month-1).'-'.$i.'</span></div>
				</td>';
				
				if($day_>5){
					$month_view .= '</tr>';
				}

				if($day_<6){
					$day_++;
				}else{
					$day_ = 0;
				}
		}
		
		if($month+1<13){
			$month++;
		}else{
			$month = 1;
			$year++;
		}
		
		$date = mktime(0,0,0,$month,1,$year);
		$end_week = 1;
		for($i=$day_;$i<7;$i++){
			if($day_<1){
					$month_view .= '<tr class="table_row">';
					}
				$style = '';
				if($end_week==date('d')&&$month==date('m')&&$year==date('Y')){
					$style = 'border:solid 1px red;';
				}
				$month_view .= '<td class="table_cell" style="background-color:rgba(0,0,0,.1);height:120px;'.$style.'" onclick="add_event(this);">
					<div class="day_number">';
						if($end_week<2){
								$month_view .= date('M',$date).' ';
							}
				$month_view .= ($end_week).'<span style="display:none;">'.$year.'-'.($month-1).'-'.$end_week.'</span></div>
				</td>';
				$end_week++;
				$day_++;
			if($day_>6){
				$month_view .= '</tr>';
			}
		}
		//end the table
		$month_view .= '</table><div class="clear"></div>';
		echo $month_view;
	break;


	
case 'add_event':

	break;

}

?>
