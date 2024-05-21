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
            <a href="{{route('TrainingGallery')}}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Trainings</a>
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
    <h2 class="mb-10 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">Training Information</h2>
   
    @if ($is_head == 1)
    <div class="flex justify-end">
        <button type="button" onclick="location.href='{{ route('TrainingUpdate', ['index' => $index]) }}'" class="text-white mb-8 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit Training</button>
    </div>
    @endif

    <section class="bg-white  dark:bg-gray-900 pb-24 px-8  rounded-lg">
        <div class=" px-1 mx-auto pt-8">
            <div class="grid grid-cols-2 ">
                <div class="col-span-2 flex justify-center">
                    <img class="w-full rounded-lg" src="{{ asset('storage/' . $trainingData->training_photo) }}" style="width: 500px;" alt="">
                </div>
                <div class="col-span-2 text-center">
                    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">{{$trainingData->training_title}}</h1>
                    <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">{{$trainingData->training_information}}</p>
                    <hr class="h-px my-8 bg-gray-600 border-0 dark:bg-gray-700">
                </div>
            </div>
            <div class="w-full flex justify-center">
                <div class="w-full grid grid-cols-1  ">
                    <div class="text-center col-span-1">
                        <dl class="max-w-full text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                            <div class="flex flex-col pb-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Host</dt>
                                <dd class="text-lg font-semibold">{{$trainingData->host}}</dd>
                            </div>
                            <div class="flex flex-col py-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Colleges That Are Highly Encouraged to Participate</dt>
                                @foreach ($trainingData->visible_to_list as $item)
                                <dd class="text-lg font-semibold">{{$item}}</dd>
                                @endforeach
                            </div>
                        </dl>
                    </div>
                <!--
                    <hr class="h-px my-8 bg-gray-600 border-0 dark:bg-gray-700">

                    <div class="w-full grid grid-cols-2">
                    <div class="text-center col-span-1">
                        <p class="mb-1text-gray-800 font-bold text-2xl py-4 ">Pre-Test</p>
                        <dl class="max-w-full text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                            <div class="flex flex-col pb-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Title</dt>
                                <dd class="text-lg font-semibold">{{$trainingData->pre_test_title}}</dd>
                            </div>
                            <div class="flex flex-col py-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Description</dt>
                                <dd class="text-lg font-semibold">{{$trainingData->pre_test_description}}</dd>
                            </div>
                            <div class="flex flex-col py-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Rating</dt>
                                <dd class="text-lg font-semibold {{ $trainingData->pre_test_rating ? '' : 'text-red-500' }}">
                                    {{ $trainingData->pre_test_rating ? $trainingData->pre_test_rating : 'Not Yet Rated' }}
                                </dd>
                                
                            </div>
                            @php
                               
                            @endphp
                            <div class="pt-4">
                                {{-- <button type="button" 
                                onclick="location.href='{{ route('TrainingPreTestForm', ['index' => $index ]) }}'"
                                   @disabled($preTestAnswerExists)
                                class="text-white mb-8 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Take Pre-Test --}}
                            </button>

                            </div>
                        </dl>
                    </div>
                    <div class="text-center col-span-1">
                        <p class="mb-1text-gray-800 font-bold text-2xl py-4 ">Post-Test</p>
                        <dl class="max-w-full text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                            <div class="flex flex-col pb-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Title</dt>
                                <dd class="text-lg font-semibold">{{$trainingData->post_test_title}}</dd>
                            </div>
                            <div class="flex flex-col py-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Description</dt>
                                <dd class="text-lg font-semibold">{{$trainingData->post_test_description}}</dd>
                            </div>
                            <div class="flex flex-col py-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Rating</dt>
                                <dd class="text-lg font-semibold {{ $trainingData->post_test_rating ? '' : 'text-red-500' }}">
                                    {{ $trainingData->pre_test_rating ? $trainingData->post_test_rating : 'Not Yet Rated' }}
                                </dd>
                                
                                {{-- <dd class="text-lg font-semibold">{{$trainingData->pre_test_rating ? $trainingData->pre_test_rating : 'Not Yet Rated'  }}</dd> --}}
                            </div>
                                
                                <div class="pt-4">
                                {{-- <button type="button" @disabled($postTestAnswerExists) 
                                    onclick="location.href='{{ route('TrainingPostTestForm', ['index' => $index]) }}'" class="text-blue-700 border h-10 border-blue-400 hover:text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 me-2 mb-2 dark:text-blue-300 dark:border-blue-300 dark:hover:text-white dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Take Post-Test
                                </button> --}}
                            </div>
                        </dl>
                    </div>

                </div>
                -->
                 
                </div>
               
            </div>
            

        </div>
    </section>
    
    </div>
</div>