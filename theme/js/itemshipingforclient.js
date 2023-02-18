$(document).ready(function(){

var orde = $("#orderinput").val();
var upd = 4;
var url = $("#lick_conn").val();
var product = $("#prodct_id").val();

var client = $("#clint__").val();
var prd_name  = $("#inp_prod_name").val();
$("#prod_nam").text(prd_name);


$.ajax({
  dataType:"json",
  url:"get_data_info.php",
  method:"post",
  data:{get_order_info_client:"get_order_info_client",client:client,product:product,order__id:orde,curency:localStorage.getItem("curency_id")},
  success:function(data){

$("#pr_ce_ND_CURE__").text(data.price+" "+data.curency );
$("#discd_").text(data.discount);
$("#_ship_pric").text(data.Shipr_Price);
$("#order_total").text(data.ordertotal);
$("#amunt_").text(data.amount);
console.log("TTE");

},
error:function(er){
  console.log(er);
}
});

/*

$("#btn_confirm_order").click(function(){
  var expected_date = $("#expected_deliver_da_inp").val();
  var product_id = $("#prodct_id").val();
  var date = new  Date();
  if($("#expected_deliver_da_inp").val() == "" || $("#expected_deliver_da_inp").val() == null){
    $("#alert_delever_success").css("display","block");
    $("#alert_delever_success").removeClass("alert-success");
    $("#alert_delever_success").addClass("alert-danger");
    $("#alert_delever_success").text(mylang("expcted_del_cant_by_empty"));
  }
  else if(new Date(expected_date).getDate() < date.getDate()){
    $("#alert_delever_success").css("display","block");
    $("#alert_delever_success").removeClass("alert-success");
    $("#alert_delever_success").addClass("alert-danger");
    $("#alert_delever_success").text(mylang("date_cant_be_less_than_today"));
  }else{
    $.ajax({
      dataType:"json",
      url:"setdata.php",
      method:"POST",
      data:{ update:upd,order:orde,expected_deli_date:expected_date,productid:product_id},
      success:function(data){

        if (data=="yes") {
          $("#alert_delever_success").css("display","block");
          window.location.hash="#alert_delever_success";
          setTimeout(function(){
            window.location.href="dashboard.php";
          },3000)
        }
        else if (data=="no") {
        $("#alert_delever_success").text(mylang("failedProgress"));
          $("#alert_delever_success").css("display","block");
          $("#alert_delever_success").removeClass("alert-success");
          $("#alert_delever_success").addClass("alert-danger");
          window.location.hash="#alert_delever_success";
        }
      }
    })
  }




})*/


$("#yes_cancel_ord").click(function(){
  var  cancel ="cancel_order";
  var product_id = $("#prodct_id").val();
  var order_id  = $("#order_id").val();

  $.ajax({
    dataType:"json",
    url:"setdata.php",
    method:"POST",
    data:{
      cancelorder:cancel,productid:product_id,orderid:order_id
    },
    success:function(data){
      if (data=="yes") {
        $(".alert_cancel_order").css("display","none");
        $(".cont").css("opacity","1");
        $("#alert_delever_success").text(mylang("successfulPreogress"));
        $("#alert_delever_success").css("display","block");
        $('html, body').animate({
            scrollTop: $("#alert_delever_success").offset().top
        }, 1000);
        setTimeout(function(){
          window.location.href="profile.php";
        },3000)
      }
      else if (data=="no") {
        $(".alert_cancel_order").css("display","none");
        $(".cont").css("opacity","1");

        $("#alert_delever_success").css("display","block");
        $("#alert_delever_success").removeClass("alert-success");
        $("#alert_delever_success").addClass("alert-danger");
        $("#alert_delever_success").text(mylang("failedProgress"));
        $('html, body').animate({
            scrollTop: $("#alert_delever_success").offset().top
        }, 1000);

      }
    }

  })

})


$("#btn_cencel_order").click(function(){
//$(".alert_cancel_order").show(1000);
$(".alert_cancel_order").css("display","flex");
$(".cont").css("opacity",".4");
})

$("#no_cancel_ord").click(function(){
  $(".alert_cancel_order").css("display","none");
  $(".cont").css("opacity","1");
})



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

  let socket = io.connect("http://192.168.1.5:6060");


$("#btn_chat").click(function(){

  var messages = document.getElementById("message");
  var textarea = document.getElementById("textarea");
  var sallerid = document.getElementById("serlerid_inp");
  var clienid = document.getElementById("clientid_inp");

  $("#chat_div").fadeToggle(1000);

  socket.emit("myuser",{
    sallerid:sallerid.value.trim(),
    clienid:clienid.value.trim()
  });
  $("#message").empty();
 function first_show (){
      if(socket !== undefined){

          //Handle Output
          socket.on("output1",function(data){

          for(var i =0; i < data.length; i++){
              // build output message div
            if(data[i].from_ == "client"){
              var clearflot = document.createElement("div");
              clearflot.setAttribute("class","clear");
              var message = document.createElement("div");
              message.setAttribute("class","chat-message messages_di");
              message.setAttribute("id",data[i]._id);
              message.setAttribute("data-_id",data[i]._id);
              message.textContent =  data[i].message;
              messages.appendChild(message);
              messages.appendChild(clearflot);
          messages.insertBefore(message,messages.lastChild);
        }
        else{

          var clearflot = document.createElement("div");
          clearflot.setAttribute("class","clear");
          var message = document.createElement("div");
          message.setAttribute("class","chat-message_left messages_di");
          message.setAttribute("id",data[i]._id);
          message.setAttribute("data-_id",data[i]._id);
          message.textContent =  data[i].message;
          messages.appendChild(message);
          messages.appendChild(clearflot);
      messages.insertBefore(message,messages.lastChild);

        }

          }

          $(".messages_di").click(function(){
         var msg_id =   $(this).data("_id");
          for (var i = 0; i < data.length; i++) {
            if(data[i]._id == msg_id){
              var _date = data3[i].date;
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

  var myurl = $("#lick_conn").val();
;

  // Hand input
  textarea.addEventListener("keydown",function(event){

  if(event.which===13 && event.shiftKey==false){
   var from_ = "client";
    /*  socket.emit("input",{

       sallerid:sallerid.value.trim(),
       clienid:clienid.value.trim(),
       message:textarea.value.trim(),
       from_:"client"

      });
      */
      socket.emit("senddata",{clientid:clienid.value.trim(),sellerid:sallerid.value.trim(),from_:from_,message:textarea.value.trim()});
      textarea.value="";

  }


  })

  socket.on("receive_msg",function(rcsvdata){

console.log(rcsvdata);

    if(rcsvdata.clientid == clienid.value.trim() && rcsvdata.sellerid == sallerid.value.trim()){
      socket.emit("reuqest_data",{sellerid:rcsvdata.sellerid,clientid:rcsvdata.clientid});
      fetch_mydata(sallerid.value.trim(), clienid.value.trim())

    }
  });

})





function fetch_mydata(seller_id,clientid){
  var messages = document.getElementById("message");
  var textarea = document.getElementById("textarea");
  var sallerid = document.getElementById("serlerid_inp");
  var clienid = document.getElementById("clientid_inp");

  var fetch_mydata = "fetch_mydata";
    $.ajax({
      async:false,
      url:url+"/fetch_mydata",
      method:"post",
      data:{fetch_mydata:fetch_mydata,sellerid:seller_id,clientid:clientid},
      success:function(data3){
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
