<section class="modal-shadow">
    <div class="close-btn">
        &times;
    </div>

    <div class="container">
        <div class="blueBG">
            <div class="box signIn">
                <h2>Already Have an Account?</h2>
                <button class="signIn-btn">Sign In</button>
            </div>
            <div class="box signUp">
                <h2>Don't Have an Account?</h2>
                <button class="signUp-btn">Sign up</button>
            </div>
        </div>
        <div class="form-box">
            <div class="form signIn-form">
                <form>
                    <h1>Login to your account</h1>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" />
                    </div>
                </form>
            </div>

            <div class="form signUp-form">
                <form action="./components/_signupHandler.php" method="POST">
                    <h1>Register your account</h1>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Sign Up" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>