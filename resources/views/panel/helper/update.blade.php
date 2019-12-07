@extends('layouts.app')
@section('title','ویرایش اطلاعات')
@section('mainContent')
    <div class="card">
        <div class="card-header">
            <h4 class="text-secondary">ویرایش خادم یاران</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('update-helper') }}" method="post">
                @method('PATCH')
                @csrf
                <div class="form-row">
                    <div class="col">
                        <!-- Aghed -> nc,name,family,phone -->
                        <input type="text" name="first_name" id="firstName" value="{{ $user->first_name }}" class="form-control" placeholder="نام را وارد کنید" maxlength="20" autofocus>
                    </div>
                    <div class="col">
                        <input type="text" name="last_name" id="lastName" value="{{ $user->last_name }}" class="form-control" placeholder="نام خانوادگی را وارد کنید" maxlength="20">
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col">
                        <input type="text" name="national_code" id="nationalCode" value="{{ $user->national_code }}" class="form-control" readonly maxlength="10">
                    </div>
                    <div class="col">
                        <input type="text" name="mobile" id="mobile" value="{{ $user->mobile }}" class="form-control" placeholder="تلفن همراه را وارد کنید" maxlength="11">
                    </div>
                    <div class="col">
                        <select name="help_type" id="helpType" class="form-control">
                            <option value="0" selected disabled>--- رده همکاری ---</option>
                            @foreach($helperTypes as $helperType)
                                <option value="{{ $helperType->id }}" {{ ($helperType->id == $user->help_type)?'selected':'' }}>{{ $helperType->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col">
                        <select name="working_day" id="workingDay" class="form-control">
                            <option value="0" selected disabled>--- روز حضور ---</option>
                            @foreach($weekDays as $day)
                                <option value="{{ $day->id }}" {{ ($day->id == $user->working_day)?'selected':'' }}>{{ $day->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-1 text-center">
                        <label for="watchTime" class="text-dark">ساعت شیفت:</label>
                    </div>
                    <div class="col">
                        <input type="time" name="watch_time" id="watchTime" value="{{ $user->watch_time }}" class="form-control text-left" placeholder="ساعت کشیک">
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
