<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
       
       

        <div style="text-align:center">
            <form action="{{ route('searchuser')}}" method="GET">
                <input type="text" name="search" placeholder="Email and Name" required/>
                <button type="submit" class='bg-success btn btn-success'>Search</button>
            </form>
        </div>

        <div style="text-align:right">
            <a href="{{url('/users')}}" class="bg-primary btn btn-primary" >Add New User</a>                
       </div>
    </x-slot>

    <div class="py-2">
        {{-- this below code for notificatin if user have notes --}}
                             
                        @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="fa fa-times"></i>
                            </button>
                             {{ session('success') }}
                        </div>
                        @endif

  
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
                <tr class='bg-info'>
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Action</th>    
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td class="text-center">
                        <a href="{{url('/user/edit',$user->id)}}" class='btn btn-info'><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Are You Sure to delete this?')" href="{{url('/user/delete',$user->id)}}" class='btn btn-danger'><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                    
                    
                </tr>
                @endforeach
            </tbody>
            
        </table>
        <div style="text-align:right">
            {!! $users->links() !!}
        </div>
       
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
