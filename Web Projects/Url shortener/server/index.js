const express = require('express')
const shortUrl = require('node-url-shortener')
require("dotenv").config()
var cors = require('cors')
var path = require('path')
var app = express()
 
app.use(cors())
app.use(express.json())
app.use(express.static(path.resolve(__dirname, "./client/build")));

const PORT = process.env.PORT || 3001

app.post("/geturl",(req,res)=>{
    const url=req.body.data;
    console.log(url);
    shortUrl.short(url, function(err, myurl){
        console.log(myurl);
        res.send(myurl);
});
});
app.get("*", function (request, response) {
    response.sendFile(path.resolve(__dirname, "./client/build", "index.html"));
  });
  
app.post('/',(req,res)=>{
    console.log("got a shock");
    res.json({data:"hello"});
})
app.listen(PORT,()=>{console.log(`Server started at port ${PORT}`)});