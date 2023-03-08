@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" style="height: 200px; border-right: 1px solid #333;" class="rounded-circle h-10" alt="">
        </div>
        <div class="col9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-baseline pb-3">
                    <div class="h4">{{ $user->username }}</div>
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>

                @can('update', $user->profile)
                    <a class="btn btn-danger m-lg-4" href="/p/create">Add New Post</a>
                @endcan
            </div>
            @can('update', $user->profile)
                <a class="btn btn-danger" href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex pt-3">
                <div class=""><strong>{{ $postCount }}</strong> posts</div>
                <div class="ps-5"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="ps-5"><strong>{{ $followingCount }}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div href="#">{{ $user->profile->url }}</div>
        </div>
    </div>

    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" alt="" class="w-100">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
