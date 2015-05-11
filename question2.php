<?php
	
#Gustavo Buitrago
#IS218-102
#Prof. Keith Williams
#Final Project
#question2.php

require_once'autoloader.php';
use \library\page as page;
   
class question2 extends page {
	function get(){
		$host = "localhost";
		$dbname = "ipeds_final_proj";
		$user ="gus";
		$pass = "sql123";
		$id = 5;
		try{
			$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
			$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			#$DBH->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
			#echo "CONECTED TO DATABASE: $dbname<br>";
			#echo "CONECTED WITH USER: $user<br>";
			$STH = $DBH->query("SELECT instnm, round(fallmen / falltotal * 100) AS percentage
								FROM institution, enrollment
								WHERE institution.unitid = enrollment.unitid
								ORDER BY percentage DESC
								LIMIT 10;");
			#print_r($STH);
			#echo "<br>";
			#echo "<br>";
			#print_r($DBH);
			#echo "<br>";
			
				
			$this->content .= "<h1>Colleges with the Highest Percentage of Male Students</h1><br>";
			
			$this->content .= "<table border = 2>";
			$this->content .= "
					<tr>
					<th>College Name</th>
					<th>Total % of Male Students</th>
					</tr>
					";
			#echo "<br><br> TESTING <br>";
			
			
			
			while($rows = $STH->fetch()){
				#echo "TEST <br>";
				#print_r($rows) . "<br>";
				$this->content .= "<tr>";
				$this->content .= "<td>" . $rows['instnm'] . "</td>";
				$this->content .= "<td>" . $rows['percentage'] . "</td>";
				$this->content .= "</tr>";
			}
			
			$this->content .= "</table>";
			
			$DBH = null;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
			
	}
			
}
?>