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
            <a href="{{route('TeachPermitTable')}}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Teach Permit</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Approve</span>
            </div>
        </li>
        </ol>
    </nav> 
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">Approve Teach Permit</h2>
    <section class="bg-white dark:bg-gray-900 pb-24 px-8  rounded-lg">
        <div class=" px-1 mx-auto pt-8">
            <form wire:submit.prevent="submit" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    <div class="block w-full col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                        <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                            {{-- Application Date --}}

                            <div class="grid min-[1000px]:grid-cols-2  col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                                <div class="w-full">
                                    <label for="application_date"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Filling<span class="text-red-600">*</span></label>
                                    <input type="date" wire:model="application_date" 
                                        class="bg-gray-50 border w-auto border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                         required disabled>
                                </div>
                            </div>
                            {{-- Information field --}}
                            <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <h2><b>Information</b></h2>
                                    <div  class="col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                            <div class="grid grid-cols-1 min-[1000px]:grid-cols-3 gap-4 col-span-3 pb-4">
                                                <div class="w-full ">
                                                    <label for="firstname"
                                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">First name <span class="text-red-600">*</span></label>
                                                    <input type="text" name="firstname" id="firstname"  value="{{$first_name}}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        placeholder="First name" required="" disabled>
                                                </div>
                                                <div class="w-full ">
                                                    <label for="middlename"
                                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Middle name <span class="text-red-600">*</span></label>
                                                    <input type="text" name="middlename" id="middlename" value="{{$middle_name}}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        placeholder="Middle name" required="" disabled>
                                                </div>
                                                <div class="w-full">
                                                    <label for="lastname"
                                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Last name <span class="text-red-600">*</span></label>
                                                    <input type="text" name="lastname" id="lastname"  value="{{$last_name}}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        placeholder="Last name" required="" disabled>
                                                </div>
                                                <div class="w-full">
                                                    <label for="department_name"
                                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Department Name <span class="text-red-600">*</span></label>
                                                    <input type="text" name="department_name" id="department_name"  value="{{$department_name}}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                         disabled>
                                                </div>
                                                <div class="w-full">
                                                    <label for="employee_type"
                                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Employee Type <span class="text-red-600">*</span></label>
                                                    <input type="text" name="employee_type" id="employee_type"  value="{{$employee_type}}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        disabled>
                                                </div>
                                                <div class="w-full">
                                                    <label for="current_position"
                                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Current Position <span class="text-red-600">*</span></label>
                                                    <input type="text" name="current_position" id="current_position"  value="{{$current_position}}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        disabled>
                                                </div>
                                            </div>
                                            
                                    </div>
                                {{-- Designation and inside or outside the universityu --}}
                                <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[1000px]:grid-cols-2 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                    <h2><b>School Information</b></h2>
                                    <div class="grid grid-cols-2 col-span-3 gap-4">
                                        <div class="w-full">
                                            <label for="designation_rank"
                                                class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Designation/Rank <span class="text-red-600">*</span></label>
                                            <input type="text" name="designation_rank" id="designation_rank"  wire:model="designation_rank"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Designation\Rank"  >
                                        </div>
                                        <div class="w-full grid grid-cols-1 ">
                                            <label for="inside_outside_university"
                                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white ">Commutation <span class="text-red-600">*</span></label>
                                                <div class="grid grid-cols-4 w-full pl-4 items-start">
                                                    <div>
                                                        <input type="radio" name="inside_outside_university" id="inside_outside_university" wire:model="inside_outside_university" value="Inside the University">
                                                        <label for="numOfWorkDay" class="text-sm font-semibold">Requested</label>
                                                    </div>
                                                    <div>
                                                        <input type="radio" id="inside_outside_university" name="inside_outside_university" wire:model="inside_outside_university" value="Outside the University">
                                                        <label for="html" class="text-sm font-semibold">Not Requested</label><br>
                                                    </div>
                                                @error('inside_outside_university')
                                                <div class="transition transform alert alert-danger"
                                                        x-init="$el.closest('form').scrollIntoView()">
                                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                </div> 
                                                @enderror   
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Date Of Filling --}}
                                <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[1000px]:grid-cols-2 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                    {{-- <h2><b>Date of Filling</b></h2> --}}
                                 
                                    <div class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                                        <h2><b>Period Covered</b></h2>
                                        <div class="grid grid-cols-1  gap-4 pt-5">
                                            <div class="w-full">
                                                <label for="start_period_cover"
                                                    class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white ">Start Period <span class="text-red-600">*</span></label>
                                                <input type="date" name="start_period_cover" id="start_period_cover" wire:model.live="start_period_cover" value="{{$date}}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    disabled>
                                                @error('start_period_cover')
                                                    <div class="transition transform alert alert-danger"
                                                            x-init="$el.closest('form').scrollIntoView()">
                                                        <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                    </div> 
                                                @enderror       
                                            </div>
                                            <div class="w-full">
                                                <label for="end_period_cover"
                                                    class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white">End Period <span class="text-red-600">*</span></label>
                                                <input type="date" name="end_period_cover" id="end_period_cover" wire:model.live="end_period_cover" value="{{$date}}" min="{{ \Carbon\Carbon::now()->addDays($start_period_cover)->format('Y-m-d\TH:i') }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                disabled>
                                                @error('end_period_cover')   
                                                    <div class="transition transform alert alert-danger text-sm "
                                                    x-init="$el.closest('form').scrollIntoView()">
                                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{ $message }}</span>
                                                    </div> 
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                                        <h2><b>Teach Permit Description</b></h2>
                                        <div>
                                            <label for="name_of_school_description"
                                            class="block mb-2 pt-4 text-sm font-medium  text-gray-900 dark:text-white">Indicate the degree program and school where employee intends to enroll. (Please indicate address and contact numbers if outside the University.) <span class="text-red-600">*</span></label>
                                            <textarea disabled type="text" rows="4" id="name_of_school_description" name="name_of_school_description" wire:model="name_of_school_description"
                                            placeholder="If chosen others, write the type of leave. Otherwise, Ignore"   
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @
                                            </textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- Subject Load --}}
                            <div class="grid grid-cols-1 col-span-3 p-6 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <h2><b>Subject Load</b></h2>
                                @foreach ($subjectLoad as $index => $load)
                                    <div class="grid grid-cols-5 col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                        <div class="col-span-5">
                                            <ul class="text-sm font-medium text-right pb-12 text-gray-500 border border-gray-300 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                                                <li class="float-left mt-4 ml-5  float-bold text-gray-900 font-bold">
                                                    <span>No. {{$index + 1 }}</span>
                                                </li>
                                       
                                            </ul>
                                        </div>
                                        <div class="grid grid-cols-1 min-[1000px]:grid-cols-2 col-span-5 ">
                                            <div class="grid grid-cols-1 min-[1404px]:grid-cols-2 p-6 gap-4 bg-white border border-gray-200  shadow  dark:bg-gray-800 dark:border-gray-700">
                                                <div class="">
                                                    <label for="subjectLoad_{{$index}}_subject" class="block mb-2 text-sm whitespace-nowrap font-medium text-gray-900 dark:text-white">Subject <span class="text-red-600">*</span></label>
                                                    <input disabled type="text" rows="4" id="subjectLoad_{{$index}}_subject" name="subjectLoad[{{$index}}][subject]" wire:model.blur="subjectLoad.{{$index}}.subject" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
                                                    @error('subjectLoad.' . $index . '.subject')   
                                                        <div class="transition transform alert alert-danger text-sm"
                                                                x-data x-init="document.getElementById('subjectLoad_{{$index}}_subject').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('subjectLoad_{{$index}}_subject').focus();">
                                                            <span class="text-red-500 text-xs "> {{$message}}</span>
                                                        </div> 
                                                    @enderror
                                                </div>
                                                <div >
                                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Days<span class="text-red-600">*</span></label>
                                                    @foreach ($subjectLoad[$index]['days'] as $item)
                                                        <li>
                                                            {{$item}}
                                                        </li>
                                                    @endforeach
                                                    @error('subjectLoad.' . $index . '.days')   
                                                        <div class="transition transform alert alert-danger text-sm"
                                                            x-data x-init="document.getElementById('subjectLoad_{{$index}}_days').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('subjectLoad_{{$index}}_days').focus();" >
                                                                <span class="text-red-500 text-xs" > {{$message}}</span>
                                                        </div> 
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-1 min-[1404px]:grid-cols-3 p-6 gap-4  bg-white border border-gray-200  shadow  dark:bg-gray-800 dark:border-gray-700">
                                                <div class="">
                                                    <label for="subjectLoad_{{$index}}_start_time"
                                                        class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white ">Start Period <span class="text-red-600">*</span></label>
                                                    <input disabled type="time" name="subjectLoad_{{$index}}_start_time" id="subjectLoad[{{$index}}][start_time]" wire:model.live="subjectLoad.{{$index}}.start_time" 
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        required="">
                                                    {{-- @error('start_period') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror  --}}
                                                    @error('subjectLoad.' . $index . '.start_time')
                                                        <div class="transition transform alert alert-danger text-sm"
                                                        x-data x-init="document.getElementById('subjectLoad_{{$index}}_start_time').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('subjectLoad_{{$index}}_start_time').focus();" >
                                                            <span class="text-red-500 text-xs" > {{$message}}</span>
                                                        </div> 
                                                    @enderror       
                                                </div>
                                                <div class="">
                                                    <label for="subjectLoad_{{$index}}_end_time"
                                                        class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white">End Period <span class="text-red-600">*</span></label>
                                                    <input disabled type="time" name="subjectLoad_{{$index}}_end_time" id="subjectLoad[{{$index}}][end_time]" wire:model.live="subjectLoad.{{$index}}.end_time" value="{{$date}}" min="{{ \Carbon\Carbon::now()->addDays()->format('Y-m-d\TH:i') }}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="">
                                                    @error('subjectLoad.' . $index . '.end_time')   
                                                        <div class="transition transform alert alert-danger text-sm"
                                                        x-data x-init="document.getElementById('subjectLoad_{{$index}}_end_time').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('subjectLoad_{{$index}}_end_time').focus();" >
                                                            <span class="text-red-500 text-xs" > {{$message}}</span>
                                                        </div> 
                                                    @enderror
                                                </div>
                                                <div class="">
                                                    <label for="subjectLoad_{{$index}}_number_of_units" class="block mb-2 text-sm whitespace-nowrap font-medium text-gray-900 dark:text-white">Subject <span class="text-red-600">*</span></label>
                                                    <input disabled type="number" rows="4" id="subjectLoad_{{$index}}_number_of_units" name="subjectLoad[{{$index}}][number_of_units]" wire:model.blur="subjectLoad.{{$index}}.number_of_units" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
                                                    @error('subjectLoad.' . $index . '.number_of_units')   
                                                        <div class="transition transform alert alert-danger text-sm"
                                                                x-data x-init="document.getElementById('subjectLoad_{{$index}}_number_of_units').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('subjectLoad_{{$index}}_number_of_units').focus();">
                                                            <span class="text-red-500 text-xs "> {{$message}}</span>
                                                        </div> 
                                                    @enderror
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    @endforeach
                                {{-- <div class="flex justify-center">
                                    <button type="button" name="add" wire:click.prevent="addSubjectLoad" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Subject Load</button>
                                </div> --}}
                                <div class="grid grid-cols-1 min-[740px]:grid-cols-2 col-span-3 p-6 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                        <div class="w-full">
                                            <label for="available_units"
                                                class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Available Units </label>
                                            <input type="text" name="available_units" id="available_units"  value="20"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Last name" required="" disabled>
                                        </div>
                                        <div class="w-full">
                                            <label for="units_enrolled"
                                                class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Units Enrolled </label>
                                            <input type="text" name="units_enrolled" id="units_enrolled"  value="20"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Last name" required="" disabled>
                                        </div>
                                </div>
                            </div>
                            {{-- Total Teaching Aggregate load --}}
                            <div class="grid grid-cols-1 col-span-3 p-6 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <h2><b>Total Teaching/Aggregate Load</b></h2>
                                <div class="grid grid-cols-1 min-[1000px]:grid-cols-2 gap-4">
                                    <div class="grid grid-cols-1 gap-4 p-6  bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                        
                                        <div >
                                            <div class="w-full">
                                                <label for="total_load_plm"
                                                    class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">Total Load At PLM <span class="text-red-600">*</span></label>
                                                <input type="text" name="total_load_plm" id="total_load_plm"  wire:model.blur="total_load_plm"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    disabled >
                                            </div>
                                        </div>
                                        <div >
                                            <div class="w-full">
                                                <label for="total_load_otherunivs"
                                                    class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">Total Load in Other Universities <span class="text-red-600">*</span></label>
                                                <input type="text" name="total_load_otherunivs" id="total_load_otherunivs"  wire:model.blur="total_load_otherunivs"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    disabled >
                                            </div>
                                        </div>
                                        <div    >
                                            <div class="w-full">
                                                <label for="total_aggregate_load"
                                                    class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">Total Aggregate Load (including ETUs) <span class="text-red-600">*</span></label>
                                                <input type="text" name="total_aggregate_load" id="total_aggregate_load"  wire:model.blur="total_aggregate_load"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    disabled >
                                            </div>
                                        </div>
                                       
                                        
                                    </div>
                                    <div class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                        <label for="total_aggregate_load"
                                        class="block text-base font-medium text-gray-900 dark:text-white">I hereby abide by the applicable rules and regulations on study/educational priviliges. 
                                        I also certify in my honor to the correctness and completeness of the information provided herein.* <span class="text-red-600">*</span></label>
                                        <div class="grid grid-cols-1 items-center justify-center w-full">
                                            @if($applicant_signature)
                                                <label for="applicant_signature" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    @if(is_string($applicant_signature) == True)
                                                        @php
                                                            $applicant_signature = $this->getApplicantSignature();
                                                        @endphp
                                                        <img src="data:image/gif;base64,{{ base64_encode($applicant_signature) }}" alt="Image Description" class="w-full h-full object-contain"> 
                                                    @else
                                                        <img src="{{ $applicant_signature->temporaryUrl() }}" class="w-full h-full object-contain" alt="Uploaded Image">
                                                    @endif
                                                    <input disabled id="applicant_signature" type="file" class="hidden" wire:model.live="applicant_signature">
                                                </label>
                                            @else
                                                <label for="dropzone-file2" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                        <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                        </svg>
                                                        <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                        <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG, or PDF file (Max: 5 MB size)</p>
                                                    </div>
                                                    <input disabled id="dropzone-file2" type="file" class="hidden" wire:model.blur="applicant_signature" />
                                                </label>
                                            @endif
                                            @error('applicant_signature')
                                                <div class="transition transform alert alert-danger"
                                                        x-init="$el.closest('label').scrollIntoView()">
                                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                       
                                    </div>
         
                                </div>
                            </div> 

                            <div class="grid grid-cols-1 col-span-3 p-6 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <h2><b>Signed By:</b></h2>
                                <div class="grid grid-cols-5 gap-2">
                                    <div class="grid grid-cols-1 gap-4 col-span-2 p-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700" >
                                        <div class="w-full grid grid-cols-1 " id="verdict_of_head_office_container">
                                            <label for="verdict_of_head_office"
                                                class="text-sm font-medium text-gray-900 dark:text-white">Approved/Declined <span class="text-red-600">*</span></label>
                                                <div class="w-full pl-4 items-start">
                                                <div class="grid grid-cols-1 lg:grid-cols-2 ">
                                                   <div>
                                                    <input type="radio" name="verdict_of_head_office" id="verdict_of_head_office" wire:model.live="verdict_of_head_office" value="1">
                                                    <label for="numOfWorkDay" class="text-sm font-semibold">Approved</label>
                                                   </div>
                                                   <div>
                                                    <input type="radio" id="verdict_of_head_office" name="verdict_of_head_office" wire:model.live="verdict_of_head_office" value="0">
                                                    <label for="html" class="text-sm font-semibold">Declined</label>
                                                   </div>
                                                </div>
                                                @error('verdict_of_head_office')
                                                    <div class="transition transform alert alert-danger text-sm"
                                                        x-data x-init="document.getElementById('verdict_of_head_office_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('verdict_of_head_office_container').focus();" >
                                                            <span class="text-red-500 text-xs" > {{$message}}</span>
                                                    </div> 
                                                @enderror   
                                                </div>
                                        </div>
                                        <div class="w-full ">
                                            <label for="date_of_signature_of_head_office"
                                                class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white ">Department Head Signature Date<span class="text-red-600">*</span></label>
                                            <input type="date" name="date_of_signature_of_head_office" id="date_of_signature_of_head_office" wire:model="date_of_signature_of_head_office" 
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            @error('date_of_signature_of_head_office')
                                                <div class="transition transform alert alert-danger text-sm"
                                                        x-data x-init="document.getElementById('date_of_signature_of_head_office').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('date_of_signature_of_head_office').focus();">
                                                        <span class="text-red-500 text-xs "> {{$message}}</span>
                                                </div> 
                                            @enderror       
                                        </div>
                                    </div>

                                    {{-- Head Office --}}

                                    <div id="signature_of_head_office_container" class=" col-span-3 grid grid-cols-1 p-4 gap-2 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                        <label for="signature_recommended_by"
                                        class="block text-sm font-medium text-gray-900 dark:text-white">Department Head Signature<span class="text-red-600">*</span></label>
                                        <div class="grid grid-cols-1 items-center justify-center w-full">
                                            @if($signature_of_head_office)
                                                <label for="signature_of_head_office" class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    @if(is_string($signature_of_head_office) == True)
                                                        @php
                                                            $signature_of_head_office = $this->getHeadSignature();
                                                        @endphp
                                                        <img src="data:image/gif;base64,{{ base64_encode($signature_of_head_office) }}" alt="Image Description" class="w-full h-full object-contain"> 
                                                    @else
                                                        <img src="{{ $signature_of_head_office->temporaryUrl() }}" class="w-full h-full object-contain" alt="Uploaded Image">
                                                    @endif
                                                    <button type="button" wire:click="removeImage('signature_of_head_office')" class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    <input id="signature_of_head_office" type="file" class="hidden" wire:model.live="signature_of_head_office">
                                                </label>
                                            @else
                                                <label for="signature_of_head_office" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                        <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                        </svg>
                                                        <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                        <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG, or PDF file (Max: 5 MB size)</p>
                                                    </div>
                                                    <input id="signature_of_head_office" type="file" class="hidden" wire:model.blur="signature_of_head_office">
                                                </label>
                                            @endif
                                            @error('signature_of_head_office')
                                                <div class="transition transform alert alert-danger text-sm"
                                                    x-data x-init="document.getElementById('signature_of_head_office_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('signature_of_head_office_container').focus();">
                                                    <span class="text-red-500 text-xs "> {{$message}}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Human Resource  --}}
                                <div class="grid grid-cols-5 gap-2" id="signature_of_human_resource_container">
                                    <div class="grid grid-cols-1 gap-4 col-span-2 p-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                                        <div class="w-full grid grid-cols-1" id="verdict_of_human_resource_container">
                                            <label for="verdict_of_human_resource"
                                                class="text-sm font-medium text-gray-900 dark:text-white">Approved/Declined <span class="text-red-600">*</span></label>
                                                <div class="w-full pl-4 items-start">
                                                <div class="grid grid-cols-1 lg:grid-cols-2 ">
                                                   <div>
                                                    <input type="radio" name="verdict_of_human_resource" id="verdict_of_human_resource" wire:model.live="verdict_of_human_resource" value="1">
                                                    <label for="numOfWorkDay" class="text-sm font-semibold">Approved</label>
                                                   </div>
                                                   <div>
                                                    <input type="radio" id="verdict_of_human_resource" name="verdict_of_human_resource" wire:model.live="verdict_of_human_resource" value="0">
                                                    <label for="html" class="text-sm font-semibold">Declined</label>
                                                   </div>
                                                </div>
                                                @error('verdict_of_human_resource')
                                                    <div class="transition transform alert alert-danger text-sm"
                                                        x-data x-init="document.getElementById('verdict_of_human_resource_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('verdict_of_human_resource_container').focus();" >
                                                            <span class="text-red-500 text-xs" > {{$message}}</span>
                                                    </div> 
                                                @enderror   
                                                </div>
                                        </div>
                                        <div>
                                            <label for="date_of_signature_of_human_resource"
                                            class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white ">Human Resource Signature Date<span class="text-red-600">*</span></label>
                                        <input type="date" name="date_of_signature_of_human_resource" id="date_of_signature_of_human_resource" wire:model="date_of_signature_of_human_resource" 
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            >
                                        @error('date_of_signature_of_human_resource')
                                                <div class="transition transform alert alert-danger text-sm"
                                                    x-data x-init="document.getElementById('signature_of_human_resource_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('signature_of_human_resource_container').focus();">
                                                    <span class="text-red-500 text-xs "> {{$message}}</span>
                                                </div> 
                                        @enderror       
                                        </div>
                                    </div>
                                    <div  class="col-span-3 grid grid-cols-1 p-4 gap-2 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                        <label for="signature_of_human_resource" 
                                        class="block text-sm font-medium text-gray-900 dark:text-white">Human Resource Signature <span class="text-red-600">*</span></label>
                                        <div  class="grid grid-cols-1 items-center justify-center w-full">
                                            @if($signature_of_human_resource)
                                                <label for="signature_of_human_resource" class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    @if (is_string($signature_of_human_resource) == True)
                                                        @php
                                                            $signature_of_human_resource = $this->getHumanResourceSignature();
                                                        @endphp
                                                        <img src="data:image/gif;base64,{{ base64_encode($signature_of_human_resource) }}" alt="Image Description" class="w-full h-full object-contain"> 
                                                    @else
                                                        <img src="{{ $signature_of_human_resource->temporaryUrl() }}" class="w-full h-full object-contain" alt="Uploaded Image">
                                                    @endif
                                                    <button type="button" wire:click="removeImage('signature_of_human_resource')" class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    <input id="signature_of_human_resource" type="file" class="hidden" wire:model.live="signature_of_human_resource">
                                                </label>
                                            @else
                                                <label for="signature_of_human_resource" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                        <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                        </svg>
                                                        <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                        <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG, or PDF file (Max: 5 MB size)</p>
                                                    </div>
                                                    <input id="signature_of_human_resource" type="file" class="hidden" wire:model.blur="signature_of_human_resource">
                                                </label>
                                            @endif
                                            @error('signature_of_human_resource')
                                                <div class="transition transform alert alert-danger text-sm"
                                                x-data x-init="document.getElementById('signature_of_human_resource_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('signature_of_human_resource_container').focus();">
                                                <span class="text-red-500 text-xs "> {{$message}}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Academic Affairs --}}
                                <div class="grid grid-cols-5 gap-2" id="signature_of_vp_for_academic_affair_container">
                                    <div class="grid grid-cols-1  gap-4 col-span-2 p-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                        <div class="w-full grid grid-cols-1 " id="verdict_of_vp_for_academic_affair_container">
                                            <label for="verdict_of_vp_for_academic_affair"
                                                class="text-sm font-medium text-gray-900 dark:text-white">Approved/Declined <span class="text-red-600">*</span></label>
                                                <div class="w-full pl-4 items-start">
                                                <div class="grid grid-cols-1 lg:grid-cols-2 ">
                                                   <div>
                                                    <input type="radio" name="verdict_of_vp_for_academic_affair" id="verdict_of_vp_for_academic_affair" wire:model.live="verdict_of_vp_for_academic_affair" value="1">
                                                    <label for="numOfWorkDay" class="text-sm font-semibold">Approved</label>
                                                   </div>
                                                   <div>
                                                    <input type="radio" id="verdict_of_vp_for_academic_affair" name="verdict_of_vp_for_academic_affair" wire:model.live="verdict_of_vp_for_academic_affair" value="0">
                                                    <label for="html" class="text-sm font-semibold">Declined</label>
                                                   </div>
                                                </div>
                                                @error('verdict_of_vp_for_academic_affair')
                                                    <div class="transition transform alert alert-danger text-sm"
                                                        x-data x-init="document.getElementById('verdict_of_vp_for_academic_affair_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('verdict_of_vp_for_academic_affair_container').focus();" >
                                                            <span class="text-red-500 text-xs" > {{$message}}</span>
                                                    </div> 
                                                @enderror   
                                                </div>
                                        </div>
                                        <div>
                                            <label for="date_of_signature_of_vp_for_academic_affair"
                                            class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white ">VP of Academic Affairs Signature Date<span class="text-red-600">*</span></label>
                                            <input type="date" name="date_of_signature_of_vp_for_academic_affair" id="date_of_signature_of_vp_for_academic_affair" wire:model="date_of_signature_of_vp_for_academic_affair" 
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            @error('date_of_signature_of_vp_for_academic_affair')
                                                    <div class="transition transform alert alert-danger text-sm"
                                                        x-data x-init="document.getElementById('signature_of_human_resource_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('signature_of_human_resource_container').focus();">
                                                        <span class="text-red-500 text-xs "> {{$message}}</span>
                                                    </div> 
                                            @enderror       
                                        </div>
                                    </div>
                                    <div class="col-span-3 grid grid-cols-1 p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                        <label for="signature_of_vp_for_academic_affair"
                                        class="block text-sm font-medium text-gray-900 dark:text-white">VP of Academic Affairs Signature<span class="text-red-600">*</span></label>
                                        <div class="grid grid-cols-1 items-center justify-center w-full ">
                                            @if($signature_of_vp_for_academic_affair)
                                                <label for="signature_of_vp_for_academic_affair" class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    @if(is_string($signature_of_vp_for_academic_affair) == True)
                                                        @php
                                                            $signature_of_vp_for_academic_affair = $this->getVpAcademicAffairsSignature();
                                                        @endphp
                                                        <img src="data:image/gif;base64,{{ base64_encode($signature_of_vp_for_academic_affair) }}" alt="Image Description" class="w-full h-full object-contain"> 
                                                    @else
                                                        <img src="{{ $signature_of_vp_for_academic_affair->temporaryUrl() }}" class="w-full h-full object-contain" alt="Uploaded Image">
                                                    @endif
                                                    <button type="button" wire:click="removeImage('signature_of_vp_for_academic_affair')" class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    <input id="signature_of_vp_for_academic_affair" type="file" class="hidden" wire:model.live="signature_of_vp_for_academic_affair">
                                                </label>
                                            @else
                                                <label for="signature_of_vp_for_academic_affair" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                        <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                        </svg>
                                                        <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                        <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG, or PDF file (Max: 5 MB size)</p>
                                                    </div>
                                                    <input id="signature_of_vp_for_academic_affair" type="file" class="hidden" wire:model.blur="signature_of_vp_for_academic_affair">
                                                </label>
                                            @endif
                                            @error('signature_of_vp_for_academic_affair')
                                                <div class="transition transform alert alert-danger text-sm"
                                                    x-data x-init="document.getElementById('signature_of_vp_for_academic_affair_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('signature_of_vp_for_academic_affair_container').focus();">
                                                    <span class="text-red-500 text-xs "> {{$message}}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- University President --}}
                                <div class="grid grid-cols-5 gap-2" id="signature_of_university_president_container">
                                    <div class="grid grid-cols-1  gap-4 col-span-2 p-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                                        <div class="w-full grid grid-cols-1 " id="verdict_of_university_president_container">
                                            <label for="verdict_of_university_president"
                                                class="text-sm font-medium text-gray-900 dark:text-white">Approved/Declined <span class="text-red-600">*</span></label>
                                                <div class="w-full pl-4 items-start">
                                                <div class="grid grid-cols-1 lg:grid-cols-2 ">
                                                   <div>
                                                    <input type="radio" name="verdict_of_university_president" id="verdict_of_university_president" wire:model.live="verdict_of_university_president" value="1">
                                                    <label for="numOfWorkDay" class="text-sm font-semibold">Approved</label>
                                                   </div>
                                                   <div>
                                                    <input type="radio" id="verdict_of_university_president" name="verdict_of_university_president" wire:model.live="verdict_of_university_president" value="0">
                                                    <label for="html" class="text-sm font-semibold">Declined</label>
                                                   </div>
                                                </div>
                                                @error('verdict_of_university_president')
                                                    <div class="transition transform alert alert-danger text-sm"
                                                        x-data x-init="document.getElementById('verdict_of_university_president_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('verdict_of_university_president_container').focus();" >
                                                            <span class="text-red-500 text-xs" > {{$message}}</span>
                                                    </div> 
                                                @enderror   
                                                </div>
                                        </div>
                                        <div>
                                            <label for="date_of_signature_of_university_president"
                                            class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white ">University President Signature Date<span class="text-red-600">*</span></label>
                                        <input type="date" name="date_of_signature_of_university_president" id="date_of_signature_of_university_president" wire:model="date_of_signature_of_university_president" 
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            >
                                        @error('date_of_signature_of_university_president')
                                                <div class="transition transform alert alert-danger text-sm"
                                                    x-data x-init="document.getElementById('signature_of_university_president_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('signature_of_university_president_container').focus();">
                                                    <span class="text-red-500 text-xs "> {{$message}}</span>
                                                </div> 
                                        @enderror       
                                        </div>
                                    </div>
                                    <div class="col-span-3 grid grid-cols-1 p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                        <label for="signature_of_university_president"
                                        class="block text-sm font-medium text-gray-900 dark:text-white">University President Signature<span class="text-red-600">*</span></label>
                                        <div class="grid grid-cols-1 items-center justify-center w-full">
                                            @if($signature_of_university_president)
                                                <label for="signature_of_university_president" class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    @if(is_string($signature_of_university_president) == True)
                                                        @php
                                                            $signature_of_university_president = $this->getPresidentSignature();
                                                        @endphp
                                                        <img src="data:image/gif;base64,{{ base64_encode($signature_of_university_president) }}" alt="Image Description" class="w-full h-full object-contain"> 
                                                    @else
                                                        <img src="{{ $signature_of_university_president->temporaryUrl() }}" class="w-full h-full object-contain" alt="Uploaded Image">
                                                    @endif
                                                    <button type="button" wire:click="removeImage('signature_of_university_president')" class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    <input id="signature_of_university_president" type="file" class="hidden" wire:model.live="signature_of_university_president">
                                                </label>
                                            @else
                                                <label for="signature_of_university_president" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                        <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                        </svg>
                                                        <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                        <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG, or PDF file (Max: 5 MB size)</p>
                                                    </div>
                                                    <input id="signature_of_university_president" type="file" class="hidden" wire:model.blur="signature_of_university_president">
                                                </label>
                                            @endif
                                            @error('signature_of_university_president')
                                                <div class="transition transform alert alert-danger text-sm"
                                                    x-data x-init="document.getElementById('signature_of_university_president_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('signature_of_university_president_container').focus();">
                                                    <span class="text-red-500 text-xs "> {{$message}}</span>
                                                </div>  
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                            </div>


                           
                         

                          
                        </div>
                    </div>
                </div>
                <button type="submit"  class="inline-flex items-center float-right px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Update Teach Permit
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