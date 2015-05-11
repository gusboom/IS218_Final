<?php

#Gustavo Buitrago
#IS218-102
#Prof. Keith Williams
#Final Project 
#index.php

use \library\page as page;
require_once'autoloader.php';

class index extends page {
	public function __construct() {
		parent::__construct();
		$this->content .= '
		<br/><br/>';
	}
}
?>
   