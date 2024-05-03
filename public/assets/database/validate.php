<?php 
function checkEmptyFields($array) {
    $totalFields = count($array);
    $inputCount = 0;

    foreach ($array as $value) {
        if (!empty($value)) {
            $inputCount++;
        }
    }

    if ($totalFields > 0) {
        $percentage = ($inputCount / $totalFields) * 100;
        return $percentage;
    } else {
        return 0; 
    }
}


?>