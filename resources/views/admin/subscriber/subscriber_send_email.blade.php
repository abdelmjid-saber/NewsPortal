@extends('admin.layout.app')

@section('heading', 'Send Email To Subscribers')
@section('button_header')
    <a href="{{ route('admin_subscribers') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View</a>
@endsection
@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_subscriber_send_email_submit') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="subject">Subject *</label>
                                <input type="text" id="subject" name="subject" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="message">Message *</label>
                                <textarea name="message" id="message" class="form-control snote" cols="30" rows="10"></textarea>
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
