//Script to make sure login or signup info is valid
function check(input) {
    if (input.value != document.getElementById('password').value) {
        input.setCustomValidity('Passwords do not match');
    }
    else {
        input.setCustomValidity('');
    }
}

/*
function clearContents(element){
    if (element.value == "Write a post here!"){
        element.value = "";
    }
    
}
function bringContents(element){
    if (element.value == "") {
        element.value = "Write a post here!"
    }
}
*/