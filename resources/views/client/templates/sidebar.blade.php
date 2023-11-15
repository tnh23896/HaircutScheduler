<div class="profile-sidebar brd-rd5 wow fadeIn" data-wow-delay="0.2s">
	<div class="profile-sidebar-inner brd-rd5">
			<div class="user-info footer-area position-relative">

					<div class="user-info-inner">
							<h5 itemprop="headline"><a class="text-white" href="javascript:void(0)" title="" itemprop="url">{{Auth::user()->phone}}</a></h5>
							<span><a class="text-white" href="javascript:void(0)" title="" itemprop="url"><span class="__cf_email__" data-cfemail="8febfae2bccfece7e6e2ffe8fde0e0faa1ece0e2">Email: {{Auth::user()->email ?? ''}} </span></a></span>
							<a class="brd-rd3 sign-out-btn theme-btn-2" href="{{route('logout')}}" title="" itemprop="url"><i class="fa fa-sign-out"></i> Đăng xuất</a>
					</div>
			</div>
			<ul class="nav nav-tabs">
					<li><a href="#dashboard" data-toggle="tab" class="active"><i class="fas fa-tachometer-alt"></i> Trang chủ</a></li>
					<li><a href="{{ route('booking_history', Auth::user()->id) }}" ><i class="far fa-file-alt"></i>Lịch sử đặt lịch</a></li>
					<li><a href="#my-reviews" data-toggle="tab"><i class="fa fa-comments"></i> MY REVIEWS</a></li>
                    <li><a href="{{ route('bill') }}"><i class="fa fa-shopping-basket"></i>Trang hóa đơn</a></li>	
					<li><a href="{{ route('profile.edit') }}" ><i class="fa fa-cog"></i> THÔNG TIN CÁ NHÂN </a></li>
			</ul>
	</div>
</div>
