<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>phpclicks - AJAX pagination using PHP and MySQL</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f8f9fa;
            margin-top: 60px; 
        }

        .navbar {
            background-color: #343a40;
            padding: 15px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar .navbar-brand {
            color: #ffffff !important;
            font-size: 24px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .navbar .navbar-brand:hover {
            color: #ff9f00 !important;
        }

        .navbar-inner {
            padding: 0;
        }

        .navbar .navbar-nav {
            margin-left: auto;
        }

        .navbar a {
            color: #ffffff !important;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
        }

        .navbar a:hover {
            color: #ff9f00 !important;
        }


        .pagination .page-item a {
            color: #343a40;
            font-size: 18px;
            padding: 8px 16px;
            border-radius: 5px;
            margin: 0 5px;
            transition: background-color 0.3s;
        }

        .pagination .page-item a:hover {
            background-color: #ff9f00;
            color: white;
        }

        .pagination .page-item.active a {
            background-color: #ff9f00;
            color: white;
            border: none;
        }

    </style>

</head>

<body>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="navbar-brand" href="/#">
                AJAX Pagination Using PHP and MySQL
            </a>
        </div>
    </div>
</div>


</body>

</html>
