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
            <a href="{{route('ipcrtable')}}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">IPCR</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Create</span>
            </div>
        </li>
        </ol>
    </nav> 
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">Add a new IPCR</h2>
    <section class="bg-white dark:bg-gray-900 pb-24 px-8  rounded-lg">
        <div class=" px-1 mx-auto  py-8">
            <form wire:submit.prevent="submit" method="POST" action="$refresh">
                @csrf
                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    <div
                        class="block w-full col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                        <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
    
                            {{-- <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                    </div> --}}
                           <div  class="flex-wrap col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <h2><b>Name</b></h2>
                                <div class="w-full grid grid-cols-1 gap-4 md:grid-cols-3 col-span-3 pt-4">
                                        <div class="w-full ">
                                            <label for="brand"
                                                class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">First name <span class="text-red-600">*</span></label>
                                            <input type="text" name="firstname" id="firstname"  value="{{$employeeRecord[0]->first_name}}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="First name" required="" disabled>
                                        </div>
                                    <div class="w-full ">
                                        <label for="brand"
                                            class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Middle name <span class="text-red-600">*</span></label>
                                        <input type="text" name="middlename" id="middlename" value="{{$employeeRecord[0]->middle_name}}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Middle name" required="" disabled>
                                    </div>
                                    <div class="w-full">
                                        <label for="brand"
                                            class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Last name <span class="text-red-600">*</span></label>
                                        <input type="text" name="lastname" id="lastname"  value="{{$employeeRecord[0]->last_name}}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Last name" required="" disabled>
                                    </div>
                                </div>
                           </div>
                            {{-- <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 col-span-3">
                        <a href="#" class="block w-full  p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h2><b>Date of Filling</b></h2>
                            <div class="w-full">
                                <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start Date</label>
                                <input type="date" name="lastname" id="lastname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Last name" required="">
                            </div>
                            <div class="w-full">
                                <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End Date</label>
                                <input type="date" name="lastname" id="lastname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Last name" required="">
                            </div>
                          
                        </a>
                        <a href="#" class="block flex-wrap w-full   p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <div class="flex-none">
                                <h2><b>Period</b></h2>
                            </div>
                            <div class="w-full">
                                <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name</label>
                                <input type="date" name="lastname" id="lastname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Last name" required="">
                            </div>
                            <div class="w-full">
                                <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name</label>
                                <input type="date" name="lastname" id="lastname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Last name" required="">
                            </div>
                          
                        </a>
                    </div> --}}
                    {{-- Date Of Filling --}}
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 col-span-3">
                            <div class="block grid-row-2 w-full min-[0px]:col-span-2  lg:col-span-1  p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <h2><b>Date of Filling</b></h2>
                                <div class="w-full pb-4 pt-4">
                                    <label for="brand"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date<span class="text-red-600">*</span></label>
                                    <input type="date" wire:model.blur="date_of_filling" 
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Date of Filling" required disabled>
                                    @error('date_of_filling')
                                        <div class="transition transform alert alert-danger"
                                                x-init="$el.closest('form').scrollIntoView()">
                                            <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                        </div> 
                                    @enderror
                                    
                                </div>
                                <div class="w-full">
                                    <label for="brand"
                                        class="block mb-2 sm:col-span-2  text-sm font-medium text-gray-900 dark:text-white">Ratee <span class="text-red-600">*</span></label>
                                    <input type="text" name="ratee" id="ratee" wire:model.blur="ratee"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Ratee Name" required="" >
                                    @error('ratee')
                                    <div class="transition transform alert alert-danger"
                                            x-init="$el.closest('form').scrollIntoView()">
                                        <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                    </div> 
                                    @enderror
                                </div>
                            </div>

                            <div
                                class="block flex-wrap w-full col-span-2 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <div class="flex-none">
                                    <h2><b>Period</b></h2>
                                </div>
                                <br>
                                <div class="grid grid-cols-1 lg:grid-cols-2  gap-4">
                                    <div class="w-full">
                                        <label for="start_period"
                                            class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white ">Start Period <span class="text-red-600">*</span></label>
                                        <input type="date" name="start_period" id="start_period" wire:model.blur="start_period" value="{{$employeeRecordDate}}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                             required="" disabled>
                                        {{-- @error('start_period') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror  --}}
                                        @error('start_period')
                                        <div class="transition transform alert alert-danger"
                                                x-init="$el.closest('form').scrollIntoView()">
                                            <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                        </div> 
                                        @enderror   
                                    </div>
                                    <div class="w-full">
                                        <label for="brand"
                                            class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white">End Period <span class="text-red-600">*</span></label>
                                        <input type="date" name="endperiod" id="endperiod" wire:model.blur="end_period" value="{{$employeeRecordDate}}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                           required="">
                                        @error('end_period')   
                                            <div class="transition transform alert alert-danger text-sm "
                                            x-init="$el.closest('form').scrollIntoView()">
                                            <span class="text-red-500 text-xs xl:whitespace-nowrap">{{ $message }}</span>
                                            </div> 
                                         @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    
                <div class="grid grid-cols-1 gap-4 w-full col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                    {{-- Core Functions --}}
                    <div class="block flex-wrap w-full col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                        <div class="flex-none pb-4">
                            <h2><b>Core Functions-80%</b></h2>
                        </div>
                     
                            @foreach ($coreFunctions as $index => $coreFunction)   
                            {{-- @php
                                        dd($coreFunctions[0]['accomp']);
                            @endphp --}}
                            <div class="block w-full col-span-3 p-6 pb-8 mb-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <ul class="text-sm font-medium text-right text-gray-500 border border-gray-300 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                                    <li class="">
                                        <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true"
                                        type="button" name="add" wire:click.prevent="removeCoreFunction({{$index}})" wire:confirm="Are you sure you want to delete this function?"
                                        class="inline-block p-4 text-red-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-red-500">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round"  stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </li>
                                </ul>
                                <div class="grid grid-cols-1 col-span-3 gap-4  border min-[1150px]:grid-cols-5 border-gray-200 p-4" >
                                    <div class="grid col-span-3 gap-4 sm:grid-cols-1 min-[900px]:grid-cols-3">
                                        <div>
                                            <label for="coreFunctions_{{$index}}_output" class="block mb-2 text-sm whitespace-nowrap font-medium text-gray-900 dark:text-white">Output <span class="text-red-600">*</span></label>
                                            <textarea type="text" rows="10" id="coreFunctions_{{$index}}_output" name="coreFunctions[{{$index}}][output]" wire:model.blur="coreFunctions.{{$index}}.output" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                            {{-- @error('coreFunctions.' . $index . '.output')   
                                                <div class="transition transform alert alert-danger text-sm"
                                                     x-data x-init="document.getElementById('coreFunctions_{{$index}}_output').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('coreFunctions_{{$index}}_output').focus();">
                                                    <span class="text-red-500 text-xs">{{$message}}</span>
                                                </div> 
                                            @enderror --}}
                                            @error('coreFunctions.' . $index . '.output')   
                                                <div class="transition transform alert alert-danger text-sm"
                                                        x-data x-init="document.getElementById('coreFunctions_{{$index}}_output').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('coreFunctions_{{$index}}_output').focus();">
                                                    <span class="text-red-500 text-xs "> {{$message}}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="coreFunctions_{{$index}}_indicator"
                                                class="block mb-2 text-sm font-medium whitespace-nowrap text-gray-900 dark:text-white">Success Indicators <span class="text-red-600">*</span></label>
                                            <textarea type="text" rows="10" id="coreFunctions_{{$index}}_indicator" name="coreFunctions[{{$index}}][indicator]" wire:model.blur="coreFunctions.{{$index}}.indicator" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </textarea>
                                            @error('coreFunctions.' . $index . '.indicator')   
                                                <div class="transition transform alert alert-danger text-sm"
                                                        x-data x-init="document.getElementById('coreFunctions_{{$index}}_indicator').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('coreFunctions_{{$index}}_indicator').focus();">
                                                    <span class="text-red-500 text-xs "> {{$message}}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="coreFunctions_{{$index}}_accomp"
                                                class="block mb-2 text-sm font-medium whitespace-nowrap text-gray-900 dark:text-white">Accomplishments <span class="text-red-600">*</span></label>
                                            <textarea type="text" rows="10" id="coreFunctions_{{$index}}_accomp" name="coreFunctions[{{$index}}][accomp]" wire:model.blur="coreFunctions.{{$index}}.accomp"   class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </textarea>
                                            @error('coreFunctions.' . $index . '.accomp')   
                                                <div class="transition transform alert alert-danger text-sm"
                                                x-data x-init="document.getElementById('coreFunctions_{{$index}}_accomp').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('coreFunctions_{{$index}}_accomp').focus();" >
                                                    <span class="text-red-500 text-xs" > {{$message}}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-span-2">
                                        <div class="block w-full p-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                            <div class="flex-wrap pb-5 ">
                                                <div class="w-full mb-4">
                                                    <h2><b>SMTP Rating</b></h2>
                                                </div>
                                               <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div class="w-full">
                                                        <label
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Q<span class="text-red-600">*</span></label>
                                                        <select  id="coreFunctions_{{$index}}_Q" wire:model.change="coreFunctions.{{$index}}.Q"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <option selected>Pick</option>
                                                            <option value="5">5</option>
                                                            <option value="4">4</option>
                                                            <option value="3">3</option>
                                                            <option value="2">2</option>
                                                            <option value="1">1</option>
                                                        </select>
                                                        @error('coreFunctions.' . $index . '.Q')   
                                                            <div class="transition transform alert alert-danger text-sm"
                                                                x-data x-init="document.getElementById('coreFunctions_{{$index}}_Q').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('coreFunctions_{{$index}}_Q').focus();" >
                                                                    <span class="text-red-500 text-xs" > {{$message}}</span>
                                                            </div> 
                                                        @enderror
                                                    </div>
                
                                                    <div class="w-full">
                                                        <label
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E<span class="text-red-600">*</span></label>
                                                        <select  id="coreFunctions_{{$index}}_E" wire:model.change="coreFunctions.{{$index}}.E"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <option selected>Pick</option>
                                                            <option value="5">5</option>
                                                            <option value="4">4</option>
                                                            <option value="3">3</option>
                                                            <option value="2">2</option>
                                                            <option value="1">1</option>
                                                        </select>
                                                        @error('coreFunctions.' . $index . '.E')   
                                                            <div class="transition transform alert alert-danger text-sm"
                                                                x-data x-init="document.getElementById('coreFunctions_{{$index}}_E').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('coreFunctions_{{$index}}_E').focus();" >
                                                                    <span class="text-red-500 text-xs" > {{$message}}</span>
                                                            </div> 
                                                        @enderror
                                                    </div>
            
                                                    <div class="w-full ">
                                                        <label
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">T<span class="text-red-600">*</span></label>
                                                        <select  id="coreFunctions_{{$index}}_T" wire:model.change="coreFunctions.{{$index}}.T"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <option selected>Pick</option>
                                                            <option value="5">5</option>
                                                            <option value="4">4</option>
                                                            <option value="3">3</option>
                                                            <option value="2">2</option>
                                                            <option value="1">1</option>
                                                        </select> 
                                                        @error('coreFunctions.' . $index . '.T')   
                                                            <div class="transition transform alert alert-danger text-sm"
                                                                x-data x-init="document.getElementById('coreFunctions_{{$index}}_T').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('coreFunctions_{{$index}}_T').focus();" >
                                                                    <span class="text-red-500 text-xs" > {{$message}}</span>
                                                            </div> 
                                                        @enderror
                                                    </div>
                
                                                    <div class="w-full">
                                                        <label
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">A<span class="text-red-600">*</span></label>
                                                        <select id="coreFunctions_{{$index}}_A" wire:model.change="coreFunctions.{{$index}}.A"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <option selected>Pick</option>
                                                            <option value="5">5</option>
                                                            <option value="4">4</option>
                                                            <option value="3">3</option>
                                                            <option value="2">2</option>
                                                            <option value="1">1</option>
                                                        </select>
                                                        @error('coreFunctions.' . $index . '.A')   
                                                            <div class="transition transform alert alert-danger text-sm"
                                                                x-data x-init="document.getElementById('coreFunctions_{{$index}}_A').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('coreFunctions_{{$index}}_A').focus();" >
                                                                    <span class="text-red-500 text-xs" > {{$message}}</span>
                                                            </div> 
                                                        @enderror
                                                    </div>
                                               </div>
                                               
                                            </div>
                                          
                                        </div>
                                      
                                    </div>
                                    @if($ipcr_type == "rated")
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 col-span-3 min-[1150px]:col-span-5 ">
                                        <div>
                                            <label for="message"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Weight <span class="text-red-600">*</span></label>
                                            <input type="text" id="coreFunctions_{{$index}}_weight" wire:model.blur="coreFunctions.{{$index}}.weight"   class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @error('coreFunctions.{{$index}}.weight')   
                                                <div class="transition transform alert alert-danger text-sm"
                                                    x-data x-init="document.getElementById('coreFunctions_{{$index}}_weight').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('coreFunctions_{{$index}}_weight').focus();" >
                                                        <span class="text-red-500 text-xs" > {{$message}}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="message"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks <span class="text-red-600">*</span></label>
                                            <input type="text" id="coreFunctions_{{$index}}_remark" wire:model.blur="coreFunctions.{{$index}}.remark"   class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @error('coreFunctions.{{$index}}.remark')   
                                                <div class="transition transform alert alert-danger text-sm"
                                                    x-data x-init="document.getElementById('coreFunctions_{{$index}}_remark').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('coreFunctions_{{$index}}_remark').focus();" >
                                                        <span class="text-red-500 text-xs" > {{$message}}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                                </div>
                            </div>
                    
                    {{-- @php
                        $sum = (int) $coreFunctions[$index]['A'] + 5;
                    @endphp --}}
                    @endforeach
                          
                  
                        <div class="flex justify-center">
                            <button type="button" name="add" wire:click.prevent="addCoreFunction" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Core Function</button>
                        </div>
                        <div class="block sm:w-1/2 md:w-1/3 min-[900px]:w-1/4 min-[1150px]:w-1/5 mt-4 col-span-1 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                            <label for="core_rating"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Core Rating<span class="text-red-600">*</span></label>
                            <input type="number" id="core_rating" wire:model.blur="core_rating"  placeholder="{{$core_rating}}"
                                class="bg-gray-50 border font-bold border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                disabled />
                            @error('core_rating')
                                <div class="transition transform alert alert-danger"
                                        x-init="$el.closest('form').scrollIntoView()">
                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message}}</span>
                                </div> 
                            @enderror
                        </div>
                    </div>
                                {{-- <div>
                                    <label for="message"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Success
                                        Indicators</label>
                                    <textarea id="message" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Write your thoughts here..."></textarea>
                                </div>
                                <div>
                                    <label for="message"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Accomplishment\s</label>
                                    <textarea id="message" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Write your thoughts here..."></textarea>
                                </div> --}}
    
    
                        
                    
                    {{-- Support/Admnistrative Functions --}}
                    <div class="block flex-wrap w-full col-span-3 p-6 pb-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                        <div class="flex-none pb-4">
                            <h2><b>Support/Administrative Functions-20%</b></h2>
                        </div>
                            @foreach ($supportiveFunctions as $index => $suuportiveFunction)   
                            <div class="block w-full col-span-3 p-6 pb-8 mb-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <ul class="text-sm font-medium text-right text-gray-500 border border-gray-300 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                                    <li class="">
                                        <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true"
                                        type="button" name="add" wire:click.prevent="removeSupportiveFunction({{$index}})" wire:confirm="Are you sure you want to delete this function?"
                                        class="inline-block p-4 text-red-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-red-500">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round"  stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </li>
                                </ul>
                                <div class="grid grid-cols-1 col-span-3 gap-4  border min-[1150px]:grid-cols-5 border-gray-200 p-4" >
                                    <div class="grid col-span-3 gap-4 grid-cols-1 min-[900px]:grid-cols-3">
                                        <div c>
                                            <label for="message"
                                                class="block mb-2 text-sm whitespace-nowrap font-medium text-gray-900 dark:text-white">Output <span class="text-red-600">*</span></label>
                                            <textarea type="text" rows="10"  id="supportiveFunctions_{{$index}}_output" ame="supportiveFunctions[{{$index}}][output]" wire:model.blur="supportiveFunctions.{{$index}}.output"   class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </textarea>
                                            @error('supportiveFunctions.{{$index}}.output')   
                                                <div class="transition transform alert alert-danger text-sm"
                                                    x-data x-init="document.getElementById('supportiveFunctions_{{$index}}_output').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supportiveFunctions_{{$index}}_output').focus();" >
                                                        <span class="text-red-500 text-xs" > {{$message}}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                        
                                        <div>
                                            <label for="message"
                                                class="block mb-2 text-sm font-medium whitespace-nowrap text-gray-900 dark:text-white">Success Indicators <span class="text-red-600">*</span></label>
                                            <textarea type="text" rows="10" id="supportiveFunctions_{{$index}}_indicator" wire:model.blur="supportiveFunctions.{{$index}}.indicator" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </textarea>
                                            @error('supportiveFunctions.{{$index}}.indicator')   
                                                <div class="transition transform alert alert-danger text-sm"
                                                    x-data x-init="document.getElementById('supportiveFunctions_{{$index}}_indicator').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supportiveFunctions_{{$index}}_indicator').focus();" >
                                                        <span class="text-red-500 text-xs" > {{$message}}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="message"
                                                class="block mb-2 text-sm font-medium whitespace-nowrap text-gray-900 dark:text-white">Accomplishments <span class="text-red-600">*</span></label>
                                            <textarea type="text" rows="10" id="supportiveFunctions_{{$index}}_accomp" wire:model.blur="supportiveFunctions.{{$index}}.accomp"   class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </textarea>
                                            @error('supportiveFunctions.{{$index}}.accomp')   
                                                <div class="transition transform alert alert-danger text-sm"
                                                    x-data x-init="document.getElementById('supportiveFunctions_{{$index}}_accomp').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supportiveFunctions_{{$index}}_accomp').focus();" >
                                                        <span class="text-red-500 text-xs" > {{$message}}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-span-2">
                                        <div class="block w-full p-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                            <div class="flex-wrap pb-5 ">
                                                <div class="w-full mb-4">
                                                    <h2><b>SMTP Rating</b></h2>
                                                </div>
                                               <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div class="w-full">
                                                        <label
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Q<span class="text-red-600">*</span></label>
                                                        <select id="smtpQ" id="supportiveFunctions_{{$index}}_Q" wire:model.change="supportiveFunctions.{{$index}}.Q"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <option selected >Pick</option>
                                                            <option value="5">5</option>
                                                            <option value="4">4</option>
                                                            <option value="3">3</option>
                                                            <option value="2">2</option>
                                                            <option value="1">1</option>
                                                        </select>
                                                        @error('supportiveFunctions.{{$index}}.Q')   
                                                            <div class="transition transform alert alert-danger text-sm"
                                                                x-data x-init="document.getElementById('supportiveFunctions_{{$index}}_Q').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supportiveFunctions_{{$index}}_Q').focus();" >
                                                                    <span class="text-red-500 text-xs" > {{$message}}</span>
                                                            </div> 
                                                        @enderror
                                                    </div>
                
                                                    <div class="w-full">
                                                        <label
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E<span class="text-red-600">*</span></label>
                                                        <select id="smtpE" id="supportiveFunctions_{{$index}}_E" wire:model.change="supportiveFunctions.{{$index}}.E"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <option selected>Pick</option>
                                                            <option value="5">5</option>
                                                            <option value="4">4</option>
                                                            <option value="3">3</option>
                                                            <option value="2">2</option>
                                                            <option value="1">1</option>
                                                        </select>
                                                        @error('supportiveFunctions.{{$index}}.E')   
                                                            <div class="transition transform alert alert-danger text-sm"
                                                                x-data x-init="document.getElementById('supportiveFunctions_{{$index}}_E').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supportiveFunctions_{{$index}}_E').focus();" >
                                                                    <span class="text-red-500 text-xs" > {{$message}}</span>
                                                            </div> 
                                                        @enderror
                                                    </div>
            
                                                    <div class="w-full ">
                                                        <label
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">T<span class="text-red-600">*</span></label>
                                                        <select id="smtpT" id="supportiveFunctions[{{$index}}][T]" wire:model.change="supportiveFunctions.{{$index}}.T"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <option selected>Pick</option>
                                                            <option value="5">5</option>
                                                            <option value="4">4</option>
                                                            <option value="3">3</option>
                                                            <option value="2">2</option>
                                                            <option value="1">1</option>
                                                        </select>
                                                        @error('supportiveFunctions.{{$index}}.T')   
                                                            <div class="transition transform alert alert-danger text-sm"
                                                                x-data x-init="document.getElementById('supportiveFunctions_{{$index}}_T').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supportiveFunctions_{{$index}}_T').focus();" >
                                                                    <span class="text-red-500 text-xs" > {{$message}}</span>
                                                            </div> 
                                                        @enderror
                                                    </div>
                
                                                    <div class="w-full">
                                                        <label
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">A<span class="text-red-600">*</span></label>
                                                        <select id="smtpA" id="supportiveFunctions_{{$index}}_A" wire:model.change="supportiveFunctions.{{$index}}.A"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <option selected>Pick</option>
                                                            <option value="5">5</option>
                                                            <option value="4">4</option>
                                                            <option value="3">3</option>
                                                            <option value="2">2</option>
                                                            <option value="1">1</option>
                                                        </select>
                                                        @error('supportiveFunctions.{{$index}}.A')   
                                                            <div class="transition transform alert alert-danger text-sm"
                                                                x-data x-init="document.getElementById('supportiveFunctions_{{$index}}_A').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supportiveFunctions_{{$index}}_A').focus();" >
                                                                    <span class="text-red-500 text-xs" > {{$message}}</span>
                                                            </div> 
                                                        @enderror
                                                    </div>
                                               </div>
                                               
                                            </div>
                                          
                                        </div>
                                      
                                    </div>
                                    @if($ipcr_type == "rated")
                                    <div  class="grid grid-cols-1 md:grid-cols-2 gap-4 col-span-3 min-[1150px]:col-span-5">
                                        <div>
                                            <label for="message"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Weight <span class="text-red-600">*</span></label>
                                            <input type="text" id="supportiveFunctions_{{$index}}_weight" wire:model.blur="supportiveFunctions.{{$index}}.weight"   class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @error('supportiveFunctions.{{$index}}.weight')   
                                                <div class="transition transform alert alert-danger text-sm"
                                                    x-data x-init="document.getElementById('supportiveFunctions_{{$index}}_weight').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supportiveFunctions_{{$index}}_weight').focus();" >
                                                        <span class="text-red-500 text-xs" > {{$message}}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="message"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks <span class="text-red-600">*</span></label>
                                            <input type="text" id="supportiveFunctions_{{$index}}_remark" wire:model.blur="supportiveFunctions.{{$index}}.remark"   class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @error('supportiveFunctions.{{$index}}.remark')   
                                                <div class="transition transform alert alert-danger text-sm"
                                                x-data x-init="document.getElementById('supportiveFunctions_{{$index}}_remark').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supportiveFunctions_{{$index}}_remark').focus();" >
                                                    <span class="text-red-500 text-xs" > {{$message}}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                                </div>
                            </div>
                   
                    @endforeach
                        <div class="flex justify-center">
                            <button type="button" name="add" wire:click.prevent="addSupportiveFunction" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Support / Administrative Function</button>
                        
                        </div>
                        <div class="block sm:w-1/2 md:w-1/3 min-[900px]:w-1/4 min-[1150px]:w-1/5 mt-4 col-span-1 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                            @error('supp_admin_rating') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            <label for="supp_admin_rating"
                                class="block mb-2 text-sm font-medium  text-gray-900 dark:text-white">Support / Administrative Rating<span class="text-red-600">*</span></label>
                            <input type="number" id="supp_admin_rating" wire:model.blur="supp_admin_rating" placeholder="{{$supp_admin_rating}}"
                                class="bg-gray-50 font-bold border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                disabled />
                        </div>
                    </div>



                    {{-- Previous Supp Function --}}
                    {{-- <div class="block flex-wrap w-full col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                        <div class="flex-none pb-4">
                            <h2><b>Support/Administrative Functions-20%</b></h2>
                        </div>
                     
                            @foreach ($supportiveFunctions as $index => $suuportiveFunction)   
                                <div class="block w-full col-span-3 p-6 pb-8 mb-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                    <ul class="text-sm font-medium text-right text-gray-500 border border-gray-300 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                                        <li class="">
                                            <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true"
                                            type="button" name="add" wire:click.prevent="removeCoreFunction({{$index}})" wire:confirm="Are you sure you want to delete this function?"
                                            class="inline-block p-4 text-red-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-red-500">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round"  stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>
                                <div class="grid gap-4 sm:grid-cols-5 sm:gap-6 border border-gray-200 p-4">
                                    <div class="grid col-span-3 gap-4 sm:grid-cols-3 sm:gap-6">
                                        @if($ipcr_type == "target")
                                            <div>
                                                <label for="message"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Output<span class="text-red-600">*</span></label>
                                                <textarea type="text" rows="10" name="supportiveFunctions[{{$index}}][output]" wire:model.blur="supportiveFunctions.{{$index}}.output"   class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                </textarea>
                                            </div>
                                            <div>
                                                <label for="message"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Success Indicators<span class="text-red-600">*</span></label>
                                                <textarea type="text" rows="10" name="supportiveFunctions[{{$index}}][indicator]" wire:model.blur="supportiveFunctions.{{$index}}.indicator"   class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"">
                                                </textarea>
                                            </div>
                                            <div>
                                                <label for="message"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Accomplishments<span class="text-red-600">*</span></label>
                                                <textarea type="text" rows="10" name="supportiveFunctions[{{$index}}][accomp]" wire:model.blur="supportiveFunctions.{{$index}}.accomp"   class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                </textarea>
                                            </div>
                                        @else
                                            <div>
                                                <label for="message"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Output<span class="text-red-600">*</span></label>
                                                <textarea type="text" rows="6" name="supportiveFunctions[{{$index}}][output]" wire:model.blur="supportiveFunctions.{{$index}}.output"   class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                </textarea>
                                            </div>
                                            <div>
                                                <label for="message"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Success Indicators<span class="text-red-600">*</span></label>
                                                <textarea type="text" rows="6" name="supportiveFunctions[{{$index}}][indicator]" wire:model.blur="supportiveFunctions.{{$index}}.indicator"   class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"">
                                                </textarea>
                                            </div>
                                            <div>
                                                <label for="message"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Accomplishments<span class="text-red-600">*</span></label>
                                                <textarea type="text" rows="6" name="supportiveFunctions[{{$index}}][accomp]" wire:model.live="supportiveFunctions.{{$index}}.accomp"   class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                </textarea>
                                            </div>
                                            <div class="col-span-3">
                                                <div class="grid  gap-4 sm:grid-cols-2 sm:gap-6">
                                                    <div>
                                                        <label for="message"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Weight <span class="text-red-600">*</span></label>
                                                        <input type="text" name="supportiveFunctions[{{$index}}][weight]" wire:model.live="supportiveFunctions.{{$index}}.weight"   class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    </div>
                                                    <div>
                                                        <label for="message"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks <span class="text-red-600">*</span></label>
                                                        <input type="text" name="supportiveFunctions[{{$index}}][remark]" wire:model.live="supportiveFunctions.{{$index}}.remark"   class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                      
                                    </div>
                                    <div class="flex col-span-2">
                                        <div class="block w-full p-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                            <div class="flex-wrap">
                                                <div class="w-full">
                                                    <h2><b>SMTP Rating</b></h2>
                                                </div>
                                                <div class="flex">
                                                    <div class="w-full pr-4 pb-10 pt-5">
                                                        <label
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Q<span class="text-red-600">*</span></label>
                                                        <select id="smtpQ" name="supportiveFunctions[{{$index}}][Q]" wire:model.live="supportiveFunctions.{{$index}}.Q"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <option selected>Pick</option>
                                                            <option value="5">5</option>
                                                            <option value="4">4</option>
                                                            <option value="3">3</option>
                                                            <option value="2">2</option>
                                                            <option value="1">1</option>
                                                        </select>
                                                    </div>
                
                                                    <div class="w-full pr-4 pb-10 pt-5 ">
                                                        <label
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E<span class="text-red-600">*</span></label>
                                                        <select id="smtpE" name="supportiveFunctions[{{$index}}][E]" wire:model.live="supportiveFunctions.{{$index}}.E"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <option selected>Pick</option>
                                                            <option value="5">5</option>
                                                            <option value="4">4</option>
                                                            <option value="3">3</option>
                                                            <option value="2">2</option>
                                                            <option value="1">1</option>
                                                        </select>
                                                    </div>
                                                </div>
            
                                                <div class="flex">
                                                    <div class="w-full pr-4">
                                                        <label
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">T<span class="text-red-600">*</span></label>
                                                        <select id="smtpT" name="supportiveFunctions[{{$index}}][T]" wire:model.live="supportiveFunctions.{{$index}}.T"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <option selected>Pick</option>
                                                            <option value="5">5</option>
                                                            <option value="4">4</option>
                                                            <option value="3">3</option>
                                                            <option value="2">2</option>
                                                            <option value="1">1</option>
                                                        </select>
                                                    </div>
                
                                                    <div class="w-full">
                                                        <label
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">A<span class="text-red-600">*</span></label>
                                                        <select id="smtpA" name="supportiveFunctions[{{$index}}][A]" wire:model.live="supportiveFunctions.{{$index}}.A"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <option selected>Pick</option>
                                                            <option value="5">5</option>
                                                            <option value="4">4</option>
                                                            <option value="3">3</option>
                                                            <option value="2">2</option>
                                                            <option value="1">1</option>
                                                        </select>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                          
                                        </div>
                                        <div class="w-1/3 mt-24">
                                            <button name="add" wire:click.prevent="removeSupportiveFunction({{$index}})" wire:confirm="Are you sure you want to delete this function?" class="inline-flex justify-center ml-8 w-1/2 px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-red-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                                <span class="flex items-center justify-center">Remove</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                   
                    @endforeach
                    <div class="flex justify-center">
                        <button type="button" name="add" wire:click.prevent="addSupportiveFunction" class="inline-flex justify-center ml-8 w-1/3 px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Add Support/Administrative Function</button>
                    </div>
                    <div class="block w-1/5 col-span-2 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                        <label for="supprating"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Support/Administrative Rating<span class="text-red-600">*</span></label>
                        <input type="number" id="supp_admin_rating" name="supp_admin_rating" wire:model.live="supp_admin_rating"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required />
                    </div>
                    </div> --}}
                    {{-- // Previous Supp FUnction --}}
                    {{-- <div
                        class="block flex-wrap w-full col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                        <div class="flex-none pb-4">
                            <h2><b>Support / Administrative Functions-20%</b></h2>
                        </div>
                        <div
                            class="block w-full col-span-3 p-6 pb-8 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                            <div class="grid gap-4 sm:grid-cols-3 sm:gap-6 flex">
                                <div>
                                    <label for="message"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Output</label>
                                    <textarea id="message" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Write your thoughts here..."></textarea>
                                </div>
                                <div>
                                    <label for="message"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Success
                                        Indicators</label>
                                    <textarea id="message" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Write your thoughts here..."></textarea>
                                </div>
                                <div>
                                    <label for="message"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Accomplishment\s</label>
                                    <textarea id="message" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Write your thoughts here..."></textarea>
                                </div>
    
                            </div>
    
                        </div>
                        <br>
                        <div class="block w-full col-span-3 p-6 pt-8 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                            <div class="grid gap-4 sm:grid-cols-6 sm:gap-6 flex">
                                <div
                                    class="block w-full col-span-2 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                    <label for="corerating"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Core
                                        Rating</label>
                                    <input type="corerating" id="core_rating"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>
                                <div
                                    class="block w-full col-span-4 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                    <div class="flex">
                                        <div class="w-full pr-4">
                                            <label
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Q</label>
                                            <select id="smtpQ"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected>Pick</option>
                                                <option value="5">5</option>
                                                <option value="4">4</option>
                                                <option value="3">3</option>
                                                <option value="2">2</option>
                                                <option value="1">1</option>
                                            </select>
                                        </div>
    
                                        <div class="w-full pr-4">
                                            <label
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E</label>
                                            <select id="smtpE"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected>Pick</option>
                                                <option value="5">5</option>
                                                <option value="4">4</option>
                                                <option value="3">3</option>
                                                <option value="2">2</option>
                                                <option value="1">1</option>
                                            </select>
                                        </div>
    
                                        <div class="w-full pr-4">
                                            <label
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">T</label>
                                            <select id="smtpT"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected>Pick</option>
                                                <option value="5">5</option>
                                                <option value="4">4</option>
                                                <option value="3">3</option>
                                                <option value="2">2</option>
                                                <option value="1">1</option>
                                            </select>
                                        </div>
    
                                        <div class="w-full">
                                            <label
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">A</label>
                                            <select id="smtpA"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected>Pick</option>
                                                <option value="5">5</option>
                                                <option value="4">4</option>
                                                <option value="3">3</option>
                                                <option value="2">2</option>
                                                <option value="1">1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                        </div>
    
                    </div> --}}
    
                    <br>
                    <div class="block col-span-3 p-6 pt-8 sm:w-1/2 md:w-1/3 min-[900px]:w-1/4 min-[1150px]:w-1/5 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                        <div class="grid gap-4 sm:grid-cols-1 sm:gap-6   ">
                            <div>
                                <label for="final_rating" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Final Average Rating<span class="text-red-600">*</span></label>
                                <input type="number" id="final_average_rating" name="final_average_rating" wire:model.blur="final_average_rating" placeholder="{{$final_average_rating}}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    disabled />
                            </div>
                        </div>
                    </div>
                    </div>

                    
                    {{-- <div class="block w-full col-span-3 p-6 pt-8 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                        <div class="grid gap-4 md:grid-cols-1 lg:grid-cols-2 sm:gap-6 ">
                            <div>
                                <div class="justify-left">
                                    <label for="discussed_with" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discussed with<span class="text-red-600">*</span></label> 
                                </div>
                                <div class="grid sm:grid-cols-1 min-[738px]:grid-cols-2 gap-8">
                                    <div class="flex items-center justify-center w-full ">
                                        <label for="dropzone-file1" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                </svg>
                                                @if($discussed_with)
                                                <p class="mb-2 sm:text-xs  text-center text-green-500 dark:text-gray-400"><span class="font-semibold">File Uploaded</span></p>
                                                @else
                                                <p class="mb-2 sm:text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold text-xs">Click to upload</span></p>
                                                <p class="sm:text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG  (MAX. 800x400px)</p>
                                                @endif
                                            </div>
                                            <input id="dropzone-file1" type="file" class="hidden" wire:model.live="discussed_with" />
                                        </label>
                                    </div> 
                                    <div class="w-full pr-4">
                                        <label for="brand"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discussed Date<span class="text-red-600">*</span></label>
                                        <input type="date" name="disscused_with_date" id="disscused_with_date" value="{{$employeeRecordDate}}" wire:model.live="disscused_with_date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Last name" required="">
                                    </div>
                                </div>
    
                            </div>
                            <div class="block w-full p-6 pt-8 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <div class="justify-left">
                                    <label for="assessed_by" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Assessed by<span class="text-red-600">*</span></label> 
                                </div>
                                
                               <div class="flex">
                                <div class="flex items-center justify-center w-full pr-8">
                                    <label for="dropzone-file2" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            @if($assessed_by)
                                            <p class="mb-2 sm:text-xs text-center text-green-500 dark:text-gray-400"><span class="font-semibold">File Uploaded</span></p>
                                            @else
                                            <p class="mb-2 sm:text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                            <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG  (MAX. 800x400px)</p>
                                            @endif
                                        </div>
                                        <input id="dropzone-file2" type="file" class="hidden" wire:model.live="assessed_by" />
                                    </label>
                                </div> 
                                <div class="w-full pr-4">
                                    <label for="assessed_date"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Assessed Date<span class="text-red-600">*</span></label>
                                    <input type="date" name="assessed_by_date" id="assessed_by_date" value="{{$employeeRecordDate}}" wire:model.live="assessed_by_date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Last name" required="">
                                </div>
    
                               </div>
                            </div>
    
                        </div>
                    </div> --}}



                    
                
                
                </div>
                <button type="submit"  
                        class="inline-flex items-center float-right px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Submit IPCR 
                    </button>

            </form>     
        </div>
    </section>
    
    </div>
</div>