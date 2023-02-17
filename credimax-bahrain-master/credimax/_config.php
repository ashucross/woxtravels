<?php
/**
 * These parameters need to be configured before the script can
 * work. You would receive these paramters from Credimax when you
 * submit the application for an online credit card processing
 * account.
 */

$CONFIG = array(
	"script-out"    => "https://wox.eweblinktechnology.com/credimax-bahrain-master/credimax/out.php", // The script that redirects the user out
	"script-in"	    => "https://wox.eweblinktechnology.com/credimax-bahrain-master/credimax/in.php", // The callback URL, once payment is complete
	"merchant"      => "E14737953", // Replace this with your Merchant key from Credimax
	"access_code"  	=> "551b657074d5c6348d01c44e6b542d3e", // Replace this with your Access Code from Credimax
	"secure_secret" => "4e47b25926d197f177d311509131bdd2" // Replace this with your Secure Secret from Credimax
	);
?>
