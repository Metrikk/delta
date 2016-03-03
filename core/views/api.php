<?php include('header.php'); ?>
<div id="content">

    <section class="grid-12 content-area">
        <div class="section-container">
            <div class="grid-12">
                <section class="container section-padding">
                    <div class="row">
                        <h2>Before You Start</h2>
                        </br>
                        <ol>
                            <li><a href=/login/register.php">Sign up for an Ping Warden account</a>. Use your Test Key where the guide requires <code>&lt;YOUR_TEST/PRODUCTION_API_KEY&gt;</code>. Switch to your Production key when you’re ready to buy real postage.</li>
                            <li><a href="/docs/libraries">Download an Ping Warden Client Library</a> in one following languages: Python, Ruby, PHP, Java, Node.js and C#(.NET). We also have community-supported client libraries like Perl and iOS on our Integrations page. If you prefer, you can always interact directly the REST API with cURL.</li>
                        </ol>
                    </div>

                    </br>

                    <div class="row">
                        <h2 id="step1">Step 1: Create To and From Addresses</h2>
                        </br>
                        <p>To start, create the To and From Addresses for the package you’ll be shipping. An Address object contains information you’d expect like name, street, city, state, country, etc. You need to create an Address object for both the To and the From Addresses.</p>
                        <p>Once you create an Address, Ping Warden returns a unique ID for the Address. You can reuse this ID in the future for other packages you ship. This is helpful for when you are sending a lot of packages from a single location. For every type of object you create on Ping Warden, we will pass you back a unique ID that you can use to reference in the future.</p>
                    </div>
                </section>
            </div>
        </div>
    </section>

    <div class="line-divider"></div>

    <section class="grid-12 content-area grey">
        <div class="section-container">
            <div class="grid-4">
                <h2><strong>Check Status</strong></h2>
                <p>
                    You can use this call by sending across the API key tied to your account
                    to retrieve the status of your website.
                </p>
            </div>
            <div class="grid-8">

                <pre>
                    <code class="json hljs">
                        {
                        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-string">"adr_btEaKv85"</span></span>,
                        "<span class="hljs-attribute">object</span>": <span class="hljs-value"><span class="hljs-string">"Address"</span></span>,
                        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
                        "<span class="hljs-attribute">company</span>": <span class="hljs-value"><span class="hljs-string">"EasyPost"</span></span>,
                        "<span class="hljs-attribute">street1</span>": <span class="hljs-value"><span class="hljs-string">"118 2nd Street"</span></span>,
                        "<span class="hljs-attribute">street2</span>": <span class="hljs-value"><span class="hljs-string">"4th Floor"</span></span>,
                        "<span class="hljs-attribute">city</span>": <span class="hljs-value"><span class="hljs-string">"San Francisco"</span></span>,
                        "<span class="hljs-attribute">state</span>": <span class="hljs-value"><span class="hljs-string">"CA"</span></span>,
                        "<span class="hljs-attribute">zip</span>": <span class="hljs-value"><span class="hljs-string">"94105"</span></span>,
                        "<span class="hljs-attribute">country</span>": <span class="hljs-value"><span class="hljs-string">"US"</span></span>,
                        "<span class="hljs-attribute">phone</span>": <span class="hljs-value"><span class="hljs-string">"4155287555"</span></span>,
                        "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
                        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2014-07-10T01:05:57Z"</span></span>,
                        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2014-07-10T01:05:57Z"</span>
                        </span>}
                    </code>
                </pre>
            </div>
            <div class="grid-3"></br></div>
        </div>
    </section>

    <div class="line-divider"></div>

    <section class="grid-12 content-area grey">
        <div class="section-container">
            <div class="grid-8">
                <pre>
                    <code class="json hljs">
                        {
                        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-string">"adr_btEaKv85"</span></span>,
                        "<span class="hljs-attribute">object</span>": <span class="hljs-value"><span class="hljs-string">"Address"</span></span>,
                        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
                        "<span class="hljs-attribute">company</span>": <span class="hljs-value"><span class="hljs-string">"EasyPost"</span></span>,
                        "<span class="hljs-attribute">street1</span>": <span class="hljs-value"><span class="hljs-string">"118 2nd Street"</span></span>,
                        "<span class="hljs-attribute">street2</span>": <span class="hljs-value"><span class="hljs-string">"4th Floor"</span></span>,
                        "<span class="hljs-attribute">city</span>": <span class="hljs-value"><span class="hljs-string">"San Francisco"</span></span>,
                        "<span class="hljs-attribute">state</span>": <span class="hljs-value"><span class="hljs-string">"CA"</span></span>,
                        "<span class="hljs-attribute">zip</span>": <span class="hljs-value"><span class="hljs-string">"94105"</span></span>,
                        "<span class="hljs-attribute">country</span>": <span class="hljs-value"><span class="hljs-string">"US"</span></span>,
                        "<span class="hljs-attribute">phone</span>": <span class="hljs-value"><span class="hljs-string">"4155287555"</span></span>,
                        "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
                        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2014-07-10T01:05:57Z"</span></span>,
                        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2014-07-10T01:05:57Z"</span>
                        </span>}
                    </code>
                </pre>
            </div>
            <div class="grid-4">
                <h2><strong>Get All Monitors</strong></h2>
                <p>
                    This function will retrieve all active monitors for your account.
                </p>
            </div>
            <div class="grid-3"></br></div>
        </div>
    </section>

    <div class="line-divider"></div>

    <section class="grid-12 content-area">
        <div class="section-container">
            <div class="grid-6 center">
                <h2>Contact</h2>
                <p>
                    Want to work with us? Just send us an <a href="mailto:#">email</a>.
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
                <a class="button full animated large" href="/login/register">Register Now</a>
            </div>
        </div>
    </section>

</div>

<?php include('footer.php'); ?>
