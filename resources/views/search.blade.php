<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search Email') }}
        </h2>

        {{-- search bar --}}
        <div style="text-align:right">
            <form action="{{ route('search')}}" method="GET">
                <input type="text" name="search" placeholder="Email " required/>
                <input type="hidden" name="note_id" value="{{$note_id}}"/>
                <button type="submit" class='bg-success btn btn-success'>Search</button>
            </form>

        </div>
      
    </x-slot>
    <div class="py-2">
        
        @if(session()->has('status'))
        <div class="mb-5 shadow bg-purple-500">
          {{session('status')}}
        </div>
        @endif

        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class='bg-warning'>
                                <th class="text-center">Email</th>
                                <th colspan='2'  class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @if(isset($reciver))
                              @foreach ($reciver as $recivers)
                         <tr>
                             <td class="text-center">{{ $recivers->email }}</td>
                            
                             <td class="text-center"><a href="{{ route('sendMail') }}? id={{ $note_id }} &email={{ $recivers->email}}" class='bg-success btn btn-success'>Invite</a></td>
                           
                            </tr>
                             @endforeach
                           @else 
                    <div>
                        <h2></h2>
                    </div>
                @endif
                         
            
                        </tbody>
            
            
                    </table>
       
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
