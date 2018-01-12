<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="css/style.css" rel="stylesheet" type="text/css">


<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
</head>

<body>
<div class="catalogue">
	
</div> 
	<div class="preview">
		<div class="title">
			<h2>Design Preview</h2>
		</div>
		<div class="elevatorRender">
		<div id="prueba">
			
			<div id="prueba2">
				<div id="prueba3">
				
				</div>
			</div>
		</div>

		</div>
	</div>
 </body>

 <script type="text/javascript">
 	
	$( document ).ready(function() {
	    $.ajax({
		  method: "POST",
		  url: "imgs.php",
		  data: { function: "getImages"}
		})
		  .done(function( msg ) {
		    	
		    json = $.parseJSON(msg);
		    catalogue =  $(".catalogue");
		    $.each(json,function(key,value){
		    	
		    	section = $('<div class="section '+key+'">');

		    	catalogue.append(section);
		    	
		    	sectionName = $('<div class="SectionName"></div>');
		    	sectionName.append("<h1>"+key+"</h1>");
		    	section.append(sectionName);
		    	//listado imagenes
		    	$.each(value,function(img_key,img_val){
		    		item = $('<div class="item"></div>');

		    		items = $(''
				  	+'<div class="title">'+img_val[1]+'</div>'
					+'<div class="thumb" id="'+img_val[0]+'"><img src="'+img_val[2]+'"></div>'
					+'<div class="description">'+img_val[3]+'</div>');	

					item.append(items);		  

					
					section.append(item);
		    		

		    	});


		    	

		    });
		    $(".thumb").click(function(){
		    	id =  $(this).attr("id");
				$.ajax({
				  method: "POST",
				  url: "imgs.php",
				  data: { function: "getImage", id:id}
				})
				  .done(function( msg ) {

				  		
				  		console.log(msg);

				  });
			});
		});

	});


 </script>
</html>
