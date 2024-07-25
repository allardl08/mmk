<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="log.css">
    
    <!-- Include Google API -->
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <!-- Include JWT Decode Library -->
    <script src="https://cdn.jsdelivr.net/npm/jwt-decode@3.1.2/build/jwt-decode.min.js"></script>
    <!-- Include js-cookie Library -->
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3"></script>
</head>
<body>
    <!-- Background Container -->
    <div class="background-container"></div>

    <!-- Registration Container -->
    <div class="container" id="signup" style="display:none;">
        <h1 class="form-title">Register</h1>
        <form method="post" action="register.php">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="fName" id="fName" placeholder="First Name" required>
                <label for="fName">First Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="lName" id="lName" placeholder="Last Name" required>
                <label for="lName">Last Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <label for="email">Email</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <input type="submit" class="btn" value="Sign Up" name="signUp">
        </form>
        <p class="or">----------or--------</p>
        <div id="g_id_onload"
             data-client_id="99747514378-t4opas7hqo3v94vteiu614iau1hnd6a1.apps.googleusercontent.com"
             data-callback="handleCredentialResponse">
        </div>
        <div class="g_id_signin" data-type="standard"></div>
        <div class="icons">
            <i class="fab fa-facebook"></i>
        </div>
        <div class="links">
            <p>Already have Account?</p>
            <button id="signInButton">Sign In</button>
        </div>
    </div>

    <!-- Sign-In Container -->
    <div class="container" id="signIn">
        <h1 class="form-title">Sign In</h1>
        <form method="post" action="register.php">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <label for="email">Email</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <p class="recover">
                <a href="#">Recover Password</a>
            </p>
            <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>
        <p class="or">----------or---------</p>
        <div id="g_id_onload"
             data-client_id="99747514378-t4opas7hqo3v94vteiu614iau1hnd6a1.apps.googleusercontent.com"
             data-callback="handleCredentialResponse">
        </div>
        <div class="g_id_signin" data-type="standard"></div>
        <div class="icons">
            <i class="fab fa-facebook"></i>
        </div>
        <div class="links">
            <p>Don't have an account yet?</p>
            <button id="signUpButton">Sign Up</button>
        </div>
    </div>

    <script>
      function handleCredentialResponse(response) {
        // Decode JWT token
        const data = jwt_decode(response.credential);
        console.log(data);

        // Example: Storing user data in cookies (if needed)
        Cookies.set('userData', JSON.stringify(data));

        // Redirect to homepage
        window.location.href = 'homepage.php';
      }
    </script>
    <script src="script.js"></script>
</body>
</html>
