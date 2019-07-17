@extends('site.app')
@section('icerik')

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Tanımlamalar</h3>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form id="kimlikduzenle_form" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">

                    {{csrf_field()}}

                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Kimlik Bilgileri</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li> <button type="submit" name="kimlikduzenle" class="btn btn-warning">Güncelle</button></li>
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            {{Form::bsText('no','Kimlik Numarası : ',$kimlikbilgi->no)}}
                            {{Form::bsText('ad','Ad : ',$kimlikbilgi->ad)}}
                            {{Form::bsText('soyad','Soyad : ',$kimlikbilgi->soyad)}}
                            {{Form::bsText('telefon','Telefon : ',$kimlikbilgi->telefon)}}
                            {{Form::bsTextArea('adres','Adres : ',$kimlikbilgi->adres)}}
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
                        $(location).attr('href', '/kimliktab');
                    }
                }
            });
        });
    </script>

@endsection