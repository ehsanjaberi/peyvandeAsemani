@extends('layouts.app')
@section('title','عاقدان')
@section('mainContent')
    <div class="card">
        <div class="card-header">
            <h4 class="text-secondary">عاقدان</h4>
        </div>
        <div class="card-body">
            <a href="{{ route('add-concluder') }}" class="btn btn-block btn-success mb-3">افزودن عاقد</a>
            <table class="table table-hover text-center">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">کد ملی</th>
                    <th scope="col">نام</th>
                    <th scope="col">تلفن همراه</th>
                    <th scope="col">روز حضور</th>
                    <th scope="col">عملیات</th>
                </tr>
                </thead>
                <tbody class="cellColorBlack">
                @if(count($concluders) > 0)
                    @foreach($concluders as $concluder)
                        <tr>
                            <td>{{ $concluder->national_code }}</td>
                            <td>{{ $concluder->first_name . ' ' . $concluder->last_name }}</td>
                            <td>{{ $concluder->mobile }}</td>
                            <td>{{ $concluder->working_day }}</td>
                            <td>
                                <a href="{{ route('delete-concluder',$concluder->national_code) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                                <a href="{{ route('edit-concluder',$concluder->national_code) }}" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-refresh"></span></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            @if(count($concluders) <= 0)
                <p class="alert alert-danger text-center">رکوردی جهت نمایش وجود ندارد.</p>
            @endif
        </div>
        <!-- Paginator -->
        @if(count($concluders) > 0)
            <div class="card-footer">
                <div class="row no-gutters customPaginator">
                    <div class="col text-right">
                        <a href="#"><span class="glyphicon glyphicon-forward"></span>&nbsp;قبلی</a>
                    </div>
                    <div class="col text-left">
                        <a href="#">بعدی&nbsp;<span class="glyphicon glyphicon-backward"></span></a>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
