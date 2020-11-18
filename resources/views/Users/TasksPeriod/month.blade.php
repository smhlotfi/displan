<?php
/**
 * @var \App\Models\Task[][] $tasks
 */
require_once ('../external_resources/PersianCalendar.php');
$monthFirstDay = mds_date('Y/m/01');
$todayNumber = mds_date('w'); // 0: sunday , 1: monday , ...
$monthDaysCount = mds_date('t');
$dayCountInMonth = 0;
$month = mds_date('m');
$year  = mds_date('Y');

$monthFirstDayTime = strtotime($monthFirstDay);

$firstDayOfMonthNum = date('w', $monthFirstDayTime);

$task = \App\Models\Task::where('description' , '=' , 'first')->first();



?>


<div class="row">
    <div class="col-md-2"></div>

    <div class="col-md-2 text-center">
        <button><i class="fas fa-arrow-right"></i></button>
    </div>

    <div class="col-md-4"></div>

    <div class="col-md-2 text-center">
        <button><i class="fas fa-arrow-left"></i></button>
    </div>
    <div class="col-md-2"></div>


</div>

<br>


<div class="row">
    <div class="col-md-1"></div>
    <table class="table col-md-10 table-striped table-bordered fixed">

        <thead class="text-center">
            <tr>
                <th>شنبه     </th>
                <th>یک شنبه  </th>
                <th>دو شنبه  </th>
                <th>سه شنبه  </th>
                <th>چهار شنبه</th>
                <th>پنج شنبه </th>
                <th>جمعه     </th>
            </tr>
        </thead>
        <tbody>
            <?php $dayNumber = 0;
                $description = "";
            ?>
            @for($i = 0 ; $i < 5 ; $i++) {{--iterate on calendar rows--}}
                <?php
                    $dayNumberInWeek = mds_date('w' , strtotime('-'.(mds_date('d') - 1 - $dayNumber).' day'));
                ?>


                    @if($dayNumberInWeek == 6) {{--it's saturday--}}
                        <tr class="high-row-height">
                            <td>
                                <span class="text-top-right">{{$dayNumber+ 1}}</span>
                                @foreach($tasks[$dayNumber] as $task)
                                    <div class="border low-height text-top-right text-center
                                            @switch($task->getAttribute('priority'))
                                    @case(1) bg-success-pale @break
                                    @case(2) bg-primary-pale @break
                                    @case(3) bg-danger-pale @break
                                    @endswitch
                                        ">
                                        <?php
                                        $description = substr($task->getAttribute('description') , 0 , 20);
                                        if (strlen($task->getAttribute('description')) > 20){
                                            $description = $description." ...";
                                        }

                                        ?>
                                        <div class="row text-center low-height">
                                            <label class="text-center col-12" @if($task->getAttribute('isDone')) id="task-done" @endif>
                                                {{$description}}
                                            </label>
                                        </div>
                                        <div class="row text-top-right justify-content-center">
                                            <a href="/task/done/{{$task->getAttribute('id')}}">
                                                <button class="fas fa-check btn btn-success btn-sm float-left">
                                                </button>
                                            </a>
                                            <a href="/task/edit/{{$task->getAttribute('id')}}">
                                                <button type="submit" name="id" value="{{$task->getAttribute('id')}}"
                                                        class="fas fa-edit btn btn-primary btn-sm float-left">
                                                </button>
                                            </a>
                                            <form action="/task/delete" method="post" class="d-inline">
                                                @csrf
                                                <button type="submit" name="id" value="{{$task->getAttribute('id')}}"
                                                        class="fas fa-trash btn btn-danger btn-sm float-left">

                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                    <br><br><br>
                                @endforeach
                            </td>

                            <?php
                                $dayNumber++;
                                $dayNumberInWeek = mds_date('w' , strtotime('-'.(mds_date('d') - 1 - $dayNumber).' day'));
                            ?>

                            @while( $dayNumberInWeek < 6)
                            <td>
                                <span class="text-top-right">{{$dayNumber + 1}}</span>
                                @foreach($tasks[$dayNumber] as $task)
                                <div class="border low-height text-top-right text-center
                                    @switch($task->getAttribute('priority'))
                                        @case(1) bg-success-pale @break
                                        @case(2) bg-primary-pale @break
                                        @case(3) bg-danger-pale @break
                                        @endswitch
                                    ">
                                    <?php
                                        $description = substr($task->getAttribute('description') , 0 , 19);
                                        if (strlen($task->getAttribute('description')) > 19){
                                            $description = $description." ...";
                                        }

                                    ?>
                                        <div class="row text-center low-height">
                                            <label class="text-center col-12" @if($task->getAttribute('isDone')) id="task-done" @endif>
                                                {{$description}}
                                            </label>
                                        </div>
                                        <div class="row text-top-right justify-content-center">
                                            <a href="/task/done/{{$task->getAttribute('id')}}">
                                                <button class="fas fa-check btn btn-success btn-sm float-left">
                                                </button>
                                            </a>
                                            <a href="/task/edit/{{$task->getAttribute('id')}}">
                                                <button type="submit" name="id" value="{{$task->getAttribute('id')}}"
                                                        class="fas fa-edit btn btn-primary btn-sm float-left">
                                                </button>
                                            </a>
                                            <form action="/task/delete" method="post" class="d-inline">
                                                @csrf
                                                <button type="submit" name="id" value="{{$task->getAttribute('id')}}"
                                                        class="fas fa-trash btn btn-danger btn-sm float-left">

                                                </button>
                                            </form>
                                        </div>

                                </div>
                                <br><br><br>

                                @endforeach
                            </td>
                            <?php
                                $dayNumber++;
                                $dayNumberInWeek = mds_date('w' , strtotime('-'.(mds_date('d') - 1 - $dayNumber).' day'));
                            ?>

                            @endwhile

                        </tr>

                    @else
                        <tr class="high-row-height">
                            @for($j = -1; $j < $dayNumberInWeek ; $j++)
                                <td></td>
                            @endfor

                            @while( $dayNumberInWeek < 6)
                                <td>
                                    <span class="text-top-right">{{$dayNumber + 1}}</span>
                                    @foreach($tasks[$dayNumber] as $task)
                                        <div class="border low-height text-top-right text-center
                                            @switch($task->getAttribute('priority'))
                                        @case(1) bg-success-pale @break
                                        @case(2) bg-primary-pale @break
                                        @case(3) bg-danger-pale @break
                                        @endswitch
                                            ">
                                            <?php
                                            $description = substr($task->getAttribute('description') , 0 , 20);
                                            if (strlen($task->getAttribute('description')) > 20){
                                                $description = $description." ...";
                                            }
                                            ?>
                                            <div class="row text-center low-height">
                                                <label class="text-center col-12" @if($task->getAttribute('isDone')) id="task-done" @endif>
                                                    {{$description}}
                                                </label>
                                            </div>
                                            <div class="row text-top-right justify-content-center">
                                                <a href="/task/done/{{$task->getAttribute('id')}}">
                                                    <button class="fas fa-check btn btn-success btn-sm float-left">
                                                    </button>
                                                </a>
                                                <a href="/task/edit/{{$task->getAttribute('id')}}">
                                                    <button type="submit" name="id" value="{{$task->getAttribute('id')}}"
                                                            class="fas fa-edit btn btn-primary btn-sm float-left">
                                                    </button>
                                                </a>
                                                <form action="/task/delete" method="post" class="d-inline">
                                                    @csrf
                                                    <button type="submit" name="id" value="{{$task->getAttribute('id')}}"
                                                            class="fas fa-trash btn btn-danger btn-sm float-left">

                                                    </button>
                                                </form>
                                            </div>

                                        </div>
                                        <br><br><br>
                                    @endforeach
                                </td>
                                <?php
                                    $dayNumber++;
                                    $dayNumberInWeek = mds_date('w' , strtotime('-'.(mds_date('d') - 1 - $dayNumber).' day'));
                                ?>

                            @endwhile
                        </tr>
                    @endif

            @endfor
        </tbody>
    </table>
    <div class="col-md-1"></div>
</div>


                                        {{--<div class="row">--}}
{{--    <div class="col-md-1"></div>--}}
{{--    <table class="col-md-10 table table-bordered table-striped">--}}
{{--        <thead class="text-center">--}}
{{--        <tr>--}}
{{--            <th>شنبه     </th>--}}
{{--            <th>یک شنبه  </th>--}}
{{--            <th>دو شنبه  </th>--}}
{{--            <th>سه شنبه  </th>--}}
{{--            <th>چهار شنبه</th>--}}
{{--            <th>پنج شنبه </th>--}}
{{--            <th>جمعه     </th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody class="text-right">--}}

{{--        <tr class="high-row-height">--}}
{{--            @for($i = 0 ; $i <= $firstDayOfMonthNum ; $i++)--}}
{{--                <td></td>--}}
{{--            @endfor--}}
{{--            @if($firstDayOfMonthNum == 6)--}}
{{--                @for( ; $dayCountInMonth <= 7 ; $dayCountInMonth++)--}}
{{--                    <td ><span class="text-top-right">{{mds_date($dayCountInMonth + 1)}}</span></td>--}}
{{--                @endfor--}}

{{--            @else--}}
{{--                @for( ; mds_date('w' , strtotime($monthFirstDay.'+'.$dayCountInMonth.' day')) != 6 ; $dayCountInMonth++)--}}
{{--                    <td ><span class="text-top-right">{{mds_date($dayCountInMonth + 1)}}</span>--}}
{{--                        @foreach($tasks[$dayCountInMonth] as $task)--}}
{{--                            <label>{{$task->getAttribute('description')}}</label>--}}
{{--                        @endforeach--}}

{{--                    </td>--}}
{{--                @endfor--}}
{{--            @endif--}}
{{--        </tr>--}}

{{--        <tr class="high-row-height">--}}
{{--            <td ><span class="text-top-right">{{mds_date($dayCountInMonth + 1)}}</span>--}}
{{--                @foreach($tasks[$dayCountInMonth] as $task)--}}
{{--                    <label>{{$task->getAttribute('description')}}</label>--}}
{{--                @endforeach--}}
{{--            </td>--}}
{{--            <?php $dayCountInMonth++?>--}}
{{--            @for( ; mds_date('w' , strtotime($monthFirstDay.'+'.$dayCountInMonth.' day')) != 6 ; $dayCountInMonth++)--}}
{{--                <td><span class="text-top-right">{{mds_date($dayCountInMonth + 1)}}</span>--}}
{{--                    @foreach($tasks[$dayCountInMonth] as $task)--}}
{{--                        <label>{{$task->getAttribute('description')}}</label>--}}
{{--                    @endforeach--}}
{{--                </td>--}}
{{--            @endfor--}}
{{--        </tr>--}}

{{--        <tr class="high-row-height">--}}
{{--            <td><span class="text-top-right">{{mds_date($dayCountInMonth + 1)}}</span>--}}
{{--                @foreach($tasks[$dayCountInMonth] as $task)--}}
{{--                    <label>{{$task->getAttribute('description')}}</label>--}}
{{--                @endforeach--}}
{{--            </td>--}}
{{--            <?php $dayCountInMonth++?>--}}
{{--            @for( ; mds_date('w' , strtotime($monthFirstDay.'+'.$dayCountInMonth.' day')) != 6 ; $dayCountInMonth++)--}}
{{--                <td><span class="text-top-right">{{mds_date($dayCountInMonth + 1)}}</span>--}}
{{--                    @foreach($tasks[$dayCountInMonth] as $task)--}}
{{--                        <label>{{$task->getAttribute('description')}}</label>--}}
{{--                    @endforeach--}}
{{--                </td>--}}
{{--            @endfor--}}
{{--        </tr>--}}

{{--        <tr class="high-row-height">--}}
{{--            <td><span class="text-top-right">{{mds_date($dayCountInMonth + 1)}}</span>--}}
{{--                @foreach($tasks[$dayCountInMonth] as $task)--}}
{{--                    <label>{{$task->getAttribute('description')}}</label>--}}
{{--                @endforeach--}}
{{--            </td>--}}
{{--            <?php $dayCountInMonth++?>--}}
{{--            @for( ; mds_date('w' , strtotime($monthFirstDay.'+'.$dayCountInMonth.' day')) != 6 ; $dayCountInMonth++)--}}
{{--                <td><span class="text-top-right">{{mds_date($dayCountInMonth + 1)}}</span>--}}
{{--                    @foreach($tasks[$dayCountInMonth] as $task)--}}
{{--                        <label>{{$task->getAttribute('description')}}</label>--}}
{{--                    @endforeach--}}
{{--                </td>--}}
{{--            @endfor--}}
{{--        </tr>--}}

{{--        <tr class="high-row-height">--}}
{{--            <td><span class="text-top-right">{{mds_date($dayCountInMonth + 1)}}</span>--}}
{{--                @foreach($tasks[$dayCountInMonth] as $task)--}}
{{--                    <label>{{$task->getAttribute('description')}}</label>--}}
{{--                @endforeach--}}
{{--            </td>--}}
{{--            <?php $dayCountInMonth++?>--}}
{{--            @for( ; mds_date('w' , strtotime($monthFirstDay.'+'.$dayCountInMonth.' day')) != 6 ; $dayCountInMonth++)--}}
{{--                <td class="">--}}
{{--                    <span class="text-top-right">{{mds_date($dayCountInMonth + 1)}}</span>--}}
{{--                    @foreach($tasks[$dayCountInMonth] as $task)--}}

{{--                        <div class="border low-height text-top-right text-center--}}
{{--                            @switch($task->getAttribute('priority'))--}}
{{--                                @case(1) bg-success @break--}}
{{--                                @case(2) bg-primary @break--}}
{{--                                @case(3) bg-danger @break--}}
{{--                            @endswitch--}}
{{--                            ">--}}
{{--                            <a><label class="text-center">{{$task->getAttribute('description')}}</label></a>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </td>--}}
{{--            @endfor--}}
{{--        </tr>--}}
{{--        </tbody>--}}
{{--    </table>--}}
{{--    <div class="col-md-1"></div>--}}


{{--</div>--}}

<script>
    function nextPage($month , $year) {
        var month = "<?php $month ?>";
        var year = "<?php $year?>";

        return month;
    }
</script>






