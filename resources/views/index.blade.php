@extends('layouts.login')
@section('content')
    <div class="row justify-content-center makeItFullHeight align-items-center">
        <div class="col-4">
            <form class="text-right" method="POST" action="{{ route('login') }}">
                @csrf
                <fieldset class="loginFieldset">
                    <legend class="loginLegend text-"><span class="glyphicon glyphicon-user d-none d-sm-inline"></span>&nbsp;<span class=" d-inline">ورود به سیستم</span></legend>
                    <div class="form-group">
                        <label for="username">نام کاربری</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="نام کاربری را وارد کنید">
                    </div>
                    <div class="form-group">
                        <label for="password">کلمه عبور</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="کلمه عبور را وارد کنید">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block btn-sm">ورود</button>
                        <button type="reset" class="btn btn-danger btn-block btn-sm" onclick="resetFocus()">بازنشانی</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
