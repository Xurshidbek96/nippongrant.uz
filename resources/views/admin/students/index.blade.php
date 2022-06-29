@extends('admin.layouts.layout')

@section('students')
active
@endsection

@section('content')

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
						<h3>Talabalar</h3>
						<a class="create__btn" href="{{route('students.create')}}"> <i class='bx bxs-folder-plus'></i>Qo'shish</a>
						
					</div>
					<table>
						<thead>
							<tr>
								<th>№</th>
								<th>F.I.SH</th>
								<th>Universiteti</th>
								<th>Rasmi</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if (count($student) == 0)
					          <tr>
					            <td colspan="5" class="h5 text-center text-muted">Ma'lumot kiritilmagan</td>
					          </tr>
					        @endif
					        @foreach($student as $p)
								<tr>
									<td>{{++$loop->index}}</td>
									<td>{{$p->name}}</td>
									<td>{{$p->edu}}</td>
									<td><img src="{{URL::to($p->img)}}" width="200px"></td>
									
									<td>
										<form action="{{ route('students.destroy',$p->id) }}" method="POST">

						                    <a class="btn btn-primary" href="{{ route('students.edit',$p->id) }}"><ion-icon name="create-outline"></ion-icon></a>

						                    @csrf
						                    @method('DELETE')

						                    <button type="submit" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></button>
					                	</form>
					            	</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{$student->links()}}
				</div>
				
			</div>
		</main>
		<!-- MAIN -->

@endsection