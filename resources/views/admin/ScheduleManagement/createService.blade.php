<div id="modal{{$item->id}}" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-content">

        <div class="content">
            <!-- BEGIN: Top Bar -->

            <!-- END: Top Bar -->
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Thêm dịch vụ
                </h2>

            </div>

            <form action="{{route('admin.scheduleManagement.scheduleDetails.store', $item->id)}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-xl font-bold">ID</th>
                            <th class="text-xl font-bold">Name Service</th>
                            <th class="text-xl font-bold">Price</th>
                            <th class="text-xl font-bold">Service Uses</th>
                        </tr>
                        @if(!$servicesNotInBooking->empty())
                        @foreach($servicesNotInBooking as $service)
                            <tr>
                                <td>{{$service->id}}</td>
                                <td>{{$service->name}}</td>
                                <td>{{$service->price}}</td>
                                <td>
                                    <input type="checkbox"
                                           name="active[]" value="{{$service->id}}">
                                </td>
                            </tr>
                        @endforeach
                        @elseif($servicesNotInBooking->empty())
                            <tr>
                                <td colspan="4" class="text-center">Không có dịch vụ nào</td>
                            </tr>
                        @endif

                    </table>
                </div>
                @if(!$servicesNotInBooking->empty())
                <div class="text-right mt-5">
                        <button type="submit" id="saveBtn" class="btn btn-success w-24 text-white">
                            Save</button>
                </div>
                @endif
            </form>


        </div>

    </div>
</div>

