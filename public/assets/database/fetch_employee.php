<?php
require_once 'sql_statements.php';

function getEmployees()
{
    $query = "SELECT e.emp_id, e.first_name, e.last_name, e.email, e.mobile_no, MAX(w.position) AS POSITION 
              FROM employee e 
              LEFT JOIN work_experience w ON e.emp_id = w.emp_id 
              GROUP BY e.emp_id, e.first_name, e.last_name, e.email, e.mobile_no, e.birthdate
              ORDER BY e.first_name ASC";

    return select_info_multiple_key($query);
}

function generateTableRow($employee)
{
    $buttons = generateActionButtons($employee['emp_id']);
    return "<tr data-employee-id='{$employee['emp_id']}' class='text-center cursor-pointer'>
                <td class='w-10 px-4 py-1 text-sm'>{$employee['emp_id']}</td>
                <td class='px-4 py-2 text-sm font-bold text-slate-700'>{$employee['first_name']} {$employee['last_name']}</td>
                <td class='px-4 py-2 text-sm text-slate-600'>{$employee['email']}</td>
                <td class='px-4 py-2 text-sm text-slate-600'>{$employee['mobile_no']}</td>
                <td class='px-4 py-2 text-sm text-slate-600'>{$employee['POSITION']}</td>
                <td class='px-4 py-2 text-sm text-slate-600 flex justify-center gap-3'>{$buttons}</td>
            </tr>";
}

function generateTableRowWithoutActions($employee)
{
    return "<tr data-employee-id='{$employee['emp_id']}' class='text-center cursor-pointer'>
            <td class='w-10 px-4 py-1 text-sm'>{$employee['emp_id']}</td>
            <td class='px-4 py-2 text-sm font-bold text-slate-700'>{$employee['first_name']} {$employee['last_name']}</td>
            <td class='px-4 py-2 text-sm text-slate-600'>{$employee['email']}</td>
            <td class='px-4 py-2 text-sm text-slate-600'>{$employee['mobile_no']}</td>
            <td class='px-4 py-2 text-sm text-slate-600'>" . (empty($employee['POSITION']) ? 'N/A' : $employee['POSITION']) . "</td>
        </tr>";

}

function generateRowMessage(){
    return "<tr>
                <td class='font-medium text-center px-4 py-2' colspan=6>No employee data found</td>
            </tr>";
}

function generateActionButtons($empId)
{
    $editButton = createButton('edit', $empId, 'bg-blue-500 hover:bg-blue-600 active:bg-blue-700');
    $printButton = createButton('print', $empId, 'bg-blue-500 hover:bg-blue-600 active:bg-blue-700');
    $deleteButton = createButton('delete', $empId, 'bg-red-500 hover:bg-red-600 active:bg-red-700');
    return $editButton . $printButton . $deleteButton;
}

function createButton($action, $empId, $colorClasses)
{
    $icons = [
        'edit' => '<path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>',
        'print' => '<path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z"/>',
        'delete' => '<path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>'
    ];

    return "<button class='p-2 rounded-md $colorClasses' data-action='$action' data-emp-id='$empId'>
                <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' class='w-4 h-4 text-white'>
                    {$icons[$action]}
                </svg>
            </button>";
}
