@extends('site.giris.girisekrani')
@section('icerik')

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form id="form" role="form" method="post" action="{{ route('login') }}">
                    {{csrf_field()}}
                    <h1>Giriş Ekranı</h1>
                    <div>
                        <input type="text" id="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E Posta" required autofocus />
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div>
                        <input type="password" id="password" name="password"  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Parola" required />
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default submit" >Giriş Yap</button>
                    </div>

                    <div class="clearfix"></div>

                    <div align="center" class="separator">

                        </p>
                        <div class="clearfix"></div>
                        <br/>
                        <div>
                            <h1><i class="fa fa-eye"></i> BeTA</h1>
                            <p>©2018 All Rights Reserved. Design by Berke Temel ATAK with bootstrap. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>

@endsection
@section('css')

@endsection

@section('js')

@endsection