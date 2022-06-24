<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <p>LIMITED PACKAGE USER</p>
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session('error'))
                <div class="alert alert-danger col-8 col-md-6 mx-auto mb-2">
                    <p class="text-center font-weight-bold my-0">{{session('error')}}</p>
                </div>
                @endif
                @if (session('success'))
                <div class="alert alert-success col-8 col-md-6 mx-auto mb-2">
                    <p class="text-center font-weight-bold my-0">{{session('success')}}</i></p>
                </div>
                @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">                
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
                <div class="col-md-4 ml-auto text-center mt-5">
                    <button class="btn btn-warning" data-toggle="modal" data-target="#paymentModal"> UPGRADE PACKAGE</button><br>
                    <small class="text-danger font-weight-bold">NOTE: Payment of N5,000 is required to enjoy full packaged</small>                    
                </div>
            </div>
        </div>
    </div>
      
    
    <!-- Payment Modal -->
  <div class="modal fade" id="paymentModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="paymentModalLabel">PACKAGE UPGRADE PAYMENT</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                <div class="row">
                    <div class="col-12">
                        <p>You are about to subcribe to our full package of <span class="font-weight-bold">NGN 5,000</span></p>
                        <input type="hidden" name="email" value="{{Auth::user()->email}}">
                        <input type="hidden" name="amount" value="500000">
                        <input type="hidden" name="currency" value="NGN">
                        <input type="hidden" name="metadata" value="{{ json_encode($array = ['user_id' => Auth::user()->id]) }}">
                        <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">                                        
                        {{ csrf_field() }}
                    </div>
                             
                    <div class="col-12 text-right">                            
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                        <button class="btn btn-success " type="submit" >PROCEED </button>
                    </div>   
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>