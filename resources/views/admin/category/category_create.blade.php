@extends('admin.layout.app')

@section('heading', 'Add Category')
@section('button_header')
    <a href="{{ route('admin_category_show') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View</a>
@endsection
@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_category_store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Category Name *</label>
                                <input type="text" class="form-control" name="category_name">
                            </div>
                            <div class="form-group mb-3">
                                <label>Show on menu?</label>
                                <select class="form-control" name="show_on_menu">
                                    <option value="Show">Show</option>
                                    <option value="Hide">Hide</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Category Order *</label>
                                <input type="text" class="form-control" name="category_order">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
