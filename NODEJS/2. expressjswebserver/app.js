const express = require('express')
const { route } = require('express/lib/application')
const app = express()
const port = 3000

//route
app.get('/', (req, res) => {
//   res.send('Hello World!')
// res.json({ 
//     nama: 'qbotsista',
//     username:'qbots'
// })
res.sendFile('./index.html', {root:__dirname})
})

app.get('/about', (req, res) => {
res.sendFile('./about.html', {root:__dirname})
})

app.get('/contact', (req, res) => {
res.sendFile('./contact.html', {root:__dirname})
})

// route params
app.get('/produk/:id', (req, res) => {
    res.send('Produk ID : ' + req.params.id)
})

app.get('/produk/:id/kategori/:id_kategori', (req, res) => {
    res.send(`Produk ID : ${req.params.id} <br> Kategori ID : ${req.params.id_kategori}`)
})

// middleware route
app.use('/',(req, res)=>{
    res.status(404);
    res.send('<h1>404 NOT FOUND</h1>')
})
app.listen(port, () => {
  console.log(`Example app listening on port http://localhost:${port}`)
})