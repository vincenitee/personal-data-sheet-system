<!-- Other Information -->
<div class="mx-auto hidden py-2" data-step>
    <!-- Title -->
    <div class="space-y-3">
        <h1 class="text-xl font-bold text-slate-600 ">8. Other Information</h1>
        <p class="text-sm text-slate-600 rounded-sm">Please ensure all required fields are filled up. You can use <strong>N/A</strong> for fields that are not applicable.</p>
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
                <input type="text" name="skill-1" id="skill-1" class="inputbox" autocomplete="off" required />
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
                <input type="text" name="recognition-1" id="recognition-1" class="inputbox" autocomplete="off" required />

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
                <input type="text" name="membership-1" id="membership-1" class="inputbox" autocomplete="off" required />

                <button type="button" class="del-button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>