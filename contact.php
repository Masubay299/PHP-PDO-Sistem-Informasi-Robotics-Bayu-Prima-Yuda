<!-- head -->
<?php
    include('layouts/inc-front/head.php');
?>
<!-- End Head -->

<body>
    <!-- nav -->
    <?php
    include('layouts/inc-front/nav.php');
    ?>
    <section class="banner-area relative" id="home">	
        <div class="overlay overlay-bg"></div>
        <div class="container">				
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Contact Us				
                    </h1>	
                    <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.html"> Contact Us</a></p>
                </div>	
            </div>
        </div>
    </section>
    <!-- End banner Area -->				  

    <!-- Start contact-page Area -->
    <section class="contact-page-area section-gap">
        <div class="container">
            <div class="row">
                <iframe  class="map-wrap" style="width:100%; height: 445px;"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253497.13516734913!2d107.50307079265457!3d-6.90342901505421!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung%2C%20Kota%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1612979010879!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                <div class="col-lg-4 d-flex flex-column address-wrap">
                    <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                            <span class="lnr lnr-home"></span>
                        </div>
                        <div class="contact-details">
                            <h5>Bandung, Indonesia</h5>
                            <p>40238, Dayeuhkolot</p>
                        </div>
                    </div>
                    <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                            <span class="lnr lnr-phone-handset"></span>
                        </div>
                        <div class="contact-details">
                            <h5>00 (880) 9865 562</h5>
                            <p>Mon to Fri 9am to 6 pm</p>
                        </div>
                    </div>
                    <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                            <span class="lnr lnr-envelope"></span>
                        </div>
                        <div class="contact-details">
                            <h5>support@codethemes.com</h5>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>														
                </div>
                <div class="col-lg-8">
                    <form class="form-area " id="myForm" action="#" method="post" class="contact-form text-right">
                        <div class="row">	
                            <div class="col-lg-6 form-group">
                                <input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">
                            
                                <input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">

                                <input name="subject" placeholder="Enter your subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your subject'" class="common-input mb-20 form-control" required="" type="text">
                            </div>
                            <div class="col-lg-6 form-group">
                                <textarea class="common-textarea form-control" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>						
                            </div>
                            <div class="col-lg-12 d-flex justify-content-between">
                                <div class="alert-msg" style="text-align: left;"></div>
                                <button class="genric-btn primary circle" style="float: right;">Send Message</button>		
                            </div>
                        </div>
                    </form>	
                </div>
            </div>
        </div>	
    </section>
    <!--  footer Area -->
    <?php
    include('layouts/inc-front/footer.php');
    ?>
    <!--  footer Area -->

    <!-- Scripts -->
    <?php
    include('layouts/inc-front/scripts.php');
    ?>
    <!-- End Scripts -->
    </body>

</html>