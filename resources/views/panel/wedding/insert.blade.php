@extends('layouts.app')
@section('title','ثبت عقد جدید')
@section('mainContent')
    <div class="card">
        <div class="card-header">
            <h4 class="text-secondary">ثبت اطلاعات</h4>
        </div>
        <div class="card-body">
            <form id="weddingForm" method="POST" action="{{ route('insert-wedding') }}">
                <fieldset class="weddingsFieldset">
                    <legend>اطلاعات زوج</legend>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" name="husband_first_name" id="husbandFirstName" placeholder="نام زوج را وارد کنید" class="form-control" required maxlength="20" autofocus>
                        </div>
                        <div class="col">
                            <input type="text" name="husband_last_name" id="husbandLastName" placeholder="نام خانوادگی زوج را وارد کنید" class="form-control" required maxlength="20">
                        </div>
                        <div class="col">
                            <input type="text" name="husband_national_code" id="husbandNationalCode" placeholder="کدملی زوج را وارد کنید" class="form-control" required maxlength="10">
                        </div>
                        <div class="w-100 my-1"></div>
                        <div class="col">
                            <select name="husband_study_id" id="husbandStudyId" class="form-control">
                                <option value="0" selected disabled>--- تحصیلات ---</option>
                                @foreach($studies as $study)
                                    <option value="{{ $study->id }}">{{ $study->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select name="husband_state_id" id="husbandStateId" class="form-control">
                                <option value="0" selected disabled>--- استان محل سکونت ---</option>
                                @foreach($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select name="husband_city_id" id="husbandCityId" class="form-control">
                                <option value="0" selected disabled>--- شهر محل سکونت ---</option>
                            </select>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="weddingsFieldset mt-3">
                    <legend>اطلاعات زوجه و پدر زوجه</legend>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" name="wifeFirstName" id="wifeFirstName" placeholder="نام زوجه را وارد کنید" class="form-control" required maxlength="20">
                        </div>
                        <div class="col">
                            <input type="text" name="wifeLastName" id="wifeLastName" placeholder="نام خانوادگی زوجه را وارد کنید" class="form-control" required maxlength="20">
                        </div>
                        <div class="col">
                            <input type="text" name="wifeNC" id="wifeNC" placeholder="کدملی زوجه را وارد کنید" class="form-control" required maxlength="10">
                        </div>
                        <div class="w-100 my-1"></div>
                        <div class="col">
                            <input type="text" name="wifeFatherFirstName" id="wifeFatherFirstName" placeholder="نام پدر زوجه را وارد کنید" class="form-control" required maxlength="20">
                        </div>
                        <div class="col">
                            <input type="text" name="wifeFatherLastName" id="wifeFatherLastName" placeholder="نام خانوادگی پدر زوجه را وارد کنید" class="form-control" required maxlength="20">
                        </div>
                        <div class="col">
                            <input type="text" name="wifeFatherNC" id="wifeFatherNC" placeholder="کدملی پدر زوجه را وارد کنید" class="form-control" required maxlength="10">
                        </div>
                        <div class="w-100 my-1"></div>
                        <div class="col">
                            <select name="wife_study_id" id="wifeStudyId" class="form-control">
                                <option value="0" selected disabled>--- تحصیلات ---</option>
                                @foreach($studies as $study)
                                    <option value="{{ $study->id }}">{{ $study->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select name="wife_state_id" id="wifeStateId" class="form-control">
                                <option value="0" selected disabled>--- استان محل سکونت ---</option>
                                @foreach($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select name="wife_city_id" id="wifeCityId" class="form-control">
                                <option value="0" selected disabled>--- شهر محل سکونت ---</option>
                            </select>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="weddingsFieldset mt-3">
                    <legend>اطلاعات تکمیلی</legend>
                    <div class="form-row">
                        <div class="col">
                            <label for="weddingDate">تاریخ عقد</label>
                            <input type="text" name="wedding_date" id="weddingDate" readonly class="form-control" required maxlength="10" value="{{ $date }}">
                        </div>
                        <div class="col">
                            <label for="weddingTime">ساعت عقد</label>
                            <input type="text" name="wedding_time" id="weddingTime" readonly class="form-control" required maxlength="8" value="{{ $time }}">
                        </div>
                        <div class="col">
                            <label for="concluderNationalCode">نام عاقد</label>
                            <select name="conculder_national_code" id="concluderNationalCode" class="form-control">
                                <option value="0" selected disabled>--- عاقد ---</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="stationId">جایگاه</label>
                            <select name="station_id" id="stationId" class="form-control">
                                <option value="0" selected disabled>--- جایگاه ---</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="mahriyeh">مهریه</label>
                            <input type="text" class="form-control" name="mahriyeh" id="mahriyeh" placeholder="میزان مهریه">
                        </div>
                        <div class="w-100 my-1"></div>
                        <div class="col">
                            <label for="comments">توضیحات</label>
                            <textarea name="comments" id="comments" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                </fieldset>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">ثبت</button>
                    <button type="reset" class="btn btn-danger">مجدد</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/wedding/wedding.js') }}"></script>
@endsection
