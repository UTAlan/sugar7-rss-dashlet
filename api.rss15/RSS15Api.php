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
 
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


class RSS15Api extends SugarApi
{
    public function registerApiRest()
    {
        return array(
            'GetFeedEndpoint' => array(
                //request type
                'reqType' => 'GET',
                //endpoint path
                'path' => array('rss15', 'GetFeed'),
                //endpoint variables
                'pathVars' => array('', '', 'data'),
                //method to call
                'method' => 'GetFeed',
                //short help string to be displayed in the help documentation
                'shortHelp' => 'Get latest feed data',
                //long help to be displayed in the help documentation
                'longHelp' => '',
            ),
        );
    }

    /**
     * Method to be used for my MyEndpoint/GetExample endpoint
     */
    public function GetFeed($api, $args)
    {
        if(empty($args['feed_url'])) {
            return array();
        } else {
            $feed_url = urldecode($args['feed_url']);
            if(strpos($feed_url, 'http://') === false && strpos($feed_url, 'https://') === false) {
                $feed_url = 'http://' . $feed_url;
            }
        }
        
        $rss = new DOMDocument();
        $rss->load($feed_url);

        $feed = array(); 
        foreach ($rss->getElementsByTagName('item') as $node) {
            $item = array ( 
                'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
                'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
                'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
                );
            $feed[] = $item;
        }
        
        $result = array();
        foreach($feed as $k=>$item) {
            if($k >= 5) {
                break;
            }
            $result[] = $item;
        }

        return $result;
    }
}

?>
