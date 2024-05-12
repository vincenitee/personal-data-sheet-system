<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$BD_TABLE = 'personal_data_sheet';

function insert_update_delete($query)
{
	global $DB_HOST, $DB_USER, $DB_PASS, $BD_TABLE;
	$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS);
	mysqli_select_db($con, $BD_TABLE) or die("Unable to select database");

	mysqli_query($con, $query) or die("Unable to execute query");

	if (stripos($query, 'INSERT') === 0) {
		return mysqli_insert_id($con);
		mysqli_close($con);
	}
	
	mysqli_close($con);
	return true;
}

function select_info_multiple_key($query)
{
	//echo $query;
	global $DB_HOST, $DB_USER, $DB_PASS, $BD_TABLE;
	$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS);
	mysqli_select_db($con, $BD_TABLE) or die("Unable to select database");

	//mysql_query($query);

	if ($res = mysqli_query($con, $query)) {
		if (mysqli_num_rows($res)) {
			$retvalue = array();

			$ctr = 0;
			while ($r = mysqli_fetch_array($res)) {
				$a_keys = array_keys($r);
				//in supplying the query string specify first the ID (PK) ex. select id, name etc..
				//$row_name = $r[0].$ctr;
				$retvalue[$ctr] = array();

				//(
				//'str_license'=>$r['str_license']
				//,'str_license_description'=>html_entity_decode(stripslashes($r['str_license_description']),ENT_QUOTES)
				//);

				for ($x = 0; $x < count($a_keys); $x++) {
					$retvalue[$ctr][$a_keys[$x]] = html_entity_decode(stripslashes($r[$a_keys[$x]]), ENT_QUOTES);
				}
				$ctr = $ctr + 1;
			}
			return $retvalue;
		} else {
			//addDebug('InfoMgmt_getLicense','Zero Result');
			return null;
		}
	} else {
		//addDebug('InfoMgmt_getLicense',sql);
		//addDebug('InfoMgmt_getLicense',mysql_error());
		return null;
	}

	mysqli_close($con);
}
