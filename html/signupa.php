<!DOCTYPE HTML>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YMVDJPFWV4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-YMVDJPFWV4');
    </script>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/layout.css" rel="stylesheet" type="text/css">
    <title>BornaSend | Contact</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img alt="" class="d-inline-block align-text-top" height="24" src="../bootstrap-logo.svg" width="30"> BornaSend
            </a>
            <button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler bluen" data-bs-target="#navbarNav" data-bs-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav blue1">
                    <li class="nav-item">
                        <a aria-current="page" class="nav-link" href="../index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./signupa.php">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="max-width: 400px;">
        <h3 class="wrapper">Sign Up Form</h3>
        <form action="../php/signup.php" method="post">
        <?php
                    if ((isset($_GET["error"])) && ($_GET["error"]) === "user_exists") {
                        echo '<div class="alert alert-danger">'.$_SESSION["error_msg"].'</div>';
                    }
                    elseif ((isset($_GET["error"])) && ($_GET["error"]) === "notcreated") {
                        echo '<div class="alert alert-danger">'.$_SESSION["error_msg"].'</div>';
                    }
                    ?>
            <div class="mb-3">
                <label class="form-label" for="fname">First Name</label>
                <input class="form-control" id="fname" name="fname" required type="text">
            </div>
            <div class="mb-3">
                <label class="form-label" for="lname">Last Name</label>
                <input class="form-control" id="lname" name="lname" required type="text">
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" id="email" name="email" required type="email">
            </div>
            <div class="mb-3">
                <label class="form-label" for="phone">Phone</label>
                <input class="form-control" id="phone" maxlength="11" name="phone" required type="tel">
            </div>
            <div class="mb-3">
                <label class="form-label" for="dob">Date of Birth</label>
                <input class="form-control" id="dob" name="dob" required type="date">
            </div>
            <div class="mb-3">
                <label class="form-label" for="address">Address</label>
                <input class="form-control" id="address" name="address" required type="text">
            </div>
            <div class="mb-3">
                <label class="form-label" for="nationality">Nationality</label>
                <input class="form-control" id="nationality" list="countries" name="nationality" placeholder="Type your country" required type="text">
                <datalist id="countries">
                <option value="Niger">Niger</option>
                <option value="Ghana">Ghana</option>
            </datalist>
            </div>
            <div class="mb-3">
                <label class="form-label" for="state">City</label>
                <input class="form-control" id="state" list="cities" name="state" placeholder="Type your city" required type="text">
                <datalist id="cities">
                <option value="Niamey">Niamey</option>
                <option value="Accra">Accra</option>
            </datalist>
            </div>
            <div class="mb-3">
                <label class="form-label" for="pwd">Password</label>
                <input class="form-control" id="pwd" name="pwd" required type="password">
            </div>
            <button class="btn btn-primary blue mb-5" name="signup" type="submit" value="Submit">Sign Up</button>
        </form>
    </div>
    <script crossorigin="anonymous" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ " src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js "></script>

</body>

</html>