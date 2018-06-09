<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сообщение от пользователя</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<h4>Поступила заявка</h4>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col" colspan="2">Данные пользователя:</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">Имя:</th>
        <td>{{ $request->name }}</td>
    </tr>
    <tr>
        <th scope="row">Возраст:</th>
        <td>{{ $request->age }}</td>
    </tr>
    <tr>
        <th scope="row">Пол:</th>
        <td>{{ $request->sex }}</td>
    </tr>
    <tr>
        <th scope="row">Телефон:</th>
        <td>{{ $request->phone }}</td>
    </tr>
    <tr>
        <th scope="row">Почта:</th>
        <td>{{ $request->email }}</td>
    </tr>
    <tr>
        <th scope="row">Сообщение:</th>
        <td>{{ $request->message }}</td>
    </tr>
    </tbody>
</table>
</body>
</html>