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
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Create</span>
            </div>
        </li>
        </ol>
    </nav> 
    <h2 class="mb-4 text-3xl  font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">Create a Training</h2>
   
    <section class="bg-white  dark:bg-gray-900 pb-24 px-8  rounded-lg">
        <form wire:submit.prevent="submit" method="POST">
            @csrf
        <div class=" px-1 mx-auto pt-8">
            
            {{-- Pre Test Title and Description --}}
            <div class="grid grid-cols-1 gap-4  p-6 mt-5 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                <h2 class="text-3xl font-extrabold dark:text-white">{{$trainingData->training_title}}</h2>
                <p class="my-4 text-lg text-gray-500">{{$trainingData->pre_test_description}}</p>
            </div>

            {{-- Pre-Test Question --}}
            <div class="grid grid-cols-1 gap-4  p-6 mt-5 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                <h2><b>Pre Test</b></h2>
                @foreach ($preTest as $index => $preQuestion)   
                    <div class="w-full col-span-3 ">
                        <ul class="text-sm font-medium text-left text-gray-500 border border-gray-300 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                            <li class="me-2 p-4 font-bold">
                                <span >No. {{$index + 1 }} Question</span>
                            </li>
                        </ul>
                        <div class="grid grid-cols-2 gap-4 w-full col-span-3 p-6 pb-8 mb-4 bg-white border border-gray-200  shadow  dark:bg-gray-800 dark:border-gray-700 ">
                            <div>
                                <label for="preTest_{{$index}}_question"
                                    class="block mb-2 text-sm font-medium  text-gray-900 dark:text-white">Question <span class="text-red-600">*</span></label>
                                <textarea disabled type="text" id="preTest_{{$index}}_question" wire:model.blur="preTest.{{$index}}.question" class="block p-2.5 w-full font-bold bg-gray-200 text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </textarea>
                            </div>
                            <div>
                                <label for="preTest_{{$index}}_answer"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer<span class="text-red-600">*</span></label>
                                <textarea type="text" id="preTest_{{$index}}_answer" wire:model.blur="preTest.{{$index}}.answer"   class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </textarea>
                                @error('preTest.{{$index}}.answer')   
                                    <div class="transition transform alert alert-danger text-sm"
                                        x-data x-init="document.getElementById('coreFunctions_{{$index}}_answer').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('coreFunctions_{{$index}}_answer').focus();" >
                                            <span class="text-red-500 text-xs" > {{$message}}</span>
                                    </div> 
                                @enderror
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
        <button type="submit"  class="inline-flex items-center float-right px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            Submit Pre-Test
        </button>
        </form>
    </section>
    
    </div>
</div>