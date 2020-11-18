<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <table class="table table-striped">
            <thead>

            </thead>
            <tbody class="">
            @foreach($tasks as $task)
                <tr class="row" @if($task->getAttribute('isDone')) id="task-done" @endif>
                    <td class="col-md-3 text-center">
                        {{$task->getAttribute('description')}}
                    </td>
                    <td class="col-md-1 text-center">
                        {{$task->getAttribute('priority')}}
                    </td>
                    <td class="col-md-2 text-center">
                        {{$task->getAttribute('date')}}
                    </td>
                    <td class="col-md-2 text-center">
                        {{$task->getAttribute('time')}}
                    </td>
                    <td class=" text-center">
                        <a href="/task/done/{{$task->getAttribute('id')}}">
                            <button class="fas fa-check btn btn-success">
                            </button>
                        </a>
                    </td>
                    <td class="text-center">

                        <a href="/task/edit/{{$task->getAttribute('id')}}">
                            <button type="submit" name="id" value="{{$task->getAttribute('id')}}"
                                    class="fas fa-edit btn btn-primary">
                            </button>
                        </a>


                    </td>
                    <td class=" text-center">
                        <form action="/task/delete" method="post">
                            @csrf
                            <button type="submit" name="id" value="{{$task->getAttribute('id')}}"
                                    class="fas fa-trash btn btn-danger">

                            </button>
                        </form>

                    </td>

                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
    <div class="col-md-3"></div>

</div>

