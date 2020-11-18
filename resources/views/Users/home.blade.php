@extends('layouts.master')
@section('content')
    <?php
    /**
     * @var array $tasks
     * @var \App\Models\Task $task
     * @var string $period_mode
     */
    ?>
    <br>
    <div class="row">

        <div class="col-md-1 col-sm-2"></div>

        <div class="btn-group col-md-2 col-sm-3">
            <form action="/user/{{$userId}}" method="get">
                <input type="submit" name="period_mode" value="روز" class="btn btn-outline-success">
                <input type="submit" name="period_mode" value="هفته" class="btn btn-outline-success">
                <input type="submit" name="period_mode" value="ماه" class="btn btn-outline-success">
            </form>
        </div>




        <div class="col-md-1 col-sm-6 ">
            <a href="/task/create/{{$userId}}"><button class="btn btn-success">کار جدید</button></a>
        </div>

        <div class="col-md-1 col-sm-1 ">
            <a href="/goal/create/{{$userId}}"><button class="btn btn-primary ">هدف جدید</button></a>
        </div>

        <div class="col-md-7 "></div>

    </div>

    <br><br>


    @if($period_mode == "روز")
        @include('Users.TasksPeriod.day')
    @elseif($period_mode == "هفته")
        @include('Users.TasksPeriod.week')
    @elseif($period_mode == "ماه")
        @include('Users.TasksPeriod.month')
    @else
        @include('Users.TasksPeriod.year')
    @endif




@endsection


