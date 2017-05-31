<?php

session_start();

    $client_id = '22c369c86ea924a';

        $file = file_get_contents($_FILES["img"]["tmp_name"]);

        $url = 'https://api.imgur.com/3/image.json';
        $headers = array("Authorization: Client-ID $client_id");
        $pvars = array('image' => base64_encode($file));

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt_array($curl, array(
           CURLOPT_URL=> $url,
           CURLOPT_TIMEOUT => 900,
           CURLOPT_POST => 1,
           CURLOPT_RETURNTRANSFER => 1,
           CURLOPT_HTTPHEADER => $headers,
           CURLOPT_POSTFIELDS => $pvars
        ));
        if(curl_errno($curl))
        {
          echo "<script language='javascript'>
      			var uhuy='TIMEOUT';
                  alert(uhuy);
                  </script>";;
        }
        else{
        $oy = curl_exec($curl);
        echo "<script language='javascript'>
    			var uhuy='ahoy';
                alert(uhuy);
                </script>";
        $lol = json_decode($oy,true);
        $o="data";
        $u="link";
        $gambar = $lol[$o][$u];
        $id = $_SESSION['userSession'];
        require_once 'dbconnect.php';
        if($_SESSION['status']==1){
      		$query = "	UPDATE pelanggan
      					SET image='$gambar'
      					WHERE id_pelanggan = '$id'";
      	}
      	else {
      		$query = "	UPDATE sopir
      					SET image='$gambar'
      					WHERE id_sopir = '$id'";
      	}
        if ($DBcon->query($query)){
          $_SESSION['popbox']=1;
        }
        $DBcon->close();
        curl_close ($curl);
        header("Location: edit.php");
      }
?>
