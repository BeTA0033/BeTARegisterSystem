@extends('site.app')
@section('icerik')

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Haberler</h3>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form id="form" name="form" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">

                    {{csrf_field()}}

                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Haber Bilgileri</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><button type="submit" name="form1" class="btn btn-warning">Güncelle</button></li>
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            {{Form::bsText('baslik','Haber Başlığı : ',$haberbilgi->baslik)}}
                            {{Form::bsTextArea('icerik','Haber İçeriği : ',$haberbilgi->icerik)}}
                            <input type="hidden" id="ekleyen_id" name="kullanici_id" value="{{ Auth::user()->id }}">
                        </div>
                    </div>
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
                        $(location).attr('href', '/habertab');
                    }
                }
            });
        });
    </script>
@endsection