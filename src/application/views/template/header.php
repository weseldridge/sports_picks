<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge, chrome=1" />
    <title>The League</title>
    <!-- This is the local copy. Use CDN for performance
    <link rel="stylesheet" href="/product-development-php-codeigniter-tsa/css/bootstrap.css" />
    -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href=<?php echo $this->config->item('base_url') . "css/style.css"?>>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <a class="navbar-brand" href="<?php echo $this->config->item('full_url') . "/dashboard"?>">The League</a>
    <ul class="nav navbar-nav navbar-left">
        <li><a href="<?php echo $this->config->item('full_url') . "/leagues"?>">Home</a></li>
        <li><a href="#">My Leagues</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo $this->config->item('full_url') . "/users/settings"?>">Settings</a></li>
                <li><a href="<?php echo $this->config->item('full_url') . "/users/logout"?>">Log out</a></li>
            </ul>
        </li>
    </ul>
</nav>


<div class="container">
    <div class="row">