@extends('layouts.app')
@section('content')

<!--Page Header Start-->
<section class="page-header">
            <div class="page-header-bg" style="background-image: url(assets/images/backgrounds/page-header-bg.jpg)">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <h2>Contact</h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><span>/</span></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Contact Page Start-->
        <section class="contact-page">
            <div class="container">
                <div class="contact-page__top">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="contact-page__left">
                                <div class="contact-page__img-box">
                                    <div class="contact-page__img">
                                        <img src="assets/images/resources/contact-page-img-1.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="contact-page__right">
                                <div class="section-title text-left">
                                    <div class="section-title__icon">
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <span class="section-title__tagline">City govity</span>
                                    <h2 class="section-title__title">Get in touch now</h2>
                                </div>
                                <p class="contact-page__text">Lorem ipsum dolor sit amet, consectetur notted adipis not
                                    icing elit sed do eiusmod tempor incididunt.</p>
                                <ul class="list-unstyled contact-page__contact-list">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-telephone"></span>
                                        </div>
                                        <div class="content">
                                            <p>Have any Question?</p>
                                            <h4><a href="tel:+9212340800"><span>Free</span> +92 (1234) 0800</a></h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-email"></span>
                                        </div>
                                        <div class="content">
                                            <p>Write Email</p>
                                            <h4><a href="mailto:needhelp@company.com">needhelp@company.com</a></h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-pin"></span>
                                        </div>
                                        <div class="content">
                                            <p>Visit Anytime</p>
                                            <h4>30 broklyn golden street. New York</h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-page__bottom">
                    <div class="contact-page__bottom-left">
                        <div class="contact-page__bottom-icon">
                            <span class="icon-clock"></span>
                        </div>
                        <ul class="contact-page__bottom-content list-unstyled">
                            <li>
                                <span>Mon - Friday</span>
                                <p>9:00 am to 6:45 pm</p>
                            </li>
                            <li>
                                <span>Saturday</span>
                                <p>10:30 am to 4:35 pm</p>
                            </li>
                        </ul>
                    </div>
                    <div class="contact-page__bottom-right">
                        <div class="contact-page__social">
                            <div class="contact-page__social-shape-1 float-bob-x">
                                <img src="assets/images/shapes/contact-page-shape-1.png" alt="">
                            </div>
                            <span>Social Media</span>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Contact Page End-->

        <!--Google Map Start-->
        <section class="google-map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd"
                class="google-map__one" allowfullscreen></iframe>

        </section>
        <!--Google Map End-->

        <!--Contact One Start-->
        <section class="contact-one">
            <div class="contact-one__bg" style="background-image: url(assets/images/backgrounds/contact-one-bg.png);">
            </div>
            <div class="container">
                <div class="section-title text-center">
                    <div class="section-title__icon">
                        <span class="fa fa-star"></span>
                    </div>
                    <span class="section-title__tagline">contact us</span>
                    <h2 class="section-title__title">Feel free to get in touch
                        <br> with jessica</h2>
                </div>
                <div class="contact-one__form-box">
                    <form action="assets/inc/sendemail.php" class="contact-one__form contact-form-validated"
                        novalidate="novalidate">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="contact-one__input-box">
                                    <input type="text" placeholder="Your Name" name="name">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="contact-one__input-box">
                                    <input type="email" placeholder="Email Address" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="contact-one__input-box text-message-box">
                                    <textarea name="message" placeholder="Write Comment"></textarea>
                                </div>
                                <div class="contact-one__btn-box">
                                    <button type="submit" class="thm-btn contact-one__btn">Send a
                                        Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="result"></div>
                </div>
            </div>
        </section>
        <!--Contact One End-->

@endsection