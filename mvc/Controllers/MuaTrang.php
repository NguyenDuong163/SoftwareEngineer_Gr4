<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
class MuaTrang extends Controller
{
    public static $userModel;
    public function __construct()
    {
        self::$userModel = $this->model("DichVuInModel");
        $tenDangNhap = isset($_POST["tenDangNhap"]) ? $_POST["tenDangNhap"] : null;
        $soTrang = isset($_POST["soTrang"]) ? $_POST["soTrang"] : null;
        $phuongThucThanhToan = isset($_POST["phuongThucThanhToan"]) ? $_POST["phuongThucThanhToan"] : null;

        $temp = self::$userModel->muaTrang($tenDangNhap,$soTrang,$phuongThucThanhToan);
        echo $temp;
    }


    public function show()
    {

    }

}
?>