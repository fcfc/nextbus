<?php
/**
 * getAgency.php
*/
     $url = "http://webservices.nextbus.com/service/publicXMLFeed?command=agencyList";
     $ROUTEURL = "getRoute.php?a=";
     $xmlString = file_get_contents($url);
     $agencies = new SimpleXMLElement($xmlString);

     foreach ($agencies->agency as $agency) {
            $tag = $agency->attributes()->tag;
            $title = $agency->attributes()->title;
            $regionTitle= $agency->attributes()->regionTitle;
            echo "<a href=\"" .  $ROUTEURL . $tag . "\" \">$title </a><br>";
    }