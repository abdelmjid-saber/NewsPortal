@extends('admin.layout.app')

@section('heading', 'Update Category')
@section('button_header')
    <a href="{{ route('admin_sub_category_show') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View</a>
@endsection
@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_sub_category_update', $sub_category_single->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Sub Category Name *</label>
                                <input type="text" class="form-control" name="sub_category_name"
                                    value="{{ $sub_category_single->sub_category_name }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Existing Icon</label>
                                <img src="{{ asset('uploads/icons' . '/' . $sub_category_single->sub_category_icon) }}"
                                    alt="icon" class="form-control"
                                    style="background-color: black; width:64px;  height:100%;">
                            </div>
                            <div class="form-group mb-3">
                                <label>Category Icon *</label>
                                <input type="file" class="form-control" name="sub_category_icon">
                            </div>
                            <div class="form-group mb-3">
                                <label>Show on menu?</label>
                                <select class="form-control" name="show_on_menu">
                                    <option value="Show" @if ($sub_category_single->show_on_menu == 'Show') selected @endif>Show</option>
                                    <option value="Hide" @if ($sub_category_single->show_on_menu == 'Hide') selected @endif>Hide</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Show on home?</label>
                                <select class="form-control" name="show_on_home">
                                    <option value="Show" @if ($sub_category_single->show_on_home == 'Show') selected @endif>Show</option>
                                    <option value="Hide" @if ($sub_category_single->show_on_home == 'Hide') selected @endif>Hide</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Category Order *</label>
                                <input type="text" class="form-control" name="sub_category_order"
                                    value="{{ $sub_category_single->sub_category_order }}">
                            </div>
                            <div class="form-group">
                                <label for="select_category">Select Category *</label>
                                <select name="category_id" id="select_category" class="form-control">
                                    @foreach ($categories as $row)
                                        <option value="{{ $row->id }}"
                                            @if ($sub_category_single->id == $row->id) selected @endif>{{ $row->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                    </div>

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
