<?php
/**
 * getStop.php
*/
     $ROUTEURL = "getPredictions.php?a=";

     $agency = $_GET["a"];
     $routenum = $_GET["r"];
     $url = "http://webservices.nextbus.com/service/publicXMLFeed?command=routeConfig&a=$agency&r=$routenum";

     $xmlString = file_get_contents($url);
     $bus = new SimpleXMLElement($xmlString);

     foreach ($bus->route->stop as $stops) {
            $tag = $stops->attributes()->tag;
            $title = $stops->attributes()->title;
            $latmin = $stops->attributes()->latMin;
            $latmax = $stops->attributes()->latMax;
            $lonmin = $stops->attributes()->lonMin;
            $lonmax = $stops->attributes()->lonMax;
            $stopId = $stops->attributes()->stopId;

            echo "<a href=\"" . $ROUTEURL . $agency . "&stopId=" .  $stopId . "\" \">$tag\t\t $title </a><br>";

    }