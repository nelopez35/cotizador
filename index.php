
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="css/style.css" rel="stylesheet" type="text/css">


<link rel="stylesheet" href="css/bootstrap.min.css" >


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script><!-- gallery -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><!-- gallery -->

<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>




</head>

<body>


<div class="catalogue" id="accordion" role="tablist">
</div> 
	<div class="preview">
		<div class="elevatorRender">
		</div>
	</div>
	<form class="form-horizontal cotizador-form" id="cotization-form">
<fieldset>

<!-- Form Name -->
<legend>Form Name</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="project_name">Project Name</label>  
  <div class="col-md-4">
  <input id="project_name" name="project_name" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="project_city">Project City</label>  
  <div class="col-md-4">
  <input id="project_city" name="project_city" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="project_state">Project State / Province company</label>  
  <div class="col-md-4">
  <input id="project_state" name="project_state" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="type_company">Type of Company *Your Name*</label>  
  <div class="col-md-4">
  <input id="type_company" name="type_company" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="phone">Phone</label>  
  <div class="col-md-4">
  <input id="phone" name="phone" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button type="button" class="btn btn-danger send-cotization">Send</button>
  </div>
</div>

</fieldset>
</form>


 </body>

 <script type="text/javascript">
// Carousel Auto-Cycle
  $(document).ready(function() {
    $('.carousel').carousel({
      interval: 0
    })
  });


 	$(document).ready(function() {
 		var array_ids = [];
	    $.ajax({
	            method: "POST",
	            url: "imgs.php",
	            data: {
	                function: "getImages"
	            }
	        })
	        .done(function(msg) {

	            json = $.parseJSON(msg);
	           
	            catalogue = $(".catalogue");
	            $.each(json, function(key, value) {
	                console.log(value);

	                panelDefault = $('<div class="panel panel-default ' + key + 'Cat"></div>');
	                panelHeading = $('<div class="panel-heading"></div>');
	                h5 = $('<h5 class="panel-title"></h5>');
	                a = $('<a data-toggle="collapse" href="#' + key.replace(/ /g, '') + '" data-parent="#accordion"></a>');
	                a.append(key);
	                h5.append(a);
	                panelHeading.append(h5);
	                panelDefault.append(panelHeading);


	                //listado imagenes
	                if (key == "ceilings") {
                        collapse = $('<div id="' + key.replace(/ /g, '') + '" class="panel-collapse collapse in aria-expanded="true"></div>');
                        panelBody = $('<div class="panel-body"></div>');
                    } else {
                        collapse = $('<div id="' + key.replace(/ /g, '') + '" class="panel-collapse collapse"></div>');
                        panelBody = $('<div class="panel-body"></div>');
                    }
                     
                    container = $('<div class="container"></div>');
                    cols = $('<div class="col-md-12"></div>');
                    carousel = $('<div class="carousel slide" id="' + key.replace(/ /g, '') + 'Carousel" ></div>');
                    carouselInner = $('<div class="carousel-inner"></div>');
                    constrols = $('<nav> <ul class="control-box pager"> <li><a data-slide="prev" href="#' + key.replace(/ /g, '') + 'Carousel" class=""><i class="glyphicon glyphicon-chevron-left"></i></a></li> <li><a data-slide="next" href="#' + key.replace(/ /g, '') + 'Carousel" class=""><i class="glyphicon glyphicon-chevron-right"></i></li> </ul> </nav>');
                    
                    container.append(cols);
                    cols.append(carousel);
                    
                    carousel.append(carouselInner);
                    carousel.append(constrols);


                    
	                i = 1;
	                isRow = true;
	                initialItem = $('<div class="item active"></div>');
	                thumbnails = $('<lu class="thumbnails"></lu>');
	                initialItem.append(thumbnails);
	                carouselInner.append(initialItem);

	                $.each(value["children"], function(img_key, img_val) {
	                
	                	if (i!=5) {
	                		li = $('<li class="col-md-3"></li>');
		                    fff = $('<div class="fff"></div>');
		                    thumbnail = $('<div class="thumbnail"></div>');
		                    caption = $('<div class="caption"></div>');
		                    caption.append('<div class="caption"> <h4>'+img_val[1]+'</h4> <p>'+img_val[4]+'</p> <button class="partSelect" id="'+ img_val[0] + '">+ Select</button> </div>');
		                    thumbnail.append('<div class="thumb img-responsive" id="'+ img_val[0] + '"><img src="'+ img_val[2] + "thumbs/"+ img_val[3].replace('png', 'jpg') + '"></div>' );

		                    fff.append(thumbnail,caption);
		                    li.append(fff);
							thumbnails.append(li);

	                	}else{

	                		
	                		initialItem = $('<div class="item"></div>');
	                		thumbnails = $('<lu class="thumbnails"></lu>');
	                		initialItem.append(thumbnails);
	                		carouselInner.append(initialItem);
	                		li = $('<li class="col-md-3"></li>');
		                    fff = $('<div class="fff"></div>');
		                    thumbnail = $('<div class="thumbnail"></div>');
		                    caption = $('<div class="caption"></div>');
		                    caption.append('<div class="caption"> <h4>'+img_val[1]+'</h4> <p>'+img_val[4]+'</p> <button class="partSelect" id="'+ img_val[0] + '">+ Select</button> </div>');
		                    thumbnail.append('<div class="thumb img-responsive" id="'+ img_val[0] + '"><img src="'+ img_val[2] + "thumbs/"+ img_val[3].replace('png', 'jpg') + '"></div>' );

		                    fff.append(thumbnail,caption);
		                    li.append(fff);
							thumbnails.append(li);

							i=0;




	                	}
	                    


	                	i++;
	                });
	                panelBody.append(container);
	                panelDefault.append(collapse);
	                collapse.append(panelBody);
	                catalogue.append(panelDefault);
	                //agregar a elevatorRender para generar los divs que se veran en el desing preview
	                element = $('<div class="part ' + key.replace(/ /g, '') + '"></div>');

	                $(".elevatorRender").append(element);

	                element.css("z-index", value["zindex"]);

	            });

	            $(".thumb").click(function() {

	                $(this).next(".partSelect").text("psfasdf");

	                id = $(this).attr("id");
	               	
	                partExist = $("#" + id + ".part");
	                if (!partExist.length) {
	                	array_ids.push(id);
	                	console.log(array_ids);
	                    $.ajax({
	                            method: "POST",
	                            url: "imgs.php",
	                            data: {
	                                function: "getImage",
	                                id: id
	                            }
	                        })
	                        .done(function(msg) {

	                            json = $.parseJSON(msg);
	                            console.log(json);
	                            console.log("#" + json[1].replace(/ /g, ''));
	                            $("." + json[1].replace(/ /g, '')).css("background-image", "url('" + json[0] + "')");
	                            $("." + json[1]).css("z-index", json[2]);
	                            $("." + json[1].replace(/ /g, '')).attr("id", id);



	                        });

	                } else {
	                	var index = array_ids.indexOf(id);
	                    if (index > -1) {
						    array_ids.splice(index, 1);
						}
	                	console.log(array_ids);
	                    $("#" + id + ".part").removeAttr("id").removeAttr("style");
	                }


	            });

	            $(".partSelect").click(function() {

	                id = $(this).attr("id");
	                
	                partExist = $("#" + id + ".part");
	                if (!partExist.length) {
	                	array_ids.push(id);
	                	console.log(array_ids);
	                    $(this).text('- Remove');
	                    $.ajax({
	                            method: "POST",
	                            url: "imgs.php",
	                            data: {
	                                function: "getImage",
	                                id: id
	                            }
	                        })
	                        .done(function(msg) {

	                            json = $.parseJSON(msg);
	                            
	                            $("." + json[1].replace(/ /g, '')).css("background-image", "url('" + json[0] + "')");
	                            $("." + json[1]).css("z-index", json[2]);
	                            $("." + json[1].replace(/ /g, '')).attr("id", id);



	                        });

	                } else {
	                    $(this).text('+ Select');
	                    var index = array_ids.indexOf(id);
	                    if (index > -1) {
						    array_ids.splice(index, 1);
						}
	                
	                    console.log(array_ids);
	                    $("#" + id + ".part").removeAttr("id").removeAttr("style");
	                }


	            });

	            $(".send-cotization").click(function() {




	                html2canvas($('.elevatorRender').get(0)).then(function(canvas) {
	                    var dataURL = canvas.toDataURL();
	                    var imgdata = dataURL.replace(/^data:image\/(png|jpg);base64,/, "");

	                    $.ajax({
	                        url: 'imgs.php',
	                        type: 'post',
	                        data: {
	                            image: imgdata,
	                            formData: $("#cotization-form").serialize(),
	                            ids: array_ids,
	                            function: "uploadImage"
	                        },
	                        dataType: 'json',
	                        success: function(response) {
	                            if (response.success) {
	                                //Post the imgur url to your server
	                                $.post("yourlinkuploadserver", response.data.link);
	                            }
	                        }
	                    });


	                });
	            });
	            




	        });
	});
 </script>
</html>
