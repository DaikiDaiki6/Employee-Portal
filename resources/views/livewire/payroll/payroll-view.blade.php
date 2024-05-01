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
            <a href="{{route('PayrollTable')}}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Payroll</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">View</span>
            </div>
        </li>
        </ol>
    </nav> 
    <h2 class="mb-10 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">Payroll Information for <u class="text-blue-500">{{$nameOfDate}}</u></h2>
   
        <div class="grid grid-cols-5 gap-4 w-full  bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
           <div class="col-span-4 gap-2 grid grid-cols-2">
                <div class="w-fulbg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Earnings</h5>
                    </div>
                    <div >
                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                            <li class="pt-3 pb-0 sm:pt-4 mb-4">
                                <div class="grid grid-cols-2 ">
                                    <div class="grid grid-cols-2 min-w-0 ">
                                        <ul class="max-w-md space-y-1 whitespace-nowrap text-gray-500 list-disc list-inside dark:text-gray-400">
                                            <li>
                                                Lvt-Pay 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="text-end pr-4 text-base font-semibold text-gray-900 dark:text-white">
                                        ₱{{$payrollData->lvt_pay}}
                                    </div>
                                </div>
                            </li>
                            <li class="pt-3 pb-0 sm:pt-4 mb-4">
                                <div class="grid grid-cols-2 ">
                                    <div class="grid grid-cols-2 min-w-0 ">
                                        <ul class="max-w-md space-y-1 whitespace-nowrap text-gray-500 list-disc list-inside dark:text-gray-400">
                                            <li>
                                                P.E.R.A
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="text-end pr-4 text-base font-semibold text-gray-900 dark:text-white">
                                        ₱{{$payrollData->pera}}
                                    </div>
                                </div>
                            </li>
                            <li class="pt-3 pb-0 sm:pt-4 mb-4">
                                <div class="grid grid-cols-2 ">
                                    <div class="grid grid-cols-2 min-w-0 ">
                                        <ul class="max-w-md whitespace-nowrap space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                                            <li class="">
                                                Study Grant
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="text-end pr-4 text-base font-semibold text-gray-900 dark:text-white">
                                        ₱{{$payrollData->study_grant}}
                                    </div>
                                </div>
                            </li>
                            <li class="pt-3 pb-0 sm:pt-4 mb-4">
                                <div class="grid grid-cols-2 ">
                                    <div class="grid grid-cols-2 min-w-0 ">
                                        <ul class="max-w-md space-y-1 whitespace-nowrap text-gray-500 list-disc list-inside dark:text-gray-400">
                                            <li>
                                                PLM CPPI
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="text-end pr-4 text-base font-semibold text-gray-900 dark:text-white">
                                        ₱{{$payrollData->plmpcci}}
                                    </div>
                                </div>
                            </li>
                            <li class="pt-3 pb-0 sm:pt-4 mb-4">
                                <div class="grid grid-cols-2 ">
                                    <div class="grid grid-cols-2 min-w-0 ">
                                        <ul class="max-w-md space-y-1 whitespace-nowrap text-gray-500 list-disc list-inside dark:text-gray-400">
                                            <li>
                                                Incentives
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="text-end pr-4 text-base font-semibold text-gray-900 dark:text-white">
                                        ₱{{$payrollData->lvt_pay}}
                                    </div>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </div>
                <div class="w-full   bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Deductions</h5>
                    </div>
                    <div >
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                <li class="pt-3 pb-0 sm:pt-4 mb-4">
                                    <div class="grid grid-cols-2 ">
                                        <div class="grid grid-cols-2 min-w-0 ">
                                            <ul class="max-w-md space-y-1 whitespace-nowrap text-gray-500 list-disc list-inside dark:text-gray-400">
                                                <li>
                                                    GSIS
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text-end pr-4 text-base font-semibold text-gray-900 dark:text-white">
                                            ₱{{$payrollData->gsis_deduction}}
                                        </div>
                                    </div>
                                </li>
                                <li class="pt-3 pb-0 sm:pt-4 mb-4">
                                    <div class="grid grid-cols-2 ">
                                        <div class="grid grid-cols-2 min-w-0 ">
                                            <ul class="max-w-md space-y-1 whitespace-nowrap text-gray-500 list-disc list-inside dark:text-gray-400">
                                                <li>
                                                    Withholding Tax
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text-end pr-4 text-base font-semibold text-gray-900 dark:text-white">
                                            ₱{{$payrollData->wtax}}
                                        </div>
                                    </div>
                                </li>
                                <li class="pt-3 pb-0 sm:pt-4 mb-4">
                                    <div class="grid grid-cols-2 ">
                                        <div class="grid grid-cols-2 min-w-0 ">
                                            <ul class="max-w-md space-y-1 whitespace-nowrap text-gray-500 list-disc list-inside dark:text-gray-400">
                                                <li>
                                                    Philhealth
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text-end pr-4 text-base font-semibold text-gray-900 dark:text-white">
                                            ₱{{$payrollData->philhealth}}
                                        </div>
                                    </div>
                                </li>
                                <li class="pt-3 pb-0 sm:pt-4 mb-4">
                                    <div class="grid grid-cols-2 ">
                                        <div class="grid grid-cols-2 min-w-0 ">
                                            <ul class="max-w-md space-y-1 whitespace-nowrap text-gray-500 list-disc list-inside dark:text-gray-400">
                                                <li>
                                                    Pag-Ibig
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text-end pr-4 text-base font-semibold text-gray-900 dark:text-white">
                                            ₱{{$payrollData->pag_ibig}}
                                        </div>
                                    </div>
                                </li>
                                <li class="pt-3 pb-0 sm:pt-4 mb-4">
                                    <div class="grid grid-cols-2 ">
                                        <div class="grid grid-cols-2 min-w-0 ">
                                            <ul class="max-w-md space-y-1 whitespace-nowrap text-gray-500 list-disc list-inside dark:text-gray-400">
                                                <li>
                                                    Maxicare
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text-end pr-4 text-base font-semibold text-gray-900 dark:text-white">
                                            ₱{{$payrollData->maxicare}}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                    </div>
                </div>
           </div>
           <div class="w-full  bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Payroll Summary</h5>
           </div>
           <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="py-3 sm:py-4">
                        <div class="grid grid-cols-3 mb-2">
                            <p class="text-sm font-medium text-gray-900  dark:text-white col-span-2">
                                * Base Pay
                            </p>
                            <div class="text-right  text-base font-semibold  whitespace-nowrap text-gray-900 dark:text-white">
                                ₱{{number_format($payrollData->salary, 0)}} @if($faculty == True) /hr @endif
                            </div>
                        </div>
                        <div>
                            +
                        </div>
                        <div class="grid grid-cols-3 gap-4 mt-3">
                            <p class="text-sm font-medium text-gray-900  dark:text-white col-span-2">
                                * Total Earnings
                            </p>
                            <div class="text-right inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                ₱{{$total_earnings}}
                            </div>
                        </div>
                    </li>
                    
                    <li>
                        <b>-</b>
                        <div class="grid grid-cols-3 gap-4 mb-2  mt-2">
                            <p class="text-sm font-medium text-gray-900  dark:text-white col-span-2">
                                * Total Deductions
                            </p>
                            <div class="text-right inline-flex items-center text-base font-semibold  whitespace-nowrap text-gray-900 dark:text-white">
                                ₱{{number_format($total_deductions, 0)}} 
                            </div>
                        </div>
                       
                        
                    </li>
                    
                </ul>
           </div>
        </div>
        <div class="col-start-3">
            <div class="w-2/3">
                <div class="bg-white border text-xl text-center border-gray-200 rounded-lg shadow p-4 dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
                    <b>NET PAY:</b> ₱{{$net_pay}}
                </div>
                
            </div>
            
        </div>
           
    </div>
</div>