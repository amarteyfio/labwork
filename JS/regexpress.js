//email validation
function ValidateEmail() {
    let x = document.forms["regform"]["email"].value
    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  
    if (x.value.match(validRegex)) {
  
      alert("Valid email address!");
  
      document.form1.text1.focus();
  
      return true;
  
    } else {
  
      alert("Invalid email address!");
  
      document.form1.text1.focus();
  
      return false;
  
    }
  
  }

  function ValidatePhone(){
    function validateform() {
        let y = document.forms["regform"]["tele"].value;
        let text;
        if (isNaN(x) || x < 1 || x > 10) {
        text = "Input not valid";
        } 
        else {
        text = "Input OK";
        }
        document.forms["regform"]["register"].innerHTML = text;
}
        
        
        
    
  }