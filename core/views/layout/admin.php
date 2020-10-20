<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$this->title;?></title>
    <link rel="stylesheet" href="/assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>

<body>

    <?php include $this->basePath . '//admin//' . $tplName . '.php';?>

    <nav>
        <ul>
            <li><a class="nav__links" href="/">Main</a></li>
            <li><a class="nav__links" href="/admin">Admin</a></li>
        </ul>
    </nav>

    <script src="/assets/js/admin.js"></script>
</body>

</html>