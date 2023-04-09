@extends('admin.includes.master')
@section('admin')

<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>SL No</th>
										<th>Category Name</th>
										<th>Image</th>
										<th>Slug</th>
										<th>Action</th>

									</tr>
								</thead>
								<tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td >{{ $category->id }}</td>
                                        <td >{{ $category->cat_name }}</td>
                                        <td >
                                            <img src="{{ asset('uploads/category/'.$category->cat_image) }}" alt="">
                                        </td>
                                        <td >{{ $category->cat_slug }}</td>
                                        <td>
                                            <button class="btn btn-primary">Edit</button>
                                            <button class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach

								</tbody>
								<tfoot>
									<tr>
                                        <th>SL No</th>
										<th>Category Name</th>
										<th>Image</th>
										<th>Slug</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>

@endsection
