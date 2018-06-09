<html>
    <span>Поступила заявка</span>
    <div style="border: 1px solid black">
        <span>Данные пользователя:</span>
        <div> Имя: {{$request->name}}</div>
        <div> Возраст : {{$request->age}}</div>
        <div> Пол : {{$request->sex}}</div>
        <div> Телефон : {{$request->phone}}</div>
        <div> Почта : {{$request->email}}</div>
    </div>
    <div>Сообщение : {{$request->message}}</div>
</html>