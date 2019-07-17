@extends('site.app')
@section('icerik')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Kullanıcı Tablosu</h3>
                </div>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <input type="text" autocomplete="off" name="searchTags" id="searchTags" class="form-control" placeholder="Arama Yap...">
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form id="kullanicitab_form" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">

                {{csrf_field()}}

                <!-- tablo baslar -->
                    <div class="table-responsive">
                        <table id="kullanicitablo" name="kullanicitablo" class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th>#</th>
                                <th class="column-title">Kullanıcı Adı </th>
                                <th class="column-title">Kimlik Numarası </th>
                                <th class="column-title">Ad </th>
                                <th class="column-title">Soyad </th>
                                <th class="column-title">E-Posta </th>
                                <th class="column-title">Yetki Türü </th>
                                <th class="column-title">Sil</th>
                                <th class="column-title">Düzenle</th>
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
                                    <td class=" ">{{$kullanici->no}}</td>
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
                                    <td class="">
                                        <form id="formk" name="formk" action=" " method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id" value="{{$kullanici->id}}">
                                            <input type="hidden" name="sira" value="{{$sira}}" id="sira">
                                            <button type="submit" class="btn btn-round btn-danger btn-xs" value="Sil">Sil</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="kullanicitab-duzenle/{{$kullanici->id}}" class="btn btn-round btn-primary btn-xs">Düzenle</a>
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

@endsection

@section('css')
    <link href="/css/sweetalert2.min.css" rel="stylesheet">
@endsection

@section('js')

    <script src="/js/jquery.form.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/messages_tr.min.js"></script>
    <script src="/js/sweetalert2.min.js"></script>
    <script>
        //Aramalarda büyük küçük harf duyarlılığı için
        jQuery.expr[':'].contains = function(a, i, m) {
            return jQuery(a).text().toUpperCase()
                .indexOf(m[3].toUpperCase()) >= 0;
        };
        $(document).ready(function () {
            $("#searchTags").keyup(function(){
                // inputa yazılan değeri alıyoruz
                var value = $("#searchTags").val();
                if(value.length==0){
                    $("#menuFull tr").show();
                }else{
                    $("#menuFull tr").hide();
                    $("#menuFull tr:contains("+value+")").show();
                }
            });
        });
    </script>
    <!--End of the search-->

    <!-- About delete row -->
    <script>
        $(document).ready(function () {
            $('form').validate();
            $('form').ajaxForm({
                beforeSubmit:function () {

                },
                success:function (response) {
                    swal(
                        response.baslik,
                        response.icerik,
                        response.durum
                    )
                    if(response.durum=='success'){
                        location.reload();
                    }
                }
            });
        });
    </script>
    <!--End of the script(delete)-->

@endsection