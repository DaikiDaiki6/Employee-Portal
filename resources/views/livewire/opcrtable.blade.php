<div class="main-content">
    <br><br>
    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg dark:border-gray-700 mt-14">
            
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
                    <a href="{{route('opcrtable')}}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">OPCR</a>
                    </div>
                </li>
                {{-- <li aria-current="page">
                    <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Flowbite</span>
                    </div>
                </li> --}}
                </ol>
            </nav>
            <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">OPCR</h2>
  
            
            <div class="flex justify-end">
                <button type="button" onclick="location.href='{{ route('opcrform', ['type' => 'target']) }}'" class="text-white mb-8 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create Target OPCR</button>
                <button type="button" onclick="location.href='{{ route('opcrform', ['type' => 'rated']) }}'" class="text-blue-700 border h-10 border-blue-400 hover:text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 me-2 mb-2 dark:text-blue-300 dark:border-blue-300 dark:hover:text-white dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create Rated OPCR</button>
            
            </div>


            <div class="overflow-x-auto shadow-md sm:rounded-lg bg-white pb-4">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 pb-4">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            {{-- <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th> --}}
                            <th scope="col" class="px-6 py-3 text-center">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Opcr Type
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Date Filled
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Start Period
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                End Period
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Ratee
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Core Rating
                            </th>
                            <th scope="col" class="px-6 py-3 text-center ">
                                Support/Administrative Rating
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Final Rating
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Actions
                            </th>
                            
                        </tr>
                    </thead>
                    <div>
                        <div>
                            @php
                                $ctr = 0;
                                $pageIndex = ($opcrs->currentpage() - 1) * $opcrs->perpage() + $ctr;

                            @endphp
                            @foreach ($opcrs as $index => $opcr)
                            @php
                                $ctr = $ctr + 1;
                                
                            @endphp
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    {{-- <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                        </div>
                                    </td> --}}
                                    <th scope="row" class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$pageIndex + $ctr}}
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white capitalize">
                                        {{$opcr->opcr_type}}
                                    </th>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{$opcr->date_of_filling}}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{$opcr->start_period}}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{$opcr->end_period}}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{$opcr->ratee}}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{$opcr->core_rating}}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{$opcr->supp_admin_rating}}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{$opcr->final_rating}}
                                    </td>

                                    <td class="items-center text-center py-4">
                                        <button data-dropdown-toggle="dropdown{{$loop->index}}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                            </svg>
                                        </button>
                                        <div class="hidden  top-0 right-0 mt-2 z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700" id="dropdown{{$loop->index}}">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLeftButton">
                                                <li>
                                                    <a onclick="location.href='{{ route('opcredit', ['index' => $opcr->id]) }}'"  class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                                </li>
                                                <li>
                                                    <a onclick="location.href='{{ route('opcrpdf', ['index' => $opcr->id]) }}'" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">PDF</a>
                                                </li>
                                               
                                                </ul>
                                            <div class="py-2">
                                                <a wire:click="removeOpcr({{$opcr->id}})"  wire:confirm="Are you sure you want to delete this post?" class="block px-4 py-2 text-black hover:bg-red-600 hover:text-white dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- <td class="items-center px-6 py-4">
                                        <button  data-dropdown-toggle="dropdown{{$loop->index}}" data-dropdown-placement="left" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                                </svg>
                                        </button>

                                        <!-- Dropdown menu -->
                                        <div id="dropdown{{$loop->index}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLeftButton">
                                            <li>
                                                <a onclick="location.href='{{ route('opcredit', ['index' => $opcr->id]) }}'"  class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                            </li>
                                            <li>
                                                <a onclick="location.href='{{ route('opcrpdf', ['index' => $opcr->id]) }}'" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">PDF</a>
                                            </li>
                                           
                                            </ul>
                                            <div class="py-2">
                                                <a wire:click="removeOpcr({{$opcr->id}})"  wire:confirm="Are you sure you want to delete this post?" class="block px-4 py-2 text-black hover:bg-red-600 hover:text-white dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                                            </div>
                                        </div>
                                            
                                          
                                    </td> --}}
                                </tr>
                               
                            </tbody>
                            @endforeach
                            
                        </div>
                     
                       
                    </div>
                </table>
                
            </div>
            <div class="p-4 bg-gray-100 overflow-x-auto w-full">
                {{ $opcrs->links('vendor.pagination.default') }}
            </div>
            

        </div>
    </div> 
</div>