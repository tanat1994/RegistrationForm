<html>
    <head>
        <title>Laravel</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>

        <div class="container">
            <div class="row col-md-5">
                <h2>Get Request</h2>
                <button type="button" class="btn btn-warning" id="getRequest">getRequest</button>
            </div>

            <div class="row col-md-5">
                <h2>Register Form</h2>
                <form id="register" action="#">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <label for="firstname"></label>
                    <input type="text" id="firstname" class="form-control">
                    
                    <label for="lastname"></label>
                    <input type="text" id="lastname" class="form-control">

                    <input type="submit" value="Register" class="btn btn-primary">
                </form>
            </div>
        </div>

        <div id="getRequestData">
        </div>

        <div id="postRequestData">
        </div>

        <script 
                type="text/javascript" 
                src="https://code.jquery.com/jquery-3.2.1.js"
                integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
                crossorigin="anonymous">
        </script>
        
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function(){
                $('#getRequest').click(function(){
                    $.get('getRequest', function(data){
                        $('#getRequestData').append(data);
                        console.log(data);
                    });
                });

                $('#register').submit(function(){
                    var fname = $('#firstname').val();
                    var lname = $('#lastname').val();

                    $.post('register', {firstname:fname, lastname:lname}, function(data){
                        console.log(data);
                        $('#postRequestData').html(data);
                    });
                });
            });
            
        </script>

    </body>
</html>