<?php include('header.php'); ?>



    <div id="content">
    <section class="grid-12 content-area grey">
        <div class="section-container">
            <div class="grid-4">

                <div id="logo-container">
                    <div id="logo"><a href="/">Ping Warden</a></div>
                    </br>
                    <div id="subtitle">The only monitoring tool you will be able to rely on.</div>
                </div>

                <p>
                    Ping Warden allows you to keep track of all your websites under one manageable dashboard. Best of all, it's free!
                </p>
                </br>
                <a class="button full animated fadeInUp" href="/login/register.php">Register Now</a>
            </div>
            <div class="grid-8">
                <p>
                    <!--                Integer sit amet nibh ut nisi porta commodo. Sed vehicula elit tellus, eget pulvinar tellus placerat quis. Maecenas id nulla scelerisque, finibus nunc quis.-->
                </p>
                <img class="image_1" src="<?php echo BASE_URL; ?>static/media/JohnAnthonyVella.png"></img>
            </div>
        </div>
    </section>

    <section class="grid-12 content-area">
        <div class="section-container">
            <div class="grid-3"></br></div>
            <div class="grid-6">
                <h2>Constant Survelliance around the clock</h2>
                <p>
                    Stop worrying about whether your website is down overnight. Know immediately when your server has crashed!
                </p>
            </div>
            <div class="grid-3"></br></div>
        </div>
    </section>

    <div class="line-divider"></div>

    <section class="grid-12 content-area">
        <div class="section-container">
            <div class="grid-8">
                <img class="image_2" src="<?php echo BASE_URL; ?>static/media/Phone.jpg"></img>
            </div>
            <div class="grid-4">
                <h2>Text Notifications</h2>
                <p>
                    Out and about? No worries! Alert your team as soon as an outage has occured directly to their phones!
                </p>
            </div>
            <div class="grid-3"></br></div>
        </div>
    </section>

    <div class="line-divider"></div>

    <section class="grid-12 content-area">
        <div class="section-container">
            <div class="grid-4">
                <h2>Live Reporting</h2>
                <p>
                    We love our statistics, so we built an area that can generate some pretty reports for you to look at.
                    Guage similarities between your websites outage time and ensure uptime is at a maximum.
                </p>
            </div>
            <div class="grid-8">
                <img class="image_2" src="<?php echo BASE_URL; ?>static/media/Chart.jpg"></img>
            </div>
        </div>
    </section>

    <div class="line-divider"></div>

    <?php $sites_count = $monitors[0]['COUNT(*)']; ?>
    <section class="grid-12 content-area">
        <div class="col-full">
            <div class="text-center">
                Currently monitoring <?php echo $sites_count; ?> websites right now.</div>
        </div>
    </section>

    <div class="line-divider"></div>

    <section class="grid-12 content-area">
        <div class="section-container">
            <div class="grid-6 center">
                <h2>Contact</h2>
                <p>
                    Want to work with us? Just send us an <a href="mailto:john.anthony.vella@gmail.com">email</a>.
                </p>
            </div>
            <div class="grid-6 center">
                <h2>Follow us</h2>
                <p>
                    We are on <a href="http://twitter.com/">Twitter</a>, <a href="http://dribbble.com/">Dribbble</a> and <a href="http://instagram.com/">Instagram</a>.
                </p>
            </div>
        </div>
    </section>

    <div class="line-divider"></div>
    <div class="clearfix"></div>
    <section class="grid-12 content-area">
        <div class="col-full">
            <div class="text-center">
                <a class="button full animated large" href="/login/register.php">Register Now</a>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/signup-forms/popup/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">require(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us12.list-manage.com","uuid":"886b9ed258049abdb533587a5","lid":"a2709dc19c"}) })</script>


<?php include('footer.php'); ?>