@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Add order details</h1>
        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
             @endif
             <form method="post" action="{{ route('orderdetails.store')}}">
                 @csrf
                 <div class="form-group">
                     <label for="order_detail_id">Order Detail ID: </label>
                     <input type="text" class="form-control" name="order_detail_id"/>
                 </div>
                 <div class="form-group">
                     <label for="product_id">Product: </label>
                     <input type="text" class="form-control" name="product_id" id="product_id"/>
                    <link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
                    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                    <script>
                        $(document).ready( function(){
                            $('#product_id').autocomplete({
                                source: function(request, response){
                                    $.ajax({
                                        url:"{{ url('autocomplete_products') }}",
                                        data: {
                                            term: request.term
                                        },
                                        dataType: "json",
                                        success : function(data){
                                            var resp = $.map(data,function(obj){
                                                return obj.name;
                                            });
                                        }
                                    });
                                    response(resp);
                                }
                            });
                        });
                    </script>
                 </div>
                 <div class="form-group">
                     <label for="order_id">Order ID:</label>
                     <select class="form-control" name="order_id">
                        @foreach($orders as $order)
                            <option value="{{ $order->order_id}}">{{ $order->order_id}}</option>
                        @endforeach
                     </select>
                  </div>
                 <div class="form-group">
                     <label for="product_quantity">Quantity:</label>
                     <input type="text" class="form-control" name="product_quantity"/>
                 </div>
                 <button type='submit' class='btn btn-primary-outline'>Add order detail</button>
             </form>
        </div>
    </div> 
</div>
@endsection
