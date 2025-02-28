<?php

  include "../database/database.php";

  try
  {

      $id = $_GET['id'];

      $stmt = $pdo->prepare("DELETE FROM eventplan WHERE id = ? "); 
      
      $stmt->bindValue(1, $id, PDO::PARAM_INT);

      if($stmt->execute())
      {
        header("Location: ../index.php");
        exit;
      }
      else
      {
        echo "operation failed";
      }

  }
  catch(\Exception $e)
  {
    echo "Error: ".$e;
  }


?>
