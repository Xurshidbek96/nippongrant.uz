@extends('admin.layouts.layout')

@section('content')

@section('infos')
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
						<h3>Savol - Javob</h3>
						<a class="create__btn" href="{{route('infos.create')}}"> <i class='bx bxs-folder-plus'></i>Yaratish</a>
						
					</div>
					<table>
						<thead>
							<tr>
								<th>№</th>
								<th>Savol</th>
								<th>Javob</th>
								
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if (count($info) == 0)
					          <tr>
					            <td colspan="5" class="h5 text-center text-muted">Ma'lumot kiritilmagan</td>
					          </tr>
					        @endif
					        @foreach($info as $p)
								<tr>
									<td>{{++$loop->index}}</td>
									<td>{{$p->question}}</td>
									<td>{{$p->answer}}</td>
									<td>
										<form action="{{ route('infos.destroy',$p->id) }}" method="POST">

						                    <a class="btn btn-primary" href="{{ route('infos.edit',$p->id) }}"><ion-icon name="create-outline"></ion-icon></a>

						                    @csrf
						                    @method('DELETE')

						                    <button type="submit" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></button>
					                	</form>
					            	</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{$info->links()}}
				</div>
				
			</div>
		</main>
		<!-- MAIN -->

@endsection