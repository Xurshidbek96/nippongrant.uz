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
                        <h3>Yangi Talaba qo'shish</h3>
                        <a class="create__btn" href="{{route('students.index')}}"> <i class='bx bx-arrow-back'></i>Qaytish</a>
                        
                    </div>

                    <form class="create__inputs" action="{{route('students.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <strong> F.I.SH  :</strong>
                        <input type="text" name="name" class="form-control"> <br>

                        <strong> Universiteti  :</strong>
                        <input type="text" name="edu" class="form-control"> <br>

                         <strong>Rasmi</strong>
                        <input type="file" name="img" class="form-control">

                        <input type="submit" value="Qo`shish">

                    </form>
                </div>
                
            </div>
        </main>
        <!-- MAIN -->

@endsection
