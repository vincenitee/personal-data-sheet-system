<?php include './assets/components/invalid_file_type_dialog.php' ?>

<div class="mx-auto hidden space-y-3 py-2" data-step>
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
            <input type="file" name="right-thumb-img" id="right-thumb-img" class="border text-sm valid:text-slate-700 text-slate-500 border-slate-600 file:bg-blue-500
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