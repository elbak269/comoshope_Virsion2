$(document).ready(function(){

var orde = $("#orderinput").val();
var upd = 4;
var url = $("#lick_conn").val();
var curenny = localStorage.getItem("curency_id");

var id_price_  = $("#id_price_").val();
var product    = $("#prodct_id").val();
var seller     = $("#seler___").val();
var order_id   =$("#order_id").val();
var ship_meh = $("#_ship_meth__").val();
var code_for_slef_ship = $("#code_for_slef_ship").val();




$.ajax({
  dataType:"json",
  url:"get_data_info.php",
  method:"post",
  data:{get_order_info:"get_order_info",seller:seller,product:product,order__id:order_id,curency:localStorage.getItem("curency_id")},
  success:function(data){

$("#pr_ce_ND_CURE__").text(data.price+" "+data.curency );
$("#discd_").text(data.discount);
$("#_ship_pric").text(data.Shipr_Price);
$("#order_total").text(data.ordertotal);
$("#amunt_").text(data.amount);


  }
});

$("#btn_return_prod").click(function(){
  var code_or_           = $("#code_or_").val();
  if ($("#code_return_ord").val() == "") {
    $("#alert_delever_success").css("display","block");
    $("#alert_delever_success").removeClass("alert-success");
    $("#alert_delever_success").addClass("alert-danger");
    $("#alert_delever_success").text(mylang("cant_empty_order_return_code"));

    $('html, body').animate({
        scrollTop: $("#alert_delever_success").offset().top
    }, 1000);
    setTimeout(function(){
      $("#code_return_ord").focus();
      $('html, body').animate({
          scrollTop: $("#code_return_ord").offset().top
      }, 1000);

    },3000)

  }else {
    $.ajax({
      url:"setdata.php",
      method:"post",
      data:{check_code_returned_order:"check_code_returned_order",orderid:order_id,orde_co:$("#code_return_ord").val()},
      success:function(data){
        if (data == 1) {
          $.ajax({
            url:"setdata.php",
            method:"post",
            data:{
              confirm_returned_order:"confirm_returned_order",orderid:order_id,productid:$("#prodct_id").val()
            },
            success:function(thi_dat){
              if (thi_dat == 1) {
                $("#alert_delever_success").show();
                $("#alert_delever_success").text(mylang("succfullAccomplished"));
                $('html, body').animate({
                    scrollTop: $("#alert_delever_success").offset().top
                }, 1000);
                setTimeout(function(){
                  location.href="dashboard.php";
                },3000);
              }else{
                $("#alert_delever_success").css("display","block");
                $("#alert_delever_success").removeClass("alert-success");
                $("#alert_delever_success").addClass("alert-danger");
                $("#alert_delever_success").text(mylang("operationFailed"));

                $('html, body').animate({
                    scrollTop: $("#alert_delever_success").offset().top
                }, 1000);

                setTimeout(function(){
                  $('html, body').animate({
                      scrollTop: $("#code_return_ord").offset().top
                  }, 1000);
                },3000);

              }
            }
          })

        }else{
          $("#alert_delever_success").css("display","block");
          $("#alert_delever_success").removeClass("alert-success");
          $("#alert_delever_success").addClass("alert-danger");
          $("#alert_delever_success").text(mylang("operationFailed"));

          $('html, body').animate({
              scrollTop: $("#alert_delever_success").offset().top
          }, 1000);

          setTimeout(function(){
            $('html, body').animate({
                scrollTop: $("#code_return_ord").offset().top
            }, 1000);
          },3000);


      }
    }
      ,
      error:function(er){

        console.log(er);
      }
    });
  }
})

$("#btn_delver_ord").click(function(){
if ($("#order_code").val() == "") {

  $("#alert_delever_success").css("display","block");
  $("#alert_delever_success").removeClass("alert-success");
  $("#alert_delever_success").addClass("alert-danger");
  $("#alert_delever_success").text(mylang("enter_order_code"));

  $('html, body').animate({
      scrollTop: $("#alert_delever_success").offset().top
  }, 1000);

  setTimeout(function(){
    $('html, body').animate({
        scrollTop: $("#order_code").offset().top
    }, 1000);
  },3000);


}else {
  $.ajax({
    url:"setdata.php",
    method:"post",
    data:{check_order_code:"check_order_code",orderid:order_id,order_code:$("#order_code").val()},
    success:function(data){
      console.log(data);
      if (data == "1") {
        $.ajax({
          url:"setdata.php",
          method:"post",
          data:{inser_completed_order:"inser_completed_order",orderid:order_id},
          success:function(mydt){
            if (mydt == "1") {
              $("#alert_delever_success").show();
              $("#alert_delever_success").text(mylang("successfulPreogress"));
              $('html, body').animate({
                  scrollTop: $("#alert_delever_success").offset().top
              }, 1000);

              setTimeout(function(){
                location.href="dashboard.php";
              },2000)

            }else{
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

      }else{
        $("#alert_delever_success").css("display","block");
        $("#alert_delever_success").removeClass("alert-success");
        $("#alert_delever_success").addClass("alert-danger");
        $("#alert_delever_success").text(mylang("order_code_are_not_match"));


        $('html, body').animate({
            scrollTop: $("#alert_delever_success").offset().top
        }, 1000);

        setTimeout(function(){
          $('html, body').animate({
              scrollTop: $("#order_code").offset().top
          }, 1000);
        },3000);
        $("#order_code").focus();

      }

    }

  })
}
})

$("#btn_tuck_number_edit").click(function(){
  if ($("#edit_truck_numer__").val().trim() == "") {
    $("#alert_delever_success").css("display","block");
    $("#alert_delever_success").removeClass("alert-success");
    $("#alert_delever_success").addClass("alert-danger");
    $("#alert_delever_success").text(mylang("enter_tracking_number"));

    $('html, body').animate({
        scrollTop: $("#alert_delever_success").offset().top
    }, 1000);

    setTimeout(function(){
      $('html, body').animate({
          scrollTop: $("#btn_tuck_number_edit").offset().top
      }, 1000);
    },2000)
  }else{
    $.ajax({
      url:"setdata.php",
      method:"post",
      data:{
        edit_truck_num:"edit_truck_num",order_:order_id,truck_number:$("#edit_truck_numer__").val().trim()},
        success:function(data){
          console.log(data);
          if (data == "1" ) {
            $("#alert_delever_success").text(mylang("successfulPreogress"));
            $("#alert_delever_success").show();
            $('html, body').animate({
                scrollTop: $("#alert_delever_success").offset().top
            }, 1000);
          }else{
            $("#alert_delever_success").css("display","block");
            $("#alert_delever_success").removeClass("alert-success");
            $("#alert_delever_success").addClass("alert-danger");
            $("#alert_delever_success").text(mylang("operationFailed"));

            $('html, body').animate({
                scrollTop: $("#alert_delever_success").offset().top
            }, 1000);

          }
        }
    })
  }
})

$("#btn_confirm_order").click(function(){
  var expected_date = $("#expected_deliver_da_inp").val();
  var product_id = $("#prodct_id").val();
  var date = new  Date();
  if($("#expected_deliver_da_inp").val() == "" || $("#expected_deliver_da_inp").val() == null){
    $("#alert_delever_success").css("display","block");
    $("#alert_delever_success").removeClass("alert-success");
    $("#alert_delever_success").addClass("alert-danger");
    $("#alert_delever_success").text(mylang("expcted_del_cant_by_empty"));
    $('html, body').animate({
        scrollTop: $("#alert_delever_success").offset().top
    }, 1000);
    setTimeout(function(){
      $('html, body').animate({
          scrollTop: $("#expected_deliver_da_inp").offset().top
      }, 1000);
      $("#expected_deliver_da_inp").focus();
    })


  }
  /*else if(new Date(expected_date).getDate() < date.getDate()){
    $("#alert_delever_success").css("display","block");
    $("#alert_delever_success").removeClass("alert-success");
    $("#alert_delever_success").addClass("alert-danger");
    $("#alert_delever_success").text(mylang("date_cant_be_less_than_today"));
  } */
  else if ((ship_meh != 3) && $("#truck_numer__").val() =="") {
    $("#alert_delever_success").css("display","block");
    $("#alert_delever_success").removeClass("alert-success");
    $("#alert_delever_success").addClass("alert-danger");
    $("#alert_delever_success").text(mylang("enter_tracking_number"));

    $('html, body').animate({
        scrollTop: $("#alert_delever_success").offset().top
    }, 1000);
  setTimeout(function(){
    $('html, body').animate({
        scrollTop: $("#truck_numer__").offset().top
    }, 1000);
    $("#truck_numer__").focus();
  },2000)

  }
  else{
    $.ajax({
      dataType:"json",
      url:"setdata.php",
      method:"POST",
      data:{ update:upd,order:orde,expected_deli_date:expected_date,productid:product_id,ship_meht_:ship_meh,truck_num:$("#truck_numer__").val()},
      success:function(data){
console.log(data);
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
          $('html, body').animate({
              scrollTop: $("#alert_delever_success").offset().top
          }, 1000);
          //window.location.hash="#alert_delever_success";
        }
      }
    })
  }




})


$("#btn_cencel_order").click(function(){
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
      $("#alert_delever_success").css("display","block");
      window.location.hash="#alert_delever_success";
      setTimeout(function(){
        window.location.href="dashboard.php";
      },3000)
    }
    else if (data=="no") {

      $("#alert_delever_success").css("display","block");
      $("#alert_delever_success").removeClass("alert-success");
      $("#alert_delever_success").addClass("alert-danger");
      window.location.hash="#alert_delever_success";
    }
  }

})


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


$("#btn_chat").click(function(){

  var messages = document.getElementById("message");
  var textarea = document.getElementById("textarea");
  var sallerid = document.getElementById("client1");
  var clienid = document.getElementById("client2");

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
            if(data[i].from_ == "seller"){
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

  var myurl = $("#lick_conn").val();


  // Hand input
  textarea.addEventListener("keydown",function(event){

  if(event.which===13 && event.shiftKey==false){
    var from_ ="seller";

socket.emit("senddata",{clientid:clienid.value.trim(),sellerid:sallerid.value.trim(),from_:from_,message:textarea.value.trim()});
textarea.value="";

/*    socket.emit("input",{

   sallerid:sallerid.value.trim(),
   clienid:clienid.value.trim(),
   message:textarea.value.trim(),
   from_:"seller"

 });*/

  }
  })

  socket.on("receive_msg",function(rcsvdata){
    if(rcsvdata.sellerid == sallerid.value.trim()  && rcsvdata.clientid == clienid.value.trim()){
      socket.emit("reuqest_data",{sellerid:rcsvdata.sellerid,clientid:rcsvdata.clientid});

      fetch_mydata(sallerid.value.trim(),clienid.value.trim());
    }
  });

})



// fetch data after insert

function fetch_mydata(seller_id,clientid){
  var messages = document.getElementById("message");
  var textarea = document.getElementById("textarea");
  var sallerid = document.getElementById("client1");
  var clienid = document.getElementById("client2");

  var fetch_mydata = "fetch_mydata";
    $.ajax({
      async:false,
      url:url+"/fetch_mydata",
      method:"post",
      data:{fetch_mydata:fetch_mydata,sellerid:seller_id,clientid:clientid},
      success:function(data3){
        console.log(data3);
        if(socket !== undefined){
            for(var ii =0; ii < data3.length; ii++){
                // build output message div
              if(data3[ii].from_== "seller"){
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
});
