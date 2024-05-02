<?php include 'sql_statements.php' ?>

<div class="mx-auto w-[75%] p-1">
    <table class="w-full table-auto">
        <caption class="text-lg font-bold">
            Lists of Employees
        </caption>
        <thead>
            <tr class="border border-slate-700">
                <th class="w-10 px-6 py-4 text-sm">ID</th>
                <th class="px-6 py-4 text-sm">Full Name</th>
                <th class="px-6 py-4 text-sm">Profession</th>
                <th class="px-6 py-4 text-sm">Email</th>
                <th class="px-6 py-4 text-sm">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $sql = "SELECT e.emp_id, e.first_name, e.middle_name, e.last_name, w.position, e.email FROM employee as e
                        JOIN work_experience as w on w.emp_id = e.emp_id";
                $result = select_info_multiple_key($sql);

                foreach($result as $r){
                    echo "<tr class='border border-slate-700' id='{$r['emp_id']}'>";
                    echo "<td class='px-6 py-4 text-sm'>{$r['emp_id']}</td>";
                    echo "<td class='px-6 py-4 text-sm'>{$r['first_name']} {$r['middle_name']} {$r['middle_name']}</td>";
                    echo "<td class='px-6 py-4 text-sm'>{$r['position']}</td>";
                    echo "<td class='px-6 py-4 text-sm'>{$r['email']}</td>";
                    echo "<td class='flex justify-around items-center px-6 py-4 text-sm'>";
                    echo "<button class='add-button'>Print</button>";
                    echo "<button class='add-button'>Edit</button>";
                    echo "<button class='del-button'>Delete</button>";
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
            <!-- <tr class="border border-slate-700">
                <td class="px-6 py-4 text-sm">1</td>
                <td class="px-6 py-4 text-sm">Marlyn Suganob Domine</td>
                <td class="px-6 py-4 text-sm">Teacher II</td>
                <td class="px-6 py-4 text-sm">marlyndomin@gmail.com</td>
                <td class="flex justify-around items-center px-6 py-4 text-sm">
                    <button class="add-button">Print</button>
                    <button class="add-button">Edit</button>
                    <button class="del-button">Delete</button>
                </td>
            </tr> -->
        </tbody>
    </table>
</div>