const fs = require('fs');
const http = require('http');
const port = 3000;


const renderHtml = (path, res) =>{
    fs.readFile(path, (err,  data)=>{
        if(err){
            res.writeHead(404);
            res.write('Error : file not found');
        }else{
            res.write(data);
        }
        res.end();
    })
  }
  
http.createServer((req, res)=>{
    res.writeHead(200, {
    'Content-Type': 'text/plain'
  });
  
  const url = req.url;
  // if(url === '/about'){
  //     renderHtml('./about.html', res)
  // }else if(url === '/contact'){
  //     renderHtml('./contact.html', res);
  // }else{
  //     // res.write('Hello word');
  //     renderHtml('./index.html', res);
  // }
  switch(url){
        case '/about':
            renderHtml('./about.html', res)
        break;
        case '/contact':
            renderHtml('./contact.html', res);
        break;
        default:
            renderHtml('./index.html', res);
        break;
  }
}).listen(port, ()=>{
    console.log(`Server listen port ${port}..`)
})