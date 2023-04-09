@extends('admin.includes.master')
@section('admin')

<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>SL No</th>
										<th>Brand Name</th>
										<th> Brand Image</th>
										<th>Slug</th>
										<th>Action</th>

									</tr>
								</thead>
								<tbody>
                                    @foreach($brands as $brand)
                                    <tr>
                                        <td >{{ $brand->id }}</td>
                                        <td >{{ $brand->brand_name }}</td>
                                        <td >
                                            <img src="{{ asset('uploads/brand/'.$brand->brand_image) }}" alt="">
                                        </td>
                                        <td >{{ $brand->brand_slug }}</td>
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
