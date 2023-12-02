Bây giờ mình chuân bị 3 tài khoản sinh viên + máy in 

- API in tài liệu
+ in thành công đầu tiên nó lưu vào cơ sở dữ liệu hoa_don
+ đổi tên file để k bị trùng tên file và bị thay thế
+ sau đó nó upload file vào thư mục Public\files
+ Lưu lịch sử in lại


-Tiếp theo API hiển thị lịch sử in:
+ ở đây bạn sẽ xem được lịch sử in dựa vào tên đăng nhập của sinh viên
+ hiện tại sinhvien1 đã in
+ mỗi lần in sẽ lưu lại lịch sử và có thể xem lịch sử dựa vào tên đăng nhập của sinh viên


-Tiếp theo API hiển thị mua trang:
+ ở đây mình có thể mua trang bằng cách nhập tendangnhap, soTrang và phuongThucThanhToan
+ sau đó nó sẽ lưu vào database của bảng sv_lichsumuagiay

-Tiêp theo API hiển thị lịch sử mua trang:
+ ở đây bạn sẽ xem được lịch sử mua trang dựa vào tên đăng nhập của sinh viên
+ hiện tại sinhvien1 đã in
+ mỗi lần in sẽ lưu lại lịch sử và có thể xem lịch sử dựa vào tên đăng nhập của sinh viên

- luồng chạy của các API là: 
- Postman gọi API gửi đến -> Controller nhận và gửi đến -> Models để tương tác với Database 
- Sau đó Models trả về dữ liệu cho Controller -> controller trả lại kết quả cho Front end

Postman: 
+ gồm 2 phần: URL API + phướng thức: GET,POST,PUT,DELETE
- GET: dùng để lấy thông tin và hiển thị
- POST: dùng để làm chức năng thêm mới
- PUT: dùng để làm chức năng cập nhật
- DELETE: dùng để xóa
- Ví dụ URL API cho chức năng in tài liệu: http://localhost/dichvuin/DichVuIn
gồm 3 phần:
- http://localhost: là tên domain ở đây chạy local nên là localhost
- dichvuin: là tên folder source của bạn
- DichVuIn: là tên class của Controller

Mình Ví dụ về API in tài liệu : => khi Postman gửi request controller nó nhận và hàm __construct sẽ được chạy đầu tiên
- Trong __construct nó có gọi qua phương thức bên Models: dichVuIn
- phương thức dichVuIn ben model nó xử lý xong trả lại cho Controller
