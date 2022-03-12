@include('layout')
<div class="d-flex justify-content-between my-2">
    <div class="d-flex flex-column m-3">
        @foreach($users as $user)
            <div class="border-bottom p-2">
                <div class="d-flex">
                    <a href="{{route('profile.user',$user)}}">
                        <img src="{{asset('storage/images/'.$user->avatar)}}" class="rounded-circle mx-2 avatar-img" style="width: 50px; height:50px;"></img>
                    </a>
                    <div>
                        <a href="" class="text-decoration-none">
                            {{$user->username}}
                        </a>
                        <p class="mt-2">
                            {{$user->bio}}
                        </p>
                    </div>
                </div>
                <form action="{{route('users.follow',$user->id)}}" method="POST">
                    @csrf
                    <button class="btn btn-primary p-1">follow</button>
                </form>
            </div>
        @endforeach
    </div>

    <div class="mx-0 w-75">
        @auth
            <form action="/post" method="POST">
                @csrf
                <textarea placeholder="What's on your mind?" name="content" id="" class="form-control">
                </textarea>
                <button type="submit" class="btn btn-primary text-white mt-3"> Post it! </button>
            </form>
        
        @endauth
        
            @foreach($posts as $post)
            <div class="d-flex flex-column border-bottom p-2 mb-3 border-info rounded-1">
                    <div class="d-flex justify-content-between">
                        <h5>{{$post->user->username}}</h5>
                    @auth
                            @if($post->user->username == auth()->user()->username)
                            <button type="button" class="btn btn-success" id="changebutton" onclick="openChangeForm({{$post->id}})">change</button>
                            <form action="{{route('posts.delete',$post)}}" method="POST">
                                @csrf
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            @endif
                    @endauth
                    </div>
                    @auth
                    <form action="{{route('posts.edit',[$post,auth()->user()->id])}}" class="changeForm" method="POST" id={{$post->id}}>
                        @csrf
                        <input placeholder="What's on your mind?" name="content" id="" class="form-control" value="{{$post->content}}"></input>
                        <button class="btn btn-primary">submit</button>
                    </form>
                    @endauth
                    <a href="{{route('posts.post',$post)}}" class="text-decoration-none text-dark">
                        {{$post->content}}
                    </a>
                    <div class="d-flex flex-row align-items-center mt-2 mb-0">
                        @auth
                            @if(! $post->likedBy(Auth::user()) )
                            <form action="{{route('posts.like',$post)}}" method="post">
                                @csrf
                                <button class="btn btn-success text-white p-1" type="submit">like</button>
                            </form>
                            @else
                            <form action={{route('posts.dislike',$post)}} method="post">
                                @csrf
                                <button class="btn btn-danger p-1 text-white">dislike</button>
                            </form>
                            @endif
                            <div class="mx-2">{{$post->like->count()}}</div>
                            <form action={{route('posts.retweet',$post)}} method="post">
                                @csrf
                                <button class="btn btn-success p-1 text-white mx-2">retweet</button>
                            </form>
                            <div class="mx-2">{{$post->retweet->count()}}</div>
                            
                            <button class="btn btn-success comment-btn" type="button" onclick="openCommentForm({{$post->id}})"> 
                                comment
                            </button>
                            <div class="mx-2">{{$post->comment->count()}}</div>
                            @endauth
                        </div>
                        <form action="{{route('posts.comment',$post)}}" method="POST" class="comment-form" id="{{strval($post->id).'comment'}}">
                            @csrf
                            <input type="text" class="form-control my-2" name="content" id="" placeholder="Share your thoughts">
                            <button class="btn btn-success">submit comment</button>
                        </form>
                </div>
            @endforeach
    </div>

    <div>
        whatevs
    </div>
</div>
