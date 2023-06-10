@extends('admin.layout.app')

@section('heading', 'Edit Post')
@section('button_header')
    <a href="{{ route('admin_post_show') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View</a>
@endsection
@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_post_update', $post_single->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Post Title *</label>
                                <input type="text" class="form-control" name="post_title"
                                    value="{{ $post_single->post_title }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="excerpt">Excerpt SEO</label>
                                <textarea name="excerpt" id="excerpt" class="form-control" cols="30" rows="10" maxlength="160" style="height: 150px;">{{ $post_single->excerpt }}</textarea>
                                <span>we recommend descriptions between 50 and 160 characters</span>
                            </div>
                            <div class="form-group mb-3">
                                <label>Post Detail *</label>
                                <textarea name="post_detail" class="form-control snote" cols="30" rows="10">{{ $post_single->post_detail }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Existing Post Photo</label>
                                <img src="{{ asset('uploads/posts' . '/' . $post_single->post_photo) }}" alt="post image"
                                    class="form-control" style="width: 350px; height:100%;">
                            </div>
                            <div class="form-group mb-3">
                                <label>Post Photo *</label>
                                <input type="file" class="form-control" name="post_photo">
                            </div>
                            <div class="form-group mb-3">
                                <label>Select Category *</label>
                                <select class="form-control" name="sub_category_id">
                                    @foreach ($sub_categories as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($post_single->sub_category_id == $item->id) selected @endif>{{ $item->sub_category_name }}
                                            ({{ $item->rCategory->category_name }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Is Comment?</label>
                                <select class="form-control" name="is_comment">
                                    <option value="1" @if ($post_single->is_comment == 1 ) selected @endif>Yes</option>
                                    <option value="0" @if ($post_single->is_comment == 0 ) selected @endif>No</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Existing Tags</label>
                                <table class="table table-bordered">
                                    @foreach ($existing_tags as $item)
                                        <tr>
                                            <td>{{ $item->tag_name }}</td>
                                            <td>
                                                <a href="{{ route('admin_post_delete_tag', $item->id) }}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="form-group mb-3">
                                <label>New Tags</label>
                                <input type="text" class="form-control" name="tags">
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
