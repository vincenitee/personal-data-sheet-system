<!-- Learning and Developement -->
<div class="mx-auto hidden w-[65%] py-2" data-step>
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