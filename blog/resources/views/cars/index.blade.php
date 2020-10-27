<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>car lists</h1>
    {{$data['cars_name']}}

    <form action="cars/show" method = "post">
        @csrf
        <input type = "text" name ="username" >
        <input type="text" name="password">
        <input type ="submit" name="submit">


    </form>
</body>
</html>
