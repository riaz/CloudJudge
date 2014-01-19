<!doctype html>
<head>
<meta charset="utf-8">
<title>Gazpo.com - HTML5 Inline text editing and saving </title>

<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
  <style>
	body {		
		font-family: Helvetica,Arial,sans-serif;
		color:#333333;
		font-size:13px;
	}
	
    h1{
		font-family: 'Droid Serif', Georgia, Times, serif;
		font-size: 28px;		
	}
	
	a{
		color: #0071D8;
		text-decoration:none;
	}
	
	a:hover{
		text-decoration:underline;
	}

	:focus {
		outline: 0;
	}
	
	#wrap{
		width: 500px;
		margin:0 auto;				
		overflow:auto;		
	}
	
	#content{
		background: #f7f7f7;
		border-radius: 10px;
	}
	
	#editable {		
		padding: 10px;		
	}
	
	#status{
		display:none; 
		margin-bottom:15px; 
		padding:5px 10px; 
		border-radius:5px;
	}
	
	.success{
		background: #B6D96C;
	}
	
	.error{
		background: #ffc5cf; 
	}
	
	#footer{
		margin-top:15px;
		text-align: center;
	}
	
	#save{	
		display: none;
		margin: 5px 10px 10px;		
		outline: none;
		cursor: pointer;	
		text-align: center;
		text-decoration: none;
		font: 12px/100% Arial, Helvetica, sans-serif;
		font-weight:700;	
		padding: 5px 10px;	
		-webkit-border-radius: 5px; 
		-moz-border-radius: 5px;
		border-radius: 5px;	
		color: #606060;
		border: solid 1px #b7b7b7;	
		background: #fff;
		background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#ededed));
		background: -moz-linear-gradient(top,  #fff,  #ededed);
		filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ededed');
	}	
	
	#save:hover
	{
        background: #ededed;
		background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#dcdcdc));
		background: -moz-linear-gradient(top,  #fff,  #dcdcdc);
		filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#dcdcdc');
	}
	
    </style>
  
  <script src="js/jquery.js" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
		
		$("#save").click(function (e) {			
			var content = $('#editable').html();	
				
			$.ajax({
				url: 'http://localhost/poj/save.php',
				type: 'POST',
				data: {
                content: content
				},				
				success:function (data) {
							
					if (data == '1')
					{
						$("#status")
						.addClass("success")
						.html("Data saved successfully")
						.fadeIn('fast')
						.delay(3000)
						.fadeOut('slow');	
					}
					else
					{
						$("#status")
						.addClass("error")
						.html("An error occured, the data could not be saved")
						.fadeIn('fast')
						.delay(3000)
						.fadeOut('slow');	
					}
				}
			});   
			
		});
		
		$("#editable").click(function (e) {
			$("#save").show();
			e.stopPropagation();
		});
	
		$(document).click(function() {
			$("#save").hide();  
		});
	
	});

</script>
</head>
<body>
	<div id="wrap">
		<h1>HTML5 Inline text editing and saving</h1>
		
		<h4>The demo to edit the data with html5 <i>contentEditable</i>, and saving the changes to database with PHP and jQuery.</h4>
		
		<div id="status"></div>
		
		<div id="content">
		
		<div id="editable" contentEditable="true">
		<?php
			//get data from database.
			include("db.php");
			$sql = mysql_query("select text from content where id='1'");
			$row = mysql_fetch_array($sql);			
			echo $row['text'];
		?>		
		</div>	
		
		<button id="save">Save</button>
		</div>
		
		<div id="footer"><a href="http://codegauge.com"></a></div>
	</div>
</body>
</html>