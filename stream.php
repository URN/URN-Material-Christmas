<?php
/**
* Template Name: Stream
* Description: Page to listen to the stream live
*/
show_admin_bar(false);
remove_action('wp_head', '_admin_bar_bump_cb');
?>
<!doctype html>
<html lang="en-GB">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo get_page_title(); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/cover_urn.jpg">
    <meta property="og:description" content="University Radio Nottingham is the multi-award–winning university radio station of the University of Nottingham Students’ Union. During term-time we broadcast locally on University Park Campus on 1350AM and worldwide via our website.">
    <meta name="theme-color" content="#5e44cb">

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/images/favicons/manifest.json">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicons/safari-pinned-tab.svg" color="#000000">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="URN">
    <meta name="application-name" content="URN">
    <meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/images/favicons/browserconfig.xml">

    <!--[if gte IE 9]>
        <style type="text/css">
            .gradient {
                filter: none;
            }
        </style>
    <![endif]-->
    <?php wp_head(); ?>
</head>
<body class="stream">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="URN Logo">
    <h1>University Radio Nottingham</h1>

    <audio controls autoplay>
        <source src="http://posurnl.nottingham.ac.uk:8080/urn_high.mp3" type="audio/mpeg">
        <source src="http://posurnl.nottingham.ac.uk:8080/urn_high.ogg" type="audio/ogg">
    </audio>

    <?php
        $message_studio_placeholder = 'Send a message into the show...';
        $success_msg = 'Thank you for your message.';
        $failure_msg = 'An error occurred while delivering your message. Please try again later.';
        if(isset($_POST['studio-message'])) {
            $message_studio_placeholder = (message_studio($_POST['studio-message']) ? $success_msg : $failure_msg);
        }
    ?>

    <?php $minimise = is_home() || is_page ('stream') ? '' : 'display: none;' ?>
    <?php $minimiseT = is_home() ? 'Shrink' : 'Expand' ?>
    <?php $btn = is_page ('stream') ? 'display: none;' : '' ?>
    <div id="listen-now">
        <div class="now-playing">
            <span class="current-track"></span>
            <div class="progress-container">
                <div class="progress-bar"></div>
            </div>
            <button class="btn listen" name="size" style="<?php echo $btn; ?>"><?php echo $minimiseT; ?></button>
        </div>
        <div class="show-container" style="<?php echo $minimise; ?>">
            <div class="show-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/mic-icon.svg'); display: block"></div>
            <div class="show-info">
                <h2 class="show-title-prelude">URN presents</h2>
                <h1 class="show-title-name">URN Live</h1>
                <h3 class="show-title-time">24/7</h3>
            </div>
            <a href="/stream" title="Listen now!" target="_blank" class="play">Listen Now</a>
            <div class="send-message">
                <form id="message-the-studio" name="message-the-studio" method="post" action="">
                    <span class="message"></span>
                    <textarea autocomplete="off" name="studio-message" placeholder="<?php echo $message_studio_placeholder; ?>"></textarea>
                    <button autocomplete="off" class="btn" type="submit" name="submit">Send</button>
                </form>
            </div>
        </div>
        <a href="/stream" title="Listen now!" target="_blank" class="btn large-play play">Listen Now</a>
    </div>
    <a href="/stream" title="Listen now!" target="_blank" class="btn large-play play">Listen Now</a>
</body>

<?php wp_footer(); ?>
