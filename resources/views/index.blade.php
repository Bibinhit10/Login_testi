<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> inedx </title>
    </head>
    <body>
        <h1> Hello! </h1>
        

        <form action="" method="post">
            {{ csrf_field() }}

            
            @foreach ($results as $result)
                name : <input type="text" value="{{ $result['name'] }}" name="name" id="name" class="form-control rounded-0 border-left-0" placeholder="Name"><br>
                email : <input type="text" value="{{ $result['email'] }}" name="email" id="email" class="form-control rounded-0 border-left-0" placeholder="email"><br>
                code meli : <input type="text" value="{{ $result['national_code'] }}" name="national_code" id="national_code" class="form-control rounded-0 border-left-0" placeholder="Code Meli"><br>
                addres : <input type="text" value="{{ $result['addres'] }}" name="addres" id="addres" class="form-control rounded-0 border-left-0" placeholder="addres"><br>
        
            @endforeach
            @if ($errors->any())
                <div class="mt-3 text-center alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                
            <input type="submit" name="submit" value="submit">

        </form>

    </body>
    
</html>