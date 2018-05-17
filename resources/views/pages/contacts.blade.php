@extends('layouts.app')

@section('content')
    <div class="contact">
        <div class="container">
            <p class="title">Свяжитесь с нами</p>
            <h3>Можете предложить свою помощь?</h3>

            <p><i class="fa fa-map-marker"></i>Краматорск, Донецкая область</p>
            <p><i class="fa fa-phone"></i> +38 050 705 01 76 &nbsp; +38 050 705 01 76</p>

            <!-- Form -->
            <form action="contact.php" method="post">

                <input type="text" name="name" placeholder="Ваше имя *">
                <input type="text" name="email" placeholder="Ваш Email *">
                <textarea name="message" placeholder="Ваше сообщение *"></textarea>

                <button name="submit" type="submit">Отправить сообщение</button>

            </form>
            <!-- Form Ends! -->

            <!-- Do Not Remove! -->
            <p class="error"></p>
            <p class="message"></p>
            <!-- Do Not Remove! Ends! -->

        </div>
    </div>
@endsection
