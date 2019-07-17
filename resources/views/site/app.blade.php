<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BeTA! | Kayıt Sistemi</title>

    <!-- Bootstrap -->
    <link href="/site/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/site/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/site/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/site/build/css/custom.min.css" rel="stylesheet">
    @yield('css')
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="/anasayfa" class="site_title"><i class="fa fa-eye"></i> <span>BeTA</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">

                    <div class="profile_info" >
                        <span>Hoşgeldin, </span>
                        <a href="/profil"> <h2>{{ Auth::user()->name }}</h2></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a href="/anasayfa"><i class="fa fa-home"></i> Ana Sayfa</a>
                            <li><a href="/profil"><i class="fa fa-user"></i> Profil</a>
                            <li><a><i class="fa fa-edit"></i> Tanımlamalar<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/kullanici">Kullanıcı Bilgileri</a></li>
                                    <li><a href="/kimlik">Kimlik Bilgileri</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-table"></i> Kayıtlar<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/kimliktab">Kimlikler Listesi</a></li>
                                    <li><a href="/kullanicitab">Kullanıcı Listesi</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-newspaper-o"></i>Haberler<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/haberekle">Haber Ekle</a></li>
                                    <li><a href="/habertab">Haberleri Görüntüle</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="images/img.jpg" alt="">
                                {{ Auth::user()->name }}
                                    <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="profil"><i class="fa fa-user pull-right"> </i>Profile</a></li>
                                <li><a href="cikis"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

    @yield('icerik')

    <!-- footer content -->
        <footer>
            <div class="pull-right">
                <a href="http://berkedemel.wixsite.com/berketemelatak" target="_blank"> Berke Temel ATAK </a>tarafından oluşturulmuştur.
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="/site/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/site/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/site/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="/site/vendors/nprogress/nprogress.js"></script>

<!-- Custom Theme Scripts -->
<script src="/site/build/js/custom.min.js"></script>
@yield('js')
</body>
</html>
