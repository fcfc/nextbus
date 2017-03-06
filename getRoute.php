<?php
/**
 * getRoute.php
*/
     $ROUTEURL = "getStop.php?a=";

     $agency = $_GET["a"];
     $url = "http://webservices.nextbus.com/service/publicXMLFeed?command=routeList&a=$agency";
     $xmlString = file_get_contents($url);

     $bus = new SimpleXMLElement($xmlString);

     foreach ($bus->route as $routes) {
            $tag = $routes->attributes()->tag;
            $title = $routes->attributes()->title;

     echo "<a href=\"$ROUTEURL$agency&r=$tag\">$title</a><br>";
    }