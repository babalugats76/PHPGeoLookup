<?php 
   if($_SERVER['REQUEST_METHOD'] === 'POST') {
	   
	   /* Import 3rd-party code so that we can use it */
	   require_once('classes/geoplugin.class.php');
	   
	   /* Instantiate geoPlugin class and declare local variables */
       $geoplugin = new geoPlugin();
	   $ipaddress;
	   $doLookup = false;
	   
	   /*  Check what form option user selected:
	       - If "Autolookup" get IP Address of user's requesting computer
		   - If an IP Address was provided, use that 
		   - If neither, return a notice to the user */
	   if($_POST["autolookup"]==="true") {
		   $doLookup = true;
		   $ipaddress = $_SERVER['REMOTE_ADDR'];  
	   } elseif($_POST["autolookup"]==="false" && !empty($_POST["ipaddress"])) {
		   $doLookup = true;
		   $ipaddress = $_POST['ipaddress']; 		     
	   } else {
		   echo '<p class="notice">You must provide an IP address or check "Auto Lookup"</p>';   
	   }
	 
	   /* If user provided an option */
	   if($doLookup) {
	       /* Use the Geo Web Service class to do the geo lookup */
	       $geoplugin->locate($ipaddress);	
	   	   		   
	       /* Format and print the results */
		   
		   $html = "<p class='center'>Results for IP address <strong>$ipaddress</strong>:</p>";
		   $html .= '<table id="geo">';
		   $html .= "<tr><td>City:</td><td>$geoplugin->city</td></tr>";
		   $html .= "<tr><td>Area Code:</td><td>$geoplugin->areaCode</td></tr>";
		   $html .= "<tr><td>Region:</td><td>$geoplugin->region</td></tr>";
           $html .= "<tr><td>DMA Code:</td><td>$geoplugin->dmaCode</td></tr>";
           $html .= "<tr><td>Country Code:</td><td>$geoplugin->countryCode</td></tr>";
           $html .= "<tr><td>Country Name:</td><td>$geoplugin->countryName</td></tr>";		   
		   $html .= "<tr><td>Continent Code:</td><td>$geoplugin->continentCode</td></tr>";	
           $html .= "<tr><td>Latitude:</td><td>$geoplugin->latitude</td></tr>";	
		   $html .= "<tr><td>Longitude:</td><td>$geoplugin->longitude</td></tr>";	
		   //$html .= "<tr><td>User Agent:</td><td>".$_SERVER['HTTP_USER_AGENT']."</td></tr>";
		   $html .= '</table>';
	       echo $html;
	   }

   }
?>