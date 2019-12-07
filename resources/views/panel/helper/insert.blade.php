@extends('layouts.app')
@section('title','افزودن خادم یار جدید')
@section('mainContent')
    <div class="card">
        <div class="card-header">
            <h4 class="text-secondary">افزودن خادم یاران</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('insert-helper') }}" method="post">
                @csrf
                <div class="form-row">
                    <div class="col">
                        <!-- Aghed -> nc,name,family,phone -->
                        <input type="text" name="first_name" id="firstName" class="form-control" placeholder="نام را وارد کنید" maxlength="20" autofocus>
                    </div>
                    <div class="col">
                        <input type="text" name="last_name" id="lastName" class="form-control" placeholder="نام خانوادگی را وارد کنید" maxlength="20">
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col">
                        <input type="text" name="national_code" id="nc" class="form-control" placeholder="شماره ملی را وارد کنید" maxlength="10">
                    </div>
                    <div class="col">
                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="تلفن همراه را وارد کنید" maxlength="11">
                    </div>
                    <div class="col">
                        <select name="help_type" id="helpType" class="form-control">
                            <option value="0" selected disabled>--- رده همکاری ---</option>
                            @foreach($helperTypes as $helperType)
                                <option value="{{ $helperType->id }}">{{ $helperType->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col">
                        <select name="working_day" id="workingDay" class="form-control">
                            <option value="0" selected disabled>--- روز حضور ---</option>
                            @foreach($weekDays as $day)
                                <option value="{{ $day->id }}">{{ $day->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-1 text-center">
                        <label for="watchTime" class="text-dark">ساعت شیفت:</label>
                    </div>
                    <div class="col">
                        <input type="time" name="watch_time" id="watchTime" value="--:-- --" class="form-control text-left" placeholder="ساعت کشیک">
                    </div>
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-success">ذخیره</button>
                    <button type="reset" class="btn btn-danger">بازنشانی</button>
                </div>
            </form>
        </div>
    </div>
@endsection
