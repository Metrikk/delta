<?php include('header.php'); ?>


<body>

<section class="grid-12 content-area">
    <div class="grid-3"></br></div>
    <div class="grid-6 center">
        <div class="login-form">
            <h2><strong>Sign up to Ping Warden</strong></h2>
            <form action="/register/signup" method="post" name="registration_form">
                <input type='text' name='username' id='username' placeholder="Username"/><br>
                <input type="text" name="email" id="email" placeholder="Email Address"/><br>
                <input type="password"
                       name="password"
                       id="password" placeholder="Password"/><br>
                <input type="password"
                       name="confirmpwd"
                       id="confirmpwd" placeholder="Confirm Password"/><br>
                </br>
                <input class="button full animated" type="button"
                       value="Register"
                       onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);" />
            </form>
            <p><a class="register" href="/login">Already have an account? Log in</a></p>
        </div>
    </div>
    <div class="grid-3"></br></div>
</section>

</body>


<script type="text/javascript" src="/static/js/login/sha512.js"></script>
<script type="text/javascript" src="/static/js/login/forms.js"></script>


<?php include('footer.php'); ?>
