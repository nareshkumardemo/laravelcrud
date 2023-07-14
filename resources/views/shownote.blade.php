<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>

         {{-- filter on the base of date form --}}
         <div style="text-align:left">
            <form action="{{ route('filter_Notes')}}" method="GET">
                     <label for="">To</label> <input type="date" name="to" required/>
                    <label for="">From</label><input type="date" name="from" required/>
                    <button type="submit" class='bg-info btn btn-info'>Filter</button>
            </form>
         </div>

         {{-- search bar Add new button --}}
         <div style="text-align:right">
            <a href="{{url('/note')}}" class="bg-primary btn btn-primary" >Add Note</a>                
           
            <form action="{{ route('searchtitle')}}" method="GET">
                <input type="text" name="search" placeholder="Search By Title" required/>
                <button type="submit" class='bg-success btn btn-success'>Search</button>
            </form>

            
        </div>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   
                    
                    @if(session()->has('status'))
                    <div class="mt-5 shadow bg-purple-500 font-bold py-2 px-4 rounded">
                      {{session('status')}}
                    </div>
                    @endif

        <table class="table table-bordered table-hover">
            <thead>
                <tr class='bg-warning'>
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">View</th>
                    <th colspan='2'  class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($notes as $note)
                <tr>
                   
                    <td>{{$note->id}}</td>
                    <td>{{$note->user->name}}</td>
                    <td>{{$note->title}}</td>
                    <td class="text-center"> <a href="{{url('/note/show',$note->id)}}" class='btn btn-info'><i class="fa-solid fa-eye"></i></a></td>
                    <td class="text-center"> <a href="{{url('/note/edit',$note->id)}}" class='btn btn-success'><i class="fas fa-edit"></i></a></td>
                    <td class="text-center"><a onclick="return confirm('Are You Sure to delete this?')" href="{{url('/note/delete',$note->id)}}" class='btn btn-danger'><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                       
                </tr>
                @endforeach
            </tbody>


        </table>
        
        <div style="text-align:right">
            {!! $notes->links() !!}
        </div>
       
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
