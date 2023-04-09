@extends('admin.includes.master')
@section('admin')

<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>SL No</th>
										<th>Sub-Category Name</th>
										<th>Category Name</th>
										<th>Slug</th>
										<th>Action</th>

									</tr>
								</thead>
								<tbody>
                                    @foreach($subcategories as $subcategory)
                                    <tr>
                                        <td >{{ $subcategory->id }}</td>
                                        <td >{{ $subcategory->subcat_name }}</td>
                                        <td >
                                           {{ $subcategory->cat->cat_name }}
                                        </td>
                                        <td >{{ $subcategory->subcat_slug }}</td>
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
