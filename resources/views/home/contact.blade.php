@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="container">
      <div class="box">
        <div class="breadcumb">
            <a href="{{ route('home.index') }}">home</a>
            <span><i class='bx bxs-chevrons-right'></i></span>
            <a href="{{ route('home.contact') }}">contact</a>
        </div>
    </div>
      <div class="contact-container">
        <div class="contact-form">
            <div class="first-container">
                <div class="info-container">
                    <div>
                        <img class="icon" />
                        <h3>Address</h3>
                        <a href="https://goo.gl/maps/dg2WH9r4ExQQRhNm8" target="_blank">Quang Trung Software City, District 12, Ho Chi Minh City,
                            Vietnam</a>
                    </div>
                    <div>
                        <img class="icon" />
                        <h3>Phone</h3>
                        <a href="tel:0999999999">+84 999 999 999</a>
                    </div>
                    <div>
                        <img class="icon" />
                        <h3>Email</h3>
                        <a href="mailto:dogeshop@gmail.com?subject=Feedback">dogeshop@gmail.com</a>
                    </div>
                </div>
            </div>
            <div class="second-container">
                <h2>Send Us A Message</h2>
                <form>
                    <div class="form-group">
                        <label for="name-input">Tell us your name*</label>
                        <input id="name-input" type="text" placeholder="First name" required />
                        <input type="text" placeholder="Last name" required />
                    </div>
                    <div class="form-group">
                        <label for="email-input">Enter your email*</label>
                        <input id="email-input" type="text" placeholder="Eg. dogeshop@gmail.com" required />
                    </div>
                    <div class="form-group">
                        <label for="phone-input">Enter phone number*</label>
                        <input id="phone-input" type="text" placeholder="Eg. 0999999999" required />
                    </div>
                    <div class="form-group">
                        <label for="message-textarea">Message</label>
                        <textarea id="message-textarea" placeholder="Write us a message"></textarea>
                    </div>
                    <button>Send message</button>
                </form>
            </div>
        </div>
      </div>
    </div>
@endsection
