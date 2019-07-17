@extends('site.app')
@section('icerik')
    <!-- page content -->
    <div align="left" class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{Auth::user()->name}} Profili</h3>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            @php
                                $rol=Auth::user()->rol_id;
                            if($rol==1)
                            {
                                $roladi='Admin';
                            }
                            elseif ($rol==2)
                            {
                                $roladi='Kullanici';
                            }
                            else
                            {
                                $roladi='Hatali';
                            }

                            @endphp
                            <h2>{{ Auth::user()->name }} <small>({{$roladi}})</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="col-md-6 col-sm-6 col-xs-12 profile_left">
                                <h3>{{ Auth::user()->name }}</h3>
                                <br />
                                <ul class="list-unstyled user_data">

                                    <li>
                                        <i class="fa fa-user"></i> E-Posta : {{ Auth::user()->email }}
                                    </li>
                                    <li>
                                        <i class="fa fa-user"></i> Kullanıcı Rol : {{ $roladi }}
                                    </li>
                                    <li>
                                        <i class="fa fa-user"></i> Oluşturulduğu Tarih & Saat : {{ Auth::user()->created_at }}
                                    </li>
                                    <li>
                                        <i class="fa fa-user"></i> Güncellendiği Tarih & Saat : {{ Auth::user()->updated_at }}
                                    </li>
                                </ul>
                            </div>

                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> Kullanıcılar Tablosu</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <form id="kullanicitab_form" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">

                            {{csrf_field()}}

                            <!-- tablo baslar -->
                                <div class="table-responsive">
                                    <table id="kullanicitablo" name="kullanicitablo" class="table table-striped jambo_table bulk_action">
                                        <thead>
                                        <tr class="headings">
                                            <th>#</th>
                                            <th class="column-title">Kullanıcı Adı </th>
                                            <th class="column-title">Ad </th>
                                            <th class="column-title">Soyad </th>
                                            <th class="column-title">E-Posta </th>
                                            <th class="column-title">Yetki Türü </th>
                                            </th>
                                            <th class="bulk-actions" colspan="7">
                                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                            </th>
                                        </tr>
                                        </thead>

                                        <tbody id="menuFull">
                                        @php
                                            $sira=1;
                                        @endphp
                                        @foreach($kullanicilar as $kullanici)
                                            <tr class="even pointer">
                                                <td class=" ">@php
                                                        echo $sira;
                                                        $sira++;
                                                    @endphp
                                                </td>

                                                <td class=" ">{{$kullanici->name}}</td>
                                                <td class=" ">{{$kullanici->ad}}</td>
                                                <td class=" ">{{$kullanici->soyad}}</td>
                                                <td class=" ">{{$kullanici->email}}</td>
                                                <td class=" ">
                                                    @php
                                                        $say=$kullanici->rol_id;
                                                        if($say==1)
                                                        {
                                                            echo 'Admin';
                                                        }
                                                        else if($say==2)
                                                        {
                                                            echo 'Kullanıcı';
                                                        }
                                                        else if($say==3)
                                                        {
                                                            echo 'Misafir';
                                                        }
                                                        else if($say==NULL)
                                                        {
                                                            echo 'Yetki Verilmemiş';
                                                        }
                                                        else
                                                        {
                                                            echo 'Hatalı Veri';
                                                        }
                                                    @endphp
                                                </td>
                                            </tr>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- tablo biter -->
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

    <!-- /page content -->

@endsection

@section('css')

@endsection

@section('js')

@endsection