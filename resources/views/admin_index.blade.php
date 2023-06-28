<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> Index </title>
    </head>
    <body>
        
        @foreach ($users as $user)
            <br><hr><br>
            
            <b> name = {{ $user['name'] }} </b> <br>
            phone_number = {{ $user['phone_number'] }} <br>
            email = {{ $user['email'] }} <br>
            national code = {{ $user['national_code'] }} <br>
            addres = {{ $user['addres'] }} <br>
            
            <br>
        @endforeach

    </body>
</html>