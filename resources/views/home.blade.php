@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form method="post" action="{{('posts/store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Post Title</label>
                                <input type="text" name="title" class="form-control"   placeholder="Enter post title" required>
                            </div>

                            <div class="form-group">
                                <label>Post Description</label>
                                <textarea class="form-control" name="description" placeholder="Enter post description" row="50" required></textarea>
                            </div>
                        <div class="form-group">
                            <input class="form-control" type="file" name="thumbmail" type="file">
                        </div>

                            <button type="submit" class="btn btn-primary mt-2">Post</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
