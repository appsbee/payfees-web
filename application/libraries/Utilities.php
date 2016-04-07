<?php
if ( ! defined('BASEPATH') ) exit( 'No direct script access allowed' );


	class Utilities{


		public function __construct(){ }
		
	    public function sendSMS($text,$phone){

            //$test = "Performs an HTTP GET request on the supplied url.";
			//$phone = "9804578348";
			$userid = "subhankar";
			$password = "appsbee";
			$senderID = "APPSBE";
			$url = "http://bhashsms.com/api/sendmsg.php?user=".$userid."&pass=".$password."&sender=".$senderID."&phone=".$phone."&text=".str_replace(' ', '%20', $text)."&priority=ndnd&stype=normal";
			file_get_contents($url);
		      

		}

	}




?>
