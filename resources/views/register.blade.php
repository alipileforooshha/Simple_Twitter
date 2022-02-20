@include("layout")
<div class="container bg-primary rounded w-50 mt-3">
    <h3 class="mt-3 text-white pr-3 pt-3">Registration form</h3>
    <form action="" method="post" class="p-2">
        @csrf
        <div class="mt-3 p-2 col">
            <label for="" class="form-label text-white">Username</label>
            <input type="text" class="p-1" name="username" id="">
        </div>
        <div class="mt-3 p-2 col">
            <label class="form-label text-white" for="">E-mail</label>
            <input type="email" class="p-1" name="email" id="">
        </div>
        <div class="mt-3 p-2">
            <label class="form-label text-white" for="">Passowrd</label>
            <input type="password" class="p-1" name="password" id="">
        </div>
        <div class="mt-3 p-2 flex-column">
            <label class="form-label text-white" for="">Password Confirm</label>
            <input type="password" class="p-1" name="password_confirmation" id="">
        </div>
        <div class="mt-3 p-2">
            <button type="submit"  class="btn btn-light text-primary border border-white">submit</button>
        </div>
    </form>
</div>