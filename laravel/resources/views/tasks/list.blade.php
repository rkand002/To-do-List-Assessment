
<!-- Current Tasks -->
<table class="ui table">
	<thead>
		<tr>
			<th class="thirteen wide">Tasks</th>
			<th class="three wide">&nbsp;</th>

		</tr>
	</thead>

	<tbody>
		@foreach($userTasks as $task)
			<tr>
				<td class="assa">
					{{ $task->name }}
				</td>

				<td class="center aligned">


					<button class="ui icon button" data-toggle="modal" data-target="#edit-{{ $task->id }}">
						<i class="edit icon"></i>
					</button>

					<form action="/tasks/{{ $task->id }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('PATCH') }}
						<div class="modal fade" id="edit-{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header text-center">
										<h4 class="modal-title w-100 font-weight-bold">Update</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body mx-3">
										<div class="md-form mb-5">
											<i class="fa fa-envelope prefix grey-text"></i>
											<input placeholder="Enter new name for task" type="text" name="name" class="form-control validate">
										</div>

									</div>
									<div class="modal-footer d-flex justify-content-center">
										<button type="submit" class="btn btn-default">Update</button>
									</div>
								</div>
							</div>
						</div>
					</form>
					<form action="/tasks/{{ $task->id }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button type="submit" class="ui icon button">
							<i class="trash icon"></i>
						</button>
					</form>
				</td>
			</tr>
		@endforeach
	</tbody>

</table>