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
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css"> --}}
    <title>Document</title>
</head>
<body class="bg-gray-200">
@extends('layouts.base')

@section('body')
    {{-- @include('livewire.sidebar.sidebar-view') --}}
    @livewire('sidebar.sidebar-view')
    @isset($slot)
    {{ $slot }}
    @endisset
    <div class="main-content">
        
        <div class="p-4 sm:ml-64">
            <div class="p-4 rounded-lg dark:border-gray-700 mt-14">
        @yield('content')
       
            </div>
        </div>
    </div>
    
@endsection

    
</body>
</html>