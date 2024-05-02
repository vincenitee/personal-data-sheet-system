<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup</title>
    <link rel="stylesheet" href="./assets/css/styles.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    <script type="module" src="./assets/js/index.js" defer></script>
</head>

<body class="box-border grid h-screen grid-rows-mod-3 bg-gray-200 font-poppins">
    <?php include './assets/components/header.php' ?>
    <?php include './assets/components/missing_info_dialog.php' ?>

    <main class="mx-auto w-full overflow-y-auto rounded-md bg-white p-1">
        <form data-multi-step action="./assets/database/insert.php" method="post" class="p-4">
            <?php include './assets/form_steps/personal_details.php' ?>

            <?php include './assets/form_steps/family_background.php' ?>

            <?php include './assets/form_steps/education_background.php' ?>

            <?php include './assets/form_steps/cs_eligibility.php' ?>
            
            <?php include './assets/form_steps/work_exp.php' ?> 

            <?php include './assets/form_steps/vol_work_exp.php' ?>

            <?php include './assets/form_steps/learning_and_dev.php' ?>

            <?php include './assets/form_steps/other_info.php' ?>
            
            <?php include './assets/form_steps/additional_questions.php' ?>

            <?php include './assets/form_steps/credentials.php' ?>
        </form>
    </main>

    <?php include './assets/components/button_section.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</body>

</html>