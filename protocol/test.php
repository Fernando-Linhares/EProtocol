<?php
require_once "Connect/Connect.php";

function test()
{
    try{
    	  //imprimir o historico desse documento

    	  function getUser(int $doc)
    	  {
    	  	$con = Connect::getInstance()->prepare(
    	  		"SELECT id_user FROM historic WHERE id_doc = '$doc'"
    	  	);
    	  	$con->execute();
    	  	$res = $con->fetchAll();

    	  	return $res;
    	  }

    	   
          function start($id){ 
          	$res = array();
          	for($i = 0; $i<=count($id); $i++){

          		$con = Connect::getInstance()->prepare(
          		  "SELECT name FROM users WHERE id = '".$id[$i]->id."' "
          	    );
          	    $con->execute();
          	    
          	    $res = $con->fetchAll();
          	}
          	
          	return $res;
          	
          }

          $user = getUser(7);

          var_dump(start($user));
          
      
    }catch(PDOException $e){

        print "erro em ---->".$e->getMessage();

    }catch(Exception $e){

        print "erro em --->".$e->getMessage();

    }
}
test();
