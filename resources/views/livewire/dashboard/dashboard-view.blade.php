<div class="grid grid-cols-3 gap-4 ">
    <style>
        .swiper {

        /* max-width: 1150px; */
        /* Optionally, set a minimum height */
        /* max-height: 300px; */
        width: 100%;
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
        outline: 2px solid transparent;
        /* outline-offset: 2px; */
    }
    </style>

 
<div class="bg-white  border col-span-3 border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700 mb-4 ">
    <div class="swiper w-full object-contain">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper p-1 ">
            @foreach ($activities as $activity)
                <div class="swiper-slide">
                    <a href="{{route('ActivitiesView', ['index' => $activity->id])}}"><img src="{{ asset('storage/' . $activity->poster) }}" class="h-full w-full object-cover" alt="..."></a>
                </div>
            @endforeach
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination text-bold"></div>
      
        <!-- If we need navigation buttons -->
        <div class=" swiper-button-prev absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"></div>
        <div class="swiper-button-next absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"></div>
      
        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>
    </div>
</div>

<div class=" w-full col-span-2 bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
    <div class="flex justify-between ">
      <div>
        <p class=" text-2xl font-bold text-gray-800 dark:text-gray-400">Attendance</p>
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
      <div class="flex justify-between items-center pt-5">
        
        <!-- Button -->
        <button
          id="dropdownDefaultButton"
          data-dropdown-toggle="lastDaysdropdown"
          data-dropdown-placement="bottom"
          class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
          type="button">
          <p class="text-capitalize"> {{$filter}}</p>
          <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
          </svg>
        </button>
        <!-- Dropdown menu -->
        <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
              <li>
                <a wire:click.prevent="setFilter('weekly')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Weekly</a>
              </li>
              <li>
                <a wire:click.prevent="setFilter('monthly')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yearly</a>
              </li>
            </ul>
        </div>
      
      </div>
    </div>
  </div>

  <div class="block  p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Leave Credits</h5>
    <div class="mb-4">
      <a href="#" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
      <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Vacation Credits</h5>
      <p class="font-normal text-3xl text-gray-700 dark:text-gray-400">{{$vacationCredits}}</p>
      </a>
    </div>
    <br>
    <div>
      <a href="#" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
      <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Sick Credits</h5>
      <p class="font-normal text-3xl text-gray-700 dark:text-gray-400">{{$sickCredits}}</p>
      </a>
    </div>
  </div>

<script>
const options = {
  chart: {
    height: "80%",
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
    show: false,
    strokeDashArray: 4,
    padding: {
      left: 20,
      right: 0,
      bottom: 20,
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



