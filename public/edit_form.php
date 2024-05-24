<?php
include './assets/database/sql_statements.php';

session_start();
if(!isset($_SESSION['admin_id'])){
    header('Location: index.php');
    exit();
}

$emp_id = $_GET['empId'];

if (isset($emp_id)) {
    $tables = ['employee', 'residential_address', 'permanent_address', 'family_background', 'children', 'educational_background', 'civil_service_eligibility', 'work_experience', 'vol_work_experience', 'learning_dev', 'skill', 'non_acad_recognition', 'org_membership', 'questionnaire', 'reference', 'validation'];

    $empData = array();

    if ($emp_id > 0) {
        $queries = [
            'children' => [
                'query' => "SELECT * FROM children WHERE fam_bg_id = (SELECT fam_bg_id FROM family_background WHERE emp_id = $emp_id)",
                'multiple' => true
            ],
            'educational_background' => [
                'query' => "SELECT * FROM educational_background WHERE emp_id = $emp_id",
                'multiple' => true
            ],
            'civil_service_eligibility' => [
                'query' => "SELECT *
                            FROM civil_service_eligibility cse
                            JOIN license_info li ON cse.civil_eligibility_id = li.civil_eligibility_id WHERE emp_id = $emp_id",
                'multiple' => true
            ],
            'work_experience' => [
                'query' => "SELECT *
                            FROM work_experience cse
                            WHERE emp_id = $emp_id",
                'multiple' => true
            ],
            'vol_work_experience' => [
                'query' => "SELECT *
                            FROM vol_work_experience
                            WHERE emp_id = $emp_id",
                'multiple' => true
            ],
            'learning_dev' => [
                'query' => "SELECT *
                            FROM learning_dev
                            WHERE emp_id = $emp_id",
                'multiple' => true
            ],
            'skill' => [
                'query' => "SELECT *
                            FROM skill
                            WHERE emp_id = $emp_id",
                'multiple' => true
            ],
            'non_acad_recognition' => [
                'query' => "SELECT *
                            FROM non_acad_recognition
                            WHERE emp_id = $emp_id",
                'multiple' => true
            ],
            'org_membership' => [
                'query' => "SELECT *
                            FROM org_membership
                            WHERE emp_id = $emp_id",
                'multiple' => true
            ],
            'reference' => [
                'query' => "SELECT *
                            FROM reference
                            WHERE emp_id = $emp_id",
                'multiple' => true
            ],
        ];

        foreach ($tables as $table) {
            if (isset($queries[$table])) {
                $query = $queries[$table]['query'];
                $data = select_info_multiple_key($query);
                if ($data) {
                    $empData[$table] = $queries[$table]['multiple'] ? $data : $data[0];
                }
            } else {
                $query = "SELECT * FROM $table WHERE emp_id = " . intval($emp_id);
                $data = select_info_multiple_key($query);
                if ($data) {
                    $empData[$table] = $data[0];
                }
            }
        }
    }

    $employee = $empData['employee'];
    $residential_address = $empData['residential_address'];
    $permanent_address = $empData['permanent_address'];
    $family_background = $empData['family_background'];
    $children = isset($empData['children']) ? $empData['children'] : null;
    $educational_background = $empData['educational_background'];
    $cs_eligibility = isset($empData['civil_service_eligibility']) ? $empData['civil_service_eligibility'] : null;
    $work_experience = isset($empData['work_experience']) ? $empData['work_experience'] : null;
    $vol_work_experience = isset($empData['vol_work_experience']) ? $empData['vol_work_experience'] : null;
    $learning_development = isset($empData['learning_dev']) ? $empData['learning_dev'] : null;
    $skill = isset($empData['skill']) ? $empData['skill'] : null;
    $recognition = isset($empData['non_acad_recognition']) ? $empData['non_acad_recognition'] : null;
    $org_membership = isset($empData['org_membership']) ? $empData['org_membership'] : null;
    $questionnaire = isset($empData['questionnaire']) ? $empData['questionnaire'] : null;
    $reference = isset($empData['reference']) ? $empData['reference'] : null;
    $validation = isset($empData['validation']) ? $empData['validation'] : null;

    echo "<pre>";
    print_r($empData);
    echo "</pre>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Edit Information</title>
        <link rel="stylesheet" href="./assets/css/styles.css" />
        <script type="module" src="./assets/js/edit-form.js" defer></script>
    </head>
</head>

<body>
    <dialog class="rounded-md max-w-screen-lg">
        <h2 class="text-center p-2 border-b-2 text-xl font-bold sticky top-0 z-50 bg-white">Edit Information</h2>
        <form action="./assets/database//update_employee.php" method="post" class="space-y-3 p-2">
            <input type="text" name="emp_id" class="hidden" value="<?php echo isset($emp_id) ? $emp_id : ''?>">
            <div class="mx-auto space-y-4 divide-y-2 divide-slate-600">
                <!--Personal details -->
                <div class="scale-90 mx-auto py-2 p-[0.5rem]" data-step id="personal-details">
                    <!-- Title -->
                    <div class="space-y-3 py-2">
                        <h1 class="text-xl font-bold text-slate-600 ">1. Personal Detail</h1>
                        <p class="text-sm text-slate-600 rounded-sm">Please ensure all required fields are filled up. You can use <strong>N/A</strong> for fields that are not applicable.</p>
                    </div>

                    <!-- Inputs -->
                    <div class="grid grid-cols-4 gap-x-4 gap-y-3">
                        <span class="col-span-full my-4 text-lg font-medium text-slate-600">General Details</span>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">First Name</label>
                            <input type="text" name="firstname" id="firstname" class="inputbox" value="<?php echo $employee['first_name'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Middle Name</label>
                            <input type="text" name="middlename" id="middlename" class="inputbox" value="<?php echo $employee['middle_name'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Last Name</label>
                            <input type="text" name="lastname" id="lastname" class="inputbox" value="<?php echo $employee['last_name'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Name Extension</label>
                            <div class="group relative space-y-1">
                                <select name="suffix" id="suffix" class="dropdown" required>
                                    <option value=""></option>
                                    <?php
                                    $sql = 'SELECT suffix_id, suffix from suffix';
                                    $result = select_info_multiple_key($sql);
                                    $selectedSuffix = $employee['suffix_id']; // Store the suffix_id from employee array

                                    foreach ($result as $r) {
                                        $selected = ($r[0] == $selectedSuffix) ? 'selected' : ''; // Check if the current option should be selected
                                        echo "<option value='{$r[0]}' $selected>{$r[1]}</option>";
                                    }
                                    ?>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Select Suffix</label>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Date of Birth</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                    </svg>
                                </div>
                                <input type="text" name="bdate" id="bdate" class="date-inputbox" value="<?php echo $employee['birthdate'] ?>" autocomplete="off" placeholder="Select date" required />
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Place of Birth</label>
                            <input type="text" name="birthplace" id="birthplace" class="inputbox" value="<?php echo $employee['birthplace'] ?> " autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Sex</label>
                            <div class="group relative space-y-1">
                                <select name="sex" id="sex" class="dropdown" required>
                                    <option value=""></option>
                                    <?php
                                    $selectedSex = $employee['sex'];

                                    $options = ["Male", "Female"];

                                    foreach ($options as $option) {
                                        $selected = ($option == $selectedSex) ? 'selected' : '';
                                        echo "<option value='$option' $selected>$option</option>";
                                    }
                                    ?>
                                </select>

                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Select Gender/Sex</label>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Civil Status</label>
                            <div class="group relative space-y-1">
                                <select name="civil-status" id="civil-status" class="dropdown" required>
                                    <option value=""></option>
                                    <?php
                                    $sql = "SELECT * FROM civil_status";
                                    $result = select_info_multiple_key($sql);
                                    $selectedCivilStatus = $employee['civil_status_id'];
                                    foreach ($result as $r) {
                                        $selected = ($r[0] == $selectedCivilStatus) ? 'selected' : '';
                                        echo "<option value='{$r[0]}' $selected>{$r[1]}</option>";
                                    }
                                    ?>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Select Civil Status</label>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Height(m)</label>
                            <input type="number" min="0.0" name="height" id="height" class="inputbox" value="<?php echo $employee['height'] ?>" autocomplete="off" step="0.01" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Weight(kg)</label>
                            <input type="number" min="0" name="weight" id="weight" class="inputbox" value="<?php echo $employee['weight'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Blood Type</label>
                            <div class="group relative space-y-1">
                                <select name="blood-type" id="blood-type" class="dropdown" required>
                                    <option value=""></option>
                                    <?php
                                    $sql = "SELECT * from blood_type";
                                    $result = select_info_multiple_key($sql);

                                    $selectedBloodType = $employee['blood_type_id'];
                                    foreach ($result as $r) {
                                        $selected = ($r[0] == $selectedBloodType) ? 'selected' : '';
                                        echo "<option value='{$r[0]}' $selected>{$r[1]}</option>";
                                    }
                                    ?>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Select Type</label>
                            </div>
                        </div>

                        <hr class="col-span-full mt-5 border border-slate-600" />

                        <span class="col-span-full my-4 text-lg font-medium text-slate-600">Government Identification Details</span>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">GSIS ID Number</label>
                            <input type="text" name="gsis-id" id="gsis-id" class="inputbox" value="<?php echo $employee['gsis_no'] ?>" autocomplete="off" value="N/A" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">PAG-IBIG ID Number</label>
                            <input type="text" name="pagibig-id" id="pagibig-id" class="inputbox" value="<?php echo $employee['pagibig_no'] ?>" autocomplete="off" value="N/A" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">PHILHEALTH ID Number</label>
                            <input type="text" name="philhealth-id" id="philhealth-id" class="inputbox" value="<?php echo $employee['philhealth_no'] ?>" autocomplete="off" value="N/A" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">SSS ID Number</label>
                            <input type="text" name="sss-id" id="sss-id" class="inputbox" autocomplete="off" value="<?php echo $employee['sss_no'] ?>" value="N/A" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">TIN ID Number</label>
                            <input type="text" name="tin-id" id="tin-id" class="inputbox" value="<?php echo $employee['tin_no'] ?>" autocomplete="off" value="N/A" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Agency Employee Number</label>
                            <input type="text" name="agency-no" id="agency-no" class="inputbox" value="<?php echo $employee['agency_emp_no'] ?>" autocomplete="off" value="N/A" required />
                        </div>

                        <hr class="col-span-full mt-5 border border-slate-600" />

                        <span class="col-span-full my-4 text-lg font-medium text-slate-600">Citizenship</span>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Nationality</label>
                            <div class="group relative space-y-1">
                                <select name="nationality" id="nationality" class="dropdown" required>
                                    <option value=""></option>
                                    <?php
                                    $selectedNationality = $employee['citizenship'];
                                    $options = ['Filipino', 'Dual Citizenship'];

                                    foreach ($options as $option) {
                                        $selected = ($option == $selectedNationality) ? 'selected' : '';
                                        echo "<option value='$option' $selected>$option</option>";
                                    }
                                    ?>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Select Nationality</label>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Citizenship Category</label>
                            <div class="group relative space-y-1">
                                <select name="citizenship-category" id="citizenship-category" class="dropdown" required>
                                    <option value=""></option>
                                    <?php
                                    $selectedNationality = $employee['citizenship_method'];
                                    $options = ['By Birth', 'By Naturalization'];

                                    foreach ($options as $option) {
                                        $selected = ($option == $selectedNationality) ? 'selected' : '';
                                        echo "<option value='$option' $selected>$option</option>";
                                    }
                                    ?>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Select Citizenship Category</label>
                            </div>
                        </div>

                        <div class="col-span-2 space-y-1">
                            <label class="block text-sm text-gray-700">If holder of dual citizenship, indicate country</label>
                            <div class="group relative space-y-1 ">
                                <select name="citizenship-country" id="citizenship-country" class="dropdown ">
                                    <option value="N/A">N/A</option>
                                    <?php
                                    $query = "SELECT * FROM country";
                                    $countries = select_info_multiple_key($query);
                                    $selectedCountry = $employee['country_id'];
                                    foreach ($countries as $country) {
                                        $selected = ($country[0] == $selectedCountry) ? 'selected' : '';
                                        echo "<option value='$country[0]' $selected>$country[1]</option>";
                                    }

                                    ?>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Select Country</label>
                            </div>
                        </div>

                        <hr class="col-span-full mt-5 border border-slate-600" />

                        <span class="col-span-full my-4 text-lg font-medium text-slate-600">Address Information</span>
                        <span class="col-span-full mt-2 font-medium text-slate-600">Residential Address</span>

                        <div class="group relative space-y-1">
                            <input type="text" name="res-house-no" id="res-house-no" class="address-inputbox" value="<?php echo $residential_address['house_no'] ?>" autocomplete="off" required />
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">House no./Block no./Lot no.</label>
                        </div>

                        <div class="group relative space-y-1">
                            <input type="text" name="res-street" id="res-street" class="address-inputbox" value="<?php echo $residential_address['street'] ?>" autocomplete="off" required />
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Street</label>
                        </div>

                        <div class="group relative space-y-1 col-span-2">
                            <input type="text" name="res-village" id="res-village" class="address-inputbox" value="<?php echo $residential_address['village'] ?>" autocomplete="off" required />
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Village</label>
                        </div>

                        <div class="group relative space-y-1">
                            <select name="res-province" id="res-province" class="dropdown" required>
                                <option value=""></option>
                                <?php
                                $sql = 'SELECT province_id, province FROM province
                                ORDER BY province ASC';
                                $result = select_info_multiple_key($sql);

                                $selectedProvince = $residential_address['province_id'];
                                foreach ($result as $r) {
                                    $selected = ($r[0] == $selectedProvince) ? 'selected' : '';
                                    echo "<option value='{$r[0]}' $selected>{$r[1]}</option>";
                                }
                                ?>
                            </select>
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Province</label>
                        </div>

                        <div class="group relative space-y-1 ">
                            <select name="res-municipality" id="res-municipality" class="dropdown" required>
                                <option value=""></option>
                                <?php
                                $sql = 'SELECT municipality_id, municipality FROM municipality WHERE province_id = ' . $residential_address['province_id'] . '
                                ORDER BY municipality ASC';
                                $result = select_info_multiple_key($sql);

                                $selectedMunicipality = $residential_address['municipality_id'];
                                foreach ($result as $r) {
                                    $selected = ($r[0] == $selectedMunicipality) ? 'selected' : '';
                                    echo "<option value='{$r[0]}' $selected>{$r[1]}</option>";
                                }
                                ?>
                            </select>
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Municipality</label>
                        </div>

                        <div class="group relative space-y-1 ">
                            <select name="res-brgy" id="res-brgy" class="dropdown " required>
                                <option value=""></option>

                                <?php
                                $sql = 'SELECT brgy_id, brgy FROM brgy WHERE municipality_id = ' . $residential_address['municipality_id'] . '
                                ORDER BY brgy ASC';
                                $result = select_info_multiple_key($sql);

                                $selectedBrgy = $residential_address['brgy_id'];
                                foreach ($result as $r) {
                                    $selected = ($r[0] == $selectedBrgy) ? 'selected' : '';
                                    echo "<option value='{$r[0]}' $selected>{$r[1]}</option>";
                                }
                                ?>
                            </select>
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Barangay</label>
                        </div>

                        <div class="group relative space-y-1">
                            <input name="res-zip" id="res-zip" class="address-inputbox" value="<?php echo $residential_address['zip'] ?>" required />
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Zip Code</label>
                        </div>

                        <div class="col-span-full mt-2 flex items-center justify-between">
                            <span class="font-medium text-slate-600">Permanent Address</span>
                            <div class="flex items-center gap-2">
                                <input type="checkbox" class="w-4 h-4 text-blue-500 bg-gray-100 border-gray-300 rounded-sm focus:ring-2 focus:ring-blue-500" id="copy-address">
                                <label for="copy-address" class="font-medium text-slate-600 text-sm select-none">Same as Residential Address</span>
                            </div>
                        </div>

                        <div class="group relative space-y-1">
                            <input type="text" name="permanent-house-no" id="permanent-house-no" class="address-inputbox" value="<?php echo $permanent_address['house_no'] ?>" autocomplete="off" required />
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">House no./Block no./Lot no.</label>
                        </div>

                        <div class="group relative space-y-1">
                            <input type="text" name="permanent-street" id="permanent-street" class="address-inputbox" value="<?php echo $permanent_address['street'] ?>" autocomplete="off" required />
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Street</label>
                        </div>

                        <div class="group relative space-y-1 col-span-2">
                            <input type="text" name="permanent-village" id="permanent-village" class="address-inputbox" value="<?php echo $permanent_address['village'] ?>" autocomplete="off" required />
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Village</label>
                        </div>

                        <div class="group relative space-y-1">
                            <select name="permanent-province" id="permanent-province" class="dropdown" required>
                                <option value=""></option>
                                <?php
                                $sql = 'SELECT province_id, province FROM province
                                ORDER BY province ASC';
                                $result = select_info_multiple_key($sql);

                                $selectedProvince = $permanent_address['province_id'];
                                foreach ($result as $r) {
                                    $selected = ($r[0] == $selectedProvince) ? 'selected' : '';
                                    echo "<option value='{$r[0]}' $selected>{$r[1]}</option>";
                                }
                                ?>
                            </select>
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Province</label>
                        </div>

                        <div class="group relative space-y-1">
                            <select name="permanent-municipality" id="permanent-municipality" class="dropdown" required>
                                <option value=""></option>
                                <?php
                                $sql = 'SELECT municipality_id, municipality FROM municipality WHERE province_id = ' . $permanent_address['province_id'] . '
                                ORDER BY municipality ASC';
                                $result = select_info_multiple_key($sql);

                                $selectedMunicipality = $permanent_address['municipality_id'];
                                foreach ($result as $r) {
                                    $selected = ($r[0] == $selectedMunicipality) ? 'selected' : '';
                                    echo "<option value='{$r[0]}' $selected>{$r[1]}</option>";
                                }
                                ?>
                            </select>
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Municipality</label>
                        </div>

                        <div class="group relative space-y-1">
                            <select name="permanent-brgy" id="permanent-brgy" class="dropdown" required>
                                <option value=""></option>
                                <?php
                                $sql = 'SELECT brgy_id, brgy FROM brgy WHERE municipality_id = ' . $permanent_address['municipality_id'] . '
                                ORDER BY brgy ASC';
                                $result = select_info_multiple_key($sql);

                                $selectedBrgy = $permanent_address['brgy_id'];
                                foreach ($result as $r) {
                                    $selected = ($r[0] == $selectedBrgy) ? 'selected' : '';
                                    echo "<option value='{$r[0]}' $selected>{$r[1]}</option>";
                                }
                                ?>
                            </select>
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Barangay</label>
                        </div>

                        <div class="group relative space-y-1">
                            <input name="permanent-zip" id="permanent-zip" class="address-inputbox" value="<?php echo $permanent_address['zip'] ?>" required />
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Zip Code</label>
                        </div>

                        <hr class="col-span-full mt-5 border border-slate-600" />

                        <span class="col-span-full my-4 text-lg font-medium text-slate-600">Contact Information</span>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Telephone Number</label>
                            <input type="text" min="0" value="N/A" name="tel-no" id="tel-no" class="inputbox" value="<?php echo $employee['telephone_no'] ?>" autocomplete="off" required />
                        </div>
                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Mobile Number</label>
                            <input type="number" min="0" name="mobile-no" id="mobile-no" class="inputbox" value="<?php echo $employee['mobile_no'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Email Address</label>
                            <input type="email" name="email" id="email" class="inputbox" autocomplete="off" value="<?php echo $employee['email'] ?>" required />
                        </div>
                    </div>
                </div>
                <!-- End of personal details -->

                <!-- Family Background -->
                <div class="
                scale-90 mx-auto py-2" data-step>
                    <!-- Title -->
                    <div class="space-y-3 py-2">
                        <h1 class="text-xl font-bold text-slate-600 ">2. Family Background</h1>
                        <p class="text-sm text-slate-600">Please ensure all required fields are filled up. You can use <strong>N/A</strong> for fields that are not applicable.</p>
                    </div>

                    <!-- Inputs -->
                    <div class="grid grid-cols-4 gap-x-4 gap-y-3">
                        <span class="col-span-full my-4 text-lg font-medium text-slate-600">Spouse Details</span>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">First name</label>
                            <input type="text" name="spouse-firstname" id="spouse-firstname" class="inputbox" value="<?php echo $family_background['spouse_fname'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Middle name</label>
                            <input type="text" name="spouse-middlename" id="spouse-middlename" class="inputbox" value="<?php echo $family_background['spouse_mname'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Last name</label>
                            <input type="text" name="spouse-surname" id="spouse-surname" class="inputbox" value="<?php echo $family_background['spouse_lname'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Name Extension</label>
                            <div class="group relative">
                                <select name="spouse-suffix" id="spouse-suffix" class="dropdown">
                                    <option value=""></option>
                                    <?php
                                    $sql = 'SELECT suffix_id, suffix from suffix';
                                    $result = select_info_multiple_key($sql);
                                    $selectedSuffix = $family_background['spouse_suffix'];
                                    foreach ($result as $r) {
                                        $selected = ($r[1] == $selectedSuffix) ? 'selected' : '';
                                        echo "<option value='{$r[0]}' $selected>{$r[1]}</option>";
                                    }
                                    ?>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Suffix</label>
                            </div>
                        </div>

                        <hr class="col-span-full mt-5 border border-slate-600" />

                        <span class="col-span-full my-4 text-lg font-medium text-slate-600">Spouse Occupation Details</span>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Occupation</label>
                            <input type="text" name="spouse-occupation" id="spouse-occupation" class="inputbox select-all" value="<?php echo $family_background['spouse_occupation'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Employer/Business Name</label>
                            <input type="text" name="spouse-business" id="spouse-business" class="inputbox" value="<?php echo $family_background['spouse_business'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Business Address</label>
                            <input type="text" name="business-addr" id="business-addr" class="inputbox" value="<?php echo $family_background['spouse_business_address'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Telephone Number</label>
                            <input type="text" name="spouse-telno" id="spouse-telno" class="inputbox" value="<?php echo $family_background['tel_no'] ?>" autocomplete="off" required />
                        </div>

                        <hr class="col-span-full mt-5 border border-slate-600" />

                        <span class="col-span-full my-4 text-lg font-medium text-slate-600">Father's Details</span>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">First name</label>
                            <input type="text" name="father-firstname" id="father-firstname" class="inputbox" value="<?php echo $family_background['father_fname'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Middle name</label>
                            <input type="text" name="father-middlename" id="father-middlename" class="inputbox" value="<?php echo $family_background['father_mname'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Last name</label>
                            <input type="text" name="father-surname" id="father-surname" class="inputbox" value="<?php echo $family_background['father_lname'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Name Extension</label>
                            <div class="group relative">
                                <select name="father-suffix" id="father-suffix" class="dropdown" required>
                                    <option value=""></option>
                                    <?php
                                    $sql = 'SELECT suffix_id, suffix from suffix';
                                    $result = select_info_multiple_key($sql);
                                    $selectedSuffix = $family_background['father_suffix'];
                                    foreach ($result as $r) {
                                        $selected = ($r[0] == $selectedSuffix) ? 'selected' : '';
                                        echo "<option value='{$r[0]}' $selected>{$r[1]}</option>";
                                    }
                                    ?>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Suffix</label>
                            </div>
                        </div>

                        <hr class="col-span-full mt-5 border border-slate-600" />

                        <span class="col-span-full my-4 text-lg font-medium text-slate-600">Mother's Details</span>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">First name</label>
                            <input type="text" name="mother-firstname" id="mother-firstname" class="inputbox" value="<?php echo $family_background['mother_fname'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Middle name</label>
                            <input type="text" name="mother-middlename" id="mother-middlename" class="inputbox" value="<?php echo $family_background['mother_mname'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Last name</label>
                            <input type="text" name="mother-surname" id="mother-surname" class="inputbox" value="<?php echo $family_background['mother_lname'] ?>" autocomplete="off" required />
                        </div>

                        <hr class="col-span-full mt-5 border border-slate-600" />

                        <!-- Children -->
                        <div class="col-span-full my-4 flex items-center justify-between">
                            <span class="text-lg font-medium text-slate-600">Children Details</span>
                            <input type="text" name="child-total-entry" id="child-total-entry" class="hidden" value="<?php echo isset($empData['children']) ? count($empData['children']) : 1 ?>">
                        </div>

                        <div class="col-span-full space-y-2" id="children-container">
                            <div class="grid grid-cols-mod-3 gap-3">
                                <span class="font-medium text-slate-600">Name of Children</span>
                                <span class="font-medium text-slate-600">Date of Birth</span>
                            </div>
                            <?php
                            function generateChildInputFields($childIndex, $childId = '', $childName = '', $childBirthdate = '')
                            {   
                                $childId = htmlspecialchars($childId);
                                $childName = htmlspecialchars($childName);
                                $childBirthdate = htmlspecialchars($childBirthdate);
                            ?>
                                <div class="grid grid-cols-mod-3 gap-3" data-child>
                                    <input type="text" name="child-id-<?php echo $childIndex ?>" class="hidden" value="<?php echo $childId ?>" />
                                    <input type="text" name="child-name-<?php echo $childIndex; ?>" id="child-name-<?php echo $childIndex; ?>" class="inputbox" value="<?php echo $childName; ?>" autocomplete="off" />

                                    <div class="space-y-1">
                                        <div class="relative">
                                            <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                                </svg>
                                            </div>
                                            <input type="text" name="child-bdate-<?php echo $childIndex; ?>" id="child-bdate-<?php echo $childIndex; ?>" class="date-inputbox" value="<?php echo $childBirthdate; ?>" autocomplete="off" placeholder="Select date" />
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }

                            if (!empty($children)) {
                                foreach ($children as $index => $child) {
                                    generateChildInputFields($index + 1, $child['child_id'], $child['child_name'], $child['child_bdate']);
                                }
                            } else {
                                generateChildInputFields(1);
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- End of Family Background -->

                <!-- Educational Background -->
                <div class="scale-90  mx-auto py-2" data-step>
                    <!-- Title -->
                    <div class="space-y-3 py-2">
                        <h1 class="text-xl font-bold text-slate-600 ">3. Educational Background</h1>
                        <p class="text-sm text-slate-600">Please ensure all required fields are filled up. You can use <strong>N/A</strong> for fields that are not applicable.</p>
                    </div>

                    <!-- Inputs -->
                    <div class="grid grid-cols-4 gap-x-4 gap-y-3">
                        <!-- Elementary -->
                        <span class="col-span-full my-4 text-lg font-medium text-gray-900">Elementary</span>

                        <div class="col-span-2 space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Name of School</label>
                            <input type="text" class="hidden" name="elementary-id" value="<?php echo $educational_background[0]['edu_id'] ?>">
                            <input type="text" name="elementary-school" id="elementary-school" class="inputbox group" value="<?php echo $educational_background[0]['school_name'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Degree</label>
                            
                            <input type="text" name="elementary-degree" id="elementary-degree" class="inputbox" value="<?php echo $educational_background[0]['degree_course'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Highest Level Earned</label>
                            <input type="text" name="elementary-highest-unit" id="elementary-highest-unit" class="inputbox" value="<?php echo ($educational_background[0]['highest_lvl_units'] == 0) ? 'N/A' : $educational_background[0]['highest_lvl_units'] ?>" value="N/A" autocomplete="off" required />
                        </div>

                        <!-- to be continued later -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Start of Attendance</label>
                            <div class="group relative">
                                <select name="elementary-start-date" id="elementary-start-date" value="2024" class="dropdown year" required>
                                    <option value=""></option>
                                    <option value="N/A">N/A</option>
                                    <?php
                                    $currentYear = date('Y');
                                    $selectedYear = $educational_background[0]['sy_start'];

                                    echo '<option value="" ' . ($selectedYear == 'N/A' ? 'selected' : '') . '>N/A</option>';
                                    for ($year = $currentYear; $year > $currentYear - 100; $year--) {
                                        $selected = ($selectedYear == $year) ? 'selected' : '';
                                        echo "<option value='$year' $selected>$year</option>";
                                    }
                                    ?>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">End of Attendance</label>
                            <div class="group relative">
                                <select name="elementary-end-date" id="elementary-end-date" class="dropdown year" required>
                                    <option value=""></option>
                                    <option value="N/A">N/A</option>
                                    <?php
                                    $currentYear = date('Y');
                                    $selectedYear = $educational_background[0]['sy_end'];

                                    echo '<option value="" ' . ($selectedYear == 'N/A' ? 'selected' : '') . '>N/A</option>';
                                    for ($year = $currentYear; $year > $currentYear - 100; $year--) {
                                        $selected = ($selectedYear == $year) ? 'selected' : '';
                                        echo "<option value='$year' $selected>$year</option>";
                                    }
                                    ?>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Year Graduated</label>
                            <div class="group relative">
                                <select name="elementary-year-graduated" id="elementary-year-graduated" class="dropdown year" required>
                                    <option value=""></option>
                                    <option value="N/A">N/A</option>
                                    <?php
                                    $currentYear = date('Y');
                                    $selectedYear = $educational_background[0]['year_graduated'];

                                    echo '<option value="" ' . ($selectedYear == 'N/A' ? 'selected' : '') . '>N/A</option>';
                                    for ($year = $currentYear; $year > $currentYear - 100; $year--) {
                                        $selected = ($selectedYear == $year) ? 'selected' : '';
                                        echo "<option value='$year' $selected>$year</option>";
                                    }
                                    ?>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700"> Awards Received</label>
                            <input type="text" name="elementary-awards" id="elementary-awards" class="inputbox" autocomplete="off" value="<?php
                                                                                                                                            $query = "SELECT award_scholarship_name FROM award_scholarship WHERE edu_id = " . $educational_background[0]['edu_id'];
                                                                                                                                            $result = select_info_multiple_key($query);
                                                                                                                                            echo $result[0]['award_scholarship_name'];
                                                                                                                                            ?>" required />
                        </div>

                        <!-- Secondary -->
                        <hr class="col-span-full mt-5 border border-slate-600" />

                        <span class="col-span-full my-4 text-lg font-medium text-gray-900">Secondary</span>

                        <div class="col-span-2 space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Name of School</label>
                            <input type="text" class="hidden" name="secondary-id" value="<?php echo $educational_background[1]['edu_id'] ?>">
                            <input type="text" name="secondary-school" id="secondary-school" class="inputbox group" value="<?php echo $educational_background[1]['school_name'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Degree</label>
                            <input type="text" name="secondary-degree" id="secondary-degree" class="inputbox" value="<?php echo $educational_background[1]['degree_course'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Highest Level Earned</label>
                            <input type="text" name="secondary-highest-unit" id="secondary-highest-unit" class="inputbox" value="<?php echo ($educational_background[1]['highest_lvl_units'] == 0) ? 'N/A' : $educational_background[1]['highest_lvl_units'] ?>" autocomplete="off" required />
                        </div>


                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Start of Attendance</label>
                            <div class="group relative">
                                <select name="secondary-start-date" id="secondary-start-date" class="dropdown year" required>
                                    <option value=""></option>
                                    <option value="N/A">N/A</option>
                                    <?php
                                    $currentYear = date('Y');
                                    for ($year = $currentYear; $year > $currentYear - 100; $year--) {
                                        $selectedYear = $educational_background[1]['sy_start'];
                                        $selected = ($selectedYear == $year) ? 'selected' : '';
                                        echo "<option value='$year' $selected>$year</option>";
                                    }
                                    ?>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">End of Attendance</label>
                            <div class="group relative">
                                <select name="secondary-end-date" id="secondary-end-date" class="dropdown year" required>
                                    <option value=""></option>
                                    <option value="N/A">N/A</option>
                                    <?php
                                    $currentYear = date('Y');
                                    $selectedYear = $educational_background[1]['sy_end'];

                                    echo '<option value="" ' . ($selectedYear == 'N/A' ? 'selected' : '') . '>N/A</option>';
                                    for ($year = $currentYear; $year > $currentYear - 100; $year--) {
                                        $selected = ($selectedYear == $year) ? 'selected' : '';
                                        echo "<option value='$year' $selected>$year</option>";
                                    }
                                    ?>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Year Graduated</label>
                            <div class="group relative">
                                <select name="secondary-year-graduated" id="secondary-year-graduated" class="dropdown year" required>
                                    <option value=""></option>
                                    <option value="N/A">N/A</option>
                                    <?php
                                    $currentYear = date('Y');
                                    $selectedYear = $educational_background[1]['year_graduated'];

                                    echo '<option value="" ' . ($selectedYear == 'N/A' ? 'selected' : '') . '>N/A</option>';
                                    for ($year = $currentYear; $year > $currentYear - 100; $year--) {
                                        $selected = ($selectedYear == $year) ? 'selected' : '';
                                        echo "<option value='$year' $selected>$year</option>";
                                    }
                                    ?>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700"> Awards Received</label>
                            <input type="text" name="secondary-awards" id="secondary-awards" class="inputbox" value="<?php
                                                                                                                        $query = "SELECT award_scholarship_name FROM award_scholarship WHERE edu_id = " . $educational_background[1]['edu_id'];
                                                                                                                        $result = select_info_multiple_key($query);
                                                                                                                        echo $result[0]['award_scholarship_name'];
                                                                                                                        ?>" autocomplete="off" required />
                        </div>

                        <!-- Vocational Course -->
                        <hr class="col-span-full mt-5 border border-slate-600" />

                        <span class="col-span-full my-4 text-lg font-medium text-gray-900">Vocational / Trade Course</span>

                        <div class="col-span-2 space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Name of School</label>
                            <input type="text" class="hidden" name="vocational-id" value="<?php echo $educational_background[2]['edu_id'] ?>">
                            <input type="text" name="vocational-school" id="vocational-school" class="inputbox group" value="<?php echo $educational_background[2]['school_name'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Degree</label>
                            <input type="text" name="vocational-degree" id="vocational-degree" class="inputbox" value="<?php echo $educational_background[2]['degree_course'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Highest Level Earned</label>
                            <input type="text" name="vocational-highest-unit" id="vocational-highest-unit" class="inputbox" value="<?php echo ($educational_background[2]['highest_lvl_units'] == 0) ? 'N/A' : $educational_background[2]['highest_lvl_units'] ?>" autocomplete="off" required />
                        </div>


                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Start of Attendance</label>
                            <div class="group relative">
                                <select name="vocational-start-date" id="vocational-start-date" class="dropdown year" required>
                                    <option value=""></option>
                                    <?php
                                    $currentYear = date('Y');
                                    $selectedYear = $educational_background[2]['sy_start'];

                                    echo '<option value="" ' . ($selectedYear == 'N/A' ? 'selected' : '') . '>N/A</option>';
                                    for ($year = $currentYear; $year > $currentYear - 100; $year--) {
                                        $selected = ($selectedYear == $year) ? 'selected' : '';
                                        echo "<option value='$year' $selected>$year</option>";
                                    }
                                    ?>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">End of Attendance</label>
                            <div class="group relative">
                                <select name="vocational-end-date" id="vocational-end-date" class="dropdown year" required>
                                    <option value=""></option>
                                    <?php
                                    $currentYear = date('Y');
                                    $selectedYear = $educational_background[2]['sy_end'];

                                    echo '<option value="" ' . ($selectedYear == 'N/A' ? 'selected' : '') . '>N/A</option>';
                                    for ($year = $currentYear; $year > $currentYear - 100; $year--) {
                                        $selected = ($selectedYear == $year) ? 'selected' : '';
                                        echo "<option value='$year' $selected>$year</option>";
                                    }
                                    ?>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Year Graduated</label>
                            <div class="group relative">
                                <select name="vocational-year-graduated" id="vocational-year-graduated" class="dropdown year" required>
                                    <option value=""></option>
                                    <?php
                                    $currentYear = date('Y');
                                    $selectedYear = $educational_background[2]['year_graduated'];

                                    echo '<option value="" ' . ($selectedYear == 'N/A' ? 'selected' : '') . '>N/A</option>';
                                    for ($year = $currentYear; $year > $currentYear - 100; $year--) {
                                        $selected = ($selectedYear == $year) ? 'selected' : '';
                                        echo "<option value='$year' $selected>$year</option>";
                                    }
                                    ?>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700"> Awards Received</label>
                            <input type="text" name="vocational-awards" id="vocational-awards" class="inputbox" value="<?php
                                                                                                                        $query = "SELECT award_scholarship_name FROM award_scholarship WHERE edu_id = " . $educational_background[2]['edu_id'];
                                                                                                                        $result = select_info_multiple_key($query);
                                                                                                                        echo $result[0]['award_scholarship_name'];
                                                                                                                        ?>" autocomplete="off" required />
                        </div>

                        <!-- College -->
                        <hr class="col-span-full mt-5 border border-slate-600" />

                        <span class="col-span-full my-4 text-lg font-medium text-gray-900">College</span>

                        <div class="col-span-2 space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Name of School</label>
                            <input type="text" class="hidden" name="college-id" value="<?php echo $educational_background[3]['edu_id'] ?>">
                            <input type="text" name="college-school" id="college-school" class="inputbox group" value="<?php echo $educational_background[3]['school_name'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Degree</label>
                            <input type="text" name="college-degree" id="college-degree" class="inputbox" value="<?php echo $educational_background[3]['degree_course'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Highest Level Earned</label>
                            <input type="text" name="college-highest-unit" id="college-highest-unit" class="inputbox" value="<?php echo ($educational_background[3]['highest_lvl_units'] == 0) ? 'N/A' : $educational_background[3]['highest_lvl_units'] ?>" autocomplete="off" required />
                        </div>


                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Start of Attendance</label>
                            <div class="group relative">
                                <select name="college-start-date" id="college-start-date" class="dropdown year" required>
                                    <option value=""></option>
                                    <?php
                                    $currentYear = date('Y');
                                    $selectedYear = $educational_background[3]['sy_start'];

                                    echo '<option value="" ' . ($selectedYear == 'N/A' ? 'selected' : '') . '>N/A</option>';
                                    for ($year = $currentYear; $year > $currentYear - 100; $year--) {
                                        $selected = ($selectedYear == $year) ? 'selected' : '';
                                        echo "<option value='$year' $selected>$year</option>";
                                    }
                                    ?>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">End of Attendance</label>
                            <div class="group relative">
                                <select name="college-end-date" id="college-end-date" class="dropdown year" required>
                                    <option value=""></option>
                                    <?php
                                    $currentYear = date('Y');
                                    $selectedYear = $educational_background[3]['sy_end'];

                                    echo '<option value="" ' . ($selectedYear == 'N/A' ? 'selected' : '') . '>N/A</option>';
                                    for ($year = $currentYear; $year > $currentYear - 100; $year--) {
                                        $selected = ($selectedYear == $year) ? 'selected' : '';
                                        echo "<option value='$year' $selected>$year</option>";
                                    }
                                    ?>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Year Graduated</label>
                            <div class="group relative">
                                <select name="college-year-graduated" id="college-year-graduated" class="dropdown year" required>
                                    <option value=""></option>
                                    <?php
                                    $currentYear = date('Y');
                                    $selectedYear = $educational_background[3]['year_graduated'];

                                    echo '<option value="" ' . ($selectedYear == 'N/A' ? 'selected' : '') . '>N/A</option>';
                                    for ($year = $currentYear; $year > $currentYear - 100; $year--) {
                                        $selected = ($selectedYear == $year) ? 'selected' : '';
                                        echo "<option value='$year' $selected>$year</option>";
                                    }
                                    ?>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700"> Awards Received</label>
                            <input type="text" name="college-awards" id="college-awards" class="inputbox" value="<?php
                                                                                                                    $query = "SELECT award_scholarship_name FROM award_scholarship WHERE edu_id = " . $educational_background[3]['edu_id'];
                                                                                                                    $result = select_info_multiple_key($query);
                                                                                                                    echo $result[0]['award_scholarship_name'];
                                                                                                                    ?>" autocomplete="off" required />
                        </div>

                        <!-- Graduate Studies -->
                        <hr class="col-span-full mt-5 border border-slate-600" />

                        <span class="col-span-full my-4 text-lg font-medium text-gray-900">Graduate Studies</span>

                        <div class="col-span-2 space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Name of School</label>
                            <input type="text" class="hidden" name="graduate-id" value="<?php echo $educational_background[4]['edu_id'] ?>">
                            <input type="text" name="graduate-school" id="graduate-school" class="inputbox group" value="<?php echo $educational_background[4]['school_name'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Degree</label>
                            <input type="text" name="graduate-degree" id="graduate-degree" class="inputbox" value="<?php echo $educational_background[4]['degree_course'] ?>" autocomplete="off" required />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Highest Level Earned</label>
                            <input type="text" name="graduate-highest-unit" id="graduate-highest-unit" class="inputbox" value="<?php echo ($educational_background[4]['highest_lvl_units'] == 0) ? 'N/A' : $educational_background[4]['highest_lvl_units'] ?>" autocomplete="off" required />
                        </div>


                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Start of Attendance</label>
                            <div class="group relative">
                                <select name="graduate-start-date" id="graduate-start-date" class="dropdown year" required>
                                    <option value=""></option>
                                    <?php
                                    $currentYear = date('Y');
                                    $selectedYear = $educational_background[4]['sy_start'];

                                    echo '<option value="" ' . ($selectedYear == 'N/A' ? 'selected' : '') . '>N/A</option>';
                                    for ($year = $currentYear; $year > $currentYear - 100; $year--) {
                                        $selected = ($selectedYear == $year) ? 'selected' : '';
                                        echo "<option value='$year' $selected>$year</option>";
                                    }
                                    ?>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">End of Attendance</label>
                            <div class="group relative">
                                <select name="graduate-end-date" id="graduate-end-date" class="dropdown year" required>
                                    <option value=""></option>
                                    <?php
                                    $currentYear = date('Y');
                                    $selectedYear = $educational_background[4]['sy_end'];

                                    echo '<option value="" ' . ($selectedYear == 'N/A' ? 'selected' : '') . '>N/A</option>';
                                    for ($year = $currentYear; $year > $currentYear - 100; $year--) {
                                        $selected = ($selectedYear == $year) ? 'selected' : '';
                                        echo "<option value='$year' $selected>$year</option>";
                                    }
                                    ?>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Year Graduated</label>
                            <div class="group relative">
                                <select name="graduate-year-graduated" id="graduate-year-graduated" class="dropdown year" required>
                                    <option value=""></option>
                                    <?php
                                    $currentYear = date('Y');
                                    $selectedYear = $educational_background[4]['year_graduated'];

                                    echo '<option value="" ' . ($selectedYear == 'N/A' ? 'selected' : '') . '>N/A</option>';
                                    for ($year = $currentYear; $year > $currentYear - 100; $year--) {
                                        $selected = ($selectedYear == $year) ? 'selected' : '';
                                        echo "<option value='$year' $selected>$year</option>";
                                    }
                                    ?>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700"> Awards Received</label>
                            <input type="text" name="graduate-awards" id="graduate-awards" class="inputbox" value="<?php
                                                                                                                    $query = "SELECT award_scholarship_name FROM award_scholarship WHERE edu_id = " . $educational_background[4]['edu_id'];
                                                                                                                    $result = select_info_multiple_key($query);
                                                                                                                    echo $result[0]['award_scholarship_name'];
                                                                                                                    ?>" autocomplete="off" required />
                        </div>
                    </div>
                </div>

                <!-- CS Eligibility -->
                <div class="scale-90  mx-auto py-2" data-step>
                    <!-- Title -->
                    <div class="space-y-3 py-2 flex justify-between">
                        <div class="space-y-3">
                            <h1 class="text-xl font-bold text-slate-600 ">4. Civil Service Eligibility</h1>
                            <p class="text-sm text-slate-600">You can leave the fields <strong>blank</strong> if not applicable</p>
                        </div>
                        <input type="text" name="cs-total-entry" id="cs-total-entry" class="hidden" value="<?php echo isset($empData['civil_service_eligibility']) ? count($empData['civil_service_eligibility']) : 1 ?>">
                    </div>

                    <!-- Inputs -->
                    <div class="space-y-3" id="exam-container">
                        <?php

                        if ($cs_eligibility) {
                            foreach ($cs_eligibility as $index => $cs_entry) {
                                $num = $index + 1;
                                echo '<div class="mt-3 grid grid-cols-4 gap-3 border-2 border-dashed border-gray-500 p-3" data-exam>';
                                echo '<div class="col-span-full flex justify-between p-2">';
                                echo '<h2 class="col-span-3 text-lg font-semibold" id="civil-title-'. $num .'">Civil Service Entry</h2>';
                                echo '<input type="text" class="hidden" name="cs-id-'. $num .'" value="'. $cs_entry['civil_eligibility_id'] .'" />';
                            
                                echo '</div>';

                                echo '<div class="col-span-2 space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">Examination Name</label>';
                                echo '<input type="text" name="exam-name-' . $num . '" id="exam-name-' . $num . '" class="inputbox title" autocomplete="off" value="' . htmlspecialchars($cs_entry['examination_name']) . '" />';
                                echo '</div>';

                                echo '<div class="space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">Ratings</label>';
                                echo '<input type="number" min="0" step="any" name="exam-rating-' . $num . '" id="exam-rating-' . $num . '" class="inputbox" value="' . htmlspecialchars($cs_entry['rating']) . '" autocomplete="off" />';
                                echo '</div>';

                                echo '<div class="space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">Date of Examination</label>';
                                echo '<div class="relative">';
                                echo '<div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">';
                                echo '<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />';
                                echo '</svg>';
                                echo '</div>';
                                echo '<input type="text" name="exam-date-' . $num . '" id="exam-date-' . $num . '" class="date-inputbox" autocomplete="off" value="' . htmlspecialchars($cs_entry['examination_date']) . '" placeholder="Select date" required />';
                                echo '</div>';
                                echo '</div>';

                                echo '<div class="col-span-2 space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">Place of Examination</label>';
                                echo '<input type="text" name="exam-place-' . $num . '" id="exam-place-' . $num . '" class="inputbox" autocomplete="off" value="' . htmlspecialchars($cs_entry['examination_place']) . '" />';
                                echo '</div>';

                                echo '<div class="space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">License Number</label>';
                                echo '<input type="text" name="license-number-' . $num . '" id="license-number-' . $num . '" value="' . (isset($cs_entry['license_number']) ? htmlspecialchars($cs_entry['license_number']) : 'N/A') . '" class="inputbox" autocomplete="off" required />';
                                echo '</div>';


                                echo '<div class="relative space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">Date of Issuance</label>';
                                echo '<div class="relative">';
                                echo '<div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">';
                                echo '<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />';
                                echo '</svg>';
                                echo '</div>';
                                echo '<input type="text" name="issue-date-' . $num . '" id="issue-date-' . $num . '" class="date-inputbox" autocomplete="off"  value="' . htmlspecialchars($cs_entry['examination_date']) . '" placeholder="Select date"  required />';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo '<div class="mt-3 grid grid-cols-4 gap-3 border-2 border-dashed border-gray-500 p-3" data-exam>';
                            echo '<div class="col-span-full flex justify-between p-2">';

                            echo '<h2 class="col-span-3 text-lg font-semibold" id="civil-title-1">Civil Service Entry</h2>';
                            echo '<input type="text" class="hidden" name="cs-id-1" value="'. null .'" />';
                            echo '<button type="button" class="del-button">';
                            echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5 text-white">';
                            echo '<path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />';
                            echo '</svg>';
                            echo '</button>';
                            echo '</div>';

                            echo '<div class="col-span-2 space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">Examination Name</label>';
                            echo '<input type="text" name="exam-name-1" id="exam-name-1" class="inputbox title" autocomplete="off"  />';
                            echo '</div>';

                            echo '<div class="space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">Ratings</label>';
                            echo '<input type="number" min="0" step="any" name="exam-rating-1" id="exam-rating-1" class="inputbox"  autocomplete="off" />';
                            echo '</div>';

                            echo '<div class="space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">Date of Examination</label>';
                            echo '<div class="relative">';
                            echo '<div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">';
                            echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">';
                            echo '<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />';
                            echo '</svg>';
                            echo '</div>';
                            echo '<input type="text" name="exam-date-1" id="exam-date-1" class="date-inputbox" autocomplete="off" " placeholder="Select date" required />';
                            echo '</div>';
                            echo '</div>';

                            echo '<div class="col-span-2 space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">Place of Examination</label>';
                            echo '<input type="text" name="exam-place-1" id="exam-place-1" class="inputbox" autocomplete="off" />';
                            echo '</div>';

                            echo '<div class="space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">License Number</label>';
                            echo '<input type="text" name="license-number-1" id="license-number-1" class="inputbox" autocomplete="off"  required />';
                            echo '</div>';

                            echo '<div class="relative space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">Date of Issuance</label>';
                            echo '<div class="relative">';
                            echo '<div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">';
                            echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">';
                            echo '<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />';
                            echo '</svg>';
                            echo '</div>';
                            echo '<input type="text" name="issue-date-1" id="issue-date-1" class="date-inputbox" autocomplete="off"   placeholder="Select date"  required />';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
                <!-- End of Civil Service Eligibility -->


                <!-- Work Experience -->
                <div class="scale-90 mx-auto py-2" data-step>
                    <!-- Title -->
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-bold text-slate-600">5. Work Experience</h1>
                        <input type="text" name="work-exp-total" id="work-exp-total" class="hidden" value="<?php echo isset($empData['work_experience']) ? count($empData['work_experience']) : 1 ?>">
                    </div>

                    <!-- Inputs -->
                    <div class="space-y-3" id="work-container">
                        <?php

                        if (isset($work_experience)) {
                            foreach ($work_experience as $index => $work_entry) {
                                $num = $index + 1; // For unique ID attributes
                                if ($work_experience[$index]['salary_grade_step'] != 'N/A') {
                                    list($salaryGrade, $salaryStep) = explode("-", $work_experience[$index]['salary_grade_step']);
                                }

                                echo '<div class="mt-3 grid grid-cols-6 gap-3 border-2 border-dashed border-gray-500 p-3" data-work>';
                                echo '<div class="col-span-full flex justify-between p-2">';
                                echo '<h2 class="col-span-3 text-lg font-semibold" id="work-title-' . $num . '">Work Experience Entry</h2>';
                                echo '<input type="text" class="hidden" name="work-id-' . $num . '" value="'.$work_entry['work_exp_id'].'"/>';
                                echo '</div>';

                                echo '<div class="col-span-2 space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">Position/Title</label>';
                                echo '<input type="text" name="position-' . $num . '" id="position-' . $num . '" class="inputbox title" autocomplete="off" value="' . htmlspecialchars($work_entry['position']) . '" />';
                                echo '</div>';

                                echo '<div class="col-span-3 space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">Department/Agency</label>';
                                echo '<input type="text" name="agency-' . $num . '" id="agency-' . $num . '" class="inputbox" autocomplete="off" value="' . htmlspecialchars($work_entry['department']) . '" />';
                                echo '</div>';

                                echo '<div class="space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">Monthly Salary</label>';
                                echo '<input type="number" min="0" name="salary-' . $num . '" id="salary-' . $num . '" class="inputbox" value="' . htmlspecialchars($work_entry['monthly_salary']) . '" autocomplete="off" />';
                                echo '</div>';

                                echo '<div class="space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">Start Date</label>';
                                echo '<div class="relative">';
                                echo '<div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">';
                                echo '<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />';
                                echo '</svg>';
                                echo '</div>';
                                echo '<input type="text" name="work-start-' . $num . '" id="work-start-' . $num . '" class="date-inputbox" autocomplete="off" value="' . htmlspecialchars($work_entry['work_start']) . '" placeholder="Select date" required />';
                                echo '</div>';
                                echo '</div>';

                                echo '<div class="space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">End Date</label>';
                                echo '<div class="relative">';
                                echo '<div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">';
                                echo '<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />';
                                echo '</svg>';
                                echo '</div>';
                                echo '<input type="text" name="work-end-' . $num . '" id="work-end-' . $num . '" class="date-inputbox" autocomplete="off" value="' . htmlspecialchars($work_entry['work_end']) . '" placeholder="Select date" required />';
                                echo '</div>';
                                echo '</div>';

                                echo '<div class="space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">Salary Grade</label>';
                                echo '<div class="group relative">';
                                echo '<select name="salary-grade-' . $num . '" id="salary-grade-' . $num . '" class="dropdown salary-grade" required>';
                                // Populate with options, assuming you have an array of salary grades
                                $salaryGrades = range(1, 33); // Example salary grades
                                foreach ($salaryGrades as $grade) {
                                    if (isset($salaryGrade))  $selected = ($grade == $salaryGrade) ? 'selected' : '';
                                    echo '<option value="' . $grade . '" ' . $selected . '>' . $grade . '</option>';
                                }
                                echo '</select>';
                                echo '<label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Grade</label>';
                                echo '</div>';
                                echo '</div>';

                                echo '<div class="space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">Salary Step</label>';
                                echo '<div class="group relative">';
                                echo '<select name="salary-step-' . $num . '" id="salary-step-' . $num . '" class="dropdown salary-step" required>';
                                // Populate with options, assuming you have an array of salary steps
                                $salarySteps = range(1, 8); // Example salary steps
                                foreach ($salarySteps as $step) {
                                    if (isset($salaryStep))  $selected = ($grade == $salaryStep) ? 'selected' : '';
                                    // $selected = ($step == $salaryStep) ? 'selected' : '';
                                    echo '<option value="' . $step . '" ' . $selected . '>' . $step . '</option>';
                                }
                                echo '</select>';
                                echo '<label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Step</label>';
                                echo '</div>';
                                echo '</div>';

                                echo '<div class="space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">Appointment Status</label>';
                                echo '<div class="group relative">';
                                echo '<select name="appointment-status-' . $num . '" id="appointment-status-' . $num . '" class="dropdown appointment-status" required>';
                                $statuses = ['Permanent', 'Temporary', 'Contractual'];
                                foreach ($statuses as $status) {
                                    $selected = ($status == $work_entry['appointment_status']) ? 'selected' : '';
                                    echo '<option value="' . $status . '" ' . $selected . '>' . $status . '</option>';
                                }
                                echo '</select>';
                                echo '<label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Status</label>';
                                echo '</div>';
                                echo '</div>';

                                echo '<div class="space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">Government Service</label>';
                                echo '<div class="group relative">';
                                echo '<select name="government-service-' . $num . '" id="government-service-' . $num . '" class="dropdown government-service" required>';
                                echo '<option value="1"' . ($work_entry['government_service'] == '1' ? ' selected' : '') . '>Yes</option>';
                                echo '<option value="0"' . ($work_entry['government_service'] == '0' ? ' selected' : '') . '>No</option>';
                                echo '</select>';
                                echo '<label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select</label>';
                                echo '</div>';
                                echo '</div>';

                                echo '</div>';
                            }
                        } else {
                            echo '<div class="mt-3 grid grid-cols-6 gap-3 border-2 border-dashed border-gray-500 p-3" data-work>';
                            echo '<div class="col-span-full flex justify-between p-2">';
                            echo '<h2 class="col-span-3 text-lg font-semibold" id="work-title-1">Work Experience Entry</h2>';
                            echo '<input type="text" class="hidden" name="work-id-1" value="'.null.'"  />';
                            echo '</div>';

                            echo '<div class="col-span-2 space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">Position/Title</label>';
                            echo '<input type="text" name="position-1" id="position-1" class="inputbox title" autocomplete="off" />';
                            echo '</div>';

                            echo '<div class="col-span-3 space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">Department/Agency</label>';
                            echo '<input type="text" name="agency-1" id="agency-1" class="inputbox" autocomplete="off" />';
                            echo '</div>';

                            echo '<div class="space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">Monthly Salary</label>';
                            echo '<input type="number" min="0" name="salary-1" id="salary-1" class="inputbox"  autocomplete="off" />';
                            echo '</div>';

                            echo '<div class="space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">Start Date</label>';
                            echo '<div class="relative">';
                            echo '<div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">';
                            echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">';
                            echo '<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />';
                            echo '</svg>';
                            echo '</div>';
                            echo '<input type="text" name="work-start-1" id="work-start-1" class="date-inputbox" autocomplete="off"  placeholder="Select date" required />';
                            echo '</div>';
                            echo '</div>';

                            echo '<div class="space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">End Date</label>';
                            echo '<div class="relative">';
                            echo '<div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">';
                            echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">';
                            echo '<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />';
                            echo '</svg>';
                            echo '</div>';
                            echo '<input type="text" name="work-end-1" id="work-end-1" class="date-inputbox" autocomplete="off"  placeholder="Select date" required />';
                            echo '</div>';
                            echo '</div>';

                            echo '<div class="space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">Salary Grade</label>';
                            echo '<div class="group relative">';
                            echo '<select name="salary-grade-1" id="salary-grade-1" class="dropdown salary-grade" required>';
                            // Populate with options, assuming you have an array of salary grades
                            $salaryGrades = range(1, 33); // Example salary grades
                            echo "<option>N/A</option>";
                            foreach ($salaryGrades as $grade) {
                                echo '<option value="' . $grade . '" ' . $selected . '>' . $grade . '</option>';
                            }
                            echo '</select>';
                            echo '<label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Grade</label>';
                            echo '</div>';
                            echo '</div>';

                            echo '<div class="space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">Salary Step</label>';
                            echo '<div class="group relative">';
                            echo '<select name="salary-step-1" id="salary-step-1" class="dropdown salary-step" required>';
                            // Populate with options, assuming you have an array of salary steps
                            $salarySteps = range(1, 8); // Example salary steps
                            echo "<option>N/A</option>";
                            foreach ($salarySteps as $step) {
                                echo '<option value="' . $step . '" >' . $step . '</option>';
                            }
                            echo '</select>';
                            echo '<label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Step</label>';
                            echo '</div>';
                            echo '</div>';

                            echo '<div class="space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">Appointment Status</label>';
                            echo '<div class="group relative">';
                            echo '<select name="appointment-status-1" id="appointment-status-1" class="dropdown appointment-status" required>';
                            $statuses = ['Permanent', 'Temporary', 'Contractual'];
                            echo "<option>N/A</option>";
                            foreach ($statuses as $status) {
                                echo '<option value="' . $status . '" ' . $selected . '>' . $status . '</option>';
                            }
                            echo '</select>';
                            echo '<label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Status</label>';
                            echo '</div>';
                            echo '</div>';

                            echo '<div class="space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">Government Service</label>';
                            echo '<div class="group relative">';
                            echo '<select name="government-service-1" id="government-service-1" class="dropdown government-service" required>';
                            echo '<option value="1">Yes</option>';
                            echo '<option value="0">No</option>';
                            echo '</select>';
                            echo '<label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select</label>';
                            echo '</div>';
                            echo '</div>';

                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
                <!-- End of Work Experience -->

                <!-- Voluntary Work Entry -->
                <div class="scale-90 mx-auto py-2" data-step>
                    <!-- Title -->
                    <div class="flex items-center justify-between gap-2">
                        <h1 class="text-xl font-bold text-slate-600">6. Voluntary Work Experience</h1>
                        <input type="text" name="voluntary-work-total" id="voluntary-work-total" class="hidden" value="<?php echo isset($empData['vol_work_experience']) ? count($empData['vol_work_experience']) : 1 ?>">
                    </div>

                    <!-- Inputs -->
                    <div class="space-y-3" id="work-vol-container">
                        <?php
                        if (isset($vol_work_experience)) {
                            foreach ($vol_work_experience as $index => $vol_work_entry) {
                                $num = $index + 1;
                                echo '<div class="mt-3 grid grid-cols-mod-7 gap-3 border-2 border-dashed border-gray-500 p-3" data-work-vol>';
                                echo '<div class="col-span-full flex justify-between p-2">';
                                echo '<h2 class="col-span-3 text-lg font-semibold">Voluntary Work Experience Entry</h2>';
                                echo '<input type="text" class="hidden" name="vol-work-id-' . $num . '" value="'.$vol_work_entry['vol_work_id'].'"/>';
                                echo '</div>';

                                echo '<div class="col-span-2 space-y-1">';
                                echo '<label for="org-name-' . $num . '" class="block text-sm font-medium text-gray-700">Name & Address of 
                                Organization</label>';
                                echo '<input type="text" name="org-name-' . $num . '" id="org-name-' . $num . '" value="' . $vol_work_entry['org_name_address'] . '" class="inputbox" autocomplete="off" />';
                                echo '</div>';

                                echo '<div class="col-span-2 space-y-1">';
                                echo '<label for="nature-of-work-' . $num . '" class="block text-sm font-medium text-gray-700">Position/Nature of Work</label>';
                                echo '<input type="text" name="nature-of-work-' . $num . '" id="nature-of-work-' . $num . '" class="inputbox" autocomplete="off" value="' . htmlspecialchars($vol_work_entry['position']) . '" />';
                                echo '</div>';

                                echo '<div class="space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">Start Date</label>';
                                echo '<div class="relative">';
                                echo '<div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">';
                                echo '<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />';
                                echo '</svg>';
                                echo '</div>';
                                echo '<input type="text" name="work-vol-start-' . $num . '" id="work-vol-start-' . $num . '" class="date-inputbox" autocomplete="off" placeholder="Select date" required value="' . htmlspecialchars($vol_work_entry['work_start']) . '" />';
                                echo '</div>';
                                echo '</div>';

                                echo '<div class="space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">End Date</label>';
                                echo '<div class="relative">';
                                echo '<div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">';
                                echo '<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />';
                                echo '</svg>';
                                echo '</div>';
                                echo '<input type="text" name="work-vol-end-' . $num . '" id="work-vol-end-' . $num . '" class="date-inputbox" autocomplete="off" placeholder="Select date" required value="' . htmlspecialchars($vol_work_entry['work_end']) . '" />';
                                echo '</div>';
                                echo '</div>';

                                echo '<div class="space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">Total Hours</label>';
                                echo '<input type="number" min="0" name="work-vol-hours-' . $num . '" id="work-vol-hours-' . $num . '" class="inputbox" autocomplete="off" value="' . htmlspecialchars($vol_work_entry['total_hours']) . '" />';
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo '<div class="mt-3 grid grid-cols-mod-7 gap-3 border-2 border-dashed border-gray-500 p-3" data-work-vol>';
                            echo '<div class="col-span-full flex justify-between p-2">';
                            echo '<h2 class="col-span-3 text-lg font-semibold">Voluntary Work Experience Entry</h2>';
                            echo '<input type="text" class="hidden" name="vol-work-id-1" value="'.null.'" />';
                            echo '</div>';

                            echo '<div class="col-span-2 space-y-1">';
                            echo '<label for="org-name-1" class="block text-sm font-medium text-gray-700">Name & Address of Organization</label>';
                            echo '<input type="text" name="org-name-1" id="org-name-1" class="inputbox" autocomplete="off" />';
                            echo '</div>';

                            echo '<div class="col-span-2 space-y-1">';
                            echo '<label for="nature-of-work-1" class="block text-sm font-medium text-gray-700">Position/Nature of Work</label>';
                            echo '<input type="text" name="nature-of-work-1" id="nature-of-work-1" class="inputbox" autocomplete="off" />';
                            echo '</div>';

                            echo '<div class="space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">Start Date</label>';
                            echo '<div class="relative">';
                            echo '<div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">';
                            echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">';
                            echo '<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />';
                            echo '</svg>';
                            echo '</div>';
                            echo '<input type="text" name="work-vol-start-1" id="work-vol-start-1" class="date-inputbox" autocomplete="off" placeholder="Select date" required />';
                            echo '</div>';
                            echo '</div>';

                            echo '<div class="space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">End Date</label>';
                            echo '<div class="relative">';
                            echo '<div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">';
                            echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">';
                            echo '<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />';
                            echo '</svg>';
                            echo '</div>';
                            echo '<input type="text" name="work-vol-end-1" id="work-vol-end-1" class="date-inputbox" autocomplete="off" placeholder="Select date" required />';
                            echo '</div>';
                            echo '</div>';

                            echo '<div class="space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">Total Hours</label>';
                            echo '<input type="number" min="0" name="work-vol-hours-1" id="work-vol-hours-1" class="inputbox" autocomplete="off" />';
                            echo '</div>';
                            echo '</div>';
                        }

                        ?>
                    </div>
                </div>
                <!-- End of Voluntary Work Experience -->

                <!-- Learning and Developement -->
                <div class="scale-90 mx-auto py-2" data-step>
                    <!-- Title -->
                    <div class="flex items-center justify-between gap-2">
                        <h1 class="text-xl font-bold text-slate-600">7. Learning and Developement Interventions / Trainings Attended</h1>
                        <input type="text" name="learning-development-total" id="learning-development-total" class="hidden" value="<?php echo isset($empData['learning_dev']) ? count($empData['learning_dev']) : 1 ?>">
                    </div>

                    <!-- Inputs -->
                    <div class="space-y-3" id="training-container">
                        <?php
                        if (isset($learning_development)) {
                            foreach ($learning_development as $index => $learning_dev_entry) {
                                $num = $index + 1;
                                echo '<div class="mt-3 grid grid-cols-4 gap-3 border-2 border-dashed border-gray-500 p-3" data-training>';
                                echo '<div class="col-span-full flex justify-between p-2">';
                                echo '<h2 class="col-span-3 text-lg font-semibold" id="training-title-' . $num . '">Learning and Development Entry</h2>';
                                echo '<input type="text" class="hidden" name="learning-dev-id-'. $num .'" value="'.$learning_dev_entry['learning_dev_id'].'" />';

                                echo '</div>';

                                echo '<div class="col-span-2 space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">Learning and Development Training Title</label>';
                                echo '<input type="text" name="training-name-' . $num . '" id="training-name-' . $num . '" class="inputbox" autocomplete="off" value="' . htmlspecialchars($learning_dev_entry['training_name']) . '" />';
                                echo '</div>';

                                echo '<div class="col-span-2 space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">Sponsored / Conducted by</label>';
                                echo '<input type="text" name="training-sponsor-' . $num . '" id="training-sponsor-' . $num . '" class="inputbox" autocomplete="off" value="' . htmlspecialchars($learning_dev_entry['sponsor']) . '" />';
                                echo '</div>';

                                echo '<div class="space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">Start Date</label>';
                                echo '<div class="relative">';
                                echo '<div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">';
                                echo '<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />';
                                echo '</svg>';
                                echo '</div>';
                                echo '<input type="text" name="training-start-' . $num . '" id="training-start-' . $num . '" class="date-inputbox" autocomplete="off" placeholder="Select date" required value="' . htmlspecialchars($learning_dev_entry['training_start']) . '" />';
                                echo '</div>';
                                echo '</div>';

                                echo '<div class="space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">End Date</label>';
                                echo '<div class="relative">';
                                echo '<div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">';
                                echo '<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />';
                                echo '</svg>';
                                echo '</div>';
                                echo '<input type="text" name="training-end-' . $num . '" id="training-end-' . $num . '" class="date-inputbox" autocomplete="off" placeholder="Select date" required value="' . htmlspecialchars($learning_dev_entry['training_end']) . '" />';
                                echo '</div>';
                                echo '</div>';

                                echo '<div class="space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">Training Type</label>';
                                echo '<div class="group relative">';
                                echo '<select name="training-type-' . $num . '" id="training-type-' . $num . '" class="dropdown" required>';
                                $training_types = ['Managerial', 'Supervisory', 'Technical', 'Foundation'];

                                $selected  = ($learning_dev_entry['training_type'] == 'N/A') ? 'selected' : '';

                                echo "<option value='N/A' $selected>N/A</option>";
                                foreach ($training_types as $type) {
                                    $selected = ($learning_dev_entry['training_type'] === $type) ? 'selected' : '';
                                    echo '<option value="' . $type . '" ' . $selected . '>' . $type . '</option>';
                                }
                                echo '</select>';
                                echo '<label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Status</label>';
                                echo '</div>';
                                echo '</div>';

                                echo '<div class="space-y-1">';
                                echo '<label class="block text-sm font-medium text-gray-700">Total Hours</label>';
                                echo '<input type="number" min="0" name="training-hours-' . $num . '" id="training-hours-' . $num . '" class="inputbox" autocomplete="off" value="' . htmlspecialchars($learning_dev_entry['total_hours']) . '" />';
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo '<div class="mt-3 grid grid-cols-4 gap-3 border-2 border-dashed border-gray-500 p-3" data-training>';
                            echo '<div class="col-span-full flex justify-between p-2">';
                            echo '<h2 class="col-span-3 text-lg font-semibold" id="training-title-1">Learning and Development Entry</h2>';
                            echo '<input type="text" name="learning-dev-id-1" value="'.null.'">';
                            echo '</div>';

                            echo '<div class="col-span-2 space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">Learning and Development Training Title</label>';
                            echo '<input type="text" name="training-name-1" id="training-name-1" class="inputbox" autocomplete="off" />';
                            echo '</div>';

                            echo '<div class="col-span-2 space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">Sponsored / Conducted by</label>';
                            echo '<input type="text" name="training-sponsor-1" id="training-sponsor-1" class="inputbox" autocomplete="off"  />';
                            echo '</div>';

                            echo '<div class="space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">Start Date</label>';
                            echo '<div class="relative">';
                            echo '<div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">';
                            echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">';
                            echo '<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />';
                            echo '</svg>';
                            echo '</div>';
                            echo '<input type="text" name="training-start-1" id="training-start-1" class="date-inputbox" autocomplete="off" placeholder="Select date" required  />';
                            echo '</div>';
                            echo '</div>';

                            echo '<div class="space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">End Date</label>';
                            echo '<div class="relative">';
                            echo '<div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">';
                            echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">';
                            echo '<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />';
                            echo '</svg>';
                            echo '</div>';
                            echo '<input type="text" name="training-end-1" id="training-end-1" class="date-inputbox" autocomplete="off" placeholder="Select date" required  />';
                            echo '</div>';
                            echo '</div>';

                            echo '<div class="space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">Training Type</label>';
                            echo '<div class="group relative">';
                            echo '<select name="training-type-1" id="training-type-1" class="dropdown" required>';
                            $training_types = ['Managerial', 'Supervisory', 'Technical', 'Foundation'];

                            echo "<option value='N/A' >N/A</option>";
                            foreach ($training_types as $type) {
                                $selected = ($learning_dev_entry['training_type'] === $type) ? 'selected' : '';
                                echo '<option value="' . $type . '" ' . $selected . '>' . $type . '</option>';
                            }
                            echo '</select>';
                            echo '<label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Status</label>';
                            echo '</div>';
                            echo '</div>';

                            echo '<div class="space-y-1">';
                            echo '<label class="block text-sm font-medium text-gray-700">Total Hours</label>';
                            echo '<input type="number" min="0" name="training-hours-1" id="training-hours-1" class="inputbox" autocomplete="off"  />';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
                <!-- End of Learning and Development -->

                <!-- Other Information -->
                <div class="scale-90 mx-auto py-2" data-step>
                    <!-- Title -->
                    <div class="space-y-3">
                        <h1 class="text-xl font-bold text-slate-600 ">8. Other Information</h1>
                        <p class="text-sm text-slate-600">You can leave the fields <strong>blank</strong> if not applicable</p>
                    </div>

                    <!-- Inputs -->
                    <div class="mt-3 grid grid-cols-3 gap-x-5">
                        <div class="my-3 flex items-center justify-between">
                            <label class="font-medium text-gray-700">Skills and Hobbies</label>
                            <input type="text" name="skills-total-entry" id="skills-total-entry" class="hidden" value="<?php echo isset($empData['skill']) ? count($empData['skill']) : 1 ?>">
                        </div>
                        <div class="my-3 flex items-center justify-between">
                            <label class="font-medium text-gray-700">Non Academic Recognition</label>
                            <input type="text" name="recognition-total-entry" id="recognition-total-entry" class="hidden" value="<?php echo isset($empData['non_acad_recognition']) ? count($empData['non_acad_recognition']) : 1 ?>">
                        </div>
                        <div class="my-3 flex items-center justify-between">
                            <label class="font-medium text-gray-700">Organization Membership</label>
                            <input type="text" name="membership-total-entry" id="membership-total-entry" class="hidden" value="<?php echo isset($empData['org_membership']) ? count($empData['org_membership']) : 1 ?>">
                        </div>

                        <!-- Skills and Hobbies -->
                        <div class="space-y-1 p-2" id="skill-container">
                            <?php
                            if (isset($skill)) {
                                foreach ($skill as $index => $skill_entry) {
                                    $num = $index + 1;
                                    // echo "<pre>";
                                    // print_r($skill_entry);
                                    // echo "</pre>";
                                    echo '<div class="grid grid-cols-mod-2 gap-1" data-skill>';
                                    echo '<input type="text" name="skill-id-'. $num .'" class="hidden" value="' . $skill_entry['skill_id'].'" />';
                                    echo '<input type="text" name="skill-' . $num . '" id="skill-' . $num . '" class="inputbox" autocomplete="off" value="' . htmlspecialchars($skill_entry['skill']) . '" />';
                                    echo '</div>';
                                }
                            } else {
                                echo '<div class="grid grid-cols-mod-2 gap-1" data-skill>';
                                echo '<input type="text" name="skill-id-1" class="hidden" value="'.null.'" />';
                                echo '<input type="text" name="skill-1" id="skill-1" class="inputbox" autocomplete="off" />';
                                echo '</div>';
                            }
                            ?>
                        </div>

                        <!-- Non Academic Recognition -->
                        <div class="space-y-1 p-2" id="recognition-container">
                            <?php
                            if (isset($recognition)) {
                                foreach ($recognition as $index => $recognition_entry) {
                                    $num = $index + 1;
                                    echo '<div class="grid grid-cols-mod-2 gap-1" data-recognition>';
                                    echo '<input type="text" name="recognition-id-'. $num .'" class="hidden" value="'.$recognition_entry['recognition_id'].'" />';
                                    echo '<input type="text" name="recognition-' . $num . '" id="recognition-' . $num . '" class="inputbox" autocomplete="off" value="' . htmlspecialchars($recognition_entry['recognition']) . '" />';
                                    echo '</div>';
                                }
                            } else {
                                echo '<div class="grid grid-cols-mod-2 gap-1" data-recognition>';
                                echo '<input type="text" name="recognition-id-1" class="hidden" value="'.null.'" />';
                                echo '<input type="text" name="recognition-1" id="recognition-1" class="inputbox" autocomplete="off" />';
                                echo '</div>';
                            }
                            ?>
                        </div>

                        <!-- Organization Membership -->
                        <div class="space-y-1 p-2" id="membership-container">
                            <?php
                            if (isset($org_membership)) {
                                foreach ($org_membership as $index => $membership_entry) {
                                    $num = $index + 1;
                                    echo '<div class="grid grid-cols-mod-2 gap-1" data-membership>';
                                    echo '<input type="text" name="org-membership-id-'. $num .'" class="hidden" value="'.$membership_entry['org_membership_id'].'" />';
                                    echo '<input type="text" name="membership-' . $num . '" id="membership-' . $num . '" class="inputbox" autocomplete="off" value="' . htmlspecialchars($membership_entry['org_membership']) . '" />';
                                    echo '</div>';
                                }
                            } else {
                                echo '<div class="grid grid-cols-mod-2 gap-1" data-membership>';
                                echo '<input type="text" name="membership-id-1" class="hidden" />';
                                echo '<input type="text" name="membership-1" id="membership-1" class="inputbox" autocomplete="off" />';
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- End of Other Information -->

                <!-- Start of Additional Question -->
                <div class="scale-90 mx-auto space-y-3 py-2" data-step>
                    <!-- Title -->
                    <h1 class="text-xl font-bold text-slate-600">9. Additional Questions</h1>

                    <!-- Questions -->
                    <table class="w-full table-auto border-2 border-slate-400">
                        <thead>
                            <tr class="bg-blue-200">
                                <th class="w-10 px-6 py-4 font-medium text-slate-500">No.</th>
                                <th class="px-6 py-4 font-medium text-slate-500">Questions</th>
                                <th class="w-10 px-6 py-4 font-medium text-slate-500">Yes</th>
                                <th class="w-10 px-6 py-4 font-medium text-slate-500">No</th>
                                <th class="w-64 px-6 py-4 font-medium text-slate-500">Additional Information</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-6 py-4">34.<span class="text-red-500 font-semibold">*</span></td>
                                <td class="px-6 py-4 text-justify">Are you related by consanguinity or affinity to the appointing or recommending authority, or to the chief of bureau or office or to the person who has immediate supervision over you in the Office, Bureau or Department where you will be apppointed,</td>
                            </tr>
                            <tr>
                                <td class="w-10 px-6 py-4">&nbsp;</td>
                                <td class="px-6 py-4">a. within the third degree?</td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="third-degree" value="1" class="mx-auto size-5" <?php echo ($questionnaire['relative_third_degree'] == 1) ? 'checked' : ''; ?> />
                                </td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="third-degree" value="0" class="mx-auto size-5" <?php echo ($questionnaire['relative_third_degree'] == 0) ? 'checked' : ''; ?> />
                                </td>
                                <td class="w-10 px-6 py-4">&nbsp;</td>
                            </tr>

                            <tr>
                                <td class="w-10 px-6 py-4">&nbsp;</td>
                                <td class="px-6 py-4">b. within the fourth degree (for Local Government Unit - Career Employees)?</td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="fourth-degree" value="1" class="mx-auto size-5" <?php echo ($questionnaire['relative_fourth_degree'] == 1) ? 'checked' : ''; ?> />
                                </td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="fourth-degree" value="0" class="mx-auto size-5" <?php echo ($questionnaire['relative_fourth_degree'] == 0) ? 'checked' : ''; ?> />
                                </td>

                                <td class="px-6 py-4">
                                    <input type="text" name="consanguinity-info" class="inputbox mx-auto" value="<?php echo ($questionnaire['relative_third_degree'] == 1) ? $questionnaire['relative_detail'] : ''; ?>" placeholder="If YES, provide details" />
                                </td>
                            </tr>

                            <tr class="border-t-2 border-slate-400">
                                <td class="px-6 py-4">35.<span class="text-red-500 font-semibold">*</span></td>
                                <td class="px-6 py-4">a. Have you ever been found guilty of any administrative offense?</td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="admin-offense" value="1" class="mx-auto size-5" <?php echo ($questionnaire['admin_offense'] == 1) ? 'checked' : ''; ?> />
                                </td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="admin-offense" value="0" class="mx-auto size-5" <?php echo ($questionnaire['admin_offense'] == 0) ? 'checked' : ''; ?> />
                                </td>

                                <td class="px-6 py-4">
                                    <input type="text" name="admin-offense-info" class="inputbox mx-auto" value="<?php echo ($questionnaire['admin_offense'] == 1) ? $questionnaire['admin_offense_details'] : ''; ?>" placeholder="If YES, provide details" />
                                </td>
                            </tr>

                            <tr>
                                <td class="px-6 py-4">&nbsp;</td>
                                <td class="px-6 py-4">b. Have you been criminally charged before any court?</td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="crim-offense" value="1" class="mx-auto size-5" <?php echo ($questionnaire['criminal_offense'] == 1) ? 'checked' : ''; ?> />
                                </td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="crim-offense" value="0" class="mx-auto size-5" <?php echo ($questionnaire['criminal_offense'] == 0) ? 'checked' : ''; ?> />
                                </td>

                                <td class="px-6 py-4">
                                    <input type="text" name="crim-offense-info" class="inputbox mx-auto" value="<?php echo ($questionnaire['criminal_offense'] == 1) ? $questionnaire['criminal_case_status'] : ''; ?>" placeholder="Status of Case/s" />
                                </td>
                            </tr>

                            <tr>
                                <td class="w-10 px-6 py-4">&nbsp;</td>
                                <td class="px-6 py-4">&nbsp;</td>
                                <td class="w-10 px-6 py-4">&nbsp;</td>
                                <td class="w-10 px-6 py-4">&nbsp;</td>
                                <td class="px-6 py-4">
                                    <div class="relative">
                                        <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                            </svg>
                                        </div>
                                        <input type="text" name="date-filed" id="date-filed" class="date-inputbox" autocomplete="off" value="<?php echo ($questionnaire['criminal_offense'] == 1) ? $questionnaire['criminal_date_filed'] : ''; ?>" placeholder="Date Filed" />
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-t-2 border-slate-400">
                                <td class="px-6 py-4">36.<span class="text-red-500 font-semibold">*</span></td>
                                <td class="px-6 py-4">Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?</td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="crime-conviction" value="1" class="mx-auto size-5" <?php echo ($questionnaire['criminal_conviction'] == 1) ? 'checked' : ''; ?> />
                                </td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="crime-conviction" value="0" class="mx-auto size-5" <?php echo ($questionnaire['criminal_conviction'] == 0) ? 'checked' : ''; ?> />
                                </td>

                                <td class="px-6 py-4">
                                    <input type="text" name="crime-conviction-info" class="inputbox mx-auto" value="<?php echo ($questionnaire['criminal_conviction'] == 1) ? $questionnaire['criminal_conviction_details'] : ''; ?>" placeholder="If YES, provide details" />
                                </td>
                            </tr>
                            <tr class="border-t-2 border-slate-400">
                                <td class="px-6 py-4">37.<span class="text-red-500 font-semibold">*</span></td>
                                <td class="px-6 py-4 text-justify">Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector?</td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="separation" value="1" class="mx-auto size-5" <?php echo ($questionnaire['service_separation'] == 1) ? 'checked' : ''; ?> />
                                </td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="separation" value="0" class="mx-auto size-5" <?php echo ($questionnaire['service_separation'] == 0) ? 'checked' : ''; ?> />
                                </td>

                                <td class="px-6 py-4">
                                    <input type="text" name="separation-info" class="inputbox mx-auto" value="<?php echo ($questionnaire['service_separation'] == 1) ? $questionnaire['separation_details'] : ''; ?>" placeholder="If YES, provide details" />
                                </td>
                            </tr>
                            <tr class="border-t-2 border-slate-400">
                                <td class="px-6 py-4">38.<span class="text-red-500 font-semibold">*</span></td>
                                <td class="px-6 py-4 text-justify">a. Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?</td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="candidate" value="1" class="mx-auto size-5" <?php echo ($questionnaire['election_candidate'] == 1) ? 'checked' : ''; ?> />
                                </td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="candidate" value="0" class="mx-auto size-5" <?php echo ($questionnaire['election_candidate'] == 0) ? 'checked' : ''; ?> />
                                </td>

                                <td class="px-6 py-4">
                                    <input type="text" name="candidate-info" class="inputbox mx-auto" value="<?php echo ($questionnaire['election_candidate'] == 1) ? $questionnaire['election_candidate_details'] : ''; ?>" placeholder="If YES, provide details" />
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">&nbsp;</td>
                                <td class="px-6 py-4 text-justify">b. Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?</td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="gov-resignation" value="1" class="mx-auto size-5" <?php echo ($questionnaire['gov_resignation'] == 1) ? 'checked' : ''; ?> />
                                </td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="gov-resignation" value="0" class="mx-auto size-5" <?php echo ($questionnaire['gov_resignation'] == 0) ? 'checked' : ''; ?> />
                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="gov-resignation-info" class="inputbox mx-auto" value="<?php echo ($questionnaire['gov_resignation'] == 1) ? $questionnaire['gov_resignation_details'] : ''; ?>" placeholder="If YES, provide details" />
                                </td>
                            </tr>
                            <tr class="border-t-2 border-slate-400">
                                <td class="px-6 py-4">39.<span class="text-red-500 font-semibold">*</span></td>
                                <td class="px-6 py-4 text-justify">Have you acquired the status of an immigrant or permanent resident of another country?</td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="foreign-residency" value="1" class="mx-auto size-5" <?php echo ($questionnaire['immigrant'] == 1) ? 'checked' : ''; ?> />
                                </td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="foreign-residency" value="0" class="mx-auto size-5" <?php echo ($questionnaire['immigrant'] == 0) ? 'checked' : ''; ?> />
                                </td>

                                <td class="px-6 py-4">
                                    <div class="group relative">
                                        <select name="foreign-residency-info" id="foreign-residency-info" class="dropdown" required>
                                            <?php
                                            $country_query = "SELECT * FROM country";
                                            $countries = select_info_multiple_key($country_query);
                                            $selected = ($questionnaire['immigrant_details'] == 'N/A') ? 'selected' : '';

                                            echo "<option value=\"N/A\" $selected>N/A</option>";
                                            foreach ($countries as $country) {
                                                $selected = ($questionnaire['immigrant_details'] == $country['country_id']) ? 'selected' : '';
                                                echo "<option value='" . $country['country_id'] . "$selected'> " . $country['country'] . "";
                                            }
                                            ?>
                                        </select>
                                        <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">If YES, choose country</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-t-2 border-slate-400">
                                <td class="px-6 py-4">40.<span class="text-red-500 font-semibold">*</span></td>
                                <td class="px-6 py-4 text-justify">Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:</td>
                            </tr>
                            <tr>
                                <td class="w-10 px-6 py-4">&nbsp;</td>
                                <td class="px-6 py-4">a. Are you a member of any indigenous group?</td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="indigenous" value="1" class="mx-auto size-5" <?php echo ($questionnaire['indigenous'] == 1) ? 'checked' : ''; ?> />
                                </td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="indigenous" value="0" class="mx-auto size-5" <?php echo ($questionnaire['indigenous'] == 0) ? 'checked' : ''; ?> />
                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="indigenous-info" class="inputbox mx-auto" value="<?php echo ($questionnaire['indigenous'] == 1) ? $questionnaire['indigenous_details'] : ''; ?>" placeholder="If YES, please specify" />
                                </td>
                            </tr>
                            <tr>
                                <td class="w-10 px-6 py-4">&nbsp;</td>
                                <td class="px-6 py-4">b. Are you a person with disability?</td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="pwd" value="1" class="mx-auto size-5" <?php echo ($questionnaire['disability'] == 1) ? 'checked' : ''; ?> />
                                </td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="pwd" value="0" class="mx-auto size-5" <?php echo ($questionnaire['disability'] == 0) ? 'checked' : ''; ?> />
                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="pwd-info" class="inputbox mx-auto" value="<?php echo ($questionnaire['disability'] == 1) ? $questionnaire['disability_id'] : ''; ?>" placeholder="If YES, provide ID Number" />
                                </td>
                            </tr>
                            <tr>
                                <td class="w-10 px-6 py-4">&nbsp;</td>
                                <td class="px-6 py-4">c. Are you a solo parent?</td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="solo-parent" id="solo-parent-yes" value="1" class="mx-auto size-5" <?php echo ($questionnaire['single_parent'] == 1) ? 'checked' : ''; ?> required />
                                </td>
                                <td class="px-6 py-4">
                                    <input type="radio" name="solo-parent" id="solo-parent-no" value="0" class="mx-auto size-5" <?php echo ($questionnaire['single_parent'] == 0) ? 'checked' : ''; ?> />
                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="solo-parent-info" class="inputbox mx-auto" value="<?php echo ($questionnaire['single_parent'] == 1) ? $questionnaire['single_parent_id'] : ''; ?>" placeholder="If YES, provide ID Number" />
                                </td>
                            </tr>

                        </tbody>
                    </table>

                    <div class="space-y-3">
                        <div class="flex items-center justify-between bg-blue-200 px-6 py-4">
                            <h1>41. References <span class="text-sm font-medium italic">(Person or not related by consanguinity or affinity to applicant/appointee)</span></h1>
                            <input type="text" name="reference-total-entry" id="reference-total-entry" class="hidden" value="<?php echo isset($reference) ? count($empData['reference']) : 1 ?>">
                        </div>

                        <div class="space-y-1 border-2 border-slate-400 p-2" id="reference-container">
                            <div class="grid grid-cols-mod-4 gap-2">
                                <h2 class="px-6 py-4 font-medium text-slate-500">Name</h2>
                                <h2 class="px-6 py-4 font-medium text-slate-500">Address</h2>
                                <h2 class="px-6 py-4 font-medium text-slate-500">Telephone Number</h2>
                            </div>

                            <!-- <div class="grid grid-cols-mod-4 gap-2" data-reference>
                                <input type="text" name="reference-name-1" id="reference-name-1" class="inputbox" autocomplete="off" />
                                <input type="text" name="reference-address-1" id="reference-address-1" class="inputbox" autocomplete="off" />
                                <input type="number" min="0" name="reference-telno-1" id="reference-telno-1" class="inputbox" autocomplete="off" />
                                <button type="button" class="del-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </div> -->

                            <?php
                            if(isset($reference)){
                                foreach($reference as $index => $reference_entry){
                                    $num = $index + 1;

                                    echo '<div class="grid grid-cols-mod-4 gap-2" data-reference>';
                                    echo '<input type="text" name="reference-name-' . $num . '" id="reference-name-' . $num . '" class="inputbox" value="' . $reference_entry['name'] . '" autocomplete="off" />';
                                    echo '<input type="text" name="reference-address-' . $num . '" id="reference-address-' . $num . '" class="inputbox" value="' . $reference_entry['address'] . '" autocomplete="off" />';
                                    echo '<input type="text" name="reference-telno-' . $num . '" id="reference-telno-' . $num . '" class="inputbox" value="' . $reference_entry['tel_no'] . '" autocomplete="off" />';
                                    echo '</div>';
                                }
                            } else{
                                echo '<div class="grid grid-cols-mod-4 gap-2" data-reference>';
                                echo '<input type="text" name="reference-name-1" id="reference-name-1" class="inputbox" autocomplete="off" />';
                                echo '<input type="text" name="reference-address-1" id="reference-address-1" class="inputbox" autocomplete="off" />';
                                echo '<input type="text" name="reference-telno-1" id="reference-telno-1" class="inputbox" autocomplete="off" />';
                                echo '</div>';
                            }
                            
                            ?>
                        </div>
                    </div>
                </div>
                <!-- End of Additional Question -->

                <!-- Start of Credentials -->
                <div class="scale-90 mx-auto space-y-3 py-2" data-step>
                    <div class="space-y-1">
                        <h1 class="text-xl font-bold text-slate-600">10. Credentials</h1>
                        <input type="text" name="date-accomplished" id="date-accomplished" class="hidden">
                        <p class="rounded-sm bg-gray-200 p-3 text-justify text-sm text-slate-600">I declare under oath that I have personally accomplished this Personal Data Sheet which is a true, correct and complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the Philippines. I authorize the agency head/authorized representative to verify/validate the contents stated herein. I agree that any misrepresentation made in this document and its attachments shall cause the filing of administrative/criminal case/s against me.</p>
                    </div>

                    <div class="flex items-center justify-between border-2 bg-blue-200 px-6 py-4">
                        <h1 class="text-slate-700">Government Issued ID <span class="text-sm font-medium italic">(i.e.Passport, GSIS, SSS, PRC, Driver's License, etc.)</span> <span class="text-sm font-bold">PLEASE INDICATE ID Number and Date of Issuance</span></h1>
                    </div>

                    <div class="grid grid-cols-2 border-2 border-slate-400">
                        <div class="flex items-center px-6 py-2">
                            <label class="justify-items-end font-medium text-gray-700">Government Issued ID :</label>
                        </div>
                        <div class="px-6 py-2">
                            <input type="text" name="gov-issued-id" id="gov-issued-id" class="inputbox" value="<?php echo isset($validation) ? $validation['id_type']  : 'N/A' ?>" autocomplete="off" />
                        </div>
                        <div class="flex items-center px-6 py-2">
                            <label class="justify-items-end font-medium text-gray-700">ID/License/Passport No. :</label>
                        </div>
                        <div class="px-6 py-2">
                            <input type="text" name="gov-issued-id-no" id="gov-issued-id-no" class="inputbox" value="<?php echo isset($validation) ? $validation['id_no']  : 'N/A' ?>" autocomplete="off" />
                        </div>
                        <div class="flex items-center px-6 py-2">
                            <label class="justify-items-end font-medium text-gray-700">Date of Issuance :</label>
                        </div>
                        <div class="px-6 py-2">
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                    </svg>
                                </div>
                                <input type="text" name="gov-id-issuance-date" id="gov-id-issuance-date" class="date-inputbox" autocomplete="off" placeholder="Select date" />
                            </div>
                        </div>
                        <div class="flex items-center px-6 py-2">
                            <label class="justify-items-end font-medium text-gray-700">Place of Issuance :</label>
                        </div>
                        <div class="px-6 py-2">
                            <input type="text" name="gov-id-issuance-place" id="gov-id-issuance-place" class="inputbox" value="<?php echo isset($validation) ? $validation['issuance_date']  : 'N/A' ?>" autocomplete="off" />
                        </div>
                    </div>

                    <div class="flex items-center justify-between border-2 bg-blue-200 px-6 py-4">
                        <h1 class="text-slate-700">Upload Pictures: <span class="text-sm font-medium italic">ID picture taken within the last 6 months 3.5 cm. X 4.5 cm (passport size) With full and handwritten name tag and signature over printed name. </span> <span class="text-sm font-bold uppercase">Computer generated or photocopied picture is not acceptable</span></h1>
                    </div>

                    <div class="grid grid-cols-2 border-2 p-2 border-slate-400">
                        <div class="px-6 py-2">
                            <label class="block font-medium text-slate-700">ID Picture</label>
                        </div>
                        <div class="px-6 py-2">
                            <input type="file" name="gov-id-img" id="gov-id-img" class="border text-sm valid:text-slate-700 text-slate-500 border-slate-600 file:bg-blue-500
                            file:text-white file:text-sm file:border-0 file:px-2 file:py-2 file:disabled" value="<?php echo isset($validation) ? $validation['id_photo']  : 'N/A' ?>" required>
                        </div>
                        <div class="px-6 py-2">
                            <label class="block font-medium text-slate-700">Right Thumbmark</label>
                        </div>
                        <div class="px-6 py-2">
                            <input type="file" name="right-thumb-img" id="right-thumb-img" class="border text-sm valid:text-slate-700 text-slate-500 border-slate-600 file:bg-blue-500
                            file:text-white file:text-sm file:border-0 file:px-2 file:py-2 file:disabled" value="<?php echo isset($validation) ? $validation['right_thumbmark']  : 'N/A' ?>" required>
                        </div>
                        <div class="px-6 py-2">
                            <label class="block font-medium text-slate-700">Signature</label>
                        </div>
                        <div class="px-6 py-2">
                            <input type="file" name="signature-img" id="signature-img" class="border text-sm valid:text-slate-700 text-slate-500 border-slate-600 file:bg-blue-500
                            file:text-white file:text-sm file:border-0 file:px-2 file:py-2 file:disabled" value="<?php echo isset($validation) ? $validation['signature']  : 'N/A' ?>" required>
                        </div>

                    </div>
                </div>
                <!-- End of Credentials -->
            </div>

        </form>
        <div class="p-4 border-t-2 sticky bg-white bottom-0">
            <div class="flex items-center justify-end gap-1">
                <button class="px-3 py-2 select-none bg-red-500 hover:bg-red-700 active:bg-red-900 text-sm rounded-md text-white font-medium" id="close-edit-dialog">Cancel</button>
                <button class="opacity-50 select-none pointer-events-none px-3 py-2 bg-blue-500 hover:bg-blue-700 active:bg-blue-900 text-sm rounded-md text-white font-medium" id="edit-changes">Save Changes</button>
            </div>
        </div>
    </dialog>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</body>

</html>