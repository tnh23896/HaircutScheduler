
<div class="modal fade modal_reviews{{$bill->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-white text-black">
            <div class="page-content container">
                <div class="page-header text-blue-d2 justify-content-end">
                </div>
                <div class="container px-5 pb-5">
                    <h1 class="text-center text-5xl pt-16 text-secondary-d1">ĐÁNH GIÁ NHÂN VIÊN</h1>
                    <p class="text-center pt-2 text-secondary-d1">HÂN HẠNH ĐƯỢC PHỤC VỤ.</p>
                    <form method="POST" action="{{route('reviews.store')}}">
                        @csrf
                        {{-- error --}}
                        <h3 class="mb-3">Bình luận</h3>
                        <div class="mb-3">
                            <label class="form-label" for="">Đánh giá</label>
                            <input type="text" name="user_id" value="{{auth('web')->user()->id}}" hidden>
                            <input type="text" name="bill_id" value="{{$bill->id}}" hidden>
                            <input type="text" name="admin_id" value="{{$bill->admin_id}}" hidden>
                            <div class="rating">
                                <span class="star" data-value="1"><i class="fa-regular fa-star "></i></span>
                                <span class="star" data-value="2"><i class="fa-regular fa-star "></i></span>
                                <span class="star" data-value="3"><i class="fa-regular fa-star "></i></span>
                                <span class="star" data-value="4"><i class="fa-regular fa-star "></i></span>
                                <span class="star" data-value="5"><i class="fa-regular fa-star "></i></span>
                            </div>
                            <input type="hidden" name="star" id="ratingInput" value="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Đánh giá</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('ratingInput');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const value = star.getAttribute('data-value');
            ratingInput.value = value;
            highlightStars(value);
        });
    });

    function highlightStars(value) {
        stars.forEach(star => {
            const starValue = star.getAttribute('data-value');
            if (starValue <= value) {
                star.querySelector('i').classList.add('text-warning');
                star.querySelector('i').classList.remove('fa-regular');
                star.querySelector('i').classList.add('fa-solid');
            } else {
                star.querySelector('i').classList.remove('text-warning');
                star.querySelector('i').classList.add('fa-regular');
                star.querySelector('i').classList.remove('fa-solid');
            }
        });
    }
</script>

@section('js_footer_custom')
    <script src="https://kit.fontawesome.com/42fd71818f.js" crossorigin="anonymous"></script>
@endsection

