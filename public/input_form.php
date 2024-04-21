<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    <script type="module" src="index.js" defer></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/flatpickr" defer></script> -->
</head>

<body class="box-border grid h-screen grid-rows-mod-3 bg-gray-200 font-poppins">
    <?php include './assets/components/header.php' ?>
    <!-- End of header -->

    <main class="mx-auto w-full overflow-y-auto rounded-md bg-white p-1">
        <form data-multi-step action="" method="post" class="p-4">
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

    <section class="flex justify-center border-t-2 bg-white p-3 px-10">
        <div class="flex w-3/4 justify-end gap-3">
            <button disabled class="cursor-not-allowed rounded-md bg-gray-200 px-6 py-2 text-sm text-gray-700 opacity-50 hover:bg-gray-300 active:bg-gray-300" id="prev-btn">Prev</button>
            <button class="rounded-md bg-green-500 px-6 py-2 text-sm text-white hover:bg-green-600 active:bg-green-700" id="next-btn">Next</button>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</body>

</html>