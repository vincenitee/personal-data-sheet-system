<dialog class="rounded-md max-w-screen-lg">
    <h2 class="text-center p-2 border-b-2 text-xl font-bold sticky top-0 z-50 bg-white">Edit Information</h2>
    <form action="" method="post" class="space-y-3 p-2">
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
                        <input type="text" name="firstname" id="firstname" class="inputbox" autocomplete="off"  required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm text-gray-700">Middle Name</label>
                        <input type="text" name="middlename" id="middlename" class="inputbox" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm text-gray-700">Last Name</label>
                        <input type="text" name="lastname" id="lastname" class="inputbox" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm text-gray-700">Name Extension</label>
                        <div class="group relative space-y-1">
                            <select name="suffix" id="suffix" class="dropdown" required>
                                <option value=""></option>
                                <?php
                                $sql = 'SELECT suffix_id, suffix from suffix';
                                $result = select_info_multiple_key($sql);

                                foreach ($result as $r) {
                                    echo "<option value='{$r[0]}'>{$r[1]}</option>";
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
                            <input type="text" name="bdate" id="bdate" class="date-inputbox" autocomplete="off" placeholder="Select date" required />
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm text-gray-700">Place of Birth</label>
                        <input type="text" name="birthplace" id="birthplace" class="inputbox" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm text-gray-700">Sex</label>
                        <div class="group relative space-y-1">
                            <select name="sex" id="sex" class="dropdown" required>
                                <option value=""></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
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

                                foreach ($result as $r) {
                                    echo "<option value='{$r[0]}'>{$r[1]}</option>";
                                }
                                ?>
                            </select>
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Select Civil Status</label>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm text-gray-700">Height(m)</label>
                        <input type="number" min="0.0" name="height" id="height" class="inputbox" autocomplete="off" step="0.01" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm text-gray-700">Weight(kg)</label>
                        <input type="number" min="0" name="weight" id="weight" class="inputbox" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm text-gray-700">Blood Type</label>
                        <div class="group relative space-y-1">
                            <select name="blood-type" id="blood-type" class="dropdown" required>
                                <option value=""></option>
                                <?php
                                $sql = "SELECT * from blood_type";
                                $result = select_info_multiple_key($sql);

                                foreach ($result as $r) {
                                    echo "<option value='{$r[0]}'>{$r[1]}</option>";
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
                        <input type="text" name="gsis-id" id="gsis-id" class="inputbox" autocomplete="off" value="N/A" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm text-gray-700">PAG-IBIG ID Number</label>
                        <input type="text" name="pagibig-id" id="pagibig-id" class="inputbox" autocomplete="off" value="N/A" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm text-gray-700">PHILHEALTH ID Number</label>
                        <input type="text" name="philhealth-id" id="philhealth-id" class="inputbox" autocomplete="off" value="N/A" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm text-gray-700">SSS ID Number</label>
                        <input type="text" name="sss-id" id="sss-id" class="inputbox" autocomplete="off" value="N/A" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm text-gray-700">TIN ID Number</label>
                        <input type="text" name="tin-id" id="tin-id" class="inputbox" autocomplete="off" value="N/A" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm text-gray-700">Agency Employee Number</label>
                        <input type="text" name="agency-no" id="agency-no" class="inputbox" autocomplete="off" value="N/A" required />
                    </div>

                    <hr class="col-span-full mt-5 border border-slate-600" />

                    <span class="col-span-full my-4 text-lg font-medium text-slate-600">Citizenship</span>

                    <div class="space-y-1">
                        <label class="block text-sm text-gray-700">Nationality</label>
                        <div class="group relative space-y-1">
                            <select name="nationality" id="nationality" class="dropdown" required>
                                <option value=""></option>
                                <option value="Filipino">Filipino</option>
                                <option value="Dual Citizenship">Dual Citizenship</option>
                            </select>
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Select Nationality</label>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm text-gray-700">Citizenship Category</label>
                        <div class="group relative space-y-1">
                            <select name="citizenship-category" id="citizenship-category" class="dropdown" required>
                                <option value=""></option>
                                <option value="By Birth">By Birth</option>
                                <option value="By Naturalization">By Naturalization</option>
                            </select>
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Select Citizenship Category</label>
                        </div>
                    </div>

                    <div class="col-span-2 space-y-1">
                        <label class="block text-sm text-gray-700">If holder of dual citizenship, indicate country</label>
                        <div class="group relative space-y-1 opacity-50">
                            <select name="citizenship-country" id="citizenship-country" class="dropdown pointer-events-none">
                                <option value="N/A">N/A</option>
                            </select>
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Select Country</label>
                        </div>
                    </div>

                    <hr class="col-span-full mt-5 border border-slate-600" />

                    <span class="col-span-full my-4 text-lg font-medium text-slate-600">Address Information</span>
                    <span class="col-span-full mt-2 font-medium text-slate-600">Residential Address</span>

                    <div class="group relative space-y-1">
                        <input type="text" name="res-house-no" id="res-house-no" class="address-inputbox" autocomplete="off" required />
                        <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">House no./Block no./Lot no.</label>
                    </div>

                    <div class="group relative space-y-1">
                        <input type="text" name="res-street" id="res-street" class="address-inputbox" autocomplete="off" required />
                        <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Street</label>
                    </div>

                    <div class="group relative space-y-1 col-span-2">
                        <input type="text" name="res-village" id="res-village" class="address-inputbox" autocomplete="off" required />
                        <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Village</label>
                    </div>

                    <div class="group relative space-y-1">
                        <select name="res-province" id="res-province" class="dropdown" required>
                            <option value=""></option>
                            <?php
                            $sql = 'SELECT province_id, province FROM province
                                ORDER BY province ASC';
                            $result = select_info_multiple_key($sql);

                            foreach ($result as $r) {
                                echo "<option value='{$r[0]}'>{$r[1]}</option>";
                            }
                            ?>
                        </select>
                        <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Province</label>
                    </div>

                    <div class="group relative space-y-1 ">
                        <select name="res-municipality" id="res-municipality" class="dropdown" required>
                            <option value=""></option>
                        </select>
                        <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Municipality</label>
                    </div>

                    <div class="group relative space-y-1 ">
                        <select name="res-brgy" id="res-brgy" class="dropdown " required>
                            <option value=""></option>
                        </select>
                        <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Barangay</label>
                    </div>

                    <div class="group relative space-y-1">
                        <input name="res-zip" id="res-zip" class="address-inputbox" required />
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
                        <input type="text" name="permanent-house-no" id="permanent-house-no" class="address-inputbox" autocomplete="off" required />
                        <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">House no./Block no./Lot no.</label>
                    </div>

                    <div class="group relative space-y-1">
                        <input type="text" name="permanent-street" id="permanent-street" class="address-inputbox" autocomplete="off" required />
                        <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Street</label>
                    </div>

                    <div class="group relative space-y-1 col-span-2">
                        <input type="text" name="permanent-village" id="permanent-village" class="address-inputbox" autocomplete="off" required />
                        <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Village</label>
                    </div>

                    <div class="group relative space-y-1">
                        <select name="permanent-province" id="permanent-province" class="dropdown" required>
                            <option value=""></option>
                            <?php
                            $sql = 'SELECT province_id, province FROM province
                                ORDER BY province ASC';
                            $result = select_info_multiple_key($sql);

                            foreach ($result as $r) {
                                echo '<option value="' . $r[0] . '">' . $r[1] . "</option>";
                            }
                            ?>
                        </select>
                        <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Province</label>
                    </div>

                    <div class="group relative space-y-1">
                        <select name="permanent-municipality" id="permanent-municipality" class="dropdown" required>
                            <option value=""></option>
                        </select>
                        <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Municipality</label>
                    </div>

                    <div class="group relative space-y-1">
                        <select name="permanent-brgy" id="permanent-brgy" class="dropdown" required>
                            <option value=""></option>
                        </select>
                        <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Barangay</label>
                    </div>

                    <div class="group relative space-y-1">
                        <input name="permanent-zip" id="permanent-zip" class="address-inputbox" required />
                        <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-2 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Zip Code</label>
                    </div>

                    <hr class="col-span-full mt-5 border border-slate-600" />

                    <span class="col-span-full my-4 text-lg font-medium text-slate-600">Contact Information</span>

                    <div class="space-y-1">
                        <label class="block text-sm text-gray-700">Telephone Number</label>
                        <input type="text" min="0" value="N/A" name="tel-no" id="tel-no" class="inputbox" autocomplete="off" required />
                    </div>
                    <div class="space-y-1">
                        <label class="block text-sm text-gray-700">Mobile Number</label>
                        <input type="number" min="0" name="mobile-no" id="mobile-no" class="inputbox" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm text-gray-700">Email Address</label>
                        <input type="email" name="email" id="email" class="inputbox" autocomplete="off" required />
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
                        <input type="text" name="spouse-firstname" id="spouse-firstname" class="inputbox" value="N/A" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Middle name</label>
                        <input type="text" name="spouse-middlename" id="spouse-middlename" class="inputbox" value="N/A" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Last name</label>
                        <input type="text" name="spouse-surname" id="spouse-surname" class="inputbox" value="N/A" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Name Extension</label>
                        <div class="group relative">
                            <select name="spouse-suffix" id="spouse-suffix" class="dropdown">
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

                    <hr class="col-span-full mt-5 border border-slate-600" />

                    <span class="col-span-full my-4 text-lg font-medium text-slate-600">Spouse Occupation Details</span>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Occupation</label>
                        <input type="text" name="spouse-occupation" id="spouse-occupation" class="inputbox select-all" value="N/A" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Employer/Business Name</label>
                        <input type="text" name="spouse-business" id="spouse-business" class="inputbox" value="N/A" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Business Address</label>
                        <input type="text" name="business-addr" id="business-addr" class="inputbox" value="N/A" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Telephone Number</label>
                        <input type="text" name="spouse-telno" id="spouse-telno" class="inputbox" value="N/A" autocomplete="off" required />
                    </div>

                    <hr class="col-span-full mt-5 border border-slate-600" />

                    <span class="col-span-full my-4 text-lg font-medium text-slate-600">Father's Details</span>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">First name</label>
                        <input type="text" name="father-firstname" id="father-firstname" class="inputbox" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Middle name</label>
                        <input type="text" name="father-middlename" id="father-middlename" class="inputbox" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Last name</label>
                        <input type="text" name="father-surname" id="father-surname" class="inputbox" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Name Extension</label>
                        <div class="group relative">
                            <select name="father-suffix" id="father-suffix" class="dropdown" required>
                                <option value=""></option>
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

                    <hr class="col-span-full mt-5 border border-slate-600" />

                    <span class="col-span-full my-4 text-lg font-medium text-slate-600">Mother's Details</span>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">First name</label>
                        <input type="text" name="mother-firstname" id="mother-firstname" class="inputbox" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Middle name</label>
                        <input type="text" name="mother-middlename" id="mother-middlename" class="inputbox" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Last name</label>
                        <input type="text" name="mother-surname" id="mother-surname" class="inputbox" autocomplete="off" required />
                    </div>

                    <hr class="col-span-full mt-5 border border-slate-600" />

                    <!-- Children -->
                    <div class="col-span-full my-4 flex items-center justify-between">
                        <span class="text-lg font-medium text-slate-600">Children Details</span>
                        <button type="button" class="add-button" id="add-child">&plus; Add Row</button>
                        <input type="text" name="child-total-entry" id="child-total-entry" class="hidden" value="1">
                    </div>

                    <div class="col-span-full space-y-2" id="children-container">
                        <div class="grid grid-cols-mod-3 gap-3">
                            <span class="font-medium text-slate-600">Name of Children</span>
                            <span class="font-medium text-slate-600">Date of Birth</span>
                        </div>

                        <div class="grid grid-cols-mod-3 gap-3" data-child>
                            <input type="text" name="child-name-1" id="child-name-1" class="inputbox" autocomplete="off" />

                            <div class="space-y-1">
                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                        </svg>
                                    </div>
                                    <input type="text" name="child-bdate-1" id="child-bdate-1" class="date-inputbox" autocomplete="off" placeholder="Select date" />
                                </div>
                            </div>

                            <button type="button" class="del-button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>

                        <!-- Other entries goes here -->
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
                        <input type="text" name="elementary-school" id="elementary-school" class="inputbox group" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Degree</label>
                        <input type="text" name="elementary-degree" id="elementary-degree" class="inputbox" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Highest Level Earned</label>
                        <input type="text" name="elementary-highest-unit" id="elementary-highest-unit" class="inputbox" value="N/A" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Start of Attendance</label>
                        <div class="group relative">
                            <select name="elementary-start-date" id="elementary-start-date" class="dropdown year" required>
                                <option value=""></option>
                                <option value="N/A">N/A</option>
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
                            </select>
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700"> Awards Received</label>
                        <input type="text" name="elementary-awards" id="elementary-awards" class="inputbox" autocomplete="off" required />
                    </div>

                    <!-- Secondary -->
                    <hr class="col-span-full mt-5 border border-slate-600" />

                    <span class="col-span-full my-4 text-lg font-medium text-gray-900">Secondary</span>

                    <div class="col-span-2 space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Name of School</label>
                        <input type="text" name="secondary-school" id="secondary-school" class="inputbox group" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Degree</label>
                        <input type="text" name="secondary-degree" id="secondary-degree" class="inputbox" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Highest Level Earned</label>
                        <input type="text" name="secondary-highest-unit" id="secondary-highest-unit" class="inputbox" value="N/A" autocomplete="off" required />
                    </div>


                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Start of Attendance</label>
                        <div class="group relative">
                            <select name="secondary-start-date" id="secondary-start-date" class="dropdown year" required>
                                <option value=""></option>
                                <option value="N/A">N/A</option>
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
                            </select>
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700"> Awards Received</label>
                        <input type="text" name="secondary-awards" id="secondary-awards" class="inputbox" autocomplete="off" required />
                    </div>

                    <!-- Vocational Course -->
                    <hr class="col-span-full mt-5 border border-slate-600" />

                    <span class="col-span-full my-4 text-lg font-medium text-gray-900">Vocational / Trade Course</span>

                    <div class="col-span-2 space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Name of School</label>
                        <input type="text" name="vocational-school" id="vocational-school" class="inputbox group" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Degree</label>
                        <input type="text" name="vocational-degree" id="vocational-degree" class="inputbox" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Highest Level Earned</label>
                        <input type="text" name="vocational-highest-unit" id="vocational-highest-unit" class="inputbox" value="N/A" autocomplete="off" required />
                    </div>


                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Start of Attendance</label>
                        <div class="group relative">
                            <select name="vocational-start-date" id="vocational-start-date" class="dropdown year" required>
                                <option value=""></option>
                                <option value="N/A">N/A</option>
                            </select>
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">End of Attendance</label>
                        <div class="group relative">
                            <select name="vocational-end-date" id="vocational-end-date" class="dropdown year" required>
                                <option value=""></option>
                                <option value="N/A">N/A</option>
                            </select>
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Year Graduated</label>
                        <div class="group relative">
                            <select name="vocational-year-graduated" id="vocational-year-graduated" class="dropdown year" required>
                                <option value=""></option>
                                <option value="N/A">N/A</option>
                            </select>
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700"> Awards Received</label>
                        <input type="text" name="vocational-awards" id="vocational-awards" class="inputbox" autocomplete="off" required />
                    </div>

                    <!-- College -->
                    <hr class="col-span-full mt-5 border border-slate-600" />

                    <span class="col-span-full my-4 text-lg font-medium text-gray-900">College</span>

                    <div class="col-span-2 space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Name of School</label>
                        <input type="text" name="college-school" id="college-school" class="inputbox group" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Degree</label>
                        <input type="text" name="college-degree" id="college-degree" class="inputbox" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Highest Level Earned</label>
                        <input type="text" name="college-highest-unit" id="college-highest-unit" class="inputbox" value="N/A" autocomplete="off" required />
                    </div>


                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Start of Attendance</label>
                        <div class="group relative">
                            <select name="college-start-date" id="college-start-date" class="dropdown year" required>
                                <option value=""></option>
                                <option value="N/A">N/A</option>
                            </select>
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">End of Attendance</label>
                        <div class="group relative">
                            <select name="college-end-date" id="college-end-date" class="dropdown year" required>
                                <option value=""></option>
                                <option value="N/A">N/A</option>
                            </select>
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Year Graduated</label>
                        <div class="group relative">
                            <select name="college-year-graduated" id="college-year-graduated" class="dropdown year" required>
                                <option value=""></option>
                                <option value="N/A">N/A</option>
                            </select>
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700"> Awards Received</label>
                        <input type="text" name="college-awards" id="college-awards" class="inputbox" autocomplete="off" required />
                    </div>

                    <!-- Graduate Studies -->
                    <hr class="col-span-full mt-5 border border-slate-600" />

                    <span class="col-span-full my-4 text-lg font-medium text-gray-900">Graduate Studies</span>

                    <div class="col-span-2 space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Name of School</label>
                        <input type="text" name="graduate-school" id="graduate-school" class="inputbox group" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Degree</label>
                        <input type="text" name="graduate-degree" id="graduate-degree" class="inputbox" autocomplete="off" required />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Highest Level Earned</label>
                        <input type="text" name="graduate-highest-unit" id="graduate-highest-unit" class="inputbox" value="N/A" autocomplete="off" required />
                    </div>


                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Start of Attendance</label>
                        <div class="group relative">
                            <select name="graduate-start-date" id="graduate-start-date" class="dropdown year" required>
                                <option value=""></option>
                                <option value="N/A">N/A</option>
                            </select>
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">End of Attendance</label>
                        <div class="group relative">
                            <select name="graduate-end-date" id="graduate-end-date" class="dropdown year" required>
                                <option value=""></option>
                                <option value="N/A">N/A</option>
                            </select>
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Year Graduated</label>
                        <div class="group relative">
                            <select name="graduate-year-graduated" id="graduate-year-graduated" class="dropdown year" required>
                                <option value=""></option>
                                <option value="N/A">N/A</option>
                            </select>
                            <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Year</label>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700"> Awards Received</label>
                        <input type="text" name="graduate-awards" id="graduate-awards" class="inputbox" autocomplete="off" required />
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
                    <input type="text" name="cs-total-entry" id="cs-total-entry" class="hidden" value="1">
                    <button type="button" class="add-button" id="add-civil-entry">+ Add More</button>
                </div>

                <!-- Inputs -->
                <div class="space-y-3" id="exam-container">
                    <div class="mt-3 grid grid-cols-4 gap-3 border-2 border-dashed border-gray-500 p-3" data-exam>
                        <div class="col-span-full flex justify-between p-2">
                            <h2 class="col-span-3 text-lg font-semibold" id="civil-title-1">Civil Service Entry</h2>
                            <button type="button" class="del-button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>

                        <div class="col-span-2 space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Examination Name</label>
                            <input type="text" name="exam-name-1" id="exam-name-1" class="inputbox title" autocomplete="off" />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Ratings</label>
                            <input type="number" min="0" step="any" name="exam-rating-1" id="exam-rating-1" class="inputbox" value="0" autocomplete="off" />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Date of Examination</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                    </svg>
                                </div>
                                <input type="text" name="exam-date-1" id="exam-date-1" class="date-inputbox" autocomplete="off" placeholder="Select date" required />
                            </div>
                        </div>

                        <div class="col-span-2 space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Place of Examination</label>
                            <input type="text" name="exam-place-1" id="exam-place-1" class="inputbox" autocomplete="off" />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">License Number</label>
                            <input type="text" name="license-number-1" id="license-number-1" class="inputbox" autocomplete="off" />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Date of Issuance</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                    </svg>
                                </div>
                                <input type="text" name="issue-date-1" id="issue-date-1" class="date-inputbox" autocomplete="off" placeholder="Select date" required />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Civil Service Eligibility -->


            <!-- Work Experience -->
            <div class="scale-90 mx-auto py-2" data-step>
                <!-- Title -->
                <div class="flex items-center justify-between">
                    <h1 class="text-xl font-bold text-slate-600">5. Work Experience</h1>
                    <input type="text" name="work-exp-total" id="work-exp-total" class="hidden" value="1">
                    <button type="button" class="add-button" id="add-work-entry">+ Add More</button>
                </div>

                <!-- Inputs -->
                <div class="space-y-3" id="work-container">
                    <div class="mt-3 grid grid-cols-6 gap-3 border-2 border-dashed border-gray-500 p-3" data-work>
                        <div class="col-span-full flex justify-between p-2">
                            <h2 class="col-span-3 text-lg font-semibold" id="work-title-1">Work Experience Entry</h2>

                            <button type="button" class="del-button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>

                        <div class="col-span-2 space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Position/Title</label>
                            <input type="text" name="position-1" id="position-1" class="inputbox title" autocomplete="off" />
                        </div>

                        <div class="col-span-3 space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Department/Agency</label>
                            <input type="text" name="agency-1" id="agency-1" class="inputbox" autocomplete="off" />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Monthly Salary</label>
                            <input type="number" min="0" name="salary-1" id="salary-1" class="inputbox" value="0" autocomplete="off" />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Start Date</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                    </svg>
                                </div>
                                <input type="text" name="work-start-1" id="work-start-1" class="date-inputbox" autocomplete="off" placeholder="Select date" required />
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">End Date</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                    </svg>
                                </div>
                                <input type="text" name="work-end-1" id="work-end-1" class="date-inputbox" autocomplete="off" placeholder="Select date" required />
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Salary Grade</label>
                            <div class="group relative">
                                <select name="salary-grade-1" id="salary-grade-1" class="dropdown salary-grade" required>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Grade</label>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Salary Step</label>
                            <div class="group relative">
                                <select name="salary-step-1" id="salary-step-1" class="dropdown salary-step" required>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Step</label>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Appointment Status</label>
                            <div class="group relative">
                                <select name="appointment-status-1" id="appointment-status-1" class="dropdown appointment-status" required>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Status</label>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Government Service</label>
                            <div class="group relative">
                                <select name="government-service-1" id="government-service-1" class="dropdown government-service" required>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Work Experience -->

            <!-- Voluntary Work Entry -->
            <div class="scale-90 mx-auto py-2" data-step>
                <!-- Title -->
                <div class="flex items-center justify-between gap-2">
                    <h1 class="text-xl font-bold text-slate-600">6. Voluntary Work Experience</h1>
                    <button type="button" class="add-button" id="add-work-vol-entry">+ Add More</button>
                </div>

                <!-- Inputs -->
                <div class="space-y-3" id="work-vol-container">
                    <div class="mt-3 grid grid-cols-mod-7 gap-3 border-2 border-dashed border-gray-500 p-3" data-work-vol>
                        <div class="col-span-full flex justify-between p-2">
                            <h2 class="col-span-3 text-lg font-semibold" id="work-vol-title-1">Voluntary Work Experience Entry</h2>
                            <input type="text" name="voluntary-work-total" id="voluntary-work-total" class="hidden" value="1">
                            <button type="button" class="del-button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>

                        <div class="col-span-2 space-y-1">
                            <label for="org-name-1" class="block text-sm font-medium text-gray-700">Name & Address of Organization</label>
                            <input type="text" name="org-name-1" id="org-name-1" class="inputbox" autocomplete="off" />
                        </div>

                        <div class="col-span-2 space-y-1">
                            <label for="nature-of-work-1" class="block text-sm font-medium text-gray-700">Position/Nature of Work</label>
                            <input type="text" name="nature-of-work-1" id="nature-of-work-1" class="inputbox" autocomplete="off" />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Start Date</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                    </svg>
                                </div>
                                <input type="text" name="work-vol-start-1" id="work-vol-start-1" class="date-inputbox" autocomplete="off" placeholder="Select date" required />
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">End Date</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                    </svg>
                                </div>
                                <input type="text" name="work-vol-end-1" id="work-vol-end-1" class="date-inputbox" autocomplete="off" placeholder="Select date" required />
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Total Hours</label>
                            <input type="number" min="0" name="work-vol-hours-1" id="work-vol-hours-1" class="inputbox" autocomplete="off" value="0" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Voluntary Work Experience -->

            <!-- Learning and Developement -->
            <div class="scale-90 mx-auto py-2" data-step>
                <!-- Title -->
                <div class="flex items-center justify-between gap-2">
                    <h1 class="text-xl font-bold text-slate-600">7. Learning and Developement Interventions / Trainings Attended</h1>
                    <button type="button" class="add-button" id="add-training-entry">+ Add More</button>
                </div>

                <!-- Inputs -->
                <div class="space-y-3" id="training-container">
                    <div class="mt-3 grid grid-cols-4 gap-3 border-2 border-dashed border-gray-500 p-3" data-training>
                        <div class="col-span-full flex justify-between p-2">
                            <h2 class="col-span-3 text-lg font-semibold" id="training-title-1">Learning and Developement Entry</h2>
                            <input type="text" name="learning-development-total" id="learning-development-total">
                            <button type="button" class="del-button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>

                        <div class="col-span-2 space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Learning and Development Training Title</label>
                            <input type="text" name="training-name-1" id="training-name-1" class="inputbox" autocomplete="off" />
                        </div>

                        <div class="col-span-2 space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Sponsored / Conducted by</label>
                            <input type="text" name="training-sponsor-1" id="training-sponsor-1" class="inputbox" autocomplete="off" />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Start Date</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                    </svg>
                                </div>
                                <input type="text" name="training-start-1" id="training-start-1" class="date-inputbox" autocomplete="off" placeholder="Select date" required />
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">End Date</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                    </svg>
                                </div>
                                <input type="text" name="training-end-1" id="training-end-1" class="date-inputbox" autocomplete="off" placeholder="Select date" required />
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Training Type</label>
                            <div class="group relative">
                                <select name="training-type-1" id="training-type-1" class="dropdown" required>
                                    <option value="N/A">N/A</option>
                                </select>
                                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Status</label>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Total Hours</label>
                            <input type="number" min="0" name="training-hours-1" id="training-hours-1" class="inputbox" autocomplete="off" value="0" />
                        </div>
                    </div>
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
                        <input type="text" name="skills-total-entry" id="skills-total-entry" class="hidden" value="1">
                        <button type="button" class="add-button" id="add-skill-entry">&plus;Add</button>
                    </div>
                    <div class="my-3 flex items-center justify-between">
                        <label class="font-medium text-gray-700">Non Academic Recognition</label>
                        <input type="text" name="recognition-total-entry" id="recognition-total-entry" class="hidden" value="1">
                        <button type="button" class="add-button" id="add-recognition-entry">&plus;Add</button>
                    </div>
                    <div class="my-3 flex items-center justify-between">
                        <label class="font-medium text-gray-700">Organization Membership</label>
                        <input type="text" name="membership-total-entry" id="membership-total-entry" class="hidden" value="1">
                        <button type="button" class="add-button" id="add-org-entry">&plus;Add</button>
                    </div>

                    <!-- Skills and Hobbies -->
                    <div class="space-y-1 p-2" id="skill-container">
                        <div class="grid grid-cols-mod-2 gap-1" data-skill>
                            <input type="text" name="skill-1" id="skill-1" class="inputbox" autocomplete="off" />
                            <button type="button" class="del-button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Non Academic Recognition -->
                    <div class="space-y-1 p-2" id="recognition-container">
                        <div class="grid grid-cols-mod-2 gap-1" data-recognition>
                            <input type="text" name="recognition-1" id="recognition-1" class="inputbox" autocomplete="off" />

                            <button type="button" class="del-button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Organization Membership -->
                    <div class="space-y-1 p-2" id="membership-container">
                        <div class="grid grid-cols-mod-2 gap-1" data-membership>
                            <input type="text" name="membership-1" id="membership-1" class="inputbox" autocomplete="off" />

                            <button type="button" class="del-button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
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
                                <input type="radio" name="third-degree" value="1" class="mx-auto size-5" />
                            </td>
                            <td class="px-6 py-4">
                                <input type="radio" name="third-degree" value="0" class="mx-auto size-5" />
                            </td>
                            <td class="w-10 px-6 py-4">&nbsp;</td>
                        </tr>

                        <tr>
                            <td class="w-10 px-6 py-4">&nbsp;</td>
                            <td class="px-6 py-4">b. within the fourth degree (for Local Government Unit - Career Employees)?</td>
                            <td class="px-6 py-4">
                                <input type="radio" name="fourth-degree" value="1" class="mx-auto size-5" />
                            </td>
                            <td class="px-6 py-4">
                                <input type="radio" name="fourth-degree" value="0" class="mx-auto size-5" />
                            </td>

                            <td class="px-6 py-4">
                                <input type="text" name="consanguinity-info" class="inputbox mx-auto" placeholder="If YES, provide details" />
                            </td>
                        </tr>

                        <tr class="border-t-2 border-slate-400">
                            <td class="px-6 py-4">35.<span class="text-red-500 font-semibold">*</span></td>
                            <td class="px-6 py-4">a. Have you ever been found guilty of any administrative offense?</td>
                            <td class="px-6 py-4">
                                <input type="radio" name="admin-offense" value="1" class="mx-auto size-5" />
                            </td>
                            <td class="px-6 py-4">
                                <input type="radio" name="admin-offense" value="0" class="mx-auto size-5" />
                            </td>

                            <td class="px-6 py-4">
                                <input type="text" name="admin-offense-info" class="inputbox mx-auto" placeholder="If YES, provide details" />
                            </td>
                        </tr>

                        <tr>
                            <td class="px-6 py-4">&nbsp;</td>
                            <td class="px-6 py-4">b. Have you been criminally charged before any court?</td>
                            <td class="px-6 py-4">
                                <input type="radio" name="crim-offense" value="1" class="mx-auto size-5" />
                            </td>
                            <td class="px-6 py-4">
                                <input type="radio" name="crim-offense" value="0" class="mx-auto size-5" />
                            </td>

                            <td class="px-6 py-4">
                                <input type="text" name="crim-offense-info" class="inputbox mx-auto" placeholder="Status of Case/s" />
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
                                    <input type="text" name="date-filed" id="date-filed" class="date-inputbox" autocomplete="off" placeholder="Date Filed" />
                                </div>
                            </td>
                        </tr>
                        <tr class="border-t-2 border-slate-400">
                            <td class="px-6 py-4">36.<span class="text-red-500 font-semibold">*</span></td>
                            <td class="px-6 py-4">Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?</td>
                            <td class="px-6 py-4">
                                <input type="radio" name="crime-conviction" value="1" class="mx-auto size-5" />
                            </td>
                            <td class="px-6 py-4">
                                <input type="radio" name="crime-conviction" value="0" class="mx-auto size-5" />
                            </td>

                            <td class="px-6 py-4">
                                <input type="text" name="crime-conviction-info" class="inputbox mx-auto" placeholder="If YES, provide details" />
                            </td>
                        </tr>
                        <tr class="border-t-2 border-slate-400">
                            <td class="px-6 py-4">37.<span class="text-red-500 font-semibold">*</span></td>
                            <td class="px-6 py-4 text-justify">Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector?</td>
                            <td class="px-6 py-4">
                                <input type="radio" name="separation" value="1" class="mx-auto size-5" />
                            </td>
                            <td class="px-6 py-4">
                                <input type="radio" name="separation" value="0" class="mx-auto size-5" />
                            </td>

                            <td class="px-6 py-4">
                                <input type="text" name="separation-info" class="inputbox mx-auto" placeholder="If YES, provide details" />
                            </td>
                        </tr>
                        <tr class="border-t-2 border-slate-400">
                            <td class="px-6 py-4">38.<span class="text-red-500 font-semibold">*</span></td>
                            <td class="px-6 py-4 text-justify">a. Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?</td>
                            <td class="px-6 py-4">
                                <input type="radio" name="candidate" value="1" class="mx-auto size-5" />
                            </td>
                            <td class="px-6 py-4">
                                <input type="radio" name="candidate" value="0" class="mx-auto size-5" />
                            </td>

                            <td class="px-6 py-4">
                                <input type="text" name="candidate-info" class="inputbox mx-auto" placeholder="If YES, provide details" />
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">&nbsp;</td>
                            <td class="px-6 py-4 text-justify">b. Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?</td>
                            <td class="px-6 py-4">
                                <input type="radio" name="gov-resignation" value="1" class="mx-auto size-5" />
                            </td>
                            <td class="px-6 py-4">
                                <input type="radio" name="gov-resignation" value="0" class="mx-auto size-5" />
                            </td>
                            <td class="px-6 py-4">
                                <input type="text" name="gov-resignation-info" class="inputbox mx-auto" placeholder="If YES, provide details" />
                            </td>
                        </tr>
                        <tr class="border-t-2 border-slate-400">
                            <td class="px-6 py-4">39.<span class="text-red-500 font-semibold">*</span></td>
                            <td class="px-6 py-4 text-justify">Have you acquired the status of an immigrant or permanent resident of another country?</td>
                            <td class="px-6 py-4">
                                <input type="radio" name="foreign-residency" value="1" class="mx-auto size-5" />
                            </td>
                            <td class="px-6 py-4">
                                <input type="radio" name="foreign-residency" value="0" class="mx-auto size-5" />
                            </td>

                            <td class="px-6 py-4">
                                <div class="group relative">
                                    <select name="foreign-residency-info" id="foreign-residency-info" class="dropdown" required>
                                        <option value="N/A">N/A</option>
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
                                <input type="radio" name="indigenous" value="1" class="mx-auto size-5" />
                            </td>
                            <td class="px-6 py-4">
                                <input type="radio" name="indigenous" value="0" class="mx-auto size-5" />
                            </td>
                            <td class="px-6 py-4">
                                <input type="text" name="indigenous-info" class="inputbox mx-auto" placeholder="If YES, please specify" />
                            </td>
                        </tr>
                        <tr>
                            <td class="w-10 px-6 py-4">&nbsp;</td>
                            <td class="px-6 py-4">b. Are you a person with disability?</td>
                            <td class="px-6 py-4">
                                <input type="radio" name="pwd" value="1" class="mx-auto size-5" />
                            </td>
                            <td class="px-6 py-4">
                                <input type="radio" name="pwd" value="0" class="mx-auto size-5" />
                            </td>
                            <td class="px-6 py-4">
                                <input type="text" name="pwd-info" class="inputbox mx-auto" placeholder="If YES, provide ID Number" />
                            </td>
                        </tr>
                        <tr>
                            <td class="w-10 px-6 py-4">&nbsp;</td>
                            <td class="px-6 py-4">c. Are you a solo parent?</td>
                            <td class="px-6 py-4">
                                <input type="radio" name="solo-parent" id="solo-parent-yes" value="1" class="mx-auto size-5" required />
                            </td>
                            <td class="px-6 py-4">
                                <input type="radio" name="solo-parent" id="solo-parent-no" value="0" class="mx-auto size-5" />
                            </td>
                            <td class="px-6 py-4">
                                <input type="text" name="solo-parent-info" class="inputbox mx-auto" placeholder="If YES, provide ID Number" />
                            </td>
                        </tr>

                    </tbody>
                </table>

                <div class="space-y-3">
                    <div class="flex items-center justify-between bg-blue-200 px-6 py-4">
                        <h1>41. References <span class="text-sm font-medium italic">(Person or not related by consanguinity or affinity to applicant/appointee)</span></h1>
                        <input type="text" name="reference-total-entry" id="reference-total-entry" class="hidden" value="1">
                        <button type="button" class="add-button" id="add-reference-entry">&plus; Add Row</button>
                    </div>

                    <div class="space-y-1 border-2 border-slate-400 p-2" id="reference-container">
                        <div class="grid grid-cols-mod-4 gap-2">
                            <h2 class="px-6 py-4 font-medium text-slate-500">Name</h2>
                            <h2 class="px-6 py-4 font-medium text-slate-500">Address</h2>
                            <h2 class="px-6 py-4 font-medium text-slate-500">Telephone Number</h2>
                        </div>

                        <div class="grid grid-cols-mod-4 gap-2" data-reference>
                            <input type="text" name="reference-name-1" id="reference-name-1" class="inputbox" autocomplete="off" />
                            <input type="text" name="reference-address-1" id="reference-address-1" class="inputbox" autocomplete="off" />
                            <input type="number" min="0" name="reference-telno-1" id="reference-telno-1" class="inputbox" autocomplete="off" />
                            <button type="button" class="del-button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
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
                        <input type="text" name="gov-issued-id" id="gov-issued-id" class="inputbox" value="N/A" autocomplete="off" />
                    </div>
                    <div class="flex items-center px-6 py-2">
                        <label class="justify-items-end font-medium text-gray-700">ID/License/Passport No. :</label>
                    </div>
                    <div class="px-6 py-2">
                        <input type="text" name="gov-issued-id-no" id="gov-issued-id-no" class="inputbox" value="N/A" autocomplete="off" />
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
                        <input type="text" name="gov-id-issuance-place" id="gov-id-issuance-place" class="inputbox" value="N/A" autocomplete="off" />
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
                            file:text-white file:text-sm file:border-0 file:px-2 file:py-2 file:disabled" required>
                    </div>
                    <div class="px-6 py-2">
                        <label class="block font-medium text-slate-700">Right Thumbmark</label>
                    </div>
                    <div class="px-6 py-2">
                        <input type="file" name="right-thumb-img" id=" right-thumb-img" class="border text-sm valid:text-slate-700 text-slate-500 border-slate-600 file:bg-blue-500
                            file:text-white file:text-sm file:border-0 file:px-2 file:py-2 file:disabled" required>
                    </div>
                    <div class="px-6 py-2">
                        <label class="block font-medium text-slate-700">Signature</label>
                    </div>
                    <div class="px-6 py-2">
                        <input type="file" name="signature-img" id="signature-img" class="border text-sm valid:text-slate-700 text-slate-500 border-slate-600 file:bg-blue-500
                            file:text-white file:text-sm file:border-0 file:px-2 file:py-2 file:disabled" required>
                    </div>

                </div>
            </div>
            <!-- End of Credentials -->
        </div>

    </form>
    <div class="p-4 border-t-2 sticky bg-white bottom-0">
        <div class="flex items-center justify-end gap-1">
            <button class="px-3 py-2 bg-red-500 hover:bg-red-700 active:bg-red-900 text-sm rounded-md text-white font-medium" id="close-edit-dialog">Cancel</button>
            <button class="px-3 py-2 bg-blue-500 hover:bg-blue-700 active:bg-blue-900 text-sm rounded-md text-white font-medium" id="edit-changes">Save Changes</button>
        </div>
    </div>
</dialog>