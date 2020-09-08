@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/storage/{{$user-> profile -> image}}" alt="" class="rounded-circle w-100">
        </div>
        <div class="col-9 p-5">
            <div class="d-flex justify-content-between align-baseline"> 
                <h1>{{$user -> username}}</h1> 

                @can ('update', $user -> profile)
                    <a href="/p/create"> Add New Post</a>
                @endcan

            </div>

            @can ('update', $user -> profile)
                 <a href="/profile/{{$user -> id}}/edit">Edit Profile</a>
            @endcan

            <div class="d-flex">
                <div class="pr-5"> <strong>{{$user -> posts -> count()}}</strong> posts</div>
                <div class="pr-5"><strong>23k</strong> followers</div>
                <div class="pr-5"><strong>212</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold"> <p>{{$user -> profile -> title}}</p> </div>
            <div><p>{{$user -> profile -> description}}</p></div>
            <div > <a href="#">{{$user -> profile -> url ?? "N/A"}}</a> </div>
        </div>
    </div>

    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{$post-> id}}">
                    <img src="/storage/{{$post->image}}" alt=""class="w-100">
                </a>
            </div> 
        @endforeach
        
    </div>


</div>
@endsection








    <!-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div> -->
