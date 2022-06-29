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
                        <h3>Yangi natija qo'shish</h3>
                        <a class="create__btn" href="{{route('results.index')}}"> <i class='bx bx-arrow-back'></i>Qaytish</a>
                        
                    </div>

                    <form class="create__inputs" action="{{route('results.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <strong> Task 1 : </strong>
                        <input type="number" step=any name="task1" required class="form-control"> <br>

                        <strong> Task 2 : </strong>
                        <input type="number" step=any name="task2" required class="form-control"> <br>

                        <strong> Task 3 : </strong>
                        <input type="number" step=any name="task3" required class="form-control"> <br>

                         <strong>Rasmi</strong>
                        <input type="file" name="img" class="form-control">

                        <input type="submit" value="Qo`shish">

                    </form>
                </div>
                
            </div>
        </main>
        <!-- MAIN -->

@endsection
