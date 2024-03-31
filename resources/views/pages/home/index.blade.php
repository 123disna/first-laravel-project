<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
</head>
<body style="background-image:url('https://img.freepik.com/premium-photo/white-tulips-bouquet-purple-background-spring-flowers-background-top-view-banner-with-copy-space_132037-429.jpg'); background-size:cover;">
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">Student Management System</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
<br>

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 container justify-content-center card" style="padding:20px; background-color:#00000099;">
            <h1 class="text-center" style="color:white;">User Login</h1>
            <div class="card-body">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label style="color:white;">Username</label>
                        <input
                                type="text"
                                name="username"
                                id="username"
                                class="form-control"
                                autofocus="autofocus"
                                placeholder="Enter Email ID"/>
                    </div>
                    <div class="form-group">
                        <label style="color:white;">Password</label>
                        <input
                                type="password"
                                name="password"
                                autofocus="autofocus"
                                class="form-control"
                                id="password"
                                placeholder="Enter Password"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
