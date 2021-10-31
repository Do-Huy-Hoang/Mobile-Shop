@extends('layouts.index')
@section('title')
    <title>Home</title>
@endsection
@section('Css')
    <link rel="stylesheet" href="{{asset('css\aboutus.css')}}">
@endsection
@section('content')
    <div class="image-aboutus">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 id="aboutus" class="lg-text">About Us</h1>
                    <p class="image-aboutus-para">www.MobileShop.com is owned & maintained by U.S. Bancorp, Minneapolis, MN.
                        is a second-generation family owned business. Our company was founded in 1989.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="aboutus-secktion paddingTB60">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="strong">Who we are and<br>what we do</h1>
                    <p class="lead">1 retailer in Vietnam in terms of revenue and profit, with a network of more than 4,500 stores nationwide.
                        MWG operates the retail chains thegioididong.com, Dien May Xanh, Bach Hoa Xanh. In addition, MWG also expanded into
                        foreign markets with a retail chain of mobile devices and electronics in Cambodia as well as an investment in
                        An Khang pharmacy chain. In 2020, a new member of MWG, 4KFarm, was born with the goal of providing consumers
                        with safe food according to the 4-no standard (no pesticides, no preservatives, no growth agents, no use of mutated varieties. genetically modified) </p>
                </div>
                <div class="col-md-6">
                    <p>We start by importing the highest quality raw material and then processing wide variety of Dry fruits
                        & nut bursting with the bold flavors you love. With different snacks in our product line,
                        dryfruitzone.com is the ideal snack partner for your munching time. Nakoda Group Of Industries
                        Limited. operates nationwide with sales and distribution offices in Nagpur, Maharashtra. Our FSSAI
                        approved production facilities in Nagpur, Maharashtra roast nuts & seeds daily and blend over 10 MT
                        bulk snack. These facilities also package and re-box many of our items to meet our customers’ varied
                        needs. Nagpur, Maharashtra is our corporate headquarters, and is home to purchasing, accounting, and
                        sales & marketing offices. Most Truly Nakoda Group Of Industries Limited. orders are shipped within
                        24 hours from one of our seven strategically located facilities.</p>
                    <p>Our responsive service, combined with an extensive variety of products, our commitment to using only
                        the highest quality grades of raw materials, and our emphasis on strengthening our company through
                        our core values of Customer Satisfaction, Integrity, Growth & Learning, and Leadership are why
                        Nakoda Group Of Industries Limited. should be your first choice as a supplier.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container team-sektion paddingTB60 center">
        <div class="row">
            <div class="site-heading center">
                <h3>Our Team</h3>
                <p>To get better every day by efficiently providing the best products, market expertise, and business
                    solutions in an integrated responsive fashion. We will continually strive to be a prosperous company for
                    the growth and benefit of our employees, customers, vendors, and community. </p>
                <div class="border"></div>
            </div>
        </div>
        <div class="row">
            <section class="team section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="team-item">
                                <figure> <img src="{{asset('storage\Team\Do_Huy_Hoang.jpg')}}" alt="">
                                    <figcaption>
                                        <div class="info">
                                            <h3>Đỗ Huy Hoàng</h3>
                                            <p>Leader team</p>
                                        </div>
                                        <div class="social">
                                            <a href="mailto::hd6112002@gmail.com? subject=subject text" class="twitter" data-abc="true"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                                            <a href="https://www.facebook.com/profile.php?id=100008526974050" class="facebook" data-abc="true"><i class="fa fa-facebook"></i></a>
                                            <a href="#" class="google-plus" data-abc="true"><i class="fa fa-linkedin"></i></a> </div>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="team-item">
                                <figure> <img src="{{asset('storage\Team\Do_Thanh_Nam.jpg')}}" alt="">
                                    <figcaption>
                                        <div class="info">
                                            <h3>Đõ Thành Nam</h3>
                                            <p>Chief Executive Officer</p>
                                        </div>
                                        <div class="social">
                                            <a href="mailto::dothanhnam22022002@gmail.com? subject=subject text" class="twitter" data-abc="true"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                                            <a href="https://www.facebook.com/namyeukimthoa" class="facebook" data-abc="true"><i class="fa fa-facebook"></i></a>
                                            <a href="#" class="google-plus" data-abc="true"><i class="fa fa-linkedin"></i></a> </div>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="team-item">
                                <figure> <img src="{{asset('storage\Team\Huynh_Minh_Phat.jpg')}}" alt="">
                                    <figcaption>
                                        <div class="info">
                                            <h3>Huỳnh Minh Phát</h3>
                                            <p>Python Lead</p>
                                        </div>
                                        <div class="social">
                                            <a href="mailto::hmp01031999@gmail.com? subject=subject text" class="twitter" data-abc="true"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                                            <a href="https://www.facebook.com/minhhuynhphat1999" class="facebook" data-abc="true"><i class="fa fa-facebook"></i></a>
                                            <a href="#" class="google-plus" data-abc="true"><i class="fa fa-linkedin"></i></a> </div>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="team-item">
                                <figure> <img src="{{asset('storage\Team\Huynh_Thi_Phuong_Thanh.jpg')}}" alt="">
                                    <figcaption>
                                        <div class="info">
                                            <h3>Huỳnh Thị Phương Thanh</h3>
                                            <p>Marketing Manager</p>
                                        </div>
                                        <div class="social">
                                            <a href="mailto::Thanhhuynh01679931109@gmail.com" class="twitter" data-abc="true"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                                            <a href="https://www.facebook.com/profile.php?id=100023165768330" class="facebook" data-abc="true"><i class="fa fa-facebook"></i></a>
                                            <a href="#" class="google-plus" data-abc="true"><i class="fa fa-linkedin"></i></a> </div>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
