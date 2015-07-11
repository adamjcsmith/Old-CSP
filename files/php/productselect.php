<?php 

	echo 'anything...';
  $option = isset($_POST['productselection']) ? $_POST['productselection'] : false;
   if($option) {
      echo htmlentities($_POST['productselection'], ENT_QUOTES, "UTF-8");
      echo 'hello!';
   } else {
     echo "task option is required";
     exit; 
   }
  

?>
