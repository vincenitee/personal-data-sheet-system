<?php include 'sql_statements.php';

$municipalityId = $_GET['municipalityId'];

$sql = "SELECT brgy_id, brgy FROM brgy WHERE municipality_id = (SELECT municipality_id FROM municipality WHERE municipality_id = '" . $municipalityId . "')";

$result = select_info_multiple_key($sql);

$barangays = array();

foreach($result as $r){
    $barangay = array(
        'brgy_id' => $r['brgy_id'],
        'brgy' => $r['brgy'],
    );

    $barangays[] = $barangay;
}


$barangays_json = json_encode($barangays);
header('Content-Type: application/json');

echo $barangays_json;

?>