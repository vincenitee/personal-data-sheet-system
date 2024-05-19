<?php
$keyword = $_GET['search'];
$category = $_GET['search-category'];
if (isset($keyword)) {
    $table;

    switch ($category) {
        case 'Education':
            $table = 'educational_background';
            break;
        case 'Training':
            $table = 'learning_dev';
            break;
        case 'CS Eligibility':
            $table = 'civil_service_eligibility';
            break;
        default:
            $table = '';
            break;
    }
    
    if ($table) {
        $keyword = $conn->real_escape_string($keyword);

        $query = "SELECT * FROM $table WHERE ";

        switch ($category) {
            case 'Education':
                $query .= "degree LIKE '%$keyword%' OR school_name LIKE '%$keyword%'";
                break;
            case 'Training':
                $query .= "training_title LIKE '%$keyword%' OR institution LIKE '%$keyword%'";
                break;
            case 'CS Eligibility':
                $query .= "examination_name LIKE '%$keyword%' OR examination_place LIKE '%$keyword%'";
                break;
        }

        echo select_info_multiple_key($query);
    }
}
