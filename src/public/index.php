<?php
    // $connect = mysqli_connect($_ENV["MYSQL_HOST"],$_ENV["MYSQL_USER"],$_ENV["MYSQL_PASSWORD"],$_ENV["MYSQL_DATABASE"]);
    // if (mysqli_connect_errno()) {
    //     printf("error: %s\n", mysqli_connect_error());
    //     exit();
    // }
    // mysqli_query($connect, "SET NAMES utf8");
    // echo "Hello";

    /**
     * Front to the WordPress application. This file doesn't do anything, but loads
     * wp-blog-header.php which does and tells WordPress to load the theme.
     *
     * @package WordPress
     */

    /**
     * Tells WordPress to load the WordPress theme and output it.
     *
     * @var bool
     */
    define( 'WP_USE_THEMES', true );

    /** Loads the WordPress Environment and Template */
    require __DIR__ . '/../wp-blog-header.php';

?>