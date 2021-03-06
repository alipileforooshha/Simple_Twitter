@include('layout')
<div class="container">
    @if(isset($user->bio))
        <div class="d-flex border border-success p-2 h3 my-2">
            <p>{{$user->bio}}</p>
        </div>
        <button type="button" class="btn btn-success" onclick="openbioform()">change bio</button>

        <form action="/bio" method="post" class="change_bio my-2" id="changeform">
            @csrf
            <input type="text" name="bio" class="form-control" value="{{$user->bio}}">
            <button type="submit" class="btn btn-primary my-2">submit bio</button>
        </form>
    @else
        @if($user->id == auth()->user()->id)
            <form action="/bio" method="post" class="my-2">
                @csrf
                <input type="text" name="bio" class="form-control" placeholder="Put up a biography!">
                <button type="submit" class="btn btn-primary my-2">submit bio</button>
            </form>
        @endif
    @endif
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