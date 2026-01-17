


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="/register" method="post">
                            <h2 class="text-center mb-3">Register</h2>
                            <div class="mb-3">
                                <p class="text-danger"><?php echo empty($nameErr) ? '' : $nameErr; ?></p>
                                <input type="text" name="name" class="form-control" required placeholder="Name">
                            </div>
                            <div class="mb-3">
                                <p class="text-danger"><?php echo empty($emailErr) ? '' : $emailErr; ?></p>
                                <input type="email" name="email" class="form-control" required placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <p class="text-danger"><?php echo empty($passwordErr) ? '' : $passwordErr; ?></p>
                                <input type="password" name="password" class="form-control" required placeholder="Password">
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                                <a href="login">Already Registered ?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>