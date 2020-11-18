<?php
/**
 * @var \App\Models\Task[][] $tasks
 */
require_once ('../external_resources/PersianCalendar.php');

?>
<div class="row">
    <div class="col-md-2"></div>

    <div class="col-md-2 bg-success" >
        <br>
        <div class="">
            <label class=""><?=mds_date('l')?>  (امروز) </label>
            <label class="float-left"><?=mds_date("Y/m/d", "now", 1)?></label>
        </div>

        <br>

        @foreach($tasks[0] as $task)
            @if($task->getAttribute('date') == mds_date('Y/m/d'))
                <label>{{$task->getAttribute('description')}}</label>
            @endif
        @endforeach
    </div>


    <div class="col-md-1"></div>

    <div class="col-md-2 bg-warning" >
        <br>
        <div>
            <label><?=mds_date('l', strtotime(' +1 day'))?></label>
            <label class="float-left"><?=mds_date("Y/m/d", strtotime(' +1 day') , 1)?></label>
        </div>

        <br>

        @foreach($tasks[1] as $task)
            @if($task->getAttribute('date') == mds_date('Y/m/d' , strtotime(' +1 day')))
                <label>{{$task->getAttribute('description')}}</label>
            @endif
        @endforeach
    </div>

    <div class="col-md-1"></div>

    <div class="col-md-2 bg-success" >
        <br>
        <div>
            <label><?=mds_date('l', strtotime(' +2 day'))?></label>
            <label class="float-left"><?=mds_date("Y/m/d", strtotime(' +2 day') , 1)?></label>
        </div>

        <br>

        @foreach($tasks[2] as $task)
            @if($task->getAttribute('date') == mds_date('Y/m/d', strtotime(' +2 day')))
                <label>{{$task->getAttribute('description')}}</label>
            @endif
        @endforeach
    </div>
    <div class="col-md-2"></div>
</div>

<br>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-2 bg-warning" >
        <br>
        <div class="">
            <label><?=mds_date('l', strtotime(' +3 day'))?></label>
            <label class="float-left"><?=mds_date("Y/m/d", strtotime(' +3 day') , 1)?></label>
        </div>

        <br>

        @foreach($tasks[3] as $task)
            @if($task->getAttribute('date') == mds_date('Y/m/d' , strtotime(' +3 day')))
                <label>{{$task->getAttribute('description')}}</label>
            @endif
        @endforeach
    </div>


    <div class="col-md-1"></div>

    <div class="col-md-2 bg-success" >
        <br>
        <div>
            <label><?=mds_date('l', strtotime(' +4 day'))?></label>
            <label class="float-left"><?=mds_date("Y/m/d", strtotime(' +4 day') , 1)?></label>
        </div>

        <br>

        @foreach($tasks[4] as $task)
            @if($task->getAttribute('date') == mds_date('Y/m/d' , strtotime(' +4 day')))
                <label>{{$task->getAttribute('description')}}</label>
            @endif
        @endforeach
    </div>

    <div class="col-md-1"></div>

    <div class="col-md-2 bg-warning" >
        <br>
        <div>
            <label><?=mds_date('l', strtotime(' +5 day'))?></label>
            <label class="float-left"><?=mds_date("Y/m/d", strtotime(' +5 day') , 1)?></label>
        </div>

        <br>

        @foreach($tasks[5] as $task)
            @if($task->getAttribute('date') == mds_date('Y/m/d' , strtotime(' +5 day')))
                <label>{{$task->getAttribute('description')}}</label>
            @endif
        @endforeach
    </div>
    <div class="col-md-2"></div>
</div>

<br>


<div class="row">
    <div class="col-md-5"></div>

    <div class="col-md-2 bg-warning" >
        <br>
        <div>
            <label><?=mds_date('l', strtotime(' +6 day'))?></label>
            <label class="float-left"><?=mds_date("Y/m/d", strtotime(' +6 day') , 1)?></label>
        </div>

        <br>

        @foreach($tasks[6] as $task)
            @if($task->getAttribute('date') == mds_date('Y/m/d' , strtotime(' +6 day')))
                <label>{{$task->getAttribute('description')}}</label>
            @endif
        @endforeach
    </div>

    <div class="col-md-5"></div>
</div>

<br>
