<!DOCTYPE html>
<!-- upto 2 directory depth-->
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link rel="icon" href="<?= base_url(); ?>assets/backend/images/basezame.png" type="image/icon"/>
    
    <link href="<?= base_url(); ?>assets/frontend/css/font-awesome/css/all.min.css?ver=1.2.0" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/css/bootstrap-icons/bootstrap-icons.css?ver=1.2.0" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/css/bootstrap.css?ver=1.2.0" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/css/aos.css?ver=1.2.0" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/css/main.css?ver=1.3.0" rel="stylesheet">
</head>

<body id="top">
    <header class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-white" id="header-nav" role="navigation">
            <div class="container"><a class="link-dark navbar-brand site-title mb-0" href="<?= base_url(); ?>"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto me-2">
                        <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>">Home</a></li>
                    </ul>
                    <a class="btn btn-primary" href="<?= base_url('login'); ?>">Login</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="page-content">
    <div id="content">