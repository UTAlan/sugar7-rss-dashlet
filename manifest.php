<?php
/*
 *  This file is part of 'RSS Feed Dashlet'.
 *
 *  'RSS Feed Dashlet' is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation.
 *
 *  'RSS Feed Dashlet' is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with 'RSS Feed Dashlet'.  If not, see http://www.gnu.org/licenses/gpl.html.
 *
 * Copyright 2015 Alan Beam - All rights reserved.
 */

$manifest = array (

		'acceptable_sugar_versions' => 
			array(
				'regex_matches' => array(
                    '7\\.[0-9]\\.[0-9]$',
                    '7\\.[0-9]\\.[0-9]\\.[0-9]$'
				),
			),			
			
		  'acceptable_sugar_flavors' =>
		  array(
			  0 => 'PRO',
			  1 => 'CORP',
			  2 => 'ENT',
			  3 => 'ULT',
		  ),
		  'readme'=>'README.txt',
		  'key'=>'RSS15',
		  'author' => 'Alan Beam',
		  'description' => 'Custom dashlet to display a specified RSS Feed',
		  'icon' => '',
		  'is_uninstallable' => true,
		  'name' => 'RSS Feed Dashlet',
		  'published_date' => '2015-01-19 12:00',
		  'type' => 'module',
		  'version' => '1.0.1',
		  'remove_tables' => false,
		  );  
		  
$installdefs = array (
  'id' => 'RSS15',

  'copy' => 
  array (
    array (
      'from' => '<basepath>/rss15/',
      'to' => 'custom/clients/base/views/rss15',
    ),
    array (
      'from' => '<basepath>/api.rss15/RSS15Api.php',
      'to' => 'custom/clients/base/api/RSS15Api.php',
    ),
   ),   

  'language' => 
  array (
    array (
      'from' => '<basepath>/language.rss15/en_us.lang.php',
      'to_module' => 'application',
      'language' => 'en_us',
    ),
   )  
 
);
