@extends('admin.layout.app')

@section('heading', 'Add Post')
@section('button_header')
    <a href="{{ route('admin_post_show') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View</a>
@endsection
@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_post_store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="post-title">Post Title *</label>
                                <input type="text" id="post-title" class="form-control" name="post_title">
                            </div>
                            <div class="form-group mb-3">
                                <label for="excerpt">Excerpt SEO</label>
                                <textarea name="excerpt" id="excerpt" class="form-control" cols="30" rows="10" maxlength="160" style="height: 150px;"></textarea>
                                <span>we recommend descriptions between 50 and 160 characters</span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="post-detail">Post Detail *</label>
                                <textarea name="post_detail" id="detail" class="form-control snote" cols="30" rows="10" ></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label id="post-photo">Post Photo *</label>
                                <input type="file" id="post-photo" class="form-control" name="post_photo">
                            </div>
                            <div class="form-group mb-3">
                                <label for="select-category">Select Category *</label>
                                <select id="select-category" class="form-control" name="sub_category_id">
                                    @foreach ($sub_categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->sub_category_name }} ({{ $item->rCategory->category_name }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="is-comment">Is Comment?</label>
                                <select id="is-comment" class="form-control" name="is_comment">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="subscriber_send_option">Want to send this to subscribers?</label>
                                <select id="subscriber_send_option" class="form-control" name="is_comment">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="tags">Tags</label>
                                <input type="text" id="tags" class="form-control" name="tags">
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
