@extends('layouts.main')

@section('content')
	<style>
		.table_contacts {
		  font-size: 16px;
		  width: 640px;
		  text-align: left;
		  border-collapse: collapse;
		  margin-bottom: 30px;
		}
		.table_contacts th {
		  color: #EDB749;
		  padding: 12px 17px;
		}
		.table_contacts td {
		  color: $fff;
		  padding: 7px 17px;
		}
	</style>
	
    <div class="contact">
        <div class="container">
          <h3>Наши контакты</h3>

			<table class="table_contacts">
				<tr>
					<th class="col-xs-3">ФИО</th>
					<th class="col-xs-3">Адрес</th>
					<th class="col-xs-2">Email</th>
					<th class="col-xs-1">Телефон</th>
				</tr>
				@foreach ($contacts as $contact)
					<tr>
						<td>{{ $contact->name }}</td>
						<td>{{ $contact->address }}</td>
						<td>{{ $contact->email }}</td>
						<td>{{ $contact->phone }}</td>
					</tr>
				@endforeach
			</table>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d42107.88582455715!2d37.51942211496557!3d48.72950481015726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40df97a4c0ea9b9b%3A0x6cfddec1592678ec!2z0JrRgNCw0LzQsNGC0L7RgNGB0LosINCU0L7QvdC10YbQutCw0Y8g0L7QsdC70LDRgdGC0Yw!5e0!3m2!1sru!2sua!4v1527063704649" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

            <h3>Можете предложить свою помощь?</h3>
            <p class="title">Свяжитесь с нами</p>
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
