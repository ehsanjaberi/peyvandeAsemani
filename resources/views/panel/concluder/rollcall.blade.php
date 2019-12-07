@extends('layouts.app')
@section('title','ثبت ورود و خروج عاقدان')
@section('mainContent')
    <div class="card">
        <div class="card-header">
            <h4 class="text-secondary">ورود و خروج عاقدان</h4>
        </div>
        <div class="card-body">
            <table class="table table-hover text-center">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">نام</th>
                    <th scope="col">عملیات</th>
                </tr>
                </thead>
                <tbody class="cellColorBlack">
                @if(count($concluders) > 0)
                    @foreach($concluders as $concluder)
                        <tr>
                            <td>{{ $concluder->first_name . ' ' . $concluder->last_name }}</td>
                            <td>
                                @if($concluder->isReady == true)
                                    <a href="{{ route('absent-concluder',$concluder->national_code) }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-check"></span>&nbsp;ثبت خروج</a>
                                @else
                                    <a href="{{ route('present-concluder',$concluder->national_code) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-check"></span>&nbsp;ثبت ورود</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            @if(count($concluders) < 1)
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
