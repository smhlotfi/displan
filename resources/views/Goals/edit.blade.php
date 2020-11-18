@extends('layouts.master')

@section('content')

    <?php
        /**
         * @var \App\Models\Goal $goal
         */
    ?>
    <br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="/goal/edit" method="post">
                @csrf
                <div class="form-group">
                    <label for="description">برنامه</label>
                    <textarea type="text" id="description" name="description" rows="6" class="form-control">
                        {{$goal->getAttribute('description')}}
                    </textarea>
                </div>

                <br>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="priority">اولویت</label>
                        <input type="number" id="priority" name="priority" value="{{$goal->getAttribute('priority')}}"
                               class="form-control">
                    </div>

                    <div class="form-group col-md-5">
                        <label for="date">تاریخ</label>
                        <input type="date" id="date" name="date" value="{{$goal->getAttribute('date')}}" class="form-control">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="time">زمان</label>
                        <input type="time" id="time" name="time" value="{{$goal->getAttribute('time')}}" class="form-control">
                        <input type="hidden" name="goalId" value="{{$goal->getAttribute('id')}}">
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
