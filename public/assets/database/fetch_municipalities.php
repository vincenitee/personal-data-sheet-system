<?php include 'sql_statements.php';

$provinceId = $_GET['provinceId'];
$sql = "SELECT municipality_id, municipality FROM municipality WHERE province_id = (SELECT province_id FROM province WHERE province_id = '" . $provinceId . "')";

$result = select_info_multiple_key($sql);

$municipalities = array();

foreach($result as $r){
    $municipality = array(
        'municipality_id' => $r['municipality_id'],
        'municipality' => $r['municipality'],
    );

    $municipalities[] = $municipality;
}


$municipalities_json = json_encode($municipalities);
header('Content-Type: application/json');

echo $municipalities_json;
?>
