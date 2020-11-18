@extends('layouts.master')

@section('content')
    <br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="/goal/create" method="post">
                @csrf
                <div class="form-group">
                    <label for="description">هدف</label>
                    <textarea type="text" id="description" name="description" rows="6" class="form-control"></textarea>
                </div>

                <br>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="priority">اولویت</label>
                        <input type="number" id="priority" name="priority" class="form-control">
                    </div>

                    <div class="form-group col-md-5">
                        <label for="date">تاریخ</label>
                        <input type="date" id="date" name="date" class="form-control">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="time">زمان</label>
                        <input type="time" id="time" name="time" class="form-control">
                        <input type="hidden" name="userId" value="{{$userId}}">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="form-group col-md-12">
                        <input type="submit" name="create" value="ثبت" class="form-control btn btn-success">
                    </div>
                </div>

            </form>
        </div>

        <div class="col-md-4"></div>
    </div>

    <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-3"></div>
    </div>

@endsection
