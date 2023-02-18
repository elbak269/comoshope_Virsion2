$(document).ready( function(){
 //   clientid_for_loop
  var messages = document.getElementById("message");
  var textarea = document.getElementById("textarea");

  let socket = io.connect("http://localhost:6060");
  var sellerid_for_loop ="";
  var clientid =  $("#client_id").val().trim();


  socket.emit("client_chat",{
  clientid:clientid.trim()
});



create_side_bar_left();


textarea.addEventListener("keydown",function(event){

if(event.which===13 && event.shiftKey==false){

  var from_ =  "client";
  socket.emit("senddata",{clientid:clientid,sellerid:sellerid_for_loop,from_:from_,message:textarea.value.trim()});

  /*  socket.emit("input",{
     sallerid:sellerid_for_loop,
     clienid:clientid,
     message:textarea.value.trim(),
     from_:"client"
   });*/
    textarea.value="";

}

}); //END SEND MESSAGE

socket.on("receive_msg",function(rcsvdata){
  if(rcsvdata.clientid == clientid && rcsvdata.sellerid == sellerid_for_loop){
    socket.emit("reuqest_data",{sellerid:rcsvdata.sellerid,clientid:rcsvdata.clientid});
    fetch_mydata(sellerid_for_loop,clientid);

  }
});





function mylang(word){
   var dat;
  $.ajax({
    dataType: "json",
    async:false,
    url:"admin/includes/languages/english.php",
    method:"GET",
    data:{lang:word},
    success:function(data){
      dat =  data;
    }
    })
    return dat;
}


function get_count_orders(count_orders,sellerid){
  $.ajax({
    dataType: "json",
    async:false,
    url:"get_data_info.php",
    method:"POST",
    data:{count_orders:count_orders,sellerid:sellerid},
    success:function(data){

      if (data.completed_orders > 1) {
        $("#complete_order_id").text(data.completed_orders+" "+mylang("orders"));
      }else{
          $("#complete_order_id").text(data.completed_orders+" "+mylang("order"));
      }

      if (data.canceled_order > 1) {
        $("#cancel_order_id").text(data.canceled_order+" "+mylang("orders"));
      }else{
          $("#cancel_order_id").text(data.canceled_order+" "+mylang("order"));
      }
      $("#user_nam").text("");
      $("#user_nam").append(data.username)
      if(data.avatar==null || data.avatar==""){
        $("#img_big_avat").attr("src","theme/image/avatar.png");
      }else{
        $("#img_big_avat").attr("src",data.avatar);
      }

    }
    })
}

function get_count_orders_for_sid_bar_left(get_count_orders_for_sid_bar_left,msellerid){
  $.ajax({
    dataType: "json",
    async:false,
    url:"get_data_info.php",
    method:"POST",
    data:{get_count_orders_for_sid_bar_left:get_count_orders_for_sid_bar_left,sellerid:msellerid},
    success:function(data){
    //  $("#imgavatid"data).attr("src",data.avatar);
    if(data.avatar==null || data.avatar==""){
      $("#imgavatid"+msellerid).attr("src","theme/image/avatar.png");
    }else{
       $("#imgavatid"+msellerid).attr("src",data.avatar);
    }

     $("#user_id"+msellerid).text(data.username);

    }
    })
}




          // IF DIV CLICKED
function if_div_clecked(){
  $(".div_avat").on("click",function(){
  var seleid = $(this).data("clientdiv")+"";
  sellerid_for_loop = seleid.trim();
  $("#message").empty();

  get_count_orders("count_orders",sellerid_for_loop)
   socket.emit("myuser_client_3",{
     sallerid:seleid,
     clienid:clientid.trim()
   });


   //CALLBACK FUNCTION
   (function () {
       if(socket !== undefined){
           //Handle Output
           socket.on("output3_for_client",function(data3){
           $("#message").empty();
           for(var ii =0; ii < data3.length; ii++){
               // build output message div

             if(data3[ii].from_== "client"){
               var clearflot = document.createElement("div");
               clearflot.setAttribute("class","clear");
               var message = document.createElement("div");
               message.setAttribute("class","chat-message messages_di");
               message.setAttribute("id",data3[ii]._id);
               message.setAttribute("data-_id",data3[ii]._id);
               message.textContent =  data3[ii].message;
               messages.appendChild(message);
               messages.appendChild(clearflot);
           messages.insertBefore(message,messages.lastChild);
         }
         else{

           var clearflot = document.createElement("div");
           clearflot.setAttribute("class","clear");
           var message = document.createElement("div");
           message.setAttribute("class","chat-message_left messages_di");
           message.setAttribute("id",data3[ii]._id);
           message.setAttribute("data-_id",data3[ii]._id);
           message.textContent =  data3[ii].message;
           messages.appendChild(message);
           messages.appendChild(clearflot);
       messages.insertBefore(message,messages.lastChild);

         }
           }

           $(".messages_di").click(function(){
          var msg_id =   $(this).data("_id");

           for (var i = 0; i < data3.length; i++) {

             if(data3[i]._id ==msg_id){
               var _date = data3[i].date;
               var mes = data3[i].message;
               $("#"+msg_id).dblclick(function(){
              $(this).text(_date);
               })

               $("#"+msg_id).click(function(){
              $(this).text(mes);
               })
             }
           }
           })
       });
       }
   })(); //END CALLBACK FUNCTION
  })

}





function create_side_bar_left(){
socket.on("output_client_saller",  function(data){
for (var i = 0; i < data.length; i++) {
sellerid_for_loop = data[i];
$("#div____").append('<div data-clientdiv="'+data[i]+'"   class="div_avat"><img id="imgavatid'+data[i]+'"  class="avatar" src="theme/image/avatar.png" alt=""><p id="user_id'+data[i]+'" class="user_avata"><strong> elbak maham </strong></p><p id="mesaag'+data[i]+'" class="text_avata"></p></div>');
get_count_orders_for_sid_bar_left("get_count_orders_for_sid_bar_left",data[i]);
//get_last_messages(clientid_for_loop,sallerid);
get_last_messages(data[i],clientid);

if(i==0){
  get_count_orders("count_orders",sellerid_for_loop)
  socket.emit("my_client_",{
    sallerid:sellerid_for_loop,
    clienid:clientid.trim()
  });
  function first_show (){
       if(socket !== undefined){

           //Handle Output
           socket.on("output1_for_client",function(data){
              $("#message").empty();
           for(var ii =0; ii < data.length; ii++){
               // build output message div
             if(data[ii].from_== "client"){
               var clearflot = document.createElement("div");
               clearflot.setAttribute("class","clear");
               var message = document.createElement("div");
               message.setAttribute("class","chat-message  messages_di");
              message.setAttribute("data-_id",data[ii]._id);
               message.textContent =  data[ii].message;
               message.setAttribute("id",data[ii]._id);
               messages.appendChild(message);
               messages.appendChild(clearflot);
           messages.insertBefore(message,messages.lastChild);

         }
         else{

           var clearflot = document.createElement("div");
           clearflot.setAttribute("class","clear");
           var message = document.createElement("div");
           message.setAttribute("class","chat-message_left messages_di");
           message.setAttribute("id",data[ii]._id);
           message.setAttribute("data-_id",data[ii]._id);
           message.textContent =  data[ii].message;
           messages.appendChild(message);
           messages.appendChild(clearflot);
       messages.insertBefore(message,messages.lastChild);


         }

           }

             $(".messages_di").click(function(){
            var msg_id =   $(this).data("_id");

             for (var i = 0; i < data.length; i++) {

               if(data[i]._id ==msg_id){
                 var _date = data[i].date;
                 var mes = data[i].message;
                 $("#"+msg_id).dblclick(function(){
                $(this).text(_date);
                 })

                 $("#"+msg_id).click(function(){
                $(this).text(mes);
                 })
               }
             }
             })

       });



       }

   }  first_show();
   create_side_bar_left();
}

// IF DIV CLICKED
if_div_clecked();

}

});

}



// GET LATES MESSAGE
function get_last_messages(seller_id,clientid){
var mylink = $("#lick_conn").val();
var get_lates_message = "get_lates_message";
$.ajax({
async:false,
url:mylink+"/ge_lates_message",
method:"post",
data:{sellerid:seller_id,clientid:clientid,get_lates_message:get_lates_message},
success:function(data){
  console.log(data);
$("#mesaag"+seller_id).text(data);
}
})}



function fetch_mydata(seller_id,clientid){

  var mylink = $("#lick_conn").val();
  var fetch_mydata = "fetch_mydata";
    $.ajax({
      async:false,
      url:mylink+"/fetch_mydata",
      method:"post",
      data:{fetch_mydata:fetch_mydata,sellerid:seller_id,clientid:clientid},
      success:function(data3){
        console.log(data3);
      console.log("data");
        if(socket !== undefined){
            for(var ii =0; ii < data3.length; ii++){
                // build output message div
              if(data3[ii].from_== "client"){
                var clearflot = document.createElement("div");
                clearflot.setAttribute("class","clear");
                var message = document.createElement("div");
                message.setAttribute("class","chat-message messages_di");
                message.setAttribute("id",data3[ii]._id);
                message.setAttribute("data-_id",data3[ii]._id);
                message.textContent =  data3[ii].message;
                messages.appendChild(message);
                messages.appendChild(clearflot);
            messages.insertBefore(message,messages.lastChild);
          }
          else{

            var clearflot = document.createElement("div");
            clearflot.setAttribute("class","clear");
            var message = document.createElement("div");
            message.setAttribute("class","chat-message_left messages_di");
            message.setAttribute("id",data3[ii]._id);
            message.setAttribute("data-_id",data3[ii]._id);
            message.textContent =  data3[ii].message;
            messages.appendChild(message);
            messages.appendChild(clearflot);
        messages.insertBefore(message,messages.lastChild);

          }
            }

            $(".messages_di").click(function(){
           var msg_id =   $(this).data("_id");
            for (var i = 0; i < data3.length; i++) {
              if(data3[i]._id == msg_id){
                var _date = data3[i].date;
                var mes = data3[i].message;
                $("#"+msg_id).dblclick(function(){
               $(this).text(_date);
                })

                $("#"+msg_id).click(function(){
               $(this).text(mes);
                })
              }
            }
          });
        }
      }
    });

}




})
