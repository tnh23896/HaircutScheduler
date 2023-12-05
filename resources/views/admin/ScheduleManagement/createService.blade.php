<style>
    thead {
        position: sticky;
        top: -1px;
        background-color: white;
        border: 1px solid #dee2e6;
        z-index: 1;
        box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }
</style>
<div id="modal{{ $item->id }}" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-content">
        <div class="content">
            <!-- BEGIN: Top Bar -->

            <!-- END: Top Bar -->
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Thêm dịch vụ
                </h2>
            </div>
            <form action="{{ route('admin.scheduleManagement.scheduleDetails.store', $item->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class=" overflow-y-auto " style="height: 500px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-xl font-bold text-center">ID</th>
                                    <th class="text-xl font-bold text-center">Tên dịch vụ</th>
                                    <th class="text-xl font-bold text-center">Giá tiền</th>
                                    <th class="text-xl font-bold text-center">Dịch vụ sử dụng</th>
                                </tr>
                            </thead>
                            @if ($servicesNotInBooking->count() > 0)
                                @foreach ($servicesNotInBooking as $service)
                                    <tr>
                                        <td class="text-center">{{ $service->id }}</td>
                                        <td class="text-center">{{ $service->name }}</td>
                                        <td class="text-center">{{ number_format($service->price) }} VND</td>
                                        <td class="text-center">
                                            <input type="checkbox"class="qr-checkbox form-check-input"
                                                style="border-color: #312E81" name="active[]"
                                                value="{{ $service->id }}">
                                        </td>
                                    </tr>
                                @endforeach
                            @elseif($servicesNotInBooking->count() == 0)
                                <tr>
                                    <td colspan="4" class="text-center">Không có dịch vụ nào</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
                @if ($servicesNotInBooking->count() > 0)
                    <div class="text-right mt-5">
                        <button type="submit" id="saveBtn" class="btn btn-primary w-24">
                            Lưu
                        </button>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
