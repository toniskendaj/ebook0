<div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<table id="cart" class="table table-bordered">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                 
                <tr rowId="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                        <div class="col-sm-3 hidden-xs h-3 w-3"><img src="{{ ucfirst($details['image']) }}" class="card-img-top"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $details['price'] }}</td>
                    
                    <td data-th="Subtotal" class="text-center"></td>
                    <td class="actions">
                    <button type='submit' class="text-inverse delete-product" data-toggle="tooltip">
                    <i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                <button class="btn btn-danger">Checkout</button>
            </td>
        </tr>
    </tfoot>
</table>
@if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif
    <script type="text/javascript">
   
   $(".edit-cart-info").change(function (e) {
       e.preventDefault();
       var ele = $(this);
       $.ajax({
           url: '{{ route("update.sopping.cart") }}',
           method: "patch",
           data: {
               _token: '{{ csrf_token() }}', 
               id: ele.parents("tr").attr("rowId"), 
           },
           success: function (response) {
              window.location.reload();
           }
       });
   });
  
   $(document).ready(function () {
       $(".delete-product").click(function (e) {
           e.preventDefault();

           var ele = $(this);

           $.ajax({
               url: '{{ route("delete.cart.product") }}',
               method: "POST", // Use POST method with _method: 'DELETE' for Laravel
               data: {
                   _token: '{{ csrf_token() }}',
                   id: ele.parents("tr").attr("rowId"),
                   _method: 'DELETE', // Laravel method spoofing
               },
               success: function (response) {
                   window.location.reload();
               },
               error: function (xhr, status, error) {
                   // Handle AJAX errors
                   console.error(xhr.responseText);
               }
           });
       });
   });
  
</script>
       
@section('scripts')

@endsection
</div>