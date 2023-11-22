<div id="modal{{ $item->id }}" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body p-10">
                <div class="intro-y box p-5">
                    <h2 class="font-medium text-base mb-5">Sửa thời gian làm việc</h2>
                    <p>Ngày: {{\Carbon\Carbon::parse($time->day)->format('d-m-Y')}}</p>
                </div>
                <form action="{{ route('admin.ScheduleEmployee.update', $item->id) }}" method="post" class="p-5">
                    @csrf
                    <div id="timeSlots" style="margin-top: 10px">
                        @foreach ($timeSlots as $time)
                        <li class="mb-2 mr-6 p-4 border-info inline-block relative pr-8 last:pr-0 last-of-type:before:hidden before:absolute before:top-1/2 before:right-3 before:-translate-y-1/2 before:w-1 before:h-1 before:bg-gray-300 before:rounded-full dark:text-gray-400 dark:before:bg-gray-600">
                        <input type="checkbox" class="form-check-input w-6 h-6" name="times[]"
                            value="{{ $time->id }}"
                            {{ in_array($time->id, $item->times->pluck('id')->toArray()) ? 'checked' : '' }}>
                        <span>{{ \Carbon\Carbon::parse($time->time)->format('H:i') }}</span>
                    </li>
                    @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">Lưu thay đổi</button>
                </form>
            </div>
        </div>
    </div>
</div>