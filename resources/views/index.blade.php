@include('layout')
@auth
<div class="container mt-4 d-flex flex-column justify-content-center w-50">
    <form action="/post" method="POST">
        @csrf
        <textarea placeholder="What's on your mind?" name="content" id="" class="form-control">
        </textarea>
        <button type="submit" class="btn btn-primary text-white mt-3"> Post it! </button>
    </form>
</div>
@endauth
<div class="container mt-4 d-flex flex-column justfy-content-center w-50">
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

                    {{$id = strval($post->id)}}
                    <button class="btn btn-success comment-btn" type="button" onclick="openCommentForm({{$post->id}})"> 
                        comment
                    </button>
                    <form action="{{route('posts.comment',$post)}}" method="POST" class="comment-form" id="{{$id.'comment'}}">
                        @csrf
                        <input type="text" name="content" id="" placeholder="comment the post">
                        <button class="btn btn-success">submit</button>
                    </form>
                @endauth
            </div>
        </div>
    @endforeach
</div>
