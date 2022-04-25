<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>LOGIN</title>
  </head>
  <body>
    <div class="container mt-5 justify-content-center">
      <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
          <div class="card shadow rounded" style="width: 50%;">
            <div class="card-body">
              <h5 class="card-title text-center mb-5">Cek Resi</h5>

              <form action="/test" method="post">@csrf
                <div class="d-grid gap-3">
                  <div class="form-group row">
                    <label class="d-none d-sm-block col-sm-3 col-form-label">
                      Lokasi asal
                    </label>
                    <input type="text" name='destination'>
                  </div>
                  <div class="form-group row">
                    <label class="d-none d-sm-block col-sm-3 col-form-label">
                      Lokasi tujuan
                    </label>
                    <input type="text" name='origin'>
                  </div>
                  <div class="form-group row">
                    <label class="d-none d-sm-block col-sm-3 col-form-label">
                      Kurir
                    </label>
                    <div class="col-sm-9 col-xs-12">
                      <select name="courier"  multiple
                      class="multiselect" placeholder="Pilih Kurir" >
                        <option value="jne" token="JNE" >Jalur Nugraha Ekakurir (JNE)</option>
                        <option value="tiki" token="TIKI" >Citra Van Titipan Kilat (TIKI)</option>
                        <option value="anteraja" token="ANTERAJA" >AnterAja (ANTERAJA)</option>
                        <option value="pcp" token="PCP" >PCP Express (PCP)</option>
                        <option value="spx" token="SPX" >Shopee Express (SPX)</option>
                        <option value="pos" token="POS" >POS Indonesia (POS)</option>
                        <option value="lion" token="LION" >Lion Parcel (LION)</option>
                        <option value="ninja" token="NINJA" >Ninja Xpress (NINJA)</option>
                        <option value="ide" token="IDE" >ID Express (IDE)</option>
                        <option value="sicepat" token="SICEPAT" >SiCepat Express (SICEPAT)</option>
                        <option value="sap" token="SAP" >SAP Express (SAP)</option>
                        <option value="ncs" token="NCS" >Nusantara Card Semesta (NCS)</option>
                        <option value="rex" token="REX" >Royal Express (REX)</option>
                        <option value="sc" token="SC" >Sentral Cargo (SC)</option>
                        <option value="wahana" token="WAHANA" >Wahana Prestasi Logistik (WAHANA)</option>
                        <option value="jnt" token="JNT" >J&amp;T Express (JNT)</option>
                        <option value="jet" token="JET" >JET Express (JET)</option>
                        <option value="dse" token="DSE" >21 Express (DSE)</option>
                        <option value="first" token="FIRST" >First Logistics (FIRST)</option>
                        <option value="idl" token="IDL" >IDL Cargo (IDL)</option>
                        <option value="rpx" token="RPX" >RPX Holding (RPX)</option>
                        <option value="pandu" token="PANDU" >Pandu Logistics (PANDU)</option>
                        <option value="pahala" token="PAHALA" >Pahala Kencana Express (PAHALA)</option>
                        <option value="slis" token="SLIS" >Solusi Ekspres (SLIS)</option>
                        <option value="star" token="STAR" >Star Cargo (STAR)</option>
                      </select>
                    </div>
                  </div>
      
                  <div class="form-group row">
                    <label class="d-none d-sm-block col-sm-3 col-form-label">
                      Berat
                    </label>
                    <div class="col-sm-9 col-xs-12">
                      <div class="input-group">
                        <input
                          type="number"
                          class="form-control"
                          placeholder="Masukkan berat (dalam Kg)"
                          id="berat"
                          min="0"
                          name="weight"
                          required
                        />
                        <span class="input-group-text">Kg</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="d-none d-sm-block col-sm-3 col-form-label"></label>
                    <div class="d-grid col-sm-9 col-xs-12">
                      <button type="submit" class="btn btn-md btn-primary">
                        Cek
                      </button>
                    </div>
                  </div>
                </div>
              </form>
                {{-- <form id="cek-ongkir-form"> --}}
                  {{-- <div class="d-grid gap-3">
                    <div class="form-group row">
                      <label class="d-none d-sm-block col-sm-3 col-form-label">
                        Lokasi asal
                      </label>
                      <select class="form-control autocomplete " name="origin" data-noresults-text="Lokasi tidak ditemukan" autocomplete="off" placeholder="Pilih lokasi asal" required></select>
                    </div>
                    <div class="form-group row">
                      <label class="d-none d-sm-block col-sm-3 col-form-label">
                        Lokasi tujuan
                      </label>
                      <select class="form-control autocomplete " name="destination" data-noresults-text="Lokasi tidak ditemukan" autocomplete="off" placeholder="Pilih lokasi tujuan" required></select>
                    </div>
                    <div class="form-group row">
                      <label class="d-none d-sm-block col-sm-3 col-form-label">
                        Kurir
                      </label>
                      <div class="col-sm-9 col-xs-12">
                        <select name="courier"  multiple
                        class="multiselect" placeholder="Pilih Kurir" >
                          <option value="jne" token="JNE" >Jalur Nugraha Ekakurir (JNE)</option>
                          <option value="tiki" token="TIKI" >Citra Van Titipan Kilat (TIKI)</option>
                          <option value="anteraja" token="ANTERAJA" >AnterAja (ANTERAJA)</option>
                          <option value="pcp" token="PCP" >PCP Express (PCP)</option>
                          <option value="spx" token="SPX" >Shopee Express (SPX)</option>
                          <option value="pos" token="POS" >POS Indonesia (POS)</option>
                          <option value="lion" token="LION" >Lion Parcel (LION)</option>
                          <option value="ninja" token="NINJA" >Ninja Xpress (NINJA)</option>
                          <option value="ide" token="IDE" >ID Express (IDE)</option>
                          <option value="sicepat" token="SICEPAT" >SiCepat Express (SICEPAT)</option>
                          <option value="sap" token="SAP" >SAP Express (SAP)</option>
                          <option value="ncs" token="NCS" >Nusantara Card Semesta (NCS)</option>
                          <option value="rex" token="REX" >Royal Express (REX)</option>
                          <option value="sc" token="SC" >Sentral Cargo (SC)</option>
                          <option value="wahana" token="WAHANA" >Wahana Prestasi Logistik (WAHANA)</option>
                          <option value="jnt" token="JNT" >J&amp;T Express (JNT)</option>
                          <option value="jet" token="JET" >JET Express (JET)</option>
                          <option value="dse" token="DSE" >21 Express (DSE)</option>
                          <option value="first" token="FIRST" >First Logistics (FIRST)</option>
                          <option value="idl" token="IDL" >IDL Cargo (IDL)</option>
                          <option value="rpx" token="RPX" >RPX Holding (RPX)</option>
                          <option value="pandu" token="PANDU" >Pandu Logistics (PANDU)</option>
                          <option value="pahala" token="PAHALA" >Pahala Kencana Express (PAHALA)</option>
                          <option value="slis" token="SLIS" >Solusi Ekspres (SLIS)</option>
                          <option value="star" token="STAR" >Star Cargo (STAR)</option>
                        </select>
                      </div>
                    </div>
        
                    <div class="form-group row">
                      <label class="d-none d-sm-block col-sm-3 col-form-label">
                        Berat
                      </label>
                      <div class="col-sm-9 col-xs-12">
                        <div class="input-group">
                          <input
                            type="number"
                            class="form-control"
                            placeholder="Masukkan berat (dalam Kg)"
                            id="berat"
                            min="0"
                            name="weight"
                            required
                          />
                          <span class="input-group-text">Kg</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="d-none d-sm-block col-sm-3 col-form-label"></label>
                      <div class="d-grid col-sm-9 col-xs-12">
                        <button type="submit" class="btn btn-md btn-primary">
                          Cek
                        </button>
                      </div>
                    </div>
                  </div>
                </form> --}}
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <script src="jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
      $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
 
    </script>
    
    <script type="text/javascript">
      function init() {
          $('.autocomplete').autoComplete({
              minLength: 1,
              formatResult: function(item) {
                  return {
                      value: item.kecamatan_id,
                      text: item.kecamatan_name + ', ' + item.kabupaten_name
                  }
              },
              events: {
                  search: function(query, callback) {
                      $.ajax('https://cekresi.co.id/data/subdistricts.json').done(function(res) {
                          callback(
                              res.data.filter(
                                  (item) =>
                                  item.kecamatan_name.toLowerCase().includes(query.toLowerCase()) ||
                                  item.kabupaten_name.toLowerCase().includes(query.toLowerCase())
                              )
                          )
                      })
                  }
              }
          })
          
          $(".multiselect").multiselect({
              maxHeight: 200,
              enableFiltering: true,
              filterPlaceholder: 'Cari kurir...',
              enableCaseInsensitiveFiltering: true,
              buttonClass: "form-control text-left text-muted",
              optionClass: () => 'pl-0',
              buttonTextAlignment: 'left',
              buttonContainer: "<div class='w-100'></div>",
              templates: {
                  button: '<button type="button" class="multiselect" data-toggle="dropdown"><span class="multiselect-selected-text"></span></button>',
              },
              buttonText: function(options, select) {
                  if (options.length === 0) {
                      return 'Pilih kurir';
                  } else {
                      var labels = [];
                      options.each(function() {
                          if ($(this).attr('token') !== undefined) {
                              labels.push($(this).attr('token'));
                          } else {
                              labels.push($(this).html());
                          }
                      });
                      return labels.join(', ') + '';
                  }
              }
          });
          $('#cek-ongkir-form').submit(function(e) {
              e.preventDefault()
              const data = {
                  origin: $("input[name='origin']").val(),
                  destination: $("input[name='destination']").val(),
                  courier: $("select[name='courier']").val(),
                  weight: $("input[name='weight']").val()
              }
              const submitButton = $(this).find('button[type=submit]')
              setLoading(submitButton)
    
              $('#cek-ongkir-result').html('')
              const headers = {"x-api-key":"8d2123304016b90d9d5ca25587beaccab75c3541ddbace6de56008b2c666e8b8","referer":"https://cekresi.co.id/"};
              if (getParentUrl()) headers['x-origin'] = getParentUrl();
              const widgetQuery = "";
    
              $.ajax('https://cekresi.co.id/api/ongkir/dom' + widgetQuery, {
                  method: 'POST',
                  processData: false,
                  contentType: 'application/json',
                  headers,
                  data: JSON.stringify(data),
                  complete: function(res) {
                      setLoading(submitButton, false)
                  },
                  
                  success: function(res) {
                    console.log('res',res)
                      $('#cek-ongkir-result')
                          .get(0)
                          .scrollIntoView()
                      $('#cek-ongkir-result').html(res)
                  }
              })
          })
      }
 
    </script>
        <script src="https://cekresi.co.id/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <script src="https://cekresi.co.id/assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="https://cekresi.co.id/assets/vendor/purecounter/purecounter.js"></script>
        <script src="https://cekresi.co.id/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/helper.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.4/dist/latest/bootstrap-autocomplete.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard-polyfill/3.0.3/main/clipboard-polyfill.js"></script>
           <script type="text/javascript">
                init();
            </script>

<div id="cek-ongkir-result" class="mt-4">
  {{-- <section>
    <div class="container d-flex justify-content-center">
      <div class="col-12">
        <header class="section-header">
          <h2>Hasil Cek Ongkir</h2>
        </header>
  
        <div class="row">
          <div class="col-sm-12 mb-3">
            <div class="card shadow border-none">
              <div class="card-body p-4 px-md-5 px-4">
                <div>
                  <h6 class="text-center result-title">
                    <strong>Cengkareng, Jakarta Barat</strong> ke
                    <strong> Bandung, Serang</strong>
                    @ <strong> 1 Kg</strong>
                  </h6>
                  <div class="table-responsive">
                    
                    <table class="table align-items-center table-flush mb-4">
                      <thead>
                        <tr class="result-courier">
                          <td colspan="4">
                            <strong>TIKI</strong>
                            <br>Citra Van Titipan Kilat
                          </td>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <tr>
                          <td></td>
                          <td>
                            <div class="result-label">Layanan</div>
                            <strong>ECO</strong>
                            <span v-if="cost.description">
                              - Economy Service</span>
                          </td>
                          <td class="text-right">
                            <div class="result-label">Estimasi Pengiriman</div>
                            3-4 Hari
                          </td>
                          <td class="text-right result-cost align-middle">
                            <strong>Rp 13.000</strong>
                          </td>
                        </tr>
                        
                      </tbody>
                    </table>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  
  </body>
</html>