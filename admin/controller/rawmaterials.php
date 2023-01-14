<?php
include('../controller/database.php');


$raw_materials = $mysqli->query("SELECT * from raw_materials");


$mid = $_GET['data'];
$raw_materials_details = $mysqli->query("SELECT * from stock_list_materials where material_id='$mid'");



if(isset($_POST['add-item'])){
	
	$name           = $_POST['name'];
	
	
	$mysqli->query("INSERT INTO raw_materials (material) 
						VALUES ('$name')");
		
		

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: " Material Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "materials.php";
							});
			</script>';
	
}
if(isset($_POST['add-items'])){
	
	$name           = $_POST['name'];
	$type           = $_POST['type'];
	$data           = $_POST['data'];
	
	$mysqli->query("INSERT INTO stock_list_materials (material_id, quantity , type) 
						VALUES ('$data','$name','$type')");
		
		

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: " Material Details Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "materials-details.php?data='.$data.'";
							});
			</script>';
	
}

if(isset($_POST['delete-item'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  raw_materials where id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "  Materials is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "materials.php";
							});
			</script>';
	
}

if(isset($_POST['update-item'])){
	
	$id             = $_POST['id'];
	$name           = $_POST['name'];
	
	$mysqli->query("UPDATE raw_materials  SET material = '$name'
					WHERE id = '$id'");

		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Materials is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "materials.php";
							});
			</script>';
	
}

if(isset($_POST['update-material'])){
	
	$data           = $_POST['data'];
	$id             = $_POST['id'];
	$name           = $_POST['name'];
	$type           = $_POST['type'];
	
	$mysqli->query("UPDATE stock_list_materials  SET quantity = '$name' , type='$type'
					WHERE id = '$id'");

		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Materials Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "materials-details.php?data='.$data.'";
							});
			</script>';
	
}