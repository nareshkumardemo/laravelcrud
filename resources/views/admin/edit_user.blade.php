<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class='p-3 font-bold'>Edit User</h1>
                <div class='border-gray-600'>
                    <div class="p-4 bg-gray-700">
                      
                        @if(session()->has('status'))
                        <div class="mt-5 shadow bg-purple-500 font-bold py-2 px-4 rounded">
                          {{session('status')}}
                        </div>
                        @endif

                        <form method='post' class='w-full max-w-sm'>
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                              <label for="title">Id</label>
                              <input value = '{{$user->id}}' type="number" class="form-control" id="user_id" name='id'>
                            </div>
                            <div class="form-group">
                              <label for="notes">Name</label>
                              <input value = '{{$user->name}}' type="text" class="form-control" id="username_id" name='name'>
                            </div>

                            <div class="form-group">
                                <label for="notes">Email</label>
                                <input value = '{{$user->email}}' type="email" class="form-control" id="email_id" name='email'>
                              </div>
                           
                            <button type="submit" class="bg-primary btn btn-primary" role='button' value='update'>Update</button>
                          </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
