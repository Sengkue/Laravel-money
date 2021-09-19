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
                    <div class="col-md-9">
                        @if(session("success"))
                           <b class="alert alert-success">{{session('success')}}</b>
                        @endif
                        <div class="card">
                            <div class="card-head">
                              <table class="table table-bordered">
                                       <thead>
                                            <tr>
                                            <th scope="col">ລຳດັບ</th>
                                            <th scope="col">ເງິນ</th>
                                            <th scope="col">ອະທິບາຍ</th>
                                            <th scope="col">ວັນທີ</th>
                                            <th scope="col">ໝາຍເຫດ</th>
                                            <th scope="col">ເວລາ</th>
                                            <!-- <th scope="col">User</th> -->
                                            <th scope="col">ແກ້ໄຂ</th>
                                            <th scope="col">ລືບ</th>
                                            </tr>
                                            
                                          
                                        </thead>
                                         <tbody>
                                                @foreach($money as $row)
                                                <tr>
                                                    <th>{{$money->firstItem()+$loop->index }}</th>
                                                    <td>{{$row->money_no}}kip</td>
                                                    <td>{{$row->money_explain}}</td>
                                                    <td>{{$row->money_date}}</td>
                                                    <td>{{$row->money_notice}}</td>                                         
                                                    <td>
                                                        @if($row->created_at == NULL)
                                                            ไม่ถูกนิยาม
                                                        @else 
                                                            {{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}
                                                        @endif
                                                    </td>

                                                    <!-- <td>{{$row->user->name}}</td> -->
                                                            <td>
                                                                <a href="{{url('/moneycome/edit/'.$row->id)}}" class="btn btn-primary">ແກ້ໄຂ<a>
                                                            </td>
                                                            <td>
                                                                <a href="{{url('/moneycome/delete/'.$row->id)}}" class="btn btn-danger">ລືບ<a>
                                                            </td>
                                                            
                                                     </tr>
                                                        @endforeach
                                          </tbody>
                                                    <tr>
                                                        <td><b>ລວມເງິນທຳໝົດ: </b></td>
                                                        <td class="text-danger">{{$countmoney}}kip</td>
                                                    </tr>
                                
                                 </table>
                                {{$money->links()}}
                    </div>
                    </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-header">form</div>
                        <div class="card-body">
                            <form action="{{route('addmoneycome')}}" method="post" >
                                @csrf
                                <div class="form-group">
                                    <label for="money">ຈຳນວນເງິນ</label>
                                    <input type="text" name="money" class="form-control">
                                    @error('money')
                                         <span class="text-danger ">{{$message}}</span><br>
                                    @enderror
                                    <label for="money">ອະທິບາຍ</label>
                                    <input type="text" name="explain" class="form-control">
                                    @error('explain')
                                         <span class="text-danger ">{{$message}}</span><br>
                                    @enderror
                                    <label for="money">ວັນທີ</label>
                                    <input type="date" name="date" class="form-control">
                                    @error('date')
                                         <span class="text-danger ">{{$message}}</span><br>
                                    @enderror
                                    <label for="money">ໝາຍເຫດ</label>
                                    <input type="text" name="notice" class="form-control">
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
