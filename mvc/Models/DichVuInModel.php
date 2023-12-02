<?php
   class DichVuInModel extends Database
   {
        public function dichVuIn($tenDangNhap, $maMayIn, $tenFile, $soBanIn, $KhoGiay, $soTrangTrongFile, $soMatIn, $Pagespersheet,$ThoiGianHenLay,$TrangBatDau,$TrangKetThuc)
        {

            $student = $this->getStudent($tenDangNhap);
            $double = -1;
            $soTrangIn = $TrangKetThuc - $TrangBatDau + 1;
            if($TrangKetThuc > $soTrangTrongFile || $TrangBatDau > $soTrangTrongFile || $TrangBatDau > $soTrangTrongFile && $TrangKetThuc > $soTrangTrongFile) return json_encode(
                [
                    'description' => 'Trang Bat Dau va Trang ket thuc khong hop le!'
                ]
            );
            if($soTrangIn < 0) return json_encode(
                [
                    'description' => 'Trang Bat Dau phai nho hon Trang Ket Thuc'
                ]
            );
            if($soMatIn== 'Double-sided printing'){
                $double = 2;
            }
            else if($soMatIn == 'Single-sided printing'){
                $double = 1;
            }
            else{
                return json_encode(
                    [
                        'description' => 'Chỉ in được 1 hoặc 2 mặt mà thôi'
                    ]
                );
            }
            if (!preg_match("/^([0-1]?[0-9]|2[0-3]):[0-5][0-9]$/", $ThoiGianHenLay)){
                return json_encode(
                    [
                        'description' => 'Nhập đúng định dạng giờ:phút'
                    ]
                );
            }
            if($student['SoTrangSoHuu']  < ceil((ceil($soTrangIn / $Pagespersheet))/$double)*$soBanIn)
            {
                $response = [
                    'data' => 'empty',
                    'status' => '503',
                    'description' => 'Số trang sở hữu không đủ, cần mua thêm trang.!'
                ];

                return json_encode($response);
            }


            //Thực hiện in
            $query = "INSERT INTO `hoa_don`(`KhoGiay`,`SoMatIn`,`TrangThai`,`TenDangNhap`,`ThoiGianHenLay`,`SoTrangTrongFile`,`TenFile`,`Pagespersheet`,`GioHoanThanhIn`,`NgayHoanThanhIn`,`GioIn`,`NgayIn`,`TrangBatDau`,`TrangKetThuc`,`SoBanIn`,`MaMayIn`)
            VALUES ('".$KhoGiay."','".$maMayIn."','In thành công','".$tenDangNhap."','".$ThoiGianHenLay."',
            '".$soTrangTrongFile."','".$tenFile."','".$Pagespersheet."',TIMESTAMPADD(SECOND, 2, CURRENT_TIMESTAMP()),DATE_ADD(CURRENT_TIMESTAMP(), INTERVAL 2 SECOND),
            current_timestamp(),current_timestamp(),'".$TrangBatDau."','".$TrangKetThuc."','".$soBanIn."','".$maMayIn."')";

            $result = mysqli_query(self::$connect,$query);


            $this->updateStudent($tenDangNhap, $soTrangIn ,$Pagespersheet,$double,$soBanIn);


            $response = [
                'data' => $result,
                'status' => '200',
                'description' => 'In thành công'
            ];

            if (!$result) {
                $queryNewInvoice = "INSERT INTO `hoa_don`(`KhoGiay`,`SoMatIn`,`TrangThai`,`TenDangNhap`,`ThoiGianHenLay`,`SoTrangTrongFile`,`TenFile`,`Pagespersheet`,`GioHoanThanhIn`,`NgayHoanThanhIn`,`GioIn`,`NgayIn`,`TrangBatDau`,`TrangKetThuc`,`SoBanIn`,`MaMayIn`)
                VALUES ('".$KhoGiay."','".$maMayIn."','Thất bại','".$tenDangNhap."','".$ThoiGianHenLay."',
                '".$soTrangTrongFile."','".$tenFile."','".$Pagespersheet."',TIMESTAMPADD(SECOND, 2, CURRENT_TIMESTAMP()),DATE_ADD(CURRENT_TIMESTAMP(), INTERVAL 2 SECOND),
                current_timestamp(),current_timestamp(),'".$TrangBatDau."','".$TrangKetThuc."','".$soBanIn."','".$maMayIn."')";
                $resultNewInvoice = mysqli_query(self::$connect, $queryNewInvoice);
                $response = [
                    'data' => $result,
                    'status' => '200',
                    'description' => 'Máy In hiện tại có sinh viên đang dùng'
                ];
                die("Truy vấn thất bại: " . mysqli_error(self::$connect));
            }

            //$this->insertLichSuGiaoDich($tenDangNhap, $soBanIn, date("Y-m-d"), date("H:i:s"), $TongSoTienThanhToan);

            return json_encode($response);
        }

        public function getStudent($tenDangNhap){
            $query = "SELECT * FROM sinh_vien WHERE TenDangNhap = '".$tenDangNhap."'";
            $result = mysqli_query(self::$connect, $query);

            if (!$result) {
                die('Query failed: ' . mysqli_error(self::$connect));
            }

            $student = mysqli_fetch_assoc($result);

            return $student;
        }


        public function updateStudent($tenDangNhap, $soTrangIn,$Pagespersheet,$double,$soBanIn)
        {

            $query = "UPDATE sinh_vien SET SoTrangSoHuu = SoTrangSoHuu - ceil((ceil($soTrangIn / $Pagespersheet))/$double)*$soBanIn WHERE TenDangNhap = '".$tenDangNhap."'";

            mysqli_query(self::$connect, $query);
        }



        public function lichSuIn($tenDangNhap){
            $query = "SELECT sv.MSSV,tl.MaMayIn, tl.TenFile, tl.TrangThai,STR_TO_DATE(CONCAT(tl.NgayIn, ' ', tl.GioIn), '%Y-%m-%d %H:%i:%s')  AS ThoiGianBatDau, STR_TO_DATE(CONCAT(tl.NgayHoanThanhIn, ' ', tl.GioHoanThanhIn), '%Y-%m-%d %H:%i:%s') AS ThoiGianKetThuc, tl.TrangKetThuc - tl.TrangBatDau + 1 AS SoTrangIn
            FROM `hoa_don` as tl join sinh_vien as sv on tl.TenDangNhap = sv.TenDangNhap WHERE tl.TenDangNhap = '".$tenDangNhap."'";
            $result = mysqli_query(self::$connect,$query);
            $arr = array();

            while($rows = mysqli_fetch_assoc($result))
            {
                $arr[] = $rows;
            }

            return json_encode($arr);
        }

        public function insertLichSuGiaoDich($tenDangNhap, $SoTrangMua, $NgayMuaGiay, $GioMuaGiay, $TongSoTienThanhToan){
            $query = "INSERT INTO `sv_lichsumuagiay`(`TenDangNhap`, `SoTrangMua`, `NgayMuaGiay`, `GioMuaGiay`, `TongSoTienThanhToan`)
             VALUES ('".$tenDangNhap."','".$SoTrangMua."','".$NgayMuaGiay."','".$GioMuaGiay."','".$TongSoTienThanhToan."')";

                mysqli_query(self::$connect, $query);
        }


        public function lichSuGiaoDich(){
            $query = "SELECT `TenDangNhap`, `SoTrangMua`, `NgayMuaGiay`, `GioMuaGiay`, `TongSoTienThanhToan` FROM `sv_lichsumuagiay` WHERE 1";

            $result = mysqli_query(self::$connect,$query);
            $arr = array();

            while($rows = mysqli_fetch_assoc($result))
            {
                $arr[] = $rows;
            }

            return json_encode($arr);
        }
        public function muaTrang($tenDangNhap,$soTrang,$phuongThucThanhToan){
            $query = "UPDATE sinh_vien SET SoTrangSoHuu = SoTrangSoHuu + '".$soTrang."' WHERE TenDangNhap = '".$tenDangNhap."'";
            mysqli_query(self::$connect, $query);
            $response = [
                'data' => 'abc',
                'status' => '200',
                'description' => 'Mua trang thành công',
            ];
            $query = "INSERT INTO `sv_lichsumuagiay`(`TenDangNhap`, `SoTrangMua`, `NgayMuaGiay`, `GioMuaGiay`, `TongSoTienThanhToan`,`phuongThucThanhToan`)
            VALUES ('".$tenDangNhap."','".$soTrang."',current_timestamp(),current_timestamp(),'".(8000*$soTrang)."','".$phuongThucThanhToan."')";
                        // $query = "INSERT INTO `sv_lichsumuagiay`(`TenDangNhap`, `SoTrangMua`, `NgayMuaGiay`, `GioMuaGiay`, `TongSoTienThanhToan`,`phuongThucThanhToan`)
                        // VALUES ('".$tenDangNhap."','".$soTrang."','".date("Y-m-d")."','".date("H:i:s")."','".(8000*$soTrang)."','".$phuongThucThanhToan."')";
            mysqli_query(self::$connect, $query);
            return json_encode($response);
        }
        public function lichSuMuaTrang($tenDangNhap){
            $query = "SELECT sv.MSSV,ls.NgayMuaGiay,ls.TongSoTienThanhToan,ls.SoTrangMua, ls.PhuongThucThanhToan
            FROM `sv_lichsumuagiay` as ls join sinh_vien as sv on ls.TenDangNhap = sv.TenDangNhap WHERE ls.TenDangNhap = '".$tenDangNhap."'";

            $result = mysqli_query(self::$connect,$query);
            $arr = array();

            while($rows = mysqli_fetch_assoc($result))
            {
                $arr[] = $rows;
            }

            return json_encode($arr);
        }
   }
?>