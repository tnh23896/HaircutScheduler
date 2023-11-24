<script>
    $(document).ready(function() {
        $('#promotion').on('change', function() {
            // Xử lý sự kiện onchange ở đây
            var promoCode = $(this).val();
            var dataPromotion = @php echo json_encode($promotion) @endphp;
            for (var i = 0; i < dataPromotion.length; i++) {
                var promotion = dataPromotion[i];
                if (promotion.promocode == promoCode) {
                    var totalPrice = $('#totalPrice').text();
                    var discount = promotion.discount;
                    var newTotalPrice = totalPrice - discount;
                    $('#totalPrice').text(newTotalPrice);
                    $('#promotion').attr('disabled', true);
                    break;
                }
            }
        });
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
        $('input[name="services[]"]').on('change', function() {
            // Lấy danh sách các giá trị đã chọn
            var checked = $('input[name="services[]"]:checked');
            var totalPrice = 0;
            checked.each(function() {
                var price = parseFloat($(this).data('price'));
                totalPrice += price;
            });
            var promoCode = $('input[name="promoCode"]').val();
            if (promoCode) {
                const dataPromotioncode = @php echo json_encode($promotion) @endphp;
                for (var i = 0; i < dataPromotioncode.length; i++) {
                    var promotion = dataPromotioncode[i];
                    if (promotion.promocode == promoCode) {
                        var discount = promotion.discount;
                        let newTotalPrice3 = totalPrice - Number(discount);
                        $('#totalPrice').text(newTotalPrice3);
                        $('#promotion').attr('disabled', true);
                        break;
                    }
                }
            } else {
                $('#totalPrice').text(totalPrice);
            }
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
                        renderTimes([]);
                        toastr.error(error.responseJSON.message);
                    }
                );
            }
        }

        function renderTimes(times) {
            $('#timeSelect label').remove();
            times = Array.isArray(times) ? times : Object.values(times);
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
        $('#bookingConfirm').on('click', function() {
            const form = new FormData();
            const selectedServices = $('input[name="services[]"]:checked');
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
            const servicesId = [];
            selectedServices.each(function() {
                servicesId.push($(this).val());
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
            form.append('servicesId', servicesId);
            sendAjaxRequest("{{ route('admin.scheduleManagement.store') }}", 'post', form,
                response => {
                    toastr.success('Thêm đơn thành công .');
                    console.log(response);
                    location.href = "{{ route('admin.scheduleManagement.index') }}";
                },
                error => {
                    showErrors(error);
                }
            );
        });
    })
</script>
