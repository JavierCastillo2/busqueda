@section('title', __('Animals'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Animales </h4>
						</div>
						<div wire:poll.1s >
							<code><h5>{{ now()->format('s') }} S</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
						</div>
					</div>

					<div class="card-body">
						@include('livewire.animals.create')
						@include('livewire.animals.update')
					<div class="table-responsive">
					</br>
					<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Animal">
					</br>
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr>
								<td>#</td>
								<th>Nombre</th>
								<th>Tipo</th>
								<th>Descripcion</th>
								<th>Imagen</th>
							</tr>
						</thead>
						<tbody>
							@foreach($animals as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->name }}</td>
								<td>{{ $row->type }}</td>
								<td>{{ $row->description }}</td>
								<td><img src="{{url('image',$row->image)}}" class="img-thumbnail" alt="Animal" style="height: 150px"></td>
							@endforeach
						</tbody>
					</table>
					{{ $animals->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
