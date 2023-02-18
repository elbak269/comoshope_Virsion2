/*(function(){
   // var status = document.getElementById("status");
    var messages = document.getElementById("message");
    var textarea = document.getElementById("textarea");
    var client1 = document.getElementById("client1");
    var client2 = document.getElementById("client2");
   // var username = document.getElementById("username");
  //  var clearbtn = document.getElementById("clear"); 

    // setstatus
    var statusdfault = setsatus.textContent;
    function setsatus(s){
        // set status 
        status.textContent = s; 
        if(statusdfault !== s){
            function delay(){  
                setTimeout(function(){
                    setsatus(statusdfault);
                },4000);
               
            }
        }
    } 

    // connect to socket.io
    let socket = io.connect("http://localhost:6060");
    if(socket !== undefined){ 

        //Handle Output
        socket.on("output",function(data){
        for(var i =0; i < data.length; i++){
            // build output message div
            var clearflot = document.createElement("div");
            clearflot.setAttribute("class","clear");
            var message = document.createElement("div");
            message.setAttribute("class","chat-message");
            message.textContent =  data[i].message;
            messages.appendChild(message);
            messages.appendChild(clearflot);
        messages.insertBefore(message,messages.lastChild);
        console.log(data);
        

        }
});
   } 

   // Hand input
   textarea.addEventListener("keydown",function(event){
       if(event.which===13 && event.shiftKey==false){
           socket.emit("input",{
        
            client1:client1.value.trim(),
            client2:client2.value.trim(),
            message:textarea.value.trim()
           });
           textarea.value="";

       }
   })




})();*/
