@extends('layouts.app')

<div class="main-content">
    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg dark:border-gray-700 mt-14">
            @livewireStyles
            <livewire:ipcrupdate/>
            @livewireScripts
        </div>
    </div> 
</div>