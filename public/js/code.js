
function updateEmail(){
    email = document.getElementById('dashboard-email');
    button = document.getElementById('dashboard-email-button')
    email.disabled = false;
    button.disabled = false;
}
function updateUsername(){
    email = document.getElementById('dashboard-username');
    button = document.getElementById('dashboard-username-button')
    email.disabled = false;
    button.disabled = false;
}
function updatePassword(){
    email = document.getElementById('dashboard-password');
    email2 = document.getElementById('dashboard-password2');
    button = document.getElementById('dashboard-password-button')
    email.disabled = false;
    email2.disabled = false;
    button.disabled = false;
}

function openChangeForm(id){
    myform = document.getElementById(`${id}`);
    myform.style.display = 'block';
}

function openCommentForm(id){
    console.log('heyyyy')
    console.log(`${id}`+'comment');
    myform = document.getElementById(`${id}`+'comment');
    myform.style.display = 'block';
}