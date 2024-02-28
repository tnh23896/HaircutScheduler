<script>
    jQuery(document).ready(function() {
        const serviceCategories = @json($serviceCategories);
        $('input[type="radio"][name="admin_id"]').on('change', function() {
            performAjaxRequest();
        });
        $('#timeSelect').on('change', 'input[type="radio"][name="time_id"]', function() {
            const admin = $('input[type="radio"][name="admin_id"]:checked').val();
            if (!admin) {
                toastr.error('Vui lòng chọn nhân viên');
                $('input[type="radio"][name="time_id"]').prop('checked', false);
            }
        });
        $('select[name="day"]').on('change', function() {
            performAjaxRequest();
        });
        $('#promotion').on('change', function() {
            // Xử lý sự kiện onchange ở đây
            var promoCode = $(this).val();
            var dataPromotion = @php echo json_encode($promotion) @endphp;
            for (var i = 0; i < dataPromotion.length; i++) {
                var promotion = dataPromotion[i];
                if (promotion.promocode == promoCode) {
                    var totalPrice = $('#totalPrice').text();
                    totalPrice = totalPrice.replace(/,/g, '');
                    var discount = promotion.discount;
                    var newTotalPrice = totalPrice - discount;
                    $('#totalPrice').text(Number(newTotalPrice).toLocaleString('en-US'));
                    $('#promotion').attr('disabled', true);
                    break;
                }
            }
        });
        serviceCategories.forEach(function(category) {
            $('input[name="' + category.id + 'services[]"]').on('change', function() {
                if (category.can_choose == 'one') {

                    if ($(this).is(':checked')) {
                        $('input[name="' + category.id + 'services[]"]').each(
                            function() {
                                jQuery(this).prop('checked', false);
                            }
                        )
                        jQuery(this).prop('checked', true);
                    }
                }
                var tottalPrice = 0;
                var promoCode = $('input[name="promoCode"]').val();
                if (promoCode) {
                    const selectedServices = [];

                    const dataPromotioncode = @php echo json_encode($promotion) @endphp;
                    jQuery.each(dataPromotioncode, function(index, promotion) {
                        if (promotion.promocode == promoCode) {
                            serviceCategories.forEach(function(category) {
                                $('input[name="' + category.id +
                                    'services[]"]:checked').each(
                                    function() {
                                        selectedServices.push($(this).data(
                                            'price'));
                                    });
                            })
                            tottalPrice = 0
                            if (!selectedServices.length) {
                                tottalPrice = 0
                            } else {
                                tottalPrice = selectedServices.reduce(function(a, b) {
                                    return Number(a) + Number(b);
                                })
                                var discount = promotion.discount;
                                let newTotalPrice3 = tottalPrice - Number(discount);
                                newTotalPrice3 = Number(newTotalPrice3).toLocaleString(
                                    'en-US');

                                $('#totalPrice').text(newTotalPrice3);
                            }

                        }
                    });
                } else {
                    const selectedServices = [];

                    serviceCategories.forEach(function(category) {
                        $('input[name="' + category.id + 'services[]"]:checked').each(
                            function() {
                                selectedServices.push($(this).data('price'));
                            });
                    })
                    tottalPrice = 0
                    if (!selectedServices.length) {
                        tottalPrice = 0
                    } else {
                        tottalPrice = selectedServices.reduce(function(a, b) {
                            return Number(a) + Number(b);
                        })
                        console.log(tottalPrice);
                    }
                    $('#totalPrice').text(Number(tottalPrice).toLocaleString('en-US'));
                }

            });

        });

        function performAjaxRequest() {
            const data = new FormData();
            const url = "{{ route('admin.scheduleManagement.getStaff') }}";
            const admin_id = $('input[type="radio"][name="admin_id"]:checked').val();
            const day = $('select[name="day"]').val();
            if (admin_id && day) {
                data.append('admin_id', admin_id);
                data.append('day', day);
                // Xóa hiển thị cũ trước khi gửi yêu cầu AJAX
                $('#timeSelect label').remove();
                sendAjaxRequest(url, 'post', data,
                    function(response) {
                        renderTimes(response.times);
                    },
                    function(error) {
                        console.log(error);
                        toastr.error(error.responseJSON.message);
                    }
                );
            }
        }

        function renderTimes(times) {
            $('#timeSelect label').remove();
            if (times.length === 0) {
                // Nếu không có thời gian, hiển thị trạng thái "rỗng"
                $('#timeSelect').html('<p>Không có thời gian làm việc trong ngày này.</p>');
            } else {
                // Nếu có thời gian, thêm thời gian vào #timeSelect
                times.forEach(function(time) {
                    let checkAvailable = "";
                    if (time.pivot) {
                        checkAvailable = time.pivot.status === 'unavailable' ? 'disabled' : '';
                    }
                    const radioOption = `
            <label class="check mr-1">
                <input type="radio" id="time_${time.id}" name="time_id" value="${time.id}" ${checkAvailable}>
                <span class="mt-3">${time.time}</span>
            </label>
        `;
                    $('#timeSelect').append(radioOption);
                });
            }
        }
        var editId = {{ $data->id }};
        $('#bookingConfirm').on('click', function() {
            const form = new FormData();
            const serviceCategories = @json($serviceCategories);
            const selectedServices = [];
            let totalPrice = $('#totalPrice').text();
            const name = $('input[name="name"]').val() || "";
            const selectedRadio = $('input[type="radio"][name="admin_id"]:checked');
            const adminId = selectedRadio.length > 0 ? selectedRadio.val() : "";
            const phone = $('input[name="phone"]').val() || "";
            totalPrice = totalPrice.replace(/,/g, '');
            const email = $('input[name="email"]').val() || "";
            const day = $('select[name="day"]').val() || "";
            const selectedTime = $('input[name="time_id"]:checked');
            const time = selectedTime.length > 0 ? selectedTime.val() : "";
            const promoCode = $('input[name="promoCode"]').val();
            // Khai báo mảng để lưu trữ giá trị của servicesId
            serviceCategories.forEach(function(category) {
                $('input[name="' + category.id + 'services[]"]:checked').each(function() {
                    selectedServices.push($(this).val());
                });
            });
            // Chuyển mảng servicesId thành chuỗi JSON
            form.append('name', name);
            form.append('admin_id', adminId);
            form.append('phone', phone);
            form.append('total_price', totalPrice);
            form.append('email', email);
            form.append('day', day);
            form.append('time', time);
            promoCode ? form.append('promo_code', promoCode) : "";

            // Thêm chuỗi JSON servicesId vào FormData
            form.append('servicesId', selectedServices);
            // form.append('servicesId', servicesIdJSON);
            var url = "{{ route('admin.scheduleManagement.update', ['id' => ':editId']) }}";
            url = url.replace(':editId', editId);
            sendAjaxRequest(url, 'post', form,
                response => {
                    toastr.success('Cập nhật đơn thành công .');
                    location.href = "{{ route('admin.scheduleManagement.index') }}";

                },

                function(error) {
                    showErrors(error);
                }
            );
        });
    })

    function toggleCollapse(toggleId, collapseId) {
        const toggleElement = document.getElementById(toggleId);
        const collapseElement = document.getElementById(collapseId);
        toggleElement.addEventListener('click', function() {
            if (collapseElement.classList.contains('hidden')) {
                collapseElement.classList.remove('hidden');
                collapseElement.classList.add('scale-100');
            } else {
                collapseElement.classList.remove('scale-100');
                collapseElement.classList.add('scale-0');
                setTimeout(() => {
                    collapseElement.classList.add('hidden');
                }, 300); // Thời gian hoàn thành transition
            }
        });
    }
    // Sử dụng hàm để điều khiển cả danh sách dịch vụ và danh sách nhân viên
    toggleCollapse('toggleCollapse', 'myCollapse');
    toggleCollapse('toggleEmployeeCollapse', 'employeeCollapse');
</script>
