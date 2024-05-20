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
            <a href="{{route('LeaveRequestTable')}}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Leave Request</a>
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
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">Add a new Leave Request</h2>
    <section class="bg-white dark:bg-gray-900 pb-24 px-8  rounded-lg">
        <div class=" px-1 mx-auto pt-8">
            <form wire:submit.prevent="submit" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    <div class="block w-full col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                        <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                            {{-- Information field --}}
                            <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <h2><b>Information</b></h2>
                                    <div  class="col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                            <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4">
                                                <div class="w-full ">
                                                    <label for="firstname"
                                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">First name <span class="text-red-600">*</span></label>
                                                    <input type="text" name="firstname" id="firstname"  value="{{$first_name}}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                         required="" disabled>
                                                </div>
                                                <div class="w-full ">
                                                    <label for="middlename"
                                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Middle name <span class="text-red-600">*</span></label>
                                                    <input type="text" name="middlename" id="middlename" value="{{$middle_name}}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                         required="" disabled>
                                                </div>
                                                <div class="w-full">
                                                    <label for="lastname"
                                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Last name <span class="text-red-600">*</span></label>
                                                    <input type="text" name="lastname" id="lastname"  value="{{$last_name}}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                         required="" disabled>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 col-span-3">
                                                <div class="w-full">
                                                    <label for="department_name"
                                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Department Name <span class="text-red-600">*</span></label>
                                                    <input type="text" name="department_name" id="department_name"  value="{{$department_name}}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        required="" disabled>
                                                </div>
                                                <div class="w-full">
                                                    <label for="employee_id"
                                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Employee ID <span class="text-red-600">*</span></label>
                                                    <input type="text" name="" id="employee_id"  value="{{$employee_id}}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        required="" disabled>
                                                </div>
                                            </div>
                                </div>
                        
                                {{-- Date Of Filling --}}
                                <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                    {{-- <h2><b>Date of Filling</b></h2> --}}
                                    <div class="w-full ">
                                        <label for="date_of_filling"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Filling<span class="text-red-600">*</span></label>
                                        <input type="date" wire:model="date_of_filling" 
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Date of Filling" required disabled>
                                    </div>
                                    <div class="w-full">
                                        <label for="position"
                                            class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Position <span class="text-red-600">*</span></label>
                                        <input type="text" name="position" id="position" wire:model="current_position"  
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Last name" required="" disabled>
                                    </div>
                                    <div class="w-full">
                                        <label for=""
                                            class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Salary <span class="text-red-600">*</span></label>
                                        <input type="text" name="salary" id="salary" wire:model="salary"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Last name" required="" disabled>
                                    </div>
                                </div>
                            </div>

                            {{-- Leave Information --}}
                            <div class="grid grid-cols-1 w-full col-span-3 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <h2><b>Leave Information</b></h2>
                                <div class="grid grid-cols-1 gap-4 min-[902px]:grid-cols-2">
                                    <div class="grid grid-cols-1 w-full gap-4 min-[902px]:grid-cols-2 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                        <div class="w-full col-span-2">
                                            <label
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Leave Type<span class="text-red-600">*</span></label>
                                            <select id="type_of_leave" name="type_of_leave" wire:model.live="type_of_leave" 
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected>Select an option</option>
                                                <option value="Others" >Others</option>
                                                <option value="Vacation Leave">Vacation Leave</option>
                                                <option value="Mandatory/Forced Leave">Mandatory/Forced Leave</option>
                                                <option value="Sick Leave">Sick Leave</option>
                                                <option value="Maternity Leave">Maternity Leave</option>
                                                <option value="Paternity Leave">Paternity Leave</option>
                                                <option value="Special Privilege Leave">Special Privilege Leave</option>
                                                <option value="Solo Parent Leave">Solo Parent Leave</option>
                                                <option value="Study Leave">Study Leave</option>
                                                <option value="10-Day VAWC Leave">10-Day VAWC Leave</option>
                                                <option value="Rehabilitation Privilege">Rehabilitation Privilege</option>
                                                <option value="Special Leave Benefits for Women">Special Leave Benefits for Women</option>
                                                <option value="Special Emergency Leave">Special Emergency Leave</option>
                                                <option value="Adoption Leave">Adoption Leave</option>
                                            </select>
                                            @error('type_of_leave')   
                                            <div class="transition transform alert alert-danger text-sm"
                                                 x-init="$el.closest('form').scrollIntoView()">
                                                 <span class="text-red-500 text-xs "> {{$message}}</span>
                                            </div> 
                                            @enderror
                                            <label for="type_of_leave_others"
                                            class="block mb-2 pt-4 text-sm font-medium whitespace-nowrap text-gray-900 dark:text-white">Others (Put N\A if not applicable) </label>
                                            <textarea type="text" rows="10" id="type_of_leave_others" name="type_of_leave_others" wire:model="type_of_leave_others"
                                                placeholder="If chosen others, write the type of leave. Otherwise, Ignore"   
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </textarea>
                                            @error('type_of_leave_others')   
                                            <div class="transition transform alert alert-danger text-sm"
                                                 x-init="$el.closest('form').scrollIntoView()">
                                                 <span class="text-red-500 text-xs "> {{$message}}</span>
                                            </div> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 w-full col-span-1 gap-4 min-[902px]:grid-cols-2 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                        <div class="w-full col-span-2">
                                            <label id="type_of_leave_sub_category" name="type_of_leave_sub_category" wire:model.live="type_of_leave_sub_category" 
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Leave Type Sub Category<span class="text-red-600">*</span></label>
                                            <select id="type_of_leave_sub_category" name="type_of_leave_sub_category" wire:model.live="type_of_leave_sub_category" 
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @if($type_of_leave == "Vacation Leave" || $type_of_leave == "Special Privilege Leave" )
                                                    <option value="Within the Philippines">Within the Philippines</option>
                                                    <option value="Abroad">Abroad</option>
                                                @elseif($type_of_leave == "Sick Leave")
                                                    <option value="In Hospital">In Hospital</option>
                                                    <option value="Out Patient">Out Patient</option>
                                                @elseif($type_of_leave == "Special Leave Benefits for Women")
                                                    <option value="Special Leave Benefits for Women">Special Leave Benefits for Women</option>
                                                @elseif($type_of_leave == "Study Leave")
                                                    <option value="Completion of Master\'s degree">Completion of Master\'s degree</option>
                                                    <option value="BAR/Board Examination Review">BAR/Board Examination Review</option>
                                                @else
                                                    <option selected>Select an Option</option>
                                                    <option value="Monetization of leave credits">Monetization of leave credits</option>
                                                    <option value="Terminal Leave">Terminal Leave</option>
                                                @endif
                                            </select>
                                            @error('type_of_leave_sub_category')   
                                            <div class="transition transform alert alert-danger text-sm"
                                                 x-init="$el.closest('form').scrollIntoView()">
                                                 <span class="text-red-500 text-xs "> {{$message}}</span>
                                            </div> 
                                            @enderror
                                            <label for="type_of_leave_description"
                                            class="block mb-2  pt-4  text-sm font-medium whitespace-nowrap text-gray-900 dark:text-white">Additional Details (Put N\A if not applicable) </label>
                                                <textarea type="text" rows="10" id="type_of_leave_description" name="type_of_leave_description" wire:model="type_of_leave_description" 
                                                    placeholder="Write Additional Details here."
                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                </textarea>
                                            @error('type_of_leave_description')   
                                                <div class="transition transform alert alert-danger text-sm"
                                                    x-init="$el.closest('form').scrollIntoView()">
                                                    <span class="text-red-500 text-xs "> {{$message}}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                             {{-- Time frame and Available Credits --}}
                            <div class="grid grid-cols-1 w-full col-span-3 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                
                                {{-- Time Frame --}}
                                <div class="grid grid-cols-1 gap-4 min-[902px]:grid-cols-2">
                                    <div class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                                        <h2><b>Time Frame</b></h2>
                                        <div class="grid grid-cols-1 min-[1052px]:grid-cols-2 gap-4 pt-5">
                                            <div class="w-full">
                                                <label for="inclusive_start_date"
                                                    class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white ">Start Date/Time <span class="text-red-600">*</span></label>
                                                <input type="datetime-local" name="inclusive_start_date" id="inclusive_start_date" wire:model.live="inclusive_start_date" 
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="">
                                                @error('inclusive_start_date')
                                                <div class="transition transform alert alert-danger"
                                                        x-init="$el.closest('form').scrollIntoView()">
                                                    <span class="text-red-500 text-xs ">{{$message }}</span>
                                                </div> 
                                                @enderror       
                                            </div>
                                            <div class="w-full">
                                                <label for="inclusive_end_date"
                                                    class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white">End Date/Time <span class="text-red-600">*</span></label>
                                                <input type="datetime-local" name="inclusive_end_date" id="inclusive_end_date" wire:model.live="inclusive_end_date" 
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required="">
                                                @error('inclusive_end_date')   
                                                    <div class="transition transform alert alert-danger text-sm "
                                                    x-init="$el.closest('form').scrollIntoView()">
                                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                                    </div> 
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Available Credits --}}
                                    <div class="grid grid-cols-1  gap-5 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                                        <h2><b>Leave Credits</b></h2>
                                        <div class="grid grid-cols-1 gap-4 min-[1052px]:grid-cols-2">
                                            <div class="w-full">
                                                <label for="numOfWorkDays"
                                                    class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white ">Number of Working Days/Hours Applied For <span class="text-red-600">*</span></label>
                                                <input type="text" name="numOfWorkDay" id="numOfWorkDay" value="{{$num_of_days_work_days_applied}}" 
                                                    class="bg-gray-50 border font-bold border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                     disabled>
                                                {{-- @error('start_period') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror  --}}
                                                @error('num_of_days_work_days_applied')
                                                <div class="transition transform alert alert-danger"
                                                        x-init="$el.closest('form').scrollIntoView()">
                                                    <span class="text-red-500 text-xs ">{{$message }}</span>
                                                </div> 
                                                @enderror   
                                            </div>
                                            <div class="w-full">
                                                <label for="available_credits"
                                                    class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white">Available Credits Note: This may reduce your Salary. <span class="text-red-600">*</span></label>
                                                <input type="number" name="available_credits" id="available_credits" wire:model="available_credits" 
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                   disabled>
                                                @error('available_credits')   
                                                    <div class="transition transform alert alert-danger text-sm "
                                                    x-init="$el.closest('form').scrollIntoView()">
                                                    <span class="text-red-500 text-xs ">{{ $message }}</span>
                                                    </div> 
                                                 @enderror
                                            </div>
                                        </div>
                                       
                                    </div>
                            
                                </div>
                            </div>

                            <div class="grid grid-cols-1 w-full col-span-3 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <h2><b>Commutation and Signature</b></h2>
                                <div class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                                    
                                    <div class="grid grid-cols-1 gap-4 min-[1052px]:grid-cols-2">
                                        <div class="w-full grid grid-cols-1 ">
                                            <label for="commutation"
                                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white ">Commutation <span class="text-red-600">*</span></label>
                                                <div class="w-full pl-4 items-start">
                                                <input type="radio" name="commutation" id="commutation" wire:model="commutation" value="requested">
                                                <label for="numOfWorkDay" class="text-sm font-semibold">Requested</label>
                                                <br>
                                                <input type="radio" id="html" name="commutation" wire:model="commutation" value="not requested">
                                                <label for="html" class="text-sm font-semibold">Not Requested</label><br>
                                                @error('start_period')
                                                <div class="transition transform alert alert-danger"
                                                        x-init="$el.closest('form').scrollIntoView()">
                                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                </div> 
                                                @enderror   
                                                </div>
                                        </div>
                                        <div>
                                            <div class="justify-left">
                                                <label for="commutation_signature_of_appli" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Applicant Signature<span class="text-red-600">*</span></label> 
                                            </div>
                                            <div class="grid grid-cols-1 items-center justify-center w-full">
                                                @if($commutation_signature_of_appli)
                                                <label for="commutation_signature_of_appli" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    @if(is_string($commutation_signature_of_appli) == True)
                                                        @php
                                                            $commutation_signature_of_appli = $this->getApplicantSignature();
                                                        @endphp
                                                        <img src="data:image/gif;base64,{{ base64_encode($commutation_signature_of_appli) }}" alt="Image Description" class="w-full h-full object-contain"> 
                                                    @else
                                                        <img src="{{ $commutation_signature_of_appli->temporaryUrl() }}" class="w-full h-full object-contain" alt="Uploaded Image">
                                                    @endif
                                                    <input id="commutation_signature_of_appli" type="file" class="hidden" wire:model.live="commutation_signature_of_appli">
                                                </label>
                                                @else
                                                    <label for="commutation_signature_of_appli" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                            </svg>
                                                            <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                            <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG, or PDF file (Max: 5 MB size)</p>
                                                        </div>
                                                        <input disabled id="commutation_signature_of_appli" type="file" class="hidden" wire:model="commutation_signature_of_appli" />
                                                    </label>
                                                @endif
                                                @error('commutation_signature_of_appli')
                                                <div class="transition transform alert alert-danger"
                                                        x-init="$el.closest('form').scrollIntoView()">
                                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
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
                    Update Leave Request
            </button>
            </form>
        </div>
    </section>
    
    </div>
</div>