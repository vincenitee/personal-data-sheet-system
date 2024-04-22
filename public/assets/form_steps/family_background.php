
<!-- Family Background -->
<div class="mx-auto hidden w-[65%] py-2" data-step>
    <!-- Title -->
    <h1 class="text-xl font-bold text-blue-800">2. Family Background</h1>

    <!-- Inputs -->
    <div class="grid grid-cols-4 gap-x-4 gap-y-3">
        <span class="col-span-full my-4 text-lg font-medium text-gray-900">Spouse Details</span>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">First name</label>
            <input type="text" name="spouse-firstname" id="spouse-firstname" class="inputbox" autocomplete="off" />
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Middle name</label>
            <input type="text" name="spouse-middlename" id="spouse-middlename" class="inputbox" autocomplete="off" />
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Last name</label>
            <input type="text" name="spouse-surname" id="spouse-surname" class="inputbox" autocomplete="off" />
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Name Extension</label>
            <div class="group relative">
                <select name="spouse-suffix" id="spouse-suffix" class="dropdown" required>
                    <option value=""></option>
                    <option value="N/A">N/A</option>
                    
                </select>
                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Suffix</label>
            </div>
        </div>

        <hr class="col-span-full mt-5 border border-gray-500" />

        <span class="col-span-full my-4 text-lg font-medium text-gray-900">Spouse Occupation Details</span>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Occupation</label>
            <input type="text" name="spouse-occupation" id="spouse-occupation" class="inputbox" autocomplete="off" />
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Employer/Business Name</label>
            <input type="text" name="spouse-business" id="spouse-business" class="inputbox" autocomplete="off" />
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Business Address</label>
            <input type="text" name="business-addr" id="business-addr" class="inputbox" autocomplete="off" />
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Telephone Number</label>
            <input type="number" name="spouse-telno" id="spouse-telno" class="inputbox" autocomplete="off" />
        </div>

        <hr class="col-span-full mt-5 border border-gray-500" />

        <span class="col-span-full my-4 text-lg font-medium text-gray-900">Father's Details</span>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">First name</label>
            <input type="text" name="father-firstname" id="father-firstname" class="inputbox" autocomplete="off" />
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Middle name</label>
            <input type="text" name="father-middlename" id="father-middlename" class="inputbox" autocomplete="off" />
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Last name</label>
            <input type="text" name="father-surname" id="father-surname" class="inputbox" autocomplete="off" />
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Name Extension</label>
            <div class="group relative">
                <select name="father-suffix" id="father-suffix" class="dropdown" required>
                    <option value=""></option>
                    <option value="N/A">N/A</option>
                    <option value="Jr.">Jr.</option>
                </select>
                <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">Select Suffix</label>
            </div>
        </div>

        <hr class="col-span-full mt-5 border border-gray-500" />

        <span class="col-span-full my-4 text-lg font-medium text-gray-900">Mother's Details</span>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">First name</label>
            <input type="text" name="father-firstname" id="father-firstname" class="inputbox" autocomplete="off" />
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Middle name</label>
            <input type="text" name="father-middlename" id="father-middlename" class="inputbox" autocomplete="off" />
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Last name</label>
            <input type="text" name="father-surname" id="father-surname" class="inputbox" autocomplete="off" />
        </div>

        <hr class="col-span-full mt-5 border border-gray-500" />

        <!-- Children -->
        <div class="col-span-full my-4 flex items-center justify-between">
            <span class="text-lg font-medium text-gray-900">Children Details</span>
            <button type="button" class="add-button" id="add-child">&plus; Add Row</button>
        </div>

        <div class="col-span-full space-y-2" id="children-container">
            <div class="grid grid-cols-mod-3 gap-3">
                <span class="font-medium text-gray-900">Name of Children</span>
                <span class="font-medium text-gray-900">Date of Birth</span>
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
                        <input type="text" name="child-bdate-1" id="child-bdate-1" class="date-inputbox" autocomplete="off" placeholder="Select date" required />
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