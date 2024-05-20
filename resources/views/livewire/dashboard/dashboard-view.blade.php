{{-- <div class=" p-4 sm:ml-64" style="margin-top: 55px"> --}}
<div class="grid grid-cols-3 gap-4"> 
    <style>
    .swiper {
        /* max-width: 1600px;*/ */
        /* max-width: 100px; */
        width: 1700px;
        height: 100%; 
    }
    .swiper-wrapper{
        width:100%;
    }
    .swiper-slider{
        border-width: 1px;
        --tw-border-opacity: 1;
        border-color: rgb(63 131 248 / var(--tw-border-opacity));
        object-fit: cover;
        border-radius: 0.5rem;
        height: 100%;
        width: 100%;
    }
    .swiper-slide img{
        object-fit: cover;
        border-radius: 0.5rem;
        height: 100%;
        width: 100%;
    }
    .swiper-button-prev{
        outline: 10px solid transparent;
        /* outline-offset: 2px; */
    }
    @media (max-width: 1120px) {
            #user_avatar {
                display: none;
            }
        }
        #good_morning {
          white-space: noraml; 
          column-span: 5; 
      }

      @media (min-width: 850px){
          #good_morning {
          white-space: nowrap; 
          column-span: 5; 
      }
      }
  


    @media (min-width: 1120px) {
      #good_morning {
        white-space: nowrap ;
      }
    }
   
    </style>

 
<div wire:ignore class="bg-white border col-span-3  border-gray-200 rounded-lg shadow sm:p-4 dark:bg-gray-800 dark:border-gray-700  ">
  @if ($activities->isEmpty())
  <div class="flex items-center justify-center text-center h-full">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 0 1 0 3.46" />
    </svg>
     <span class="text-blue-500 font-semibold items-center ml-3"> No Events Available. Stay tuned for Future Events</span>
  </div>
  @else
  <div class="swiper w-full h-full">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper p-2">
        @foreach ($activities as $activity)
            <div class="swiper-slide w-full" data-swiper-autoplay="2000">
                <a href="{{route('ActivitiesView', ['index' => $activity->id])}}">
                    <img src="{{ asset('storage/' . $activity->poster) }}" class="h-full w-full object-cover" alt="...">
                </a>
            </div>
        @endforeach
        @foreach ($trainings as $training)
            <div class="swiper-slide w-full" data-swiper-autoplay="2000">
                <a href="{{route('TrainingView', ['index' => $training->id])}}">
                    <img src="{{ asset('storage/' . $training->training_photo) }}" class="h-full w-full object-cover" alt="...">
                </a>
            </div>
        @endforeach
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination text-bold"></div>
  
    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"></div> 
    <div class="swiper-button-next absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"></div> 
  
    <!-- If we need scrollbar -->
    <div class="swiper-scrollbar"></div>
</div>

  @endif
</div>

 <div class="grid grid-cols-3 col-span-3 gap-4 h-auto">
  <div wire:ignore class="w-full col-span-2 bg-white rounded-lg shadow pb-4 dark:bg-gray-800 p-4 md:p-4 ">
    <div class="flex justify-between ">
      <div>
        <p class=" text-xl font-bold text-gray-800 dark:text-gray-400">Attendance Chart</p>
      </div>
      <div
        class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
        <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
        </svg>
      </div>
    </div>
    <div id="area-chart"></div>
    <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
      <div class="flex justify-between items-center" >
        <!-- Button -->
        <button
          id="dropdownDefaultButton"
          data-dropdown-toggle="lastDaysdropdown"
          data-dropdown-placement="bottom"
          class="text-sm font-medium text-gray-900  dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white mt-2"
          type="button" >
          <p class="text-capitalize"> {{$filter}}</p>
          <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
          </svg>
        </button>
        <!-- Dropdown menu -->
        <div id="lastDaysdropdown" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-900 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
              <li>
                <a wire:click.prevent="setFilter('weekly')" class="block px-4 py-2  hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Weekly</a>
              </li>
              <li>
                <a wire:click.prevent="setFilter('monthly')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yearly</a>
              </li>
            </ul>
        </div>
      
      </div>
    </div>
  </div>

  <div x class="grid grid-cols-1 p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <div class="grid grid-cols-5 mb-4  items-center">
        <div class="h-full col-span-2 x" id="good_morning">
          <h2 class=" font-semibold text-blue-500 text-lg min-[1475px]:text-2xl" >Good {{$period}}, {{$firstName}}. </h2>
          <h1 class="text-base">Ready to Start your Day?</h1>
          <p class="text-sm mt-4">"<span class="text-blue-500">Tough times</span> never last,</p>
          <span class="text-sm ">but <span class="text-blue-700">tough people</span> do"</span>
          <div wire:poll.1s class="text-xl p-0 font-semibold text-blue-700">
            <br> 
            @php
              $currentDate = \Illuminate\Support\Carbon::now()->toDateString(); // Get current date in YYYY-MM-DD format
              $currentTime = \Illuminate\Support\Carbon::now()->toTimeString();
              // $currentTime = \Illuminate\Support\Carbon::now()
            @endphp
              <p class="text-blue-500 text-sm">Date: <span class="text-gray-900">{{$currentDate}}</span></p>  
              <p class="text-blue-500 text-sm">Time: <span class="text-gray-900">{{$currentTime}}</span></p> 
            </div>
        </div>
       
        <div class="mb-4 ml-8  col-span-3" id="user_avatar"> 
          @if ($gender == "Female")
            <img src="{{asset('storage\EmployeeImages\girl.png')}}"  style="width:500px ;height: 200px" alt="...">
          @else
              <img src="{{asset('storage\EmployeeImages\boy.png')}}"  style="width:500px ;height: 200px" alt="...">
          @endif
        </div>
        
    </div>
</div>
 
 </div>
</div>

<script>
const options = {
  chart: {
    height: "75%",
    maxWidth: "100%",
    type: "area",
    fontFamily: "Inter, sans-serif",
    animations: {
      enabled: false,
    },
    padding: {
        // left: 100, // Adjust the left padding to create more space for the y-axis labels
        // right: 50, // Adjust the right padding if needed
        // top: 20, // Adjust the top padding if needed
        // bottom: 20 // Adjust the bottom padding if needed
    },
    dropShadow: {
      enabled: false,
    },
    toolbar: {
      show: false,
    },
  },
  tooltip: {
    enabled: true,
    x: {
      show: true,
    },
  },
  fill: {
    type: "gradient",
    gradient: {
      opacityFrom: 0.55,
      opacityTo: 0,
      shade: "#1C64F2",
      gradientToColors: ["#1C64F2"],
    },
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    width: 6,
  },
  grid: {
    show: true,
    strokeDashArray: 4,
    padding: {
      left: 20,
      right: 0,
      bottom: 0,
      top: 0
    },
  },
  tooltip: {
      enabled: true,
  },
  series: [
    {
      name: "Weekly Count",
      data: @json($data),
      color: "#1A56DB",
    },
  ],
  yaxis: {
      labels: {
        show: true,
      },
      min: 1,
      max: 7,
      axisBorder: {
        show: true,
      },
      axisTicks: {
        show: true,
      }
    },
  xaxis: {
    categories: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5'],
    labels: {
      show: true,
    },
    beginAtZero: true,
      min: 1,
      max: 5,
    axisBorder: {
      show: true,
    },
    axisTicks: {
      show: true,
    }
  },
}

  const chart = new ApexCharts(document.getElementById("area-chart"), options);
  chart.render();

  document.addEventListener('livewire:init', () => {
      Livewire.on('refresh-monthly-chart', (chartData) => {
        chart.updateSeries([{
          name: "Monthly Count",
          data: chartData.data,
        }])
        chart.updateOptions({
          xaxis: {
            categories: ['January',
                          'February',
                          'March',
                          'April',
                          'May',
                          'June',
                          'July',
                          'August',
                          'September',
                          'October',
                          'November',
                          'December'],
            min: 1,
            max: 12,
          },
          yaxis: {
            min: 1,
            max: 31
          }
        })
      })
  })
  document.addEventListener('livewire:init', () => {
      Livewire.on('refresh-weekly-chart', (chartData) => {
        alert(chartData);
        chart.updateSeries([{
          name: "Weekly Count",
          data: chartData.data,
        }])
        chart.updateOptions({
          xaxis: {
            categories: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5'],
            min: 1,
            max: 5,
          },
          yaxis: {
            min: 1,
            max: 7
          }
        })
      })
  })

</script>
</div>
   
</div>



