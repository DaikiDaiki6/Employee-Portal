<div class="main-content">
        <div class="p-4 rounded-lg dark:border-gray-700 ">
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
                    <a href="{{route('PayrollTable')}}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Payroll</a>
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
            <h2 class="mb-8 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white ">Payrolls</h2>

            <div class="overflow-x-auto shadow-md sm:rounded-lg bg-white pb-4.">
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
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Salary
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Absences
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Amount Earned
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Witholding Tax
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Net Pay
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
                                $pageIndex = ($PayrollData->currentpage() - 1) * $PayrollData->perpage() + $ctr;
                            @endphp
                            @foreach ($PayrollData as $index =>$data)
                            @php
                                $ctr = $ctr + 1;
                                
                            @endphp
                            <tbody>
                                {{-- wire:click="view({{$data->id}})" --}}
                                <tr  class="hover:cursor-pointer bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$pageIndex + $ctr}}
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white capitalize">
                                        <span  class="text-gray-200 text-xs bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg  px-2 py-1 text-center inline-flex items-center me-2 dark:bg-red-300 dark:hover:bg-red-600 dark:focus:ring-red-800">
                                            {{$data->date}}
                                        </span>
                                    </th>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{$data->salary}}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{number_format($data->absences, 0)}}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{$data->amount_earned}}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{$data->wtax}}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{$data->net_pay}}
                                    </td>
                                    <td e class="items-center text-center py-4">
                                        <button  data-dropdown-toggle="dropdown{{$loop->index}}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                            </svg>
                                        </button>
                                        <div class="hidden  top-0 right-0 mt-2 z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700" id="dropdown{{$loop->index}}">
                                            <!-- Dropdown content -->
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                                                <li>
                                                    <a onclick="location.href='{{ route('PayrollPdf', ['index' =>$data->id]) }}'" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">PDF</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                               
                            </tbody>
                            @endforeach
                            
                        </div>
                       
                    </div>
                    
                </table>
                <div class="p-4 bg-gray-100 w-full">
                    {{ $PayrollData->links('vendor.pagination.default') }}
                </div>
            </div>
            
        </div>
</div>