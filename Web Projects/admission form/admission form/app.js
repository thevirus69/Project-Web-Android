const express = require('express');
const path = require('path');


const app = express();

const port = 80;




app.set('view engine' , 'pug');

app.set('views', path.join('views'));

app.use(express.urlencoded());

app.get('/', (req,res)=>{
    res.render('form.pug');
})

app.post('/',(req,res)=>{
    console.log(req.body);
    let params = { 'title': 'hello harsh'}
    res.render('form.pug',params);
   
})

app.listen(port , ()=>{
   console.log(`Application has been started at port ${port}`);
})