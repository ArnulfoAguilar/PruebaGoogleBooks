<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">

                <a  id="enviarEmail" href="{{ route('EmailDeudores') }}" class="btn btn-primary">Deudores</a>
                <div class="title m-b-md">
                    Talvez funciona
                </div>
        
                <div class="form-group">
                    <label for="examplebook">Nombre de Libro</label>
                    <input type="text" class="form-control" id="examplebook" aria-describedby="emailHelp" placeholder="Ingresa el libro a buscar">
                    <small id="emailHelp" class="form-text text-muted">Pueden aparecer muchas opciones en los libros.</small>
                </div>
                <button  id="button" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
                <div id="results" class="card-columns" >
                </div>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-3.4.0.js"
  integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script>
    function bookSearch(){
        console.log("Esta funcion sirve!")
        var search = document.getElementById('examplebook').value
        document.getElementById('results').innerHTML=""

        $.ajax({
            url:    "https://www.googleapis.com/books/v1/volumes?q=" + search,//+"&maxResults=40",
            dataType:   "json",

            success: function(data){
                console.log(data)
                for(i=0; i<data.items.length; i++){
                    //document.getElementById('results').innerHTML +=
                    results.innerHTML +=
                   ' <div class="card" style="width: 18rem;">'+
  '<img src="'+data.items[i].volumeInfo.imageLinks.thumbnail+'" class="card-img-top " style="max-width:250px;max-height: 250px;display: block;' +
                        '  margin-left: auto;' +
                        '  margin-right: auto;" >'+
  '<div class="card-body">'+
    '<h5 class="card-title">'+data.items[i].volumeInfo.title+'</h5>'+
    '<p class="card-text">'+data.items[i].volumeInfo.authors+'</p>'+
    '<a href="#" class="btn btn-primary">Clic</a>'+
  '</div>'+
'</div>'
                   //console.log(data.items[i].volumeInfo.title)
                }
            },
            type: 'GET'
        });
        
    }
    document.getElementById('button').addEventListener('click', bookSearch, false)
    </script>

    </body>
</html>
