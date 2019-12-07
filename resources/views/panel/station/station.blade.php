@extends('layouts.app')
@section('title','جایگاه ها')
@section('mainContent')
    <div class="card">
        <div class="card-header">
            <h4 class="text-secondary">جایگاه ها</h4>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-block btn-success mb-3" data-toggle="modal" data-target="#stations">افزودن جایگاه</button>
            <table class="table table-hover text-center">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">شماره جایگاه</th>
                    <th scope="col">نام جایگاه</th>
                    <th scope="col">عملیات</th>
                </tr>
                </thead>
                <tbody class="cellColorBlack">
                @if(count($stations) > 0)
                    @foreach($stations as $station)
                        <tr>
                            <td>{{ $station->id }}</td>
                            <td>{{ $station->station_name }}</td>
                            <td>
                                <a href="{{ route('delete-station',$station->id) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                                <button type="button" class="btn btn-warning btn-sm" onclick="fetchData('{{ route('fetch-station', $station->id) }}')"><span class="glyphicon glyphicon-refresh"></span></button>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            @if(count($stations) <= 0)
                <p class="alert alert-danger text-center">رکوردی جهت نمایش وجود ندارد.</p>
            @endif
        </div>
        <!-- Paginator -->
        @if(count($stations) > 0)
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
@section('modals')
    <div class="modal fade" id="stations" tabindex="-1" role="dialog" aria-labelledby="stationsLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="stationsLabel">افزودن جایگاه جدید</h5>
                    <button type="button" class="close mr-auto ml-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-right">
                    <form id="stationForm" method="post" action="{{ route('insert-station') }}">
                        @csrf
                        <div class="form-group">
                            <label for="stationName" class="col-form-label text-dark">نام جایگاه:</label>
                            <input type="text" class="form-control" id="stationName" name="station_name" class="form-control" placeholder="نام جایگاه" maxlength="15" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">ذخیره</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/stations/station.js') }}"></script>
@endsection
