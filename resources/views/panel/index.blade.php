@extends('layouts.app')
@section('title', 'پنل کاربری')
@section('mainContent')
    <!-- Imams advices -->
    <p class="alert alert-success text-center">امام صادق(ع): هرکس که نماز را سبک شمارد به شفاعت ما نخواهد رسید.</p>
    <!-- Easy to access cards -->
    <div class="row no-gutters text-center">
        <div class="col-xl-3 col-lg-6">
            <div class="card weddingCardBackground m-1 makeHeightFix75">
                <div class="card-body">
                    <a href="#" class="text-dark card-title customizCardTitle">ثبت عقد جدید</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card helpersCardBackground m-1 makeHeightFix75">
                <div class="card-body">
                    <a href="#" class="text-white card-title customizCardTitle">ثبت ورود و خروج خدام حضرت</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card weddingCardBackground m-1 makeHeightFix75">
                <div class="card-body">
                    <a href="#" class="text-dark card-title customizCardTitle">گزارش عقد های امروز</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card helpersCardBackground m-1 makeHeightFix75">
                <div class="card-body">
                    <a href="#" class="text-white card-title customizCardTitle">ثبت ورود و خروج خدام حضرت</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Sticky notes and total report -->
    <div class="row no-gutters mt-2 mt-xl-2">
        <div class="col-12 col-md-6 col-xl-2 notepadColumn">
            <div class="notepad" role="note">
                <h5 class="text-dark">یادآوری</h5>
                <button type="button" class="resetButton closeButton" onclick="closeNotes()">X</button>
                <hr />
                <p class="text-dark text-justify overflow-hidden"></p>
                <textarea name="notes" id="notes" rows="6" class="notesEnterance"></textarea>
                <div class="notepadFooter text-left">
                    <small class="text-muted float-right">1398/08/17</small>
                    <button type="button" class="resetButton deleteNoteButton"><span class="glyphicon glyphicon-trash"></span></button>
                </div>
            </div>
        </div>
        <div class="col mx-1 mt-2 mt-lg-0 reportColumn">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center text-info">گزارش کلی</h5>
                </div>
                <div class="card-body text-dark">
                    <label for="">تعداد کل وقت های رزرو شده:&nbsp;</label>
                    <span class="badge badge-info">56</span>
                    <br />
                    <label for="">تعداد عقدهای صورت گرفته:&nbsp;</label>
                    <span class="badge badge-success">56</span>
                    <br />
                    <label for="">وقت های منقضی شده:&nbsp;</label>
                    <span class="badge badge-secondary">56</span>
                    <br />
                    <label for="">افراد در صف :&nbsp;</label>
                    <span class="badge badge-warning">56</span>
                    <br />
                    <label for="">عملکرد من :</label>
                    <div class="progress">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
