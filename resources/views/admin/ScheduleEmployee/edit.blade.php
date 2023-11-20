<div id="modal{{ $item->id }}" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body p-10">
                <div class="intro-y box p-5">
                    <h2 class="font-medium text-base mb-5">Sửa thời gian làm việc</h2>
                    <p>Ngày: {{$item->day}}</p>
                </div>
                <form action="{{ route('admin.ScheduleEmployee.update', $item->id) }}" method="post" class="p-5">
                    @csrf
                    <div id="timeSlots" style="margin-top: 15px">
                        @foreach ($timeSlots as $time)
                        <input type="checkbox" class="form-check-input w-6 h-6" name="times[]"
                            value="{{ $time->id }}"
                            {{ in_array($time->id, $item->times->pluck('id')->toArray()) ? 'checked' : '' }}>
                        <span>{{ $time->time }}</span>
                    @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">Lưu thay đổi</button>
                </form>
            </div>
        </div>
    </div>
</div>