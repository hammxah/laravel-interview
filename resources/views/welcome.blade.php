<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    </head>
    <body>
    <div class="p-5 m-5">
        <form action="save" id="info-form" method="POST">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" placeholder="Enter name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Semester</label>
                <input type="text" name="semester" placeholder="Enter semester" class="form-control">
            </div>
            <div class="form-group">
                <label for="">GPA</label>
                <input type="text" name="gpa" placeholder="Enter GPA" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Save Record</button>
        </form>
    </div>


    <script>
        $(function(){
            $('#info-form').submit(function (e) {
                e.preventDefault();
               var action = $(this).attr('action');
               var method = $(this).attr('method');
               var form = $(this);


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


               $.ajax({
                   url: action,
                   type: method,
                   data: form.serialize(),
                   success: function (success) {
                       if(success['status'] == 200){
                           // alert(success['message']);
                       }
                       console.log(success);
                   },
                   error: function (error) {
                       console.log(error);
                   }
               });

            });
        });
    </script>

    </body>
</html>
