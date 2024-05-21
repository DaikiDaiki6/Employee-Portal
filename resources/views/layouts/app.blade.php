<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="icon" type="image/x-icon" href="{{asset('plmlogo\plm-logo.png')}}">
    <title>Employee Portal</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css"> --}}
    <title>Document</title>
</head>
<body class="bg-gray-200">
@extends('layouts.base')

@section('body')
    {{-- @include('livewire.sidebar.sidebar-view') --}}
    @livewire('sidebar.sidebar-view')

    <div class="main-content">
        <div id="padding-content" class=" sm:ml-64">
            <div class="p-4 rounded-lg dark:border-gray-700 mt-12">
                @isset($slot)
                    {{ $slot }}
                @endisset
                <div class="p-4">
                    @yield('content')
                </div>
                
            </div>
            
                
        </div>
    </div>
    <script>
        // Get the toggle button
        const toggleButton = document.getElementById('toggleSidebar');
        // Get the dropdown element
        const logoSidebar = document.getElementById('logo-sidebar');
        // Initialize a flag to track the first click
        let firstClick = true;

        // Toggle dropdown visibility and content padding when the button is clicked
        toggleButton.addEventListener('click', function() {
            // If it's the first click, do nothing
            if (firstClick) {
                firstClick = false;
                return;
            }
            // Toggle dropdown visibility
            const isExpanded = toggleButton.getAttribute('aria-expanded') === 'true';
            toggleButton.setAttribute('aria-expanded', String(!isExpanded));
            logoSidebar.classList.toggle('hidden');
            if (!isExpanded && window.innerWidth <= 640) {
                logoSidebar.style.display = 'block';
            } else {
                logoSidebar.style.display = '';
            }
            // Toggle content padding
            const mainContent = document.getElementById('padding-content');
            // mainContent.classList.toggle('p-2');
            mainContent.classList.toggle('sm:ml-64');
        });

        // Hide the dropdown by default on screens narrower than 640 pixels
        if (window.innerWidth <= 640) {
            logoSidebar.classList.add('hidden');
        }
    </script>
@endsection




    
</body>
</html>