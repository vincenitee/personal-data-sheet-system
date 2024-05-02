<?php include 'sql_statements.php';

$sql = "SELECT * FROM country";
$result = select_info_multiple_key($sql);

$countries = array();

foreach($result as $r){
    $country = array(
        'country_id' => $r['country_id'],
        'country' => $r['country']
    );

    $countries[] = $country;
}

$countries_json = json_encode($countries);
header('Content-Type: application/json');

echo $countries_json;

?>