@include("layout")

<div class="container border border-primary rounded w-50 mt-3">
    <h3 class="mt-3 text-primary pr-3 pt-3">Registration form</h3>
    <form action="/login" method="post" class="p-2 ">
        @csrf
        <div class="mt-3 p-2 col">
            <label for="" class="form-label text-primary" value={{old('username')}}>Username</label>
            <input type="text" class="p-1" name="username" id="">
            @if(isset($errors))
                <div class="text-danger h-6">{{$errors->first('username')}}</div>
            @endif
        </div>
        <div class="mt-3 p-2">
            <label class="form-label text-primary" for="">Passowrd</label>
            <input type="password" class="p-1" name="password" id="">
        </div>
        <div class="mt-3 p-2">
            @if(isset($error))
                <div class="text-white">{{$error}}</div>
            @endif
            <button type="submit"  class="btn btn-light text-primary border border-white">submit</button>
        </div>
    </form>
</div>
