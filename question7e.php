<?php
	
#Gustavo Buitrago
#IS218-102
#Prof. Keith Williams
#Final Project
#question7e.php

require_once'autoloader.php';
use \library\page as page;
   
class question7e extends page {
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
			$STH = $DBH->query("select * from
								(
								  select instnm, obereg, FORMAT(tuition,0)  AS tuition2
								  from institution, financial 
								  where institution.unitid = financial.unitid
								  AND `obereg` =  '0'
								  group by institution.unitid
								  order by tuition desc
								  LIMIT 1
								) alias
								UNION ALL
								(
								  select instnm, obereg, FORMAT(tuition,0)  AS tuition2
								  from institution, financial 
								  where institution.unitid = financial.unitid
								  AND `obereg` =  '1'
								  group by institution.unitid
								  order by tuition desc
								  LIMIT 1
								) 
								UNION ALL
									(
									  select instnm, obereg, FORMAT(tuition,0)  AS tuition2
								  from institution, financial 
								  where institution.unitid = financial.unitid
								  AND `obereg` =  '2'
								  group by institution.unitid
								  order by tuition desc
								  LIMIT 1
									) 
								UNION ALL
									(
									  select instnm, obereg, FORMAT(tuition,0)  AS tuition2
								  from institution, financial 
								  where institution.unitid = financial.unitid
								  AND `obereg` =  '3'
								  group by institution.unitid
								  order by tuition desc
								  LIMIT 1
									)
								UNION ALL
									(
									  select instnm, obereg, FORMAT(tuition,0)  AS tuition2
								  from institution, financial 
								  where institution.unitid = financial.unitid
								  AND `obereg` =  '4'
								  group by institution.unitid
								  order by tuition desc
								  LIMIT 1
									)
								UNION ALL
									(
									  select instnm, obereg, FORMAT(tuition,0)  AS tuition2
								  from institution, financial 
								  where institution.unitid = financial.unitid
								  AND `obereg` =  '5'
								  group by institution.unitid
								  order by tuition desc
								  LIMIT 1
									)
								UNION ALL
									(
									  select instnm, obereg, FORMAT(tuition,0)  AS tuition2
								  from institution, financial 
								  where institution.unitid = financial.unitid
								  AND `obereg` =  '6'
								  group by institution.unitid
								  order by tuition desc
								  LIMIT 1
									)
								UNION ALL
									(
									  select instnm, obereg, FORMAT(tuition,0)  AS tuition2
								  from institution, financial 
								  where institution.unitid = financial.unitid
								  AND `obereg` =  '7'
								  group by institution.unitid
								  order by tuition desc
								  LIMIT 1
									)
								UNION ALL
									(
									  select instnm, obereg, FORMAT(tuition,0)  AS tuition2
								  from institution, financial 
								  where institution.unitid = financial.unitid
								  AND `obereg` =  '8'
								  group by institution.unitid
								  order by tuition desc
								  LIMIT 1
									)
								UNION ALL
									(
									  select instnm, obereg, FORMAT(tuition,0)  AS tuition2
								  from institution, financial 
								  where institution.unitid = financial.unitid
								  AND `obereg` =  '9'
								  group by institution.unitid
								  order by tuition desc
								  LIMIT 1
									) ");
			#print_r($STH);
			#echo "<br>";
			#echo "<br>";
			#print_r($DBH);
			#echo "<br>";
			
				
			$this->content .= "<h1>Top Colleges by Region based on Highest Tuition</h1><br>";
			
			$this->content .= "<table border = 2>";
			$this->content .= "
					<tr>
					<th>College Name</th>
					<th>Region</th>
					<th>Highest Tuition</th>
					</tr>
					";
			#echo "<br><br> TESTING <br>";
			
			
			
			while($rows = $STH->fetch()){
				#echo "TEST <br>";
				#print_r($rows) . "<br>";
				$this->content .= "<tr>";
				$this->content .= "<td>" . $rows['instnm'] . "</td>";
				$this->content .= "<td>" . $rows['obereg'] . "</td>";
				$this->content .= "<td>" . $rows['tuition2'] . "</td>";
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