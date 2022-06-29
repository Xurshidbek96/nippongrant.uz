@extends('admin.layouts.layout')

@section('infos')
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
                        <a class="create__btn" href="{{route('infos.index')}}"> <i class='bx bx-arrow-back'></i>Qaytish</a>
                        
                    </div>

                    <form class="create__inputs" action="{{route('infos.update', $info[0]->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <strong> Savol : </strong>
                        <input type="text" name="question" value="{{$info[0]->question}}" class="form-control"> <br>

                        <strong> Javob : </strong>
                        <input type="text" name="answer" value="{{$info[0]->answer}}" class="form-control"> <br>

                         
                        <input type="submit" value="O'zgartirish">

                    </form>
                </div>
                
            </div>
        </main>
        <!-- MAIN -->
@endsection
