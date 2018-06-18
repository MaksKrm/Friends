@extends('layouts.main')

@section('content')
    <div class="contact">
        <div class="container">
            <h3>Наши контакты</h3>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ФИО</th>
                        <th scope="col">Адрес</th>
                        <th scope="col">Email</th>
                        <th scope="col">Телефон</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <th scope="row">{{ $contact->id }}</th>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->address }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-6 my-2 zoomIn wow">
                    <a class="d-block hvr-buzz" href="https://www.facebook.com/groups/krmdrug/" target="_blank"><img class="social" alt="facebook"
                                    src="{{ asset("img/facebook.png") }}">
                        <span class="d-block caption">Facebook</span>
                    </a>
                </div>
                <div class="col-md-6 my-2 zoomIn wow">
                    <a class="d-block hvr-buzz" href="https://vk.com/protectionanimals" target="_blank">
                        <img class="social" alt="Благотворительный фонд Друг"
                             src="{{ asset("img/vk.png") }}">
                        <span class="caption d-block">VK</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d42107.88582455715!2d37.51942211496557!3d48.72950481015726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40df97a4c0ea9b9b%3A0x6cfddec1592678ec!2z0JrRgNCw0LzQsNGC0L7RgNGB0LosINCU0L7QvdC10YbQutCw0Y8g0L7QsdC70LDRgdGC0Yw!5e0!3m2!1sru!2sua!4v1527063704649"
            width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>

    <script type="text/javascript" src="//vk.com/js/api/openapi.js?154"></script>
    <style>
        .table-hover tbody tr:hover {
            background-color: #009a3e;
            color: #fff;
            -webkit-transition: background 0.5s ease-in;
            -moz-transition: background 0.5s ease-in;
            -ms-transition: background 0.5s ease-in;
            -o-transition: background 0.5s ease-in;
            transition: background 0.5s ease-in;
            /*	background-color: rgba(255, 213, 204, 0.78);
                color: #009a3e;*/
        }

        .contact {
            color: #fff;
        }

        .contact thead {
            color: #ffd5cc;
        }

        .contact .social {
            max-width: 200px;
        }

        .contact .caption {
            font: 1.5rem "Grand Hotel", cursive;
            color: #fff;
        }

        .contact .caption:hover {
            color: #009a3e;
        }
    </style>
@endsection
