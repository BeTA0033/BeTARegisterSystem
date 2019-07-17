@extends('site.app')
@section('icerik')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Haberler Tablosu</h3>
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
                        <table id="haberlertablo" name="haberlertablo" class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th>#</th>
                                <th class="column-title">Başlık</th>
                                <th class="column-title">İçerik</th>
                                <th class="column-title">Yazar</th>
                                <th class="column-title">Ekleme Tarihi</th>
                                <th class="column-title">Güncellenme Tarihi</th>
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
                            @foreach($haberler as $haber)
                                <tr class="even pointer">
                                    <td class=" ">@php
                                            echo $sira;
                                            $sira++;
                                        @endphp
                                    </td>

                                    <td class=" ">{{$haber->baslik}}</td>
                                    <td class=" ">{{$haber->icerik}}</td>
                                    <td class=" ">{{$haber->name}}</td>
                                    <td class=" ">{{$haber->created_at}}</td>
                                    <td class=" ">{{$haber->updated_at}}</td>
                                    <td class="">
                                        <form id="formk" name="formk" action=" " method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id" value="{{$haber->id}}">
                                            <input type="hidden" name="sira" value="{{$sira}}" id="sira">
                                            <button type="submit" class="btn btn-round btn-danger btn-xs" value="Sil">Sil</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="habertab-duzenle/{{$haber->id}}" class="btn btn-round btn-primary btn-xs">Düzenle</a>
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