<?php include './assets/database/fetch_employee.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Component/Page Test</title>
        <link rel="stylesheet" href="./assets/css/styles.css" />
        <script type="module" src="./assets/js/sidebar.js"></script>
    </head>
</head>

<body>
    <?php include './assets/components/header_basic.php'; ?>
    <?php include './assets/components/sidebar.php'; ?>
    <main class="mx-auto mt-2 w-[85%] grid grid-cols-mod-2 gap-2 border-black">
        <!-- Overview of Data Container -->
        <div class="p-4 border space-y-4">
            <!-- Information Cards Container-->
            <div class="flex justify-between py-3 border-b-2">
                <!-- Card Component -->
                <div class="py-2 px-7 flex flex-shrink-0 gap-3 items-center text-white bg-blue-400 rounded-md">
                    <div class="inline-block">
                        <h2 class="text-md font-medium">Total Employee</h2>
                        <h2 class="text-lg">0</h2>
                    </div>
                    <div class="inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                    </div>
                </div>
                <!-- Card Component -->
                <div class="py-2 px-7 flex flex-shrink-0 gap-3 items-center text-white bg-blue-400 rounded-md">
                    <div class="inline-block">
                        <h2 class="text-md font-medium">PHD Holders</h2>
                        <h2 class="text-lg">0</h2>
                    </div>
                    <div class="inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                        </svg>

                    </div>
                </div>
                <!-- Card Component -->
                <div class="py-2 px-7 flex flex-shrink-0 gap-3 items-center text-white bg-blue-400 rounded-md">
                    <div class="inline-block">
                        <h2 class="text-md font-medium">New Signups</h2>
                        <h2 class="text-lg">0</h2>
                    </div>
                    <div class="inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                    </div>
                </div>

            </div>

            <!-- List of Employees Table Container -->
            <div>
                <div class="flex justify-between items-center">
                    <h1 class="text-slate-600 font-semibold">Employees</h1>
                    <a href="employee_list.php" class="text-xs text-white font-semibold px-2 py-1 bg-blue-500 rounded cursor-pointer hover:bg-blue-600 active:bg-blue-700">View All</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="table-auto w-full bg-white rounded-md shadow-sm">
                        <thead class="border-slate-600 border-b-2 text-slate-600 text-sm">
                            <tr>
                                <th class="px-4 py-2 font-medium">ID</th>
                                <th class="px-4 py-2 font-medium">Name</th>
                                <th class="px-4 py-2 font-medium">Email</th>
                                <th class="px-4 py-2 font-medium">Mobile</th>
                                <th class="px-4 py-2 font-medium">Position</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $employees = getEmployees();
                            if ($employees) {
                                foreach ($employees as $employee) {
                                    echo generateTableRowWithoutActions($employee);
                                }
                            } else {
                                echo generateRowMessage();
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Recently Added Entries Container -->
        <div class="border">

        </div>
    </main>
</body>

</html>