@extends('layouts.app')
@section('title','افزودن کاربر')
@section('mainContent')
    <div class="card">
        <div class="card-header">
            <h4 class="text-secondary">افزودن کاربر</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('insert-user') }}" method="POST" class="contactForm">
                @csrf
                <div class="form-row">
                    <div class="col">
                        <select name="newPersonel" id="newPersonel" class="form-control">
                            <option value="0" selected disabled>--- پرسنل جدید مجاز به کار با سیستم ---</option>
                            @foreach($helpers as $helper)
                                <option value="{{ $helper->national_code }}">{{ $helper->first_name . ' ' . $helper->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="username" id="username" placeholder="نام کاربری کد ملی می باشد." readonly>
                    </div>
                    <div class="col">
                        <input type="password" name="password" id="password" class="form-control" placeholder="کلمه عبور">
                    </div>
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-success">ارسال</button>
                    <button type="reset" class="btn btn-danger">بازنشانی</button>
                </div>
            </form>
        </div>
    </div>
@endsection
