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
                <form id="form" name="form" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">

                    {{csrf_field()}}

                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Kullanıcı Bilgileri</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li> <button type="submit" class="btn btn-info">Ekle</button></li>
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kimlik Numarası : </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="kimlik_id" class="form-control">
                                        @foreach($kimlikler as $kimlik)
                                            <option value={{$kimlik->id}}>{{$kimlik->no}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{Form::bsText('name','Kullanıcı Adı : ')}}
                            {{Form::bsText('email','E-Posta : ')}}
                            {{Form::bsPassword('password','Parola : ',['class' => "form-control col-md-7 col-xs-12"])}}

                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Yetki Türü : </label>
                                <div class="col-md-6 col-sm-3 col-xs-12">
                                    <select name="rol_id" class="form-control">
                                        <option value="1">Admin</option>
                                        <option value="2">Kullanıcı</option>
                                        <option value="3">Misafir</option>
                                    </select>
                                </div>
                            </div>
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
                        $(location).attr('href', '/kullanicitab');
                    }
                }
            });
        });
    </script>
@endsection