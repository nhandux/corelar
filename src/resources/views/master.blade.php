<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Package NhanDuc</title>
</head>
<body>
    <form style="text-align: center; margin-top: 100px" method="POST">
        @csrf
        <input type="text" name="email" /> <br /><br/>
        <input type="text" name="username" /> <br /><br />
        <button type="submit">Submit</button>
    </form>
</body>
</html>
