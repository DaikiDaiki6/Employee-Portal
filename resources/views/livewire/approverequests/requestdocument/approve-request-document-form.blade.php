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
            <a href="{{route('ApproveRequestDocumentTable')}}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Request Document</a>
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
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">Approve a new Document Request</h2>
    <section class="bg-white dark:bg-gray-900 pb-24 px-8  rounded-lg">
        <div class=" px-1 mx-auto pt-8">
            <form wire:submit.prevent="submit" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    <div class="block w-full col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                        <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                            {{-- Application Date --}}

                            <div class="grid grid-cols-2 gap-4 min-[1000px]:grid-cols-2  col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                                <div class="w-full">
                                    <h2><b>Reference Number</b></h2>
                                    <input type="text" wire:model="ref_number" 
                                        class="bg-gray-50 border mt-4 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                         required disabled>
                                </div>
                                <div class="w-full">
                                    <h2><b>Date of Filling</b></h2>
                                    <input type="date" wire:model="date_of_filling" 
                                        class="bg-gray-50 border mt-4 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
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
                                                         required="" disabled>
                                                </div>
                                                <div class="w-full">
                                                    <label for="employee_type"
                                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Employee ID <span class="text-red-600">*</span></label>
                                                    <input type="text" name="employee_type" id="employee_type"  value="{{$employee_type}}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                         required="" disabled>
                                                </div>
                                                <div class="w-full">
                                                    <label for="current_position"
                                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Employee ID <span class="text-red-600">*</span></label>
                                                    <input type="text" name="current_position" id="current_position"  value="{{$current_position}}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                         required="" disabled>
                                                </div>
                                            </div>
                                            
                                    </div>
                        
                                
                            </div>
                        </div>
                        <div class="grid grid-cols-1 mt-6 col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                            <h2><b>Request For<span class="text-red-600">*</span></b></h2>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="grid grid-cols-1 gap-4">
                                    <div class="flex items-center mt-4 ">
                                        <input disabled id="request1" type="checkbox" value="Certificate of Employment" wire:model="requests" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="request1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Certificate of Employment</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input disabled id="request2" type="checkbox" value="Certificate of Employment with Compensation" wire:model="requests" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="request2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Certificate of Employment with Compensation</label>
                                    </div>  
                                    <div class="flex items-center">
                                        <input disabled id="request3" type="checkbox" value="Service Record" wire:model="requests" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="request3" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Service Record</label>
                                    </div>  
                                    <div class="flex items-center">
                                        <input disabled id="request4" type="checkbox" value="Part-time Teaching Services" wire:model="requests" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="request4" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Part-time Teaching Services</label>
                                    </div>  
                                </div>
                                <div class="grid grid-cols-1 gap-4">
                                    <div class="flex items-center mt-4 ">
                                        <input disabled id="request5" type="checkbox" value="MILC Certification" wire:model="requests" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="request5" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">MILC Certification</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input disabled id="request6" type="checkbox" value="Certificate of No Pending Administrative Case" wire:model="requests" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="request" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Certificate of No Pending Administrative Case</label>
                                    </div>  
                                    <div class="flex items-center">
                                        <input disabled id="request7" type="checkbox" value="Others" wire:model.live="requests" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="request" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Others</label>
                                    </div>  
                                    <div class="flex items-center">
                                        &nbsp;
                                    </div>  
                                </div>
                            </div>
                           
                            @if(in_array('Others', $requests) or in_array('MILC Certification', $requests) )
                            <div class="grid grid-cols-2 gap-4 mt-5 ">
                                @if (in_array('MILC Certification', $requests))
                                <div class="grid grid-cols-1 ">
                                    <label for="milc_certification"
                                    class="block mb-2  text-sm font-medium  text-gray-900 dark:text-white">MILC Description<span class="text-red-600">*</span> (If chosen MILC certification)</label>
                                    <textarea disabled type="text" rows="2" id="milc_description" name="milc_description" wire:model="milc_description"
                                    placeholder="Write your purpose here."  required
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </textarea>
                                </div>
                                @endif
                                @if(in_array('Others', $requests))
                                <div class="grid grid-cols-1 ">
                                    <label for="other_request"
                                    class="block mb-2  text-sm font-medium  text-gray-900 dark:text-white">Other Requests<span class="text-red-600">*</span> (If chosen Others)</label>
                                    <textarea disabled type="text" rows="2" id="other_request" name="other_request" wire:model="other_request"
                                    placeholder="Write your purpose here." required
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </textarea>
                                </div>
                                @endif
                            </div>

                            @endif
                            
 
                        </div>
                        
                        <div class="grd grid-cols-1 p-6 mt-5 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                            <h2><b>Purpose And Signature<span class="text-red-600">*</span></b></h2>
                            <div class="grid grid-cols-2 gap-4 mt-4">
                                <div class="grid grid-cols-1 gap-4 p-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                                    <div>
                                        <label for="purpose"
                                        class="block mb-2  text-sm font-medium  text-gray-900 dark:text-white">Purpose <span class="text-red-600">*</span></label>
                                        <textarea disabled type="text" rows="6" id="purpose" name="purpose" wire:model="purpose"
                                        placeholder="Write your purpose here."   
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </textarea>
                                    </div>
                                </div>
                              
                                {{-- Academic Affairs --}}
                                <div class="grid grid-cols-1 items-start gap-4">
                                    <div class="col-span-2 grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                        <label for="signature_requesting_party"
                                        class="block text-sm font-medium text-gray-900 dark:text-white">Signature of the Requesting Party<span class="text-red-600">*</span></label>
                                        <div class="grid grid-cols-1 items-center justify-center w-full">
                                            @if($signature_requesting_party)
                                                <label for="signature_requesting_party" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    @if(is_string($signature_requesting_party) == True)
                                                        @php
                                                            $signature_requesting_party = $this->getApplicantSignature();
                                                        @endphp
                                                        <img src="data:image/gif;base64,{{ base64_encode($signature_requesting_party) }}" alt="Image Description" class="w-full h-full object-contain"> 
                                                    @else
                                                        <img src="{{ $signature_requesting_party->temporaryUrl() }}" class="w-full h-full object-contain" alt="Uploaded Image">
                                                    @endif
                                                    <input disabled id="signature_requesting_party" type="file" class="hidden" wire:model.live="signature_requesting_party">
                                                </label>
                                            @else
                                                <label for="signature_requesting_party" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                        <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                        </svg>
                                                        <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                        <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG, or PDF file (Max: 5 MB size)</p>
                                                    </div>
                                                    <input disabled id="signature_requesting_party" type="file" class="hidden" wire:model.blur="signature_requesting_party">
                                                </label>
                                            @endif
                                            @error('signature_of_vp_for_academic_affair')
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

                        <div class="grd grid-cols-1 p-6 mt-5 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                            <h2><b>Document Requests<span class="text-red-600">*</span></b></h2>
                            <div class="grid grid-cols-2 gap-4 mt-4">

                                 {{-- Certificate of Employment --}}
                                 @if(in_array('Certificate of Employment', $requests))
                                 <div class="grid grid-cols-1 gap-4">
                                    <div class="col-span-2 grid grid-cols-1 p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                        <label for="certificate_of_employment"
                                        class="block text-sm font-medium text-gray-900 dark:text-white">Certificate of Employment<span class="text-red-600">*</span></label>
                                        <div class="grid grid-cols-1 items-center justify-center w-full">
                                            @if($certificate_of_employment)
                                                <label for="certificate_of_employment" class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    @if(str_ends_with($certificate_of_employment, 'pdf'))
                                                        {{-- <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 17v-5h1.5a1.5 1.5 0 1 1 0 3H5m12 2v-5h2m-2 3h2M5 10V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v6M5 19v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1M10 3v4a1 1 0 0 1-1 1H5m6 4v5h1.375A1.627 1.627 0 0 0 14 15.375v-1.75A1.627 1.627 0 0 0 12.375 12H11Z"/>
                                                        </svg> --}}
                                                        @php
                                                            $certificate_of_employment = $this->getCertificateOfEmployment();
                                                        @endphp
                                                        <img src="data:image/gif;base64,{{ base64_encode($certificate_of_employment) }}" alt="Image Description" class="w-full h-full object-contain"> 
                                                    @elseif(is_string($certificate_of_employment) == True)
                                                        @php
                                                            $certificate_of_employment = $this->getCertificateOfEmployment();
                                                        @endphp
                                                        <img src="data:image/gif;base64,{{ base64_encode($certificate_of_employment) }}" alt="Image Description" class="w-full h-full object-contain"> 
                                                    @else
                                                        <img src="{{ $certificate_of_employment->temporaryUrl() }}" class="w-full h-full object-contain" alt="Uploaded File">
                                                    @endif
                                                    <input id="certificate_of_employment" type="file" class="hidden" wire:model.live="certificate_of_employment">
                                                    <button type="button" wire:click="removeImage('certificate_of_employment')" class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                </label>
                                            @else
                                                <label for="certificate_of_employment" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                        <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                        </svg>
                                                        <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                        <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG, or PDF file (Max: 5 MB size)</p>
                                                    </div>
                                                    <input id="certificate_of_employment" type="file" class="hidden" wire:model.blur="certificate_of_employment">
                                                </label>
                                            @endif
                                            @error('certificate_of_employment')
                                                <div class="transition transform alert alert-danger"
                                                        x-init="$el.closest('form').scrollIntoView()">
                                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if(in_array('Certificate of Employment with Compensation', $requests))
                                 {{-- Certificate of Employment with Compensation --}} 
                                    <div class="grid grid-cols-1 gap-4">
                                        <div class="col-span-2 grid grid-cols-1 p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                            <label for="certificate_of_employment_with_compensation"
                                            class="block text-sm font-medium text-gray-900 dark:text-white">Certificate of Employment with Compensation<span class="text-red-600">*</span></label>
                                            <div class="grid grid-cols-1 items-center justify-center w-full">
                                                @if($certificate_of_employment_with_compensation)
                                                    <label for="certificate_of_employment_with_compensation" class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                        @if(is_string($certificate_of_employment_with_compensation) == True)
                                                            @php
                                                                $certificate_of_employment_with_compensation = $this->getCertificateOfEmploymentWithCompensation();
                                                            @endphp
                                                            <img src="data:image/gif;base64,{{ base64_encode($certificate_of_employment_with_compensation) }}" alt="Image Description" class="w-full h-full object-contain"> 
                                                        @else
                                                            <img src="{{ $certificate_of_employment_with_compensation->temporaryUrl() }}" class="w-full h-full object-contain" alt="Uploaded File">
                                                        @endif
                                                        <input id="certificate_of_employment_with_compensation" type="file" class="hidden" wire:model.live="certificate_of_employment_with_compensation">
                                                        <button type="button" wire:click="removeImage('certificate_of_employment_with_compensation')" class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                            </svg>
                                                        </button>
                                                    </label>
                                                @else
                                                    <label for="certificate_of_employment_with_compensation" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                            <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                            </svg>
                                                            <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                            <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG, or PDF file (Max: 5 MB size)</p>
                                                        </div>
                                                        <input id="certificate_of_employment_with_compensation" type="file" class="hidden" wire:model.blur="certificate_of_employment_with_compensation">
                                                    </label>
                                                @endif
                                                @error('certificate_of_employment_with_compensation')
                                                    <div class="transition transform alert alert-danger"
                                                            x-init="$el.closest('form').scrollIntoView()">
                                                        <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                    </div> 
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                
                                @if(in_array('Service Record', $requests))
                                 {{-- Service Record --}}
                                 <div class="grid grid-cols-1 gap-4">
                                    <div class="col-span-2 grid grid-cols-1 p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                        <label for="service_record"
                                        class="block text-sm font-medium text-gray-900 dark:text-white">Service Record<span class="text-red-600">*</span></label>
                                        <div class="grid grid-cols-1 items-center justify-center w-full">
                                            <label for="service_record" class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            @if($service_record)
                                                @if(is_string($service_record) == True)
                                                    @php
                                                        $service_record = $this->getServiceRecord();
                                                    @endphp
                                                    <img src="data:image/gif;base64,{{ base64_encode($service_record) }}" alt="Image Description" class="w-full h-full object-contain"> 
                                                @elseif(str_ends_with($service_record, 'pdf'))
                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 17v-5h1.5a1.5 1.5 0 1 1 0 3H5m12 2v-5h2m-2 3h2M5 10V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v6M5 19v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1M10 3v4a1 1 0 0 1-1 1H5m6 4v5h1.375A1.627 1.627 0 0 0 14 15.375v-1.75A1.627 1.627 0 0 0 12.375 12H11Z"/>
                                                    </svg>
                                                @else
                                                    <img src="{{ $service_record->temporaryUrl() }}" class="w-full h-full object-contain" alt="Uploaded File">
                                                @endif
                                                <input id="service_record" type="file" class="hidden" wire:model="service_record">
                                                <button type="button" wire:click="removeImage('service_record')" class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>
                                            @else
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                    </svg>
                                                    <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                    <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG, or PDF file (Max: 5 MB size)</p>
                                                </div>
                                                <input id="service_record" type="file" class="hidden" wire:model.blur="service_record">
                                            @endif
                                            </label>
                                            @error('service_record')
                                                <div class="transition transform alert alert-danger"
                                                        x-init="$el.closest('form').scrollIntoView()">
                                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if(in_array('Part time Teaching Services', $requests))
                                {{-- Part-Time Teaching Service--}}
                                <div class="grid grid-cols-1 gap-4">
                                <div class="col-span-2 grid grid-cols-1 p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                    <label for="part_time_teaching_services"
                                    class="block text-sm font-medium text-gray-900 dark:text-white">Part-Time Teaching Service<span class="text-red-600">*</span></label>
                                    <div class="grid grid-cols-1 items-center justify-center w-full">
                                        <label for="part_time_teaching_services" class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        @if($part_time_teaching_services)
                                            @if(is_string($part_time_teaching_services) == True)
                                                @php
                                                    $part_time_teaching_services = $this->getPartTimeTeachingServices();
                                                @endphp
                                                <img src="data:image/gif;base64,{{ base64_encode($part_time_teaching_services) }}" alt="Image Description" class="w-full h-full object-contain"> 
                                            @elseif(str_ends_with($part_time_teaching_services, 'pdf'))
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 17v-5h1.5a1.5 1.5 0 1 1 0 3H5m12 2v-5h2m-2 3h2M5 10V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v6M5 19v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1M10 3v4a1 1 0 0 1-1 1H5m6 4v5h1.375A1.627 1.627 0 0 0 14 15.375v-1.75A1.627 1.627 0 0 0 12.375 12H11Z"/>
                                                </svg>

                                            @else
                                                <img src="{{ $part_time_teaching_services->temporaryUrl() }}" class="w-full h-full object-contain" alt="Uploaded File">
                                            @endif
                                            <input id="part_time_teaching_services" type="file" class="hidden" wire:model="part_time_teaching_services">
                                            <button type="button" wire:click="removeImage('part_time_teaching_services')" class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        @else
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                </svg>
                                                <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG, or PDF file (Max: 5 MB size)</p>
                                            </div>
                                            <input id="part_time_teaching_services" type="file" class="hidden" wire:model.blur="part_time_teaching_services">
                                        @endif
                                        </label>
                                        @error('part_time_teaching_services')
                                            <div class="transition transform alert alert-danger"
                                                    x-init="$el.closest('form').scrollIntoView()">
                                                <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                            </div> 
                                        @enderror
                                    </div>
                                </div>
                                </div>
                                @endif

                                @if(in_array('MILC Certification', $requests))
                                {{-- Milc Certification--}}
                                <div class="grid grid-cols-1 gap-4">
                                <div class="col-span-2 grid grid-cols-1 p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                    <label for="milc_certification"
                                    class="block text-sm font-medium text-gray-900 dark:text-white">MILC Certification<span class="text-red-600">*</span></label>
                                    <div class="grid grid-cols-1 items-center justify-center w-full">
                                        <label for="milc_certification" class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        @if($milc_certification)
                                            @if(is_string($milc_certification) == True)
                                                @php
                                                    $milc_certification = $this->getMilcCertification();
                                                @endphp
                                                <img src="data:image/gif;base64,{{ base64_encode($milc_certification) }}" alt="Image Description" class="w-full h-full object-contain"> 
                                            @elseif(str_ends_with($milc_certification, 'pdf'))
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 17v-5h1.5a1.5 1.5 0 1 1 0 3H5m12 2v-5h2m-2 3h2M5 10V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v6M5 19v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1M10 3v4a1 1 0 0 1-1 1H5m6 4v5h1.375A1.627 1.627 0 0 0 14 15.375v-1.75A1.627 1.627 0 0 0 12.375 12H11Z"/>
                                                </svg>

                                            @else
                                                <img src="{{ $milc_certification->temporaryUrl() }}" class="w-full h-full object-contain" alt="Uploaded File">
                                            @endif
                                            <input id="milc_certification" type="file" class="hidden" wire:model="milc_certification">
                                            <button type="button" wire:click="removeImage('milc_certification')" class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        @else
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                </svg>
                                                <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG, or PDF file (Max: 5 MB size)</p>
                                            </div>
                                            <input id="milc_certification" type="file" class="hidden" wire:model.blur="milc_certification">
                                        @endif
                                        </label>
                                        @error('milc_certification')
                                            <div class="transition transform alert alert-danger"
                                                    x-init="$el.closest('form').scrollIntoView()">
                                                <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                            </div> 
                                        @enderror
                                    </div>
                                </div>
                                </div>
                                @endif

                                @if(in_array('Certificate of No Pending Administrative Case', $requests))
                                {{-- Certificate of Non Pending Administrative Case--}}
                                <div class="grid grid-cols-1 gap-4">
                                    <div class="col-span-2 grid grid-cols-1 p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                        <label for="certificate_of_no_pending_administrative_case"
                                        class="block text-sm font-medium text-gray-900 dark:text-white">Certificate of Non Pending Administrative Case<span class="text-red-600">*</span></label>
                                        <div class="grid grid-cols-1 items-center justify-center w-full">
                                            <label for="certificate_of_no_pending_administrative_case" class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            @if($certificate_of_no_pending_administrative_case)
                                                @if(is_string($certificate_of_no_pending_administrative_case) == True)
                                                    @php
                                                        $certificate_of_no_pending_administrative_case = $this->getCertificateNoPending();
                                                    @endphp
                                                    <img src="data:image/gif;base64,{{ base64_encode($certificate_of_no_pending_administrative_case) }}" alt="Image Description" class="w-full h-full object-contain"> 
                                                @elseif(str_ends_with($certificate_of_no_pending_administrative_case, 'pdf'))
                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 17v-5h1.5a1.5 1.5 0 1 1 0 3H5m12 2v-5h2m-2 3h2M5 10V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v6M5 19v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1M10 3v4a1 1 0 0 1-1 1H5m6 4v5h1.375A1.627 1.627 0 0 0 14 15.375v-1.75A1.627 1.627 0 0 0 12.375 12H11Z"/>
                                                    </svg>

                                                @else
                                                    <img src="{{ $certificate_of_no_pending_administrative_case->temporaryUrl() }}" class="w-full h-full object-contain" alt="Uploaded File">
                                                @endif
                                                <input id="certificate_of_no_pending_administrative_case" type="file" class="hidden" wire:model="certificate_of_no_pending_administrative_case">
                                                <button type="button" wire:click="removeImage('certificate_of_no_pending_administrative_case')" class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>
                                            @else
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                    </svg>
                                                    <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                    <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG, or PDF file (Max: 5 MB size)</p>
                                                </div>
                                                <input id="certificate_of_no_pending_administrative_case" type="file" class="hidden" wire:model.blur="certificate_of_no_pending_administrative_case">
                                            @endif
                                            </label>
                                            @error('certificate_of_no_pending_administrative_case')
                                                <div class="transition transform alert alert-danger"
                                                        x-init="$el.closest('form').scrollIntoView()">
                                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if(in_array('Others', $requests))
                                 {{-- Other Documents--}}
                                 <div id="other_documents_container"
                                    class="grid grid-cols-1  p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                    <label for="other_documents"
                                        class="block text-sm font-medium text-gray-900 dark:text-white"> Others<span class="text-red-600">*</span></label>
                                    <div class="grid grid-cols-1   w-full">
                                     @if ($other_documents)
                                         @foreach ($other_documents as $index => $item)
                                         @php
                                             $insideIndex = 0;
                                         @endphp
                                         {{-- @dump($other_documents); --}}
                                         @if(is_string($item) == true)
                                             <div>
                                                 <label for="other_documents_{{ $index }}"
                                                     class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                     @php
                                                         $image = $this->getArrayImage('other_documents', $index);
                                                     @endphp
                                                     <button type="button"
                                                         wire:click="removeArrayImage({{ $index }}, 'other_documents')"
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
                                                     <input id="other_documents_{{ $index }}" type="file" class="hidden"
                                                         wire:model="other_documents.{{ $index }}" multiple>
                                                 </label>
                                             </div>
                                         @else
                                             @foreach ($item as $insideIndex => $file)
                                                 @if (is_array($file))
                                                     <label for="other_documents_{{ $index }}.{{$insideIndex}}"
                                                     class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                             <img src="{{ $file[$insideIndex]->temporaryUrl() }}"
                                                                 class="w-full h-full object-contain p-1 "
                                                                 alt="Uploaded Image">
                                                             <button type="button"
                                                                 wire:click="removeArrayImage({{ $index }}, 'other_documents', {{$insideIndex}})"
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
                                                             <input id="other_documents_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                                 wire:model="other_documents.{{ $index }}.{{$insideIndex}}" multiple>
                                                     </label>
                                                 @else
                                                     {{-- @dump($other_documents); --}}
                                                     <label for="other_documents_{{ $index }}.{{$insideIndex}}"
                                                     class="relative flex flex-col mb-2 items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                             <img src="{{ $file->temporaryUrl() }}"
                                                                 class="w-full h-full object-contain p-1"
                                                                 alt="Uploaded Image">
                                                             <button type="button"
                                                                 wire:click="removeArrayImage({{ $index }}, 'other_documents', {{$insideIndex}})"
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
                                                             <input id="other_documents_{{ $index }}.{{$insideIndex}}" type="file" class="hidden"
                                                                 wire:model="other_documents.{{ $index }}.{{$insideIndex}}">
                                                     </label>
                                                 @endif
                                                 @error('other_documents.' . $index .  '.' .  $insideIndex)
                                                 <div class="transition transform alert alert-danger text-sm mb-1"
                                                         x-data x-init="document.getElementById('other_documents_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('other_documents_container').focus();">
                                                     <span class="text-red-500 text-xs "> {{$message}}</span>
                                                 </div> 
                                             @enderror
                                             @endforeach
                                         @endif
                                             @php
                                                 $indexRequestLetter = $index;
                                             @endphp
                                         @error('other_documents.' . $index - $insideIndex)
                                             <div class="transition transform alert alert-danger text-sm mb-1"
                                                     x-data x-init="document.getElementById('other_documents_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('other_documents_container').focus();">
                                                 <span class="text-red-500 text-xs "> {{$message}}</span>
                                             </div> 
                                         @enderror
                                         @endforeach
                                         <label for="other_documents_{{ $indexRequestLetter + 1 }}"
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
                                         <input id="other_documents_{{ $indexRequestLetter + 1 }}" type="file" class="hidden"
                                                         wire:model="other_documents.{{ $indexRequestLetter + 1 }}" multiple>
                                     @else
                                         <label for="other_documents"
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
                                                 <input id="other_documents" type="file" class="hidden"
                                                 wire:model.blur="other_documents.0" multiple>
                                                {{-- @dump($other_documents); --}}
                                         </label>
                                     @endif
                                     @error('other_documents')
                                     <div class="transition transform alert alert-danger text-sm mb-1 mt-2" x-data
                                         x-init="document.getElementById('other_documents_container').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                         document.getElementById('other_documents_container').focus();">
                                         <span class="text-red-500 text-xs "> {{ $message }}</span>
                                     </div>
                                     @enderror
                                 </div>
                             </div>

                                {{-- <div class="grid grid-cols-1 gap-4">
                                    <div class="col-span-2 grid grid-cols-1 p-4 gap-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                        <label for="others"
                                        class="block text-sm font-medium text-gray-900 dark:text-white">Others<span class="text-red-600">*</span></label>
                                        <div class="grid grid-cols-1 items-center justify-center w-full">
                                            <label for="others" class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            @if($others)
                                                @if(is_string($others) == True)
                                                    @php
                                                        $others = $this->getOtherDocuments();
                                                    @endphp
                                                    <img src="data:image/gif;base64,{{ base64_encode($others) }}" alt="Image Description" class="w-full h-full object-contain"> 
                                                @elseif(str_ends_with($others, 'pdf'))
                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 17v-5h1.5a1.5 1.5 0 1 1 0 3H5m12 2v-5h2m-2 3h2M5 10V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v6M5 19v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1M10 3v4a1 1 0 0 1-1 1H5m6 4v5h1.375A1.627 1.627 0 0 0 14 15.375v-1.75A1.627 1.627 0 0 0 12.375 12H11Z"/>
                                                    </svg>
                                                @else
                                                    <img src="{{ $others->temporaryUrl() }}" class="w-full h-full object-contain" alt="Uploaded File">
                                                @endif
                                                <input id="others" type="file" class="hidden" wire:model="others">
                                                <button type="button" wire:click="removeImage('others')" class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>
                                            @else
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                    </svg>
                                                    <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                    <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG, or PDF file (Max: 5 MB size)</p>
                                                </div>
                                                <input id="others" type="file" class="hidden" wire:model.blur="others">
                                            @endif
                                            </label>
                                            @error('others')
                                                <div class="transition transform alert alert-danger"
                                                        x-init="$el.closest('form').scrollIntoView()">
                                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}
                                @endif                            
                            </div>
                        </div>
                    </div>
                   
                </div>
                <button type="submit"  class="inline-flex items-center float-right px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Request Document
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