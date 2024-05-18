<div>
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{ route('StudyPermitTable') }}"
                        class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Study
                        Permit</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Update</span>
                </div>
            </li>
        </ol>
    </nav>
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">Update Study Permit</h2>
    <section class="bg-white dark:bg-gray-900 pb-24 px-8  rounded-lg">
        <div class=" px-1 mx-auto pt-8">
            <form wire:submit.prevent="submit" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    <div
                        class="block w-full col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                        <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                            {{-- Application Date --}}
                            <div
                                class="grid min-[1000px]:grid-cols-2  col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                                <div class="w-full">
                                    <label for="application_date"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of
                                        Filling<span class="text-red-600">*</span></label>
                                    <input type="date" wire:model="application_date"
                                        class="bg-gray-50 border w-auto border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required disabled>
                                </div>
                            </div>
                            {{-- Information field --}}
                            <div
                                class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <h2><b>Information</b></h2>
                                <div
                                    class="col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                    <div class="grid grid-cols-1 min-[1000px]:grid-cols-3 gap-4 col-span-3 pb-4">
                                        <div class="w-full ">
                                            <label for="firstname"
                                                class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">First
                                                name <span class="text-red-600">*</span></label>
                                            <input type="text" name="firstname" id="firstname"
                                                value="{{ $first_name }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="First name" required="" disabled>
                                        </div>
                                        <div class="w-full ">
                                            <label for="middlename"
                                                class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Middle
                                                name <span class="text-red-600">*</span></label>
                                            <input type="text" name="middlename" id="middlename"
                                                value="{{ $middle_name }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Middle name" required="" disabled>
                                        </div>
                                        <div class="w-full">
                                            <label for="lastname"
                                                class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Last
                                                name <span class="text-red-600">*</span></label>
                                            <input type="text" name="lastname" id="lastname"
                                                value="{{ $last_name }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Last name" required="" disabled>
                                        </div>
                                        <div class="w-full">
                                            <label for="department_name"
                                                class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Department
                                                Name <span class="text-red-600">*</span></label>
                                            <input type="text" name="department_name" id="department_name"
                                                value="{{ $department_name }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required="" disabled>
                                        </div>
                                        <div class="w-full">
                                            <label for="employee_type"
                                                class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Employee
                                                ID <span class="text-red-600">*</span></label>
                                            <input type="text" name="employee_type" id="employee_type"
                                                value="{{ $employee_type }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required="" disabled>
                                        </div>
                                        <div class="w-full">
                                            <label for="current_position"
                                                class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Employee
                                                ID <span class="text-red-600">*</span></label>
                                            <input type="text" name="current_position" id="current_position"
                                                value="{{ $current_position }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                 required="" disabled>
                                        </div>
                                    </div>

                                </div>

                                {{-- Date Of Filling --}}
                                <div
                                    class="grid grid-cols-1 w-full col-span-3 gap-4 min-[1000px]:grid-cols-2 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                    {{-- <h2><b>Date of Filling</b></h2> --}}

                                    <div
                                        class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                                        <h2><b>Period Covered</b></h2>
                                        <div class="grid grid-cols-1  gap-4 pt-5">
                                            <div class="w-full">
                                                <label for="start_period_cover"
                                                    class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white ">Start
                                                    Period <span class="text-red-600">*</span></label>
                                                <input type="date" name="start_period_cover"
                                                    id="start_period_cover" wire:model.live="start_period_cover"
                                                    value="{{ $date }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="">
                                                {{-- @error('start_period') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror  --}}
                                                @error('start_period_cover')
                                                    <div class="transition transform alert alert-danger"
                                                        x-init="$el.closest('form').scrollIntoView()">
                                                        <span
                                                            class="text-red-500 text-xs xl:whitespace-nowrap">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="w-full">
                                                <label for="end_period_cover"
                                                    class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white">End
                                                    Period <span class="text-red-600">*</span></label>
                                                <input type="date" name="end_period_cover" id="end_period_cover"
                                                    wire:model.live="end_period_cover" value="{{ $date }}"
                                                    min="{{ \Carbon\Carbon::now()->addDays($start_period_cover)->format('Y-m-d\TH:i') }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="">
                                                @error('end_period_cover')
                                                    <div class="transition transform alert alert-danger text-sm "
                                                        x-init="$el.closest('form').scrollIntoView()">
                                                        <span
                                                            class="text-red-500 text-xs xl:whitespace-nowrap">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                                        <h2><b>Study Permit Description</b></h2>
                                        <div>
                                            <label for="degree_prog_and_school"
                                                class="block mb-2 pt-4 text-sm font-medium  text-gray-900 dark:text-white">Indicate
                                                the degree program and school where employee intends to enroll. (Please
                                                indicate address and contact numbers if outside the University.) <span
                                                    class="text-red-600">*</span></label>
                                            <textarea type="text" rows="4" id="degree_prog_and_school" name="degree_prog_and_school"
                                                wire:model="degree_prog_and_school" placeholder="If chosen others, write the type of leave. Otherwise, Ignore"
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </textarea>
                                            @error('degree_prog_and_school')   
                                                <div class="transition transform alert alert-danger text-sm "
                                                x-init="$el.closest('form').scrollIntoView()">
                                                <span class="text-red-500 text-xs xl:whitespace-nowrap">{{ $message }}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- Subject Load --}}
                            <div
                                class="grid grid-cols-1 col-span-3 p-6 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <h2><b>Subject Load</b></h2>
                                @php
                                    $ctr = 0;
                                @endphp
                                @foreach ($subjectLoad as $index => $load)
                                    <div
                                        class="grid grid-cols-5 col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                        <div class="col-span-5">
                                            <ul class="text-sm font-medium text-right text-gray-500 border border-gray-300 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                                                <li class="float-left mt-4 ml-5 float-bold text-gray-900 font-bold">
                                                    <span>No. {{$ctr+ 1 }}</span>
                                                </li>
                                                <li class="">
                                                    <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true"
                                                    type="button" name="add" wire:click.prevent="removeSubjectLoad({{$index}})" wire:confirm="Are you sure you want to delete this?"
                                                    class="inline-block p-4 text-red-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-red-500">
                                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round"  stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="grid grid-cols-1 min-[1000px]:grid-cols-2 col-span-5 ">
                                            <div
                                                class="grid grid-cols-1 min-[1404px]:grid-cols-2 p-6 gap-4 bg-white border border-gray-200  shadow  dark:bg-gray-800 dark:border-gray-700">
                                                <div class="mt-5">
                                                    <label for="subjectLoad_{{ $index }}_subject"
                                                        class="block mb-2 text-sm whitespace-nowrap font-medium text-gray-900 dark:text-white">Subject
                                                        <span class="text-red-600">*</span></label>
                                                    <input type="text" rows="4"
                                                        id="subjectLoad_{{ $index }}_subject"
                                                        name="subjectLoad[{{ $index }}][subject]"
                                                        wire:model.blur="subjectLoad.{{ $index }}.subject"
                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
                                                    @error('subjectLoad.' . $index . '.subject')   
                                                        <div class="transition transform alert alert-danger text-sm"
                                                                x-data x-init="document.getElementById('subjectLoad_{{$index}}_subject').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('subjectLoad_{{$index}}_subject').focus();">
                                                            <span class="text-red-500 text-xs "> {{$message}}</span>
                                                        </div> 
                                                    @enderror
                                                </div>
                                                <div>
                                                    <label
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Days<span
                                                            class="text-red-600">*</span> (Hold Ctrl + Click for
                                                        multiple Select)</label>
                                                    <select multiple size="1"
                                                        id="subjectLoad_{{ $index }}_days"
                                                        name="subjectLoad[{{ $index }}][days]"
                                                        wire:model.blur="subjectLoad.{{ $index }}.days"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option value="Sunday">Sunday</option>
                                                        <option value="Monday">Monday</option>
                                                        <option value="Tuesday">Tuesday</option>
                                                        <option value="Wednesday">Wednesday</option>
                                                        <option value="Thursday">Thursday</option>
                                                        <option value="Friday">Friday</option>
                                                        <option value="Saturday">Saturday</option>
                                                    </select>
                                                    @error('subjectLoad.' . $index . '.days')   
                                                        <div class="transition transform alert alert-danger text-sm"
                                                            x-data x-init="document.getElementById('subjectLoad_{{$index}}_days').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('subjectLoad_{{$index}}_days').focus();" >
                                                                <span class="text-red-500 text-xs" > {{$message}}</span>
                                                        </div> 
                                                    @enderror
                                                </div>
                                            </div>
                                            <div
                                                class="grid grid-cols-1 min-[1404px]:grid-cols-3 p-6 gap-4  bg-white border border-gray-200  shadow  dark:bg-gray-800 dark:border-gray-700">
                                                <div class="mt-5">
                                                    <label for="subjectLoad_{{ $index }}_start_time"
                                                        class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white ">Start
                                                        Period <span class="text-red-600">*</span></label>
                                                    <input type="time"
                                                        id="subjectLoad_{{ $index }}_start_time"
                                                        name="subjectLoad[{{ $index }}][start_time]"
                                                        wire:model="subjectLoad.{{ $index }}.start_time"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        required="">
                                                    @error('subjectLoad.' . $index . '.start_time')
                                                        <div class="transition transform alert alert-danger text-sm"
                                                        x-data x-init="document.getElementById('subjectLoad_{{$index}}_start_time').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('subjectLoad_{{$index}}_start_time').focus();" >
                                                            <span class=    "text-red-500 text-xs" > {{$message}}</span>
                                                        </div> 
                                                    @enderror       
                                                </div>
                                                {{-- @php
                                                    dd($subjectLoad);
                                                @endphp --}}
                                                <div class="mt-5">
                                                    <label for="subjectLoad_{{ $index }}_end_time"
                                                        class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white">End
                                                        Period <span class="text-red-600">*</span></label>
                                                    <input type="time"
                                                        id="subjectLoad_{{ $index }}_end_time"
                                                        name="subjectLoad[{{ $index }}][end_time]"
                                                        wire:model.live="subjectLoad.{{ $index }}.end_time"
                                                        {{-- value="{{ $date }}" --}}
                                                        min="{{ \Carbon\Carbon::now()->addDays()->format('Y-m-d\TH:i') }}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        required="">
                                                    @error('subjectLoad.' . $index . '.end_time')   
                                                        <div class="transition transform alert alert-danger text-sm"
                                                        x-data x-init="document.getElementById('subjectLoad_{{$index}}_end_time').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('subjectLoad_{{$index}}_end_time').focus();" >
                                                            <span class="text-red-500 text-xs" > {{$message}}</span>
                                                        </div> 
                                                    @enderror
                                                </div>
                                                <div class="mt-5">
                                                    <label for="subjectLoad_{{ $index }}_number_of_units"
                                                        class="block mb-2 text-sm whitespace-nowrap font-medium text-gray-900 dark:text-white">Subject
                                                        <span class="text-red-600">*</span></label>
                                                    <input type="text" rows="4"
                                                        id="subjectLoad_{{ $index }}_number_of_units"
                                                        name="subjectLoad[{{ $index }}][number_of_units]"
                                                        wire:model.blur="subjectLoad.{{ $index }}.number_of_units"
                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
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
                                    @php
                                        $ctr += 1;
                                    @endphp
                                @endforeach
                                <div class="flex justify-center">
                                    <button type="button" name="add" wire:click.prevent="addSubjectLoad"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
                                        Subject Load</button>
                                </div>
                                <div
                                    class="grid grid-cols-1 min-[740px]:grid-cols-2 col-span-3 p-6 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                    <div class="w-full">
                                        <label for="available_units"
                                                class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Available Units </label>
                                        <input type="number" name="available_units" id="available_units" wire:model="study_available_units"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="0" required="" disabled>
                                        @error('study_available_units')
                                            <div class="transition transform alert alert-danger text-sm"
                                            x-data x-init="document.getElementById('study_available_units').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('study_available_units').focus();" >
                                                <span class=    "text-red-500 text-xs" > {{$message}}</span>
                                            </div> 
                                        @enderror
                                    </div>
                                    <div class="w-full">
                                        <label for="units_enrolled"
                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Units Enrolled </label>
                                        <input type="text" name="units_enrolled" id="units_enrolled"  value={{$units_enrolled ?? 0}}
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Last name" required="" disabled>
                                        @error('units_enrolled')
                                            <div class="transition transform alert alert-danger text-sm"
                                            x-data x-init="document.getElementById('units_enrolled').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('units_enrolled').focus();" >
                                                <span class=    "text-red-500 text-xs" > {{$message}}</span>
                                            </div> 
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Total Teaching Aggregate load --}}
                            <div
                                class="grid grid-cols-1 col-span-3 p-6 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <h2><b>Total Teaching/Aggregate Load</b></h2>
                                <div class="grid grid-cols-1 min-[1000px]:grid-cols-2 gap-4">
                                    <div
                                        class="grid grid-cols-1 gap-4 p-6  bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                        <div class=" ">
                                            <div class="w-full">
                                                <label for="total_teaching_load"
                                                    class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">Total
                                                    Teaching Load (for faculty only) <span
                                                        class="text-red-600">*</span></label>
                                                <input type="text" name="total_teaching_load"
                                                    id="total_teaching_load" wire:model.blur="total_teaching_load"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="">
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="w-full">
                                                <label for="total_aggregate_load"
                                                    class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">Total
                                                    Aggregate Load (including ETUs) <span
                                                        class="text-red-600">*</span></label>
                                                <input type="text" name="total_aggregate_load"
                                                    id="total_aggregate_load" wire:model.blur="total_aggregate_load"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="">
                                            </div>
                                        </div>

                                    </div>
                                    <div
                                        class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                        <label for="dropzone-file2"
                                            class="block text-xs font-medium text-gray-900 dark:text-white">I hereby
                                            abide by the applicable rules and regulations on study/educational
                                            priviliges.
                                            I also certify in my honor to the correctness and completeness of the
                                            information provided herein.* <span class="text-red-600">*</span></label>

                                        <div id="applicant_signature_container" class="grid grid-cols-1 items-center justify-center w-full">
                                            @if ($applicant_signature)
                                                <label for="applicant_signature"
                                                    class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    @if (is_string($applicant_signature) == true)
                                                        @php
                                                            $applicant_signature = $this->getImage(
                                                                'applicant_signature',
                                                            );
                                                        @endphp
                                                        <img src="data:image/gif;base64,{{ base64_encode($applicant_signature) }}"
                                                            alt="Image Description"
                                                            class="w-full h-full object-contain">
                                                    @else
                                                        <img src="{{ $applicant_signature->temporaryUrl() }}"
                                                            class="w-full h-full object-contain" alt="Uploaded Image">
                                                    @endif
                                                    <input id="applicant_signature" type="file" class="hidden"
                                                        wire:model.live="applicant_signature">
                                                    <button type="button" wire:click="removeImage('applicant_signature')" class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                </label>
                                            @else
                                                <label for="dropzone-file2"
                                                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
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
                                                    <input id="dropzone-file2" type="file" class="hidden"
                                                        wire:model.blur="applicant_signature" />
                                                </label>
                                            @endif
                                            @error('applicant_signature')
                                                <div class="transition transform alert alert-danger text-sm mb-1"
                                                    x-data x-init="document.getElementById('applicant_signature_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('applicant_signature_container').focus();">
                                                    <span   span class="text-red-500 text-xs "> {{$message}}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>


                            {{-- Submit Documents --}}
                            <div
                                class="grid grid-cols-1 col-span-3 p-6 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <h2><b>Submit Documents</b></h2>
                                <div class="grid grid-cols-1 gap-4">
                                    {{-- 1st Row --}}
                                    <div class="grid grid-cols-1 items-start min-[800px]:grid-cols-2 gap-4">
                                        {{-- 1 --}}
                                        <div id="cover_memo_container"
                                            class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                            <label for="cover_memo"
                                                class="block text-sm font-medium text-gray-900 dark:text-white">1.
                                                Cover Memo<span class="text-red-600">*</span></label>
                                            <div class="grid grid-cols-1   w-full">
                                                @if ($cover_memo)
                                                    @foreach ($cover_memo as $index => $item)
                                                    @php
                                                        $insideIndex = 0;
                                                    @endphp
                                                    @if(is_string($item) == true)
                                                        <div>
                                                            <label for="cover_memo_{{ $index }}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                @php
                                                                    $image = $this->getArrayImage('cover_memo', $index);
                                                                @endphp
                                                                <button type="button"
                                                                    wire:click="removeArrayImage({{ $index }}, 'cover_memo')"
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
                                                                <input id="cover_memo_{{ $index }}" type="file" class="hidden"
                                                                    wire:model="cover_memo.{{ $index }}" multiple>
                                                            </label>
                                                        </div>
                                                    @else
                                                        @foreach ($item as $insideIndex => $file)
                                                            @if (is_array($file))
                                                                <label for="cover_memo_{{ $index }}.{{$insideIndex}}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                        <img src="{{ $file[$insideIndex]->temporaryUrl() }}"
                                                                            class="w-full h-full object-contain p-1 "
                                                                            alt="Uploaded Image">
                                                                        <button type="button"
                                                                            wire:click="removeArrayImage({{ $index }}, 'cover_memo', {{$insideIndex}})"
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
                                                                        <input id="cover_memo_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                                            wire:model="cover_memo.{{ $index }}.{{$insideIndex}}" multiple>
                                                                </label>
                                                            @else
                                                                <label for="cover_memo_{{ $index }}.{{$insideIndex}}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                        <img src="{{ $file->temporaryUrl() }}"
                                                                            class="w-full h-full object-contain p-1"
                                                                            alt="Uploaded Image">
                                                                        <button type="button"
                                                                            wire:click="removeArrayImage({{ $index }}, 'cover_memo', {{$insideIndex}})"
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
                                                                        <input id="cover_memo_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                                            wire:model="cover_memo.{{ $index }}.{{$insideIndex}}">
                                                                </label>
                                                            @endif
                                                            @error('cover_memo.' . $index .  '.' .  $insideIndex)
                                                            <div class="transition transform alert alert-danger text-sm mb-1"
                                                                    x-data x-init="document.getElementById('cover_memo_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('cover_memo_container').focus();">
                                                                <span class="text-red-500 text-xs "> {{$message}}</span>
                                                            </div> 
                                                        @enderror
                                                        @endforeach
                                                    @endif
                                                        @php
                                                            $indexRequestLetter = $index;
                                                        @endphp
                                                    @error('cover_memo.' . $index - $insideIndex)
                                                        <div class="transition transform alert alert-danger text-sm mb-1"
                                                                x-data x-init="document.getElementById('cover_memo_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('cover_memo_container').focus();">
                                                            <span class="text-red-500 text-xs "> {{$message}}</span>
                                                        </div> 
                                                    @enderror
                                                    @endforeach
                                                    <label for="cover_memo_{{ $indexRequestLetter + 1 }}"
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
                                                    <input id="cover_memo_{{ $indexRequestLetter + 1 }}" type="file" class="hidden"
                                                                    wire:model="cover_memo.{{ $indexRequestLetter + 1 }}" multiple>
                                                @else
                                                    <label for="cover_memo"
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
                                                            <input id="cover_memo" type="file" class="hidden"
                                                            wire:model.blur="cover_memo.0" multiple>
                                                    </label>
                                                @endif
                                                @error('cover_memo')
                                                <div class="transition transform alert alert-danger text-sm mb-1 mt-2" x-data
                                                    x-init="document.getElementById('cover_memo_container').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                                    document.getElementById('cover_memo_container').focus();">
                                                    <span class="text-red-500 text-xs "> {{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- 2 --}}
                                        <div id="request_letter_container"
                                            class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                            <label for="request_letter"
                                                class="block text-sm font-medium text-gray-900 dark:text-white">2. Request Letter<span class="text-red-600">*</span></label>
                                            <div class="grid grid-cols-1   w-full">
                                                @if ($request_letter)
                                                    @foreach ($request_letter as $index => $item)
                                                    @php
                                                        $insideIndex = 0;
                                                    @endphp
                                                    @if(is_string($item) == true)
                                                        <div>
                                                            <label for="request_letter_{{ $index }}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                @php
                                                                    $image = $this->getArrayImage('request_letter', $index);
                                                                @endphp
                                                                <button type="button"
                                                                    wire:click="removeArrayImage({{ $index }}, 'request_letter')"
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
                                                                <input id="request_letter_{{ $index }}" type="file" class="hidden"
                                                                    wire:model="request_letter.{{ $index }}" multiple>
                                                            </label>
                                                        </div>
                                                    @else
                                                        @foreach ($item as $insideIndex => $file)
                                                            @if (is_array($file))
                                                                <label for="request_letter_{{ $index }}.{{$insideIndex}}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                        <img src="{{ $file[$insideIndex]->temporaryUrl() }}"
                                                                            class="w-full h-full object-contain text-center p-1"
                                                                            alt="Uploaded Image">
                                                                        <button type="button"
                                                                            wire:click="removeArrayImage({{ $index }}, 'request_letter', {{$insideIndex}})"
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
                                                                        <input id="request_letter_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                                            wire:model="request_letter.{{ $index }}.{{$insideIndex}}" multiple>
                                                                </label>
                                                            @else
                                                                <label for="request_letter_{{ $index }}.{{$insideIndex}}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                        <img src="{{ $file->temporaryUrl() }}"
                                                                            class="w-full h-full object-contain p-1"
                                                                            alt="Uploaded Image">
                                                                        <button type="button"
                                                                            wire:click="removeArrayImage({{ $index }}, 'request_letter', {{$insideIndex}})"
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
                                                                        <input id="request_letter_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                                            wire:model="request_letter.{{ $index }}.{{$insideIndex}}">
                                                                </label>
                                                            @endif
                                                            @error('request_letter.' . $index .  '.' .  $insideIndex)
                                                                <div class="transition transform alert alert-danger text-sm mb-1"
                                                                        x-data x-init="document.getElementById('request_letter_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_letter_container').focus();">
                                                                    <span class="text-red-500 text-xs "> {{$message}}</span>
                                                                </div> 
                                                            @enderror
                                                        @endforeach
                                                    @endif
                                                        @php
                                                            $indexRequestLetter = $index;
                                                        @endphp
                                                         @error('request_letter.' . $index - $insideIndex)
                                                            <div class="transition transform alert alert-danger text-sm mb-1"
                                                                    x-data x-init="document.getElementById('request_letter_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_letter_container').focus();">
                                                                <span class="text-red-500 text-xs "> {{$message}}</span>
                                                            </div> 
                                                        @enderror
                                                    @endforeach
                                                    <label for="request_letter_{{ $indexRequestLetter + 1 }}"
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
                                                    <input id="request_letter_{{ $indexRequestLetter + 1 }}" type="file" class="hidden"
                                                                    wire:model="request_letter.{{ $indexRequestLetter + 1 }}" multiple>
                                                @else
                                                    <label for="request_letter"
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
                                                            <input id="request_letter" type="file" class="hidden"
                                                            wire:model.blur="request_letter.0" multiple>
                                                    </label>                                                   
                                                @endif
                                                @error('request_letter')
                                                    <div class="transition transform alert alert-danger text-sm" x-data
                                                        x-init="document.getElementById('request_letter_container').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                                        document.getElementById('request_letter_container').focus();">
                                                        <span class="text-red-500 text-xs "> {{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- 2nd Row --}}
                                    <div class="grid grid-cols-1 items-start min-[800px]:grid-cols-2 gap-4">
                                        {{-- 3 --}}
                                        <div id="rated_ipcr_container"
                                            class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                            <label for="rated_ipcr"
                                                class="block text-sm font-medium text-gray-900 dark:text-white">3. Rated IPCR (last 2 rating periods)<span class="text-red-600">*</span></label>
                                            <div class="grid grid-cols-1   w-full">
                                                @if ($rated_ipcr)
                                                    @foreach ($rated_ipcr as $index => $item)
                                                    @php
                                                        $insideIndex = 0;
                                                    @endphp
                                                    @if(is_string($item) == true)
                                                        <div>
                                                            <label for="rated_ipcr_{{ $index }}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                @php
                                                                    $image = $this->getArrayImage('rated_ipcr', $index);
                                                                @endphp
                                                                <button type="button"
                                                                    wire:click="removeArrayImage({{ $index }}, 'rated_ipcr')"
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
                                                                <input id="rated_ipcr_{{ $index }}" type="file" class="hidden"
                                                                    wire:model="rated_ipcr.{{ $index }}" multiple>
                                                            </label>
                                                        </div>
                                                    @else
                                                        @foreach ($item as $insideIndex => $file)
                                                            @if (is_array($file))
                                                                <label for="rated_ipcr_{{ $index }}.{{$insideIndex}}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                        <img src="{{ $file[$insideIndex]->temporaryUrl() }}"
                                                                            class="w-full h-full object-contain text-center p-1"
                                                                            alt="Uploaded Image">
                                                                        <button type="button"
                                                                            wire:click="removeArrayImage({{ $index }}, 'rated_ipcr', {{$insideIndex}})"
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
                                                                        <input id="rated_ipcr_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                                            wire:model="rated_ipcr.{{ $index }}.{{$insideIndex}}" multiple>
                                                                </label>
                                                            @else
                                                                <label for="rated_ipcr_{{ $index }}.{{$insideIndex}}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                        <img src="{{ $file->temporaryUrl() }}"
                                                                            class="w-full h-full object-contain p-1"
                                                                            alt="Uploaded Image">
                                                                        <button type="button"
                                                                            wire:click="removeArrayImage({{ $index }}, 'rated_ipcr', {{$insideIndex}})"
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
                                                                        <input id="rated_ipcr_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                                            wire:model="rated_ipcr.{{ $index }}.{{$insideIndex}}">
                                                                </label>
                                                            @endif
                                                            @error('rated_ipcr.' . $index .  '.' .  $insideIndex)
                                                                <div class="transition transform alert alert-danger text-sm mb-1"
                                                                        x-data x-init="document.getElementById('rated_ipcr_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('rated_ipcrr_container').focus();">
                                                                    <span class="text-red-500 text-xs "> {{$message}}</span>
                                                                </div> 
                                                            @enderror
                                                        @endforeach
                                                    @endif
                                                        @php
                                                            $indexRequestLetter = $index;
                                                        @endphp
                                                        @error('rated_ipcr.' . $index - $insideIndex)
                                                            <div class="transition transform alert alert-danger text-sm mb-1"
                                                                    x-data x-init="document.getElementById('rated_ipcr_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('rated_ipcr_container').focus();">
                                                                <span class="text-red-500 text-xs "> {{$message}}</span>
                                                            </div> 
                                                        @enderror
                                                    @endforeach
                                                    <label for="rated_ipcr_{{ $indexRequestLetter + 1 }}"
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
                                                    <input id="rated_ipcr_{{ $indexRequestLetter + 1 }}" type="file" class="hidden"
                                                                    wire:model="rated_ipcr.{{ $indexRequestLetter + 1 }}" multiple>
                                                @else
                                                    <label for="rated_ipcr"
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
                                                            <input id="rated_ipcr" type="file" class="hidden"
                                                            wire:model.blur="rated_ipcr.0" multiple>
                                                    </label>                                                   
                                                @endif
                                                @error('rated_ipcr')
                                                    <div class="transition transform alert alert-danger text-sm mb-1" x-data
                                                        x-init="document.getElementById('rated_ipcr_container').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                                        document.getElementById('rated_ipcr_container').focus();">
                                                        <span class="text-red-500 text-xs "> {{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        {{-- 4 --}}
                                        <div id="summary_of_schedule_container"
                                            class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                            <label for="summary_of_schedule"
                                                class="block text-sm font-medium text-gray-900 dark:text-white">4. Summary Of Schedule (c/o HR)<span class="text-red-600">*</span></label>
                                            <div class="grid grid-cols-1   w-full">
                                                @if ($summary_of_schedule)
                                                    @foreach ($summary_of_schedule as $index => $item)
                                                    @php
                                                        $insideIndex = 0;
                                                    @endphp
                                                    @if(is_string($item) == true)
                                                        <div>
                                                            <label for="summary_of_schedule_{{ $index }}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                @php
                                                                    $image = $this->getArrayImage('summary_of_schedule', $index);
                                                                @endphp
                                                                <button type="button"
                                                                    wire:click="removeArrayImage({{ $index }}, 'summary_of_schedule')"
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
                                                                <input id="summary_of_schedule_{{ $index }}" type="file" class="hidden"
                                                                    wire:model="summary_of_schedule.{{ $index }}" multiple>
                                                            </label>
                                                        </div>
                                                    @else
                                                        @foreach ($item as $insideIndex => $file)
                                                            @if (is_array($file))
                                                                <label for="summary_of_schedule_{{ $index }}.{{$insideIndex}}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                        <img src="{{ $file[$insideIndex]->temporaryUrl() }}"
                                                                            class="w-full h-full object-contain text-center p-1"
                                                                            alt="Uploaded Image">
                                                                        <button type="button"
                                                                            wire:click="removeArrayImage({{ $index }}, 'summary_of_schedule', {{$insideIndex}})"
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
                                                                        <input id="summary_of_schedule_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                                            wire:model="summary_of_schedule.{{ $index }}.{{$insideIndex}}" multiple>
                                                                </label>
                                                            @else
                                                                <label for="summary_of_schedule_{{ $index }}.{{$insideIndex}}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                        <img src="{{ $file->temporaryUrl() }}"
                                                                            class="w-full h-full object-contain p-1"
                                                                            alt="Uploaded Image">
                                                                        <button type="button"
                                                                            wire:click="removeArrayImage({{ $index }}, 'summary_of_schedule', {{$insideIndex}})"
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
                                                                        <input id="summary_of_schedule_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                                            wire:model="summary_of_schedule.{{ $index }}.{{$insideIndex}}">
                                                                </label>
                                                            @endif
                                                            @error('summary_of_schedule.' . $index .  '.' .  $insideIndex)
                                                                <div class="transition transform alert alert-danger text-sm mb-1"
                                                                        x-data x-init="document.getElementById('summary_of_schedule_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('summary_of_schedule_container').focus();">
                                                                    <span class="text-red-500 text-xs "> {{$message}}</span>
                                                                </div> 
                                                            @enderror
                                                        @endforeach
                                                    @endif
                                                        @php
                                                            $indexRequestLetter = $index;
                                                        @endphp
                                                        @error('summary_of_schedule.' . $index - $insideIndex)
                                                            <div class="transition transform alert alert-danger text-sm mb-1"
                                                                    x-data x-init="document.getElementById('summary_of_schedule_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('summary_of_schedule_container').focus();">
                                                                <span class="text-red-500 text-xs "> {{$message}}</span>
                                                            </div> 
                                                        @enderror
                                                    @endforeach
                                                    <label for="summary_of_schedule_{{ $indexRequestLetter + 1 }}"
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
                                                    <input id="summary_of_schedule_{{ $indexRequestLetter + 1 }}" type="file" class="hidden"
                                                                    wire:model="summary_of_schedule.{{ $indexRequestLetter + 1 }}" multiple>
                                                @else
                                                    <label for="summary_of_schedule"
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
                                                            <input id="summary_of_schedule" type="file" class="hidden"
                                                            wire:model.blur="summary_of_schedule.0" multiple>
                                                    </label>                                                   
                                                @endif
                                                @error('summary_of_schedule')
                                                    <div class="transition transform alert alert-danger text-sm mb-1" x-data
                                                        x-init="document.getElementById('summary_of_schedule_container').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                                        document.getElementById('summary_of_schedule_container').focus();">
                                                        <span class="text-red-500 text-xs "> {{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- 3rd Row --}}
                                    <div class="grid grid-cols-1 items-start min-[800px]:grid-cols-2 gap-4">
                                        {{-- 5 --}}
                                        <div id="certif_of_grades_container"
                                            class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                            <label for="certif_of_grades"
                                                class="block text-sm font-medium text-gray-900 dark:text-white">5. Certification of Grades (With Scholarship only)<span class="text-red-600">*</span></label>
                                            <div class="grid grid-cols-1   w-full">
                                                @if ($certif_of_grades)
                                                    @foreach ($certif_of_grades as $index => $item)
                                                    @php
                                                        $insideIndex = 0;
                                                    @endphp
                                                    @if(is_string($item) == true)
                                                        <div>
                                                            <label for="certif_of_grades_{{ $index }}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                @php
                                                                    $image = $this->getArrayImage('certif_of_grades', $index);
                                                                @endphp
                                                                <button type="button"
                                                                    wire:click="removeArrayImage({{ $index }}, 'certif_of_grades')"
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
                                                                <input id="certif_of_grades_{{ $index }}" type="file" class="hidden"
                                                                    wire:model="certif_of_grades.{{ $index }}" multiple>
                                                            </label>
                                                        </div>
                                                    @else
                                                        @foreach ($item as $insideIndex => $file)
                                                            @if (is_array($file))
                                                                <label for="certif_of_grades_{{ $index }}.{{$insideIndex}}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                        <img src="{{ $file[$insideIndex]->temporaryUrl() }}"
                                                                            class="w-full h-full object-contain text-center p-1"
                                                                            alt="Uploaded Image">
                                                                        <button type="button"
                                                                            wire:click="removeArrayImage({{ $index }}, 'certif_of_grades', {{$insideIndex}})"
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
                                                                        <input id="certif_of_grades_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                                            wire:model="certif_of_grades.{{ $index }}.{{$insideIndex}}" multiple>
                                                                </label>
                                                            @else
                                                                <label for="certif_of_grades_{{ $index }}.{{$insideIndex}}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                        <img src="{{ $file->temporaryUrl() }}"
                                                                            class="w-full h-full object-contain p-1"
                                                                            alt="Uploaded Image">
                                                                        <button type="button"
                                                                            wire:click="removeArrayImage({{ $index }}, 'certif_of_grades', {{$insideIndex}})"
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
                                                                        <input id="certif_of_grades_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                                            wire:model="certif_of_grades.{{ $index }}.{{$insideIndex}}">
                                                                </label>
                                                            @endif
                                                            @error('certif_of_grades.' . $index .  '.' .  $insideIndex)
                                                                <div class="transition transform alert alert-danger text-sm mb-1"
                                                                        x-data x-init="document.getElementById('certif_of_grades_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('certif_of_grades_container').focus();">
                                                                    <span class="text-red-500 text-xs "> {{$message}}</span>
                                                                </div> 
                                                            @enderror
                                                        @endforeach
                                                    @endif
                                                        @php
                                                            $indexRequestLetter = $index;
                                                        @endphp
                                                        @error('certif_of_grades.' . $index - $insideIndex)
                                                            <div class="transition transform alert alert-danger text-sm mb-1"
                                                                    x-data x-init="document.getElementById('certif_of_grades_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('certif_of_grades_container').focus();">
                                                                <span class="text-red-500 text-xs "> {{$message}}</span>
                                                            </div> 
                                                        @enderror
                                                    @endforeach
                                                    <label for="certif_of_grades_{{ $indexRequestLetter + 1 }}"
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
                                                    <input id="certif_of_grades_{{ $indexRequestLetter + 1 }}" type="file" class="hidden"
                                                                    wire:model="certif_of_grades.{{ $indexRequestLetter + 1 }}" multiple>
                                                @else
                                                    <label for="certif_of_grades"
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
                                                            <input id="certif_of_grades" type="file" class="hidden"
                                                            wire:model.blur="certif_of_grades.0" multiple>
                                                    </label>                                                   
                                                @endif
                                                @error('certif_of_grades')
                                                    <div class="transition transform alert alert-danger text-sm" x-data
                                                        x-init="document.getElementById('certif_of_grades_container').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                                        document.getElementById('certif_of_grades_container').focus();">
                                                        <span class="text-red-500 text-xs "> {{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        {{-- 6 --}} 
                                        <div id="study_plan_container"
                                            class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                            <label for="study_plan"
                                                class="block text-sm font-medium text-gray-900 dark:text-white">6. Study Plan (Optional if Outside PLM)<span class="text-red-600">*</span></label>
                                            <div class="grid grid-cols-1   w-full">
                                                @if ($study_plan)
                                                    @foreach ($study_plan as $index => $item)
                                                    @php
                                                        $insideIndex = 0;
                                                    @endphp
                                                    @if(is_string($item) == true)
                                                        <div>
                                                            <label for="study_plan_{{ $index }}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                @php
                                                                    $image = $this->getArrayImage('study_plan', $index);
                                                                @endphp
                                                                <button type="button"
                                                                    wire:click="removeArrayImage({{ $index }}, 'study_plan')"
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
                                                                <input id="study_plan_{{ $index }}" type="file" class="hidden"
                                                                    wire:model="study_plan.{{ $index }}" multiple>
                                                            </label>
                                                        </div>
                                                    @else
                                                        @foreach ($item as $insideIndex => $file)
                                                            @if (is_array($file))
                                                                <label for="study_plan_{{ $index }}.{{$insideIndex}}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                        <img src="{{ $file[$insideIndex]->temporaryUrl() }}"
                                                                            class="w-full h-full object-contain text-center p-1"
                                                                            alt="Uploaded Image">
                                                                        <button type="button"
                                                                            wire:click="removeArrayImage({{ $index }}, 'study_plan', {{$insideIndex}})"
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
                                                                        <input id="study_plan_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                                            wire:model="study_plan.{{ $index }}.{{$insideIndex}}" multiple>
                                                                </label>
                                                            @else
                                                                <label for="study_plan_{{ $index }}.{{$insideIndex}}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                        <img src="{{ $file->temporaryUrl() }}"
                                                                            class="w-full h-full object-contain p-1"
                                                                            alt="Uploaded Image">
                                                                        <button type="button"
                                                                            wire:click="removeArrayImage({{ $index }}, 'study_plan', {{$insideIndex}})"
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
                                                                        <input id="study_plan_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                                            wire:model="study_plan.{{ $index }}.{{$insideIndex}}">
                                                                </label>
                                                            @endif
                                                            @error('study_plan.' . $index .  '.' .  $insideIndex)
                                                                <div class="transition transform alert alert-danger text-sm mb-1"
                                                                        x-data x-init="document.getElementById('study_plan_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('study_plan_container').focus();">
                                                                    <span class="text-red-500 text-xs "> {{$message}}</span>
                                                                </div> 
                                                            @enderror
                                                        @endforeach
                                                    @endif
                                                        @php
                                                            $indexRequestLetter = $index;
                                                        @endphp
                                                        @error('study_plan.' . $index - $insideIndex)
                                                            <div class="transition transform alert alert-danger text-sm mb-1"
                                                                    x-data x-init="document.getElementById('study_plan_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('study_plan_container').focus();">
                                                                <span class="text-red-500 text-xs "> {{$message}}</span>
                                                            </div> 
                                                        @enderror
                                                    @endforeach
                                                    <label for="study_plan_{{ $indexRequestLetter + 1 }}"
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
                                                    <input id="study_plan_{{ $indexRequestLetter + 1 }}" type="file" class="hidden"
                                                                    wire:model="study_plan.{{ $indexRequestLetter + 1 }}" multiple>
                                                @else
                                                    <label for="study_plan"
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
                                                            <input id="study_plan" type="file" class="hidden"
                                                            wire:model.blur="study_plan.0" multiple>
                                                    </label>                                                   
                                                @endif
                                                @error('study_plan')
                                                    <div class="transition transform alert alert-danger text-sm mb-1" x-data
                                                        x-init="document.getElementById('study_plan_container').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                                        document.getElementById('study_plan_container').focus();">
                                                        <span class="text-red-500 text-xs "> {{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- 4th Row --}}
                                    <div class="grid grid-cols-1 items-start min-[800px]:grid-cols-2 gap-4">
                                        {{-- 7 --}}
                                        <div id="student_faculty_eval_container"
                                            class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                            <label for="student_faculty_eval"
                                                class="block text-sm font-medium text-gray-900 dark:text-white">7. Student's Faculty Evaluation (For Faculty Members)<span class="text-red-600">*</span></label>
                                            <div class="grid grid-cols-1   w-full">
                                                @if ($student_faculty_eval)
                                                    @foreach ($student_faculty_eval as $index => $item)
                                                    @php
                                                        $insideIndex = 0;
                                                    @endphp
                                                    @if(is_string($item) == true)
                                                        <div>
                                                            <label for="student_faculty_eval_{{ $index }}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                @php
                                                                    $image = $this->getArrayImage('student_faculty_eval', $index);
                                                                @endphp
                                                                <button type="button"
                                                                    wire:click="removeArrayImage({{ $index }}, 'student_faculty_eval')"
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
                                                                <input id="student_faculty_eval_{{ $index }}" type="file" class="hidden"
                                                                    wire:model="student_faculty_eval.{{ $index }}" multiple>
                                                            </label>
                                                        </div>
                                                    @else
                                                        @foreach ($item as $insideIndex => $file)
                                                            @if (is_array($file))
                                                                <label for="student_faculty_eval_{{ $index }}.{{$insideIndex}}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                        <img src="{{ $file[$insideIndex]->temporaryUrl() }}"
                                                                            class="w-full h-full object-contain text-center p-1"
                                                                            alt="Uploaded Image">
                                                                        <button type="button"
                                                                            wire:click="removeArrayImage({{ $index }}, 'student_faculty_eval', {{$insideIndex}})"
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
                                                                        <input id="student_faculty_eval_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                                            wire:model="student_faculty_eval.{{ $index }}.{{$insideIndex}}" multiple>
                                                                </label>
                                                            @else
                                                                <label for="student_faculty_eval_{{ $index }}.{{$insideIndex}}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                        <img src="{{ $file->temporaryUrl() }}"
                                                                            class="w-full h-full object-contain p-1"
                                                                            alt="Uploaded Image">
                                                                        <button type="button"
                                                                            wire:click="removeArrayImage({{ $index }}, 'student_faculty_eval', {{$insideIndex}})"
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
                                                                        <input id="student_faculty_eval_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                                            wire:model="student_faculty_eval.{{ $index }}.{{$insideIndex}}">
                                                                </label>
                                                            @endif
                                                            @error('student_faculty_eval.' . $index .  '.' .  $insideIndex)
                                                                <div class="transition transform alert alert-danger text-sm mb-1"
                                                                        x-data x-init="document.getElementById('student_faculty_eval_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('student_faculty_eval_container').focus();">
                                                                    <span class="text-red-500 text-xs "> {{$message}}</span>
                                                                </div> 
                                                            @enderror
                                                        @endforeach
                                                    @endif
                                                        @php
                                                            $indexRequestLetter = $index;
                                                        @endphp
                                                        @error('student_faculty_eval.' . $index - $insideIndex)
                                                            <div class="transition transform alert alert-danger text-sm mb-1"
                                                                    x-data x-init="document.getElementById('student_faculty_eval_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('student_faculty_eval_container').focus();">
                                                                <span class="text-red-500 text-xs "> {{$message}}</span>
                                                            </div> 
                                                        @enderror
                                                    @endforeach
                                                    <label for="student_faculty_eval_{{ $indexRequestLetter + 1 }}"
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
                                                    <input id="student_faculty_eval_{{ $indexRequestLetter + 1 }}" type="file" class="hidden"
                                                                    wire:model="student_faculty_eval.{{ $indexRequestLetter + 1 }}" multiple>
                                                @else
                                                    <label for="student_faculty_eval"
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
                                                            <input id="student_faculty_eval" type="file" class="hidden"
                                                            wire:model.blur="student_faculty_eval.0" multiple>
                                                    </label>                                                   
                                                @endif
                                                @error('student_faculty_eval')
                                                    <div class="transition transform alert alert-danger text-sm mb-1" x-data
                                                        x-init="document.getElementById('student_faculty_eval_container').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                                        document.getElementById('student_faculty_eval_container').focus();">
                                                        <span class="text-red-500 text-xs "> {{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- 8 --}}
                                        <div id="teaching_assignment_container"
                                            class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                            <label for="teaching_assignment"
                                                class="block text-sm font-medium text-gray-900 dark:text-white">8. Teaching Assignment (For Faculty Members)<span class="text-red-600">*</span></label>
                                            <div class="grid grid-cols-1   w-full">
                                                @if ($teaching_assignment)
                                                    @foreach ($teaching_assignment as $index => $item)
                                                    @php
                                                        $insideIndex = 0;
                                                    @endphp
                                                    @if(is_string($item) == true)
                                                        <div>
                                                            <label for="teaching_assignment_{{ $index }}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                @php
                                                                    $image = $this->getArrayImage('teaching_assignment', $index);
                                                                @endphp
                                                                <button type="button"
                                                                    wire:click="removeArrayImage({{ $index }}, 'teaching_assignment')"
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
                                                                <input id="teaching_assignment_{{ $index }}" type="file" class="hidden"
                                                                    wire:model="teaching_assignment.{{ $index }}" multiple>
                                                            </label>
                                                        </div>
                                                    @else
                                                        @foreach ($item as $insideIndex => $file)
                                                            @if (is_array($file))
                                                                <label for="teaching_assignment_{{ $index }}.{{$insideIndex}}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                        <img src="{{ $file[$insideIndex]->temporaryUrl() }}"
                                                                            class="w-full h-full object-contain text-center p-1"
                                                                            alt="Uploaded Image">
                                                                        <button type="button"
                                                                            wire:click="removeArrayImage({{ $index }}, 'teaching_assignment', {{$insideIndex}})"
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
                                                                        <input id="teaching_assignment_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                                            wire:model="teaching_assignment.{{ $index }}.{{$insideIndex}}" multiple>
                                                                </label>
                                                            @else
                                                                <label for="teaching_assignment_{{ $index }}.{{$insideIndex}}"
                                                                class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                        <img src="{{ $file->temporaryUrl() }}"
                                                                            class="w-full h-full object-contain p-1"
                                                                            alt="Uploaded Image">
                                                                        <button type="button"
                                                                            wire:click="removeArrayImage({{ $index }}, 'teaching_assignment', {{$insideIndex}})"
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
                                                                        <input id="teaching_assignment_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                                            wire:model="teaching_assignment.{{ $index }}.{{$insideIndex}}">
                                                                </label>
                                                            @endif
                                                            @error('teaching_assignment.' . $index .  '.' .  $insideIndex)
                                                                <div class="transition transform alert alert-danger text-sm mb-1"
                                                                        x-data x-init="document.getElementById('teaching_assignment_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('teaching_assignment_container').focus();">
                                                                    <span class="text-red-500 text-xs "> {{$message}}</span>
                                                                </div> 
                                                            @enderror
                                                        @endforeach
                                                    @endif
                                                        @php
                                                            $indexRequestLetter = $index;
                                                        @endphp
                                                        @error('teaching_assignment.' . $index - $insideIndex)
                                                            <div class="transition transform alert alert-danger text-sm mb-1"
                                                                    x-data x-init="document.getElementById('teaching_assignment_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('teaching_assignment_container').focus();">
                                                                <span class="text-red-500 text-xs "> {{$message}}</span>
                                                            </div> 
                                                        @enderror
                                                    @endforeach
                                                    <label for="teaching_assignment_{{ $indexRequestLetter + 1 }}"
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
                                                    <input id="teaching_assignment_{{ $indexRequestLetter + 1 }}" type="file" class="hidden"
                                                                    wire:model="teaching_assignment.{{ $indexRequestLetter + 1 }}" multiple>
                                                @else
                                                    <label for="teaching_assignment"
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
                                                            <input id="teaching_assignment" type="file" class="hidden"
                                                            wire:model.blur="teaching_assignment.0" multiple>
                                                    </label>                                                   
                                                @endif
                                                @error('teaching_assignment')
                                                    <div class="transition transform alert alert-danger text-sm mb-1" x-data
                                                        x-init="document.getElementById('teaching_assignment_container').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                                        document.getElementById('teaching_assignment_container').focus();">
                                                        <span class="text-red-500 text-xs "> {{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            {{-- <div class="grid grid-cols-1 col-span-3 p-6 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <h2><b>Signed By:</b></h2>
                                <div class="grid grid-cols-1 min-[800px]:grid-cols-3 gap-4 p-4  bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                    <div class="w-full">
                                        <label for="recommended_date"
                                            class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white ">Recommended Date<span class="text-red-600">*</span></label>
                                        <input type="date" name="recommended_date" id="recommended_date"
                                            wire:model="date_recommended_by"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            required="">
                                        @error('date_recommended_by')
                                            <div class="transition transform alert alert-danger" x-init="$el.closest('form').scrollIntoView()">
                                                <span
                                                    class="text-red-500 text-xs xl:whitespace-nowrap">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="grid grid-cols-1 col-span-2  gap-4 ">
                                        <label for="signature_recommended_by"
                                            class="block text-sm font-medium text-gray-900 dark:text-white">Recommended
                                            By<span class="text-red-600">*</span></label>
                                        <div class="grid grid-cols-1 items-center justify-center w-full">
                                            @if ($signature_recommended_by)
                                                <label for="signature_recommended_by"
                                                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    @if (is_string($signature_recommended_by) == true)
                                                        @php
                                                            $signature_recommended_by = $this->getRecommendedSignature();
                                                        @endphp
                                                        <img src="data:image/gif;base64,{{ base64_encode($signature_recommended_by) }}"
                                                            alt="Image Description"
                                                            class="w-full h-full object-contain">
                                                    @else
                                                        <img src="{{ $signature_recommended_by->temporaryUrl() }}"
                                                            class="w-full h-full object-contain" alt="Uploaded Image">
                                                    @endif
                                                    <input id="signature_recommended_by" type="file"
                                                        class="hidden" wire:model.live="signature_recommended_by">
                                                </label>
                                            @else
                                                <label for="signature_recommended_by"
                                                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
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
                                                    <input id="signature_recommended_by" type="file"
                                                        class="hidden" wire:model.blur="signature_recommended_by">
                                                </label>
                                            @endif
                                            @error('signature_recommended_by')
                                                <div class="transition transform alert alert-danger"
                                                    x-init="$el.closest('form').scrollIntoView()">
                                                    <span
                                                        class="text-red-500 text-xs xl:whitespace-nowrap">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 min-[800px]:grid-cols-3 gap-4 p-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                                    <div class="w-full">
                                        <label for="date_endorsed_by"
                                            class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white ">Endorsed Date<span class="text-red-600">*</span></label>
                                        <input type="date" name="date_endorsed_by" id="date_endorsed_by"
                                            wire:model="date_endorsed_by"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            required="">
                                        @error('date_endorsed_by')
                                            <div class="transition transform alert alert-danger" x-init="$el.closest('form').scrollIntoView()">
                                                <span
                                                    class="text-red-500 text-xs xl:whitespace-nowrap">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div
                                        class="col-span-2 grid grid-cols-1  gap-4  ">
                                        <label for="signature_recommended_by"
                                            class="block text-sm font-medium text-gray-900 dark:text-white">Endorsed
                                            By<span class="text-red-600">*</span></label>
                                        <div class="grid grid-cols-1 items-center justify-center w-full">
                                            @if ($signature_endorsed_by)
                                                <div>
                                                    <label for="signature_endorsed_by"
                                                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    @if (is_string($signature_endorsed_by) == true)
                                                        @php
                                                            $signature_endorsed_by = $this->getEndorsedSignature();
                                                        @endphp
                                                        <img src="data:image/gif;base64,{{ base64_encode($signature_endorsed_by) }}"
                                                            alt="Image Description"
                                                            class="w-full h-full object-contain">
                                                    @else
                                                        <img src="{{ $signature_endorsed_by->temporaryUrl() }}"
                                                            class="w-full h-full object-contain" alt="Uploaded Image">
                                                    @endif
                                                    <input id="signature_endorsed_by" type="file" class="hidden"
                                                        wire:model.live="signature_endorsed_by">
                                                    </label>
                                                </div>
                                            @else
                                                <label for="signature_endorsed_by"
                                                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
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
                                                    <input id="signature_endorsed_by" type="file" class="hidden"
                                                        wire:model.blur="signature_endorsed_by">
                                                </label>
                                            @endif
                                            @error('signature_recommended_by')
                                                <div class="transition transform alert alert-danger"
                                                    x-init="$el.closest('form').scrollIntoView()">
                                                    <span
                                                        class="text-red-500 text-xs xl:whitespace-nowrap">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div> --}}



                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center float-right px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Submit Study Permit
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
