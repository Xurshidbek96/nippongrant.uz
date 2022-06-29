@extends('admin.layouts.layout')

@section('numbers')
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
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Raqamlar</h3>    
                    </div>

                    @if ($c == 0)
                        <?
                        $n1 = "";
                        $n2 = "";
                        $n3 = "";
                        $n4 = "";
                        $name1 = "";
                        $name2 = "";
                        $name3 = "";
                        $name4 = "";
                        
                        ?>
                        <form class="create__inputs" action="{{route('numbers.store')}}" method="POST">
                        @csrf
                    @else
                        <form class="create__inputs" action="{{route('numbers.update', $number[0]->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <?
                        $n1 = $number[0]->n1;
                        $n2 = $number[0]->n2;
                        $n3 = $number[0]->n3;
                        $n4 = $number[0]->n4;
                        $name1 = $number[0]->name1;
                        $name2 = $number[0]->name2;
                        $name3 = $number[0]->name3;
                        $name4 = $number[0]->name4;
                       
                        ?>
                       
                    @endif


                        <strong>Raqam 1 : </strong>
                        <input type="number" name="n1" value="{{$n1}}" class="form-control"> <br>

                        <strong>Ma'umot 1 : </strong>
                        <input type="text" name="name1" value="{{$name1}}" class="form-control"> <br>

                        <strong>Raqam 2 : </strong>
                        <input type="number" name="n2" value="{{$n2}}" class="form-control"> <br>

                        <strong>Ma'umot 2 : </strong>
                        <input type="text" name="name2" value="{{$name2}}" class="form-control"> <br>

                        <strong>Raqam 3 :</strong>
                        <input type="number" name="n3" value="{{$n3}}" class="form-control"> <br>

                        <strong>Ma'umot 3 : </strong>
                        <input type="text" name="name3" value="{{$name3}}" class="form-control"> <br>

                        <strong>Raqam 4 :</strong>
                        <input type="number" name="n4" value="{{$n4}}" class="form-control"> <br>

                        <strong>Ma'umot 4 : </strong>
                        <input type="text" name="name4" value="{{$name4}}" class="form-control"> <br>

                        <input type="submit" value="Saqlash">

                    </form>
                </div>
                
            </div>
        </main>
        <!-- MAIN -->

@endsection
