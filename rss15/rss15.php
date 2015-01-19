<?php
if(!defined('sugarEntry'))define('sugarEntry', true);
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
$viewdefs['base']['view']['rss15'] = array(
    'dashlets' => array(
        array(
            'label' => 'LBL_DASHLET_RSS15',
            'description' => 'LBL_DASHLET_RSS15_DESC',
            'config' => array(
                'feed_name' => '',
                'feed_url' => '',
            ),
            'preview' => array(
                'feed_name' => '',
                'feed_url' => '',
            ),
            'filter' => array(
                'module' => array(
                    'Home',
                ),
                'view' => 'record'
            ),
            
        ),
    ),
    'config' => array(
        'fields' => array(
            
            array(
                'name' => 'feed_name',
                'label' => 'LBL_DASHLET_RSS15_NAME',
                'type' => 'vchar',
            ),            

            array(
                'name' => 'feed_url',
                'label' => 'LBL_DASHLET_RSS15_URL',
                'type' => 'vchar',
            ),            
        ),
    ),
);
