<div class="main-content ">
    <br><br>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        <div class="grid grid-cols-5 gap-4">
            <div class="col-span-3 grid grid-cols-1 gap-4">
                <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                    <div class="float-right justify-end px-4 pt-4">
                        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="float-end min-[900px]:float-none inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                            <span class="sr-only">Open dropdown</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" class="z-10 hidden text-base  list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2" aria-labelledby="dropdownButton">
                            <li>
                                <a href="{{route('changeInformation')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Change Information?</a>
                            </li>
                            </ul>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 min-[900px]:grid-cols-2 p-4">
                        <div class="flex justify-center min-[900px]:flex min-[900px]:justify-end">
                            <img class="ml-8 w-36 h-36 mb-3 shadow-xl rounded-full" src="{{asset('storage/'. $employeeImage)}}" alt="Bonnie image"/> 
                        </div>
                        <div class="inline-flex items-center justify-center min-[900px]:justify-start">
                           <div class="ml-8 text-center">
                                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$employeeRecord->first_name}} {{$employeeRecord->middle_name}} {{$employeeRecord->last_name}}</h5>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{$employeeRecord->employee_type}}</p>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div class="grid grid-cols-1">
                        <div class="grid grid-cols-1 min-[900px]:grid-cols-2 mb-8 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 md:mb-12  bg-white dark:bg-gray-800">
                            <figure class="items-left justify-center pl-8 pt-8 text-left bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
                                <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Information: </h3>
                                    <p class="my-4"><b>Phone:</b> {{$employeeRecord->phone}} </p>
                                    <p class="my-4"><b>Sex:</b> {{$employeeRecord->gender}}</p>
                                    <p class="my-4"><b>Position:</b> {{$employeeRecord->current_position}}</p>
                                    <p class="my-4 "><b>Personal Email:</b> {{$employeeRecord->personal_email}} </p>

                                </blockquote>
                            </figure>
                            <figure class=" items-center justify-center pl-8 pt-8 text-left bg-white border-b border-gray-200 md:rounded-se-lg dark:bg-gray-800 dark:border-gray-700">
                                <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                                    <br>
                                    <p class="my-4"><b>Age:</b> {{number_format($employeeRecord->age, 0)}}</p>
                                    <p class="my-4"><b>Birth Date:</b> {{$employeeRecord->birth_date}} </p>
                                    <p class="my-4"><b>Address:</b> {{$employeeRecord->address}}</p>
                                    <p class="my-4"><b>School Email:</b> {{$employeeRecord->school_email}}</p>

                                </blockquote>
                            </figure>
                            <figure class="items-center justify-center pl-8 pt-8 text-left bg-white border-b border-gray-200 md:rounded-es-lg md:border-b-0 md:border-e dark:bg-gray-800 dark:border-gray-700">
                                <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Designation: </h3>
                                    <p class="my-4"><b>Department Name:</b> {{$employeeRecord->department_name}}</p>
                                    <p class="my-4"><b>Department Head:</b> {{$employeeRecord->department_head}}</p>
                                    <p class="my-4"><b>Faculty/Non Faculty:</b> {{$employeeRecord->faculty_or_not ? 'Faculty' : 'Not a Faculty' }}</p>
                                    <p class="my-4"><b>Employee ID:</b> {{$employeeRecord->employee_id}} </p>
                                </blockquote>
                            </figure>
                            <figure class=" items-center justify-center pl-8 pt-8 text-left bg-white border-gray-200 rounded-b-lg md:rounded-se-lg dark:bg-gray-800 dark:border-gray-700">
                                <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Employee History: </h3>
                                    @if ($employeeHistory)
                                        @foreach ($employeeHistory as $index => $record)
                                            <p class="my-4"><b>{{$index + 1}}. {{$record->prev_position}} - {{$record->name_of_company}} <br> | {{$record->start_date}} to {{$record->end_date}} </b> </p>
                                        @endforeach
                                    @else
                                        <p class="my-4"><b>1. </b> </p>
                                        <p class="my-4"><b>2. </b> </p>
                                        <p class="my-4"><b>3. </b> </p>
                                    @endif
                                </blockquote>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-2">
                <div class="w-auto">
                    <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-4">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Documents</h5>
                            {{-- <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                                View all
                            </a> --}}
                       </div>
                       <div class="flow-root">
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0 ms-4 truncate">
                                            <a target="_blank" href="{{route('downloadFile', ['file' => 'photo'])}}" class="text-sm cursor-pointer font-medium text-gray-900 truncate dark:text-white">
                                                Photo
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0 ms-4 truncate">
                                            <a target="_blank" href="{{route('downloadFile', ['file' => 'diploma'])}}" class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                Diploma
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0 ms-4 truncate">
                                            <a target="_blank" href="{{route('downloadFile', ['file' => 'tor'])}}" class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                Transcript of Records
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0 ms-4 truncate">
                                            <a target="_blank" href="{{route('downloadFile', ['file' => 'certificate'])}}" class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                Certificate of Trainings/Seminars
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0 ms-4 truncate">
                                            <a target="_blank" href="{{route('downloadFile', ['file' => 'csc_eligibility'])}}" class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                Authenticated Copy of CSC Eligibility and/or PRC License
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0 ms-4 truncate">
                                            <a target="_blank" href="{{route('downloadFile', ['file' => 'prc_boardrating'])}}" class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                Authenticated copy of PRC Board Rating
                                            </a>
                                        </div>
                                    </div>
                                </li>
                              
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0 ms-4 truncate">
                                            <a target="_blank" href="{{route('downloadFile', ['file' => 'med_cert'])}}" class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                Medical Certificate
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0 ms-4 truncate">
                                            <a target="_blank" href="{{route('downloadFile', ['file' => 'nbi_clerance'])}}" class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                NBI Clearance
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0 ms-4 truncate">
                                            <a target="_blank" href="{{route('downloadFile', ['file' => 'psa_birthcertificate'])}}" class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                PSA Birth Certifcate
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0 ms-4 truncate">
                                            <a target="_blank" href="{{route('downloadFile', ['file' => 'psa_marriagecertificate'])}}" class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                PSA Marriage Certificate
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0 ms-4 truncate">
                                            <a target="_blank" href="{{route('downloadFile', ['file' => 'service_record'])}}" class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                Service Record from other government agency
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0 ms-4 truncate">
                                            <a target="_blank" href="{{route('downloadFile', ['file' => 'approved_clearance'])}}" class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                Approved Clearance from previous employer
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                {{-- <div class="row">
                                    @php
                                        $documents = $record->other_documents ?? []; // Set to empty array if null or not set
                                        $documentsCount = count($documents);
                                    @endphp
                                        
                                    @for ($i = 0; $i < $documentsCount; $i++)
                                        <div class="col-md-6">
                                            @php $document = $documents[$i]; @endphp
                                        </div>
                                        <li class="py-1 sm:py-2">
                                            <div class="flex items-center">
                                                <div class="flex-1 min-w-0 ms-4">
                                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                        {{ "Other Document " . ($i + 1) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        @if (($i + 1) % 2 === 0) <!-- Close row and start a new row after every 2 items -->
                                            </div><div class="row">
                                        @endif
                                    @endfor
                                </div> --}}
                              
                            </ul>
                       </div>
                    </div>
            </div>
            

        </div>
   
    </div>
    </div>
</div>