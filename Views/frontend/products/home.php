<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4chan</title>
    <link rel="stylesheet" href="public/fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
    <link rel="stylesheet" type="text/css" href="public/css/base.css">
    <link rel="stylesheet" type="text/css" href="public/css/admin.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
</head>

<body>
    <div class="grid">
        <div class="head">
            <div class="grid__column-2-4">
                <div class="header1">
                    <h2>Trang Quản Lí</h2>
                </div>
            </div>
            <div class="grid__column-2-4">
                <div class="header2">
                    <div class="headerhome">
                        <i class="fas fa-home"></i>
                        <a href="../index.html">
                            <h4 class="left">WEBSITE</h4>
                        </a>
                    </div>
                    <div class="headerhome">
                        <i class="fas fa-user-shield"></i>
                        <a href="">
                            <h4 class="left">ADMIN</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="body">
            <!-- <div class="grid"> -->
            <div class="grid__row">
                <div class="grid__column-2">
                    <div class="grid__column-2-4">
                        <ul class="bodycontain">
                            <h3 class="headertext">Quản lí cửa hàng</h3>
                            <li class="headerbody"><a href="index.html">Thống kê</a></li>
                            <li class="headerbody"><a href="./tintuc/news.html">Tin tức</a></li>
                            <li class="headerbody"><a href="index.php?controller=product&action=index">Sản phẩm</a></li>
                            <li class="headerbody"><a href="index.php?controller=category&action=index">Loại sản phẩm</a></li>
                            <li class="headerbody"><a href="./ncc/NCC.html">Nhà cung cấp</a></li>
                        </ul>
                        <ul class="bodycontain">
                            <h3 class="headertext">Quản lí cửa hàng</h3>
                            <li class="headerbody"><a href="./maGG/MaGG.html">Mã giảm giá</a></li>
                            <li class="headerbody"><a href="./lienhe/LienHe.html">Liên hệ</a></li>
                            <li class="headerbody"><a href="?controller=order&action=index">Đơn hàng</a></li>
                            <li class="headerbody"><a href="./khachhang/khachhang.html">Khách hàng</a></li>
                            <li class="headerbody"><a href="./giaodien/giaodien.html">Giao diện</a></li>
                        </ul>
                        <ul class="bodycontain">
                            <h3 class="headertext">Quản lí cửa hàng</h3>
                            <li class="headerbody"><a href="">Hệ thống</a></li>
                            <li class="headerbody"><a href="login.html">Thoát</a></li>
                        </ul>
                    </div>
                </div>
                <div class="grid__column-11">
                    <div class="home-product-itemchart">
                        <div class="grid__column-2-4">
                            <div class="includedcontain">
                                <div class="headincludedcontain">
                                    <h3 class="boxheadcontain ">3</h3>
                                    <p class="containbox">Sản phẩm</p>
                                    <div class="iconbox">
                                        <i class="fas fa-bag"></i>
                                    </div>
                                </div>
                                <div class="footincludedcontain">
                                    <a href="./product/product.html" class="auth-form__help-link"><p class="containbox">Danh sách sản phẩm</p></a>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column-2-4">
                            <div class="includedcontain" style="background-color: #38d091;">
                                <div class="headincludedcontain">
                                    <h3 class="boxheadcontain">3</h3>
                                    <p class="containbox">Bài Viết</p>
                                </div>
                                <div class="footincludedcontain" style="background-color: #009551;">
                                    <a href="./tintuc/news.html" class="auth-form__help-link"><p class="containbox">Danh sách bài viết</p></a>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column-2-4">
                            <div class="includedcontain" style="background-color: #daaeae;">
                                <div class="headincludedcontain">
                                    <h3 class="boxheadcontain">3</h3>
                                    <p class="containbox">Liên Hệ</p>
                                </div>
                                <div class="footincludedcontain" style="background-color: #4d4e39;">
                                    <a href="./lienhe/LienHe.html" class="auth-form__help-link"><p class="containbox">Liên hệ Khách Hàng</p></a>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column-2-4">
                            <div class="includedcontain" style="background-color: #dd4b39;">
                                <div class="headincludedcontain">
                                    <h3 class="boxheadcontain">3</h3>
                                    <p class="containbox">Đơn Hàng</p>
                                </div>
                                <div class="footincludedcontain" style="background-color: #ce8a4a;">
                                    <a href="./donhang/listdonhang.html" class="auth-form__help-link"><p class="containbox">Danh sách đơn hàng</p></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Biểu đồ -->

                    <div class="line">
                        <div class="grid__column-10">
                            <div class="grid__row">
                                <p class="headerchart">
                                    Bán hàng & Doanh thu
                                </p>
                                <div class="bodychart">
                                    <div class="container">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>
        <div class="footeradmin">

        </div>
    </div>

    <script>
        let myChart = document.getElementById('myChart').getContext('2d');
        // Global Options
        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 10;
        Chart.defaults.global.defaultFontColor = '#777';
    
        let massPopChart = new Chart(myChart, {
          type:'bar',
          data:{
            labels:['1.2', '3.4', '5.6', '7.8', '9.10', '11.12'],
            datasets:[{
              label:'Bán ra',
              data:[
                710,
                130,
                300,
                200,
                140,
                430
              ],
              //backgroundColor:'green',
              backgroundColor:[
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255, 0.6)',
                'rgba(255, 159, 64, 0.6)',
                'rgba(255, 99, 132, 0.6)'
              ],
              borderWidth:1,
              borderColor:'#777',
              hoverBorderWidth:3,
              hoverBorderColor:'#000'
            }]
          },
          options:{
            title:{
              display:true,
              text:'Nhóm 4',
              fontSize:25
            },
            legend:{
              display:true,
              position:'right',
              labels:{
                fontColor:'#000'
              }
            },
            layout:{
              padding:{
                left:50,
                right:0,
                bottom:0,
                top:0
              }
            },
            tooltips:{
              enabled:true
            }
          }
        });
      </script>
</body>

</html>