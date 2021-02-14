<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="src/assets/css/home_styles.css">

    <title>Todo</title>
  </head>
  <body onload="getData()">
    <div class="container">
        <div class="text-center">
            <h1>todos</h1>
        </div>
        
        <div class="inner-addon left-addon">
            <i class="fa fa-angle-down change-visibility"></i>
            <input onkeypress="return onKeyPressInsert(event)" type="text" class="form-control input-title" id="input-title" placeholder="What needs to be done?" autofocus>
        </div>
        <div class="list-body">
            <div id="data"></div>
            
            <div class="text-center footer change-visibility">
                <div class="row">
                    <div class="col-md-3">
                        <span class="float-left" id="item-count"></span>
                    </div>
                    <div class="col-md-6">
                        <span>
                            <span class="status"><label><input type="radio" name="current-status" onclick="getData()" value="All" checked><span>All</span></label></span>
                            <span class="status"><label><input type="radio" name="current-status" onclick="getData()" value="Active"><span>Active</span></label></span>
                            <span class="status"><label><input type="radio" name="current-status" onclick="getData()" value="Completed"><span>Completed</span></label></span>
                        </span>
                    </div>
                    <div class="col-md-3">
                        <span class="float-right" id="item-clear"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="src/assets/js/home_script.js"></script>
    
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>