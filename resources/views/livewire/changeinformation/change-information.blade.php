<div>
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{route('dashboard')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
            </svg>
            Home
            </a>
        </li>
        <li>
            <div class="flex items-center">
            <svg class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <a href="{{route('profile')}}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Profile</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Change</span>
            </div>
        </li>
        </ol>
    </nav> 
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">Change Information Request</h2>
    <section class="bg-white dark:bg-gray-900 pb-24 px-8  rounded-lg">
        <div class=" px-1 mx-auto pt-8">
            <form wire:submit.prevent="submit" method="POST">
                @csrf
                <div class="grid grid-cols-1 mb-4 w-full col-span-3 gap-4 min-[902px]:grid-cols-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                    <h2><b>Information</b></h2>
                    <div class="p-6 col-span-3 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                        <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4">
                            <div class="w-full ">
                                <label for="firstname"
                                    class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">First name <span class="text-red-600">*</span></label>
                                <input type="text" name="firstname" id="firstname"  wire:model="first_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="First name" required="" >
                            </div>
                            <div class="w-full ">
                                <label for="middlename"
                                    class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Middle name <span class="text-red-600">*</span></label>
                                <input type="text" name="middlename" id="middlename" wire:model="middle_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Middle name" required="" >
                            </div>
                            <div class="w-full">
                                <label for="lastname"
                                    class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Last name <span class="text-red-600">*</span></label>
                                <input type="text" name="lastname" id="lastname"  wire:model="last_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Last name" required="" >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 mb-4 w-full col-span-3 gap-4 min-[902px]:grid-cols-2 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                    <h2><b>Other Information</b></h2>
                        <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 col-span-3 pb-4">
                            <div class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <div class="w-full ">
                                    <label for="phonenumber"
                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        Phone Number <span class="text-red-600">*</span></label>
                                    <input type="text" name="phonenumber" id="phonenumber" wire:model="phone"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                         required="" >
                                </div>
                               
                                <div class="w-full ">
                                    <label for="sex"
                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        Sex <span class="text-red-600">*</span></label>
                                    <input type="text" name="sex" id="sex" wire:model="gender"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                         required="" >
                                </div>
                                <div class="w-full ">
                                    <label for="firstname"
                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        Personal Email <span class="text-red-600">*</span></label>
                                    <input type="text" name="personalemail" id="personalemail"  wire:model="personal_email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                         required="" >
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <div class="w-full ">
                                    <label for="agenum"
                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        Age <span class="text-red-600">*</span></label>
                                    <input type="number" name="agenum" id="agenum" wire:model="age"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                         required="" >
                                </div>
                                <div class="w-full ">
                                    <label for="birthdate"
                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        Birth Date <span class="text-red-600">*</span></label>
                                    <input type="date" name="birthdate" id="birthdate" wire:model="birth_date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                         required="" >
                                </div>
                                
                                <div class="w-full">
                                    <label for="address"
                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        Address <span class="text-red-600">*</span></label>
                                    <input type="text" name="address" id="address"  wire:model="address"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                         required="" >
                                </div>
                            </div>
                        </div>
                </div>


                <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-2 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                    <h2><b>Employee History</b></h2>
                    <div class="grid grid-cols-1  gap-4 col-span-3 pb-4">
                        @foreach ($employeeHistory as $index => $history)
                            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <div class="col-span-5">
                                    <ul class="text-sm font-medium text-right text-gray-500 border border-gray-300 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                                        <li class="float-left mt-4 ml-5 font-bold">
                                            <span>No. {{$index + 1 }}</span>
                                        </li>
                                        <li class="">
                                            <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true"
                                            type="button" name="add" wire:click.prevent="removePreTestQuestion({{$index}})" wire:confirm="Are you sure you want to delete this function?"
                                            class="inline-block p-4 text-red-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-red-500">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round"  stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="border border-gray=200 border-solid p-6 ">
                                        <div class="mt-5 ">
                                            <label for="employeeHistory_{{$index}}_name_of_company" class="block mb-2 text-sm whitespace-nowrap font-medium text-gray-900 dark:text-white">
                                                Company Name <span class="text-red-600">*</span></label>
                                            <input type="text" rows="4" id="employeeHistory_{{$index}}_name_of_company" name="employeeHistory[{{$index}}][name_of_company]" wire:model.blur="employeeHistory.{{$index}}.name_of_company" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
                                            @error('employeeHistory.' . $index . '.name_of_company')   
                                                <div class="transition transform alert alert-danger text-sm"
                                                        x-data x-init="document.getElementById('employeeHistory_{{$index}}_nameOfCompany').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('employeeHistory_{{$index}}_nameOfCompany').focus();">
                                                    <span class="text-red-500 text-xs "> {{$message}}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                        <div class="mt-5 ">
                                            <label for="employeeHistory_{{$index}}_position" class="block mb-2 text-sm whitespace-nowrap font-medium text-gray-900 dark:text-white">
                                                Position <span class="text-red-600">*</span></label>
                                            <input type="text" rows="4" id="employeeHistory_{{$index}}_position" name="employeeHistory[{{$index}}][position]" wire:model.blur="employeeHistory.{{$index}}.prev_position" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
                                            @error('employeeHistory.' . $index . '.position')   
                                                <div class="transition transform alert alert-danger text-sm"
                                                        x-data x-init="document.getElementById('employeeHistory_{{$index}}_position').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('employeeHistory_{{$index}}_position').focus();">
                                                    <span class="text-red-500 text-xs "> {{$message}}</span>
                                                </div> 
                                            @enderror
                                        </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="mt-5">
                                            <label for="employeeHistory_{{$index}}_start_date" class="block mb-2 text-sm whitespace-nowrap font-medium text-gray-900 dark:text-white">
                                                Start Date <span class="text-red-600">*</span></label>
                                            <input type="date" rows="4" id="employeeHistory_{{$index}}_start_date" name="employeeHistory[{{$index}}][start_date]" wire:model.blur="employeeHistory.{{$index}}.start_date" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
                                            @error('employeeHistory.' . $index . '.start_date')   
                                                <div class="transition transform alert alert-danger text-sm"
                                                        x-data x-init="document.getElementById('employeeHistory_{{$index}}_end_date').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('employeeHistory_{{$index}}_start_date').focus();">
                                                    <span class="text-red-500 text-xs "> {{$message}}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                        <div class="mt-5">
                                            <label for="employeeHistory_{{$index}}_end_date" class="block mb-2 text-sm whitespace-nowrap font-medium text-gray-900 dark:text-white">
                                                End Date <span class="text-red-600">*</span></label>
                                            <input type="date" rows="4" id="employeeHistory_{{$index}}_end_date" name="employeeHistory[{{$index}}][end_date]" wire:model.blur="employeeHistory.{{$index}}.end_date" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
                                            @error('employeeHistory.' . $index . '.end_date')   
                                                <div class="transition transform alert alert-danger text-sm"
                                                        x-data x-init="document.getElementById('employeeHistory_{{$index}}_end_date').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('employeeHistory_{{$index}}_end_date').focus();">
                                                    <span class="text-red-500 text-xs "> {{$message}}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        @endforeach
                    </div>
                </div>


                <div class="grid grid-cols-1 col-span-3 p-6 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                    <h2><b>Submit Documents</b></h2>
                    <div class="grid grid-cols-1 gap-4">
                        {{-- 1st Row --}}
                        <div class="grid grid-cols-1 min-[800px]:grid-cols-2 gap-4">
                            {{-- 1 --}}
                            <div class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <label for="cover_memo"
                                class="block text-sm font-medium text-gray-900 dark:text-white">1. Cover Memo<span class="text-red-600">*</span></label>
                                <div class="grid grid-cols-1 items-center justify-center w-full">
                                    @if($emp_photo)
                                    <label for="cover_memo" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <p class="mb-2 sm:text-lg  text-center text-green-500 dark:text-gray-400"><span class="font-semibold">File Uploaded</span></p> 
                                        <input id="cover_memo" type="file" class="hidden" wire:model.blur="emp_photo" multiple>
                                    </label>
                                    @else
                                    <label for="cover_memo" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                            <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 800x400px)</p>
                                        </div>
                                        <input id="cover_memo" type="file" class="hidden" wire:model.blur="emp_photo" multiple/>
                                    </label>
                                    @endif
                                    @error('emp_photo')
                                        <div class="transition transform alert alert-danger"
                                                x-init="$el.closest('form').scrollIntoView()">
                                            <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                        </div> 
                                    @enderror
                                </div>
                            </div>
                            {{-- 2 --}}
                            <div class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <label for="request_letter"
                                class="block text-sm font-medium text-gray-900 dark:text-white">2. Request Letter<span class="text-red-600">*</span></label>
                                <div class="grid grid-cols-1 items-center justify-center w-full">
                                    @if($emp_diploma)
                                    <label for="request_letter" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <p class="mb-2 sm:text-lg  text-center text-green-500 dark:text-gray-400"><span class="font-semibold">File Uploaded</span></p> 
                                        <input id="request_letter" type="file" class="hidden" wire:model.blur="emp_diploma" multiple>
                                    </label>
                                    @else
                                    <label for="request_letter" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                            <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 800x400px)</p>
                                        </div>
                                        <input id="request_letter" type="file" class="hidden" wire:model.blur="emp_diploma" multiple />
                                    </label>
                                    @endif
                                    @error('emp_diploma')
                                        <div class="transition transform alert alert-danger"
                                                x-init="$el.closest('label').scrollIntoView()">
                                            <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                        </div> 
                                    @enderror
                                </div>

                            </div>

                        </div>

                        {{-- 2nd Row --}}
                        <div class="grid grid-cols-1 min-[800px]:grid-cols-2 gap-4">
                            {{-- 3 --}}
                            <div class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <label for="teaching_assignment"
                                class="block text-sm font-medium text-gray-900 dark:text-white">3. Teaching Assignment (For Faculty Members)</label>
                                <div class="grid grid-cols-1 items-center justify-center w-full">
                                    @if($emp_TOR)
                                    <label for="teaching_assignment" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <p class="mb-2 sm:text-lg  text-center text-green-500 dark:text-gray-400"><span class="font-semibold">File Uploaded</span></p> 
                                        <input id="teaching_assignment" type="file" class="hidden" wire:model.blur="teaching_assignment">
                                    </label>
                                    @else
                                    <label for="teaching_assignment" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                            <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 800x400px)</p>
                                        </div>
                                        <input id="teaching_assignment" type="file" class="hidden" wire:model.blur="teaching_assignment" />
                                    </label>
                                    @endif
                                    @error('emp_TOR')
                                        <div class="transition transform alert alert-danger"
                                                x-init="$el.closest('label').scrollIntoView()">
                                            <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                        </div> 
                                    @enderror
                                </div>
                            </div>
                            {{-- 4 --}}
                            <div class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <label for="summary_of_schedule"
                                class="block text-sm font-medium text-gray-900 dark:text-white">4. Summary Of Schedule (c/o HR)<span class="text-red-600">*</span></label>
                                <div class="grid grid-cols-1 items-center justify-center w-full">
                                    @if($emp_cert_of_trainings_seminars)
                                    <label for="summary_of_schedule" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <p class="mb-2 sm:text-lg  text-center text-green-500 dark:text-gray-400"><span class="font-semibold">File Uploaded</span></p> 
                                        <input id="summary_of_schedule" type="file" class="hidden" wire:model.blur="summary_of_schedule">
                                    </label>
                                    @else
                                    <label for="summary_of_schedule" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                            <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 800x400px)</p>
                                        </div>
                                        <input id="summary_of_schedule" type="file" class="hidden" wire:model.blur="summary_of_schedule" />
                                    </label>
                                    @endif
                                    @error('emp_cert_of_trainings_seminars')
                                        <div class="transition transform alert alert-danger"
                                                x-init="$el.closest('label').scrollIntoView()">
                                            <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                        </div> 
                                    @enderror
                                </div>
                               
                            </div>

                        </div>

                        {{-- 3rd Row --}}
                        <div class="grid grid-cols-1 min-[800px]:grid-cols-2 gap-4">
                        {{-- 5 --}}
                            <div class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <label for="certif_of_grades"
                                class="block text-sm font-medium text-gray-900 dark:text-white">5. Certification of Grades (With Scholarship only)</label>
                                <div class="grid grid-cols-1 items-center justify-center w-full">
                                    @if($emp_auth_copy_of_csc_or_prc)
                                    <label for="certif_of_grades" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        {{-- <img src="{{ $certif_of_grades->temporaryUrl() }}" class="w-full h-full object-contain" alt="Uploaded Image"> --}}
                                        <p class="mb-2 sm:text-lg  text-center text-green-500 dark:text-gray-400"><span class="font-semibold">File Uploaded</span></p> 
                                        <input id="certif_of_grades" type="file" class="hidden" wire:model.blur="certif_of_grades">
                                    </label>
                                    @else
                                    <label for="certif_of_grades" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                            <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 800x400px)</p>
                                        </div>
                                        <input id="certif_of_grades" type="file" class="hidden" wire:model.blur="certif_of_grades" />
                                    </label>
                                    @endif
                                    @error('emp_auth_copy_of_csc_or_prc')
                                        <div class="transition transform alert alert-danger"
                                                x-init="$el.closest('label').scrollIntoView()">
                                            <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                        </div> 
                                    @enderror
                                </div>
                            </div>
                            {{-- 6 --}}
                            <div class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <label for="study_plan"
                                class="block text-sm font-medium text-gray-900 dark:text-white">6. Study Plan (Optional if Outside PLM)</label>
                                @if($emp_auth_copy_of_prc_board_rating)
                                <div class="grid grid-cols-1 items-center justify-center w-full">
                                    <label for="study_plan" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        {{-- <img src="{{ $study_plan->temporaryUrl() }}" class="w-full h-full object-contain" alt="Uploaded Image"> --}}
                                        <p class="mb-2 sm:text-lg  text-center text-green-500 dark:text-gray-400"><span class="font-semibold">File Uploaded</span></p> 
                                        <input id="study_plan" type="file" class="hidden" wire:model.blur="study_plan">
                                    </label>
                                    @error('emp_auth_copy_of_prc_board_rating')
                                        <div class="transition transform alert alert-danger"
                                                x-init="$el.closest('label').scrollIntoView()">
                                            <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                        </div> 
                                    @enderror
                                </div>
                                @else
                                <div class="grid grid-cols-1 items-center justify-center w-full ">
                                    <label for="study_plan" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                            <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 800x400px)</p>
                                        </div>
                                        <input id="study_plan" type="file" class="hidden" wire:model.blur="study_plan" />
                                    </label>
                                    @error('emp_auth_copy_of_prc_board_rating')
                                        <div class="transition transform alert alert-danger"
                                                x-init="$el.closest('label').scrollIntoView()">
                                            <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                        </div> 
                                    @enderror
                                </div> 
                                @endif
                            </div>
                        </div>

                         {{-- 4th Row --}}
                         <div class="grid grid-cols-1 min-[800px]:grid-cols-2 gap-4">
                            {{-- 7 --}}
                                <div class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                    <label for="student_faculty_eval"
                                    class="block text-sm font-medium text-gray-900 dark:text-white">7. Student's Faculty Evaluation (For Faculty Members)</label>
                                    <div class="grid grid-cols-1 items-center justify-center w-full">
                                        @if($emp_med_certif)
                                        <label for="student_faculty_eval" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            <p class="mb-2 sm:text-lg  text-center text-green-500 dark:text-gray-400"><span class="font-semibold">File Uploaded</span></p> 
                                            <input id="student_faculty_eval" type="file" class="hidden" wire:model.blur="student_faculty_eval">
                                        </label>
                                        @else
                                        <label for="student_faculty_eval" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                </svg>
                                                <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 800x400px)</p>
                                            </div>
                                            <input id="student_faculty_eval" type="file" class="hidden" wire:model.blur="student_faculty_eval" />
                                        </label>
                                        @endif
                                        @error('emp_med_certif')
                                            <div class="transition transform alert alert-danger"
                                                    x-init="$el.closest('label').scrollIntoView()">
                                                <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                            </div> 
                                        @enderror
                                    </div>
                                </div>
                                {{-- 8 --}}
                                <div class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                    <label for="rated_ipcr"
                                    class="block text-sm font-medium text-gray-900 dark:text-white">8. Rated IPCR (last 2 rating periods)<span class="text-red-600">*</span></label>
                                    <div class="grid grid-cols-1 items-center justify-center w-full">
                                        @if($emp_nbi_clearance)
                                            <label for="rated_ipcr" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                <p class="mb-2 sm:text-lg  text-center text-green-500 dark:text-gray-400"><span class="font-semibold">File Uploaded</span></p> 
                                                <input id="rated_ipcr" type="file" class="hidden" wire:model.blur="rated_ipcr">
                                            </label>
                                        @else
                                            <label for="rated_ipcr" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                    </svg>
                                                    <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                    <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 800x400px)</p>
                                                </div>
                                                <input id="rated_ipcr" type="file" class="hidden" wire:model.blur="rated_ipcr" />
                                            </label>
                                        @endif
                                        @error('emp_nbi_clearance')
                                            <div class="transition transform alert alert-danger"
                                                    x-init="$el.closest('label').scrollIntoView()">
                                                <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                            </div> 
                                        @enderror
                                    </div>
                                </div>
                            </div>

                                {{-- 5th row --}}
                                <div class="grid grid-cols-1 min-[800px]:grid-cols-2 gap-4">
                                    {{-- 7 --}}
                                        <div class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                            <label for="student_faculty_eval"
                                            class="block text-sm font-medium text-gray-900 dark:text-white">9. Student's Faculty Evaluation (For Faculty Members)</label>
                                            <div class="grid grid-cols-1 items-center justify-center w-full">
                                                @if($emp_psa_birth_certif)
                                                <label for="student_faculty_eval" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <p class="mb-2 sm:text-lg  text-center text-green-500 dark:text-gray-400"><span class="font-semibold">File Uploaded</span></p> 
                                                    <input id="student_faculty_eval" type="file" class="hidden" wire:model.blur="student_faculty_eval">
                                                </label>
                                                @else
                                                <label for="student_faculty_eval" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                        <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                        </svg>
                                                        <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                        <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 800x400px)</p>
                                                    </div>
                                                    <input id="student_faculty_eval" type="file" class="hidden" wire:model.blur="student_faculty_eval" />
                                                </label>
                                                @endif
                                                @error('emp_psa_birth_certif')
                                                    <div class="transition transform alert alert-danger"
                                                            x-init="$el.closest('label').scrollIntoView()">
                                                        <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                    </div> 
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- 8 --}}
                                        <div class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                            <label for="rated_ipcr"
                                            class="block text-sm font-medium text-gray-900 dark:text-white">10. Rated IPCR (last 2 rating periods)<span class="text-red-600">*</span></label>
                                            <div class="grid grid-cols-1 items-center justify-center w-full">
                                                @if($emp_psa_marriage_certif)
                                                    <label for="rated_ipcr" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                        <p class="mb-2 sm:text-lg  text-center text-green-500 dark:text-gray-400"><span class="font-semibold">File Uploaded</span></p> 
                                                        <input id="rated_ipcr" type="file" class="hidden" wire:model.blur="rated_ipcr">
                                                    </label>
                                                @else
                                                    <label for="rated_ipcr" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                            </svg>
                                                            <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                            <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 800x400px)</p>
                                                        </div>
                                                        <input id="rated_ipcr" type="file" class="hidden" wire:model.blur="rated_ipcr" />
                                                    </label>
                                                @endif
                                                @error('emp_psa_marriage_certif')
                                                    <div class="transition transform alert alert-danger"
                                                            x-init="$el.closest('label').scrollIntoView()">
                                                        <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                    </div> 
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                     {{-- 5th row --}}
                            <div class="grid grid-cols-1 min-[800px]:grid-cols-2 gap-4">
                                {{-- 7 --}}
                                    <div class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                        <label for="student_faculty_eval"
                                        class="block text-sm font-medium text-gray-900 dark:text-white">11. Student's Faculty Evaluation (For Faculty Members)</label>
                                        <div class="grid grid-cols-1 items-center justify-center w-full">
                                            @if($emp_service_record_from_other_govt_agency)
                                            <label for="student_faculty_eval" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                <p class="mb-2 sm:text-lg  text-center text-green-500 dark:text-gray-400"><span class="font-semibold">File Uploaded</span></p> 
                                                <input id="student_faculty_eval" type="file" class="hidden" wire:model.blur="student_faculty_eval">
                                            </label>
                                            @else
                                            <label for="student_faculty_eval" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                    </svg>
                                                    <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                    <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 800x400px)</p>
                                                </div>
                                                <input id="student_faculty_eval" type="file" class="hidden" wire:model.blur="student_faculty_eval" />
                                            </label>
                                            @endif
                                            @error('emp_service_record_from_other_govt_agency')
                                                <div class="transition transform alert alert-danger"
                                                        x-init="$el.closest('label').scrollIntoView()">
                                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- 8 --}}
                                    <div class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                        <label for="rated_ipcr"
                                        class="block text-sm font-medium text-gray-900 dark:text-white">12. Rated IPCR (last 2 rating periods)<span class="text-red-600">*</span></label>
                                        <div class="grid grid-cols-1 items-center justify-center w-full">
                                            @if($emp_approved_clearance_prev_employer)
                                                <label for="rated_ipcr" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <p class="mb-2 sm:text-lg  text-center text-green-500 dark:text-gray-400"><span class="font-semibold">File Uploaded</span></p> 
                                                    <input id="rated_ipcr" type="file" class="hidden" wire:model.blur="rated_ipcr">
                                                </label>
                                            @else
                                                <label for="rated_ipcr" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                        <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                        </svg>
                                                        <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                        <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 800x400px)</p>
                                                    </div>
                                                    <input id="rated_ipcr" type="file" class="hidden" wire:model.blur="rated_ipcr" />
                                                </label>
                                            @endif
                                            @error('emp_approved_clearance_prev_employer')
                                                <div class="transition transform alert alert-danger"
                                                        x-init="$el.closest('label').scrollIntoView()">
                                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="grid grid-cols-1 col-span-2  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                        <label for="rated_ipcr"
                                        class="block text-sm font-medium text-gray-900 dark:text-white">13. Other Documents <span class="text-red-600">*</span></label>
                                        <div class="grid grid-cols-1 items-center justify-center w-full">
                                            @if($other_documents)
                                                <label for="rated_ipcr" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <p class="mb-2 sm:text-lg  text-center text-green-500 dark:text-gray-400"><span class="font-semibold">File Uploaded</span></p> 
                                                    <input id="rated_ipcr" type="file" class="hidden" wire:model.blur="rated_ipcr">
                                                </label>
                                            @else
                                                <label for="rated_ipcr" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                        <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                        </svg>
                                                        <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                        <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 800x400px)</p>
                                                    </div>
                                                    <input id="rated_ipcr" type="file" class="hidden" wire:model.blur="rated_ipcr" />
                                                </label>
                                            @endif
                                            @error('other_documents')
                                                <div class="transition transform alert alert-danger"
                                                        x-init="$el.closest('label').scrollIntoView()">
                                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                    </div> --}}
                                </div>
                </div>
            </div>

                
              
            <button type="submit"  class="inline-flex items-center float-right px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Submit Change Information
            </button>
            </form>
            {{-- <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
            <script>
                new MultiSelectTag('subjectLoad.' . '0' . '.days')  // id
            </script> --}}
            
        </div>
    </section>
    
    </div>
</div>