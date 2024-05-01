@extends('layouts.base')

@section('body')
    @include('sidebar')
    @isset($slot)
    {{ $slot }}
    @endisset
    <div class="main-content">
        @yield('content')
    </div>
    
   
@endsection
