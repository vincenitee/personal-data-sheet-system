<?php
function generateRandomString($length = 32)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $length > 0 && $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

$allowedExtensions = ['png', 'jpeg', 'jpg'];

function handleFileUpload($inputName, $uploadDir)
{
    global $allowedExtensions;

    if (isset($_FILES[$inputName]) && $_FILES[$inputName]["error"] == 0) {
        $fileExtension = strtolower(pathinfo($_FILES[$inputName]["name"], PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedExtensions)) {
            echo "Sorry, only PNG, JPEG, and JPG files are allowed.";
            error_log("File extension not allowed: " . $fileExtension);
            return null;
        }

        $fileName = uniqid() . '_' . generateRandomString() . '.' . $fileExtension;
        $targetFile = $uploadDir . '/' . $fileName;

        error_log("Target file path: " . $targetFile);

        if (!file_exists($uploadDir)) {
            if (!mkdir($uploadDir, 0777, true)) {
                echo "Failed to create directories.";
                error_log("Failed to create directories: " . $uploadDir);
                return null;
            }
        }

        if (move_uploaded_file($_FILES[$inputName]["tmp_name"], $targetFile)) {
            echo "The file $fileName has been uploaded.";
            error_log("File successfully uploaded: " . $targetFile);
            return ['file-name' => $fileName, 'file-type' => $fileExtension];
        } else {
            echo "Sorry, there was an error uploading your file.";
            error_log("Error moving uploaded file to: " . $targetFile);
        }
    } else {
        echo "No file uploaded or an error occurred.";
        error_log("Upload error or no file uploaded for: " . $inputName);
        if (isset($_FILES[$inputName])) {
            error_log("Upload error code: " . $_FILES[$inputName]["error"]);
        }
    }

    return null;
}

// $baseDir = dirname(__FILE__) . '/assets/uploads';

// $id_photo = handleFileUpload("gov-id-img", $baseDir . '/profile');
// $right_thumbmark = handleFileUpload("right-thumb-img", $baseDir . '/thumbmark');
// $signature = handleFileUpload("signature-img", $baseDir . '/signature');


// $validation_info = [
//     'id_type' => $_POST['gov-issued-id'],
//     'id_no' => $_POST['gov-issued-id-no'],
//     'issuance_date' => $_POST['gov-id-issuance-date'],
//     'issuance_place' => $_POST['gov-id-issuance-place'],
//     'signature' => $signature['file-name'],
//     'signature_type' => $signature['file-type'],
//     'date_accomplished' => $_POST['date-accomplished'],
//     'id_photo' => $id_photo['file-name'],
//     'id_photo_type' => $id_photo['file-type'],
//     'right_thumbmark' => $right_thumbmark['file-name'],
//     'right_thumbmark_type' => $right_thumbmark['file-type'],
// ];

// echo "<pre>";
// print_r($validation_info);
// echo "</pre>";

// insert_validation_info($employee_id, $validation_info);

?>