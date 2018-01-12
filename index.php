
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
			<!--<div class="part" id="prueba">
			</div>
			<div class="part" id="prueba2">
			</div>
			<div class="part" id="prueba3">
			</div>-->
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
		    console.log(json);
		    catalogue =  $(".catalogue");
		    $.each(json,function(key,value){
		    	
		    	section = $('<div class="section '+key+'">');

		    	catalogue.append(section);
		    	
		    	sectionName = $('<div class="SectionName"></div>');
		    	sectionName.append("<h1>"+key+"</h1>");
		    	section.append(sectionName);
		    	items = $('<div class="items"></div>');
		    	//listado imagenes
		    	$.each(value,function(img_key,img_val){
		    		item = $('<div class="item"></div>');
		    		items.append(item);
		    		itemsContent = $(''
				  	+'<div class="title">'+img_val[1]+'</div>'
					+'<div class="thumb" id="'+img_val[0]+'"><img src="'+img_val[2]+"thumbs/"+img_val[3].replace('png', 'jpg')+'"></div>'
					+'<div class="description">'+img_val[4]+'</div>');	

					item.append(itemsContent);		  

					
					section.append(items);
		    		

		    	});


		    	//agregar a elevatorRender para generar los divs que se veran en el desing preview

		    	$(".elevatorRender").append('<div class="part '+key.replace(/ /g,'')+'"></div>');

		    });
		    $(".thumb").click(function(){

		    	


		    	id =  $(this).attr("id");
		
		    	partExist = $("#"+id+".part");
		    	if (!partExist.length) {
		    		$.ajax({
					  method: "POST",
					  url: "imgs.php",
					  data: { function: "getImage", id:id}
					})
					  .done(function( msg ) {

					  		json = $.parseJSON(msg);
					  		console.log("#"+json[1].replace(/ /g,''));
					  		$("."+json[1].replace(/ /g,'')).css("background-image", "url('"+json[0]+"')");
					  		$("."+json[1].replace(/ /g,'')).attr("id",id);
					  		


					  });

		    	}else{

		    		
		    		$("#"+id+".part").removeAttr("id").removeAttr("style");
		    	}

				
			});
		});

	});


 </script>
</html>
