<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- <x-jet-welcome /> -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card-header">form</div>
                        <div class="card-body">
                            <form action="{{url('/moneycome/update/'.$money->id)}}" method="post" >
                                @csrf
                                <div class="form-group">
                                    <label for="money">ຈຳນວນເງິນ</label>
                                    <input type="text" name="money" class="form-control" value="{{$money->money_no}}">
                                    @error('money')
                                         <span class="text-danger ">{{$message}}</span><br>
                                    @enderror
                                    <label for="money">ອະທິບາຍ</label>
                                    <input type="text" name="explain" class="form-control" value="{{$money->money_explain}}">
                                    @error('explain')
                                         <span class="text-danger ">{{$message}}</span><br>
                                    @enderror
                                    <label for="money">ວັນທີ</label>
                                    <input type="date" name="date" class="form-control" value="{{$money->money_date}}">
                                    @error('date')
                                         <span class="text-danger ">{{$message}}</span><br>
                                    @enderror
                                    <label for="money">ໝາຍເຫດ</label>
                                    <input type="text" name="notice" class="form-control" value="{{$money->money_notice}}">
                                    @error('notice')
                                         <span class="text-danger ">{{$message}}</span><br>
                                    @enderror
                                  <br>  <input type="submit" value="Save" class="btn btn-primary">
                                    <input type="reset" value="reset" class="btn btn-danger">
                                    
                                

                                </div>
                                </form>
                            

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
