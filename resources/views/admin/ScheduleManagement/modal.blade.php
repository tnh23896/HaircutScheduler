<div id="modal{{$item->id}}" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-content">

        <div class="modal-header">
           <div>
               <h1 class="font-bold text-2xl">Bill Detail:#{{$item->id}}</h1>
            <h4 class="font-bold text-2sm">Customer Name: {{$item->name}}</h4>
            <h4 class="font-bold text-2sm">Phone: {{$item->phone}}</h4>
           </div>
        </div>
        <div class="modal-body">



            <table class="table table-bordered">
                <tr>
                    <th class="text-xl font-bold">Name Service</th>
                    <th class="text-xl font-bold">Price</th>
                </tr>
                @foreach($item->booking_details as $detail)
                    <tr>
                        <td>{{$detail->name}}</td>
                        <td>{{number_format($detail->total_price)}}</td>
                    </tr>
               @endforeach
                    <tr>
                        <th class="text-right">Total Price</th>
                        <th class="text-left">{{number_format($item->price)}}</th>
                    </tr>
            </table>
        </div>
        <div class="modal-footer">Footer</div>

    </div>
</div>
