<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

class LichSuMuaTrang extends Controller
{
    public static $userModel;
    public function __construct()
    {
        self::$userModel = $this->model("DichVuInModel");
        $tenDangNhap = isset($_POST["tenDangNhap"]) ? $_POST["tenDangNhap"] : null;

        $temp = self::$userModel->lichSuMuaTrang($tenDangNhap);
        echo $temp;
    }


    public function show()
    {

    }

}
?>