<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"></meta>
	<title> This is the client side of the program </title>	
	<style>
		body
		{
			margin:0px;
			padding: 0px;			
		}
		#wrap{
			margin:10px;
			padding:10px;
			background-color: #999999;
		}
		#in{
			border: 1px solid blue;
			border-radius: 3px;
			line-height: 20px;
			font-size: 16px;
			size: 150px;
			font-family: Arial;
			color: olive;
			letter-spacing: 1px;
		}
		#add{
			border: 1px solid white;
			background-color: green;
			color: white;					
		}
		#text{
			margin:10px;
			background-color: rgb(193,199,99);
			padding:10px;
		}
		#text span{
			padding:2px;
			font-family: sans-serif;
			font-size: 15px;
			background-color:yellow;
			color: blue;
		}
	</style>
	</head>
<body>
<div>Make a new  entry into the database</div>
<div id ="wrap">	
	<div id="text"></div>	
	<input type="textfield" id="in"/>
	<input type="button" id="add" value="Add" />
</div>	

<script src="js/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function(){

		$.ajax({
			url : 'api.php',
			type: 'POST',
			data: "",
			dataType: 'json',
			success: function(data){
				//console.log(data);
				var container = document.getElementById("text");
				var line = document.createElement("span")
				line.innerHTML = JSON.stringify(data);
				container.appendChild(line);
				//console.log(document.getElementById('text'));
			}
		})
	});
</script>
</body>
</html>