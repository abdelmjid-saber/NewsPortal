@extends('admin.layout.app')

@section('heading', 'Edit Terms And Conditions Page Content')
@section('button_header')
@endsection
@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_terms_update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="terms-title">Title *</label>
                                <input type="text" id="terms-title" class="form-control" name="terms_title" value="{{ $page_data->terms_title }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="excerpt">Excerpt</label>
                                <textarea name="terms_excerpt" id="excerpt" class="form-control" cols="30" rows="10" maxlength="160" style="height: 150px;">{{ $page_data->terms_excerpt }}</textarea>
                                <span>we recommend descriptions between 50 and 160 characters</span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="post-detail">Post Detail *</label>
                                <textarea name="terms_detail" id="detail" class="form-control snote" cols="30" rows="10" >{{ $page_data->terms_detail }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Status</label>
                                <select class="form-control" name="terms_status">
                                    <option value="Show" @if ($page_data->terms_status == 'Show') selected @endif>Show</option>
                                    <option value="Hide" @if ($page_data->terms_status == 'Hide') selected @endif>Hide</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
