@extends('admin.layout.app')

@section('heading', 'Dashboard')

@section('main_content')
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fa-solid fa-blog text-white fs-1"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Posts</h4>
                </div>
                <div class="card-body">
                    {{ $total_posts }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fa-solid fa-camera text-white fs-1"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Photo</h4>
                </div>
                <div class="card-body">
                    {{ $total_photo }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fa-solid fa-calendar text-white fs-1"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Categories</h4>
                </div>
                <div class="card-body">
                    {{ $total_category }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fa-solid fa-hashtag text-white fs-1"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Sub Categories</h4>
                </div>
                <div class="card-body">
                    {{ $total_sub_category }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fa-solid fa-tag text-white fs-1"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Tags</h4>
                </div>
                <div class="card-body">
                    {{ $total_tags }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection