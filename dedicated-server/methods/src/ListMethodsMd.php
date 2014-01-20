<?php
require('GbxRemote.inc.php');

set_time_limit(0);
$client = new IXR_Client_Gbx;
$host = '127.0.0.1';
$port = 5000;
if (!$client->InitWithIp($host,$port)) {
	die('An error occurred - ' . $client->getErrorCode() . ':' . $client->getErrorMessage());
}


if (!$client->query('SetApiVersion', "2012-06-19")) {
	// ignore error --> continue with old version.
}

if (!$client->query('system.listMethods')) {
	die('An error occurred - ' . $client->getErrorCode() . ':' . $client->getErrorMessage());
}
$methods = $client->getResponse();
print "<table><tr><th>Method (arguments)</th><th>Return Type</th><th>Help</th></tr>";
foreach ($methods as $m) {
	if ($client->query('system.methodSignature', $m)) {
		$signatures = $client->getResponse();
	} else {
		$signatures = array();
	}
	if ($client->query('system.methodHelp', $m)) {
		$help = $client->getResponse();
	} else {
		$help = "no help";
	}

	print '<tr><td>';
	foreach ($signatures as $sig) {
		$is_retval = 1;
		$is_firstarg = 1;
		$ret_type = '';
		foreach ($sig as $argtype) {
			if ($is_retval) {
				$ret_type = $argtype;
				print $m . '(';
				$is_retval = 0;
			} else {
				if (!$is_firstarg) {
					print ', ';
				}
				print $argtype;
				$is_firstarg = 0;
			}
		}
		print ")</td><td>$ret_type</td><td>";
	}
	print $help."</td></tr>";
}

$client->Terminate();

?>
