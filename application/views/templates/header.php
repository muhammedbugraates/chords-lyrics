<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chords and Lyrics</title>
    <link rel="icon" href="https://img.icons8.com/pastel-glyph/2x/music.png">
    <link href="https://bootswatch.com/4/flatly/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">Chords&Lyrics</a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarColor01" style="">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
                    </li>
                    <?php if ($this->user_model->check_user_admin()) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>users">Users</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>artists">Artists</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>genres">Genres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>songs">Songs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>repertories">Repertories</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if (!$this->session->userdata('logged_in')) : ?>
                        <li><a class="nav-link" href="<?php echo base_url(); ?>users/login">Login</a></li>
                        <li><a class="nav-link" href="<?php echo base_url(); ?>users/register">Register</a></li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata('logged_in')) : ?>
                        <li><a class="nav-link" href="<?php echo base_url(); ?>repertories/add">Add Repertory</a></li>
                        <?php if ($this->user_model->check_user_admin()) : ?>
                            <li><a class="nav-link" href="<?php echo base_url(); ?>songs/add">Add Song</a></li>
                            <li><a class="nav-link" href="<?php echo base_url(); ?>artists/add">Add Artist</a></li>
                            <li><a class="nav-link" href="<?php echo base_url(); ?>genres/add">Add Genre</a></li>
                        <?php endif; ?>
                        <li><a class="nav-link" href="<?php echo base_url(); ?>users/settings">Account</a></li>
                        <li><a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container">
        <!-- Flash Messages -->
        <!-- Artist -->
        <?php if ($this->session->flashdata('artist_added')) : ?>
            <?php echo '<p class="alert alert-success">' . $this->session->flashdata('artist_added') . '</p>'; ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('artist_updated')) : ?>
            <?php echo '<p class="alert alert-success">' . $this->session->flashdata('artist_updated') . '</p>'; ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('artist_deleted')) : ?>
            <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('artist_deleted') . '</p>'; ?>
        <?php endif; ?>

        <!-- Genre -->
        <?php if ($this->session->flashdata('genre_added')) : ?>
            <?php echo '<p class="alert alert-success">' . $this->session->flashdata('genre_added') . '</p>'; ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('genre_updated')) : ?>
            <?php echo '<p class="alert alert-success">' . $this->session->flashdata('genre_updated') . '</p>'; ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('genre_deleted')) : ?>
            <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('genre_deleted') . '</p>'; ?>
        <?php endif; ?>

        <!-- Repertory -->
        <?php if ($this->session->flashdata('repertory_added')) : ?>
            <?php echo '<p class="alert alert-success">' . $this->session->flashdata('repertory_added') . '</p>'; ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('repertory_updated')) : ?>
            <?php echo '<p class="alert alert-success">' . $this->session->flashdata('repertory_updated') . '</p>'; ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('repertory_deleted')) : ?>
            <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('repertory_deleted') . '</p>'; ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('song_added_to_repertory')) : ?>
            <?php echo '<p class="alert alert-success">' . $this->session->flashdata('song_added_to_repertory') . '</p>'; ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('song_removed_from_repertory')) : ?>
            <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('song_removed_from_repertory') . '</p>'; ?>
        <?php endif; ?>

        <!-- Song -->
        <?php if ($this->session->flashdata('song_added')) : ?>
            <?php echo '<p class="alert alert-success">' . $this->session->flashdata('song_added') . '</p>'; ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('song_updated')) : ?>
            <?php echo '<p class="alert alert-success">' . $this->session->flashdata('song_updated') . '</p>'; ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('song_deleted')) : ?>
            <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('song_deleted') . '</p>'; ?>
        <?php endif; ?>

        <!-- User -->

        <!-- Register -->
        <?php if ($this->session->flashdata('user_registered')) : ?>
            <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_registered') . '</p>'; ?>
        <?php endif; ?>

        <!-- Log in -->
        <?php if ($this->session->flashdata('user_loggedin')) : ?>
            <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedin') . '</p>'; ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('login_failed')) : ?>
            <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('login_failed') . '</p>'; ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('user_loggedout')) : ?>
            <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedout') . '</p>'; ?>
        <?php endif; ?>

        <!-- Settings -->
        <?php if ($this->session->flashdata('user_updated')) : ?>
            <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_updated') . '</p>'; ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('delete_failed')) : ?>
            <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('delete_failed') . '</p>'; ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('user_deleted')) : ?>
            <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_deleted') . '</p>'; ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('password_changed')) : ?>
            <?php echo '<p class="alert alert-success">' . $this->session->flashdata('password_changed') . '</p>'; ?>
        <?php endif; ?>
        
        <!-- Users Table -->
        <?php if ($this->session->flashdata('table_delete_admin_failed')) : ?>
            <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('table_delete_admin_failed') . '</p>'; ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('table_user_deleted')) : ?>
            <?php echo '<p class="alert alert-success">' . $this->session->flashdata('table_user_deleted') . '</p>'; ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('make_admin')) : ?>
            <?php echo '<p class="alert alert-success">' . $this->session->flashdata('make_admin') . '</p>'; ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('remove_admin')) : ?>
            <?php echo '<p class="alert alert-success">' . $this->session->flashdata('remove_admin') . '</p>'; ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('last_admin_cannot_be_deleted')) : ?>
            <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('last_admin_cannot_be_deleted') . '</p>'; ?>
        <?php endif; ?>

        