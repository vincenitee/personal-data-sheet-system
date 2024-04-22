<?php include './assets/database/sql_statements.php'; ?>


<!--Personal details -->
<div class="mx-auto w-[65%] py-2" data-step id="personal-details">
    <!-- Title -->

    <h1 class="text-xl font-bold text-blue-800">1. Personal Detail</h1>

    <!-- Inputs -->
    <div class="grid grid-cols-4 gap-x-4 gap-y-3">
        <span class="col-span-full my-4 text-lg font-medium text-gray-900">General Details</span>

        <div class="space-y-1">
            <label class="block text-sm text-gray-700">First Name</label>
            <input type="text" name="firstname" id="firstname" class="inputbox" autocomplete="off" required />
        </div>

        <div class="space-y-1">
            <label class="block text-sm text-gray-700">Middle Name</label>
            <input type="text" name="middlename" id="middlename" class="inputbox" autocomplete="off" required />
        </div>

        <div class="space-y-1">
            <label class="block text-sm text-gray-700">Last Name</label>
            <input type="text" name="middlename" id="middlename" class="inputbox" autocomplete="off" required />
        </div>

        <div class="space-y-1">
            <label class="block text-sm text-gray-700">Name Extension</label>
            <div class="group relative">
                <select name="suffix" id="suffix" class="dropdown" required>
                    <option value=""></option>
                    <option value="N/A">N/A</option>
                    <?php
                    $sql = 'SELECT suffix_id, suffix from suffix';
                    $result = select_info_multiple_key($sql);

                    foreach ($result as $r) {
                        echo "<option value='{$r[0]}'>{$r[1]}</option>";
                    }
                    ?>
                </select>
                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Suffix</label>
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
                <input type="text" name="bdate" id="bdate" class="date-inputbox" autocomplete="off" placeholder="Select date" required />
            </div>
        </div>

        <div class="space-y-1">
            <label class="block text-sm text-gray-700">Place of Birth</label>
            <input type="text" name="birthplace" id="birthplace" class="inputbox" autocomplete="off" required />
        </div>

        <div class="space-y-1">
            <label class="block text-sm text-gray-700">Sex</label>
            <div class="group relative">
                <select name="sex" id="sex" class="dropdown" required>
                    <option value=""></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Gender/Sex</label>
            </div>
        </div>

        <div class="space-y-1">
            <label class="block text-sm text-gray-700">Civil Status</label>
            <div class="group relative">
                <select name="civil-status" id="civil-status" class="dropdown" required>
                    <option value=""></option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Legally Separated<">Legally Separated</option>
                </select>
                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Civil Status</label>
            </div>
        </div>

        <div class="space-y-1">
            <label class="block text-sm text-gray-700">Height(m)</label>
            <input type="number" min="0.0" name="height" id="height" class="inputbox" autocomplete="off" required />
        </div>

        <div class="space-y-1">
            <label class="block text-sm text-gray-700">Weight(kg)</label>
            <input type="number" min="0" name="weight" id="weight" class="inputbox" autocomplete="off" required />
        </div>

        <div class="space-y-1">
            <label class="block text-sm text-gray-700">Blood Type</label>
            <div class="group relative">
                <select name="blood-type" id="blood-type" class="dropdown" required>
                    <option value=""></option>
                    <option value="N/A">Unknown</option>
                    <?php
                    $sql = 'SELECT blood_type_id, blood_type from blood_type';
                    $result = select_info_multiple_key($sql);

                    foreach ($result as $r) {
                        echo "<option value='{$r[0]}'>{$r[1]}</option>";
                    }

                    ?>
                </select>
                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Type</label>
            </div>
        </div>

        <hr class="col-span-full mt-5 border border-gray-500" />

        <span class="col-span-full my-4 text-lg font-medium text-gray-900">Government Identification Details</span>

        <div class="space-y-1">
            <label class="block text-sm text-gray-700">GSIS ID Number</label>
            <input type="number" name="gsis-id" id="gsis-id" class="inputbox" autocomplete="off" />
        </div>

        <div class="space-y-1">
            <label class="block text-sm text-gray-700">PAG-IBIG ID Number</label>
            <input type="number" name="pagibig-id" id="pagibig-id" class="inputbox" autocomplete="off" />
        </div>

        <div class="space-y-1">
            <label class="block text-sm text-gray-700">PHILHEALTH ID Number</label>
            <input type="number" name="philhealth-id" id="philhealth-id" class="inputbox" autocomplete="off" />
        </div>

        <div class="space-y-1">
            <label class="block text-sm text-gray-700">SSS ID Number</label>
            <input type="number" name="sss-id" id="sss-id" class="inputbox" autocomplete="off" />
        </div>

        <div class="space-y-1">
            <label class="block text-sm text-gray-700">TIN ID Number</label>
            <input type="number" name="tin-id" id="tin-id" class="inputbox" autocomplete="off" />
        </div>

        <div class="space-y-1">
            <label class="block text-sm text-gray-700">Agency Employee Number</label>
            <input type="number" name="agency-no" id="agency-no" class="inputbox" autocomplete="off" />
        </div>

        <hr class="col-span-full mt-5 border border-gray-500" />

        <span class="col-span-full my-4 text-lg font-medium text-gray-900">Citizenship</span>

        <div class="space-y-1">
            <label class="block text-sm text-gray-700">Nationality</label>
            <div class="group relative">
                <select name="nationality" id="nationality" class="dropdown" required>
                    <option value=""></option>
                    <option value="Filipino">Filipino</option>
                    <option value="Dual Citizenship">Dual Citizenship</option>
                </select>
                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Nationality</label>
            </div>
        </div>

        <div class="space-y-1">
            <label class="block text-sm text-gray-700">Citizenship Category</label>
            <div class="group relative">
                <select name="citizenship-category" id="citizenship-category" class="dropdown" required>
                    <option value=""></option>
                    <option value="By Birth">By Birth</option>
                    <option value="By Naturalization">By Naturalization</option>
                </select>
                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Citizenship Category</label>
            </div>
        </div>

        <div class="col-span-2 space-y-1">
            <label class="block text-sm text-gray-700">If holder of dual citizenship, indicate country</label>
            <div class="group relative">
                <select name="citizenship-country" id="citizenship-country" class="dropdown" required>
                    <option value=""></option>
                    <option value="N/A">N/A</option>
                </select>
                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Country</label>
            </div>
        </div>

        <hr class="col-span-full mt-5 border border-gray-500" />

        <span class="col-span-full my-4 text-lg font-medium text-gray-900">Address Information</span>
        <span class="col-span-full mt-2 font-medium text-gray-900">Residential Address</span>

        <div class="group relative">
            <input type="text" name="res-house-no" id="res-house-no" class="address-inputbox" autocomplete="off" required />
            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">House no./Block no./Lot no.</label>
        </div>

        <div class="group relative">
            <input type="text" name="res-street" id="res-street" class="address-inputbox" autocomplete="off" required />
            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Street</label>
        </div>

        <div class="group relative col-span-2">
            <input type="text" name="res-village" id="res-village" class="address-inputbox" autocomplete="off" required />
            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Village</label>
        </div>

        <div class="group relative">
            <select name="res-province" id="res-province" class="dropdown" required>
                <option value=""></option>
                <?php
                $sql = 'SELECT prov_id, prov_desc FROM province
                                ORDER BY prov_desc ASC';
                $result = select_info_multiple_key($sql);

                foreach ($result as $r) {
                    echo "<option value='{$r[0]}'>{$r[1]}</option>";
                }
                ?>
            </select>
            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Province</label>
        </div>

        <div class="group relative">
            <select name="res-municipality" id="res-municipality" class="dropdown" required>
                <option value=""></option>
                <?php
                $sql = 'SELECT municipality_id ,municipality_desc FROM municipality LIMIT 50';

                $result = select_info_multiple_key($sql);
                foreach ($result as $r) {
                    echo '<option value ="' . $r[0] . '">' . $r[1] . '</option>';
                }

                ?>
            </select>
            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Municipality</label>
        </div>

        <div class="group container relative">
            <select name="res-brgy" id="res-brgy" class="dropdown" required>
                <option value=""></option>
            </select>
            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Baranggay</label>
        </div>

        <div class="group container relative">
            <input name="res-zip" id="res-zip" class="address-inputbox" required />
            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Zip Code</label>
        </div>

        <span class="col-span-full mt-2 font-medium text-gray-900">Permanent Address</span>

        <div class="group relative">
            <input type="text" name="permanent-house-no" id="permanent-house-no" class="address-inputbox" autocomplete="off" required />
            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">House no./Block no./Lot no.</label>
        </div>

        <div class="group relative">
            <input type="text" name="permanent-street" id="permanent-street" class="address-inputbox" autocomplete="off" required />
            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Street</label>
        </div>

        <div class="group relative col-span-2">
            <input type="text" name="permanent-village" id="permanent-village" class="address-inputbox" autocomplete="off" required />
            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Village</label>
        </div>

        <div class="group relative">
            <select name="permanent-province" id="permanent-province" class="dropdown" required>
                <option value=""></option>
                <?php
                $sql = 'SELECT prov_id, prov_desc FROM province
                                ORDER BY prov_desc ASC';
                $result = select_info_multiple_key($sql);

                foreach ($result as $r) {
                    echo '<option value="' . $r[0] . '">' . $r[1] . "</option>";
                }
                ?>
            </select>
            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Province</label>
        </div>

        <div class="group relative">
            <select name="permanent-municipality" id="permanent-municipality" class="dropdown" required>
                <option value=""></option>
            </select>
            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Municipality</label>
        </div>

        <div class="group container relative">
            <select name="permanent-brgy" id="permanent-brgy" class="dropdown" required>
                <option value=""></option>
            </select>
            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Baranggay</label>
        </div>

        <div class="group container relative">
            <input name="permanent-zip" id="permanent-zip" class="address-inputbox" required />
            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Zip Code</label>
        </div>

        <hr class="col-span-full mt-5 border border-gray-500" />

        <span class="col-span-full my-4 text-lg font-medium text-gray-900">Contact Information</span>

        <div class="space-y-1">
            <label class="block text-sm text-gray-700">Telephone Number</label>
            <input type="number" min="0" name="tel-no" id="tel-no" class="inputbox" autocomplete="off" required />
        </div>
        <div class="space-y-1">
            <label class="block text-sm text-gray-700">Mobile Number</label>
            <input type="number" min="0" name="mobile-no" id="mobile-no" class="inputbox" autocomplete="off" required />
        </div>

        <div class="space-y-1">
            <label class="block text-sm text-gray-700">Email Address</label>
            <input type="email" name="email" id="email" class="inputbox" autocomplete="off" />
        </div>
    </div>
</div>