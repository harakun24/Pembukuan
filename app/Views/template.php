<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css?v=2">
    <link rel="stylesheet" href="/assets/fa/css/all.css">

    <script src="/assets/js/bootstrap.min.js"></script>
    <style>
        body {
            width: 100%;
            overflow-x: hidden !important;
            min-height: 100vh;
        }

        * {
            outline: none !important;
        }
    </style>
</head>

<body class="d-flex flex-column justify-content-between">
    <div class="col-12">

        <?= $this->include('navbar'); ?>
        <div class="container-fluid p-4 d-flex flex-column align-self-start justify-content-start">

            <?= $this->renderSection('content'); ?>
        </div>
    </div>

    <footer class="bg-white footer py-3 d-flex justify-content-end">
        <div class="col-lg-4 col-sm-12 my-auto">
            <div class="text-center my-auto copyright"><span><i class="fa fa-heartbeat text-danger"></i> Demi-Handler, 2020 </span></div>
        </div>
    </footer>
</body>

</html>