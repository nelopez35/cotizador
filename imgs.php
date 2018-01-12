<?php 
include 'db.php';


switch ($_POST["function"]) {
	case 'getImages':
		getImages($sige);
		break;
	case 'getImage':
		getImage($sige,$_POST["id"]);
		break;
	
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
		while ($img = mysqli_fetch_array($img_query,MYSQLI_NUM)) {

			array_push($json[$cat[1]] , $img);
		}

	} 

	echo json_encode($json);

}

function getImage($sige,$id){
	$json = array();
	$img = "SELECT concat(path,fileName), c.name FROM elevator e JOIN categories c ON c.id = e.category WHERE e.id =".$id;

	$cat_query = mysqli_query($sige,$img);

	while($img_data = mysqli_fetch_array($cat_query,MYSQLI_NUM)){

	
		array_push($json, $img_data[0]);
		array_push($json, $img_data[1]);	

	} 

	echo json_encode($json) ;

}

?>