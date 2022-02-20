@include('layout')
<div class="container d-flex flex-column">
    <div class="row m-4">
        <h2 class="mt-4">Your info</h2>
        <form action="/username" class="m-3 d-flex flex-column col" method="POST">
            @csrf
            <label class="h4" for="">Username</label>
            <div class="d-flex justify-content-between">
                <input class="form-control" name="username" type="text" value={{auth()->user()->username}} id="dashboard-username" disabled>
                <button type="button" class="btn btn-primary" onclick="updateUsername()">change</button>
            </div>
            <button class="btn btn-primary mt-2" disabled id="dashboard-username-button">Update</button>
        </form>
        <form action="/email" class="m-3 d-flex flex-column col" method="POST">
            @csrf
            <label class="h4" for="">Email</label>
            <div class="d-flex justify-content-between">
                <input class="form-control mr-1" type="text" name="email" value={{auth()->user()->email}} id="dashboard-email" disabled>
                <button type="button" class="btn btn-primary" onclick="updateEmail()">change</button>
            </div>
            <button class="btn btn-primary mt-2" disabled id="dashboard-email-button">Update</button>
        </form>
        <form action="/password" class="m-3 d-flex flex-column col" method="POST">
            @csrf
            <label class="h4" for="">Password</label>
            <div class="d-flex justify-content-between">
                <input class="form-control mr-1" type="password" name="password" disabled value="12345678" id="dashboard-password">
                <input class="form-control mr-1" type="password" name="password_confirmation" disabled value="12345678" id="dashboard-password2">
                <button type="button" class="btn btn-primary" onclick="updatePassword()">change</button>
            </div>
            <button class="btn btn-primary mt-2" disabled id="dashboard-password-button">Update</button>
        </form>
    </div>
    <div class="m-4 col">
        <form class="d-flex row" action="/avatar" method="POST" enctype="multipart/form-data" >
            @csrf
            <input type="file" name="avatar" id="" class="col">
            <button class="btn btn-primary col">Upload File</button>
        </form>
    </div>
</div>
