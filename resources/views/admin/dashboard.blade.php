<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <p>ADMINISTRATOR</p>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <i class="fa-solid fa-users mr-2"></i> USER LIST
                </div>
                <div class="col-12 m-auto text-center table-responsive">
                    <table class="table table-sm table-striped table-bordered">
                        <thead class="thead-dark ">
                          <tr>
                            <th scope="col">S/N</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Package</th>
                          </tr>
                        </thead>
                        <tbody>                            
                        <?php $no = 1; ?>
                        @foreach ($all_user as $users)
                          <tr>
                            <th scope="row">{{$no}}</th>
                            <td>{{$users->name}}</td>
                            <td>{{$users->email}}</td>
                            <td>                                 
                                @if($users->role == 'free_user') Free Subscriber @else Paid Subcriber @endif                             
                            </td>
                          </tr>                          
                          <?php $no++?>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>