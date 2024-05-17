<!-- Educational Background -->
<div class="mx-auto hidden py-2" data-step>
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
            <input type="text" name="elementary-school" id="elementary-school" class="inputbox group" autocomplete="off" required/>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Degree</label>
            <input type="text" name="elementary-degree" id="elementary-degree" class="inputbox" autocomplete="off" required/>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Highest Level Earned</label>
            <input type="text" name="elementary-highest-unit" id="elementary-highest-unit" class="inputbox" value="N/A" autocomplete="off" required/>
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
            <input type="text" name="elementary-awards" id="elementary-awards" class="inputbox" autocomplete="off" required/>
        </div>

        <!-- Secondary -->
        <hr class="col-span-full mt-5 border border-slate-600" />

        <span class="col-span-full my-4 text-lg font-medium text-gray-900">Secondary</span>

        <div class="col-span-2 space-y-1">
            <label class="block text-sm font-medium text-gray-700">Name of School</label>
            <input type="text" name="secondary-school" id="secondary-school" class="inputbox group" autocomplete="off" required/>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Degree</label>
            <input type="text" name="secondary-degree" id="secondary-degree" class="inputbox" autocomplete="off" required/>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Highest Level Earned</label>
            <input type="text" name="secondary-highest-unit" id="secondary-highest-unit" class="inputbox" value="N/A" autocomplete="off" required/>
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
            <input type="text" name="secondary-awards" id="secondary-awards" class="inputbox" autocomplete="off" required/>
        </div>

        <!-- Vocational Course -->
        <hr class="col-span-full mt-5 border border-slate-600" />

        <span class="col-span-full my-4 text-lg font-medium text-gray-900">Vocational / Trade Course</span>

        <div class="col-span-2 space-y-1">
            <label class="block text-sm font-medium text-gray-700">Name of School</label>
            <input type="text" name="vocational-school" id="vocational-school" class="inputbox group" autocomplete="off" required/>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Degree</label>
            <input type="text" name="vocational-degree" id="vocational-degree" class="inputbox" autocomplete="off" required/>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Highest Level Earned</label>
            <input type="text" name="vocational-highest-unit" id="vocational-highest-unit" class="inputbox" value="N/A" autocomplete="off" required/>
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
            <input type="text" name="vocational-awards" id="vocational-awards" class="inputbox" autocomplete="off" required/>
        </div>

        <!-- College -->
        <hr class="col-span-full mt-5 border border-slate-600" />

        <span class="col-span-full my-4 text-lg font-medium text-gray-900">College</span>

        <div class="col-span-2 space-y-1">
            <label class="block text-sm font-medium text-gray-700">Name of School</label>
            <input type="text" name="college-school" id="college-school" class="inputbox group" autocomplete="off" required/>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Degree</label>
            <input type="text" name="college-degree" id="college-degree" class="inputbox" autocomplete="off" required/>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Highest Level Earned</label>
            <input type="text" name="college-highest-unit" id="college-highest-unit" class="inputbox" value="N/A" autocomplete="off" required/>
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
            <input type="text" name="college-awards" id="college-awards" class="inputbox" autocomplete="off" required/>
        </div>

        <!-- Graduate Studies -->
        <hr class="col-span-full mt-5 border border-slate-600" />

        <span class="col-span-full my-4 text-lg font-medium text-gray-900">Graduate Studies</span>

        <div class="col-span-2 space-y-1">
            <label class="block text-sm font-medium text-gray-700">Name of School</label>
            <input type="text" name="graduate-school" id="graduate-school" class="inputbox group" autocomplete="off" required/>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Degree</label>
            <input type="text" name="graduate-degree" id="graduate-degree" class="inputbox" autocomplete="off" required/>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Highest Level Earned</label>
            <input type="text" name="graduate-highest-unit" id="graduate-highest-unit" class="inputbox" value="N/A" autocomplete="off" required/>
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
            <input type="text" name="graduate-awards" id="graduate-awards" class="inputbox" autocomplete="off" required/>
        </div>
    </div>
</div>