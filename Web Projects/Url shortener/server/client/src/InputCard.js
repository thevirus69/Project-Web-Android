import { useState } from "react";
import axios from "axios";

function InputCard(){
    const [data,setdata]=useState('');
      const [btntext,setbtntsxt]=useState('Click Here');
async function senddata(){
      
       if(btntext==="Click Here"){
        axios('/geturl', {
          method: 'POST',
          headers: {
            'Access-Control-Allow-Origin' : '*',
            'content-type': 'application/json',
          },
          data:{data},
        }).then((val)=>{
          setdata(val.data);
          setbtntsxt('Copy to Clipboard')
       }).catch(err=>console.log(err)); 
       }else{
         
        try {
          await navigator.clipboard.writeText(data);
          console.log('Page URL copied to clipboard');
        } catch (err) {
          console.error('Your browser has trouble in copying to clipboard, kindy copy them manually.');
        }
         setdata('');
         setbtntsxt('Click Here');
         alert("Text copied to clipboard");
       }
       
    }
   return (<div>
        
        <input type="text" id="urltext" name="url" value={data} placeholder="Enter your URL here..." autoComplete="off" onChange={e=>setdata(e.target.value)}/>
        <br/>
        <button type="submit" onClick={senddata} >{btntext}</button>

   </div>);

      
    

}

export default InputCard;