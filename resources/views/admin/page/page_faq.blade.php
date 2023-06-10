@extends('admin.layout.app')

@section('heading', 'Edit FAQ Page Content')
@section('button_header')
@endsection
@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_faq_update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="faq-title">Title *</label>
                                <input type="text" id="faq-title" class="form-control" name="faq_title" value="{{ $page_data->faq_title }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="excerpt">Excerpt</label>
                                <textarea name="faq_excerpt" id="excerpt" class="form-control" cols="30" rows="10" maxlength="160" style="height: 150px;">{{ $page_data->faq_excerpt }}</textarea>
                                <span>we recommend descriptions between 50 and 160 characters</span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="post-detail">Post Detail *</label>
                                <textarea name="faq_detail" id="detail" class="form-control snote" cols="30" rows="10" >{{ $page_data->faq_detail }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Status</label>
                                <select class="form-control" name="faq_status">
                                    <option value="Show" @if ($page_data->faq_status == 'Show') selected @endif>Show</option>
                                    <option value="Hide" @if ($page_data->faq_status == 'Hide') selected @endif>Hide</option>
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
