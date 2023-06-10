@extends('admin.layout.app')

@section('heading', 'Edit Contact Page Content')
@section('button_header')
@endsection
@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_contact_update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="contact-title">Title *</label>
                                <input type="text" id="contact-title" class="form-control" name="contact_title" value="{{ $page_data->contact_title }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="excerpt">Excerpt</label>
                                <textarea name="contact_excerpt" id="excerpt" class="form-control" cols="30" rows="10" maxlength="160" style="height: 150px;">{{ $page_data->contact_excerpt }}</textarea>
                                <span>we recommend descriptions between 50 and 160 characters</span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="contact_map">Map (iFram Code)</label>
                                <textarea name="contact_map" id="contact_map" class="form-control" style="height: 200px;">{{ $page_data->contact_map }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Status</label>
                                <select class="form-control" name="contact_status">
                                    <option value="Show" @if ($page_data->contact_status == 'Show') selected @endif>Show</option>
                                    <option value="Hide" @if ($page_data->contact_status == 'Hide') selected @endif>Hide</option>
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
