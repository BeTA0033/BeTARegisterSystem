@extends('site.app')
@section('icerik')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Ana Sayfa</h3>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        @foreach($haberler as $haber)
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{$haber->baslik}}</h2>
                        <ul class="nav navbar-right panel_toolbox">

                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        {{$haber->icerik}}
                    <br /><br /><br /><br />
                        <h6>Yazar : {{$haber->name}}<br /></h6>
                        <h6>Eklendiği Tarih & Saat : {{$haber->created_at}}<br /></h6>
                            <h6>Güncellendiği Tarih & Saat : {{$haber->updated_at}}<br /></h6>

                    </div>
                </div>
            </div>
        </div>
            @endforeach
    </div>
    </div>
    <!-- /page content -->

@endsection

@section('css')

@endsection

@section('js')

@endsection