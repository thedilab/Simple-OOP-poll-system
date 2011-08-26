<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<style>
ul{
	width:300px;
	list-style-type: none;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 2em;
}
ul li{
	margin-bottom:2px;
	padding:2px;
	
}
ul li.result{
	position: relative;
}

ul li.result span.bar{
	background-color: #D8DFEA;
    display: block;
    left: 0;
    position: absolute;
    top: 0;
    z-index: -1;
}

</style>
</head>
<body>
<?php
include 'vote.php';
$vote  = new Vote();
$action='';

//get action
if(isset($_REQUEST['action'])){
	$action = $_REQUEST['action'];
}

//vote and show results
if('vote'==$action){	
	//vote
	$vote->vote($_REQUEST['id']);
	//show results		
	$total=$vote->getTotal();
		
	echo '<ul>';
	foreach($vote->showResults() as $vote){
		$percent = 0;
		if(isset($vote['number'])&&!empty($vote['number'])){
			$percent = $vote['number']/$total * 100;
		}		
		echo '<li class="result">';
		echo '<span class="bar" style="width:'.$percent.'%;">&nbsp;</span>';
		echo '<span class="label">'.$vote['name'].'&nbsp;(<strong>'.$percent.'%</strong>)</span>';
		echo '</li>';
	}
	echo '</ul>';

//show options
}else{
	echo '<ul>';
	foreach($vote->getList() as $option){
		echo '<li>';
		echo '<a href="'.$_SERVER['PHP_SELF'].'?action=vote&&id='.$option['id'].'">'.$option['name'].'</a>';
		echo '</li>';
	}
	echo '</ul>';	
}
?>
</body>
</html>