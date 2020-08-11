<!-- footer area start -->
<footer class="footer-area">
    <div class="footer-top-area pt-70 pb-35 wrapper-padding-5">
        <div class="container-fluid">
            <div class="widget-wrapper">
                <div class="footer-widget mb-30">
                    <a href="#"><img src="{{ asset('themes/ezone/assets/img/logo/2.png') }}" alt=""></a>
                    <div class="footer-about-2">
                        <p>{{ set('sekilas') }}</p>
                    </div>
                </div>
                <div class="footer-widget mb-30">
                    <h3 class="footer-widget-title-5">Contact Info</h3>
                    <div class="footer-info-wrapper-3">
                        <div class="footer-address-furniture">
                            <div class="footer-info-icon3">
                                <span>Address: </span>
                            </div>
                            <div class="footer-info-content3">
                                <p>{{ set('address') }}</p>
                            </div>
                        </div>
                        <div class="footer-address-furniture">
                            <div class="footer-info-icon3">
                                <span>Phone: </span>
                            </div>
                            <div class="footer-info-content3">
                                <p>{{ set('phone') }}</p>
                            </div>
                        </div>
                        <div class="footer-address-furniture">
                            <div class="footer-info-icon3">
                                <span>E-mail: </span>
                            </div>
                            <div class="footer-info-content3">
                                <p><a href="#"> {{ set('email') }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-widget mb-30">
                    <h3 class="footer-widget-title-5">Newsletter</h3>
                    <div class="footer-newsletter-2">
                        <p>Send us your mail or next updates</p>
                        <div id="statusSubscribe" style="display: none;"></div>
                        <div id="mc_embed_signup" class="subscribe-form-5 subscribe-section">
                            <form action="javascript:void(0)" type="post" id="mc-embedded-subscribe-form" class="validate subscribe-form searchform" novalidate>
                                @csrf
                                                         
                                <div id="mc_embed_signup_scroll" class="mc-form">
                                    <!-- <input type="email" name="email" class="email" id="emailField" placeholder="Enter mail address" required> -->
                                    <input onfocus="enableSubscriber();" onfocusout="enableSubscriber();" name="subscriber_email" class="email subscriber_email" id="emailField" type="email" placeholder="Enter email address">
                                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div class="mc-news" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                    <div class="clear">
                                        <input type="submit" onclick="checkSubscriber(); addSubscriber();" value="Subscribe" name="subscribe" id="mc-embedded-subscribe submitButton" class="button">
                                    </div>
                                    
                                    <div class="invalid-feedback d-none">
                                        Please provide a valid email
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom ptb-20 gray-bg-8">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="copyright-furniture">
                        <p>Copyright © <a href="https://hastech.company/">{{ set('system_name') }}</a> {{ Date('Y') }} . All Right Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</footer>

