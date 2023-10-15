@extends('admin.templates.app')
@section('title', ' User')
@section('content')
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        User List
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <div class="hidden xl:block mx-auto text-slate-500"></div>
            <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap text-center">ID</th>
                        <th class="whitespace-nowrap text-center">USER NAME</th>
                        <th class="whitespace-nowrap text-center">PHONE</th>
                        <th class="whitespace-nowrap text-center">EMAIL</th>
                        <th class="whitespace-nowrap text-center">BLACK STATUS</th>
                        <th class="text-center whitespace-nowrap ">ACTIONS</th>
                    </tr>
                </thead>
                @foreach ($data as $key => $item)
                    <tbody>
                        <tr class="intro-x">
                            <td class="text-center capitalize">{{ $item->id }}</td>
                            <td class="text-center capitalize">{{ $item->username }}</td>
                            <td class="text-center capitalize">{{ $item->phone }}</td>
                            <td class="text-center capitalize">{{ $item->email }}</td>
                            <td class="text-center capitalize">{{ $item->black_status == 0 ? 'Active' : 'Inactive' }}</td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a href="{{ route('admin.UserManagement.edit', $item->id) }}"
                                        class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square"
                                            class="w-4 h-4 mr-1"></i> Edit </a>
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
@endsection
