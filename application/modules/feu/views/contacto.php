<!-- Page Title -->
<section id="page-title">

    <div class="grid-bg">
        <div class="container"> <!-- 1080 pixels Container -->

            <div class="full-width columns">

                <ul class="breadcrumb-nav clearfix">
                    <li><a href="index.html" class="link-sm">Home<span></span></a></li>
                    <li><a href="about-us.html" class="link-sm">Pages<span></span></a></li>
                    <li class="italic">Contact Us</li>
                </ul>
                <h1>Contact Us</h1>

            </div>

        </div>
    </div>

</section>
<!-- Page Content -->
<section id="page-content" class="sidebar-layout">

    <div class="container"> <!-- 1080 pixels Container -->

        <!-- Content with left-aligned Sidebar -->
        <div class="columns-wrapper sb-left">

            <!-- Sidebar (left aligned) -->
            <aside id="sidebar" class="one-fourth columns page-left-col">

                <!-- Contact Information -->
                <div class="widget" data-smallscreen="yes"> <!-- show widget on a small-screen mobile device: "yes" or "no" -->

                    <section class="contact-info mb-30px">

                        <div class="ci-title colored-text-2">Phone</div>
                        <p class="phone-number">+1 (510) 000-1234</p>

                        <div class="ci-title colored-text-2">Email</div>
                        <p><a href="mailto:info@ipsum.com">info@ipsum.com</a></p>

                        <div class="ci-title colored-text-2">Skype</div>
                        <p>emerixtemplate</p>

                        <div class="ci-title colored-text-2">Address</div>
                        <p class="bold remove-bottom">ABC Ipsum Studios</p>
                        <p>1730 San Antonio Ave, Alameda, CA 94501, United States</p>

                    </section>

                    <!-- Social Icons -->
                    <ul class="social-icons small-size round clearfix">
                        <li class="facebook"><a href="#" title="Facebook">Facebook</a></li>
                        <li class="twitter"><a href="#" title="Twitter">Twitter</a></li>
                        <li class="pinterest"><a href="#" title="Pinterest">Pinterest</a></li>
                    </ul>

                </div>

                <!-- Facebook Like Box plugin -->
                <div class="widget separator" data-smallscreen="no">
                    <h4 class="grey">Find us on Facebook</h4>
                    <div id="fb-root"></div>
                    <script>
                        (function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                    </script>
                    <div class="fb-like-box" data-href="http://www.facebook.com/envato" data-width="180" data-show-faces="true" data-stream="false" data-header="false" data-show-border="false"></div>
                </div>

            </aside>
            <!-- end Sidebar -->

            <!-- Page Right Column -->
            <section id="main-content" class="three-fourths columns page-right-col adaptive-map"> <!-- inner grid 840 pixels wide -->

                <div class="full-width columns">

                    <div class="contact-form-wrapper">

                        <h4>Send us a message</h4>

                        <p class="mb-25px">You can set any combination of the input fields, text areas, dropdowns and checkboxes for your contact form.</p>
                        <div class="small-bar colored"></div>

                        <!-- Contact Form -->
                        <form action="php/mail-contact.php" method="post" id="contact-form" class="form">

                            <div>
                                <label for="sender-name"><strong>Name</strong> <span>*</span></label>
                                <input name="name" type="text" value="" id="sender-name" required>
                            </div>

                            <div>
                                <label for="sender-email"><strong>E-mail</strong> <span>*</span></label>
                                <input name="email" type="email" value="" id="sender-email" required>
                            </div>

                            <div>
                                <label><strong>Subject</strong> <span>*</span></label>
                                <select name="subject" required>
                                    <option value="">---</option>
                                    <option value="comment">Comment</option>
                                    <option value="feedback">Feedback</option>
                                    <option value="complaint">Complaint</option>
                                    <option value="request">Request for service</option>
                                </select>
                            </div>

                            <div>
                                <label><strong>Message</strong> <span>*</span></label>
                                <textarea name="message" rows="10" cols="75" required></textarea>
                            </div>

                            <div class="checkbox-field">
                                <input name="agree" type="checkbox" value="checkbox" id="terms-agree" required>
                                <label for="terms-agree"><strong> I agree with the <a href="#" target="_blank" class="italic">data protection policy</a> of this site.</strong> <span>*</span></label>
                            </div>

                            <div class="hidden">
                                <label for="spam-check"><strong>Leave this field blank:</strong></label>
                                <input name="username" type="text" value="" id="spam-check">
                            </div>

                            <div id="submit-button">
                                <input name="submit" type="submit" value="Send Message" class="button">
                            </div>

                        </form>
                        <!-- end Contact Form -->

                    </div> <!-- end contact-form-wrapper -->

                    <!-- Google Map -->
                    <div id="map" class="google-map"><span>loading map...</span></div>
                    <script>
                        // Custom parameters for Google Maps
                        var gm_params = {infoTitle: 'Some another title goes here...', infoString: '<h5 class="gm-title">DNS Ipsum Studios</h5><p>Integer at enim cursus massa malesuada tempus fringilla.</p>'};
                    </script>

                </div>

            </section>
            <!-- end Page Right Column -->

        </div> <!-- end columns-wrapper sb-left -->

    </div>

</section>
<!-- end Page Content -->