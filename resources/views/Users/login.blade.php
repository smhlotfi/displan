@extends('layouts.master')

@section('content')
    <br>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 jumbotron">
            <div class="">
                <h1 class="text-center text-success">ورود</h1>
            </div>
            <br>
            <form action="/user/login" method="post">
                @csrf

                <div class="form-group">
                    <label for="email">ایمیل</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">رمز عبور</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>


                <br>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <input type="submit" name="login" value="ورود" class="form-control btn btn-success">
                    </div>

                </div>



            </form>

            <div class="row">
                <div class="col-md-12">
                    <a href="/user/create"><button class="btn btn-outline-primary">ثبت نام</button></a>
                </div>
            </div>

        </div>
        <div class="col-md-4"></div>
    </div>
@endsection
