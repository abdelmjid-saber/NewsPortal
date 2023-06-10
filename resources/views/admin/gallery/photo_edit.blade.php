@extends('admin.layout.app')

@section('heading', 'Edit Photo')
@section('button_header')
    <a href="{{ route('admin_photo_show') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View</a>
@endsection
@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_photo_update', $photo_single->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="photo">Existing Photo</label>
                                <img src="{{ asset('uploads/gallery' . '/' . $photo_single->photo) }}" alt="{{ $photo_single->caption }}" class="form-control" style="width: 250px; height: 100%;">
                            </div>
                            <div class="form-group mb-3">
                                <label for="photo">Photo *</label>
                                <input type="file" name="photo" id="photo">
                            </div>
                            <div class="form-group mb-3">
                                <label>Caption *</label>
                                <input type="text" class="form-control" name="caption" value="{{ $photo_single->caption }}">
                            </div>
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
