<?php
    session_start();
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    if(isset($_SESSION['username']))
    {
        $tenND=$_SESSION['username'];
        if($_SESSION['username']=="admin"){
            header("location:exit.php");
        }
         //echo $so;
    require_once("connection.php");
    $sql_cm = "SELECT COUNT(idG) AS so FROM sach,giohang,chitiet,user 
    WHERE username=nguoidat AND idG=idGct AND idSct=idSach AND nguoidat='$tenND'";
    $result_cm = $conn->query($sql_cm);
   // var_dump($result_cm);
    $row_cm = $result_cm->fetch_assoc();
    //echo($row_cm['so']); 
    $so=$row_cm['so'];
    //phan kiem tra so tien da mua sach.
    $sql_mn = "SELECT SUM(tongtien) AS tien FROM giohang,chitiet WHERE nguoidat='$tenND' and idGct=idG";
    $result_mn = $conn->query($sql_mn);
    $row_mn = $result_mn->fetch_assoc();
    $tien=$row_mn['tien'];
    }
?>

<!DOCTYPE html>
<html>
<head>
<title>TDT.Trang chủ</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/CSS.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="icon" href="image/logo.png">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/CSS2.css">
<link rel="stylesheet" href="css/CSS3.css">
<style>
#overflowTest {
    color: white;
    padding: 15px;
    width: 100%;
    height: 650px;
    overflow:auto;
    border: 1px solid #ccc;
}
</style>
</head>

<body>
    <div style="background-color:rgba(34, 34, 51,0.85);position:fixed" class="w3-block">
            <button onclick="myFunction()" class="w3-button" style="font-size:16px;color:white;margin-top:2px;margin-bottom:2px">Danh mục (Menu)</button>
            <div id="Demo" class="w3-dropdown-content w3-bar-block w3-gray">
                <a href="#nghethuat" class="w3-bar-item w3-button">Sách nghệ thuật</a>
                <a href="#treem" class="w3-bar-item w3-button">Sách trẻ em</a>
                <a href="#thieunien" class="w3-bar-item w3-button">Sách Thiếu niên</a>  
                <a href="#lichsu" class="w3-bar-item w3-button">Sách Lịch Sử</a>
                <a href="#nauan" class="w3-bar-item w3-button">Sách nấu ăn</a>
                <a href="#langman" class="w3-bar-item w3-button">Sách Lãng Mạn</a>
                <a href="#bian" class="w3-bar-item w3-button">Sách Bí ẩn</a>
            </div>
            <span ><a style="color:white" href="lsmh.php" class='w3-button'>Lịch sử mua hàng (History)</a></span>
            <span ><a style="color:white" href="#news" class='w3-button'>Tin tức (News)</a></span>
            <span ><a style="color:white" href="khtt.php" class='w3-button'>Ưu đãi KH (customer)<?php if(isset($tien)){
                if($tien>2000000)
                echo"<sup><img src='image/tt.png' width='60px'></sup>";
            }?></a></span>
            <span ><a style="color:white" href="#sale" class='w3-button'>Sách Giảm giá (Sale)</a></span>
            <span ><a style="color:white" href="#contact" class='w3-button'>Trợ giúp (Help)</a></span>
            <span style='display'>
        <?php
			if(isset($_SESSION['username'])){
                ?>
                  <a href="exit.php"><button class="w3-button w3-red w3-small w3-round w3-display-right">Đăng xuất</button></a>
                <?php
			}else{
				?><a href="login.php"><button class="w3-button w3-blue w3-small w3-round w3-display-right">Đăng nhập</button></a><?php
			}
        ?>
        </span>
    </div><br><br>
    <div id="dautrang"><img width="100%"src="image/image_top.png"></div>
    
    <div style="background-color:rgba(34, 34, 51, 0.85)" class='w3-table'>
        <table>
            <tr>
                <th><img style='margin-top:3px' class='w3-round' width='180px' src="image/logo.png"></th>
                <th><p style='font-size:28px' class='w3-text-white'>TDT shoponline</p></th>
                <th><p class='w3-text-white' style='margin-top:40px'>Xin chào <p></th>
                <th>
                <div style="font-size:32px;margin-top:24px" class="w3-text-red">
                <?php
                if(isset($_SESSION['username'])){
                    echo($_SESSION['username']);
                }else{
                    echo"Quý Khách";
                }
                ?></div>
                </th>
                <th><div style='margin-top:28px'>
                <?php
                if(isset($_SESSION['username'])){
                        ?>
                            <a href="giohang.php" style="margin-left:20px"class="w3-button w3-round w3-yellow"><img title="Giỏ hàng của bạn" width="28px" src="image/icon_shop.png">
                            <sup class="w3-red w3-round w3-large"><?php echo $so; ?></sup>
                            </a>
                        <?php
                }
                ?></div>
                </th>   
                <th>
                    <div style="margin-top:34px;margin-left:100px">
                    <form method='POST' action='search.php'>    
                        <input class='w3-round' placeholder='Bạn muốn tìm gì?' name='search' required>
                        <button class='w3-button w3-small w3-orange w3-round' value='Search' type='submit'><i class="fa fa-search"></i></button>
                    </form>
                    </div>
                </th>
            </tr>
        </table>
    </div>
    <div id="style1" class="w3-block w3-center">

        <button  class="w3-button">Sách nghệ thuật</button>
        <button class="w3-button">Sách Trẻ Em</button>
        <button class="w3-button ">Sách Thiếu Niên</button>
        <button class="w3-button">Sách Lịch Sử</button>
        <button class="w3-button" >Sách Nấu ăn</button>
        <button class="w3-button">Sách Lãng Mạn</button>
        <button class="w3-button">Sách Bí ẩn</button>
    </div>
    <div id='style1'style="font-size:40px;text-align:center"><strong>Book at TDT-shoponline</strong></div>
    <table class="w3-border w3-table" width="100%">
            <th><button title="Nghệ thuật" class="w3-button"><img width="80px" src="image/icon_loai/nghethuat.jpg"></button></th>
            <th><button title="Trẻ em" class="w3-button"><img width="80px" src="image/icon_loai/treem.jpg"></button></th>
            <th><button title="Thiếu niên" class="w3-button"><img width="80px" src="image/icon_loai/thieunien.jpg"></button></th>
            <th><button title="Lịch sử" class="w3-button"><img width="80px" src="image/icon_loai/lichsu.png"></button></th>
            <th><button title="Nấu ăn" class="w3-button"><img width="80px" src="image/icon_loai/nauan.jpg"></button></th>
            <th><button title="Lãng mạn" class="w3-button"><img width="80px" src="image/icon_loai/langman.png"></button></th>
            <th><button title="Bí ẩn" class="w3-button"><img width="80px" src="image/icon_loai/bian.jpg"></button></th>
    </table>
    <div>
            <div style='margin-top:16px'class="w3-quarter w3-small w3-center">
                
                <div class="w3-container w3-bar-block w3-border">
                    <a href="#nghethuat" class="w3-bar-item w3-button w3-yellow">Sách nghệ thuật<img class='w3-right' width="20px" src="image/icon_loai/nghethuat.jpg"></a>
                    <a href="#treem" class="w3-bar-item w3-button w3-green" >Sách Trẻ Em<img class='w3-right' width="20px" src="image/icon_loai/treem.jpg"></a>
                    <a href="#thieunien" class="w3-bar-item w3-button w3-red">Sách Thiếu niên<img class='w3-right' width="20px" src="image/icon_loai/thieunien.jpg"></a>
                    <a href="#lichsu" class="w3-bar-item w3-button w3-blue">Sách Lịch Sử<img class='w3-right' width="20px" src="image/icon_loai/lichsu.png"></a>
                    <a href="#nauan" class="w3-bar-item w3-button w3-orange" >Sách Nấu ăn<img class='w3-right' width="20px" src="image/icon_loai/bian.jpg"></a>
                    <a href="#langman" class="w3-bar-item w3-button w3-pink">Sách Lãng Mạn<img class='w3-right' width="20px" src="image/icon_loai/langman.png"></a>
                    <a href="#bian" class="w3-bar-item w3-button w3-gray">Sách Bí ẩn<img class='w3-right' width="20px" src="image/icon_loai/bian.jpg"></a>
                </div>
            </div>
            <div class="w3-threequarter">
                    <div class="w3-content w3-section" style="max-width:100%">
                        <img class="mySlides" src="image/1.jpg" style="width:100%;height:200px">
                        <img class="mySlides" src="image/6.jpg" style="width:100%;height:200px">
                                     
                    </div>
                <div class="w3-block">
                    <img width="25%"src="image/2.jpg">
                    <img width="24%"src="image/3.jpg">
                    <img width="25%"src="image/4.jpg">
                    <img width="24%"src="image/5.jpg">
                </div>
            </div>
    </div>   
    <img src="image/top2.png">
    <div class='w3-quarter w3-container' id="news">
        <img src="image/news.jpg" style="width:100%;height:90px">
        <div class="w3-round w3-red">Tin tức số 1</div><br>
        <div class="w3-round w3-yellow">Tin tức số 2</div><br>
        <div class="w3-round w3-blue">Tin tức số 3</div><br>
        <div class="w3-round w3-green">Tin tức số 4</div><br>
        <div class="w3-round w3-brown">Tin tức số 5</div><br>
    </div>
    <div class='w3-threequarter'>
        <div class="w3-border w3-myfont">
            <h2 id="style1"><strong><u>Menu Book</u></strong></h2>
            <div id="nghethuat" style='background-image:url(image/arts.jpg);background-size:100%'>
                <div class="w3-yellow w3-card" id="style3">Sách nghệ thuật<span style='margin-left:70%'><a href='book.php?id=2' class='w3-small'>Xem thêm</a></span></div>
                <!--cac san pham sach de o day-->
                <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:20px;margin-left:100px;margin-right:100px">
                    <div class="w3-row-padding w3-padding-16 w3-center">
                        <?php
                            require_once("connection.php");
                            $sql_nt = "SELECT * FROM sach,danhmuc WHERE id=idDM AND idDM=2";
                            $result_nt = $conn->query($sql_nt);  
                            if ($result_nt->num_rows > 0) {
                                $stop=0;
                                while($row_nt = $result_nt->fetch_assoc()) {
                                    echo "<div class='w3-quarter w3-card' style='margin-left:50px'>";?>
                                    <br>
                                    <img class='w3-hover-opacity' src='<?php echo($row_nt['image']);?>' style='width:100%;height:220px'/>
                                    <p class="w3-text-white w3-yellow"><?php echo $row_nt['gia']?> đ</p>
                                    <a class='w3-button w3-yellow w3-small' href="info.php?id='<?php echo($row_nt['idSach']);?>'">Mua sách</a><br><br><?php               
                                    echo "</div>";
                                    $stop++;
                                    if($stop==6){
                                        break;
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <br><br>
            <div id="treem"  style='background-image:url(image/kid.jpg);background-size:100% 100%'>
                <p class="w3-green w3-card" id="style3">Sách trẻ em<span style='margin-left:76%'><a href='book.php?id=3' class='w3-small'>Xem thêm</a></span></p>
                <!--cac san pham sach de o day-->
                <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:20px;margin-left:100px;margin-right:100px">
                    <div class="w3-row-padding w3-padding-16 w3-center">
                        <?php
                            require_once("connection.php");
                            $sql_te = "SELECT * FROM sach,danhmuc WHERE id=idDM AND idDM=3";
                            $result_te = $conn->query($sql_te); 
                            if ($result_te->num_rows > 0) {
                                $stop=0;
                                while($row_te = $result_te->fetch_assoc()) {
                                    echo "<div class='w3-quarter w3-card' style='margin-left:50px'>";?>
                                    <br>
                                    <img class='w3-hover-opacity' src='<?php echo($row_te['image']);?>' style='width:100%;height:220px'/>
                                    <p class="w3-text-white w3-green"><?php echo $row_te['gia']?> đ</p>
                                    <a class='w3-button w3-green w3-small' href="info.php?id='<?php echo($row_te['idSach']);?>'">Mua sách</a><br><br><?php               
                                    echo "</div>";
                                    $stop++;
                                    if($stop==6){
                                        break;
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <br><br>
            <div id="thieunien" style='background-image:url(image/teen.jpg);background-size:100% 100%'>
                <p class="w3-red w3-card" id="style3">Sách thiếu niên<span style='margin-left:73%'><a href='book.php?id=4' class='w3-small'>Xem thêm</a></span></p>
                <!--cac san pham sach de o day-->
                <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:20px;margin-left:100px;margin-right:100px">
                    <div class="w3-row-padding w3-padding-16 w3-center">
                        <?php
                            require_once("connection.php");
                            $sql_tn = "SELECT * FROM sach,danhmuc WHERE id=idDM AND idDM=4";
                            $result_tn = $conn->query($sql_tn);  
                            if ($result_tn->num_rows > 0) {
                                $stop=0;
                                while($row_tn = $result_tn->fetch_assoc()) {
                                    echo "<div class='w3-quarter w3-card' style='margin-left:50px'>";?>
                                    <br>
                                    <img class='w3-hover-opacity' src='<?php echo($row_tn['image']);?>' style='width:100%;height:220px'/>
                                    <p class="w3-text-white w3-red"><?php echo $row_tn['gia']?> đ</p>
                                    <a class='w3-button w3-red w3-small' href="info.php?id='<?php echo($row_tn['idSach']);?>'">Mua sách</a><br><br><?php               
                                    echo "</div>";
                                    $stop++;
                                    if($stop==6){
                                        break;
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <br><br>
            <div id="lichsu" style='background-image:url(image/his.jpg);background-size:100% 100%'>
                <p class="w3-blue w3-card" id="style3">Sách Lịch Sử<span style='margin-left:74%'><a href='book.php?id=5' class='w3-small'>Xem thêm</a></span></p>
                <!--cac san pham sach de o day-->
                <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:20px;margin-left:100px;margin-right:100px">
                    <div class="w3-row-padding w3-padding-16 w3-center">
                        <?php
                            require_once("connection.php");
                            $sql_ls = "SELECT * FROM sach,danhmuc WHERE id=idDM AND idDM=5";
                            $result_ls = $conn->query($sql_ls);  
                            if ($result_ls->num_rows > 0) {
                                $stop=0;
                                while($row_ls = $result_ls->fetch_assoc()) {
                                    echo "<div class='w3-quarter w3-card' style='margin-left:50px'>";?>
                                    <br>
                                    <img class='w3-hover-opacity' src='<?php echo($row_ls['image']);?>' style='width:100%;height:220px'/>
                                    <p class="w3-text-white w3-blue"><?php echo $row_ls['gia']?> đ</p>
                                    <a class='w3-button w3-blue w3-small' href="info.php?id='<?php echo($row_ls['idSach']);?>'">Mua sách</a><br><br><?php               
                                    echo "</div>";
                                    $stop++;
                                    if($stop==6){
                                        break;
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <br><br>
            <div id="nauan" style='background-image:url(image/cook.jpg);background-size:100% 100%'>
                <p class="w3-orange w3-card" id="style3">Sách Nấu ăn<span style='margin-left:75%'><a href='book.php?id=6' class='w3-small'>Xem thêm</a></span></p>
                <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:20px;margin-left:100px;margin-right:100px">
                    <div class="w3-row-padding w3-padding-16 w3-center">
                        <?php
                            require_once("connection.php");
                            $sql_ls = "SELECT * FROM sach,danhmuc WHERE id=idDM AND idDM=6";
                            $result_ls = $conn->query($sql_ls);  
                            if ($result_ls->num_rows > 0) {
                                $stop=0;
                                while($row_ls = $result_ls->fetch_assoc()) {
                                    echo "<div class='w3-quarter w3-card' style='margin-left:50px'>";?>
                                    <br>
                                    <img class='w3-hover-opacity' src='<?php echo($row_ls['image']);?>' style='width:100%;height:220px'/>
                                    <p class="w3-text-white w3-orange"><?php echo $row_ls['gia']?> đ</p>
                                    <a class='w3-button w3-orange w3-small' href="info.php?id='<?php echo($row_ls['idSach']);?>'">Mua sách</a><br><br><?php               
                                    echo "</div>";
                                    $stop++;
                                    if($stop==6){
                                        break;
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <br><br>
            <div id="langman" style='background-image:url(image/rom.jpg);background-size:100% 100%'>
                <p class="w3-pink" id="style3">Sách Lãng Mạn<span style='margin-left:73%'><a href='book.php?id=7' class='w3-small'>Xem thêm</a></span></p>
                <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:20px;margin-left:100px;margin-right:100px">
                    <div class="w3-row-padding w3-padding-16 w3-center">
                        <?php
                            require_once("connection.php");
                            $sql_ls = "SELECT * FROM sach,danhmuc WHERE id=idDM AND idDM=7";
                            $result_ls = $conn->query($sql_ls);  
                            if ($result_ls->num_rows > 0) {
                                $stop=0;
                                while($row_ls = $result_ls->fetch_assoc()) {
                                    echo "<div class='w3-quarter w3-card' style='margin-left:50px'>";?>
                                    <br>
                                    <img class='w3-hover-opacity' src='<?php echo($row_ls['image']);?>' style='width:100%;height:220px'/>
                                    <p class="w3-text-white w3-pink"><?php echo $row_ls['gia']?> đ</p>
                                    <a class='w3-button w3-pink w3-small' href="info.php?id='<?php echo($row_ls['idSach']);?>'">Mua sách</a><br><br><?php               
                                    echo "</div>";
                                    $stop++;
                                    if($stop==6){
                                        break;
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <br><br>
            <div id="bian" style='background-image:url(image/fan.jpg);background-size:100% 100%'>
                <p class="w3-gray" id="style3">Sách Bí Ẩn<span style='margin-left:78%'><a href='book.php?id=8' class='w3-small'>Xem thêm</a></span></p>
                <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:20px;margin-left:100px;margin-right:100px">
                    <div class="w3-row-padding w3-padding-16 w3-center">
                        <?php
                            require_once("connection.php");
                            $sql_ls = "SELECT * FROM sach,danhmuc WHERE id=idDM AND idDM=8";
                            $result_ls = $conn->query($sql_ls);  
                            if ($result_ls->num_rows > 0) {
                                $stop=0;
                                while($row_ls = $result_ls->fetch_assoc()) {
                                    echo "<div class='w3-quarter w3-card' style='margin-left:50px'>";?>
                                    <br>
                                    <img class='w3-hover-opacity' src='<?php echo($row_ls['image']);?>' style='width:100%;height:220px'/>
                                    <p class="w3-text-red w3-gray"><?php echo $row_ls['gia']?> đ</p>
                                    <a class='w3-button w3-gray w3-small' href="info.php?id='<?php echo($row_ls['idSach']);?>'">Mua sách</a><br><br><?php               
                                    echo "</div>";
                                    $stop++;
                                    if($stop==6){
                                        break;
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div>
    <?php
        if(!isset($_SESSION['username'])){?>
            <div class="w3-center w3-border-top">
                <p>Bạn đã đăng nhập chưa?</p>
                <a href="login.php"><button class="w3-button w3-blue w3-round-xlarge">Đăng nhập</button></a><br>
                Bạn chưa có tài khoản?<span><a style="color:red" href="register.php">Tạo tài khoản</a></span>
            </div><?php
        }
    ?>
    </div>
    <!-- Phần sách giảm giá -->
    <div id="sale" class='w3-center'>*****</div>
    <div class="w3-black" id="tour">
        <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
        <img class='w3-round' src='image/sale.jpg' style='width:50%;height:130px;margin-left:190px'>
        <p class="w3-opacity w3-center"><i>Giảm giá !</i></p><br>

        <ul class="w3-ul w3-border w3-white w3-text-grey">
            <li class="w3-padding">Tháng 9 <span class="w3-tag w3-red w3-margin-left">Đã hết</span></li>
            <li class="w3-padding">Tháng 10 <span class="w3-tag w3-red w3-margin-left">Đã hết</span></li>
            <li class="w3-padding">Tháng 11 <span class="w3-round w3-right w3-margin-right">Còn sách</span></li>
        </ul>

        <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">
            <div class="w3-margin-bottom">
            
            <div class="w3-container w3-white">
            <?php
                require_once("connection.php");
                $sql_sale = "SELECT * FROM sach,danhmuc WHERE id=idDM AND idDM=1";
                $result_sale = $conn->query($sql_sale);  
                if ($result_sale->num_rows > 0) {
                    while($row_sale = $result_sale->fetch_assoc()) {
                        echo "<div class='w3-quarter w3-white'>";?>
                        <br>
                        <img class='w3-hover-opacity' src='<?php echo($row_sale['image']);?>' style='width:100%;height:260px'/>
                        <p class="w3-text-gray" style='margin-left:60px'><strike><?php echo $row_sale['gia']?></strike> đ</p>
                        <p class="w3-text-red" style='margin-left:60px'><?php echo $row_sale['gia_sale']?> đ</p>
                        <a class='w3-button w3-black' style='margin-left:43px' href="info.php?id='<?php echo($row_sale['idSach']);?>'">Mua sách</a><br><br><?php               
                        echo "</div>";
                    }
                }
            ?>
                
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Phần nhận xét -->
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
        <h2 class="w3-wide w3-center">Liên hệ và nhận xét</h2>
        <p class="w3-opacity w3-center"><i>Câu hỏi? Nhận xét từ bạn !</i></p>
        <div class="w3-row w3-padding-32">
        <div class="w3-col m6 w3-large w3-margin-bottom">
            <i class="fa fa-map-marker" style="width:30px"></i> Hanoi, VietNam<br>
            <i class="fa fa-phone" style="width:30px"></i> Phone:0123456789<br>
            <i class="fa fa-envelope" style="width:30px"> </i> Email: abcdef@gmail.com<br>
        </div>
        <div class="w3-col m6">
            <form action="comment.php" method="POST">
            <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                <div class="w3-half">
                <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
                </div>
                <div class="w3-half">
                <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
                </div>
            </div>
            <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message">
            <button class="w3-button w3-black w3-section w3-right" type="submit">SEND</button>
            </form>
        </div>
        </div>
    </div>
<br>

<!--Phần cuối trang-->
<footer class="w3-container w3-center" style='background-color:rgba(34, 34, 51,0.85)'>
    <br>                    
    <h2 class="w3-wide">TDT-shoponline</h2>
    <p class="w3-opacity"><i>Bài tập thực hành cơ sở dữ liệu năm 2017</i></p>
    <i class="fa fa-facebook-official"></i>
    <i class="fa fa-instagram"></i>
    <i class="fa fa-youtube"></i>
    <i class="fa fa-twitter"></i>
    <i class="fa fa-phone"></i>
    <i class="fa fa-envelope"></i>    
    <br><br>
</footer>
    <script>
        var myIndex = 0;
        carousel();
        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            setTimeout(carousel, 2000); // Thay đổi sau 2s
        }
    </script>
    <script>
        function myFunction() {
            var x = document.getElementById("Demo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else { 
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>
</body>
</html>