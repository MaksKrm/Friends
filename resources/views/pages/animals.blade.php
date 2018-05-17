@extends('layouts.app')

@section('content')
    <div class="page top-pattern">
        <div class="container">

            <div class="adopt">
                <a class="anchor" id="gallery"></a>

                <p class="title">наши питомцы</p>
                <h3>Ищут свой дом</h3>

                <!-- menu types  -->
                <ul class="button-group">
                    <li><a href="#" class="active" data-filter="*">Отобразить всех</a></li>
                    <li><a href="#" data-filter=".standard">Кошечки</a></li>
                    <li><a href="#" data-filter=".vip">Собачки</a></li>
                    <li><a href="#" data-filter=".playground">Мальчики</a></li>
                    <li><a href="#" data-filter=".clients">Девочки</a></li>
                </ul>
                <!-- menu types ends -->

                <!-- pets -->
                <div class="pets">

                    <!-- single paws_1 -->
                    <div class="single" data-group="paws_1" style="display: none">

                        <div class="image">
                            <div>
                                <img src="/img/paws_1.jpg" alt="">
                                <a data-imagelightbox="paws_1" href="/img/paws_1.jpg"></a>
                            </div>
                            <a href="#" class="button">Book now</a>
                        </div>

                        <p>Max is a lovely 6 months old mixed breed puppy waiting for someone to give him forever loving
                            home. He is well behaved and learning quickly, loves spending time with children and
                            adults.</p>

                        <table>
                            <tbody>
                            <tr>
                                <th>Room type:</th>
                                <td>Standard</td>
                            </tr>
                            <tr>
                                <th>Gender:</th>
                                <td>Male</td>
                            </tr>
                            <tr>
                                <th>Breed:</th>
                                <td>Mixed Breed</td>
                            </tr>
                            </tbody>
                        </table>

                        <a href="#" class="close"><i class="fa fa-times-circle"></i></a>

                    </div>
                    <!-- single paws_1 ends -->

                    <!-- single paws_2 -->
                    <div class="single" data-group="paws_2" style="display: none">

                        <div class="image">
                            <div>
                                <img src="/img/paws_2.jpg" alt="">
                                <a data-imagelightbox="paws_2" href="/img/paws_2.jpg"></a>
                            </div>
                            <a href="" class="button">Book now</a>
                        </div>

                        <p>Teddy is still a baby, has a lovely nature and loves to cuddle and play with other cats.</p>

                        <table>
                            <tbody>
                            <tr>
                                <th>Room type:</th>
                                <td>Standard</td>
                            </tr>
                            <tr>
                                <th>Gender:</th>
                                <td>Male</td>
                            </tr>
                            <tr>
                                <th>Breed:</th>
                                <td>Mixed Breed</td>
                            </tr>
                            </tbody>
                        </table>

                        <a href="#" class="close"><i class="fa fa-times-circle"></i></a>

                    </div>
                    <!-- single paws_2 ends -->

                    <!-- single paws_3 -->
                    <div class="single" data-group="paws_3" style="display: none">

                        <div class="image">
                            <div>
                                <img src="/img/paws_3.jpg" alt="">
                                <a data-imagelightbox="paws_3" href="/img/paws_3.jpg"></a>
                            </div>
                            <a href="#" class="button">Book now</a>
                        </div>

                        <p>Jerry is looking for a quiet home, he is indoor cat, he enjoys company of people.</p>

                        <table>
                            <tbody>
                            <tr>
                                <th>Room type:</th>
                                <td>Standard</td>
                            </tr>
                            <tr>
                                <th>Gender:</th>
                                <td>Male</td>
                            </tr>
                            <tr>
                                <th>Breed:</th>
                                <td>Mixed Breed</td>
                            </tr>
                            </tbody>
                        </table>

                        <a href="#" class="close"><i class="fa fa-times-circle"></i></a>

                    </div>
                    <!-- single paws_3 ends -->

                    <!-- single paws_4 -->
                    <div class="single" data-group="paws_4" style="display: none">

                        <div class="image">
                            <div>
                                <img src="/img/paws_4.jpg" alt="">
                                <a data-imagelightbox="paws_4" href="/img/paws_4.jpg"></a>
                            </div>
                            <a href="#" class="button">Book now</a>
                        </div>

                        <p>Daisy is a little shy when you first meet her but after some time her loving nature
                            shines.</p>

                        <table>
                            <tbody>
                            <tr>
                                <th>Room type:</th>
                                <td>Standard</td>
                            </tr>
                            <tr>
                                <th>Gender:</th>
                                <td>Male</td>
                            </tr>
                            <tr>
                                <th>Breed:</th>
                                <td>Mixed Breed</td>
                            </tr>
                            </tbody>
                        </table>

                        <a href="#" class="close"><i class="fa fa-times-circle"></i></a>

                    </div>
                    <!-- single paws_4 ends -->

                    <!-- single paws_5 -->
                    <div class="single" data-group="paws_5" style="display: none">

                        <div class="image">
                            <div>
                                <img src="/img/paws_5.jpg" alt="">
                                <a data-imagelightbox="paws_5" href="/img/paws_5.jpg"></a>
                            </div>
                            <a href="#" class="button">Book now</a>
                        </div>

                        <p>Bonbon is a shy 1 year old mixed breed. she loves quiet walks and napping, she is a great
                            match for any family.</p>

                        <table>
                            <tbody>
                            <tr>
                                <th>Room type:</th>
                                <td>Standard</td>
                            </tr>
                            <tr>
                                <th>Gender:</th>
                                <td>Male</td>
                            </tr>
                            <tr>
                                <th>Breed:</th>
                                <td>Mixed Breed</td>
                            </tr>
                            </tbody>
                        </table>

                        <a href="#" class="close"><i class="fa fa-times-circle"></i></a>

                    </div>
                    <!-- single paws_5 ends -->

                    <!-- single paws_6 -->
                    <div class="single" data-group="paws_6" style="display: none">

                        <div class="image">
                            <div>
                                <img src="/img/paws_6.jpg" alt="">
                                <a data-imagelightbox="paws_6" href="/img/paws_6.jpg"></a>
                            </div>
                            <a href="#" class="button">Book now</a>
                        </div>

                        <p>Jack is a typical Russell Terrier, playful, curious and full of energy. Take him walking,
                            swimming, he loves it all. He would be a great companion for active family.</p>

                        <table>
                            <tbody>
                            <tr>
                                <th>Room type:</th>
                                <td>Standard</td>
                            </tr>
                            <tr>
                                <th>Gender:</th>
                                <td>Male</td>
                            </tr>
                            <tr>
                                <th>Breed:</th>
                                <td>Mixed Breed</td>
                            </tr>
                            </tbody>
                        </table>

                        <a href="#" class="close"><i class="fa fa-times-circle"></i></a>

                    </div>
                    <!-- single paws_6 ends -->

                    <!-- single paws_7 -->
                    <div class="single" data-group="paws_7" style="display: none">

                        <div class="image">
                            <div>
                                <img src="/img/paws_7.jpg" alt="">
                                <a data-imagelightbox="paws_7" href="/img/paws_7.jpg"></a>
                            </div>
                            <a href="#" class="button">Book now</a>
                        </div>

                        <p>Rover is intelligent and loyal 8 year old senior, he loves belly rubs and laying around in
                            the grass. He is ready to find his forever loving home.</p>

                        <table>
                            <tbody>
                            <tr>
                                <th>Room type:</th>
                                <td>Standard</td>
                            </tr>
                            <tr>
                                <th>Gender:</th>
                                <td>Male</td>
                            </tr>
                            <tr>
                                <th>Breed:</th>
                                <td>Mixed Breed</td>
                            </tr>
                            </tbody>
                        </table>

                        <a href="#" class="close"><i class="fa fa-times-circle"></i></a>

                    </div>
                    <!-- single paws_7 ends -->

                    <!-- single paws_8 -->
                    <div class="single" data-group="paws_8" style="display: none">

                        <div class="image">
                            <div>
                                <img src="/img/paws_8.jpg" alt="">
                                <a data-imagelightbox="paws_8" href="/img/paws_8.jpg"></a>
                            </div>
                            <a href="#" class="button">Book now</a>
                        </div>

                        <p>Chocolate is a sweet brown Labrador boy, very affectionate and playful. Loves to be center of
                            attention. Would be best for family without children.</p>

                        <table>
                            <tbody>
                            <tr>
                                <th>Room type:</th>
                                <td>Standard</td>
                            </tr>
                            <tr>
                                <th>Gender:</th>
                                <td>Male</td>
                            </tr>
                            <tr>
                                <th>Breed:</th>
                                <td>Mixed Breed</td>
                            </tr>
                            </tbody>
                        </table>

                        <a href="#" class="close"><i class="fa fa-times-circle"></i></a>

                    </div>
                    <!-- single paws_8 ends -->

                    <!-- single paws_9 -->
                    <div class="single" data-group="paws_9" style="display: none">

                        <div class="image">
                            <div>
                                <img src="/img/paws_9.jpg" alt="">
                                <a data-imagelightbox="paws_9" href="/img/paws_9.jpg"></a>
                            </div>
                            <a href="#" class="button">Book now</a>
                        </div>

                        <p>Klara is outdoor cat, she really doesn't love other cats so need to be only cat. She loves
                            people, and is very smart.</p>

                        <table>
                            <tbody>
                            <tr>
                                <th>Room type:</th>
                                <td>Standard</td>
                            </tr>
                            <tr>
                                <th>Gender:</th>
                                <td>Female</td>
                            </tr>
                            <tr>
                                <th>Breed:</th>
                                <td>Mixed Breed</td>
                            </tr>
                            </tbody>
                        </table>

                        <a href="#" class="close"><i class="fa fa-times-circle"></i></a>

                    </div>
                    <!-- single paws_9 ends -->

                </div>
                <!-- pets ends -->

                <!-- Projects List -->
                <div class="group" style="position: relative; height: 930px;">

                    <div class="standard" style="position: absolute; left: 0px; top: 0px;">
                        <img src="/img/paws_1.jpg" alt="">
                        <a href="#" data-group="paws_1"><span>find out more</span></a>
                    </div>

                    <div class="standard clients" style="position: absolute; left: 310px; top: 0px;">
                        <img src="/img/paws_2.jpg" alt="">
                        <a href="#" data-group="paws_2"><span>find out more</span></a>
                    </div>

                    <div class="standard clients" style="position: absolute; left: 620px; top: 0px;">
                        <img src="/img/paws_3.jpg" alt="">
                        <a href="#" data-group="paws_3"><span>find out more</span></a>
                    </div>

                    <div class="vip" style="position: absolute; left: 0px; top: 310px;">
                        <img src="/img/paws_4.jpg" alt="">
                        <a href="#" data-group="paws_4"><span>find out more</span></a>
                    </div>

                    <div class="vip playground" style="position: absolute; left: 310px; top: 310px;">
                        <img src="/img/paws_5.jpg" alt="">
                        <a href="#" data-group="paws_5"><span>find out more</span></a>
                    </div>

                    <div class="vip playground" style="position: absolute; left: 620px; top: 310px;">
                        <img src="/img/paws_6.jpg" alt="">
                        <a href="#" data-group="paws_6"><span>find out more</span></a>
                    </div>

                    <div class="vip clients" style="position: absolute; left: 0px; top: 620px;">
                        <img src="/img/paws_7.jpg" alt="">
                        <a href="#" data-group="paws_7"><span>find out more</span></a>
                    </div>

                    <div class="standard clients" style="position: absolute; left: 310px; top: 620px;">
                        <img src="/img/paws_8.jpg" alt="">
                        <a href="#" data-group="paws_8"><span>find out more</span></a>
                    </div>

                    <div class="standard" style="position: absolute; left: 620px; top: 620px;">
                        <img src="/img/paws_9.jpg" alt="">
                        <a href="#" data-group="paws_9"><span>find out more</span></a>
                    </div>

                </div>
                <!-- Projects List Ends! -->

            </div>
            <!-- adopt Ends! -->

        </div>
    </div>
@endsection
