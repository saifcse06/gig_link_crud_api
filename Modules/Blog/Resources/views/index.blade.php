@extends('layout.master')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Body</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allPosts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->body }}</td>
                    </tr>
                     @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
