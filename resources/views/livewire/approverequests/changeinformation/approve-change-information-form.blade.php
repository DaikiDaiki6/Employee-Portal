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
                                <div class="w-full" id="phone_container">
                                    <label for="phonenumber"
                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        Phone Number <span class="text-red-600">*</span></label>
                                    <input type="text" name="phonenumber" id="phonenumber" wire:model="phone"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                         required="" >
                                    @error('phone')
                                        <div class="transition transform alert alert-danger text-sm"
                                            x-data x-init="document.getElementById('phone_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('phone_container').focus();">
                                            <span class="text-red-500 text-xs "> {{$message}}</span>
                                        </div> 
                                    @enderror
                                </div>
                               
                                <div class="w-full" id="gender_container">
                                    <label for="sex"
                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        Sex (Male, Female, M, and F Only)<span class="text-red-600">*</span></label>
                                    <input type="text" name="sex" id="sex" wire:model="gender"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                         required="" >
                                    @error('gender')
                                        <div class="transition transform alert alert-danger text-sm"
                                            x-data x-init="document.getElementById('gender_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('gender_container').focus();">
                                            <span class="text-red-500 text-xs "> {{$message}}</span>
                                        </div> 
                                    @enderror
                                </div>

                                <div class="w-full" id="email_container">
                                    <label for="firstname"
                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        Personal Email <span class="text-red-600">*</span></label>
                                    <input type="text" name="personalemail" id="personalemail"  wire:model="personal_email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                         required="" >
                                    @error('personal_email')
                                         <div class="transition transform alert alert-danger text-sm"
                                             x-data x-init="document.getElementById('email_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('email_container').focus();">
                                             <span class="text-red-500 text-xs "> {{$message}}</span>
                                         </div> 
                                     @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <div class="w-full" id="age_container">
                                    <label for="agenum"
                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        Age <span class="text-red-600">*</span></label>
                                    <input type="number" name="agenum" id="agenum" wire:model="age"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                         required="" >
                                    @error('age')
                                         <div class="transition transform alert alert-danger text-sm"
                                             x-data x-init="document.getElementById('age_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('age_container').focus();">
                                             <span class="text-red-500 text-xs "> {{$message}}</span>
                                         </div> 
                                     @enderror
                                </div>
                                <div class="w-full" id="birth_date_container">
                                    <label for="birthdate"
                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        Birth Date <span class="text-red-600">*</span></label>
                                    <input type="date" name="birthdate" id="birthdate" wire:model="birth_date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                         required="" >
                                    @error('birth_date')
                                         <div class="transition transform alert alert-danger text-sm"
                                             x-data x-init="document.getElementById('birth_date_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('birth_date_container').focus();">
                                             <span class="text-red-500 text-xs "> {{$message}}</span>
                                         </div> 
                                     @enderror
                                </div>
                                
                                <div class="w-full" id="address_container">
                                    <label for="address"
                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        Address <span class="text-red-600">*</span></label>
                                    <input type="text" name="address" id="address"  wire:model="address"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                         required="" >
                                    @error('address')
                                         <div class="transition transform alert alert-danger text-sm"
                                             x-data x-init="document.getElementById('address_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('address_container').focus();">
                                             <span class="text-red-500 text-xs "> {{$message}}</span>
                                         </div> 
                                     @enderror
                                </div>
                            </div>
                        </div>
                </div>


                <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-2 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                    <h2><b>Employee History</b></h2>
                    <div class="grid grid-cols-1  gap-4 col-span-3 pb-4" id="employeehistory_container">
                        @foreach ($employeeHistory as $index => $history)
                            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <div class="col-span-5">
                                    <ul class="text-sm font-medium text-right text-gray-800 border border-gray-300 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                                        <li class="float-left mt-4 ml-5 font-bold">
                                            <span>No. {{$index + 1 }}</span>
                                        </li>
                                        <li class="">
                                            <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true"
                                            {{-- type="button" name="add" wire:click.prevent="removePreTestQuestion({{$index}})" wire:confirm="Are you sure you want to delete this function?" --}}
                                            class="inline-block p-4 text-red-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-red-500">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round"  stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="border border-gray=200 border-solid p-6 ">
                                        <div class="mt-5" id="employeeHistory_{{$index}}_name_of_company_container">
                                            <label for="employeeHistory_{{$index}}_name_of_company" class="block mb-2 text-sm whitespace-nowrap font-medium text-gray-900 dark:text-white">Company Name <span class="text-red-600">*</span></label>
                                            <input type="text" rows="4" id="employeeHistory_{{$index}}_name_of_company" name="employeeHistory_{{$index}}_name_of_company" wire:model.blur="employeeHistory.{{$index}}.name_of_company" placeholder="Company Name" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
                                            @error('employeeHistory.' . $index . '.name_of_company')   
                                                <div class="transition transform alert alert-danger text-sm"
                                                        x-data x-init="document.getElementById('employeeHistory_{{$index}}_name_of_company').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('employeeHistory_{{$index}}_name_of_company').focus();">
                                                    <span class="text-red-500 text-xs "> {{$message}}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                        <div class="mt-5 ">
                                            <label for="employeeHistory_{{$index}}_position" class="block mb-2 text-sm whitespace-nowrap font-medium text-gray-900 dark:text-white">
                                                Position <span class="text-red-600">*</span></label>
                                            <input type="text" rows="4" id="employeeHistory_{{$index}}_position" name="employeeHistory_{{$index}}_position" wire:model.blur="employeeHistory.{{$index}}.prev_position" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
                                            @error('employeeHistory.' . $index . '.prev_position')   
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
                                            <input type="date" rows="4" id="employeeHistory_{{$index}}_start_date" name="employeeHistory_{{$index}}_start_date" wire:model.blur="employeeHistory.{{$index}}.start_date" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
                                            @error('employeeHistory.' . $index . '.start_date')   
                                                <div class="transition transform alert alert-danger text-sm"
                                                        x-data x-init="document.getElementById('employeeHistory_{{$index}}_end_date').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('employeeHistory_{{$index}}_start_date').focus();">
                                                    <span class="text-red-500 text-xs "> {{$message}}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                        <div class="mt-5" id="employeeHistory_{{$index}}_end_date_container">
                                            <label for="employeeHistory_{{$index}}_end_date" class="block mb-2 text-sm whitespace-nowrap font-medium text-gray-900 dark:text-white">
                                                End Date <span class="text-red-600">*</span></label>
                                            <input type="date" rows="4" id="employeeHistory_{{$index}}_end_date" name="employeeHistory_{{$index}}_end_date" wire:model.blur="employeeHistory.{{$index}}.end_date" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
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
                        @error('employeeHistory')   
                            <div class="transition transform alert alert-danger text-sm"
                                    x-data x-init="document.getElementById('employeeHistory_{{$index}}_end_date_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('employeeHistory_{{$index}}_end_date_container').focus();">
                                <span class="text-red-500 text-xs "> {{$message}}</span>
                            </div> 
                        @enderror
                    </div>
                </div>


                <div class="grid grid-cols-1 col-span-3 p-6 gap-4 mt-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                    <h2><b>Submit Documents</b></h2>
                    <div class="grid grid-cols-1 gap-4">
                        {{-- 1st Row --}}
                        <div class="grid grid-cols-1 items-start gap-4">
                            {{-- 1 --}}
                            <div class="grid grid-cols-1 items-center justify-center w-full bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 p-4" id="emp_image_container">
                                <label for="emp_image"
                                    class="block text-sm font-medium text-gray-900 dark:text-white mb-4">Employee Photo<span class="text-red-600">*</span></label>
                                <label for="emp_image" class="relative p-1 flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                @if($emp_image)
                                        @if(is_string($emp_image) == True)
                                            @php
                                                $emp_image = $this->getImage('emp_image');
                                            @endphp
                                            <img src="data:image/gif;base64,{{ base64_encode($emp_image) }}" alt="Image Description" class="w-full h-full object-contain"> 
                                        @else
                                            <img src="{{ $emp_image->temporaryUrl() }}" class="w-full h-full object-contain" alt="Uploaded Image">
                                        @endif
                                        <input id="emp_image" type="file" class="hidden" wire:model.live="emp_image">

                                        <button type="button" wire:click="removeImage('emp_image')" class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                @else
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                            <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG, or PDF file (Max: 5 MB size)</p>
                                        </div>
                                        <input id="emp_image" type="file" class="hidden" wire:model.blur="emp_image" />
                                @endif
                                </label>
                                @error('emp_image')
                                    <div class="transition transform alert alert-danger text-sm mb-1"
                                            x-data x-init="document.getElementById('emp_image_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_image_container').focus();">
                                        <span class="text-red-500 text-xs "> {{$message}}</span>
                                    </div> 
                                @enderror
                            </div>
                        </div>

                        {{-- 2nd Row --}}
                        <div class="grid grid-cols-1 items-start min-[800px]:grid-cols-2 gap-4">
                            {{-- 1 --}}
                            <div id="emp_diploma_container"
                                class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <label for="emp_diploma"
                                    class="block text-sm font-medium text-gray-900 dark:text-white">1. Diploma<span class="text-red-600">*</span></label>
                                <div class="grid grid-cols-1   w-full">
                                    @if ($emp_diploma)
                                        @foreach ($emp_diploma as $index => $item)
                                        @php
                                            $insideIndex = 0;
                                        @endphp
                                        @if(is_string($item) == true)
                                            <div>
                                                <label for="emp_diploma_{{ $index }}"
                                                    class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    @php
                                                        $image = $this->getArrayImage('emp_diploma', $index);
                                                    @endphp
                                                    <button type="button"
                                                        wire:click="removeArrayImage({{ $index }}, 'emp_diploma')"
                                                        class="absolute top-0 right-0 m-2 text-red-600 py-1 rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    <img src="data:image/gif;base64,{{ base64_encode($image) }}"
                                                        alt="Image Description"
                                                        class="w-full h-full object-contain p-1">
                                                    <input id="emp_diploma_{{ $index }}" type="file" class="hidden"
                                                        wire:model="emp_diploma.{{ $index }}" multiple>
                                                </label>
                                            </div>
                                        @else
                                            @foreach ($item as $insideIndex => $file)
                                                @if (is_array($file))
                                                    <label for="emp_diploma_{{ $index }}.{{$insideIndex}}"
                                                    class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                            <img src="{{ $file[$insideIndex]->temporaryUrl() }}"
                                                                class="w-full h-full object-contain p-1 "
                                                                alt="Uploaded Image">
                                                            <button type="button"
                                                                wire:click="removeArrayImage({{ $index }}, 'emp_diploma', {{$insideIndex}})"
                                                                class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke-width="1.5" stroke="currentColor"
                                                                    class="w-6 h-6">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                </svg>
                                                            </button>
                                                            <input id="emp_diploma_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                                wire:model="emp_diploma.{{ $index }}.{{$insideIndex}}" multiple>
                                                    </label>
                                                @else
                                                    <label for="emp_diploma_{{ $index }}.{{$insideIndex}}"
                                                    class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                            <img src="{{ $file->temporaryUrl() }}"
                                                                class="w-full h-full object-contain p-1"
                                                                alt="Uploaded Image">
                                                            <button type="button"
                                                                wire:click="removeArrayImage({{ $index }}, 'emp_diploma', {{$insideIndex}})"
                                                                class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke-width="1.5" stroke="currentColor"
                                                                    class="w-6 h-6">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                </svg>
                                                            </button>
                                                            <input id="emp_diploma_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                                wire:model="emp_diploma.{{ $index }}.{{$insideIndex}}">
                                                    </label>
                                                @endif
                                                @error('emp_diploma.' . $index .  '.' .  $insideIndex)
                                                <div class="transition transform alert alert-danger text-sm mb-1"
                                                        x-data x-init="document.getElementById('emp_diploma_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_diploma_container').focus();">
                                                    <span class="text-red-500 text-xs "> {{$message}}</span>
                                                </div> 
                                            @enderror
                                            @endforeach
                                        @endif
                                            @php
                                                $indexRequestLetter = $index;
                                            @endphp
                                        @error('emp_diploma.' . $index - $insideIndex)
                                            <div class="transition transform alert alert-danger text-sm mb-1"
                                                    x-data x-init="document.getElementById('emp_diploma_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_diploma_container').focus();">
                                                <span class="text-red-500 text-xs "> {{$message}}</span>
                                            </div> 
                                        @enderror
                                        @endforeach
                                        <label for="emp_diploma_{{ $indexRequestLetter + 1 }}"
                                            class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                <div
                                                    class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                    </svg>
                                                    <p
                                                        class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                        <span class="font-semibold">Click to upload</span></p>
                                                    <p
                                                        class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                        PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                                </div>
                                        </label>
                                        <input id="emp_diploma_{{ $indexRequestLetter + 1 }}" type="file" class="hidden"
                                                        wire:model="emp_diploma.{{ $indexRequestLetter + 1 }}" multiple>
                                    @else
                                        <label for="emp_diploma"
                                        class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                <div
                                                    class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                    </svg>
                                                    <p
                                                        class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                        <span class="font-semibold">Click to upload</span></p>
                                                    <p
                                                        class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                        PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                                </div>
                                                <input id="emp_diploma" type="file" class="hidden"
                                                wire:model.blur="emp_diploma.0" multiple>
                                        </label>
                                    @endif
                                    @error('emp_diploma')
                                    <div class="transition transform alert alert-danger text-sm mb-1 mt-2" x-data
                                        x-init="document.getElementById('emp_diploma_container').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                        document.getElementById('emp_diploma_container').focus();">
                                        <span class="text-red-500 text-xs "> {{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- 2 --}}
                            <div id="emp_TOR_container"
                                class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <label for="emp_TOR"
                                    class="block text-sm font-medium text-gray-900 dark:text-white">2. Transcript of Records<span class="text-red-600">*</span></label>
                                <div class="grid grid-cols-1   w-full">
                                    @if ($emp_TOR)
                                        @foreach ($emp_TOR as $index => $item)
                                        @php
                                            $insideIndex = 0;
                                        @endphp
                                        @if(is_string($item) == true)
                                            <div>
                                                <label for="emp_TOR_{{ $index }}"
                                                    class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    @php
                                                        $image = $this->getArrayImage('emp_TOR', $index);
                                                    @endphp
                                                    <button type="button"
                                                        wire:click="removeArrayImage({{ $index }}, 'emp_TOR')"
                                                        class="absolute top-0 right-0 m-2 text-red-600 py-1 rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    <img src="data:image/gif;base64,{{ base64_encode($image) }}"
                                                        alt="Image Description"
                                                        class="w-full h-full object-contain p-1">
                                                    <input id="emp_TOR_{{ $index }}" type="file" class="hidden"
                                                        wire:model="emp_TOR.{{ $index }}" multiple>
                                                </label>
                                            </div>
                                        @else
                                            @foreach ($item as $insideIndex => $file)
                                                @if (is_array($file))
                                                    <label for="emp_TOR_{{ $index }}.{{$insideIndex}}"
                                                    class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                            <img src="{{ $file[$insideIndex]->temporaryUrl() }}"
                                                                class="w-full h-full object-contain p-1 "
                                                                alt="Uploaded Image">
                                                            <button type="button"
                                                                wire:click="removeArrayImage({{ $index }}, 'emp_TOR', {{$insideIndex}})"
                                                                class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke-width="1.5" stroke="currentColor"
                                                                    class="w-6 h-6">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                </svg>
                                                            </button>
                                                            <input id="emp_TOR_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                                wire:model="emp_TOR.{{ $index }}.{{$insideIndex}}" multiple>
                                                    </label>
                                                @else
                                                    <label for="emp_TOR_{{ $index }}.{{$insideIndex}}"
                                                    class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                            <img src="{{ $file->temporaryUrl() }}"
                                                                class="w-full h-full object-contain p-1"
                                                                alt="Uploaded Image">
                                                            <button type="button"
                                                                wire:click="removeArrayImage({{ $index }}, 'emp_TOR', {{$insideIndex}})"
                                                                class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke-width="1.5" stroke="currentColor"
                                                                    class="w-6 h-6">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                </svg>
                                                            </button>
                                                            <input id="emp_TOR_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                                wire:model="emp_TOR.{{ $index }}.{{$insideIndex}}">
                                                    </label>
                                                @endif
                                                @error('emp_TOR.' . $index .  '.' .  $insideIndex)
                                                <div class="transition transform alert alert-danger text-sm mb-1"
                                                        x-data x-init="document.getElementById('emp_TOR_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_TOR_container').focus();">
                                                    <span class="text-red-500 text-xs "> {{$message}}</span>
                                                </div> 
                                            @enderror
                                            @endforeach
                                        @endif
                                            @php
                                                $indexRequestLetter = $index;
                                            @endphp
                                        @error('emp_TOR.' . $index - $insideIndex)
                                            <div class="transition transform alert alert-danger text-sm mb-1"
                                                    x-data x-init="document.getElementById('emp_TOR_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_TOR_container').focus();">
                                                <span class="text-red-500 text-xs "> {{$message}}</span>
                                            </div> 
                                        @enderror
                                        @endforeach
                                        <label for="emp_TOR_{{ $indexRequestLetter + 1 }}"
                                            class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                <div
                                                    class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                    </svg>
                                                    <p
                                                        class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                        <span class="font-semibold">Click to upload</span></p>
                                                    <p
                                                        class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                        PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                                </div>
                                        </label>
                                        <input id="emp_TOR_{{ $indexRequestLetter + 1 }}" type="file" class="hidden"
                                                        wire:model="emp_TOR.{{ $indexRequestLetter + 1 }}" multiple>
                                    @else
                                        <label for="emp_TOR"
                                        class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                <div
                                                    class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                    </svg>
                                                    <p
                                                        class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                        <span class="font-semibold">Click to upload</span></p>
                                                    <p
                                                        class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                        PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                                </div>
                                                <input id="emp_TOR" type="file" class="hidden"
                                                wire:model.blur="emp_TOR.0" multiple>
                                        </label>
                                    @endif
                                    @error('emp_TOR')
                                    <div class="transition transform alert alert-danger text-sm mb-1 mt-2" x-data
                                        x-init="document.getElementById('emp_TOR_container').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                        document.getElementById('emp_TOR_container').focus();">
                                        <span class="text-red-500 text-xs "> {{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>

                        {{-- 3rd Row --}}
                        <div class="grid grid-cols-1 items-start min-[800px]:grid-cols-2 gap-4">
                            {{-- 3 --}}
                            <div id="emp_cert_of_trainings_seminars_container"
                                class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <label for="emp_cert_of_trainings_seminars"
                                    class="block text-sm font-medium text-gray-900 dark:text-white">3. Certificate of Trainings and Seminars<span class="text-red-600">*</span></label>
                                <div class="grid grid-cols-1   w-full">
                                @if ($emp_cert_of_trainings_seminars)
                                    @foreach ($emp_cert_of_trainings_seminars as $index => $item)
                                    @php
                                        $insideIndex = 0;
                                    @endphp
                                    @if(is_string($item) == true)
                                        <div>
                                            <label for="emp_cert_of_trainings_seminars_{{ $index }}"
                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                @php
                                                    $image = $this->getArrayImage('emp_cert_of_trainings_seminars', $index);
                                                @endphp
                                                <button type="button"
                                                    wire:click="removeArrayImage({{ $index }}, 'emp_cert_of_trainings_seminars')"
                                                    class="absolute top-0 right-0 m-2 text-red-600 py-1 rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>
                                                <img src="data:image/gif;base64,{{ base64_encode($image) }}"
                                                    alt="Image Description"
                                                    class="w-full h-full object-contain p-1">
                                                <input id="emp_cert_of_trainings_seminars_{{ $index }}" type="file" class="hidden"
                                                    wire:model="emp_cert_of_trainings_seminars.{{ $index }}" multiple>
                                            </label>
                                        </div>
                                    @else
                                        @foreach ($item as $insideIndex => $file)
                                            @if (is_array($file))
                                                <label for="emp_cert_of_trainings_seminars_{{ $index }}.{{$insideIndex}}"
                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                        <img src="{{ $file[$insideIndex]->temporaryUrl() }}"
                                                            class="w-full h-full object-contain p-1 "
                                                            alt="Uploaded Image">
                                                        <button type="button"
                                                            wire:click="removeArrayImage({{ $index }}, 'emp_cert_of_trainings_seminars', {{$insideIndex}})"
                                                            class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24"
                                                                stroke-width="1.5" stroke="currentColor"
                                                                class="w-6 h-6">
                                                                <path stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                            </svg>
                                                        </button>
                                                        <input id="emp_cert_of_trainings_seminars_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                            wire:model="emp_cert_of_trainings_seminars.{{ $index }}.{{$insideIndex}}" multiple>
                                                </label>
                                            @else
                                                <label for="emp_cert_of_trainings_seminars_{{ $index }}.{{$insideIndex}}"
                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                        <img src="{{ $file->temporaryUrl() }}"
                                                            class="w-full h-full object-contain p-1"
                                                            alt="Uploaded Image">
                                                        <button type="button"
                                                            wire:click="removeArrayImage({{ $index }}, 'emp_cert_of_trainings_seminars', {{$insideIndex}})"
                                                            class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24"
                                                                stroke-width="1.5" stroke="currentColor"
                                                                class="w-6 h-6">
                                                                <path stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                            </svg>
                                                        </button>
                                                        <input id="emp_cert_of_trainings_seminars_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                            wire:model="emp_cert_of_trainings_seminars.{{ $index }}.{{$insideIndex}}">
                                                </label>
                                            @endif
                                            @error('emp_cert_of_trainings_seminars.' . $index .  '.' .  $insideIndex)
                                            <div class="transition transform alert alert-danger text-sm mb-1"
                                                    x-data x-init="document.getElementById('emp_cert_of_trainings_seminars_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_cert_of_trainings_seminars_container').focus();">
                                                <span class="text-red-500 text-xs "> {{$message}}</span>
                                            </div> 
                                        @enderror
                                        @endforeach
                                    @endif
                                        @php
                                            $indexRequestLetter = $index;
                                        @endphp
                                    @error('emp_cert_of_trainings_seminars.' . $index - $insideIndex)
                                        <div class="transition transform alert alert-danger text-sm mb-1"
                                                x-data x-init="document.getElementById('emp_cert_of_trainings_seminars_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_cert_of_trainings_seminars_container').focus();">
                                            <span class="text-red-500 text-xs "> {{$message}}</span>
                                        </div> 
                                    @enderror
                                    @endforeach
                                    <label for="emp_cert_of_trainings_seminars_{{ $indexRequestLetter + 1 }}"
                                        class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            <div
                                                class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                </svg>
                                                <p
                                                    class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                    <span class="font-semibold">Click to upload</span></p>
                                                <p
                                                    class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                    PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                            </div>
                                    </label>
                                    <input id="emp_cert_of_trainings_seminars_{{ $indexRequestLetter + 1 }}" type="file" class="hidden"
                                                    wire:model="emp_cert_of_trainings_seminars.{{ $indexRequestLetter + 1 }}" multiple>
                                @else
                                    <label for="emp_cert_of_trainings_seminars"
                                    class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            <div
                                                class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                </svg>
                                                <p
                                                    class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                    <span class="font-semibold">Click to upload</span></p>
                                                <p
                                                    class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                    PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                            </div>
                                            <input id="emp_cert_of_trainings_seminars" type="file" class="hidden"
                                            wire:model.blur="emp_cert_of_trainings_seminars.0" multiple>
                                    </label>
                                @endif
                                @error('emp_cert_of_trainings_seminars')
                                <div class="transition transform alert alert-danger text-sm mb-1 mt-2" x-data
                                    x-init="document.getElementById('emp_cert_of_trainings_seminars_container').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                    document.getElementById('emp_cert_of_trainings_seminars_container').focus();">
                                    <span class="text-red-500 text-xs "> {{ $message }}</span>
                                </div>
                                @enderror
                                </div>
                            </div>

                            {{-- 4 --}}
                            <div id="emp_auth_copy_of_csc_or_prc_container"
                                class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <label for="emp_auth_copy_of_csc_or_prc"
                                    class="block text-sm font-medium text-gray-900 dark:text-white">4. Authenticated Copy of CSC or PRC License<span class="text-red-600">*</span></label>
                                <div class="grid grid-cols-1   w-full">
                                @if ($emp_auth_copy_of_csc_or_prc)
                                    @foreach ($emp_auth_copy_of_csc_or_prc as $index => $item)
                                    @php
                                        $insideIndex = 0;
                                    @endphp
                                    @if(is_string($item) == true)
                                        <div>
                                            <label for="emp_auth_copy_of_csc_or_prc_{{ $index }}"
                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                @php
                                                    $image = $this->getArrayImage('emp_auth_copy_of_csc_or_prc', $index);
                                                @endphp
                                                <button type="button"
                                                    wire:click="removeArrayImage({{ $index }}, 'emp_auth_copy_of_csc_or_prc')"
                                                    class="absolute top-0 right-0 m-2 text-red-600 py-1 rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>
                                                <img src="data:image/gif;base64,{{ base64_encode($image) }}"
                                                    alt="Image Description"
                                                    class="w-full h-full object-contain p-1">
                                                <input id="emp_auth_copy_of_csc_or_prc_{{ $index }}" type="file" class="hidden"
                                                    wire:model="emp_auth_copy_of_csc_or_prc.{{ $index }}" multiple>
                                            </label>
                                        </div>
                                    @else
                                        @foreach ($item as $insideIndex => $file)
                                            @if (is_array($file))
                                                <label for="emp_auth_copy_of_csc_or_prc_{{ $index }}.{{$insideIndex}}"
                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                        <img src="{{ $file[$insideIndex]->temporaryUrl() }}"
                                                            class="w-full h-full object-contain p-1 "
                                                            alt="Uploaded Image">
                                                        <button type="button"
                                                            wire:click="removeArrayImage({{ $index }}, 'emp_auth_copy_of_csc_or_prc', {{$insideIndex}})"
                                                            class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24"
                                                                stroke-width="1.5" stroke="currentColor"
                                                                class="w-6 h-6">
                                                                <path stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                            </svg>
                                                        </button>
                                                        <input id="emp_auth_copy_of_csc_or_prc_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                            wire:model="emp_auth_copy_of_csc_or_prc.{{ $index }}.{{$insideIndex}}" multiple>
                                                </label>
                                            @else
                                                <label for="emp_auth_copy_of_csc_or_prc_{{ $index }}.{{$insideIndex}}"
                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                        <img src="{{ $file->temporaryUrl() }}"
                                                            class="w-full h-full object-contain p-1"
                                                            alt="Uploaded Image">
                                                        <button type="button"
                                                            wire:click="removeArrayImage({{ $index }}, 'emp_auth_copy_of_csc_or_prc', {{$insideIndex}})"
                                                            class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24"
                                                                stroke-width="1.5" stroke="currentColor"
                                                                class="w-6 h-6">
                                                                <path stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                            </svg>
                                                        </button>
                                                        <input id="emp_auth_copy_of_csc_or_prc_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                            wire:model="emp_auth_copy_of_csc_or_prc.{{ $index }}.{{$insideIndex}}">
                                                </label>
                                            @endif
                                            @error('emp_auth_copy_of_csc_or_prc.' . $index .  '.' .  $insideIndex)
                                            <div class="transition transform alert alert-danger text-sm mb-1"
                                                    x-data x-init="document.getElementById('emp_auth_copy_of_csc_or_prc_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_auth_copy_of_csc_or_prc_container').focus();">
                                                <span class="text-red-500 text-xs "> {{$message}}</span>
                                            </div> 
                                        @enderror
                                        @endforeach
                                    @endif
                                        @php
                                            $indexRequestLetter = $index;
                                        @endphp
                                    @error('emp_auth_copy_of_csc_or_prc.' . $index - $insideIndex)
                                        <div class="transition transform alert alert-danger text-sm mb-1"
                                                x-data x-init="document.getElementById('emp_auth_copy_of_csc_or_prc_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_auth_copy_of_csc_or_prc_container').focus();">
                                            <span class="text-red-500 text-xs "> {{$message}}</span>
                                        </div> 
                                    @enderror
                                    @endforeach
                                    <label for="emp_auth_copy_of_csc_or_prc_{{ $indexRequestLetter + 1 }}"
                                        class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            <div
                                                class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                </svg>
                                                <p
                                                    class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                    <span class="font-semibold">Click to upload</span></p>
                                                <p
                                                    class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                    PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                            </div>
                                    </label>
                                    <input id="emp_auth_copy_of_csc_or_prc_{{ $indexRequestLetter + 1 }}" type="file" class="hidden"
                                                    wire:model="emp_auth_copy_of_csc_or_prc.{{ $indexRequestLetter + 1 }}" multiple>
                                @else
                                    <label for="emp_auth_copy_of_csc_or_prc"
                                    class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            <div
                                                class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                </svg>
                                                <p
                                                    class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                    <span class="font-semibold">Click to upload</span></p>
                                                <p
                                                    class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                    PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                            </div>
                                            <input id="emp_auth_copy_of_csc_or_prc" type="file" class="hidden"
                                            wire:model.blur="emp_auth_copy_of_csc_or_prc.0" multiple>
                                    </label>
                                @endif
                                @error('emp_auth_copy_of_csc_or_prc')
                                <div class="transition transform alert alert-danger text-sm mb-1 mt-2" x-data
                                    x-init="document.getElementById('emp_auth_copy_of_csc_or_prc_container').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                    document.getElementById('emp_auth_copy_of_csc_or_prc_container').focus();">
                                    <span class="text-red-500 text-xs "> {{ $message }}</span>
                                </div>
                                @enderror
                                </div>
                            </div>
                        </div>

                    {{-- 4th Row --}}
                    <div class="grid grid-cols-1 items-start min-[800px]:grid-cols-2 gap-4">
                        {{-- 5 --}}
                        <div id="emp_auth_copy_of_prc_board_rating_container"
                            class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                            <label for="emp_auth_copy_of_prc_board_rating"
                                class="block text-sm font-medium text-gray-900 dark:text-white">5. Authenticated Copy of PRC Board Rating<span class="text-red-600">*</span></label>
                            <div class="grid grid-cols-1   w-full">
                            @if ($emp_auth_copy_of_prc_board_rating)
                                @foreach ($emp_auth_copy_of_prc_board_rating as $index => $item)
                                @php
                                    $insideIndex = 0;
                                @endphp
                                @if(is_string($item) == true)
                                    <div>
                                        <label for="emp_auth_copy_of_prc_board_rating_{{ $index }}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            @php
                                                $image = $this->getArrayImage('emp_auth_copy_of_prc_board_rating', $index);
                                            @endphp
                                            <button type="button"
                                                wire:click="removeArrayImage({{ $index }}, 'emp_auth_copy_of_prc_board_rating')"
                                                class="absolute top-0 right-0 m-2 text-red-600 py-1 rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                            <img src="data:image/gif;base64,{{ base64_encode($image) }}"
                                                alt="Image Description"
                                                class="w-full h-full object-contain p-1">
                                            <input id="emp_auth_copy_of_prc_board_rating_{{ $index }}" type="file" class="hidden"
                                                wire:model="emp_auth_copy_of_prc_board_rating.{{ $index }}" multiple>
                                        </label>
                                    </div>
                                @else
                                    @foreach ($item as $insideIndex => $file)
                                        @if (is_array($file))
                                            <label for="emp_auth_copy_of_prc_board_rating_{{ $index }}.{{$insideIndex}}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <img src="{{ $file[$insideIndex]->temporaryUrl() }}"
                                                        class="w-full h-full object-contain p-1 "
                                                        alt="Uploaded Image">
                                                    <button type="button"
                                                        wire:click="removeArrayImage({{ $index }}, 'emp_auth_copy_of_prc_board_rating', {{$insideIndex}})"
                                                        class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    <input id="emp_auth_copy_of_prc_board_rating_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                        wire:model="emp_auth_copy_of_prc_board_rating.{{ $index }}.{{$insideIndex}}" multiple>
                                            </label>
                                        @else
                                            <label for="emp_auth_copy_of_prc_board_rating_{{ $index }}.{{$insideIndex}}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <img src="{{ $file->temporaryUrl() }}"
                                                        class="w-full h-full object-contain p-1"
                                                        alt="Uploaded Image">
                                                    <button type="button"
                                                        wire:click="removeArrayImage({{ $index }}, 'emp_auth_copy_of_prc_board_rating', {{$insideIndex}})"
                                                        class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    <input id="emp_auth_copy_of_prc_board_rating_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                        wire:model="emp_auth_copy_of_prc_board_rating.{{ $index }}.{{$insideIndex}}">
                                            </label>
                                        @endif
                                        @error('emp_auth_copy_of_prc_board_rating.' . $index .  '.' .  $insideIndex)
                                        <div class="transition transform alert alert-danger text-sm mb-1"
                                                x-data x-init="document.getElementById('emp_auth_copy_of_prc_board_rating_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_auth_copy_of_prc_board_rating_container').focus();">
                                            <span class="text-red-500 text-xs "> {{$message}}</span>
                                        </div> 
                                    @enderror
                                    @endforeach
                                @endif
                                    @php
                                        $indexRequestLetter = $index;
                                    @endphp
                                @error('emp_auth_copy_of_prc_board_rating.' . $index - $insideIndex)
                                    <div class="transition transform alert alert-danger text-sm mb-1"
                                            x-data x-init="document.getElementById('emp_auth_copy_of_prc_board_rating_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_auth_copy_of_prc_board_rating_container').focus();">
                                        <span class="text-red-500 text-xs "> {{$message}}</span>
                                    </div> 
                                @enderror
                                @endforeach
                                <label for="emp_auth_copy_of_prc_board_rating_{{ $indexRequestLetter + 1 }}"
                                    class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div
                                            class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p
                                                class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold">Click to upload</span></p>
                                            <p
                                                class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                        </div>
                                </label>
                                <input id="emp_auth_copy_of_prc_board_rating_{{ $indexRequestLetter + 1 }}" type="file" class="hidden"
                                                wire:model="emp_auth_copy_of_prc_board_rating.{{ $indexRequestLetter + 1 }}" multiple>
                            @else
                                <label for="emp_auth_copy_of_prc_board_rating"
                                class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div
                                            class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p
                                                class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold">Click to upload</span></p>
                                            <p
                                                class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                        </div>
                                        <input id="emp_auth_copy_of_prc_board_rating" type="file" class="hidden"
                                        wire:model.blur="emp_auth_copy_of_prc_board_rating.0" multiple>
                                </label>
                            @endif
                            @error('emp_auth_copy_of_prc_board_rating')
                            <div class="transition transform alert alert-danger text-sm mb-1 mt-2" x-data
                                x-init="document.getElementById('emp_auth_copy_of_prc_board_rating_container').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                document.getElementById('emp_auth_copy_of_prc_board_rating_container').focus();">
                                <span class="text-red-500 text-xs "> {{ $message }}</span>
                            </div>
                            @enderror
                            </div>
                        </div>

                        {{-- 6 --}}
                        <div id="emp_med_certif_container"
                            class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                            <label for="emp_med_certif"
                                class="block text-sm font-medium text-gray-900 dark:text-white">6. Medical Certificate<span class="text-red-600">*</span></label>
                            <div class="grid grid-cols-1   w-full">
                            @if ($emp_med_certif)
                                @foreach ($emp_med_certif as $index => $item)
                                @php
                                    $insideIndex = 0;
                                @endphp
                                @if(is_string($item) == true)
                                    <div>
                                        <label for="emp_med_certif_{{ $index }}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            @php
                                                $image = $this->getArrayImage('emp_med_certif', $index);
                                            @endphp
                                            <button type="button"
                                                wire:click="removeArrayImage({{ $index }}, 'emp_med_certif')"
                                                class="absolute top-0 right-0 m-2 text-red-600 py-1 rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                            <img src="data:image/gif;base64,{{ base64_encode($image) }}"
                                                alt="Image Description"
                                                class="w-full h-full object-contain p-1">
                                            <input id="emp_med_certif_{{ $index }}" type="file" class="hidden"
                                                wire:model="emp_med_certif.{{ $index }}" multiple>
                                        </label>
                                    </div>
                                @else
                                    @foreach ($item as $insideIndex => $file)
                                        @if (is_array($file))
                                            <label for="emp_med_certif_{{ $index }}.{{$insideIndex}}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <img src="{{ $file[$insideIndex]->temporaryUrl() }}"
                                                        class="w-full h-full object-contain p-1 "
                                                        alt="Uploaded Image">
                                                    <button type="button"
                                                        wire:click="removeArrayImage({{ $index }}, 'emp_med_certif', {{$insideIndex}})"
                                                        class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    <input id="emp_med_certif_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                        wire:model="emp_med_certif.{{ $index }}.{{$insideIndex}}" multiple>
                                            </label>
                                        @else
                                            <label for="emp_med_certif_{{ $index }}.{{$insideIndex}}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <img src="{{ $file->temporaryUrl() }}"
                                                        class="w-full h-full object-contain p-1"
                                                        alt="Uploaded Image">
                                                    <button type="button"
                                                        wire:click="removeArrayImage({{ $index }}, 'emp_med_certif', {{$insideIndex}})"
                                                        class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    <input id="emp_med_certif_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                        wire:model="emp_med_certif.{{ $index }}.{{$insideIndex}}">
                                            </label>
                                        @endif
                                        @error('emp_med_certif.' . $index .  '.' .  $insideIndex)
                                        <div class="transition transform alert alert-danger text-sm mb-1"
                                                x-data x-init="document.getElementById('emp_med_certif_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_med_certif_container').focus();">
                                            <span class="text-red-500 text-xs "> {{$message}}</span>
                                        </div> 
                                    @enderror
                                    @endforeach
                                @endif
                                    @php
                                        $indexRequestLetter = $index;
                                    @endphp
                                @error('emp_med_certif.' . $index - $insideIndex)
                                    <div class="transition transform alert alert-danger text-sm mb-1"
                                            x-data x-init="document.getElementById('emp_med_certif_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_med_certif_container').focus();">
                                        <span class="text-red-500 text-xs "> {{$message}}</span>
                                    </div> 
                                @enderror
                                @endforeach
                                <label for="emp_med_certif_{{ $indexRequestLetter + 1 }}"
                                    class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div
                                            class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p
                                                class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold">Click to upload</span></p>
                                            <p
                                                class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                        </div>
                                </label>
                                <input id="emp_med_certif_{{ $indexRequestLetter + 1 }}" type="file" class="hidden"
                                                wire:model="emp_med_certif.{{ $indexRequestLetter + 1 }}" multiple>
                            @else
                                <label for="emp_med_certif"
                                class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div
                                            class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p
                                                class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold">Click to upload</span></p>
                                            <p
                                                class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                        </div>
                                        <input id="emp_med_certif" type="file" class="hidden"
                                        wire:model.blur="emp_med_certif.0" multiple>
                                </label>
                            @endif
                            @error('emp_med_certif')
                            <div class="transition transform alert alert-danger text-sm mb-1 mt-2" x-data
                                x-init="document.getElementById('emp_med_certif_container').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                document.getElementById('emp_med_certif_container').focus();">
                                <span class="text-red-500 text-xs "> {{ $message }}</span>
                            </div>
                            @enderror
                            </div>
                        </div>
                        
                    </div>

                    {{-- 5th Row --}}
                    <div class="grid grid-cols-1 items-start min-[800px]:grid-cols-2 gap-4">
                        {{-- 7 --}}
                        <div id="emp_nbi_clearance_container"
                            class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                            <label for="emp_nbi_clearance"
                                class="block text-sm font-medium text-gray-900 dark:text-white">7. NBI Clearance<span class="text-red-600">*</span></label>
                            <div class="grid grid-cols-1   w-full">
                            @if ($emp_nbi_clearance)
                                @foreach ($emp_nbi_clearance as $index => $item)
                                @php
                                    $insideIndex = 0;
                                @endphp
                                @if(is_string($item) == true)
                                    <div>
                                        <label for="emp_nbi_clearance_{{ $index }}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            @php
                                                $image = $this->getArrayImage('emp_nbi_clearance', $index);
                                            @endphp
                                            <button type="button"
                                                wire:click="removeArrayImage({{ $index }}, 'emp_nbi_clearance')"
                                                class="absolute top-0 right-0 m-2 text-red-600 py-1 rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                            <img src="data:image/gif;base64,{{ base64_encode($image) }}"
                                                alt="Image Description"
                                                class="w-full h-full object-contain p-1">
                                            <input id="emp_nbi_clearance_{{ $index }}" type="file" class="hidden"
                                                wire:model="emp_nbi_clearance.{{ $index }}" multiple>
                                        </label>
                                    </div>
                                @else
                                    @foreach ($item as $insideIndex => $file)
                                        @if (is_array($file))
                                            <label for="emp_nbi_clearance_{{ $index }}.{{$insideIndex}}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <img src="{{ $file[$insideIndex]->temporaryUrl() }}"
                                                        class="w-full h-full object-contain p-1 "
                                                        alt="Uploaded Image">
                                                    <button type="button"
                                                        wire:click="removeArrayImage({{ $index }}, 'emp_nbi_clearance', {{$insideIndex}})"
                                                        class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    <input id="emp_nbi_clearance_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                        wire:model="emp_nbi_clearance.{{ $index }}.{{$insideIndex}}" multiple>
                                            </label>
                                        @else
                                            <label for="emp_nbi_clearance_{{ $index }}.{{$insideIndex}}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <img src="{{ $file->temporaryUrl() }}"
                                                        class="w-full h-full object-contain p-1"
                                                        alt="Uploaded Image">
                                                    <button type="button"
                                                        wire:click="removeArrayImage({{ $index }}, 'emp_nbi_clearance', {{$insideIndex}})"
                                                        class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    <input id="emp_nbi_clearance_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                        wire:model="emp_nbi_clearance.{{ $index }}.{{$insideIndex}}">
                                            </label>
                                        @endif
                                        @error('emp_nbi_clearance.' . $index .  '.' .  $insideIndex)
                                        <div class="transition transform alert alert-danger text-sm mb-1"
                                                x-data x-init="document.getElementById('emp_nbi_clearance_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_nbi_clearance_container').focus();">
                                            <span class="text-red-500 text-xs "> {{$message}}</span>
                                        </div> 
                                    @enderror
                                    @endforeach
                                @endif
                                    @php
                                        $indexRequestLetter = $index;
                                    @endphp
                                @error('emp_nbi_clearance.' . $index - $insideIndex)
                                    <div class="transition transform alert alert-danger text-sm mb-1"
                                            x-data x-init="document.getElementById('emp_nbi_clearance_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_nbi_clearance_container').focus();">
                                        <span class="text-red-500 text-xs "> {{$message}}</span>
                                    </div> 
                                @enderror
                                @endforeach
                                <label for="emp_nbi_clearance_{{ $indexRequestLetter + 1 }}"
                                    class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div
                                            class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p
                                                class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold">Click to upload</span></p>
                                            <p
                                                class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                        </div>
                                </label>
                                <input id="emp_nbi_clearance_{{ $indexRequestLetter + 1 }}" type="file" class="hidden"
                                                wire:model="emp_nbi_clearance.{{ $indexRequestLetter + 1 }}" multiple>
                            @else
                                <label for="emp_nbi_clearance"
                                class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div
                                            class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p
                                                class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold">Click to upload</span></p>
                                            <p
                                                class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                        </div>
                                        <input id="emp_nbi_clearance" type="file" class="hidden"
                                        wire:model.blur="emp_nbi_clearance.0" multiple>
                                </label>
                            @endif
                            @error('emp_nbi_clearance')
                            <div class="transition transform alert alert-danger text-sm mb-1 mt-2" x-data
                                x-init="document.getElementById('emp_nbi_clearance_container').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                document.getElementById('emp_nbi_clearance_container').focus();">
                                <span class="text-red-500 text-xs "> {{ $message }}</span>
                            </div>
                            @enderror
                            </div>
                        </div>

                        {{--  8 --}}
                        <div id="emp_psa_birth_certif_container"
                            class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                            <label for="emp_psa_birth_certif"
                                class="block text-sm font-medium text-gray-900 dark:text-white">8. PSA Birth Certificate<span class="text-red-600">*</span></label>
                            <div class="grid grid-cols-1   w-full">
                            @if ($emp_psa_birth_certif)
                                @foreach ($emp_psa_birth_certif as $index => $item)
                                @php
                                    $insideIndex = 0;
                                @endphp
                                @if(is_string($item) == true)
                                    <div>
                                        <label for="emp_psa_birth_certif_{{ $index }}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            @php
                                                $image = $this->getArrayImage('emp_psa_birth_certif', $index);
                                            @endphp
                                            <button type="button"
                                                wire:click="removeArrayImage({{ $index }}, 'emp_psa_birth_certif')"
                                                class="absolute top-0 right-0 m-2 text-red-600 py-1 rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                            <img src="data:image/gif;base64,{{ base64_encode($image) }}"
                                                alt="Image Description"
                                                class="w-full h-full object-contain p-1">
                                            <input id="emp_psa_birth_certif_{{ $index }}" type="file" class="hidden"
                                                wire:model="emp_psa_birth_certif.{{ $index }}" multiple>
                                        </label>
                                    </div>
                                @else
                                    @foreach ($item as $insideIndex => $file)
                                        @if (is_array($file))
                                            <label for="emp_psa_birth_certif_{{ $index }}.{{$insideIndex}}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <img src="{{ $file[$insideIndex]->temporaryUrl() }}"
                                                        class="w-full h-full object-contain p-1 "
                                                        alt="Uploaded Image">
                                                    <button type="button"
                                                        wire:click="removeArrayImage({{ $index }}, 'emp_psa_birth_certif', {{$insideIndex}})"
                                                        class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    <input id="emp_psa_birth_certif_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                        wire:model="emp_psa_birth_certif.{{ $index }}.{{$insideIndex}}" multiple>
                                            </label>
                                        @else
                                            <label for="emp_psa_birth_certif_{{ $index }}.{{$insideIndex}}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <img src="{{ $file->temporaryUrl() }}"
                                                        class="w-full h-full object-contain p-1"
                                                        alt="Uploaded Image">
                                                    <button type="button"
                                                        wire:click="removeArrayImage({{ $index }}, 'emp_psa_birth_certif', {{$insideIndex}})"
                                                        class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    <input id="emp_psa_birth_certif_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                        wire:model="emp_psa_birth_certif.{{ $index }}.{{$insideIndex}}">
                                            </label>
                                        @endif
                                        @error('emp_psa_birth_certif.' . $index .  '.' .  $insideIndex)
                                        <div class="transition transform alert alert-danger text-sm mb-1"
                                                x-data x-init="document.getElementById('emp_psa_birth_certif_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_psa_birth_certif_container').focus();">
                                            <span class="text-red-500 text-xs "> {{$message}}</span>
                                        </div> 
                                    @enderror
                                    @endforeach
                                @endif
                                    @php
                                        $indexRequestLetter = $index;
                                    @endphp
                                @error('emp_psa_birth_certif.' . $index - $insideIndex)
                                    <div class="transition transform alert alert-danger text-sm mb-1"
                                            x-data x-init="document.getElementById('emp_psa_birth_certif_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_psa_birth_certif_container').focus();">
                                        <span class="text-red-500 text-xs "> {{$message}}</span>
                                    </div> 
                                @enderror
                                @endforeach
                                <label for="emp_psa_birth_certif_{{ $indexRequestLetter + 1 }}"
                                    class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div
                                            class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p
                                                class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold">Click to upload</span></p>
                                            <p
                                                class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                        </div>
                                </label>
                                <input id="emp_psa_birth_certif_{{ $indexRequestLetter + 1 }}" type="file" class="hidden"
                                                wire:model="emp_psa_birth_certif.{{ $indexRequestLetter + 1 }}" multiple>
                            @else
                                <label for="emp_psa_birth_certif"
                                class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div
                                            class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p
                                                class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold">Click to upload</span></p>
                                            <p
                                                class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                        </div>
                                        <input id="emp_psa_birth_certif" type="file" class="hidden"
                                        wire:model.blur="emp_psa_birth_certif.0" multiple>
                                </label>
                            @endif
                            @error('emp_psa_birth_certif')
                            <div class="transition transform alert alert-danger text-sm mb-1 mt-2" x-data
                                x-init="document.getElementById('emp_psa_birth_certif_container').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                document.getElementById('emp_psa_birth_certif_container').focus();">
                                <span class="text-red-500 text-xs "> {{ $message }}</span>
                            </div>
                            @enderror
                            </div>
                        </div>
                    </div>

                    {{-- 6th Row --}}
                    <div class="grid grid-cols-1 items-start min-[800px]:grid-cols-2 gap-4">
                        {{-- 9 --}}
                        <div id="emp_psa_marriage_certif_container"
                            class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                            <label for="emp_psa_marriage_certif"
                                class="block text-sm font-medium text-gray-900 dark:text-white">9. PSA Marriage Certificate<span class="text-red-600">*</span></label>
                            <div class="grid grid-cols-1   w-full">
                            @if ($emp_psa_marriage_certif)
                                @foreach ($emp_psa_marriage_certif as $index => $item)
                                @php
                                    $insideIndex = 0;
                                @endphp
                                @if(is_string($item) == true)
                                    <div>
                                        <label for="emp_psa_marriage_certif_{{ $index }}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            @php
                                                $image = $this->getArrayImage('emp_psa_marriage_certif', $index);
                                            @endphp
                                            <button type="button"
                                                wire:click="removeArrayImage({{ $index }}, 'emp_psa_marriage_certif')"
                                                class="absolute top-0 right-0 m-2 text-red-600 py-1 rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                            <img src="data:image/gif;base64,{{ base64_encode($image) }}"
                                                alt="Image Description"
                                                class="w-full h-full object-contain p-1">
                                            <input id="emp_psa_marriage_certif_{{ $index }}" type="file" class="hidden"
                                                wire:model="emp_psa_marriage_certif.{{ $index }}" multiple>
                                        </label>
                                    </div>
                                @else
                                    @foreach ($item as $insideIndex => $file)
                                        @if (is_array($file))
                                            <label for="emp_psa_marriage_certif_{{ $index }}.{{$insideIndex}}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <img src="{{ $file[$insideIndex]->temporaryUrl() }}"
                                                        class="w-full h-full object-contain p-1 "
                                                        alt="Uploaded Image">
                                                    <button type="button"
                                                        wire:click="removeArrayImage({{ $index }}, 'emp_psa_marriage_certif', {{$insideIndex}})"
                                                        class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    <input id="emp_psa_marriage_certif_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                        wire:model="emp_psa_marriage_certif.{{ $index }}.{{$insideIndex}}" multiple>
                                            </label>
                                        @else
                                            <label for="emp_psa_marriage_certif_{{ $index }}.{{$insideIndex}}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <img src="{{ $file->temporaryUrl() }}"
                                                        class="w-full h-full object-contain p-1"
                                                        alt="Uploaded Image">
                                                    <button type="button"
                                                        wire:click="removeArrayImage({{ $index }}, 'emp_psa_marriage_certif', {{$insideIndex}})"
                                                        class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    <input id="emp_psa_marriage_certif_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                        wire:model="emp_psa_marriage_certif.{{ $index }}.{{$insideIndex}}">
                                            </label>
                                        @endif
                                        @error('emp_psa_marriage_certif.' . $index .  '.' .  $insideIndex)
                                        <div class="transition transform alert alert-danger text-sm mb-1"
                                                x-data x-init="document.getElementById('emp_psa_marriage_certif_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_psa_marriage_certif_container').focus();">
                                            <span class="text-red-500 text-xs "> {{$message}}</span>
                                        </div> 
                                    @enderror
                                    @endforeach
                                @endif
                                    @php
                                        $indexRequestLetter = $index;
                                    @endphp
                                @error('emp_psa_marriage_certif.' . $index - $insideIndex)
                                    <div class="transition transform alert alert-danger text-sm mb-1"
                                            x-data x-init="document.getElementById('emp_psa_marriage_certif_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_psa_marriage_certif_container').focus();">
                                        <span class="text-red-500 text-xs "> {{$message}}</span>
                                    </div> 
                                @enderror
                                @endforeach
                                <label for="emp_psa_marriage_certif_{{ $indexRequestLetter + 1 }}"
                                    class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div
                                            class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p
                                                class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold">Click to upload</span></p>
                                            <p
                                                class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                        </div>
                                </label>
                                <input id="emp_psa_marriage_certif_{{ $indexRequestLetter + 1 }}" type="file" class="hidden"
                                                wire:model="emp_psa_marriage_certif.{{ $indexRequestLetter + 1 }}" multiple>
                            @else
                                <label for="emp_psa_marriage_certif"
                                class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div
                                            class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p
                                                class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold">Click to upload</span></p>
                                            <p
                                                class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                        </div>
                                        <input id="emp_psa_marriage_certif" type="file" class="hidden"
                                        wire:model.blur="emp_psa_marriage_certif.0" multiple>
                                </label>
                            @endif
                            @error('emp_psa_marriage_certif')
                            <div class="transition transform alert alert-danger text-sm mb-1 mt-2" x-data
                                x-init="document.getElementById('emp_psa_marriage_certif_container').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                document.getElementById('emp_psa_marriage_certif_container').focus();">
                                <span class="text-red-500 text-xs "> {{ $message }}</span>
                            </div>
                            @enderror
                            </div>
                        </div>

                        {{-- 10 --}}
                        <div id="emp_service_record_from_other_govt_agency_container"
                            class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                            <label for="emp_service_record_from_other_govt_agency"
                                class="block text-sm font-medium text-gray-900 dark:text-white">10. Service Record From Other Government Agency<span class="text-red-600">*</span></label>
                            <div class="grid grid-cols-1   w-full">
                            @if ($emp_service_record_from_other_govt_agency)
                                @foreach ($emp_service_record_from_other_govt_agency as $index => $item)
                                @php
                                    $insideIndex = 0;
                                @endphp
                                @if(is_string($item) == true)
                                    <div>
                                        <label for="emp_service_record_from_other_govt_agency_{{ $index }}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            @php
                                                $image = $this->getArrayImage('emp_service_record_from_other_govt_agency', $index);
                                            @endphp
                                            <button type="button"
                                                wire:click="removeArrayImage({{ $index }}, 'emp_service_record_from_other_govt_agency')"
                                                class="absolute top-0 right-0 m-2 text-red-600 py-1 rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                            <img src="data:image/gif;base64,{{ base64_encode($image) }}"
                                                alt="Image Description"
                                                class="w-full h-full object-contain p-1">
                                            <input id="emp_service_record_from_other_govt_agency_{{ $index }}" type="file" class="hidden"
                                                wire:model="emp_service_record_from_other_govt_agency.{{ $index }}" multiple>
                                        </label>
                                    </div>
                                @else
                                    @foreach ($item as $insideIndex => $file)
                                        @if (is_array($file))
                                            <label for="emp_service_record_from_other_govt_agency_{{ $index }}.{{$insideIndex}}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <img src="{{ $file[$insideIndex]->temporaryUrl() }}"
                                                        class="w-full h-full object-contain p-1 "
                                                        alt="Uploaded Image">
                                                    <button type="button"
                                                        wire:click="removeArrayImage({{ $index }}, 'emp_service_record_from_other_govt_agency', {{$insideIndex}})"
                                                        class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    <input id="emp_service_record_from_other_govt_agency_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                        wire:model="emp_service_record_from_other_govt_agency.{{ $index }}.{{$insideIndex}}" multiple>
                                            </label>
                                        @else
                                            <label for="emp_service_record_from_other_govt_agency_{{ $index }}.{{$insideIndex}}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <img src="{{ $file->temporaryUrl() }}"
                                                        class="w-full h-full object-contain p-1"
                                                        alt="Uploaded Image">
                                                    <button type="button"
                                                        wire:click="removeArrayImage({{ $index }}, 'emp_service_record_from_other_govt_agency', {{$insideIndex}})"
                                                        class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    <input id="emp_service_record_from_other_govt_agency_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                        wire:model="emp_service_record_from_other_govt_agency.{{ $index }}.{{$insideIndex}}">
                                            </label>
                                        @endif
                                        @error('emp_service_record_from_other_govt_agency.' . $index .  '.' .  $insideIndex)
                                        <div class="transition transform alert alert-danger text-sm mb-1"
                                                x-data x-init="document.getElementById('emp_service_record_from_other_govt_agency_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_service_record_from_other_govt_agency_container').focus();">
                                            <span class="text-red-500 text-xs "> {{$message}}</span>
                                        </div> 
                                    @enderror
                                    @endforeach
                                @endif
                                    @php
                                        $indexRequestLetter = $index;
                                    @endphp
                                @error('emp_service_record_from_other_govt_agency.' . $index - $insideIndex)
                                    <div class="transition transform alert alert-danger text-sm mb-1"
                                            x-data x-init="document.getElementById('emp_service_record_from_other_govt_agency_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_service_record_from_other_govt_agency_container').focus();">
                                        <span class="text-red-500 text-xs "> {{$message}}</span>
                                    </div> 
                                @enderror
                                @endforeach
                                <label for="emp_service_record_from_other_govt_agency_{{ $indexRequestLetter + 1 }}"
                                    class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div
                                            class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p
                                                class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold">Click to upload</span></p>
                                            <p
                                                class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                        </div>
                                </label>
                                <input id="emp_service_record_from_other_govt_agency_{{ $indexRequestLetter + 1 }}" type="file" class="hidden"
                                                wire:model="emp_service_record_from_other_govt_agency.{{ $indexRequestLetter + 1 }}" multiple>
                            @else
                                <label for="emp_service_record_from_other_govt_agency"
                                class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div
                                            class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p
                                                class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold">Click to upload</span></p>
                                            <p
                                                class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                        </div>
                                        <input id="emp_service_record_from_other_govt_agency" type="file" class="hidden"
                                        wire:model.blur="emp_service_record_from_other_govt_agency.0" multiple>
                                </label>
                            @endif
                            @error('emp_service_record_from_other_govt_agency')
                            <div class="transition transform alert alert-danger text-sm mb-1 mt-2" x-data
                                x-init="document.getElementById('emp_service_record_from_other_govt_agency_container').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                document.getElementById('emp_service_record_from_other_govt_agency_container').focus();">
                                <span class="text-red-500 text-xs "> {{ $message }}</span>
                            </div>
                            @enderror
                            </div>
                        </div>
                    </div>
                    
                    {{-- 7th Row --}}
                    <div class="grid grid-cols-1 items-start min-[800px]:grid-cols-2  gap-4">
                        {{-- 12 --}}
                        <div id="emp_approved_clearance_prev_employer_container"
                            class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                            <label for="emp_approved_clearance_prev_employer"
                                class="block text-sm font-medium text-gray-900 dark:text-white">11. Approved Clearance from Previous Employer<span class="text-red-600">*</span></label>
                            <div class="grid grid-cols-1   w-full">
                            @if ($emp_approved_clearance_prev_employer)
                                @foreach ($emp_approved_clearance_prev_employer as $index => $item)
                                @php
                                    $insideIndex = 0;
                                @endphp
                                @if(is_string($item) == true)
                                    <div>
                                        <label for="emp_approved_clearance_prev_employer_{{ $index }}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            @php
                                                $image = $this->getArrayImage('emp_approved_clearance_prev_employer', $index);
                                            @endphp
                                            <button type="button"
                                                wire:click="removeArrayImage({{ $index }}, 'emp_approved_clearance_prev_employer')"
                                                class="absolute top-0 right-0 m-2 text-red-600 py-1 rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                            <img src="data:image/gif;base64,{{ base64_encode($image) }}"
                                                alt="Image Description"
                                                class="w-full h-full object-contain p-1">
                                            <input id="emp_approved_clearance_prev_employer_{{ $index }}" type="file" class="hidden"
                                                wire:model="emp_approved_clearance_prev_employer.{{ $index }}" multiple>
                                        </label>
                                    </div>
                                @else
                                    @foreach ($item as $insideIndex => $file)
                                        @if (is_array($file))
                                            <label for="emp_approved_clearance_prev_employer_{{ $index }}.{{$insideIndex}}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <img src="{{ $file[$insideIndex]->temporaryUrl() }}"
                                                        class="w-full h-full object-contain p-1 "
                                                        alt="Uploaded Image">
                                                    <button type="button"
                                                        wire:click="removeArrayImage({{ $index }}, 'emp_approved_clearance_prev_employer', {{$insideIndex}})"
                                                        class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    <input id="emp_approved_clearance_prev_employer_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                        wire:model="emp_approved_clearance_prev_employer.{{ $index }}.{{$insideIndex}}" multiple>
                                            </label>
                                        @else
                                            <label for="emp_approved_clearance_prev_employer_{{ $index }}.{{$insideIndex}}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <img src="{{ $file->temporaryUrl() }}"
                                                        class="w-full h-full object-contain p-1"
                                                        alt="Uploaded Image">
                                                    <button type="button"
                                                        wire:click="removeArrayImage({{ $index }}, 'emp_approved_clearance_prev_employer', {{$insideIndex}})"
                                                        class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    <input id="emp_approved_clearance_prev_employer_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                        wire:model="emp_approved_clearance_prev_employer.{{ $index }}.{{$insideIndex}}">
                                            </label>
                                        @endif
                                        @error('emp_approved_clearance_prev_employer.' . $index .  '.' .  $insideIndex)
                                        <div class="transition transform alert alert-danger text-sm mb-1"
                                                x-data x-init="document.getElementById('emp_approved_clearance_prev_employer_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_approved_clearance_prev_employer_container').focus();">
                                            <span class="text-red-500 text-xs "> {{$message}}</span>
                                        </div> 
                                    @enderror
                                    @endforeach
                                @endif
                                    @php
                                        $indexRequestLetter = $index;
                                    @endphp
                                @error('emp_approved_clearance_prev_employer.' . $index - $insideIndex)
                                    <div class="transition transform alert alert-danger text-sm mb-1"
                                            x-data x-init="document.getElementById('emp_approved_clearance_prev_employer_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_approved_clearance_prev_employer_container').focus();">
                                        <span class="text-red-500 text-xs "> {{$message}}</span>
                                    </div> 
                                @enderror
                                @endforeach
                                <label for="emp_approved_clearance_prev_employer_{{ $indexRequestLetter + 1 }}"
                                    class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div
                                            class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p
                                                class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold">Click to upload</span></p>
                                            <p
                                                class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                        </div>
                                </label>
                                <input id="emp_approved_clearance_prev_employer_{{ $indexRequestLetter + 1 }}" type="file" class="hidden"
                                                wire:model="emp_approved_clearance_prev_employer.{{ $indexRequestLetter + 1 }}" multiple>
                            @else
                                <label for="emp_approved_clearance_prev_employer"
                                class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div
                                            class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p
                                                class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold">Click to upload</span></p>
                                            <p
                                                class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                        </div>
                                        <input id="emp_approved_clearance_prev_employer" type="file" class="hidden"
                                        wire:model.blur="emp_approved_clearance_prev_employer.0" multiple>
                                </label>
                            @endif
                            @error('emp_approved_clearance_prev_employer')
                            <div class="transition transform alert alert-danger text-sm mb-1 mt-2" x-data
                                x-init="document.getElementById('emp_approved_clearance_prev_employer_container').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                document.getElementById('emp_approved_clearance_prev_employer_container').focus();">
                                <span class="text-red-500 text-xs "> {{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                        </div>
                        {{-- 12 --}}
                        <div id="other_documents_container"
                            class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                            <label for="other_documents"
                                class="block text-sm font-medium text-gray-900 dark:text-white">12. Other Documents</label>
                            <div class="grid grid-cols-1   w-full">
                            @if ($other_documents)
                                @foreach ($other_documents as $index => $item)
                                @php
                                    $insideIndex = 0;
                                @endphp
                                @if(is_string($item) == true)
                                    <div>
                                        <label for="other_documents_{{ $index }}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            @php
                                                $image = $this->getArrayImage('other_documents', $index);
                                            @endphp
                                            <button type="button"
                                                wire:click="removeArrayImage({{ $index }}, 'other_documents')"
                                                class="absolute top-0 right-0 m-2 text-red-600 py-1 rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                            <img src="data:image/gif;base64,{{ base64_encode($image) }}"
                                                alt="Image Description"
                                                class="w-full h-full object-contain p-1">
                                            <input id="other_documents_{{ $index }}" type="file" class="hidden"
                                                wire:model="other_documents.{{ $index }}" multiple>
                                        </label>
                                    </div>
                                @else
                                    @foreach ($item as $insideIndex => $file)
                                        @if (is_array($file))
                                            <label for="other_documents_{{ $index }}.{{$insideIndex}}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <img src="{{ $file[$insideIndex]->temporaryUrl() }}"
                                                        class="w-full h-full object-contain p-1 "
                                                        alt="Uploaded Image">
                                                    <button type="button"
                                                        wire:click="removeArrayImage({{ $index }}, 'other_documents', {{$insideIndex}})"
                                                        class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    <input id="other_documents_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                        wire:model="other_documents.{{ $index }}.{{$insideIndex}}" multiple>
                                            </label>
                                        @else
                                            <label for="other_documents_{{ $index }}.{{$insideIndex}}"
                                            class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <img src="{{ $file->temporaryUrl() }}"
                                                        class="w-full h-full object-contain p-1"
                                                        alt="Uploaded Image">
                                                    <button type="button"
                                                        wire:click="removeArrayImage({{ $index }}, 'other_documents', {{$insideIndex}})"
                                                        class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    <input id="other_documents_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                        wire:model="other_documents.{{ $index }}.{{$insideIndex}}">
                                            </label>
                                        @endif
                                        @error('other_documents.' . $index .  '.' .  $insideIndex)
                                        <div class="transition transform alert alert-danger text-sm mb-1"
                                                x-data x-init="document.getElementById('other_documents_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('other_documents_container').focus();">
                                            <span class="text-red-500 text-xs "> {{$message}}</span>
                                        </div> 
                                    @enderror
                                    @endforeach
                                @endif
                                    @php
                                        $indexRequestLetter = $index;
                                    @endphp
                                @error('other_documents.' . $index - $insideIndex)
                                    <div class="transition transform alert alert-danger text-sm mb-1"
                                            x-data x-init="document.getElementById('other_documents_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('other_documents_container').focus();">
                                        <span class="text-red-500 text-xs "> {{$message}}</span>
                                    </div> 
                                @enderror
                                @endforeach
                                <label for="other_documents_{{ $indexRequestLetter + 1 }}"
                                    class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div
                                            class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p
                                                class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold">Click to upload</span></p>
                                            <p
                                                class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                        </div>
                                </label>
                                <input id="other_documents_{{ $indexRequestLetter + 1 }}" type="file" class="hidden"
                                                wire:model="other_documents.{{ $indexRequestLetter + 1 }}" multiple>
                            @else
                                <label for="other_documents"
                                class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div
                                            class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p
                                                class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold">Click to upload</span></p>
                                            <p
                                                class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                PNG, JPG, or PDF files (Max: 3 files | 5MB each)</p>
                                        </div>
                                        <input id="other_documents" type="file" class="hidden"
                                        wire:model.blur="other_documents.0" multiple>
                                </label>
                            @endif
                            @error('other_documents')
                            <div class="transition transform alert alert-danger text-sm mb-1 mt-2" x-data
                                x-init="document.getElementById('other_documents_container').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                document.getElementById('other_documents_container').focus();">
                                <span class="text-red-500 text-xs "> {{ $message }}</span>
                            </div>
                            @enderror
                            </div>
                        </div>
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