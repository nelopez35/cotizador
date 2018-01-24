<?php 
include 'db.php';
include 'vendor/autoload.php';;


switch ($_POST["function"]) {
	case 'getImages':
		getImages($sige);
		break;
	case 'getImage':
		getImage($sige,$_POST["id"]);
		break;
	case 'uploadImage':
		uploadImage($_POST["formData"],$_POST["ids"],$sige);
	
	default:
		# code...
		break;
}


function getImages($sige){
	$json = array();
	$categories = "SELECT * FROM categories;";

	$cat_query = mysqli_query($sige,$categories);

	while($cat = mysqli_fetch_array($cat_query)){

		$images = "SELECT * FROM elevator WHERE category =".$cat[0];
		$img_query = mysqli_query($sige,$images);
		$json[$cat[1]] = array();
		$children = array();
		$json[$cat[1]]["children"] = $children;
		$json[$cat[1]]["zindex"] = $cat[3];
		

		



		while ($img = mysqli_fetch_array($img_query,MYSQLI_NUM)) {

			array_push($json[$cat[1]]["children"] , $img);
		}

	} 

	echo json_encode($json);

}

function getImage($sige,$id){
	$json = array();
	$img = "SELECT concat(path,fileName), c.name, c.layer FROM elevator e JOIN categories c ON c.id = e.category WHERE e.id =".$id;

	$cat_query = mysqli_query($sige,$img);

	while($img_data = mysqli_fetch_array($cat_query,MYSQLI_NUM)){

	
		array_push($json, $img_data[0]);
		array_push($json, $img_data[1]);
		array_push($json, $img_data[2]);

	} 

	echo json_encode($json) ;

}

function uploadImage($data,$ids,$sige){


	try {
		$params = array();
		parse_str($data, $params);
		
		//$imagedata = base64_decode($img);
		$filename = md5(uniqid(rand(), true));
		//path where you want to upload image
		//$file = 'uploads/'.$filename.'.png';

		//file_put_contents($file,$imagedata);
		$mpdf =  new \Mpdf\Mpdf();
		$stylesheet = file_get_contents('css/pdf_styles.css');
		$mpdf->WriteHTML($stylesheet,1);
		//$htmlImageCorrect = str_replace("&quot;", "'", $htmlImage);
		$i=1;
		$images = "";
		$ids = array_unique($ids);
		$ids = implode(",",$ids);
		$sql = "SELECT concat(path,fileName) as path, c.layer as zindex FROM elevator e JOIN categories c ON c.id = e.category WHERE e.id in(".$ids.") order by c.layer";
		$query = mysqli_query($sige,$sql);
		while($img_data = mysqli_fetch_array($query,MYSQLI_NUM)){

			
				$images .='<div class="part" style="background-image: url(\''.$img_data[0].'\');z-index:'.$img_data[1].';">';
				$i++;
		} 
		
		for ($j=1; $j < $i; $j++) { 
			$images .= "</div>";
		}

		$html = '<h1>PRUEBA</h1> <div class="container"> <div class="starter-template"> <h1>COTIZACION</h1> <div class="row"> <div class="preview">'.$images.'


		</div><br> </div> <div class="row"> <table class="table"> <thead> <tr> <th scope="col">#</th> <th scope="col">First</th> <th scope="col">Last</th> <th scope="col">Handle</th> </tr> </thead> <tbody> <tr> <th scope="row">1</th> <td>Mark</td> <td>Otto</td> <td>@mdo</td> </tr> <tr> <th scope="row">2</th> <td>Jacob</td> <td>Thornton</td> <td>@fat</td> </tr> <tr> <th scope="row">3</th> <td>Larry</td> <td>the Bird</td> <td>@twitter</td> </tr> </tbody> </table> </div> </div> </div><!-- /.container --> ';
		$mpdf->WriteHTML($html,2);

		$mpdf->Output($filename.'.pdf');
		echo json_encode(array("status"=>'ok','desc'=>$filename.'.pdf'));
	} catch (Exception $e) {
		echo json_encode("{'status':'fail','desc':'Hubo un error'".$e."}");
	}
	


}

?>


