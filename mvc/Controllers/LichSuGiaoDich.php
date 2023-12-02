<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

class LichSuGiaoDich extends Controller
{
    public static $userModel;
    public function __construct()
    {
        self::$userModel = $this->model("DichVuInModel");
        $temp = self::$userModel->lichSuGiaoDich();
        echo $temp;
    }


    public function show()
    {

    }

}
?>