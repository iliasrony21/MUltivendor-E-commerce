@extends('admin.includes.master')
@section('admin')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">eCommerce</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add New Product</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->

              <div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Add New Product</h5>
					  <hr/>
                       <div class="form-body mt-4">
					    <div class="row">
						   <div class="col-lg-8">
                           <div class="border border-3 p-4 rounded">
                       <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
                          @csrf
							<div class="mb-3">
								<label for="product_name" class="form-label">Product Name</label>
								<input name="product_name" type="text" class="form-control" id="product_name" placeholder="Enter product Name">
							</div>
                            <div class="mb-3">
								<label for="short_des" class="form-label">Short Description</label>
                                <textarea id="short_des" name="short_des" class="form-control"></textarea>
							</div>
							  <div class="mb-3">
								<label for="long_des" class="form-label">Long Description</label>

							      <textarea id="long_des" name="long_des"></textarea>

							  </div>
                              <div class="mb-3">
                                <label class="form-label">Product Color</label>
                                <input name="color" type="text" class="form-control" data-role="tagsinput" value="jQuery,Script,Net">
							  </div>
                              <div class="mb-3">
                                <label class="form-label">Product Size</label>
                                <input name="size" type="text" class="form-control" data-role="tagsinput" value="jQuery,Script,Net">
							  </div>
                              <div class="mb-3">
                                <label class="form-label">Tags</label>
                                <input name="tags" type="text" class="form-control" data-role="tagsinput" value="jQuery,Script,Net">
							  </div>
                              <div class="mb-3">
								<label for="image" class="form-label">Product Image</label>
								<input onchange="preImage(this)" id="image" name="image" class="form-control" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf">
							  <img src="" id="imageView" alt="">
                            </div>
							  <div class="mb-3">
								<label for="images" class="form-label">Product Gallery</label>
								<input id="images" name="images[]" class="form-control" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
							  </div>
                            </div>
						   </div>
						   <div class="col-lg-4">
							<div class="border border-3 p-4 rounded">
                              <div class="row g-3">
								<div class="col-md-6">
									<label for="selling_price" class="form-label">Sales Price</label>
									<input name="selling_price" type="text" class="form-control" id="selling_price" placeholder="00.00">
								  </div>
								  <div class="col-md-6">
									<label for="discount_price" class="form-label">Disc Price</label>
									<input name="discount_price" type="text" class="form-control" id="discount_price" placeholder="00.00">
								  </div>
								  <div class="col-md-6">
									<label for="product_code" class="form-label">Product Code</label>
									<input name="product_code" type="text" class="form-control" id="product_code" placeholder="00.00">
								  </div>
								  <div class="col-md-6">
									<label for="quantity" class="form-label">Quantity</label>
									<input name="quantity" type="text" class="form-control" id="quantity" placeholder="00.00">
								  </div>
								  <div class="col-12">
									<label for="cat_id" class="form-label">Category</label>
									<select name="cat_id" class="form-select" id="cat_id">
										<option>---------------select Category----------</option>
                                        @foreach($cats as $cat)
                                        <option value="{{$cat->id}}">{{$cat->cat_name}}</option>

                                        @endforeach

									  </select>
								  </div>
                                  <div class="col-12">
									<label for="subcat_id" class="form-label">SubCategory</label>
									<select name="subcat_id" class="form-select" id="subcat_id">
										<option>---------------select Category----------</option>
                                        @foreach($subcats as $subcat)
                                        <option value="{{$subcat->id}}">{{$subcat->subcat_name}}</option>

                                        @endforeach
									  </select>
								  </div>
                                  <div class="col-12">
									<label for="brand_id" class="form-label">Brand</label>
									<select name="brand_id" class="form-select" id="brand_id">
										<option>---------------select Brand----------</option>
                                        @foreach($brand as $brand)
                                        <option value="{{$brand->id}}">{{$brand->brand_name}}</option>

                                        @endforeach
									  </select>
								  </div>
                                  <div class="col-12">
									  <label for="vendor_id" class="form-label">vendor</label>
									  <select name="vendor_id" class="form-select" id="vendor_id">
										<option>---------------select vendor----------</option>
                                        @foreach($vendors as $vendor)
                                        <option value="{{$vendor->id}}">{{$vendor->name}}</option>

                                        @endforeach
									  </select>
								  </div>
                                <div class="col-6">
                                <div class="form-check">
									<input name="hot_deals" class="form-check-input" type="checkbox" value="Hot Deals" id="flexCheckChecked" checked="">
									<label class="form-check-label" for="flexCheckChecked">Hot Deals</label>
								</div>
                                  <!-- <div class="form-check">
									<input name="hot_deals" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">Hot Deals</label>
								  </div> -->
                                </div>
                                <div class="col-6">
                                <div class="form-check">
									<input name="special_offer" class="form-check-input" type="checkbox" value="Special Offer" id="flexCheckChecked" checked="">
									<label class="form-check-label" for="flexCheckChecked">Special Offer</label>
								</div>
                                  <!-- <div class="form-check">
									<input hot_deals class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">Special Offer</label>
								  </div> -->
                                </div>
                                <div class="col-6">
                                <div class="form-check">
									<input name="special_deals" class="form-check-input" type="checkbox" value="Special Deals" id="flexCheckChecked" checked="">
									<label class="form-check-label" for="flexCheckChecked">Special Deals</label>
								</div>
                                  <!-- <div class="form-check">
									<input name="special_deals" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">Special Deals</label>
								  </div> -->
                                </div>
                                <div class="col-6">
                                <div class="form-check">
									<input name="featured" class="form-check-input" type="checkbox" value="Featured" id="flexCheckChecked" checked="">
									<label class="form-check-label" for="flexCheckChecked">Featured</label>
								</div>
                                  <!-- <div class="form-check">
									<input name="featured" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
									<label  class="form-check-label" for="flexCheckDefault">Featured</label>
								  </div> -->
                                </div>
                                <!-- <div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked="">
									<label class="form-check-label" for="flexCheckChecked">Checked checkbox</label>
								</div> -->

								  <div class="col-12">
									  <div class="d-grid">
                                         <button type="submit" class="btn btn-primary">Save Product</button>
									  </div>
								  </div>
                     </form>
							  </div>
						  </div>
						  </div>
					   </div><!--end row-->
					</div>
				  </div>
			  </div>





@endsection

