<header>
    <div class="flex items-center justify-between bg-blue-500 px-5 py-2">
        <!-- Menu & title -->
        <div class="flex items-center gap-2">
            <button class="p-1 active:bg-blue-700">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w- h-7 text-white">
                    <path fill-rule="evenodd" d="M3 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 5.25Zm0 4.5A.75.75 0 0 1 3.75 9h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 9.75Zm0 4.5a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Zm0 4.5a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                </svg>
            </button>
            <span class="text-xl text-white">Personal Data Sheet</span>
        </div>

        <!-- User photo -->
        <div class="size-9 overflow-hidden rounded-full ring-2 ring-white">
            <img src="../images.jpg" alt="" class="object-contain object-center" />
        </div>
    </div>

    <!-- Form Navigation Start -->
    <div class="flex items-center justify-center border-b-2 bg-gray-50">
        <div class="flex w-3/4 justify-around overflow-x-auto" id="menu-container">
            <ul class="flex w-full flex-shrink-0 justify-around gap-12">

                <li id="personal-details" class="active flex-shrink-0 py-1" data-item>
                    <a href="" class="flex items-center justify-center gap-x-1 p-1 opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span class="text-sm text-gray-400">Personal details</span>
                    </a>
                </li>

                <li id="family-background" class="flex-shrink-0 py-1" data-item>
                    <a href="" class="flex items-center justify-center gap-x-1 p-1 opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span class="text-sm text-gray-600">Family background</span>
                    </a>
                </li>

                <li id="educ-background" class="flex-shrink-0 py-1" data-item>
                    <a href="" class="flex items-center justify-center gap-x-1 p-1 opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span class="text-sm text-gray-600">Educational background</span>
                    </a>
                </li>

                <li id="cs-eligibility" class="flex-shrink-0 py-1" data-item>
                    <a href="" class="flex items-center justify-center gap-x-1 p-1 opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span class="text-sm text-gray-600">CS eligibility</span>
                    </a>
                </li>

                <li id="cs-eligibility" class="flex-shrink-0 py-1" data-item>
                    <a href="" class="flex items-center justify-center gap-x-1 p-1 opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span class="text-sm text-gray-600">Work experience</span>
                    </a>
                </li>
            </ul>

            <!-- Section 2 -->
            <ul class="flex w-full flex-shrink-0 justify-around gap-12">
                <li class="active flex-shrink-0 py-1" id="personal-details" data-item>
                    <a href="" class="flex flex-shrink-0 items-center justify-center gap-x-1 p-1 opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                        <span class="text-sm text-gray-400">Voluntary work details</span>
                    </a>
                </li>

                <li id="family-background" class="flex-shrink-0 py-1" data-item>
                    <a href="" class="flex items-center justify-center gap-x-1 p-1 opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span class="text-sm text-gray-600">Training details</span>
                    </a>
                </li>

                <li id="educ-background" class="flex-shrink-0 py-1" data-item>
                    <a href="" class="flex items-center justify-center gap-x-1 p-1 opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span class="text-sm text-gray-600">Other information</span>
                    </a>
                </li>

                <li id="cs-eligibility" class="flex-shrink-0 py-1" data-item>
                    <a href="" class="flex items-center justify-center gap-x-1 p-1 opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span class="text-sm text-gray-600">Additional questions</span>
                    </a>
                </li>

                <li id="cs-eligibility" class="flex-shrink-0 py-1" data-item>
                    <a href="" class="flex items-center justify-center gap-x-1 p-1 opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span class="text-sm text-gray-600">Credentials</span>
                    </a>
                </li>
            </ul>
        </div>

        <button class="rounded-md p-2 transition-all duration-300 ease-in-out hover:bg-gray-200 active:bg-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-5 text-blue-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
            </svg>
        </button>
    </div>

    <!-- Program Navigation End -->
</header>