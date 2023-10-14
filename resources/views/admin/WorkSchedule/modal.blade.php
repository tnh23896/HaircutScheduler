<div id="modal{{ $item->id }}" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-content">
        <div id="error-work-schedule-edit"></div>
        <form id="crud-form-edit" data-id="{{ $item->id }}" enctype="multipart/form-data" class="intro-y box p-5">
            <input type="hidden" name="admin_id" value="{{ $employee->id }}">
            <div
                class="mb-5 inline-block relative pr-8 last:pr-0 last-of-type:before:hidden before:absolute before:top-1/2 before:right-3 before:-translate-y-1/2 before:w-1 before:h-1 before:bg-gray-300 before:rounded-full dark:text-gray-400 dark:before:bg-gray-600">
                <input type="date" class="text-white form-control form-control-lg" name="day"
                    value="{{ $item->day }}">
            </div>
            <ul class="text-sm text-gray-600">
                @foreach ($times as $time)
                    <li
                        class="mr-6 p-4 border-info inline-block relative pr-8 last:pr-0 last-of-type:before:hidden before:absolute before:top-1/2 before:right-3 before:-translate-y-1/2 before:w-1 before:h-1 before:bg-gray-300 before:rounded-full dark:text-gray-400 dark:before:bg-gray-600">
                        <input type="checkbox" class="form-check-input w-6 h-6" name="times[]"
                            value="{{ $time->id }}"
                            {{ in_array($time->id, $item->times->pluck('id')->toArray()) ? 'checked' : '' }}>
                        <span>{{ $time->time }}</span>
                    </li>
                @endforeach
            </ul>
            <div class="text-left mt-5">
                <button type="submit" class="btn btn-primary w-24">Lưu</button>
            </div>
        </form>
    </div>
</div>