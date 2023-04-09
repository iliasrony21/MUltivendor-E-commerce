@extends('admin.includes.master')
@section('admin')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add new SubCategory Form</h6>
        <hr/>
        <div class="card border-top border-0 border-4 border-info">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                        </div>
                        <h5 class="mb-0 text-info">SubCategory Added form</h5>
                    </div>
                    <hr/>
                <form action="{{ route('store.subcategory') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                           <div class="row mb-3">
                                <label for="subcat_name" class="col-sm-3 col-form-label">Sub Category Name</label>
                                <div class="col-sm-9">
                                    <input name="subcat_name" type="text" class="form-control" id="subcat_name" placeholder="Enter category Name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="cat" class="col-sm-3 col-form-label">Select Category</label>
                                <div class="col-sm-9">
                                   <select name="cat_id" class="form-control" id="cat">
                                   <option value="">-----Select Category-----</option>
                                    @foreach($cats as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>

                                    @endforeach
                                   </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                            <label  class="col-sm-3 col-form-label"> </label>
                                <div class="col-sm-9">
                                  <button class="btn btn-primary ">Add SubCategory</button>
                                </div>
                            </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>





@endsection

