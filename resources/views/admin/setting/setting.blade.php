@extends('admin.layout.app')

@section('heading', 'Setting')
@section('button_header')
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_setting_update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-1-tab" data-toggle="pill" href="#v-1" role="tab" aria-controls="v-1" aria-selected="true">
                                        Home Page
                                    </a>
                                    <a class="nav-link" id="v-5-tab" data-toggle="pill" href="#v-5" role="tab" aria-controls="v-5" aria-selected="true">
                                        Newsletter
                                    </a>
                                    <a class="nav-link" id="v-2-tab" data-toggle="pill" href="#v-2" role="tab" aria-controls="v-2" aria-selected="false">
                                        Logo and Favicon
                                    </a>
                                    <a class="nav-link" id="v-3-tab" data-toggle="pill" href="#v-3" role="tab" aria-controls="v-3" aria-selected="false">
                                        Google Analytic
                                    </a>
                                    <a class="nav-link" id="v-4-tab" data-toggle="pill" href="#v-4" role="tab" aria-controls="v-4" aria-selected="false">
                                        Disqus Comment
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-9 col-md-8 col-sm-12">
                                <div class="tab-content" id="v-pills-tabContent">
                                    {{-- Home Page --}}
                                    <div class="pt_0 tab-pane fade show active" id="v-1" role="tabpanel" aria-labelledby="v-1-tab">
                                        <!-- Category Title -->
                                        <div class="form-group mb-3">
                                            <label for="title_categories">
                                                Title Categories
                                            </label>
                                            <input type="text" name="title_categories" id="title_categories" class="form-control" value="{{ $setting_data->title_categories }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="description_categories">
                                                Description Categories
                                            </label>
                                            <textarea type="text" name="description_categories" id="description_categories" class="form-control" style="height: 150px">{{ $setting_data->description_categories }}</textarea>
                                        </div>
                                        <!-- Photo Item End -->
                                    </div>
                                    {{-- Newsletter --}}
                                    <div class="pt_0 tab-pane fade" id="v-5" role="tabpanel" aria-labelledby="v-5-tab">
                                        <!-- Photo Item Start -->
                                        <div class="form-group mb-3">
                                            <label for="title_newsletter">
                                                Title Newsletter
                                            </label>
                                            <input type="text" name="title_newsletter" id="title_newsletter" class="form-control" value="{{ $setting_data->title_newsletter }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="description_newsletter">
                                                Description Newsletter
                                            </label>
                                            <textarea type="text" name="description_newsletter" id="description_newsletter" class="form-control" style="height: 150px">{{ $setting_data->description_newsletter }}</textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="text_bottom_newsletter">
                                                Text Bottom Newsletter
                                            </label>
                                            <textarea type="text" name="text_bottom_newsletter" id="text_bottom_newsletter" class="form-control" style="height: 150px">{{ $setting_data->text_bottom_newsletter }}</textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Existing Photo Newsletter</label>
                                            <div>
                                                <img src="{{ asset('uploads/' . $setting_data->photo_newsletter) }}" alt="newsletter" class="form-control" style="width: 400px; height: 100%;">
                                            </div> 
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Photo Newsletter</label>
                                            <div>
                                                <input type="file" name="photo_newsletter" >
                                            </div> 
                                        </div>
                                        <!-- Photo Item End -->
                                    </div>
                                    {{-- Logo and Favicon --}}
                                    <div class="pt_0 tab-pane fade" id="v-2" role="tabpanel" aria-labelledby="v-2-tab">
                                        <!-- start logo -->
                                        <div class="form-group mb-3">
                                            <label>Existing Logo</label>
                                            <div>
                                                <img src="{{ asset('uploads/' . $setting_data->logo) }}" alt="logo" class="form-control" style="width: 200px; height: 100%;">
                                            </div> 
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Change Logo</label>
                                            <div>
                                                <input type="file" name="logo" >
                                            </div> 
                                        </div>
                                        <!-- end logo -->
                                        <!-- start favicon -->
                                        <div class="form-group mb-3">
                                            <label>Favicon Logo</label>
                                            <div>
                                                <img src="{{ asset('uploads/' . $setting_data->favicon) }}" alt="logo" class="form-control" style="width: 100px; height: 100%;">
                                            </div> 
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Change Favicon</label>
                                            <div>
                                                <input type="file" name="favicon" >
                                            </div> 
                                        </div>
                                        <!-- end favicon -->
                                    </div>
                                    {{-- Google Analytic --}}
                                    <div class="pt_0 tab-pane fade" id="v-3" role="tabpanel" aria-labelledby="v-3-tab">
                                        <div class="form-group mb-3">
                                            <label for="analytic_id">Google Analytic ID</label>
                                            <input type="text" name="analytic_id" id="analytic_id" class="form-control" value="{{ $setting_data->analytic_id }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="status">Status</label>
                                            <select name="analytic_status" id="status" class="form-control">
                                                <option value="Show" @if($setting_data->analytic_status == 'Show' ) @endif>Show</option>
                                                <option value="Show" @if($setting_data->analytic_status == 'Hide' ) @endif>Hide</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- Disqus Comment --}}
                                    <div class="pt_0 tab-pane fade" id="v-4" role="tabpanel" aria-labelledby="v-4-tab">
                                        <div class="form-group mb-3">
                                            <label for="disqus_code">Disqus Code</label>
                                            <textarea name="disqus_code" id="disqus_code" class="form-control" cols="30" rows="10" style="height: 200px;">{{ $setting_data->disqus_code }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt_30">
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
