<?php

//get siteName
$siteName = empty($_GET['siteName']) ? 'nettuts' : $_GET['siteName'];
$siteList = array(
   'nettuts',
   'flashtuts',
   'webdesigntutsplus',
   'psdtuts',
   'vectortuts',
   'phototuts',
   'mobiletuts',
   'cgtuts',
   'audiotuts',
   'aetuts'
);
if ( !in_array($siteName, $siteList) ) {
   $siteName = 'nettuts';
}

//get from cache
$cache = dirname(__FILE__) . "/cache/$siteName";
if(filemtime($cache) < (time() - 3 * 60 * 60))
{
   // Get from server
   if ( !file_exists(dirname(__FILE__) . '/cache') ) {
      mkdir(dirname(__FILE__) . '/cache', 0777);
   }
   
   // YQL query (SELECT * from feed ... ) // Split for readability
   $path = "http://query.yahooapis.com/v1/public/yql?q=";
   $path .= urlencode("SELECT * FROM feed WHERE url='http://feeds.feedburner.com/$siteName'");
   $path .= "&format=json";

   // Call YQL, and if the query didn't fail, cache the returned data
   $feed = file_get_contents($path, true);
   if ( is_object($feed) && $feed->query->count ) {
      $cachefile = fopen($cache, 'wb');
      fwrite($cachefile, $feed);
      fclose($cachefile);
   }
}
else
{
   //get from local cache
   $feed = file_get_contents($cache);
}

//decode the data
$feed = json_decode($feed);

//correct some siteName
if ( $siteName === 'flashtuts' )
   $siteName = 'activetuts';
else if ( $siteName === 'webdesigntutsplus' ) 
   $siteName = 'webdesigntuts';

//show data in template
include("site.tmpl.php");
