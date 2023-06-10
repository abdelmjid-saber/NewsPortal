@extends('admin.layout.app')

@section('heading', 'Add Photo')
@section('button_header')
    <a href="{{ route('admin_category_show') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View</a>
@endsection
@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_photo_store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="photo">Photo *</label>
                                <input type="file" name="photo" id="photo" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="caption">Caption *</label>
                                <input type="text" class="form-control" name="caption">
                            </div>
                            @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        @endif
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
