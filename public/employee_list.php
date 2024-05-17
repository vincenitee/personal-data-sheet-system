<?php include './assets/database/sql_statements.php'; ?>
<?php include './assets/database/fetch_employee.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Employees</title>
    <link rel="stylesheet" href="./assets/css/styles.css" />
    <script type="module" src="./assets/js/sidebar.js" defer></script>
    <script type="module" src="./assets/js/employee.js" defer></script>
</head>

<body class="font-poppins bg-gray-100 transition-all duration-500">

    <?php include './assets/components/header_basic.php'; ?>
    <?php include './assets/components/sidebar.php'; ?>
    <?php include './assets/components/edit_info_dialog.php'; ?>

    <div class="w-[80%] px-7 py-4 mx-auto my-6 space-y-3 bg-white rounded-md">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-lg font-semibold">List of Employees</h1>
            <form action="" method="get" class="flex items-center gap-1">
                <input type="text" name="search" class="p-1.5 border-2 outline-none text-sm focus:border-slate-600" placeholder="Search..." autocomplete="off">
                <button type="submit" class="p-2 bg-blue-500 hover:bg-blue-600 active:bg-blue-700 text-white rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197M10.5 18c4.142 0 7.5-3.358 7.5-7.5S14.642 3 10.5 3 3 6.358 3 10.5 6.358 18 10.5 18z" />
                    </svg>
                </button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white rounded-md shadow-sm">
                <thead class="border-slate-600 border-b-2 text-slate-600 text-sm">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Mobile</th>
                        <th class="px-4 py-2">Position</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $employees = getEmployees();
                    if ($employees) {
                        foreach ($employees as $employee) {
                            echo generateTableRow($employee);
                        }
                    } else{
                        echo generateRowMessage();
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>