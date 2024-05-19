<div>
    <nav class="flex " aria-label="Breadcrumb">
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
            <a href="{{route('TrainingGallery')}}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Trainings</a>
            </div>
        </li>
        </ol>
    </nav> 

    @if ($is_head == 1)
        <div class="flex justify-end">
            <button type="button" onclick="location.href='{{ route('TrainingForm') }}'" class="text-white mb-8 mt-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create Activity</button>
        </div>
    @else
        <div class="flex justify-end " style="margin-bottom: 40px">
        </div>
    @endif
    
   
    <section class="bg-white  dark:bg-gray-900 pb-24 px-8  rounded-lg">
        <div class=" px-1 mx-auto pt-8">
            <h2 class="mb-4 text-3xl text-center font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">Trainings</h2>
            <div>
             
                <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
                    {{-- <button type="button" wire:click="fillerSetter('All')" class="text-blue-700 hover:text-white border border-blue-600  hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800 {{ $filter == 'All' ? 'bg-blue-500 text-white' : 'bg-white text-blue-500' }}">All categories</button> --}}
                    <button type="button" wire:click="fillerSetter('College of Information System and Technology Management')" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800 {{ $filter == 'College of Information System and Technology Management' ? 'bg-blue-500 text-white' : 'bg-white' }} {{ $department_name != 'College of Information System and Technology Management' ? 'hidden' : '' }}">College of Information System and Technology Management</button>
                    <button type="button" wire:click="fillerSetter('College of Engineering')" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800 {{ $filter ==   "College of Engineering" ? 'bg-blue-500 text-white' : 'bg-white' }} {{ $department_name != 'College of Engineering' ? 'hidden' : '' }} ">College of Engineering</button>
                    <button type="button" wire:click="fillerSetter('College of Business Administration')" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800 {{ $filter === 'College of Business Administration' ? 'bg-blue-500 text-white' : 'bg-white' }} {{ $department_name != 'College of Business Administration' ? 'hidden' : '' }}">College of Business Administration</button>
                    <button type="button" wire:click="fillerSetter('College of Liberal Arts')" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700  focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800 {{ $filter === 'College of Liberal Arts' ? 'bg-blue-500 text-white' : 'bg-white' }} {{ $department_name != 'College of Liberal Arts' ? 'hidden' : '' }}">College of Liberal Art</button>
                    <button type="button" wire:click="fillerSetter('College of Sciences')" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700  focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800 {{ $filter === 'College of Sciences' ? 'bg-blue-500 text-white' : 'bg-white' }} {{ $department_name != 'College of Sciences' ? 'hidden' : '' }}">College of Sciences</button>
                    <button type="button" wire:click="fillerSetter('College of Education')" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray- 900 dark:bg-gray-900 dark:hover:border-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800 {{ $filter === 'College of Education' ? 'bg-blue-500 text-white' : 'bg-white' }} {{ $department_name != 'College of Education' ? 'hidden' : '' }}">College of Education</button>
                    <button type="button" wire:click="fillerSetter('Finance Department')" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700  focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800 {{ $filter === 'Finance Department' ? 'bg-blue-500 text-white' : 'bg-white' }} {{ $department_name != 'Finance Department' ? 'hidden' : '' }}">Finance Department</button>
                    <button type="button" wire:click="fillerSetter('Human Resources Department')" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 x focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800 {{ $filter === 'Human Resources Department' ? 'bg-blue-500 text-white' : 'bg-white' }} {{ $department_name != 'Human Resources Department' ? 'hidden' : '' }}">Human Resources Department</button>
                    <button type="button" wire:click="fillerSetter('Information Technology Department')" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700  focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800 {{ $filter === 'Information Technology Department' ? 'bg-blue-500 text-white' : 'bg-white' }} {{ $department_name != 'Information Technology Department' ? 'hidden' : '' }}">Information Technology Department</button>
                    <button type="button" wire:click="fillerSetter('Legal Department')" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700  focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800 {{ $filter === 'Legal Department' ? 'bg-blue-500 text-white' : 'bg-white' }} {{ $department_name != '    Legal Department' ? 'hidden' : '' }}">Legal Department</button> 
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach ($TrainingData as $data)
                        <div>
                            <a href="{{route('TrainingView', ['index' => $data->id])}}"><img class="h-full w-full object-cover rounded-lg" src="{{ asset('storage/' . $data->training_photo) }}" alt=""></a>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </section>
    
    </div>
</div>