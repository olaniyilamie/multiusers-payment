<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <p>FULL PACKAGE USER</p>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (session('success'))
                    <div class="alert alert-success">
                        <p class="text-center font-weight-bold">{{session('success')}} <i class="fa-solid fa-handshake pl-3"></i></p>
                    </div>
                @endif
                <div class="p-6 bg-white border-b border-gray-200">
                    Welcome onboard !
                </div>
                <div class="col-12 m-auto text-right">
                  <p class="font-weight-bold alert alert-info">PAID USER <i class="fa-solid fa-user-check pl-3"></i></p>
                </div>
            </div>
        </div>
    </div>
  

</x-app-layout>