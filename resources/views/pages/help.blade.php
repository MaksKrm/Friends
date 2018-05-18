@extends('layouts.admin.app')

@section('content')
    <div class="donate">

        <!-- Price List -->
        <div class="price-box">

            <div class="container">

                <p class="title">pricing and registration</p>
                <h2>So what does it all costs?</h2>

                <!-- Price Block -->
                <div class="block promo">
                    <p><span>small breed</span> $20 per day</p>
                    <ul>
                        <li>VIP room</li>
                        <li>grooming</li>
                        <li>social interaction</li>
                        <li>exercise and activity</li>
                    </ul>
                    <div class="button-holder">
                        <a href="#" class="button">book now</a>
                    </div>
                </div>
                <!-- Price Block Ends! -->

                <!-- Price Block -->
                <div class="block">
                    <p><span>medium breed</span> $30 per day</p>
                    <ul>
                        <li>VIP room</li>
                        <li>grooming</li>
                        <li>social interaction</li>
                        <li>exercise and activity</li>
                    </ul>
                    <div class="button-holder">
                        <a href="#" class="button">book now</a>
                    </div>
                </div>
                <!-- Price Block Ends! -->

                <!-- Price Block -->
                <div class="block">
                    <p><span>large breed</span> $35 per day</p>
                    <ul>
                        <li>VIP room</li>
                        <li>grooming</li>
                        <li>social interaction</li>
                        <li>exercise and activity</li>
                    </ul>
                    <div class="button-holder">
                        <a href="#" class="button">book now</a>
                    </div>
                </div>
                <!-- Price Block Ends! -->

            </div>
        </div>
        <!-- Price List ends! -->

        <!-- Types -->
        <div class="types">
            <div class="container">

                <h4>Getting started</h4>

                <p>All animals entering boarding facility need to meet certain requirements, see the list bellow. You need to fill out and sign application form.</p>

                <!-- Types of Donation -->
                <div class="section float-left">

                    <h4>Boarding Admission Requirements</h4>

                    <dl>
                        <dt>All pets must be sprayed/neutered</dt>
                        <dd>Applies to animals older then six months</dd>
                        <dt>proof of up-to-date vaccinations</dt>
                        <dd>All dogs must have current vaccination records on file with us.</dd>
                        <dt>nametag and collar</dt>
                        <dd>We also require that your pet wears a secure collar with a name tag.</dd>
                    </dl>

                </div>
                <!-- Types of Donation Ends! -->

                <!-- Wish list -->
                <div class="section float-right">

                    <h4>Our facilities include</h4>

                    <ul>
                        <li>One-acre fenced-in play area</li>
                        <li>Temperature-controlled, clean, and spacious kennels</li>
                        <li>Basic grooming services available upon request</li>
                        <li>Individual attention and play with other dogs if requested</li>
                        <li>Multi-pet discounts available</li>
                        <li>Separate accomodations for cats</li>
                    </ul>

                </div>
                <!-- Wish list Ends! -->

                <div class="button-holder">
                    <a href="#" class="button">Fill out application form</a>
                </div>

            </div>
        </div>
        <!-- Types Ends! -->

        <!-- Types II -->
        <div class="types">
            <div class="container">

                <h4>What you shoud know</h4>

                <p>If you have any concerns or questions not answered in our FAQ please contact us we will be happy to help.</p>

                <dl class="accordion">
                    <dt>Collection and delivery times</dt>
                    <dd>We provide collection and delivery services during work days from 9am to 11am</dd>
                    <dt>Do I need to make an appointment?</dt>
                    <dd>We welcome you to drop by and look around, meet the staff and see the facilities, ask any questions... If you want to reserve boarding space, you need to make an appointment by phone or email.</dd>
                    <dt>Can I bring my own food?</dt>
                    <dd>Top quality food is included in your pet's stay but if you want us to feed your pet with the food you provide we ask you to make daily portions packages.</dd>
                </dl>

            </div>
        </div>
        <!-- Types II Ends! -->

        <img src="images/paws_1.png" class="volunteer-image" alt="">

    </div>
@endsection
