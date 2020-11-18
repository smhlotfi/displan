@extends('layouts.master')

@section('content')

    <?php
        /**
         * @var \App\Models\Task $task
         */
    ?>
    <?php
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $english = [ 0 ,  1 ,  2 ,  3 ,  4 ,  5 ,  6 ,  7 ,  8 ,  9 ];
    $taskDate = str_replace($english, $persian, $task->getAttribute('date'));
    ?>
    <br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="/task/edit" method="post">
                @csrf
                <div class="form-group">
                    <label for="description">برنامه</label>
                    <textarea type="text" id="description" name="description" rows="6" class="form-control">
                        {{$task->getAttribute('description')}}
                    </textarea>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-3 dropdown align-text-bottom form-group">
                        <label for="priorityInput">اولویت</label>
                        <input id="priorityInput" type="hidden" name="priority" value="2" class="form-control">

                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @switch($task->getAttribute('priority'))
                                @case(1)
                                {{"کم"}} @break
                                @case(2)
                                {{"معمولی"}} @break
                                @case(3)
                                {{"مهم"}} @break
                            @endswitch


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

                        <input type="text" id="date" name="date" value="{{$taskDate}}" class="form-control text-center">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="time">زمان</label>
                        <input type="time" id="time" name="time" value="{{$task->getAttribute('time')}}" class="form-control">
                        <input type="hidden" name="taskId" value="{{$task->getAttribute('id')}}">
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
            format: 'YYYY/MM/DD',
            initialValue: false
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
