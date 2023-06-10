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
                        <form action="{{ route('admin_category_update', $category_single->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Category Name *</label>
                                <input type="text" class="form-control" name="category_name" value="{{ $category_single->category_name }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Show on menu?</label>
                                <select class="form-control" name="show_on_menu">
                                    <option value="Show" @if($category_single->show_on_menu == 'Show')
                                        selected
                                    @endif >Show</option>
                                    <option value="Hide" @if($category_single->show_on_menu == 'Hide')
                                        selected
                                    @endif>Hide</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Category Order *</label>
                                <input type="text" class="form-control" name="category_order" value="{{ $category_single->category_order }}">
                            </div>
                                @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                                @endif
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
