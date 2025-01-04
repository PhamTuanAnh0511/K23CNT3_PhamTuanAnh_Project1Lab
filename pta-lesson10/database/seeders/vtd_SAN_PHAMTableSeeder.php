<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class vtd_SAN_PHAMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('vtd_SAN_PHAM')->insert([
            'vtdMaSanPham' => 'SS001',
            'vtdTenSanPham' => 'SamSung Galaxy S24 Utral',
            'vtdHinhAnh' => asset('img/san_pham/SS001.jpg'),
            'vtdSoLuong' => 100,
            'vtdDonGia' => 699000,
            'vtdMaLoai' => 2,
            'vtdMoTa' => 'Tính năng mới trên siêu phẩm Samsung Galaxy S24 Ultra
>> Đăng ký mua điện thoại trả góp online tại Điện thoại Giá Kho với lãi suất 0% ngay hôm nay để nhận ngay ưu đãi hấp dẫn!

Hiệu năng xử lý vượt trội
Samsung trang bị Galaxy S24 Ultra với một chipset Qualcomm Snapdragon 8 Gen 3, đánh dấu một bước tiến lớn về hiệu năng . So với phiên bản tiền nhiệm – Galaxy S23 Ultra, sử dụng Snapdragon 8 Gen 2 và chỉ đạt khoảng ~5.077 điểm. Trong khi đó, hiệu suất của S24 Ultra thực sự là một bước nhảy vọt ấn tượng 7.501 điểm, vượt trội hơn hẳn so với Apple A17 Pro (7.237 điểm).

Hiệu năng xử lý vượt trội


Order ngay Samsung Galaxy S24 Ultra tại Điện thoại Giá Kho
Đứng trước những ưu điểm mới mẻ của Samsung Galaxy S24 Ultra thì mức giá sản phẩm bao nhiêu? hiện đang là đề tài nóng của rất nhiều tín đồ Samsung. Một số nguồn tin cho rằng chiếc điện thoại thông minh này có nhiều nâng cấp đáng kể về cấu hình, bao gồm CPU, RAM, ROM, camera và tính năng AI độc đáo. Do đó, giá khởi điểm của S24 Ultra được dự đoán có thể lên đến 35.6 triệu đồng.

Tuy nhiên, một số nguồn khác cho rằng Samsung có thể duy trì giá bán ở mức 1.199 USD (tương đương khoảng 29 triệu đồng) để thu hút người dùng. Sự khác biệt giá này có thể phản ánh các chiến lược tiếp thị và cạnh tranh của Samsung trong thị trường smartphone đầy cạnh tranh. Vì vậy, đừng quên liên hệ Điện Thoại Giá Kho để nhận thông tin chính thức được công bố từ Samsung sớm nhất cũng như biết chính xác về giá bán của Galaxy S24 Ultra.

Với những thông tin rò rỉ hấp dẫn về tính năng mới trên Galaxy S24 Ultra ở trên, dự kiến các Samfans sẽ trải nghiệm một “siêu phẩm” thực sự từ Samsung. Hãy theo dõi trang Tin Công Nghệ thuộc Điện Thoại Giá Kho để cập nhật mọi thông tin mới nhất về sản phẩm ngay hôm nay nhé!',
            'vtdTrangThai' => 0
        ]);
        
       
        
        DB::table('vtd_SAN_PHAM')->insert([
            'vtdMaSanPham' => 'IP001',
            'vtdTenSanPham' => 'Điện Thoại Iphone 16',
            'vtdHinhAnh' => asset('img/san_pham/IP001.jpg'),
            'vtdSoLuong' => 100,
            'vtdDonGia' => 250000,
            'vtdMaLoai' => 1,
            'vtdMoTa' => 'CUPERTINO, CALIFORNIA Hôm nay, Apple công bố iPhone 16 và iPhone 16 Plus, giới thiệu chip A18 tùy chỉnh và những khả năng đáng kinh ngạc mới của camera, nâng tầm những gì iPhone có thể làm. Đồng thời giới thiệu Điều Khiển Camera trên dòng iPhone 16, đem đến những cách mới để tương tác với hệ thống camera tiên tiến, giúp người dùng ghi lại những kỷ niệm một cách dễ dàng và nhanh chóng. Hệ thống camera mạnh mẽ với một camera Fusion 48MP cùng tùy chọn Telephoto 2x, đem đến cho người dùng camera hai trong một, trong khi camera Ultra Wide có khả năng chụp ảnh macro. Phong Cách Nhiếp Ảnh thế hệ tiếp theo giúp người dùng có thể cá nhân hóa hình ảnh, chụp ảnh và quay video không gian, cho phép người dùng trải nghiệm lại những kỷ niệm quý giá trong cuộc đời với chiều sâu ấn tượng trên Apple Vision Pro. Chip A18 mới mang đến một bước nhảy vọt về hiệu năng và khả năng tiết kiệm điện, cho phép người dùng chơi các game AAA có đòi hỏi cao nhất, cũng như đem đến thời lượng pin tăng vượt trội. iPhone 16 và iPhone 16 Plus cũng được thiết kế cho Apple Intelligence7 - hệ thống trí tuệ cá nhân, dễ sử dụng với khả năng hiểu được bối cảnh cá nhân để mang đến thông tin hữu ích và phù hợp, mà vẫn bảo vệ quyền riêng tư của người dùng.
            iPhone 16 và iPhone 16 Plus màu xanh lưu ly được hiển thị chồng lên nhau.',
            'vtdTrangThai' => 0
        ]);
        
        DB::table('vtd_SAN_PHAM')->insert([
            'vtdMaSanPham' => 'HW001',
            'vtdTenSanPham' => 'Điện Thoại Huawei',
            'vtdHinhAnh' => asset('img/san_pham/HW001.jpg'),
            'vtdSoLuong' => 150,
            'vtdDonGia' => 590000,
            'vtdMaLoai' => 3,
            'vtdMoTa' => 'Huawei vừa chính thức công bố mẫu điện thoại Mate XT Ultimate Design, đánh dấu một bước đột phá trong công nghệ với thiết kế màn hình gập ba đầu tiên trên thế giới. Điều này không chỉ thể hiện tham vọng của Huawei trong việc dẫn đầu xu hướng công nghệ mà còn mở ra kỷ nguyên mới cho các thiết bị di động thông minh với khả năng biến đổi linh hoạt để phục vụ đa dạng nhu cầu người dùng.

            Thiết kế màn hình đột phá
            Mate XT Ultimate Design gây ấn tượng mạnh mẽ với thiết kế màn hình như một "tắc kè hoa" có khả năng chuyển đổi linh hoạt theo các chế độ khác nhau. Khi được gập lại, đây là một chiếc điện thoại thông minh nhỏ gọn với kích thước 6.4 inch, độ phân giải Full-HD+, rất tiện lợi cho việc cầm nắm và sử dụng hàng ngày. Tuy nhiên, khi mở một phần, máy biến thành một thiết bị có màn hình 7.9 inch với độ phân giải 2K, đáp ứng tốt các nhu cầu giải trí như xem phim, chơi game hoặc làm việc cơ bản.

            Sự "biến hình" chưa dừng lại ở đó, khi mở hoàn toàn, người dùng sẽ trải nghiệm màn hình rộng 10.2 inch với độ phân giải lên đến 3K, tương đương với một máy tính bảng cao cấp, lý tưởng cho các tác vụ công việc, sáng tạo nội dung hoặc thậm chí thay thế cho một laptop trong một số trường hợp.',
            'vtdTrangThai' => 0
        ]);

        DB::table('vtd_SAN_PHAM')->insert([
            'vtdMaSanPham' => 'IP002',
            'vtdTenSanPham' => 'Điện Thoại Iphone 15',
            'vtdHinhAnh' => asset('img/san_pham/IP002.jpg'),
            'vtdSoLuong' => 100,
            'vtdDonGia' => 799000,
            'vtdMaLoai' => 1,
            'vtdMoTa' => 'CUPERTINO, CALIFORNIA Hôm nay, Apple đã ra mắt iPhone 15 và iPhone 15 Plus, với mặt lưng bằng kính pha màu đầu tiên trong ngành cùng bề mặt nhám tuyệt đẹp, và thiết kế cạnh viền bo tròn mới trên vỏ máy làm bằng nhôm. Cả hai dòng máy đều được trang bị Dynamic Island, và hệ thống camera tiên tiến được thiết kế nhằm giúp người dùng chụp được những bức ảnh tuyệt diệu của mọi khoảnh khắc trong cuộc sống. Camera Chính 48MP mạnh mẽ hỗ trợ chụp ảnh với độ phân giải cực kỳ cao và tuỳ chọn Telephoto 2x mới mang đến cho người dùng ba mức thu phóng quang học - như được trang bị camera thứ ba. Dòng sản phẩm iPhone 15 cũng ra mắt chế độ chân dung thế hệ mới, giúp chụp ảnh chân dung dễ dàng hơn với chi tiết rõ nét và khả năng chụp ảnh trong điều kiện ánh sáng yếu. Với chip A16 Bionic mang lại hiệu năng mạnh mẽ đã được chứng minh, cổng kết nối USB‑C, tính năng Tìm Chính Xác dành cho Tìm Bạn, cùng các tính năng về độ bền hàng đầu trong ngành, iPhone 15 và iPhone 15 Plus thể hiện một bước nhảy vọt lớn.
                            iPhone 15 và iPhone 15 Plus sẽ có năm màu mới tuyệt đẹp: hồng, vàng, xanh lá, xanh dương và đen.
                            ',
            'vtdTrangThai' => 0
        ]);
        
     
        
    }
}