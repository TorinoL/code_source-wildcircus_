<?php 
  include('inc/head.php');

   include('inc/header.php');
 ?>

 <h1 class="present">Présentation des performances</h1>


<?php

 try{
 	$bdd=new PDO('mysql:host=127.0.0.1;port=8889;dbname=wildcircus;charset=utf8', 'root', 'root');
 }

 catch (Exception $e){
 	die ('Erreur: '.$e->getMessage());
 }



for($i = 1; $i <= $pagesTot; $i++){
	if($i == $pageCourante){
        echo $i.' ';
	}else{
		echo '<a href="event.php?page='.$i.'">'.$i.'</a> ';
	}
}

?>
