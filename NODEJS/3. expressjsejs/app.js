const express = require('express')
const expressLayouts = require('express-ejs-layouts'); //layouting
const app = express()
const port = 3000

// gunakan ejs
app.set('view engine','ejs');

app.use(expressLayouts);

//route
app.get('/', (req, res) => {
// res.sendFile('./index.html', {root:__dirname}) // menggunakan express js
// res.render('index'); // menggunakan ejs

// menggunakan ejs mengirim data array
const mahasiswa = [
    {
        nama: 'misbahulkhoir',
        email:'misbah@gmail.com'
    },
    {
        nama: 'Elma Maula Silva',
        email:'ems@gmail.com'
    }
]

res.render('index', {
                    layout:'layouts/main-layout',
                    nama: 'Misbahul Khoir', 
                    title:'Halaman Home', 
                    mahasiswa}); // menggunakan ejs, kirim vparameter
})

app.get('/about', (req, res) => {
// res.sendFile('./about.html', {root:__dirname})
res.render('about',{ 
                    layout:'layouts/main-layout',
                    title:'Halaman About'}); // menggunakan ejs

})


app.get('/contact', (req, res) => {
// res.sendFile('./contact.html', {root:__dirname})
res.render('contact',{
                    layout:'layouts/main-layout',
                    title:'Halaman Contact'}); // menggunakan ejs
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