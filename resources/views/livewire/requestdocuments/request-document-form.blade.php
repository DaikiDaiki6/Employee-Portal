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
            <a href="{{route('RequestDocumentTable')}}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Request Document</a>
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
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">Create a new Document Request</h2>
    <section class="bg-white dark:bg-gray-900 pb-24 px-8  rounded-lg">
        <div class=" px-1 mx-auto pt-8">
            <form wire:submit.prevent="submit" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    <div class="block w-full col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                        <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                            <div class="grid grid-cols-2 gap-4 min-[1000px]:grid-cols-2  col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                                <div class="w-full">
                                    <h2><b>Reference Number</b></h2>
                                    <input type="text" value="{{$ref_number}}"
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
                                                         disabled>
                                                </div>
                                                <div class="w-full">
                                                    <label for="employee_type"
                                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Employee Type <span class="text-red-600">*</span></label>
                                                    <input type="text" name="employee_type" id="employee_type"  value="{{$employee_type}}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        disabled>
                                                </div>
                                                <div class="w-full">
                                                    <label for="current_position"
                                                        class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Current Position <span class="text-red-600">*</span></label>
                                                    <input type="text" name="current_position" id="current_position"  value="{{$current_position}}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        disabled>
                                                </div>
                                            </div>
                                            
                                    </div>
                        
                                
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 mt-6 col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                            <h2><b>Request For<span class="text-red-600">*</span></b></h2>
                            <div class="grid grid-cols-2 gap-4" id="requests_container">
                                <div class="grid grid-cols-1 gap-4">
                                    <div class="flex items-center mt-4 ">
                                        <input id="request1" type="checkbox" value="Certificate of Employment" wire:model="requests" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="request1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Certificate of Employment</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="request2" type="checkbox" value="Certificate of Employment with Compensation" wire:model="requests" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="request2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Certificate of Employment with Compensation</label>
                                    </div>  
                                    <div class="flex items-center">
                                        <input id="request3" type="checkbox" value="Service Record" wire:model="requests" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="request3" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Service Record</label>
                                    </div>  
                                    <div class="flex items-center">
                                        <input id="request4" type="checkbox" value="Part time Teaching Services" wire:model="requests" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="request4" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Part-time Teaching Services</label>
                                    </div>  
                                </div>
                                <div class="grid grid-cols-1 gap-4">
                                    <div class="flex items-center mt-4 ">
                                        <input id="request5" type="checkbox" value="MILC Certification" wire:model.live="requests" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="request5" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">MILC Certification</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="request6" type="checkbox" value="Certificate of No Pending Administrative Case" wire:model="requests" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="request" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Certificate of No Pending Administrative Case</label>
                                    </div>  
                                    <div class="flex items-center">
                                        <input id="request7" type="checkbox" value="Others" wire:model.live="requests" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="request" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Others</label>
                                    </div>  
                                    <div class="flex items-center">
                                        &nbsp;
                                    </div>  
                                </div>
                            </div>
                            @error('requests')   
                                <div class="transition transform alert alert-danger text-sm mt-2"
                                    x-data x-init="document.getElementById('requests_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('requests_container').focus();">
                                    <span class="text-red-500 text-xs"> {{$message}}</span>
                                </div> 
                            @enderror
                            @error('requests.*')   
                                <div class="transition transform alert alert-danger text-sm"
                                    x-data x-init="document.getElementById('requests_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('requests_container').focus();">
                                    <span class="text-red-500 text-xs"> {{$message}}</span>
                                </div> 
                            @enderror
                            @if(in_array('Others', $requests) || in_array('MILC Certification', $requests))
                            <div class="grid grid-cols-2 gap-4 mt-5 ">
                                @if (in_array('MILC Certification', $requests))
                                <div>
                                    <div class="grid grid-cols-1" id="milc_container">
                                        <label for="milc_certification"
                                        class="block mb-2  text-sm font-medium  text-gray-900 dark:text-white">MILC Description<span class="text-red-600">*</span> (If chosen MILC certification)</label>
                                        <textarea type="text" rows="2" id="milc_description" name="milc_description" wire:model="milc_description"
                                        placeholder="Write your purpose here."  
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </textarea>
                                    </div>
                                    @error('milc_description')   
                                        <div class="transition transform alert alert-danger text-sm"
                                            x-data x-init="document.getElementById('milc_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('milc_container').focus();">
                                            <span class="text-red-500 text-xs"> {{$message}}</span>
                                        </div> 
                                    @enderror
                               </div>
                               @endif
                               @if(in_array('Others', $requests))
                               <div>
                                    <div class="grid grid-cols-1" id="other_request_container">
                                        <label for="other_request"
                                        class="block mb-2  text-sm font-medium  text-gray-900 dark:text-white">Other Requests<span class="text-red-600">*</span> (If chosen Others)</label>
                                        <textarea type="text" rows="2" id="other_request" name="other_request" wire:model="other_request"
                                        placeholder="Write your purpose here." 
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </textarea>
                                    </div>
                                    @error('other_request')   
                                        <div class="transition transform alert alert-danger text-sm"
                                            x-data x-init="document.getElementById('other_request_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('other_request_container').focus();">
                                            <span class="text-red-500 text-xs"> {{$message}}</span>
                                        </div> 
                                    @enderror
                               </div>
                               @endif
                            </div>

                            @endif
                            
 
                        </div>
                        
                        <div class="grd grid-cols-2 p-6 mt-5 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                            <div class="grid grid-cols-2 gap-4" id="purpose_container">
                                <div class="grid grid-cols-1 gap-2 p-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                                    <div>
                                        <label for="purpose"
                                        class="block mb-2  text-sm font-medium  text-gray-900 dark:text-white">Purpose <span class="text-red-600">*</span></label>
                                        <textarea type="text" rows="6" id="purpose" name="purpose" wire:model="purpose"
                                        placeholder="Write your purpose here."   
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </textarea>
                                    </div>
                                    @error('purpose')   
                                        <div class="transition transform alert alert-danger text-sm"
                                            x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                            <span class="text-red-500 text-xs"> {{$message}}</span>
                                        </div> 
                                    @enderror
                                </div>
                                <div class="grid grid-cols-1 p-4 gap-2 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                    <label for="signature_requesting_party" id="signature_requesting_party_container"
                                    class="block text-sm font-medium text-gray-900 dark:text-white">Signature of the Requesting Party <span class="text-red-600">*</span></label>
                                    @if($signature_requesting_party)
                                    <div class="grid grid-cols-1 items-center justify-center w-full">
                                        <label for="signature_requesting_party" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            <img src="{{ $signature_requesting_party->temporaryUrl() }}" class="w-full h-full object-contain" alt="Uploaded Image">
                                            <input id="signature_requesting_party" type="file" class="hidden" wire:model.blur="signature_requesting_party">
                                        </label>
                                        @error('signature_requesting_party')
                                            <div class="transition transform alert alert-danger"
                                                    x-init="$el.closest('form').scrollIntoView()">
                                                <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                            </div> 
                                        @enderror
                                    </div>
                                    @else
                                    <div class="grid grid-cols-1 items-center justify-center w-full ">
                                        <label for="signature_requesting_party" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                </svg>
                                                <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG, or PDF file (Max: 5 MB size)</p>
                                            </div>
                                            <input id="signature_requesting_party" type="file" class="hidden" wire:model.blur="signature_requesting_party" />
                                        </label>
                                    </div> 
                                    @error('signature_requesting_party')
                                        <div class="transition transform alert alert-danger text-sm"
                                            x-data x-init="document.getElementById('signature_requesting_party_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('signature_requesting_party_container').focus();">
                                            <span class="text-red-500 text-xs"> {{$message}}</span>
                                        </div> 
                                    @enderror
                                    @endif
                                </div>
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