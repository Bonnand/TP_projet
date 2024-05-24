<?php
session_start();
include("config.inc.php");

$data = json_decode(file_get_contents('php://input'), true);

$id_pixel = intval($data['id_pixel']);
$color = $data['hexColor'];
$pseudo = $data['pseudo'];
$id_grid = intval($data['id_grid']);

$request="select * from `pixel`";
$nb=GetSQL($request,$pixel);

$index=0;
$id_already_choosed=false;

//Test if it's need to create or update a pixel
while(isset($pixel[$index][0])){
    if($pixel[$index][0]==$id_pixel){
        $id_already_choosed=true;
    }
    $index++;
}

if($id_already_choosed){
    $request = "UPDATE `pixel` SET `Color` = '$color', `Pseudo` = '$pseudo' WHERE `id` = '$id_pixel'";
}
else{
    $request = "INSERT INTO `pixel` (`id`, `Color`, `Pseudo`, `IdGrid`) VALUES ('$id_pixel', '$color', '$pseudo', '$id_grid')";
}

ExecuteSQL($request);


?>
