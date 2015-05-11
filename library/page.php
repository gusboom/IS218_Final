<?php

#Gustavo Buitrago
#IS218-102
#Prof. Keith Williams
#Final Project
#page.php

namespace library;
$obj = new program;
 
class program {
  public function __construct() {
  $page_type = 'index';
  if(!empty($_GET)) {
      $page_type = $_GET['page'];
   }
   
   $obj = new $page_type;
   
   if($_SERVER['REQUEST_METHOD'] == 'GET') {
     $obj->get();
   }  else {
     $obj->post();
   }
  }
}

abstract class page {
	public $content;

	public function __construct() {
		$this->pageheader();
		$this->pagemenu();
		}

    private function pagemenu() {
    	$this->content .= '
		<link rel="stylesheet" href="library/mystyle.css" type="text/css">
		<!-- navigation links -->
		<div id="nav">
		<ul>
		<li><a href="index.php?page=question1"><b>Question #1</b> Colleges with the highest percentage of women students</a</li>
		<ul><li><a href="index.php?page=question1a">Not including All-Women\'s Colleges</a</li></ul>
		<br>
		<li><a href="index.php?page=question2"><b>Question #2</b> Colleges with the highest percentage of male students</a></li>
		<ul><li><a href="index.php?page=question2a">Not including All-Men\'s Colleges</a</li></ul>
		<br>
		<li><a href="index.php?page=question3"><b>Question #3</b> Colleges with the largest endowment overall</a></li> 
		<br>
		<li><a href="index.php?page=question4"><b>Question #4</b> Colleges with the largest enrollment of freshman</a></li> 
		<br>
		<li><a href="index.php?page=question5"><b>Question #5</b> Colleges with the highest revenue from tuition</a></li> 
		<br>
		<li><a href="index.php?page=question6"><b>Question #6</b> Colleges with the lowest non zero revenue</a></li> 
		<br>
		<li><b>Question #7</b> Top ten colleges by region for the following statistics:</li> 
		<ol>
		<li><a href="index.php?page=question7a">Endowment</a></li> 
		<li><a href="index.php?page=question7b">Total current assets</a></li> 
		<li><a href="index.php?page=question7c">Total current liabilities</a></li> 
		<li><a href="index.php?page=question7d">Lowest non-zero tuition</a></li> 
		<li><a href="index.php?page=question7e">Highest tuition</a></li> 
		</ol>
		</ul>
		
		<div id="note"><ol start="0"><p><b>Region #</b></p>
			<li>US Service schools</li>
			<li>New England CT ME MA NH RI VT</li>
			<li>Mid East DE DC MD NJ NY PA</li>
			<li>Great Lakes IL IN MI OH WI</li>
			<li>Plains IA KS MN MO NE ND SD</li>
			<li>Southeast AL AR FL GA KY LA MS NC SC TN VA WV</li>
			<li>Southwest AZ NM OK TX</li>
			<li>Rocky Mountains CO ID MT UT WY</li>
			<li>Far West AK CA HI NV OR WA</li>
			<li>Outlying areas AS FM GU MH MP PR PW VI</li>
		</ol></div>
		
		<form action="index.php">
    	<input type="submit" value="Clear Page">
		</form> 
		</div>
		<!-- content -->
		<div id="content">
		';
	}

    private function pageheader() {
		$this->content .= '<!doctype html>
			
		<html class="no-js" lang="">
		<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
			 
		<title>Final Project</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="apple-touch-icon" href="apple-touch-icon.png">
	 
		<!-- Place favicon.ico in the root directory 
		<link rel="stylesheet" href="css/normalize.css"> <link rel="stylesheet" href="css/main.css">
		<script src="js/vendor/modernizr-2.8.3.min.js"></script>
		-->
	 
		<link rel="stylesheet" href="library/index.css">
		</head>
		<body>
		<!-- Wrapper -->
		<div id="wrapper">
		<h1> IS-218 Final Project </h1>';
	}

	public function get() {
		$this->content .=  '
		
		<!-- Hello 
		<h2>hello</h2>-->
		';
	}
	 
	private function pagefooter() {
		$this->content .= '
		<!-- Page footer
		<h4>Page footer</h4>-->
		</div>
		</div>
		</body>
		</html>';
     }
	 
	public function __destruct() {
		$this->pagefooter();
		echo $this->content;
	}
 
	public function post() {
		 print_r($_POST);
	}
	
}   
?>