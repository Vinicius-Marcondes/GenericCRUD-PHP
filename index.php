<?php
    require("Class/CRUD.php");

    $var = new CRUD("127.0.0.1","root","usbw","MDI");
    $var->conn();
    $var->printData();
    //$var->insert("registro","ID,ID_ARDUINO,FUNCIONARIO","5974, 4, 'JURESCLAUDO'");
    //$var->delete("registro","FUNCIONARIO = 'JORGINHO'");
	foreach($var->select("registro","*","1") as $vetor){
		echo $vetor["ID"]."<br>";
	}
    
	$var->disconnect();
	
