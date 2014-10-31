<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>假期查询表</title>
<link rel="stylesheet" href="css/pure-min.css">
<script language="javascript" type="text/javascript" src="js/index.js"></script>
</head>
<body>

<form class="pure-form">
    <fieldset>
		<!--
        <legend>查询时间<span style="float:right">Technical-Support by DIS@GZ</span></legend>

        <input id="aligned-name" type="text" placeholder="放假日期">
        <select id="multi-state" class="pure-input-1-6">
                    <option>年假</option>
                    <option>病假</option>
                </select>
        
        <button type="submit" class="pure-button pure-button-primary">Sign in</button>-->
		<select id="alldays" class="pure-input-1-6" name="alldays" onChange="changeAllDays()">
			<option>總年假日數</option>
			<option value="5">5</option>
			<option value="10">10</option>
			<option value="15">15</option>
        </select>
    </fieldset>
</form>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="pure-table pure-table-horizontal">
  <tr class="pure-table-odd">
    <td>日數</td>
    <td>1</td>
    <td>2</td>
    <td>3</td>
    <td>4</td>
    <td>5</td>
    <td>6</td>
    <td>7</td>
    <td>8</td>
    <td>9</td>
    <td>10</td>
    <td>11</td>
    <td>12</td>
    <td>13</td>
    <td>14</td>
    <td>15</td>
    <td>16</td>
    <td>17</td>
    <td>18</td>
    <td>19</td>
    <td>20</td>
    <td>21</td>
    <td>22</td>
    <td>23</td>
    <td>24</td>
    <td>25</td>
    <td>26</td>
    <td>27</td>
    <td>28</td>
    <td>29</td>
    <td>30</td>
    <td>31</td>
  </tr>
<?php
	if($_GET['alldays']>0)
		$allDays = $_GET['alldays'];
	else
		$allDays = 5;

	$monthFirstDayArray = array(1,32,63,94,125,156,187,218,249,280,311,342);
	for($dayIndex=1,$i=1;$i<=372;$i++){
		if(in_array($i, $monthFirstDayArray)) {
				echo '<tr><td>'.(array_search($i,$monthFirstDayArray)+1).'月</td>';
		}
		if($i==60||$i==61||$i==62||$i==124||$i==186||$i==279||$i==341) {
			echo '<td>&nbsp;</td>';
		} else {
			if($dayIndex==date('z')+1)
				echo '<td class="on">';
			else
				echo '<td>';
			$percentageHour = $dayIndex/365*$allDays*8;
			$hour = floor($percentageHour);
			$day = floor(($percentageHour - $percentageHour%8)/8);		
			$percentageDay = $percentageHour%8;
			if($percentageDay<1)
				$dayType = 0;
			elseif($percentageDay>=1&&$percentageDay<3)
				$dayType = 1;
			elseif($percentageDay>=3&&$percentageDay<5)
				$dayType = 2;
			elseif($percentageDay>=5&&$percentageDay<8)
				$dayType = 3;
			else
				$dayType = 4;
			if($dayType==0)
			echo $day;
		elseif($dayType==1)
			echo $day.'+AM';
		elseif($dayType==2)
			echo $day.'+PM';
		elseif($dayType==3)
			echo ($day+1);
			echo '</td>';
			$dayIndex++;
		}
	}
?>
</table>
<br><br>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="pure-table pure-table-horizontal">
  <tr class="pure-table-odd">
    <td>小時</td>
    <td>1</td>
    <td>2</td>
    <td>3</td>
    <td>4</td>
    <td>5</td>
    <td>6</td>
    <td>7</td>
    <td>8</td>
    <td>9</td>
    <td>10</td>
    <td>11</td>
    <td>12</td>
    <td>13</td>
    <td>14</td>
    <td>15</td>
    <td>16</td>
    <td>17</td>
    <td>18</td>
    <td>19</td>
    <td>20</td>
    <td>21</td>
    <td>22</td>
    <td>23</td>
    <td>24</td>
    <td>25</td>
    <td>26</td>
    <td>27</td>
    <td>28</td>
    <td>29</td>
    <td>30</td>
    <td>31</td>
  </tr>
<?php
	for($dayIndex=1,$i=1;$i<=372;$i++){
		if(in_array($i, $monthFirstDayArray)) {
				echo '<tr><td>'.(array_search($i,$monthFirstDayArray)+1).'月</td>';
		}
		if($i==60||$i==61||$i==62||$i==124||$i==186||$i==279||$i==341) {
			echo '<td>&nbsp;</td>';
		} else {
			if($dayIndex==date('z')+1)
				echo '<td class="on">';
			else
				echo '<td>';
			$percentageHour = $dayIndex/365*$allDays*8;
			$hour = floor($percentageHour);
			if($percentageHour<1){
				echo '0';
				$hour = 0;
			} else
				echo $hour;
			echo '</td>';
			$dayIndex++;
		}
	}
?> 
</table>
</body>
</html>
