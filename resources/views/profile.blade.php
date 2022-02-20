@include('layout')
@foreach($posts as $post)
        <div class="d-flex flex-column border p-2 mb-3 border-info rounded-1">
            <div class="d-flex justify-content-between">
                <h5>{{$post->user->username}}</h5>
            @auth
                    @if($post->user->username == auth()->user()->username)
                    <button type="button" class="btn btn-success" id="changebutton" onclick="openChangeForm({{$post->id}})">change</button>
                    @endif
            @endauth
            </div>
            @auth
            <form action="{{route('posts.edit',[$post,auth()->user()->id])}}" class="changeForm" method="POST" id={{$post->id}}>
                @csrf
                <input placeholder="What's on your mind?" name="content" id="" class="form-control" value={{$post->content}}></input>
                <button class="btn btn-primary">submit</button>
            </form>
            @endauth
            {{$post->content}}
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
                @endauth
            </div>
        </div>
    @endforeach