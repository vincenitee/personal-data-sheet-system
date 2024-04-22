<div class="mx-auto hidden w-[65%] space-y-3 py-2" data-step>
    <!-- Title -->
    <h1 class="text-xl font-bold text-blue-800">9. Additional Questions</h1>

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
                <td class="px-6 py-4">34.</td>
                <td class="px-6 py-4 text-justify">Are you related by consanguinity or affinity to the appointing or recommending authority, or to the chief of bureau or office or to the person who has immediate supervision over you in the Office, Bureau or Department where you will be apppointed,</td>
            </tr>
            <tr>
                <td class="w-10 px-6 py-4">&nbsp;</td>
                <td class="px-6 py-4">a. within the third degree?</td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="third-degree-yes" id="third-degree-yes" class="mx-auto size-5" />
                </td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="third-degree-yes" id="third-degree-yes" class="mx-auto size-5" />
                </td>
                <td class="w-10 px-6 py-4">&nbsp;</td>
            </tr>

            <tr>
                <td class="w-10 px-6 py-4">&nbsp;</td>
                <td class="px-6 py-4">b. within the fourth degree (for Local Government Unit - Career Employees)?</td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="third-degree-yes" id="third-degree-yes" class="mx-auto size-5" />
                </td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="third-degree-yes" id="third-degree-yes" class="mx-auto size-5" />
                </td>

                <td class="px-6 py-4">
                    <input type="text" name="consanguinity-info" class="inputbox mx-auto" placeholder="If YES, provide details" />
                </td>
            </tr>

            <tr class="border-t-2 border-slate-400">
                <td class="px-6 py-4">35.</td>
                <td class="px-6 py-4">a. Have you ever been found guilty of any administrative offense?</td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="admin-offense-yes" id="admin-offense-yes" class="mx-auto size-5" />
                </td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="admin-offense-no" id="admin-offense-no" class="mx-auto size-5" />
                </td>

                <td class="px-6 py-4">
                    <input type="text" name="admin-offense-info" class="inputbox mx-auto" placeholder="If YES, provide details" />
                </td>
            </tr>

            <tr>
                <td class="px-6 py-4">&nbsp;</td>
                <td class="px-6 py-4">b. Have you been criminally charged before any court?</td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="crim-offense-yes" id="crim-offense-yes" class="mx-auto size-5" />
                </td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="crim-offense-no" id="crim-offense-no" class="mx-auto size-5" />
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
                        <input type="text" name="date-filed" id="date-filed" class="date-inputbox" autocomplete="off" placeholder="Date Filed" required />
                    </div>
                </td>
            </tr>
            <tr class="border-t-2 border-slate-400">
                <td class="px-6 py-4">36.</td>
                <td class="px-6 py-4">Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?</td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="crime-conviction-yes" id="crime-conviction-yes" class="mx-auto size-5" />
                </td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="crime-conviction-no" id="crime-conviction-no" class="mx-auto size-5" />
                </td>

                <td class="px-6 py-4">
                    <input type="text" name="crime-conviction-info" class="inputbox mx-auto" placeholder="If YES, provide details" />
                </td>
            </tr>
            <tr class="border-t-2 border-slate-400">
                <td class="px-6 py-4">37.</td>
                <td class="px-6 py-4 text-justify">Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector?</td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="separation-yes" id="separation-yes" class="mx-auto size-5" />
                </td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="separation-no" id="separation-no" class="mx-auto size-5" />
                </td>

                <td class="px-6 py-4">
                    <input type="text" name="separation-info" class="inputbox mx-auto" placeholder="If YES, provide details" />
                </td>
            </tr>
            <tr class="border-t-2 border-slate-400">
                <td class="px-6 py-4">38.</td>
                <td class="px-6 py-4 text-justify">a. Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?</td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="candidate-yes" id="candidate-yes" class="mx-auto size-5" />
                </td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="candidate-no" id="candidate-no" class="mx-auto size-5" />
                </td>

                <td class="px-6 py-4">
                    <input type="text" name="candidate-info" class="inputbox mx-auto" placeholder="If YES, provide details" />
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4">&nbsp;</td>
                <td class="px-6 py-4 text-justify">b. Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?</td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="gov-resignation-yes" id="gov-resignation-yes" class="mx-auto size-5" />
                </td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="gov-resignation-no" id="gov-resignation-no" class="mx-auto size-5" />
                </td>

                <td class="px-6 py-4">
                    <input type="text" name="gov-resignation-info" class="inputbox mx-auto" placeholder="If YES, provide details" />
                </td>
            </tr>
            <tr class="border-t-2 border-slate-400">
                <td class="px-6 py-4">39.</td>
                <td class="px-6 py-4 text-justify">Have you acquired the status of an immigrant or permanent resident of another country?</td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="foreign-residency-yes" id="foreign-residency-yes" class="mx-auto size-5" />
                </td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="foreign-residency-no" id="foreign-residency-no" class="mx-auto size-5" />
                </td>

                <td class="px-6 py-4">
                    <div class="group relative">
                        <select name="foreign-residency-info" id="foreign-residency-info" class="dropdown" required>
                            <option value=""></option>
                            <option value="N/A">N/A</option>
                        </select>
                        <label class="pointer-events-none text-sm absolute inset-x-2 inset-y-3 text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-1 group-focus-within:text-xs">If YES, choose country</label>
                    </div>
                </td>
            </tr>
            <tr class="border-t-2 border-slate-400">
                <td class="px-6 py-4">40.</td>
                <td class="px-6 py-4 text-justify">Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:</td>
            </tr>
            <tr>
                <td class="w-10 px-6 py-4">&nbsp;</td>
                <td class="px-6 py-4">a. Are you a member of any indigenous group?</td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="indigenous-yes" id="indigenous-yes" class="mx-auto size-5" />
                </td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="indigenous-no" id="indigenous-no" class="mx-auto size-5" />
                </td>
                <td class="px-6 py-4">
                    <input type="text" name="indigenous-info" class="inputbox mx-auto" placeholder="If YES, please specify" />
                </td>
            </tr>
            <tr>
                <td class="w-10 px-6 py-4">&nbsp;</td>
                <td class="px-6 py-4">b. Are you a person with disability?</td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="pwd-yes" id="pwd-yes" class="mx-auto size-5" />
                </td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="pwd-no" id="pwd-no" class="mx-auto size-5" />
                </td>
                <td class="px-6 py-4">
                    <input type="number" name="pwd-info" class="inputbox mx-auto" placeholder="If YES, provide ID Number" />
                </td>
            </tr>
            <tr>
                <td class="w-10 px-6 py-4">&nbsp;</td>
                <td class="px-6 py-4">c. Are you a solo parent?</td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="solo-parent-yes" id="solo-parent-yes" class="mx-auto size-5" />
                </td>
                <td class="px-6 py-4">
                    <input type="checkbox" name="solo-parent-no" id="solo-parent-no" class="mx-auto size-5" />
                </td>
                <td class="px-6 py-4">
                    <input type="number" name="solo-parent-info" class="inputbox mx-auto" placeholder="If YES, provide ID Number" />
                </td>
            </tr>
        </tbody>
    </table>

    <div class="space-y-3">
        <div class="flex items-center justify-between bg-blue-200 px-6 py-4">
            <h1>41. References <span class="text-sm font-medium italic">(Person or not related by consanguinity or affinity to applicant/appointee)</span></h1>
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