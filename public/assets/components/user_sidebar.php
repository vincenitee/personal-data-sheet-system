<aside class="absolute top-0 inline-block min-h-screen -translate-x-full bg-slate-900 p-2 shadow-md transition-all z-10 duration-200">

    <div class="flex items-center justify-between gap-10 border-b py-2 pr-2">
        <div class="flex items-center gap-2 p-2">
            <!-- logo container -->
            <div class="rounded-md p-1 text-white ring-2 ring-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 13.5H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                </svg>
            </div>

            <h3 class="text-white text-sm">
                Personal <br />
                Data Sheet
            </h3>
        </div>

        <!-- close button -->
        <button class="relative flex-shrink-0 rounded p-0.5 text-white ring-slate-300 hover:ring-2" id="close-sidebar">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </button>
    </div>

    <div class="space-y-2 p-1">
        <!-- overview contents -->

        <div class="space-y-3">
            <a href="user_dashboard.php" class="flex items-center gap-2 transition-all duration-75 hover:bg-blue-600 px-0.5 py-1 text-white" id="add-entry-link">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
                <span class="text-sm">Add Entry</span>
            </a>
        </div>

        <!-- account contents -->
        <div class="space-y-3">
            <h5 class="pt-2 text-sm font-medium text-white">Account</h5>
            
            <a href="./assets/database/logout.php" class="flex items-center gap-2 transition-all duration-75 hover:bg-blue-600 px-0.5 py-1 text-white" id="logout-link">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                </svg>

                <span class="text-sm">Log out</span>
            </a>
        </div>
    </div>
</aside>