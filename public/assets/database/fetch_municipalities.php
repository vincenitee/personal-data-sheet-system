<?php include './sql_statements.php';

$provinceId = $_GET['provinceId'];
$sql = "SELECT municipality_id, municipality_desc FROM municipality WHERE prov_id = (SELECT prov_id FROM province WHERE prov_id = '" . $provinceId . "')";
$result = select_info_multiple_key($sql);

$municipalities = array();

foreach($result as $r){
    $municipality = array(
        'municipality_id' => $r['municipality_id'],
        'municipality_desc' => $r['municipality_desc'],
    );

    $municipalities[] = $municipality;
}


$municipalities_json = json_encode($municipalities);
header('Content-Type: application/json');

echo $municipalities_json;
?>
