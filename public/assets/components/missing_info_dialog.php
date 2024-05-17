<!-- Missing Information Dialog -->
<dialog class="w-[24rem] p-5 rounded-md absolute z-50 top-20 shadow-lg m-0 left-1/2 transform -translate-x-1/2 transition-transform duration-500 ease-in-out opacity-100 translate-y-0" id="missing-info-dialog">
    <div class="px-2 py-1 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-slate-900">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
        </svg>

        <span class="font-semibold text-slate-900">Missing or Incorrect Information</span>
    </div>
    <p class="px-2 py-3 text-sm mb-5 text-slate-600">
        Please ensure all required fields are filled out correctly before moving to the next section or submitting the form.
    </p>
    <div class="flex justify-end">
        <button type="button" class="px-10 select-none rounded-md py-1 bg-blue-500 text-white text-sm hover:bg-blue-600 active:bg-blue-700" data-close-dialog>Close</button>
    </div>
</dialog>
