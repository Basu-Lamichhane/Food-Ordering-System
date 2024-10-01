@extends('adminlte::page')

@section('title', 'Discount Coupons')

@section('js')
    <script type="text/javascript">
        function deleteCoupon(id){
            if(confirm('Are You sure you want to delete this Coupon?')){
                document.querySelector('#delete-'+ id).submit();
            }
        }
    </script>
@endsection

@section('content')
    <x-alert/>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size:1.5em;font-weight: bold">All Coupons</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Generate New
                  </button>
                                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Generate Coupon</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('admin.coupons.store')}}" method="post">
                                    @csrf
                                    <input type="number" class="form-control" name="discount" placeholder="Will Discount" required>
                                    <input type="number" class="mt-2 form-control" name="max_uses" placeholder="Maximum Uses" required>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>


                            <button type="submit" class="btn btn-primary">Generate</button>
                        </form>
                            </div>
                        </div>
                        </div>
                    </div>

            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Coupon Number</th>
                        <th>Uses</th>
                        <th>Maximum Uses</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($coupons as $coupon)
                    <tr>
                        <td>{{$coupon->code}} ({{$coupon->discount}}%) </td>
                        <td>{{$coupon->uses}}</td>
                        <td>{{$coupon->max_uses}}</td>
                        <td>
                            <a href="#" onclick="deleteCoupon({{$coupon->id}})"><i class="fa fa-trash"></i></a>
                            <form style="display:none" method="POST" id="delete-{{$coupon->id}}" action="{{route('admin.coupons.destroy',$coupon->id)}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>



                   </tr>
                  @empty
                        <tr>

                           <td colspan="3"><span>No Coupons Generated Yet!</span></td>

                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

@stop
