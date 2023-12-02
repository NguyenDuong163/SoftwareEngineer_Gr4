<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

class DichVuIn extends Controller
{
    public static $userModel;
    public function __construct()
    {
        self::$userModel = $this->model("DichVuInModel");
        $tenDangNhap = isset($_POST["tenDangNhap"]) ? $_POST["tenDangNhap"] : null;
        $maMayIn = isset($_POST["maMayIn"]) ? $_POST["maMayIn"] : null;
        // $tenFile = isset($_POST["tenFile"]) ? $_POST["tenFile"] : null;
        $soBanIn = isset($_POST["soBanIn"]) ? $_POST["soBanIn"] : null;
        $KhoGiay = isset($_POST["KhoGiay"]) ? $_POST["KhoGiay"] : null;
        $soTrangTrongFile = isset($_POST["soTrangTrongFile"]) ? $_POST["soTrangTrongFile"] : null;
        $soMatIn = isset($_POST["soMatIn"]) ? $_POST["soMatIn"] : null;
        //$TongSoTienThanhToan = isset($_POST["TongSoTienThanhToan"]) ? $_POST["TongSoTienThanhToan"] : null;
        $Pagespersheet = isset($_POST["Pagespersheet"]) ? $_POST["Pagespersheet"] : null;
        $ThoiGianHenLay = isset($_POST["ThoiGianHenLay"]) ? $_POST["ThoiGianHenLay"] : null;
        $TrangBatDau = isset($_POST["TrangBatDau"]) ? $_POST["TrangBatDau"] : null;
        $TrangKetThuc = isset($_POST["TrangKetThuc"]) ? $_POST["TrangKetThuc"] : null;
        $MayIn = isset($_POST["MayIn"]) ? $_POST["MayIn"] : null;
        if (isset($_FILES["file"])) {
            // Đường dẫn lưu trữ file
            $uploadDir = "Public/files/";

            // Tạo tên mới cho file (ví dụ: timestamp)
            $tenFile = time() . "_" . basename($_FILES["file"]["name"]);

            // Tạo đường dẫn đầy đủ của file tải lên
            $uploadPath = $uploadDir . $tenFile;

            // Di chuyển file tải lên vào thư mục lưu trữ
            move_uploaded_file($_FILES["file"]["tmp_name"], $uploadPath);
            $temp = self::$userModel->dichVuIn($tenDangNhap, $maMayIn, $tenFile, $soBanIn, $KhoGiay, $soTrangTrongFile, $soMatIn, $Pagespersheet,$ThoiGianHenLay,$TrangBatDau,$TrangKetThuc);
        }

        echo $temp;
    }


    public function show()
    {

    }

}
?>