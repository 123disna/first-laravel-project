<!DOCTYPE html>
<html xmlns:th="http://www.thymeleaf.org" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.thymeleaf.org">
<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
</head>
<body style="background-image:url('https://wallpaperaccess.com/full/2245188.png">
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">Student Management System</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" th:href="@{/flower/all}">Students</a>
            </li>
        </ul>
    </div>
</nav>
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 container justify-content-center card" style="padding:0px; background-color:#00000099;">
            <h1 class="text-center" style="color:white;">Enter new Student</h1>
            <div class="card-body" >
                <form action="{{ route('students.store') }}"  method="post" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                        <label style="color:white;">Student Name</label>
                        <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                class="form-control"
                                placeholder="Enter Student Name"/>
                    </div>
                    <div class="form-group">
                        <label style="color:white;">Student Image</label>
                        <input
                                type="file"
                                name="image"
                                class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label style="color:white;">Student Age</label>
                        <input
                                type="text"
                                name="age"
                                value="{{ old('age') }}"
                                class="form-control"
                                placeholder="Enter Student Age"/>
                    </div>
                    <div class="form-group">
                        <label style="color:white;">Student Status</label>
                        <select id="status" name="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-secondary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
