<?php include './assets/database/sql_statements.php'; ?>
<?php include './assets/database/employee_functions.php'; ?>

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

    <div class="w-[80%] h-[85vh] overflow-y-auto mx-auto my-6 space-y-3 bg-white rounded-md shadow-lg
    ">
        <h2 class="px-6 py-3 text-lg text-slate-700 font-medium">Employees</h2>

        <form action="" method="get" class="px-4">
            <!-- search box and button -->
            <div class="shadow-sm border focus:border flex justify-between rounded-sm p-2">
                <div class="flex items-center gap-1 flex-2 w-full">
                    <input type="text" name="search" id="search" class="px-2 py-1 outline-none text-sm w-full" placeholder="Search...">
                    <button type="button" id="clear-search" class="bg-slate-200 text-slate-400 hover:bg-slate-400 active:bg-slate-500 hover:text-slate-700 rounded-full p-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <div class="border-l flex items-center gap-2 px-2">
                        <label class="text-sm text-nowrap">Search By</label>
                        <select name="search-category" id="search-category" class="px-2 py-1 text-sm border rounded">
                            <option value="All">All</option>
                            <option value="Education">Education</option>
                            <option value="Training">Trainings Attended</option>
                            <option value="CS Eligibility">CS Eligibility</option>
                        </select>
                    </div>
                </div>

                <div class="flex items-center gap-1 flex-1 px-2 border-slate-300">
                    <button class="bg-blue-500 px-2 py-1 flex items-center gap-1 text-white rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                        <span class="text-sm">Search</span>
                    </button>
                </div>

            </div>
        </form>

        <div class="overflow-x-auto px-4">
            <table class="table-auto w-full bg-white rounded-md shadow-sm">
                <thead class="bg-gray-200 rounded-sm text-slate-600 text-sm">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Mobile</th>
                        <th class="px-4 py-2">Position</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="h-[50%] divide-y">
                    <?php
                    $employees = getEmployees();
                    if ($employees) {
                        foreach ($employees as $employee) {
                            echo generateTableRow($employee);
                        }
                    } else {
                        echo generateRowMessage(6, 'No Employee Data Found');
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</body>

</html>