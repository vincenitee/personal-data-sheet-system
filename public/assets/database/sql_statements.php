<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$BD_TABLE = 'personal_data_sheet';

function get_all_tables_names(){
	global $DB_HOST, $DB_USER, $DB_PASS, $BD_TABLE;
    $con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $BD_TABLE);

	$tables = [];
	$result = mysqli_query($con, "SHOW TABLES");
	while($row = mysqli_fetch_assoc($result)){
		$tables[] = $row[0];
	}

	return $tables;
}

function get_all_tables($con) {
    $tables = [];
    $result = mysqli_query($con, "SHOW TABLES");
    while ($row = mysqli_fetch_array($result)) {
        $tables[] = $row[0];
    }
    return $tables;
}

function get_table_columns($con, $table) {
    $columns = [];
    $result = mysqli_query($con, "SHOW COLUMNS FROM $table");
    while ($row = mysqli_fetch_assoc($result)) {
        $columns[] = $row['Field'];
    }
    return $columns;
}

function search_all_tables($keyword) {
    global $DB_HOST, $DB_USER, $DB_PASS, $BD_TABLE;
    $con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $BD_TABLE);
    if (mysqli_connect_errno()) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }

    // Sanitize keyword
    $keyword = htmlspecialchars(strip_tags($keyword));
    $likeKeyword = '%' . $keyword . '%';

    $tables = get_all_tables($con);
    $results = [];

    foreach ($tables as $table) {
        $columns = get_table_columns($con, $table);
        if (empty($columns)) {
            continue;
        }

        $placeholders = implode(' LIKE ? OR ', $columns) . ' LIKE ?';
        $query = "SELECT * FROM $table WHERE $placeholders";

        $stmt = $con->prepare($query);
        if ($stmt === false) {
            die("Failed to prepare the statement: " . $con->error);
        }

        // Dynamically bind parameters
        $types = str_repeat('s', count($columns)); // assuming all columns are strings
        $params = array_merge([$types], array_fill(0, count($columns), $likeKeyword));

        // Use call_user_func_array to bind the parameters
        $bind_names = [$types];
        for ($i = 0; $i < count($columns); $i++) {
            $bind_name = 'bind' . $i;
            $$bind_name = $likeKeyword;
            $bind_names[] = &$$bind_name;
        }

        call_user_func_array([$stmt, 'bind_param'], $bind_names);

        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows > 0) {
            while ($r = $res->fetch_assoc()) {
                $results[$table][] = array_map(function($value) {
                    return html_entity_decode(stripslashes($value), ENT_QUOTES);
                }, $r);
            }
        }

        $stmt->close();
    }

    mysqli_close($con);

    return $results;
}

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
