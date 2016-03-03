<?php include('header.php'); ?>

<body>
<section class="grid-12 content-area">
    <div class="grid-3"></br></div>
    <div class="grid-6 center">
        <div class="login-form">
            <h2><strong>Login to Ping Warden</strong></h2>
            <form action="/login/processlogin" method="post" name="login_form">
                <input type="text" name="email" placeholder="Email address"/>
                </br>
                <input type="password" name="password" id="password" placeholder="Password"/>
                </br>
                <input class="button full animated" type="button"
                       value="Login"
                       onclick="formhash(this.form, this.form.password);" />
            </form>
            <p><a class="register" href="/register">No account? Sign Up!</a></p>
        </div>
    </div>
    <div class="grid-3"></br></div>
</section>
</body>

<script type="text/javascript" src="/static/js/login/sha512.js"></script>
<script type="text/javascript" src="/static/js/login/forms.js"></script>


<?php include('footer.php'); ?>
