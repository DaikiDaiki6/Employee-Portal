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
            <a href="{{route('ActivitiesGallery')}}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Activities</a>
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
    <h2 class="mb-10 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">Activity Information</h2>
    
    @if ($is_head == 1)
    <div class="flex justify-end">
        <button type="button" onclick="location.href='{{ route('ActivitiesUpdate', ['index' => $index]) }}'" class="text-white mb-8 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit Activity</button>
    </div>
       
    @endif
    
    <section class="bg-white  dark:bg-gray-900 pb-24 px-8  rounded-lg">
        <div class=" px-1 mx-auto pt-8">
            <div class="grid grid-cols-2 ">
                <div class="col-span-2 flex justify-center">
                    <img class="w-full rounded-lg" src="{{ asset('storage/' . $activityData->poster) }}" style="width: 500px;" alt="">
                </div>
                <div class="col-span-2 text-center">
                    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">{{$activityData->title}}</h1>
                    <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">{{$activityData->description}}</p>
                    <hr class="h-px my-8 bg-gray-600 border-0 dark:bg-gray-700">
                </div>
            </div>
            <div class="w-full flex justify-center">
                <div class="w-full grid grid-cols-2  ">
                    <div class="text-center col-span-1">
                        <dl class="max-w-full text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                            <div class="flex flex-col pb-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Type</dt>
                                <dd class="text-lg font-semibold">{{$activityData->type}}</dd>
                            </div>
                            <div class="flex flex-col py-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Host</dt>
                                <dd class="text-lg font-semibold">{{$activityData->host}}</dd>
                            </div>
                            <div class="flex flex-col pt-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Highly Encouraged to Participate</dt>
                                @foreach ($activityData->visible_to_list as $item)
                                <dd class="text-lg font-semibold">{{$item}}</dd>
                                @endforeach
                            </div>
                        </dl>
                    </div>
                    <div class="text-center col-span-1">
                        <dl class="max-w-full text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                            <div class="flex flex-col pb-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Date</dt>
                                <dd class="text-lg font-semibold">{{$activityData->date}}</dd>
                            </div>
                            <div class="flex flex-col py-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Start Time</dt>
                                <dd class="text-lg font-semibold">{{$activityData->start}}</dd>
                            </div>
                            <div class="flex flex-col pt-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">End Time</dt>
                                <dd class="text-lg font-semibold">{{$activityData->end}}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
  

        </div>
    </section>
    
    </div>
</div>