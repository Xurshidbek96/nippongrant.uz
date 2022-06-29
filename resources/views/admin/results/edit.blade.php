@extends('admin.layouts.layout')

@section('results')
    active
@endsection

@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <!-- MAIN -->
        <main>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>O'zgartirish</h3>
                        <a class="create__btn" href="{{route('results.index')}}"> <i class='bx bx-arrow-back'></i>Qaytish</a>
                        
                    </div>

                    <form class="create__inputs" action="{{route('results.update', $result[0]->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <strong> Task 1 : </strong>
                        <input type="number" step=any name="task1"  value="{{$result[0]->task1}}" class="form-control"> <br>

                        <strong> Task 2 : </strong>
                        <input type="number" step=any name="task2"  value="{{$result[0]->task2}}" class="form-control"> <br>

                        <strong> Task 3 : </strong>
                        <input type="number" step=any name="task3"  value="{{$result[0]->task3}}" class="form-control"> <br>

                         <strong>Rasm : </strong> <br>
                         <img src="{{URL::to($result[0]->img)}}" width="100px">
                        <input type="file" name="img" value="{{$result[0]->img}}">
                        

                        <input type="submit" value="O'zgartirish">

                    </form>
                </div>
                
            </div>
        </main>
        <!-- MAIN -->
@endsection
