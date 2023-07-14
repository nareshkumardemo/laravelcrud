<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
       
    </x-slot>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="row">
                        <div class="col-sm-6">
                          <div class="card">
                            <div class="card-body">
                             <h3>Total Notes</h3><br>
                                <h2>{{$notes}}</h2>
                                <br>
                                <i class="fa fa-sticky-note  fa-10x"></i><br>
                            <div style="text-align:right">
                                <a href="shownotes" class="btn btn-primary">Show Note</a>
                            </div>
                            </div>
                          </div>
                        </div>

                        {{-- this below card show only far Admin --}}
                        @can('isAdmin')
                        <div class="col-sm-6">
                          <div class="card">
                            <div class="card-body">
                               <h3>Total User</h3><br>
                                <h2>{{$users}}</h2>
                                <br>
                                <i class="fa fa-users fa-10x"></i>
                                <br>
                                <div style="text-align:right">
                                    <a href="showuser" class="btn btn-primary">Show User</a>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endcan
       

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
