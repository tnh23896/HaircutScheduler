<section class="position-relative overlay bg-text">
    <div class="bg-image"
        style="background-image: url({{ asset($activeBanners->image ?? 'client/assets/images/banner1.jpg') }})"></div>
    <div class="container tilt">
        <div class="row align-items-center">
            <div class="second-page heading-style-3  m-auto text-center">
                <h2 class="text-uppercase" data-aos="fade-up" data-aos-delay="200">DT BARBER</h2>
                <p data-aos="fade-up" data-aos-delay="350" data-aos-offset="0">Chúng tôi không chỉ tạo kiểu tóc, chúng
                    tôi tạo nên tự tin.
                    Sứ mệnh của chúng tôi: Tạo nên vẻ đẹp không giới hạn.</p>
                <a class="theme-btn-2" href="{{ route('booking-service.index') }}" data-aos="fade-up"
                    data-aos-delay="350" data-aos-offset="50" data-aos-offset="0">Đặt lịch ngay</a>
            </div>
        </div>
    </div>
</section>
