@extends('admin.templates.app')
@section('title', 'Danh sách người dùng')
@section('content')
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Danh sách người dùng
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <div class="hidden xl:block mx-auto text-slate-500"></div>
            <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                <form action="{{route('admin.UserManagement.search')}}" method="GET" class="mr-3">
                    <div class="w-full relative text-slate-500 flex items-center">
                        <input type="text" name="search" class="form-control w-40 sm:w-auto box pr-10"
                               placeholder="Tìm kiếm..."
                               value="{{ request('search') }}">
                        <button type="submit">
                            <i class="w-5 h-5 absolute my-auto inset-y-0 mr-3 right-0 top-0" data-lucide="search"></i>
                        </button>
                    </div>
                </form>

                <form id="filterForm" action="{{route('admin.UserManagement.filter')}}" method="GET">
                    <select id="filterSelect" name="filter" class="w-40 sm:w-auto form-select box" onchange="submitForm()">
                        <option value="">Tất cả</option>
                        <option value="0">Kích hoạt</option>
                        <option value="1">Không kích hoạt</option>
                    </select>
                </form>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                <tr>
                    <th class="whitespace-nowrap text-center">Tên người dùng</th>
                    <th class="whitespace-nowrap text-center">Điện thoại</th>
                    <th class="whitespace-nowrap text-center">Email</th>
                    <th class="whitespace-nowrap text-center">Trạng thái tài khoản</th>
                    <th class="text-center whitespace-nowrap ">Hành động</th>
                </tr>
                </thead>
                @foreach ($data as $key => $item)
                    <tbody>
                    <tr class="intro-x">
                        <td class="text-center capitalize">{{ $item->username }}</td>
                        <td class="text-center capitalize">{{ $item->phone }}</td>
                        <td class="text-center capitalize">{{ $item->email }}</td>
                        <td class="text-center capitalize">
                            @if($item->black_status == 0)
                                <div class="flex items-center text-success"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i>Kích hoạt</div>
                            @else
                                <div class="flex items-center text-danger"><i data-lucide="x-circle" class="mr-2 w-4 h-4 mr-2 text-red-500"></i> Không kích hoạt </div>
                            @endif
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a href="{{ route('admin.UserManagement.edit', $item->id) }}"
                                   class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square"
                                                                                          class="w-4 h-4 mr-1"></i> Sửa
                                </a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                {{ $data->links('pagination::bootstrap-4') }}
            </nav>
        </div>
        <!-- END: Pagination -->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var filterSelect = document.getElementById('filterSelect');
            var urlParams = new URLSearchParams(window.location.search);
            var filterValue = urlParams.get('filter');
            var selectedValue = filterValue !== null ? filterValue : "";
            filterSelect.value = selectedValue;
        });

        function submitForm() {
            document.getElementById('filterForm').submit();
        }
    </script>
@endsection
