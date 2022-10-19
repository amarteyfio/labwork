//email validation
function ValidateEmail() {
    let x = document.forms["regform"]["email"].value
    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    let text1 
    if (x.value.match(validRegex)) {
    text1 = "Valid Address";
      
    }
    else{
        text1 = "Invalid Address";
    }
    document.forms["regform"]["register"].innerHTML = text1;
}

//Validate number
  function ValidatePhone(){
    function validateform() {
        let y = document.forms["regform"]["tele"].value;
        let text2;
        if (isNaN(x) || x < 1 || x > 10) {
        text2 = "Input not valid";
        } 
        else {
        text2 = "Input OK";
        }
        document.forms["regform"]["register"].innerHTML = text2;
    }
        
        
        
}
