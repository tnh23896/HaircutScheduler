@extends('client.templates.app')
@section('title', 'Chính sách và bảo mật')
@section('css_header_custom')
    <style>
        .c3 {
            margin-left: 25px
        }

        .fw600 {
            font-weight: 600
        }

        .c3,
        .c5 {
            padding-top: 3px;
            padding-bottom: 6px;
            orphans: 2;
            widows: 2;
            text-align: justify
        }

        .c31 {
            margin-left: 76px;
            text-indent: -31px
        }

        .c12 {
            margin-left: 28px;
            text-indent: -7px
        }

        .c2 {
            font-weight: 400;
        }

        .c11 {
            font-weight: 400;
        }

        .c9 {
            font-weight: 400;
        }

        .c24 {
            font-weight: 400;
        }
    </style>
@endsection
@section('content')
    @include('client.templates.navbar2')
    <section class="position-relative footer-area mb-5">
        <div class="container bg-text-area">
            <h2>Chính sách</h2>
        </div>
    </section>
    <div class="container ">
        <div class="mb-5">
            <h3 class="font-weight-semibold text-center" itemprop="headline">CHÍNH SÁCH XỬ LÝ DỮ LIỆU CÁ NHÂN</h3>
            <h3 class="font-weight-semibold text-center" itemprop="headline">VÀ BẢO VỆ THÔNG TIN CÁ NHÂN NGƯỜI DÙNG</h3>
        </div>
        <div class="c8 c26 doc-content mb-5">
            <p class="c5 c19 fw600"><span class="c0 c8">1.</span><span class="c7 c0 c8">Phạm vi thu thập</span></p>
            <p class="c5"><span class="c2">DTbarber thu thập các thông tin của Người dùng bao gồm dữ liệu cá nhân và
                    các thông tin liên quan đến Người dùng khi sử dụng hệ thống. Cụ thể:</span></p>
            <p class="c3"><span class="c11">- &nbsp;</span><span class="c2">DTbarber thu thập thông tin cá nhân
                    từ Người dùng khi Người dùng điền vào biểu mẫu trên Website bao gồm nhưng không giới hạn: tên và mật
                    khẩu đăng nhập, họ tên, email, số điện thoại, địa chỉ,,…</span></p>
            <p class="c3"><span class="c11">- &nbsp;</span><span class="c2">DTbarber thu thập các ý kiến phản hồi
                    từ Người sử dụng.</span></p>
            <p class="c3"><span class="c11">- &nbsp;</span><span class="c2">DTbarber thu thập thông tin liên quan
                    đến dịch vụ cung cấp bao gồm nhưng không giới hạn về hình ảnh, thông tin đặt lịch, sử dụng dịch vụ,… của
                    Người sử dụng</span></p>
            <p class="c5"><span class="c2 c8">Người dùng có trách nhiệm đảm bảo những thông tin mà mình cung cấp là đầy
                    đủ, chính xác, chân thực và luôn cập nhật. DTbarber không chịu trách nhiệm giải quyết bất kỳ tranh chấp
                    nào nếu thông tin Người dùng cung cấp không chính xác hoặc không được cập nhật hoặc giả mạo.</span></p>
            <p class="c5 c17 fw600"><span class="c0 c8">2.</span><span class="c7 c0 c8">&nbsp;Mục đích thu thập và xử lý dữ
                    liệu</span></p>
            <p class="c5"><span class="c2">Công ty thu thập thông tin từ Người dùng để:</span></p>
            <p class="c3"><span class="c11">- &nbsp;</span><span class="c2">Xác nhận đặt lịch sử dụng dịch vụ cho
                    Khách hàng</span></p>
            <p class="c3"><span class="c11">- &nbsp;</span><span class="c2">Xác nhận thông tin giao nhận sản phẩm
                    cung cấp cho Khách hàng</span></p>
            <p class="c3"><span class="c11">- &nbsp;</span><span class="c2">Vận hành và cải thiện chất lượng dịch
                    vụ</span></p>
            <p class="c3"><span class="c11">- &nbsp;</span><span class="c2">Cá nhân hóa trải nghiệm của Người
                    dùng: DTbarber phân tích và đưa ra những dự đoán về nhu cầu của Người dùng và phân vùng để Người dùng
                    được ưu tiên tiếp cận những vùng thông tin phù hợp nhất với nhu cầu đó.</span></p>
            <p class="c3"><span class="c11">- &nbsp;</span><span class="c11 c23">Nâng cao chất lượng dịch vụ bằng
                    việc gửi cách chăm sóc tóc, liên lạc giải quyết vấn đề khi khách hàng có trải nghiệm chưa tốt.</span>
            </p>
            <p class="c3"><span class="c11">- &nbsp;</span><span class="c2">Giới thiệu tới Người dùng các thông
                    tin mà DTbarber cho rằng sẽ hữu ích, bao gồm nhưng không giới hạn các dịch vụ, chương trình ưu đãi và
                    các gợi ý về tính năng.</span></p>
            <p class="c5 c19 fw600"><span class="c0 c8">3.</span><span class="c7 c0 c8">Những người hoặc tổ chức có thể
                    tiếp cận với thông tin thu thập</span></p>
            <p class="c5"><span class="c2 c8">Khi thông tin được đăng tải lên <a href="">dtbarber.site</a>,
                    những đối tượng sau đây được
                    quyền tiếp cận thông tin:</span></p>
            <p class="c5"><span class="c2">+ Cán bộ, công nhân viên công ty có nhiệm vụ thu thập thông tin Khách
                    hàng thuộc các bộ phận như Chăm Sóc Khách Hàng, Phân tích kinh doanh, Trải nghiệm Khách hàng, Công nghệ
                    thông tin,… Khi cần thiết, chúng tôi có thể sử dụng những thông tin này để liên hệ trực tiếp với khách
                    hàng dưới các hình thức như: xác nhận lịch đặt, giải đáp nhu cầu, thắc mắc,…</span></p>
            <p class="c5"><span class="c2">+ Công ty có thể công bố các thông tin cá nhân thu thập từ khách hàng cho
                    bên khác như đối tác để có thể chăm sóc khách hàng tốt nhất.</span></p>
            <p class="c5 c31"><span class="c2 c8">+ Bên thứ ba được DTbarber thuê, hợp tác, cộng tác để thực hiện một số
                    chức năng cần thiết liên quan đến dịch vụ DTbarber &nbsp;cung cấp như: lưu trữ máy chủ, phân tích dữ
                    liệu,nghiên cứu, &nbsp;tìm kiếm giải pháp truyền thông, xử lý các vấn đề liên quan đến thanh toán, khiếu
                    nại của Người dùng,...được tiếp cận thông tin trong phạm vi cần thiết để thực hiện các chức năng liên
                    quan.</span></p>
            <p class="c4"><span class="c2 c8">Thông tin cá nhân của Người dùng sẽ không được chia
                    sẻ với các doanh nghiệp hoặc tổ chức khác với bất cứ
                    mục đích gì ngoài các mục đích nêu tại Phần "Mục
                    đích thu thập và xử lý dữ liệu" nêu trên khi chưa
                    được sự đồng ý của Người dùng. Tuy nhiên, Công ty có
                    thể cung cấp các thông tin cho cơ quan chức năng khi
                    được yêu cầu hoặc khi thông tin đó được xác định có
                    ảnh hưởng, tác động tiêu cực cho Công ty trên cơ sở
                    tuân thủ các quy định của Pháp luật.</span></p>
            <p class="c5 c22 fw600"><span class="c0">4.</span><span class="c7 c0">Hậu quả, thiệt hại không mong muốn có
                    khả năng xảy ra</span></p>
            <p class="c5 c30"><span class="c2 c8">Trong quá trình tiếp nhận, lưu trữ và xử lý dữ liệu của Người dùng, có
                    thể phát sinh một số lỗi kỹ thuật hoặc sự đột nhập trái phép từ các đối tượng cố ý tấn công website. Khi
                    đó, thông tin và dữ liệu của của Người dùng có thể bị dò rỉ, đánh cắp, thu thập trái phép từ nhóm đối
                    tượng này.</span></p>
            <p class="c5 c30"><span class="c2 c8">Trong phạm vi trách nhiệm của mình, DTbarber đảm bảo duy trì các biện
                    pháp kỹ thuật cần thiết để ngăn chặn &nbsp;hành vi tấn công, đột nhập trái phép và nhanh chóng, kịp thời
                    áp dụng biện pháp khắc phục khi nhận thấy &nbsp;và bảo vệ dữ liệu của người dùng ở mức độ cao
                    nhất.</span></p>
            <p class="c5 c22 fw600"><span class="c0">5.</span><span class="c7 c0">Cách thức xử lý dữ liệu</span></p>
            <p class="c4"><span class="c9">DTbarber xử lý dữ liệu sau khi tiếp nhận bằng cách thức sau:</span></p>
            <p class="c4"><span class="c9">Dữ liệu được xử lý tự động thông qua các dạng phần mềm để đảm bảo sự bảo
                    mật dữ liệu người dùng bao gồm:</span></p>
            <p class="c4"><span class="c9">- &nbsp;Phần mềm mã hóa: Giúp mã hóa dữ liệu để đảm bảo tính bảo mật khi
                    lưu trữ hay truyền tải dữ liệu.</span></p>
            <p class="c4"><span class="c9">- &nbsp;Phần mềm quản lý danh sách kiểm soát truy cập: Hỗ trợ quản lý và
                    kiểm soát quyền truy cập vào dữ liệu, đảm bảo chỉ người dùng được phép có quyền truy cập vào dữ
                    liệu.</span></p>
            <p class="c4"><span class="c9">- &nbsp;Phần mềm xác thực: Hỗ trợ xác thực người dùng để đảm bảo chỉ có
                    người dùng được phép truy cập vào dữ liệu.</span></p>
            <p class="c4"><span class="c9">- &nbsp;Phần mềm phát hiện xâm nhập: Giúp phát hiện các mối đe dọa đến
                    tính bảo mật của dữ liệu và cảnh báo đơn vị sử dụng để có phương án đối phó.</span></p>
            <p class="c4"><span class="c9">Bên cạnh hệ thống xử lý dữ liệu tự động, DTbarber thành lập Bộ phận
                    chuyên trách quản lý và xử lý dữ liệu dựa trên các tiêu chuẩn, quy trình và quy tắc quản lý của Công
                    ty.</span></p>
            <p class="c5 c27 fw600"><span class="c0">6.</span><span class="c0 c7">Thời gian lưu trữ và xử lý thông tin,
                    dữ liệu</span></p>
            <p class="c4"><span class="c2">Mọi thông tin, dữ liệu được DTbarber lưu trữ cho tới khi Người dùng yêu
                    cầu xóa thông tin cá nhân của chính mình hoặc Chúng tôi cho rằng việc lưu trữ thông tin đó là không cần
                    thiết.</span></p>
            <p class="c4"><span class="c2">Thời gian bắt đầu và kết thúc xử lý dữ liệu: Dữ liệu được xử lý từ thời
                    điểm DTbarber tiếp cận được thông tin, dữ liệu do Người dùng đồng ý chia sẻ cho đến khi Người dùng có
                    yêu cầu về việc hạn chế, xoá bỏ hoặc rút lại sự đồng ý về việc cho phép xử lý dữ liệu.</span></p>
            <p class="c4 fw600"><span class="c0">7.</span><span class="c7 c0">Chỉnh sửa và xóa bỏ dữ liệu cá
                    nhân.</span></p>
            <p class="c4"><span class="c2">Người dùng có thể thay đổi hoặc xóa một phần hay toàn bộ thông tin mà
                    mình đã nhập tại giao diện quản lý tài khoản cá nhân. DTbarber có thể hỗ trợ xóa bỏ thông tin nếu Người
                    dùng yêu cầu, tuy nhiên người yêu cầu sẽ phải chứng minh mình có quyền hợp pháp đối với các thông tin
                    đó.</span></p>
            <p class="c4 fw600"><span class="c0">8.</span><span class="c7 c0">Cam kết bảo mật dữ liệu cá nhân người
                    dùng</span></p>
            <p class="c4"><span class="c9">DTbarber có các biện pháp thích hợp về kỹ thuật và an ninh để ngăn chặn
                    việc truy cập, khai thác và sử dụng trái phép thông tin Người dùng. DTbarber cũng thường xuyên phối hợp
                    với các chuyên gia bảo mật nhằm cập nhật những thông tin mới nhất về an ninh mạng để đảm bảo sự an toàn
                    về thông tin khi Người dùng truy cập, đăng ký mở tài khoản và/hoặc sử dụng các tính năng của
                    <a href="">dtbarber.site</a>. Khi thu thập dữ liệu, DTbarber thực hiện lưu giữ và bảo mật thông
                    tin Người dùng tại hệ
                    thống máy chủ và các thông tin Người dùng này được bảo đảm an toàn bằng các hệ thống tường lửa
                    (firewall), các biện pháp kiểm soát truy cập, mã hóa dữ liệu.</span></p>
            <p class="c4"><span class="c2">DTbarber không cung cấp thông tin Người dùng cho bất kỳ bên thứ ba nào
                    trừ các trường hợp cung cấp thông tin nhằm thực hiện “Mục đích thu thập và xử lý dữ liệu” nêu trên, phải
                    thực hiện theo yêu cầu của các cơ quan Nhà nước có thẩm quyền, hoặc theo quy định của pháp luật, hoặc
                    khi việc cung cấp thông tin đó là cần thiết để DTbarber cung cấp dịch vụ/tiện ích cho Người dùng (ví dụ:
                    cung cấp các thông tin giao nhận cần thiết cho các đơn vị đối tác vận chuyển …).</span></p>
            <p class="c4"><span class="c2">DTbarber thành lập một bộ phận nhân sự chuyên trách (Bộ phận bảo vệ dữ
                    liệu cá nhân) để quản lý và xử lý dữ liệu cá nhân của Người dùng, thường xuyên kiểm tra, giám sát hoạt
                    động thu thập, lưu trữ thông tin, phát hiện và ngăn chặn kịp thời các sự cố phát sinh liên quan đến dữ
                    liệu cá nhân của Người dùng.</span></p>
            <p class="c4"><span class="c2">Ngoài các trường hợp nêu trên, DTbarber sẽ có thông báo cụ thể cho
                    Người dùng khi phải tiết lộ Thông Tin Người dùng cho một bên thứ ba nào khác. Trong trường hợp này, 30
                    Shine cam kết sẽ chỉ tiết lộ thông tin khi được sự đồng ý của Người dùng.</span></p>
            <p class="c10 fw600"><span class="c7 c29">9. Vấn đề thanh toán qua VNPay</span>
            </p>
            <p class="c5"><span class="c2">DTbarber sẽ có các bước sau để hoàn lại tiền cho quý khách khi hủy đặt
                    lịch:</span></p>
            <p class="c3"><span class="c11">- &nbsp;</span><span class="c2">Sau khi hủy DTbarber sẽ gọi lại
                    bạn qua số điện thoại đặt lịch và xác minh khách hàng</span></p>
            <p class="c3"><span class="c11">- &nbsp;</span><span class="c2">Sau khi đã xác minh khách hàng,
                    DTbarber sẽ thanh toán lại khoản tiền cho quý khách.</span></p>
            <p class="c5"><span class="c2">DTbarber sẽ có các bước sau để hoàn lại tiền cho quý khách khi bớt hoặc
                    thêm dịch vụ:</span></p>
            <p class="c3"><span class="c11">- &nbsp;</span><span class="c2">Nếu khách hàng có mong muốn bớt số
                    lượng dịch vụ sử dụng thì sau khi sử dụng xong thì DTbarber sẽ xác nhận và hoàn trả lại số tiền cho quý
                    khách.</span></p>
            <p class="c3"><span class="c11">- &nbsp;</span><span class="c2">Nếu khách hàng có mong muốn thêm số
                    lượng dịch vụ sử dụng thì sau khi sử dụng xong thì DTbarber sẽ xác nhận và thêm số tiền phải trả.</span></p>
            <p class="c10 fw600"><span class="c7 c29">10. Chuyển thông tin cá nhân ngoài phạm vi địa phương của bạn</span>
            </p>
            <p class="c10"><span class="c24">DTbarber có thể cần chuyển thông tin cá nhân của Người dùng ra ngoài
                    phạm vi lãnh thổ Việt Nam nếu có bất kỳ nhà cung cấp dịch vụ hoặc các đối tác chiến lược (“các công ty
                    nước ngoài”) tham gia cung cấp một phần của một trong các Dịch vụ của DTbarber.</span></p>
        </div>
    </div>
@endsection
