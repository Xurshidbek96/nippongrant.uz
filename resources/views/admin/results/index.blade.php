@extends('admin.layouts.layout')

@section('content')

@section('results')
active
@endsection

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
						<h3>Natijalar</h3>
						<a class="create__btn" href="{{route('results.create')}}"> <i class='bx bxs-folder-plus'></i>Yaratish</a>
						
					</div>
					<table>
						<thead>
							<tr>
								<th>№</th>
								<th>Ball</th>
								<th>Rasmi</th>
								<th>Vaqti</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if (count($result) == 0)
					          <tr>
					            <td colspan="5" class="h5 text-center text-muted">Ma'lumot kiritilmagan</td>
					          </tr>
					        @endif
					        @foreach($result as $p)
								<tr>
									<td>{{++$loop->index}}</td>
									<td>{{$p->ball}}</td>
									<td><img src="{{URL::to($p->img)}}" width="200px"></td>
									<td>{{$p->created_at}}</td>
									<td>
										<form action="{{ route('results.destroy',$p->id) }}" method="POST">

						                    <a class="btn btn-primary" href="{{ route('results.edit',$p->id) }}"><ion-icon name="create-outline"></ion-icon></a>

						                    @csrf
						                    @method('DELETE')

						                    <button type="submit" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></button>
					                	</form>
					            	</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{$result->links()}}
				</div>
				
			</div>
		</main>
		<!-- MAIN -->

@endsection