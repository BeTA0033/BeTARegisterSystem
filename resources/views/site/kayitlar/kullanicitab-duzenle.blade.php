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
                @foreach ($kullanicilar as $kullanici)
                    <form id="form1" name="form1" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">

                        {{csrf_field()}}

                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Kullanıcı Bilgileri</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><button type="submit" name="form1" class="btn btn-warning">Güncelle</button></li>
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br/>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Kimlik Numarası : </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="kimlik_id" id="kimlik_id" class="form-control">
                                            @foreach($kimlikler as $kimlik)
                                                <option value={{$kimlik->id}} {{$kullanici->kimlik_id==$kimlik->id ? 'selected' : ''}} >{{$kimlik->no}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{Form::bsText('name','Kullanıcı Adı : ',$kullanici->name)}}
                                {{Form::bsText('email','E-Posta : ',$kullanici->email)}}

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Yetki Türü : </label>
                                    <div class="col-md-6 col-sm-3 col-xs-12">
                                        <select name="rol_id" id="rol_id" class="form-control">
                                            @foreach($yetkilendirme as $yetki)
                                                <option value={{$yetki->id}} {{$kullanici->rol_id==$yetki->id ? 'selected' : ''}} >{{$yetki->roladi}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                @endforeach
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Parola Değiştir</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <center><button  id="parola" name="parola" class="btn btn-success" data-toggle="modal" href="#parolaModal" value="{{$kullanici->id}}">Parolayı Değiştir</button></center>
                                        </div>
                                    </div>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
    </div>

    <!-- Modal -->
    <div id="parolaModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Parola Değişimi</h4>
                </div>
                <form id="form2" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">

                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="x_panel">
                            <div class="x_content">
                                <br/>

                                {{Form::bsPassword('password','Yeni Parola : ',['class' => "form-control col-md-7 col-xs-12"])}}

                                <div class="form-group row">
                                    <label for="password-confirm" class="control-label col-md-3 col-sm-3 col-xs-12">Parola Doğrula:</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="pull-right">
                            <button type="submit" name="form2" class="btn btn-warning">Parola Değiştir</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

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