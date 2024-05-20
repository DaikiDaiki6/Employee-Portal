<div class="main-content">
        <div class="border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 ">
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
                            <img class="ml-8 w-36 h-36 mb-3 shadow-xl rounded-full" src="{{ asset($employeeImage ? 'storage/' . $employeeImage : 'photos/avatar/default.png') }}" alt="Employee Image"/> 
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
                        <div class="grid grid-cols-1 min-[900px]:grid-cols-2 mb-2 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 md:mb-12  bg-white dark:bg-gray-800">
                            <figure class="items-left justify-center pl-8 mt-6 text-left bg-white border-b border-gray-800 rounded-t-lg md:rounded-t-none md:rounded-ss-lg  dark:bg-gray-800 dark:border-gray-700">
                                <blockquote class="max-w-2xl mx-auto mb-2 text-gray-900 lg:mb-8 dark:text-gray-400">
                                    <h3 class="text-xl font-semibold text-blue-700 dark:text-white">Employee Information: </h3>
                                    <p class="my-4"><b>Phone:</b> {{$employeeRecord->phone}} </p>
                                    <p class="my-4"><b>Sex:</b> {{$employeeRecord->gender}}</p>
                                    <p class="my-4"><b>Position:</b> {{$employeeRecord->current_position}}</p>
                                    <p class="my-4 "><b>Personal Email:</b> {{$employeeRecord->personal_email}} </p>
                                </blockquote>
                            </figure>
                            <figure class=" items-center justify-center pl-8 mt-6 text-left bg-white border-b border-gray-800  md:rounded-se-lg dark:bg-gray-800 dark:border-gray-700">
                                <blockquote class="max-w-2xl mx-auto mb-4 text-gray-900 lg:mb-8 dark:text-gray-400">
                                    <br>
                                    <p class="my-4"><b>Age:</b> {{number_format($employeeRecord->age, 0)}}</p>
                                    <p class="my-4"><b>Birth Date:</b> {{$employeeRecord->birth_date}} </p>
                                    <p class="my-4"><b>Address:</b> {{$employeeRecord->address}}</p>
                                    <p class="my-4"><b>School Email:</b> {{$employeeRecord->school_email}}</p>
                                </blockquote>
                            </figure>
                            <figure class="items-center justify-center pl-8 mt-6 text-left bg-white border-b border-gray-800 md:rounded-es-lg md:border-b-0  dark:bg-gray-800 dark:border-gray-700">
                                <blockquote class="max-w-2xl mx-auto mb-4 text-gray-900 lg:mb-8  dark:text-gray-400">
                                    <h3 class="text-xl font-semibold text-blue-700 dark:text-white">Designation: </h3>
                                    <p class="my-4"><b>Department Name:</b> {{$employeeRecord->department_name}}</p>
                                    <p class="my-4"><b>Department Head:</b> {{$employeeRecord->department_head}}</p>
                                    <p class="my-4"><b>Faculty/Non Faculty:</b> {{$employeeRecord->faculty_or_not ? 'Faculty' : 'Not a Faculty' }}</p>
                                    <p class="my-4"><b>Employee ID:</b> {{$employeeRecord->employee_id}} </p>
                                </blockquote>
                            </figure>
                            <figure class=" items-center justify-center pl-8 mt-6 text-left bg-white border-gray-800  rounded-b-lg md:rounded-se-lg dark:bg-gray-800 dark:border-gray-700">
                                <blockquote class="max-w-2xl mx-auto mb-4 text-gray-600 lg:mb-8 dark:text-gray-400">
                                    <h3 class="text-xl font-semibold text-blue-700 dark:text-white">Employee History: </h3>
                                    @if ($employeeHistory)
                                        @foreach ($employeeHistory as $index => $record)
                                            <p class="my-4"><b>{{$index + 1}}. <span class="text-gray-900">{{$record->prev_position}}</span> - <span class="text-gray-700">{{$record->name_of_company}}</span> <br> | {{$record->start_date}} to {{$record->end_date}} </b> </p>
                                        @endforeach
                                    @else
                                        <div class="text-gray-800">
                                            <p class="my-4"><b>1. Don't Worry </b> </p>
                                            <p class="my-4"><b>2. Plenty of Opportunities</b> </p>
                                            <p class="my-4"><b>3. Awaits!!!!!!!! </b> </p>
                                        </div>
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
                                @if ($employeeImage)
                                <li class="py-1 sm:py-2">
                                    <a target="_blank" href="{{route('downloadFile', ['file' => 'photo'])}}" class="text-sm cursor-pointer font-medium text-gray-900 truncate dark:text-white">
                                        <div class="flex items-center ml-4">
                                            <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 " >
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
                                @else
                                <li class="py-1 sm:py-2">
                                        <div class="flex items-center ml-4">
                                            <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                                                  </svg>
                                                                             
                                            </div>
                                            <div class="flex-1 min-w-0 truncate">
                                                Nothing to See here.
                                            </div>
                                        </div>
                                </li>

                                @endif
                                @foreach ($empDiploma as $index => $item )
                                    <li class="py-1 sm:py-2">
                                        <a target="_blank" href="{{route('downloadFile', ['file' => 'diploma', 'index' => $index])}}" class="text-sm cursor-pointer font-medium text-gray-900 truncate dark:text-white">
                                            <div class="flex items-center ml-4">
                                                <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 ">
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
                                @foreach ($emp_tor as $index => $item )
                                <li class="py-1 sm:py-2">
                                    <a target="_blank" href="{{route('downloadFile', ['file' => 'tor', 'index' => $index])}}" class="text-sm cursor-pointer font-medium text-gray-900 truncate dark:text-white">
                                        <div class="flex items-center ml-4">
                                            <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                                <svg class="w-6 h-6  dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm-1 9a1 1 0 1 0-2 0v2a1 1 0 1 0 2 0v-2Zm2-5a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1Zm4 4a1 1 0 1 0-2 0v3a1 1 0 1 0 2 0v-3Z" clip-rule="evenodd"/>
                                                  </svg>                                                  
                                            </div>
                                            <div class="flex-1 min-w-0 truncate ">
                                                Transcript of Records @if (count($emp_tor) > 1) {{$index + 1}} @endif
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                                @foreach ($empCertOfTrainingsSeminars as $index => $item )
                                <li class="py-1 sm:py-2">
                                    <a target="_blank" href="{{route('downloadFile', ['file' => 'certificate', 'index' => $index])}}" class="text-sm cursor-pointer font-medium text-gray-900 truncate dark:text-white">
                                        <div class="flex items-center ml-4">
                                            <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 ">
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
                                    <a target="_blank" href="{{route('downloadFile', ['file' => 'csc_eligibility', 'index' => $index])}}" class="text-sm cursor-pointer font-medium text-gray-900 truncate dark:text-white">
                                        <div class="flex items-center ml-4">
                                            <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 ">
                                                    <path fill-rule="evenodd" d="M4.5 3.75a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V6.75a3 3 0 0 0-3-3h-15Zm4.125 3a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Zm-3.873 8.703a4.126 4.126 0 0 1 7.746 0 .75.75 0 0 1-.351.92 7.47 7.47 0 0 1-3.522.877 7.47 7.47 0 0 1-3.522-.877.75.75 0 0 1-.351-.92ZM15 8.25a.75.75 0 0 0 0 1.5h3.75a.75.75 0 0 0 0-1.5H15ZM14.25 12a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H15a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h3.75a.75.75 0 0 0 0-1.5H15Z" clip-rule="evenodd" />
                                                  </svg>
                                                                                                                                           
                                            </div>
                                            <div class="flex-1 min-w-0 truncate">
                                                Authenticated Copy of CSC or PRC license @if (count($empAuthCopyOfCscOrPrc) > 1) {{$index + 1}} @endif
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                                @foreach ($empAuthCopyOfPrcBoardRating as $index => $item )
                                <li class="py-1 sm:py-2">
                                    <a target="_blank" href="{{route('downloadFile', ['file' => 'prc_boardrating', 'index' => $index])}}" class="text-sm cursor-pointer font-medium text-gray-900 truncate dark:text-white">
                                        <div class="flex items-center ml-4">
                                            <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M18 14a1 1 0 1 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 1 0 2 0v-2h2a1 1 0 1 0 0-2h-2v-2Z" clip-rule="evenodd"/>
                                                    <path fill-rule="evenodd" d="M15.026 21.534A9.994 9.994 0 0 1 12 22C6.477 22 2 17.523 2 12S6.477 2 12 2c2.51 0 4.802.924 6.558 2.45l-7.635 7.636L7.707 8.87a1 1 0 0 0-1.414 1.414l3.923 3.923a1 1 0 0 0 1.414 0l8.3-8.3A9.956 9.956 0 0 1 22 12a9.994 9.994 0 0 1-.466 3.026A2.49 2.49 0 0 0 20 14.5h-.5V14a2.5 2.5 0 0 0-5 0v.5H14a2.5 2.5 0 0 0 0 5h.5v.5c0 .578.196 1.11.526 1.534Z" clip-rule="evenodd"/>
                                                  </svg>                                                                                   
                                            </div>
                                            <div class="flex-1 min-w-0 truncate">
                                                Authenticated copy of PRC Board Rating @if (count($empAuthCopyOfPrcBoardRating) > 1) {{$index + 1}} @endif
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                                @foreach ($empMedCertif as $index => $item )
                                <li class="py-1 sm:py-2">
                                    <a target="_blank" href="{{route('downloadFile', ['file' => 'med_cert', 'index' => $index])}}" class="text-sm cursor-pointer font-medium text-gray-900 truncate dark:text-white">
                                        <div class="flex items-center ml-4">
                                            <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M4 4a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2v14a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2V5a1 1 0 0 1-1-1Zm5 2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-1Zm-5 4a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1Zm-3 4a2 2 0 0 0-2 2v3h2v-3h2v3h2v-3a2 2 0 0 0-2-2h-2Z" clip-rule="evenodd"/>
                                                  </svg>
                                                                                                                                   
                                            </div>
                                            <div class="flex-1 min-w-0 truncate">
                                                Medical Certificate @if (count($empMedCertif) > 1) {{$index + 1}} @endif
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                                @foreach ($empNBIClearance as $index => $item )
                                <li class="py-1 sm:py-2">
                                    <a target="_blank" href="{{route('downloadFile', ['file' => 'nbi_clearance', 'index' => $index])}}" class="text-sm cursor-pointer font-medium text-gray-900 truncate dark:text-white">
                                        <div class="flex items-center ml-4">
                                            <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M11.644 3.066a1 1 0 0 1 .712 0l7 2.666A1 1 0 0 1 20 6.68a17.694 17.694 0 0 1-2.023 7.98 17.406 17.406 0 0 1-5.402 6.158 1 1 0 0 1-1.15 0 17.405 17.405 0 0 1-5.403-6.157A17.695 17.695 0 0 1 4 6.68a1 1 0 0 1 .644-.949l7-2.666Zm4.014 7.187a1 1 0 0 0-1.316-1.506l-3.296 2.884-.839-.838a1 1 0 0 0-1.414 1.414l1.5 1.5a1 1 0 0 0 1.366.046l4-3.5Z" clip-rule="evenodd"/>
                                                  </svg>
                                                  
                                                                                                                                   
                                            </div>
                                            <div class="flex-1 min-w-0 truncate">
                                                NBI Clearance @if (count($empNBIClearance) > 1) {{$index + 1}} @endif
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                                @foreach ($empPSABirthCertif as $index => $item )
                                <li class="py-1 sm:py-2">
                                    <a target="_blank" href="{{route('downloadFile', ['file' => 'psa_birthcertificate', 'index' => $index])}}" class="text-sm cursor-pointer font-medium text-gray-900 truncate dark:text-white">
                                        <div class="flex items-center ml-4">
                                            <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M7 2a2 2 0 0 0-2 2v1a1 1 0 0 0 0 2v1a1 1 0 0 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H7Zm3 8a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm-1 7a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3 1 1 0 0 1-1 1h-6a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                                                  </svg>
                                                                                                                          
                                            </div>
                                            <div class="flex-1 min-w-0 truncate">
                                                PSA Birth Certifcate @if (count($empPSABirthCertif) > 1) {{$index + 1}} @endif
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                                @foreach ($empPSAMarriageCertif as $index => $item )
                                <li class="py-1 sm:py-2">
                                    <a target="_blank" href="{{route('downloadFile', ['file' => 'psa_marriagecertificate', 'index' => $index])}}" class="text-sm cursor-pointer font-medium text-gray-900 truncate dark:text-white">
                                        <div class="flex items-center ml-4">
                                            <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                                {{ svg('bxs-church', ['class' => 'w-6 h-6 text-gray-800 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white']) }}                                                
                                            </div>
                                            <div class="flex-1 min-w-0 truncate">
                                                PSA Marriage Certificate @if (count($empPSAMarriageCertif) > 1) {{$index + 1}} @endif
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                                @foreach ($empServiceRecordFromOtherGovtAgency as $index => $item )
                                <li class="py-1 sm:py-2">
                                    <a target="_blank" href="{{route('downloadFile', ['file' => 'service_record', 'index' => $index])}}" class="text-sm cursor-pointer font-medium text-gray-900 truncate dark:text-white">
                                        <div class="flex items-center ml-4">
                                            <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                                {{ svg('bxs-receipt', ['class' => 'w-6 h-6 text-gray-800 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white']) }}                                                
                                            </div>
                                            <div class="flex-1 min-w-0 truncate">
                                                Service Record from other government agency @if (count($empServiceRecordFromOtherGovtAgency) > 1) {{$index + 1}} @endif
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                                @foreach ($empApprovedClearancePrevEmployer as $index => $item )
                                <li class="py-1 sm:py-2">
                                    <a target="_blank" href="{{route('downloadFile', ['file' => 'approved_clearance', 'index' => $index])}}" class="text-sm cursor-pointer font-medium text-gray-900 truncate dark:text-white">
                                        <div class="flex items-center ml-4">
                                            <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                                {{ svg('bxs-user-check', ['class' => 'w-6 h-6 text-gray-800 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white']) }}                                                
                                            </div>
                                            <div class="flex-1 min-w-0 truncate">
                                                Approved Clearance from previous employer @if (count($empApprovedClearancePrevEmployer) > 1) {{$index + 1}} @endif
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                                @foreach ($otherDocuments as $index => $item )
                                    <li class="py-1 sm:py-2">
                                        <a target="_blank" href="{{route('downloadFile', ['file' => 'others', 'index' => $index])}}" class="text-sm cursor-pointer font-medium text-gray-900 truncate dark:text-white">
                                            <div class="flex items-center ml-4">
                                                <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                        <path d="M7.5 3.375c0-1.036.84-1.875 1.875-1.875h.375a3.75 3.75 0 0 1 3.75 3.75v1.875C13.5 8.161 14.34 9 15.375 9h1.875A3.75 3.75 0 0 1 21 12.75v3.375C21 17.16 20.16 18 19.125 18h-9.75A1.875 1.875 0 0 1 7.5 16.125V3.375Z" />
                                                        <path d="M15 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 17.25 7.5h-1.875A.375.375 0 0 1 15 7.125V5.25ZM4.875 6H6v10.125A3.375 3.375 0 0 0 9.375 19.5H16.5v1.125c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V7.875C3 6.839 3.84 6 4.875 6Z" />
                                                      </svg>
                                                      
                                                </div>
                                                <div class="flex-1 min-w-0 truncate">
                                                    Other Document @if (count($otherDocuments) > 1) {{$index + 1}} @endif
                                                </div>
                                            </div>
                                        </a>
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