<?php
@$page = $_GET['q'];
if (!empty($page)) {
    switch ($page) {

        case 'beranda':
            include './pages/beranda/beranda.php';
            break;

        case 'about':
            include './pages/about/about.php';
            break;

        case 'detail':
            include './pages/detail/detail.php';
            break;

        case 'rekom':
            include './pages/rekom/rekom.php';
            break;

        case 'blog':
            include './pages/blog/blog.php';
            break;

        case 'feature':
            include './pages/feature/feature.php';
            break;

        case 'team':
            include './pages/team/team.php';
            break;

        case 'testimonial':
            include './pages/testimonial/testimonial.php';
            break;

        case 'servicess':
            include './pages/servicess/servicess.php';
            break;

        case 'contact':
            include './pages/contact/contact.php';
            break;

        case 'add_message':
            include './pages/contact/add_pesan.php';
            break;

        case '404':
            include './pages/404/404.php';
            break;

        case 'appointment':
            include './pages/appointment/appointment.php';
            break;
    }
} else {
    include './pages/beranda/beranda.php';
}
