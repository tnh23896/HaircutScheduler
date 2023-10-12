<div id="modal{{$item->id}}" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-content">
        <form action="#" method="post">
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
                        <td>
                            <input type="checkbox" data-id="{{$detail->id}}">
                        </td>
                    </tr>
               @endforeach
            </table>
        </div>
            <div class="text-right mt-5">
            <a href="{{route('admin.scheduleManagement.index')}}" class="btn btn-primary w-32 mr-1">List Schedule</a>
            <button type="submit" id="saveBtn" class="btn btn-success w-24 text-white">Save</button>
            </div>
        </form>
    </div>
</div>
