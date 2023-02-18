
let MongoClient =  require('mongodb').MongoClient;
let url = "mongodb://localhost:27017/";
let express = require("express");
let myapp = express ();
const bodyParser = require('body-parser');
let mysql = require('mysql');
/// connect express 
myapp.listen(7070, "0.0.0.0",function(){
    console.log("Server Running");
    
 })
let client = require("socket.io").listen(6060).sockets;

myapp.use(bodyParser.json());
myapp.use(bodyParser.urlencoded({ extended: true }));
myapp.set("view engine","ejs");
myapp.set("views","views");

myapp.use("/",function (req, resp, next) {

    
resp.setHeader('Access-Control-Allow-Origin', "http://localhost");

// Request methods you wish to allow
resp.setHeader('Access-Control-Allow-Methods', 'GET, POST');

// Request headers you wish to allow
resp.setHeader('Access-Control-Allow-Headers', 'X-Requested-With,content-type');
resp.setHeader('Access-Control-Allow-Credentials', true);
resp.status(200);
next();
      })

// FOR LAST SELLER'S MESSAGE
myapp.post("/ge_lates_message",function (req,resp,next){
if (typeof(req.body.sellerid) != "undefined" || typeof(req.body.get_lates_message) != "undefined" || typeof(req.body.clientid !="undefined")){
   MongoClient.connect(url, function(err, db) {
    if (err){ throw err;}
    var dbo = db.db("shop")
    var chat = dbo.collection("chats");
        chat.find({
            sallerid:req.body.sellerid,
            clienid:req.body.clientid
        }).sort({_id:-1}).limit(1).toArray( function(err2,resp2){
            for(y=0;y<resp2.length ;y++){
               // resp.header("Access-Control-Allow-Origin", "*");
               // resp.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
                resp.status(200).send(resp2[y].message);              
            }
            ;
        }) 
});
}

});

myapp.post("/fetch_mydata",function(req,resp,next){
  if ( typeof(req.body.sellerid) != "undefined" || typeof(req.body.fetch_mydata) != "undefined" || typeof(req.body.clientid) != "undefined"){
        MongoClient.connect(url, function(err, db) {
         if (err){ throw err;}
         var dbo = db.db("shop")
         var chat = dbo.collection("chats");
             chat.find({
                $or:[{sallerid:req.body.sellerid,clienid:req.body.clientid},{sallerid:req.body.clientid,clienid:req.body.sellerid}]
             }).sort({_id:-1}).limit(1).toArray( function(err2,resp2){
                     resp.status(200).send(resp2);
                    
                 
                     
               
             }) 
     });
     }


})




    


var sellers = {};
     // CONNECT TO MONGODB            
     MongoClient.connect(url, function(err, db) {
        if (err){ throw err;}
        var  client1 ;
        var client2;
        var dbo = db.db("shop")
    
        client.on("connection",  function(socket){ 
                         //FOR SELLER
        socket.on("seller_connected",function(seler___id){
            sellers [seler___id] = socket.id;
            console.log("seller_connected: "+seler___id);

        })

       socket.on("request_order",function(em_seler_id){
           var to_selr_id = sellers[em_seler_id];
           console.log(em_seler_id);
           client.to(to_selr_id).emit("send_notification","1")
       })
    


        var chat = dbo.collection("chats");

               // START  FETCH SALLER'S CLIENTS FOR CHATS 
       socket.on("seller_chat", function(selerid){
            
        chat.find({
               sallerid:selerid.sellerid
               
           }).sort({_id:1}).toArray( function(err,resp){

               if(err){
                   throw err;
               }
               var result =[]  
               var id=[];
               var messages=[];
               for(i=0;i<resp.length ;i++){
               if(id.indexOf(resp[i].clienid)==-1)id.push(resp[i].clienid);
               }
               socket.emit("output_seller_clients",id)
           
           });
       }); 

           socket.on("myuser", function(data){  // MYUSER
          var sallerid =  data.sallerid;
          var clienid = data.clienid;
           chat.find({
            $or:[{sallerid:sallerid,clienid:clienid},{sallerid:clienid,clienid:sallerid}]
            
        }).sort({_id:1}).toArray(function(err,resp){
    
            if(err){
                throw err;
            }
            socket.emit("output1",resp);
    
        });

        })   // END MYUSER


        
        socket.on("myuser3", function(data){   // MYUSER 3
            var sallerid =  data.sallerid;
            var clienid = data.clienid;
             chat.find({
              $or:[{sallerid:sallerid,clienid:clienid},{sallerid:clienid,clienid:sallerid}]
              
          }).sort({_id:1}).toArray(function(err,resp){
      
              if(err){
                  throw err;
              }
              socket.emit("output3",resp);
      
          });
  
  
          })  // END/ MYUSER 3




socket.on("senddata",function(data){
    // Insert Messages 
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var dateTime = date+' '+time;
    var clientid = data.clientid;
    var sellerid = data.sellerid;
    var msg = data.message;
    chat.insertOne({message:msg,sallerid:sellerid,clienid:clientid,date:dateTime,from_:data.from_},function(){
        client.emit("receive_msg",{clientid:clientid,sellerid:sellerid});
        console.log("insert");
    });


})


/*socket.on("reuqest_data",function(data){
 
   
var sallerid =  data.sellerid;
var clienid = data.clientid;
console.log("onrequest");
chat.find({
    $or:[{sallerid:sallerid,clienid:clienid},{sallerid:clienid,clienid:sallerid}]
    
}).sort({_id:-1}).limit(1).toArray(function(err,resp){

    if(err){
        throw err;
    }
    client.emit("fetchdata",resp);



});


}) */



                //START MONGO FOR CLIENT
                var chat = dbo.collection("chats");
                          // START  FETCH SALLER'S CLIENTS FOR CHATS 
            socket.on("client_chat", function(clientd){
            chat.find({
                clienid:clientd.clientid
                    
                }).sort({_id:1}).toArray( function(err,resp){
    
                    if(err){
                        throw err;
                    }
                    var result =[]  
                    var id=[];

                    for(i=0;i<resp.length ;i++){
                    if(id.indexOf(resp[i].sallerid)==-1)id.push(resp[i].sallerid);
                    }

                    var result =  {"id":id};
                    socket.emit("output_client_saller",id)
                    socket.emit("output_client_saller_for_android",result);
                  
                   
                
                });
    
                
                
    
            });

                socket.on("my_client_", function(data){  // MYUSER
                var sallerid =  data.sallerid+"";
                var clienid = data.clienid+"";
                chat.find({
                $or:[{sallerid:sallerid,clienid:clienid},{sallerid:clienid,clienid:sallerid}]
                
            }).sort({_id:1}).toArray(function(err,resp){
        
                if(err){
                    throw err;
                }
                socket.emit("output1_for_client",resp);
                
                
            });
    
            })   // END MYUSER
    
    
            
            socket.on("myuser_client_3", function(data){   // MYUSER 3
                var sallerid =  data.sallerid;
                var clienid = data.clienid;
                chat.find({
                    $or:[{sallerid:sallerid,clienid:clienid},{sallerid:clienid,clienid:sallerid}]
                    
                }).sort({_id:1}).toArray(function(err,resp){
            
                    if(err){
                        throw err;
                    }
                    socket.emit("output3_for_client",resp);
            
                });
        
        
                })  // END/ MYUSER 3
    
 
   
    


    });
    
    


    }); 

























 

