<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
       
        <div style="text-align:right">
            <a href="{{route('shownotes')}}" class=" btn btn-warning" >Back</a>                
            <a href="{{url('/note')}}" class="bg-primary btn btn-primary" ><i class="fa-solid fa-plus"></i></a>                
            <a href="{{url('/note/shaire/')}}?id={{$note->id}}" class="bg-primary btn btn-info" >shaire</a>                
    
        </div>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     
                  <h3>title : {{$note->title}}</h3> 
                    <div>
                        {{$note->notes}}
                    </div>
                    
                  

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
