<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add User') }}
        </h2>

        <div style="text-align:right">
            <a href="{{url('/showuser')}}" class=" btn btn-warning" >Back</a>                
          
        </div>
          
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class='p-3 font-bold'>Add New user</h1>
                <div class='border-gray-600'>
                    <div class="p-4 bg-gray-700">
                        @if(session()->has('status'))
                        <div class="mt-5 shadow bg-purple-500 font-bold py-2 px-4 rounded">
                          {{session('status')}}
                        </div>
                        @endif

                        <form method='post' class='w-full max-w-sm'>
                            @csrf

                            <div class="form-group">
                              <label for="title">Name</label>
                              <input type="text" class="form-control" id="name_id" name='name'>
                            </div>
                            <div class="form-group">
                              <label for="notes">Email</label>
                              <input type="email" class="form-control" id="email_id" name='email'>
                            </div>
                            <div class="form-group">
                                <label for="notes">Password</label>
                                <input type="password" class="form-control" id="password_id" name='password'>
                              </div>
                              <div class="form-group">
                                <label for="notes">Confirm Pasword</label>
                                <input type="password" class="form-control" id="c_password_id" name='password'>
                              </div>
                           
                            <button type="submit" class="bg-primary btn btn-primary" role='button'>Add User</button>
                          </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
