<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <br>
            <br>
            <br>
            <div class="container" my-6>
                <h2 class="text-center">Registration Form</h2>
                <form action="/adduser" method="post">
                    @csrf
                    <input type="text" name="username" placeholder="Enter Your Name" class="form-control" id="">
                    <hr>
                    <input type="email" name="useremail" placeholder="Enter Your Email" class="form-control" id="">
                    <hr>
                    <input type="password" name="userpass" placeholder="Enter Your Password" class="form-control" id="">
                    <hr>
                    <input type="text" name="useradd" placeholder="Enter Your Address" class="form-control" id="">
                    <hr>
                    <button class="btn btn-primary form-control" type="submit">Register Yourself</button>
            </div>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
