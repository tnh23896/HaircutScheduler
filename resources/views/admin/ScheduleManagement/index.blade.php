@extends('admin.templates.app')
@section ('title','Schedule Management')
@section('content')
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Schedule List
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">

            <button class="btn btn-primary shadow-md mr-2 hidden">Add New Seller</button>
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="#" class="dropdown-item"> <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Print
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i>
                                Export to Excel </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i>
                                Export to PDF </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hidden xl:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
            <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
                <select class="w-56 xl:w-auto form-select box ml-2">
                    <option>Status</option>
                    <option>Active</option>
                    <option>Inactive</option>
                </select>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                <tr>
                    <th class="whitespace-nowrap">
                        <input class="form-check-input" type="checkbox">
                    </th>
                    <th class="whitespace-nowrap">CUSTOMER NAME</th>
                    <th class="text-center whitespace-nowrap">NAME STAFF</th>
                    <th class="text-center whitespace-nowrap">PRICE</th>
                    <th class="text-center whitespace-nowrap">SCHEDULE TIME</th>
                    <th class="text-center whitespace-nowrap">CREATE AT</th>
                    <th class="text-center whitespace-nowrap">STATUS</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
                </thead>
                @foreach($data as $item)
                    <tbody>
                    <tr class="intro-x">
                        <td class="w-10">
                            <input class="form-check-input" type="checkbox">
                        </td>
                        <td class="!py-3.5">
                            <div class="flex items-center">
                                <div class="w-9 h-9 image-fit zoom-in">
                                    <img alt="Midone - HTML Admin Template"
                                         class="rounded-lg border-white shadow-md tooltip"
                                         src="dist/images/profile-7.jpg" title="Uploaded at 29 May 2022">
                                </div>
                                <div class="ml-4">
                                    <a href="#" class="font-medium whitespace-nowrap">{{$item->name}}</a>
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{$item->phone}}</div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center"><a class="flex items-center justify-center underline decoration-dotted"
                                                   href="javascript:;">{{$item->admin->username}}</a></td>
                        <td class="text-center capitalize">{{number_format($item->price) }}</td>
                        <td class="w-40">
                            <div class="flex items-center justify-center">{{$item->work_schedule_detail->time->time }}
                                <br> {{$item->day}}</div>
                        </td>
                        <td class="text-center">{{$item->created_at}}</td>
                        <td class="text-center">
                            @if( $item->status == "pending")
                                <span class="badge badge-warning">Pending</span>
                            @elseif($item->status == "success")
                                <span class="badge badge-info">Success</span>
                            @elseif($item->status == "canceled")
                                <span class="badge badge-success">Cancelled</span>
                            @endif
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center text-warning mr-3"
                                   href="{{route('admin.scheduleManagement.edit', $item->id)}}"> <i
                                        data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                <a data-tw-toggle="modal" data-tw-target="#modal{{$item->id}}"
                                   class="flex items-center text-success cursor-pointer">
                                    <svg viewBox="0 0 24 24" class="w-6 h-6 mr-1" fill="#ffffff"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                           stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M8.12673 3.56055C7.76931 3.24284 7.23069 3.24284 6.87327 3.56055C5.98775 4.34768 4.67284 4.38188 3.75 3.66317V20.337C4.67284 19.6183 5.98775 19.6525 6.87327 20.4396C7.23069 20.7573 7.76931 20.7573 8.12673 20.4396C9.05248 19.6167 10.4475 19.6167 11.3733 20.4396C11.7307 20.7573 12.2693 20.7573 12.6267 20.4396C13.5525 19.6167 14.9475 19.6167 15.8733 20.4396C16.2307 20.7573 16.7693 20.7573 17.1267 20.4396C18.0122 19.6525 19.3272 19.6183 20.25 20.337V3.66317C19.3272 4.38188 18.0122 4.34768 17.1267 3.56055C16.7693 3.24284 16.2307 3.24284 15.8733 3.56055C14.9475 4.38344 13.5525 4.38344 12.6267 3.56055C12.2693 3.24284 11.7307 3.24284 11.3733 3.56055C10.4475 4.38344 9.05248 4.38344 8.12673 3.56055ZM5.87673 2.43943C6.80248 1.61654 8.19752 1.61654 9.12327 2.43943C9.48069 2.75714 10.0193 2.75714 10.3767 2.43943C11.3025 1.61654 12.6975 1.61654 13.6233 2.43943C13.9807 2.75714 14.5193 2.75714 14.8767 2.43943C15.8025 1.61654 17.1975 1.61654 18.1233 2.43943C18.4807 2.75714 19.0193 2.75714 19.3767 2.43943C20.2963 1.62202 21.75 2.27482 21.75 3.50519V20.495C21.75 21.7253 20.2963 22.3781 19.3767 21.5607C19.0193 21.243 18.4807 21.243 18.1233 21.5607C17.1975 22.3836 15.8025 22.3836 14.8767 21.5607C14.5193 21.243 13.9807 21.243 13.6233 21.5607C12.6975 22.3836 11.3025 22.3836 10.3767 21.5607C10.0193 21.243 9.48069 21.243 9.12327 21.5607C8.19752 22.3836 6.80248 22.3836 5.87673 21.5607C5.51931 21.243 4.98069 21.243 4.62327 21.5607C3.70369 22.3781 2.25 21.7253 2.25 20.495V3.50519C2.25 2.27482 3.70369 1.62202 4.62327 2.43943C4.98069 2.75714 5.51931 2.75714 5.87673 2.43943ZM6.75 8.50017C6.75 8.08595 7.08579 7.75017 7.5 7.75017H16.5C16.9142 7.75017 17.25 8.08595 17.25 8.50017C17.25 8.91438 16.9142 9.25017 16.5 9.25017H7.5C7.08579 9.25017 6.75 8.91438 6.75 8.50017ZM6.75 12.0002C6.75 11.586 7.08579 11.2502 7.5 11.2502H16.5C16.9142 11.2502 17.25 11.586 17.25 12.0002C17.25 12.4144 16.9142 12.7502 16.5 12.7502H7.5C7.08579 12.7502 6.75 12.4144 6.75 12.0002ZM6.75 15.5002C6.75 15.086 7.08579 14.7502 7.5 14.7502H16.5C16.9142 14.7502 17.25 15.086 17.25 15.5002C17.25 15.9144 16.9142 16.2502 16.5 16.2502H7.5C7.08579 16.2502 6.75 15.9144 6.75 15.5002Z"
                                                  fill="#1C274C"></path>
                                        </g>
                                    </svg>
                                    View invoice details </a>
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
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-left"></i> </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-left"></i> </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-right"></i> </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-right"></i> </a>
                    </li>
                </ul>
            </nav>
            <select class="w-20 form-select box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select>
        </div>
        <!-- END: Pagination -->
    </div>

    {{-- Modal--}}
    <!-- BEGIN: Modal Toggle -->
    <!-- END: Modal Toggle --> <!-- BEGIN: Modal Content -->
    @foreach($data as $item)
        @include('admin.ScheduleManagement.modal')
    @endforeach

@endsection

