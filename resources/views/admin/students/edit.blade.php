@extends('admin.layouts.layout')

@section('students')
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
                        <a class="create__btn" href="{{route('students.index')}}"> <i class='bx bx-arrow-back'></i>Qaytish</a>
                        
                    </div>

                    <form class="create__inputs" action="{{route('students.update', $student[0]->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <strong> F.I.SH : </strong>
                        <input type="text" name="name" value="{{$student[0]->name}}" class="form-control"> <br>

                        <strong> Universiteti : </strong>
                        <input type="text" name="edu" value="{{$student[0]->edu}}" class="form-control"> <br>

                         <strong> Rasm : </strong> <br>
                         <img src="{{URL::to($student[0]->img)}}" width="100px">
                        <input type="file" name="img" value="{{$student[0]->img}}">
                        

                        <input type="submit" value="O'zgartirish">

                    </form>
                </div>
                
            </div>
        </main>
        <!-- MAIN -->
@endsection
