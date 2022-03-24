<?php
  require_once 'config.php';

  function find($table = null, $id = null) {
	   $json = null;

     if ($id) {
       $json = file_get_contents(SERVER . $table . "/" . $id);
     } else {
       $json = file_get_contents(SERVER . $table);
     }

     $array = json_decode($json, true);
     return $array;
   }

   function add($table = null, $data) {
     $data_string = json_encode($data);
     echo $data_string;
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, SERVER . $table);
     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
     curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
       'Content-Type: application/json',
       'Content-Length: ' . strlen($data_string))
     );
     curl_exec($ch);
     $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
     curl_close($ch);

     if($httpcode == 201) {
       header('location: ' . $table . '.php');
     } else {
       die("ERRO: Não foi possível inserir no banco de dados.");
     }
   }

   function addEquipment($data, $file) {
     $data_string = json_encode($data);
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, SERVER . "equipments");
     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
     curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
       'Content-Type: application/json',
       'Content-Length: ' . strlen($data_string))
     );
     curl_exec($ch);
     $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
     curl_close($ch);

     if($httpcode == 201) {
       $array = find('equipments');
       $max = -9999999; //will hold max val

       foreach($array as $k=>$v) {
         if($v['id']>$max) {
           $max = $v['id'];
         }
       }

       $target_dir = "uploads/";
       $target_file = $target_dir . basename($file["name"]);

       $uploadOk = 1;
       $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
       // Allow certain file formats
       if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
       && $imageFileType != "gif" ) {
           echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
           $uploadOk = 0;
       }
       // Check if $uploadOk is set to 0 by an error
       if ($uploadOk == 0) {
           echo "Sorry, your file was not uploaded.";
       // if everything is ok, try to upload file
       } else {
           if (move_uploaded_file($file["tmp_name"], $target_file)) {
               rename($target_file, $target_dir . $max . "." . $imageFileType);;
               convertImage($target_dir . $max . "." . $imageFileType, $target_dir . $max . ".jpeg", 100);               
           } else {
               echo "Sorry, there was an error uploading your file.";
           }
       }

       header('location: equipments.php');
     } else {
       die("ERRO: Não foi possível inserir no banco de dados.");
     }
   }

   function edit($table = null, $id = null, $data) {
     $data_string = json_encode($data);
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, SERVER . $table . "/" . $id);
     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
     curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
       'Content-Type: application/json',
       'Content-Length: ' . strlen($data_string))
     );
     curl_exec($ch);
     $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
     curl_close($ch);

     if($httpcode == 200) {
       header('location: ' . $table . '.php');
     } else {
       die("ERRO: Não foi possível editar no banco de dados.");
     }
   }

   function editEquipment($table = null, $id = null, $data, $file) {
     $data_string = json_encode($data);
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, SERVER . $table . "/" . $id);
     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
     curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
       'Content-Type: application/json',
       'Content-Length: ' . strlen($data_string))
     );
     curl_exec($ch);
     $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
     curl_close($ch);

     if($httpcode == 200) {

       $target_dir = "uploads/";
       $target_file = $target_dir . basename($file["name"]);

       $uploadOk = 1;
       $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
       // Allow certain file formats
       if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
       && $imageFileType != "gif" ) {
           echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
           $uploadOk = 0;
       }
       // Check if $uploadOk is set to 0 by an error
       if ($uploadOk == 0) {
           echo "Sorry, your file was not uploaded.";
       // if everything is ok, try to upload file
       } else {
           if (move_uploaded_file($file["tmp_name"], $target_file)) {
               rename($target_file, $target_dir . $id . "." . $imageFileType);
               convertImage($target_dir . $id . "." . $imageFileType, $target_dir . $id . ".jpeg", 100);               
           } else {
               echo "Sorry, there was an error uploading your file.";
           }
       }

       header('location: ' . $table . '.php');
     } else {
       die("ERRO: Não foi possível editar no banco de dados.");
     }
   }

   function delete($table = null, $id = null) {
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, SERVER . $table . "/" . $id);
     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_exec($ch);
     $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
     curl_close($ch);

     if($httpcode == 204) {
       header('location: ' . $table . '.php');
     } else {
       die("ERRO: Não foi possível deletar no banco de dados.");
     }
   }

   function addVersion() {
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, SERVER . "version");
     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_exec($ch);
     $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
     curl_close($ch);

     if($httpcode == 200) {
       header('location: index.php');
     } else {
       die("ERRO: Não foi incrementar a versão no banco de dados.");
     }
   }

  function getVersion() {
     $json = file_get_contents(SERVER . "version");     
     $array = json_decode($json, true);
     return $array['current'];
   }

   function convertImage($originalImage, $outputImage) {
    // jpg, png, gif or bmp?
    $exploded = explode('.',$originalImage);
    $ext = $exploded[count($exploded) - 1];

    if (preg_match('/jpg|jpeg/i',$ext))
        $imageTmp=imagecreatefromjpeg($originalImage);
    else if (preg_match('/png/i',$ext))
        $imageTmp=imagecreatefrompng($originalImage);
    else if (preg_match('/gif/i',$ext))
        $imageTmp=imagecreatefromgif($originalImage);
    else if (preg_match('/bmp/i',$ext))
        $imageTmp=imagecreatefrombmp($originalImage);
    else
        return 0;

    // quality is a value from 0 (worst) to 100 (best)
    imagejpeg($imageTmp, $outputImage, 100);    
    list($width, $height) = getimagesize($originalImage);
    
    $newwidth = 600;
    $newheight = 600;

    $destination = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($destination, $imageTmp, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    imagedestroy($imageTmp);    
    unlink($originalImage);
    imagejpeg($destination, $outputImage, 100);    
    
    return 1;
  }
?>
