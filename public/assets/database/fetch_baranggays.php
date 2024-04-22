<?php include 'sql_statements.php';

$municipalityId = $_GET['municipalityId'];
$sql = "SELECT brgy_id, brgy_desc FROM brgy WHERE municipality_id = (SELECT municipality_id FROM municipality WHERE municipality_id = '" . $municipalityId . "')";
$result = select_info_multiple_key($sql);

$baranggays = array();

foreach($result as $r){
    $baranggay = array(
        'brgy_id' => $r['brgy_id'],
        'brgy_desc' => $r['brgy_desc'],
    );

    $baranggays[] = $baranggay;
}


$baranggays_json = json_encode($baranggays);
header('Content-Type: application/json');

echo $baranggays_json;

?>