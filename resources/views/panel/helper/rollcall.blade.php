@extends('layouts.app')
@section('title','ثبت ورود و خروج خادم یاران')
@section('mainContent')
    <div class="card">
        <div class="card-header">
            <h4 class="text-secondary">ورود و خروج خادم یاران</h4>
        </div>
        <div class="card-body">
            <table class="table table-hover text-center">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">نام</th>
                    <th scope="col">سمت</th>
                    <th scope="col">عملیات</th>
                </tr>
                </thead>
                <tbody class="cellColorBlack">
                @if(count($helpers) > 0)
                    @foreach($helpers as $helper)

                        <tr>
                            <td>{{ $helper->first_name . ' ' . $helper->last_name }}</td>
                            <td>{{ $helper->help_type }}</td>
                            <td>
                                @if($helper->isReady == true)
                                    <a href="{{ route('absent-helper',$helper->national_code) }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-check"></span>&nbsp;ثبت خروج</a>
                                @else
                                    <a href="{{ route('present-helper',$helper->national_code) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-check"></span>&nbsp;ثبت ورود</a>
                                @endif
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
