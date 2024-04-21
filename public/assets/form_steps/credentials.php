<div class="mx-auto w-3/4 space-y-3 py-2" data-step>
    <div class="space-y-1">
        <h1 class="text-xl font-bold text-blue-800">10. Credentials</h1>
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
            <input type="text" name="gov-issued-id" id="gov-issued-id" class="inputbox" autocomplete="off" required />
        </div>
        <div class="flex items-center px-6 py-2">
            <label class="justify-items-end font-medium text-gray-700">ID/License/Passport No. :</label>
        </div>
        <div class="px-6 py-2">
            <input type="number" name="gov-issued-id-no" id="gov-issued-id-no" class="inputbox" autocomplete="off" required />
        </div>
        <div class="flex items-center px-6 py-2">
            <label class="justify-items-end font-medium text-gray-700">Date/Place of Issuance :</label>
        </div>
        <div class="px-6 py-2">
            <input type="number" name="gov-issued-id-no" id="gov-issued-id-no" class="inputbox" autocomplete="off" required />
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
            <input type="file" name="gov-id-img" id="gov-id-img" class="border valid:text-slate-700 text-slate-500 border-slate-600 file:bg-blue-500
                            file:text-white file:text-sm file:border-0 file:px-2 file:py-2 file:disabled" required>
        </div>
        <div class="px-6 py-2">
            <label class="block font-medium text-slate-700">Right Thumbmark</label>
        </div>
        <div class="px-6 py-2">
            <input type="file" name="right-thumb-img id=" right-thumb-img" class="border valid:text-slate-700 text-slate-500 border-slate-600 file:bg-blue-500
                            file:text-white file:text-sm file:border-0 file:px-2 file:py-2 file:disabled" required>
        </div>
        <div class="px-6 py-2">
            <label class="block font-medium text-slate-700">Signature</label>
        </div>
        <div class="px-6 py-2">
            <input type="file" name="signature-img" id="signature-img" class="border valid:text-slate-700 text-slate-500 border-slate-600 file:bg-blue-500
                            file:text-white file:text-sm file:border-0 file:px-2 file:py-2 file:disabled" required>
        </div>

    </div>
</div>