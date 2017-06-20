<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        	['name'=>'Aston Martin AM-RB 001', 'price'=>'20000', 'category'=>'1', 'created_by'=>'1', 'content'=>'Aston Martin AM-RB 001 được thiết kế lấy cảm hứng từ xe đua F1, kết hợp giữa hãng xe Anh Quốc và đội đua Red Bull Racing. Siêu xe có giá 3,9 triệu USD được giới thiệu cuối tháng trước. Đây cũng là siêu xe chạy phố đầu tiên được thiết kế bởi kỹ sư hàng đầu của giải đua F1, Andrian Newey. Cung cấp sức mạnh cho xe là khối động cơ V12 hút khí tự nhiên và hệ thống bảo tồn năng lượng của một chiếc xe đua công thức 1. Theo nhà sản xuất, Aston Martin AM-RB 001 có số lượng hạn chế dưới 150 xe. Chiếc hypercar đầu tiên sẽ đến tay khách hàng vào năm 2018, trong khi bản chạy thử sẽ xuất hiện tên đường vào năm sau. '],
        	['name'=>'Ferrari LaFerrari Aperta', 'price'=>'40000', 'category'=>'1', 'created_by'=>'1', 'content'=>'Siêu xe mui trần Ferrari LaFerrari Aperta đã xuất hiện trên đường chạy thử tại Maranello, nơi đặt trụ sở của Ferrari, hồi tháng 7. Theo những thông tin đã công bố trước đó, LaFerrari Aperta sẽ bán ra thị trường vào năm 2017. Theo hãng siêu xe Italy, phiên bản mui trần LaFerrari Aperta mang những đặc tính vận hành tương tự như bản coupe, dù trọng lượng xe tăng lên. Do đó, cung cấp sức mạnh cho xe vẫn là động cơ V12 6,2 lít cùng với hệ thống hybrid HY-KERN, cho công suất lên đến 950 mã lực. Khách hàng lựa của siêu xe mui trần này có thể lựa chọn mui mềm hoặc mui carbon. Số lượng sản xuất của LaFerrari Aperta giới hạn dưới 100 xe, giá bán có thể lên đến 3,8 triệu USD tùy vào các tùy chọn. '],
        	['name'=>'McLaren P1 LM', 'price'=>'60000', 'category'=>'1', 'created_by'=>'2', 'content'=>'McLaren P1 LM là phiên bản nâng cấp của những chiếc P1, được sản xuất bởi Lanzante Motorsport. So với những chiếc xe chạy trên đường đua P1 GTR, phiên bản P1LM có trọng lượng nhẹ hơn, thay đổi một số chi tiết ở hệ thống làm mát và cánh gió sau. Giá bán của siêu xe này ở mức khoảng 3,7 triệu USD. '],
        	['name'=>'Bugatti Vision GranTurismo', 'price'=>'80000', 'category'=>'1', 'created_by'=>'3', 'content'=>'Theo thống kê của GT Spirit, những chiếc Bugatti Vision GranTurismo sẽ có giá khoảng 3 triệu USD, cao hơn so với Bugatti Chiron ra mắt cách đây không lâu. '],
        	['name'=>'Mercedes-AMG R50', 'price'=>'10000', 'category'=>'1', 'created_by'=>'3', 'content'=>'Thương hiệu xe Đức cũng lên kế hoạch tham gia vào phân khúc hypercar, với việc giới thiệu mẫu xe lấy cảm hứng từ xe đua công thức 1. Mercedes-AMG R50 được phát triển nhân kỷ niệm sinh nhật lần thứ 50 của AMG vào năm sau. Theo những thông tin ban đầu, siêu xe này có sức mạnh khoảng 1.300 mã lực kết hợp động cơ đốt trong và động cơ điện. Giá bán của Mercedes-AMG R50 ước tính khoảng 3 triệu USD. '],
        	['name'=>'Icona Vulcano Titanium', 'price'=>'70000', 'category'=>'1', 'created_by'=>'1', 'content'=>'Icona Vulcano Titanium là siêu xe đầu tiên trên thế giới sử dụng chủ yếu vật liệu titan, được thiết kế bởi Icona của Italy. Siêu xe triệu đô này được thiết kế với nhiều đặc tính của những chiếc xe nổi tiếng. Cung cấp sức mạnh cho xe là khối động cơ V8 6.2L, công suất 670 mã lực và mô-men xoắn cực đại 820 Nm tại 6.600 vòng/phút. Vulcano Titanium có khả năng tăng tốc từ 0-100 km/h trong khoảng 2,8 giây và có thể đạt vận tốc tối đa 355 km/h. Giá bán của Vulcano Titanium khoảng 2,7 triệu USD.'],
    	]);
    }
}
