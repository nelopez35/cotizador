<?php 
include 'db.php';


switch ($_POST["function"]) {
	case 'getImages':
		getImages($sige);
		break;
	case 'getImage':
		getImage($sige,$_POST["id"]);
		break;
	case 'uploadImage':
		uploadImage($_POST["image"],$_POST["formData"]);
	
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

function uploadImage($img,$data){
	$imagedata = base64_decode($img);
	$filename = md5(uniqid(rand(), true));
	//path where you want to upload image
	$file = 'uploads/'.$filename.'.png';

	file_put_contents($file,$imagedata);

}

?>
