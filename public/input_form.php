<?php
session_start();
if(!isset($_SESSION['admin_id'])){
    header('Location: index.php');
    exit();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Entry</title>
    <link rel="stylesheet" href="./assets/css/styles.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    <script type="module" src="./assets/js/form.js" defer></script>
    <script type="module" src="./assets/js/sidebar.js" defer></script>
</head>

<body class="box-border grid h-screen grid-rows-mod-3 bg-gray-200 font-poppins">
    <?php include './assets/components/header_nav.php' ?>
    <?php include './assets/components/sidebar.php' ?>
    <?php include './assets/components/error_dialog.php' ?>

    <main class="mx-auto w-full overflow-y-auto rounded-md bg-white p-1">
        <form data-multi-step action="./assets/database/insert_pds_entry.php" method="post" class="p-4">
            <div class="w-[65%] mx-auto">
                <?php include './assets/form_steps/personal_details.php' ?>
            </div>
            
            <div class="w-[65%] mx-auto">
                <?php include './assets/form_steps/family_background.php' ?>
            </div>

            <div class="w-[65%] mx-auto">
                <?php include './assets/form_steps/education_background.php' ?>
            </div>

            <div class="w-[65%] mx-auto">
                <?php include './assets/form_steps/cs_eligibility.php' ?>
            </div>

            <div class="w-[65%] mx-auto">
                <?php include './assets/form_steps/work_exp.php' ?>
            </div>

            <div class="w-[67%] mx-auto">
                <?php include './assets/form_steps/vol_work_exp.php' ?>
            </div>

            <div class="w-[65%] mx-auto">
                <?php include './assets/form_steps/learning_and_dev.php' ?>
            </div>

            <div class="w-[65%] mx-auto">
                <?php include './assets/form_steps/other_info.php' ?>
            </div>

            <div class="w-[65%] mx-auto">
                <?php include './assets/form_steps/additional_questions.php' ?>
            </div>
            <div class="w-3/4 mx-auto">
                <?php include './assets/form_steps/credentials.php' ?>
            </div>
        </form>
    </main>

    <?php include './assets/components/button_section.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</body>

</html>