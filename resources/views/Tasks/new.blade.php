@extends('layouts.master')

@section('content')



    <br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="/task/create" method="post" id="form">
                @csrf
                <div class="form-group">
                    <label for="description">برنامه</label>
                    <textarea type="text" id="description" name="description" rows="6" class="form-control"
                              placeholder="کار خودتون رو اینجا بنویسین !"></textarea>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-3 dropdown align-text-bottom form-group">
                        <label for="priorityInput">اولویت</label>
                        <input id="priorityInput" type="hidden" name="priority" value="2" class="form-control">

                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                معمولی

                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="btn dropdown-item btn-block" onclick="setPriority('مهم')">

                                مهم
                            </a>
                            <a class="btn dropdown-item btn-block" onclick="setPriority('معمولی')">
                                معمولی
                            </a>
                            <a class="btn dropdown-item btn-block" onclick="setPriority('کم')">
                                کم
                            </a>
                        </div>

                    </div>

                    <div class="form-group col-md-5">
                        <label for="date">تاریخ</label>
                        <input type="text" id="date" name="date" class="form-control text-center" >
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






    <script>
        $('#date').persianDatepicker({
            observer: true,
            format: 'YYYY/MM/DD'
        });
    </script>

    <script>
        function setPriority(newPriority) {
            var dropdownMenu = document.getElementById('dropdownMenuButton');
            dropdownMenu.innerText = newPriority;
            var priorityInput = document.getElementById('priorityInput');
            switch (newPriority) {
                case "مهم":
                    priorityInput.value = '3';
                    break;
                case "معمولی":
                    priorityInput.value = '2';
                    break;
                case "کم":
                    priorityInput.value = '1';
                    break;
                default :
                    priorityInput.value = '2';
            }
        }
    </script>


@endsection
