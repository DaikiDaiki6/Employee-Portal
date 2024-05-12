<div class="main-content ">
    <br><br>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        <div class="grid grid-cols-5 gap-4">
            <div class="col-span-3 grid grid-cols-1 gap-4">
                <div class="w-full bg-white border-10 border-gray-800 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
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
                    <div class="grid grid-cols-1 min-[900px]:grid-cols-2 p-4 ">
                        <div class="flex justify-center min-[900px]:flex min-[900px]:justify-end">
                            <img class="ml-8 w-36 h-36 mb-3 shadow-xl rounded-full" src="{{asset('storage/'. $employeeImage)}}" alt="Bonnie image"/> 
                        </div>
                        <div class="inline-flex items-center justify-center min-[900px]:justify-start">
                           <div class="ml-8 text-center">
                                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$employeeRecord->first_name}} {{$employeeRecord->middle_name}} {{$employeeRecord->last_name}}</h5>
                                <p class="text-lg text-gray-500 dark:text-gray-400">{{$employeeRecord->employee_type}}</p>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div class="grid grid-cols-1">
                        <div class="grid grid-cols-1 min-[900px]:grid-cols-2 mb-8 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 md:mb-12  bg-white dark:bg-gray-800">
                            <figure class="items-left justify-center pl-8 pt-8 text-left bg-white border-b border-gray-800 rounded-t-lg md:rounded-t-none md:rounded-ss-lg  dark:bg-gray-800 dark:border-gray-700">
                                <blockquote class="max-w-2xl mx-auto mb-4 text-gray-900 lg:mb-8 dark:text-gray-400">
                                    <h3 class="text-xl font-semibold text-blue-700 dark:text-white">Employee Information: </h3>
                                    <p class="my-4"><b>Phone:</b> {{$employeeRecord->phone}} </p>
                                    <p class="my-4"><b>Sex:</b> {{$employeeRecord->gender}}</p>
                                    <p class="my-4"><b>Position:</b> {{$employeeRecord->current_position}}</p>
                                    <p class="my-4 "><b>Personal Email:</b> {{$employeeRecord->personal_email}} </p>
                                </blockquote>
                            </figure>
                            <figure class=" items-center justify-center pl-8 pt-8 text-left bg-white border-b border-gray-800  md:rounded-se-lg dark:bg-gray-800 dark:border-gray-700">
                                <blockquote class="max-w-2xl mx-auto mb-4 text-gray-900 lg:mb-8 dark:text-gray-400">
                                    <br>
                                    <p class="my-4"><b>Age:</b> {{number_format($employeeRecord->age, 0)}}</p>
                                    <p class="my-4"><b>Birth Date:</b> {{$employeeRecord->birth_date}} </p>
                                    <p class="my-4"><b>Address:</b> {{$employeeRecord->address}}</p>
                                    <p class="my-4"><b>School Email:</b> {{$employeeRecord->school_email}}</p>

                                </blockquote>
                            </figure>
                            <figure class="items-center justify-center pl-8 pt-8 text-left bg-white border-b border-gray-800 md:rounded-es-lg md:border-b-0  dark:bg-gray-800 dark:border-gray-700">
                                <blockquote class="max-w-2xl mx-auto mb-4 text-gray-900 lg:mb-8  dark:text-gray-400">
                                    <h3 class="text-xl font-semibold text-blue-700 dark:text-white">Designation: </h3>
                                    <p class="my-4"><b>Department Name:</b> {{$employeeRecord->department_name}}</p>
                                    <p class="my-4"><b>Department Head:</b> {{$employeeRecord->department_head}}</p>
                                    <p class="my-4"><b>Faculty/Non Faculty:</b> {{$employeeRecord->faculty_or_not ? 'Faculty' : 'Not a Faculty' }}</p>
                                    <p class="my-4"><b>Employee ID:</b> {{$employeeRecord->employee_id}} </p>
                                </blockquote>
                            </figure>
                            <figure class=" items-center justify-center pl-8 pt-8 text-left bg-white border-gray-800  rounded-b-lg md:rounded-se-lg dark:bg-gray-800 dark:border-gray-700">
                                <blockquote class="max-w-2xl mx-auto mb-4 text-gray-600 lg:mb-8 dark:text-gray-400">
                                    <h3 class="text-xl font-semibold text-blue-700 dark:text-white">Employee History: </h3>
                                    @if ($employeeHistory)
                                        @foreach ($employeeHistory as $index => $record)
                                            <p class="my-4"><b>{{$index + 1}}. <span class="text-gray-900">{{$record->prev_position}}</span> - <span class="text-gray-700">{{$record->name_of_company}}</span> <br> | {{$record->start_date}} to {{$record->end_date}} </b> </p>
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
                            <h5 class="text-xl font-bold leading-none text-blue-700 dark:text-white">Documents</h5>
                            {{-- <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                                View all
                            </a> --}}
                       </div>
                       <div class="flow-root">
                            <ul role="list" class="divide-y divide-gray-900 dark:divide-gray-700">
                                <li class="py-1 sm:py-2">
                                    <a target="_blank" href="{{route('downloadFile', ['file' => 'photo'])}}" class="text-sm cursor-pointer font-medium text-gray-900 truncate dark:text-white">
                                        <div class="flex items-center ml-4">
                                            <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-blue-600" >
                                                    <path d="M12 9a3.75 3.75 0 1 0 0 7.5A3.75 3.75 0 0 0 12 9Z" />
                                                    <path fill-rule="evenodd" d="M9.344 3.071a49.52 49.52 0 0 1 5.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 0 1-3 3h-15a3 3 0 0 1-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 0 0 1.11-.71l.822-1.315a2.942 2.942 0 0 1 2.332-1.39ZM6.75 12.75a5.25 5.25 0 1 1 10.5 0 5.25 5.25 0 0 1-10.5 0Zm12-1.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                                </svg>                                 
                                            </div>
                                            <div class="flex-1 min-w-0 truncate">
                                                Photo
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @foreach ($empDiploma as $index => $item )
                                    <li class="py-1 sm:py-2">
                                        <a target="_blank" href="{{route('downloadFile', ['file' => 'diploma'])}}" class="text-sm cursor-pointer font-medium text-gray-900 truncate dark:text-white">
                                            <div class="flex items-center ml-4">
                                                <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-blue-600">
                                                        <path d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                                                        <path d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z" />
                                                        <path d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z" />
                                                    </svg> 
                                                </div>
                                                <div class="flex-1 min-w-0 truncate">
                                                    Diploma @if (count($empDiploma) > 1) {{$index + 1}} @endif
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                                @foreach ($empTOR as $index => $item )
                                <li class="py-1 sm:py-2">
                                    <a target="_blank" href="{{route('downloadFile', ['file' => 'tor'])}}" class="text-sm cursor-pointer font-medium text-gray-900 truncate dark:text-white">
                                        <div class="flex items-center ml-4">
                                            <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                                <svg class="w-6 h-6 text-blue-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm-1 9a1 1 0 1 0-2 0v2a1 1 0 1 0 2 0v-2Zm2-5a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1Zm4 4a1 1 0 1 0-2 0v3a1 1 0 1 0 2 0v-3Z" clip-rule="evenodd"/>
                                                  </svg>                                                  
                                            </div>
                                            <div class="flex-1 min-w-0 truncate">
                                                Transcript of Records @if (count($empTOR) > 1) {{$index + 1}} @endif
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                                @foreach ($empCertOfTrainingsSeminars as $index => $item )
                                <li class="py-1 sm:py-2">
                                    <a target="_blank" href="{{route('downloadFile', ['file' => 'certificate'])}}" class="text-sm cursor-pointer font-medium text-gray-900 truncate dark:text-white">
                                        <div class="flex items-center ml-4">
                                            <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                    <path fill-rule="evenodd" d="M4.5 3.75a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V6.75a3 3 0 0 0-3-3h-15Zm4.125 3a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Zm-3.873 8.703a4.126 4.126 0 0 1 7.746 0 .75.75 0 0 1-.351.92 7.47 7.47 0 0 1-3.522.877 7.47 7.47 0 0 1-3.522-.877.75.75 0 0 1-.351-.92ZM15 8.25a.75.75 0 0 0 0 1.5h3.75a.75.75 0 0 0 0-1.5H15ZM14.25 12a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H15a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h3.75a.75.75 0 0 0 0-1.5H15Z" clip-rule="evenodd" />
                                                  </svg>                                                                                            
                                            </div>
                                            <div class="flex-1 min-w-0 truncate">
                                                Certificate of Trainings/Seminars @if (count($empCertOfTrainingsSeminars) > 1) {{$index + 1}} @endif
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                                @foreach ($empAuthCopyOfCscOrPrc as $index => $item )
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0 ms-4 truncate">
                                            <a target="_blank" href="{{route('downloadFile', ['file' => 'csc_eligibility'])}}" class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                Authenticated Copy of CSC Eligibility and/or PRC License
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @foreach ($empAuthCopyOfPrcBoardRating as $index => $item )
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0 ms-4 truncate">
                                            <a target="_blank" href="{{route('downloadFile', ['file' => 'prc_boardrating'])}}" class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                Authenticated copy of PRC Board Rating
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @foreach ($empMedCertif as $index => $item )
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0 ms-4 truncate">
                                            <a target="_blank" href="{{route('downloadFile', ['file' => 'med_cert'])}}" class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                Medical Certificate
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @foreach ($empNBIClearance as $index => $item )
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0 ms-4 truncate">
                                            <a target="_blank" href="{{route('downloadFile', ['file' => 'nbi_clearance'])}}" class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                NBI Clearance
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @foreach ($empPSABirthCertif as $index => $item )
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0 ms-4 truncate">
                                            <a target="_blank" href="{{route('downloadFile', ['file' => 'psa_birthcertificate'])}}" class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                PSA Birth Certifcate
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @foreach ($empPSAMarriageCertif as $index => $item )
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0 ms-4 truncate">
                                            <a target="_blank" href="{{route('downloadFile', ['file' => 'psa_marriagecertificate'])}}" class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                PSA Marriage Certificate
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @foreach ($empServiceRecordFromOtherGovtAgency as $index => $item )
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0 ms-4 truncate">
                                            <a target="_blank" href="{{route('downloadFile', ['file' => 'service_record'])}}" class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                Service Record from other government agency
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @foreach ($empApprovedClearancePrevEmployer as $index => $item )
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0 ms-4 truncate">
                                            <a target="_blank" href="{{route('downloadFile', ['file' => 'approved_clearance'])}}" class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                Approved Clearance from previous employer
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @foreach ($otherDocuments as $index => $item )
                                    <li class="py-1 sm:py-2">
                                        <div class="flex items-center">
                                            <div class="flex-1 min-w-0 ms-4 truncate">
                                                    <a target="_blank" href="{{route('downloadFile', ['file' => 'others', 'index' => $index])}}" class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                        Other Document {{$index + 1}}
                                                    </a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
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