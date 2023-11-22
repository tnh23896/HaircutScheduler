<?php

return [
    //Viết quyền trùng với route của chức năng đó
    'danh mục dịch vụ' => [
        'admin.serviceManagement.category.index' => 'Danh sách',
        'admin.serviceManagement.category.create' => 'Thêm mới',
        'admin.serviceManagement.category.store' => 'Lưu',
        'admin.serviceManagement.category.edit' => 'Chỉnh sửa',
        'admin.serviceManagement.category.update' => 'Câp nhật',
        'admin.serviceManagement.category.delete' => 'Xóa',
    ],
    'dịch vụ' => [
        'admin.serviceManagement.service.index' => 'Danh sách',
        'admin.serviceManagement.service.create' => 'Thêm mới',
        'admin.serviceManagement.service.store' => 'Lưu',
        'admin.serviceManagement.service.edit' => 'Chỉnh sửa',
        'admin.serviceManagement.service.update' => 'Câp nhật',
        'admin.serviceManagement.service.delete' => 'Xóa',
    ],
    'nhân viên' => [
        'admin.employee.index' => 'Danh sách',
        'admin.employee.create' => 'Thêm mới',
        'admin.employee.store' => 'Lưu',
        'admin.employee.edit' => 'Chỉnh sửa',
        'admin.employee.update' => 'Cập nhật',
        'admin.employee.destroy' => 'Xóa',
        'admin.employee.show' => 'Chi tiết',
    ],
    'danh mục tin tức' => [
        'admin.blogManagement.category.index' => 'Danh sách',
        'admin.blogManagement.category.create' => 'Thêm mới',
        'admin.blogManagement.category.store' => 'Lưu',
        'admin.blogManagement.category.edit' => 'Chỉnh sửa',
        'admin.blogManagement.category.update' => 'Cập nhật',
        'admin.blogManagement.category.delete' => 'Xóa',
    ],
    'tin tức' => [
        'admin.blogManagement.blog.index' => 'Danh sách',
        'admin.blogManagement.blog.create' => 'Thêm mới',
        'admin.blogManagement.blog.store' => 'Lưu',
        'admin.blogManagement.blog.edit' => 'Chỉnh sửa',
        'admin.blogManagement.blog.update' => 'Cập nhật',
        'admin.blogManagement.blog.delete' => 'Xóa',
    ],
    'vai trò' => [
        'admin.RoleManagement.index' => 'Danh sách',
        'admin.RoleManagement.create' => 'Thêm mới',
        'admin.RoleManagement.store' => 'Lưu',
        'admin.RoleManagement.edit' => 'Chỉnh sửa',
        'admin.RoleManagement.update' => 'Cập nhật',
        'admin.RoleManagement.delete' => 'Xóa',
        'admin.RoleManagement.show' => 'Chi tiết',
    ],
    'lịch đặt' => [
        'admin.scheduleManagement.index' => 'Danh sách',
        'admin.scheduleManagement.create' => 'Thêm mới',
        'admin.scheduleManagement.store' => 'Lưu',
        'admin.scheduleManagement.edit' => 'Chỉnh sửa',
        'admin.scheduleManagement.update' => 'Cập nhật',
        'admin.scheduleManagement.getStaff' => 'Hiển thị thông tin',
    ],
    'chi tiết lịch đặt' => [
        'admin.scheduleManagement.scheduleDetails' => 'Danh sách',
        'admin.scheduleManagement.scheduleDetails.store' => 'Thêm mới dịch vụ',
        'admin.scheduleManagement.scheduleDetails.update' => 'Cập nhật dịch vụ',
        'admin.scheduleManagement.updateStatus' => 'Cập nhật trạng thái',
        'admin.scheduleManagement.getStaff' => 'Hiển thị thông tin',
    ],
    'hóa đơn' => [
        'admin.billManagement.index' => 'Danh sách',
    ],
    'banner' => [
        'admin.banners.index' => 'Danh sách',
        'admin.banners.create' => 'Thêm mới',
        'admin.banners.store' => 'Lưu',
        'admin.banners.edit' => 'Chỉnh sửa',
        'admin.banners.update' => 'Cập nhật',
        'admin.banners.delete' => 'Xóa',
    ],
    'người dùng' => [
        'admin.UserManagement.index' => 'Danh sách',
        'admin.UserManagement.update' => 'Cập nhật',
    ],
    'thời gian' => [
        'admin.TimeManagement.index' => 'Danh sách',
        'admin.TimeManagement.create' => 'Thêm mới',
        'admin.TimeManagement.store' => 'Lưu',
        'admin.TimeManagement.edit' => 'Chỉnh sửa',
        'admin.TimeManagement.update' => 'Cập nhật',
        'admin.TimeManagement.delete' => 'Xóa',
    ],
    'lịch nhân viên' => [
        'admin.ScheduleEmployee.index' => 'Danh sách',
        'admin.ScheduleEmployee.store' => 'Thêm mới',
        'admin.ScheduleEmployee.update' => "Cập nhật",
    ],
    'lịch làm việc' => [
        'admin.work-schedule.index' => 'Danh sách',
        'admin.work-schedule.store' => 'Lưu',
        'admin.work-schedule.show' => 'Chi tiết',
        'admin.work-schedule.update1' => 'Cập nhật',
        'admin.work-schedule.destroy' => 'Xóa',
    ],
    'khuyến mãi' => [
        'admin.PromotionManagement.index' => 'Danh sách',
        'admin.PromotionManagement.create' => 'Thêm mới',
        'admin.PromotionManagement.store' => 'Lưu',
        'admin.PromotionManagement.edit' => 'Chỉnh sửa',
        'admin.PromotionManagement.update' => 'Cập nhật',
        'admin.PromotionManagement.delete' => 'Xóa',
    ],
    'đánh giá' => [
        'admin.rating.index' => 'Danh sách',
        'admin.rating.delete' => 'Xóa',
    ],

    'thống kê' => [
        'admin.Statistical.scheduleStatistics' => 'Thống kê lịch đặt',
        'admin.Statistical.revenueStatistics' => 'Thống kê doanh thu',
        'admin.Statistical.serviceUsageStatistics' => 'Thống kê dịch vụ sử dụng',
        'admin.Statistical.employeeAndCustomerStatistics' => 'Thống kê nhân viên và khách hàng',
    ]
];