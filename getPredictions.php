<?php
/**
 * foundation.php
*/
  $ROUTEURL = "http://webservices.nextbus.com/service/publicXMLFeed?command=predictions&a=";

   $agency = $_GET["a"];
   $stopid = $_GET["stopId"];
   $long = $_GET["long"];
   $url = "http://webservices.nextbus.com/service/publicXMLFeed?command=predictions&a=$agency&stopId=$stopid";

   $xmlString = file_get_contents($url);
   $bus = new SimpleXMLElement($xmlString);
   echo "<table><tr>";
   foreach ( $bus->predictions as $predictions)  {

     	  $agencyTitle=$predictions->attributes()->agencyTitle;
	  $routeTitle=$predictions->attributes()->routeTitle;
	  $routeTag=$predictions->attributes()->routeTag;
	  $stopTitle=$predictions->attributes()->stopTitle;
	  $stopTag=$predictions->attributes()->stopTag;
          $direction = $predictions->direction->attributes()->title;
          if (1)  {
             echo  "<hr>" . $agencyTitle . "  " .  $routeTitle . "   " . $routeTag . "<br>\n  " . $direction . "<br>\n" . $stopTitle . "<hr>\n";
          }

          foreach ($predictions->direction->prediction as $stops) {

                $epochTime = $stops->attributes()->epochTime;
                $seconds = $stops->attributes()->seconds;
                $minutes = $stops->attributes()->minutes;
                $isDeparture = $stops->attributes()->isDeparture;
                $affectedByLayover = $stops->attributes()->affectedByLayover;
                $dirTag = $stops->attributes()->dirTag;
                $vehicle = $stops->attributes()->vehicle;
	    	$block= $stops->attributes()-block;
	        $sseconds = $seconds % 60;
                if ($sseconds < 10)
		   $sseconds = "0" .  $sseconds;
                echo "$minutes:$sseconds, ";
	    }
                echo " Minutes to next bus<br>";

    }

