<!-- Educational Background -->
<div class="mx-auto hidden w-[65%] py-2" data-step>
    <!-- Title -->
    <div class="space-y-3 py-2">
        <h1 class="text-xl font-bold text-slate-600 ">3. Educational Background</h1>
        <p class="text-sm text-slate-600">Please ensure all required fields are filled up. You can use "N/A" for fields that are not applicable.</p>
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
            <input type="text" name="elementary-highest-unit" id="elementary-highest-unit" class="inputbox" autocomplete="off" required/>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Start of Attendance</label>
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                </div>
                <input type="text" name="elementary-start-date" id="elementary-start-date" class="date-inputbox" autocomplete="off" placeholder="Select date" required/>
            </div>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">End of Attendance</label>
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                </div>
                <input type="text" name="elementary-end-date" id="elementary-end-date" class="date-inputbox" autocomplete="off" placeholder="Select date" required/>
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
            <input type="text" name="secondary-highest-unit" id="secondary-highest-unit" class="inputbox" autocomplete="off" required/>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Attendance</label>
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                </div>
                <input type="text" name="secondary-start-date" id="secondary-start-date" class="date-inputbox" autocomplete="off" placeholder="Select date" required />
            </div>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">End of Attendance</label>
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                </div>
                <input type="text" name="secondary-end-date" id="secondary-end-date" class="date-inputbox" autocomplete="off" placeholder="Select date" required />
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
            <input type="text" name="vocational-highest-unit" id="vocational-highest-unit" class="inputbox" autocomplete="off" required/>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Attendance</label>
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                </div>
                <input type="text" name="vocational-start-date" id="vocational-start-date" class="date-inputbox" autocomplete="off" placeholder="Select date" required />
            </div>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">End of Attendance</label>
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                </div>
                <input type="text" name="vocational-end-date" id="vocational-end-date" class="date-inputbox" autocomplete="off" placeholder="Select date" required />
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
            <input type="text" name="college-highest-unit" id="college-highest-unit" class="inputbox" autocomplete="off" required/>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Attendance</label>
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                </div>
                <input type="text" name="college-start-date" id="college-start-date" class="date-inputbox" autocomplete="off" placeholder="Select date" required />
            </div>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">End of Attendance</label>
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                </div>
                <input type="text" name="college-end-date" id="college-end-date" class="date-inputbox" autocomplete="off" placeholder="Select date" required />
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
            <input type="text" name="graduate-highest-unit" id="graduate-highest-unit" class="inputbox" autocomplete="off" required/>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Attendance</label>
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                </div>
                <input type="text" name="graduate-start-date" id="graduate-start-date" class="date-inputbox" autocomplete="off" placeholder="Select date" required />
            </div>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">End of Attendance</label>
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                </div>
                <input type="text" name="graduate-end-date" id="graduate-end-date" class="date-inputbox" autocomplete="off" placeholder="Select date" required />
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