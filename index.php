<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors','On');
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Ultimate Tic Tac Toe</title>
	<link rel="text/css" href="css/fontello.css"></link>
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<style>
		i{
			font-size:20px;
		}
		@media (min-width: 576px ) {
			body table{
				width: 576px;
				margin-left: auto;
				margin-right: auto;
			}
			table table{
				width:100%;
			}
		}
		@media (max-width: 576px){
			table{
				width:100%;
			}
		}
		#grid{
			border:2px solid #555;
		}
		table { 
			border-spacing:0;
			border-collapse:collapse;
			padding:0px;
			margin:0px;
		}
		table table tr:nth-child(5n+1) td{
			border-bottom:none;
			border-top:none;
		}
		table table tr:nth-child(5n+3) td{
			border-bottom:none;
			border-top:none;
		}
		table table td:nth-child(5n+2){
			border-left:1px solid #AAA;
			border-right:1px solid #AAA;
		}
		table table tr:nth-child(5n+2) td{
			border-bottom:1px solid #AAA;
			border-top:1px solid #AAA;
		}
		td:nth-child(5n+2){
			border-left:2px solid #555;
			border-right:2px solid #555;
		}
		tr:nth-child(5n+2) td{
			border-bottom:2px solid #555;
			border-top:2px solid #555;
		}
		table table td{
			width:33%;
			height:33%;
		}
	</style>
</head>
<body>
	<table id="grid">
		<?php
			$markup = "";
			$count = 1;
			for($w = 0; $w < 3;$w++){
				$markup = $markup . "<tr>\n";
				for($x = 0; $x < 3; $x++){
					$markup = $markup . "<td>\n<table>\n";
					for($y = 0; $y < 3; $y++){
						$markup = $markup . "<tr>\n";
						for($z = 0; $z < 3; $z++){
							$markup = $markup . "<td data-owned=\"no\" data-clicked=\"no\" data-cellId=\"".$count."\"></td>";
							$count++;
						}
						$markup = $markup . "</tr>\n";
					}
					$markup = $markup . "</table>\n</td>\n";
				}
				$markup = $markup . "</tr>\n";
			}
			echo $markup;
		?>
	</table>
	<script>
	var onresize = function(){
		var cw = $('#grid').width();
		$('#grid').css({'height':cw+'px'});
		var cw = $('table table').width();
		$('table table').css({'height':cw+'px'});
	}

	var endgame = function(arg){
		if(arg!="no"){
			alert(arg+" won!");
		}
	}

	var check = function(callback){
		var winString = "no";
		for(var i = 0; i<9;i++){
			var a = [];
			for(var x = 1; x < 4; x++){
				a[x-1] = $("td[data-cellId="+(i*9+x)+"]").attr('data-owned');
			}
			console.log(a);
			console.log(a[1]!="no");
			console.log(a[1]==a[2]);
			console.log(a[1]==a[3]);
			if((a[1]!="no")&&(a[0]==a[1])&&(a[0]==a[2])){
				console.log(a);
				console.log(winString);
				winString = a[1];
				break;
			}
			for(var x = 1; x < 4; x++){
				a[x-1] = $("td[data-cellId="+(i*9+1+((x-1)*3))+"]").attr('data-owned');
			}
			if((a[1]!="no")&&(a[0]==a[1])&&(a[0]==a[2])){
				console.log(a);
				console.log(winString);
				winString = a[1];
				break;
			}
		}
		callback(winString)
	}

	onresize();

	$(window).resize(onresize);

	var red = "#F00";
	var blue = "#00F";
	var colors = [red,blue];
	var teamName = ["Blue","Red"];
	var player = 0;
	var previous = undefined;
	$("table table td").click(function(){
		var clickedID = $(this).attr('data-cellId');
		if($(this).attr('data-clicked')!='yes'){
			if(previous != undefined){
				var val = previous%9;
				if(val == 0){
					val = 9;
				}
				if((val)*9-9<clickedID&&clickedID<=(val)*9){
					if(teamName[player]==Blue){
						var innerhtml = "<i class=\"icon-cancel-1\"/>";
					}
					else{
						var innerhtml = "<i class=\"icon-record\"/>";
					}
					$(this).append(innerhtml);
					$(this).css('background-color',colors[player]);
					player = 1-player;
					previous = clickedID;
					$(this).attr('data-clicked','yes');
					$(this).attr('data-owned',teamName[player]);
				}
				else{
					alert("Hey! Play by the rules!");
				}
			}
			else{
				if(teamName[player]=="Blue"){
					var innerhtml = "<i class=\"icon-cancel-1\"/>";
				}
				else{
					var innerhtml = "<i class=\"icon-record\"/>";
				}
				$(this).append(innerhtml);
				$(this).css('background-color',colors[player]);
				player = 1-player;
				previous = clickedID;
				$(this).attr('data-clicked','yes');
				$(this).attr('data-owned',teamName[player]);
			}
		}
		else{
			alert("Hey! That's not allowed!");
		}
		check(endgame);
	});
	</script>
</body>
</html>