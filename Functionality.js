
 /*----------------------------redirect to the new page-----------------------------*/
 function Login(){

       var studentNumber = document.getElementById("std-number").value;
       var pin = document.getElementById("Pin").value;
       if(studentNumber==""){
            alert("Please enter your student number")
       }
       else if(pin==""){
            alert("Please enter your pin")
       }
       else if (studentNumber =="201925641"  && pin == "12345"){
            window.open("Materials.html");
       }
      else if (studentNumber =="" && pin==""){
            alert("student number and pin are required")
      }
       else{
             alert("invalid Credentials")
             return;
       }
 }

 /*---------------------------------Another style----------------------------*/
 