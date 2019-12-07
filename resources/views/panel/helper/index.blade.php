@extends('layouts.app')
@section('title','خادم یاران')
@section('mainContent')
    <div class="card">
        <div class="card-header">
            <h4 class="text-secondary">خادم یاران</h4>
        </div>
        <div class="card-body">
            <a href="{{ route('add-helper') }}" class="btn btn-block btn-success mb-3">افزودن خادم یار</a>
            <table class="table table-hover text-center">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">کد ملی</th>
                    <th scope="col">نام</th>
                    <th scope="col">تلفن همراه</th>
                    <th scope="col">سمت</th>
                    <th scope="col">شیفت</th>
                    <th scope="col">عملیات</th>
                </tr>
                </thead>
                <tbody class="cellColorBlack">
                @if(count($helpers) > 0)
                    @foreach($helpers as $helper)
                        <tr>
                            <td>{{ $helper->national_code }}</td>
                            <td>{{ $helper->first_name . ' ' . $helper->last_name }}</td>
                            <td>{{ $helper->mobile }}</td>
                            <td>{{ $helper->help_type }}</td>
                            <td>{{ $helper->working_day . ' ساعت ' . $helper->watch_time }}</td>
                            <td>
                                <a href="{{ route('delete-helper',$helper->national_code) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                                <a href="{{ route('edit-helper',$helper->national_code) }}" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-refresh"></span></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            @if(count($helpers) <= 0)
                <p class="alert alert-danger text-center">رکوردی جهت نمایش وجود ندارد.</p>
            @endif
        </div>
        <!-- Paginator -->
        @if(count($helpers) > 0)
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
