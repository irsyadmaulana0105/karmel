<?php
@$page = $_GET['q'];
if (!empty($page)) {
    switch ($page) {

        case 'beranda':
            include './pages/beranda/beranda.php';
            break;

        case 'kontakinf':
            include './pages/kontakinf/kontakinf.php';
            break;

        case 'editkontakinf':
            include './pages/kontakinf/editkontakinf/editkontakinf.php';
            break;

        case 'deletekontakinf':
            include './pages/kontakinf/deletekontakinf/deletekontakinf.php';
            break;

        case 'sosialmedia':
            include './pages/sosialmedia/sosialmedia.php';
            break;

        case 'addsm':
            include './pages/sosialmedia/addsm/addsm.php';
            break;
        case 'editsm':
            include './pages/sosialmedia/editsm/editsm.php';
            break;
        case 'deletesm':
            include './pages/sosialmedia/deletesm/deletesm.php';
            break;

        case 'slide_satu':
            include './pages/slide_satu/slide_satu.php';
            break;

        case 'addslide_satu':
            include './pages/slide_satu/addslide_satu/addslide_satu.php';
            break;

        case 'editslide_satu':
            include './pages/slide_satu/editslide_satu/editslide_satu.php';
            break;

        case 'deleteslide_satu':
            include './pages/slide_satu/deleteslide_satu/deleteslide_satu.php';
            break;

        case 'slide_dua':
            include './pages/slide_dua/slide_dua.php';
            break;

        case 'addslide_dua':
            include './pages/slide_dua/addslide_dua/addslide_dua.php';
            break;

        case 'editslide_dua':
            include './pages/slide_dua/editslide_dua/editslide_dua.php';
            break;

        case 'deleteslide_dua':
            include './pages/slide_dua/deleteslide_dua/deleteslide_dua.php';
            break;

        case 't_kami':
            include './pages/t_kami/t_kami.php';
            break;

        case 'addt_kami':
            include './pages/t_kami/addt_kami/addt_kami.php';
            break;

        case 'editt_kami':
            include './pages/t_kami/editt_kami/editt_kami.php';
            break;

        case 'deletet_kami':
            include './pages/t_kami/deletet_kami/deletet_kami.php';
            break;

        case 'add_info':
            include './pages/t_kami/add_info/add_info.php';
            break;

        case 'edit_info':
            include './pages/t_kami/edit_info/edit_info.php';
            break;

        case 'delete_info':
            include './pages/t_kami/delete_info/delete_info.php';
            break;


        case 'wisata':
            include './pages/wisata/wisata.php';
            break;

        case 'add_wisata':
            include './pages/wisata/add_wisata/add_wisata.php';
            break;

        case 'edit_wisata':
            include './pages/wisata/edit_wisata/edit_wisata.php';
            break;

        case 'delete_wisata':
            include './pages/wisata/delete_wisata/delete_wisata.php';
            break;

        case 'add_wisata_card':
            include './pages/wisata/add_wisata_card/add_wisata_card.php';
            break;

        case 'edit_wisata_card':
            include './pages/wisata/edit_wisata_card/edit_wisata_card.php';
            break;

        case 'delete_wisata_card':
            include './pages/wisata/delete_wisata_card/delete_wisata_card.php';
            break;


// rekom
        case 'rekom':
            include './pages/rekom/rekom.php';
            break;

        case 'add_rekom':
            include './pages/rekom/add_rekom/add_rekom.php';
            break;

        case 'edit_rekom':
            include './pages/rekom/edit_rekom/edit_rekom.php';
            break;

        case 'delete_rekom':
            include './pages/rekom/delete_rekom/delete_rekom.php';
            break;
// end of rekom


// pesan
        case 'pesan':
            include './pages/pesan/pesan.php';
            break;

        case 'add_pesan':
            include './pages/pesan/add_pesan/add_pesan.php';
            break;

        case 'edit_pesan':
            include './pages/pesan/edit_pesan/edit_pesan.php';
            break;

        case 'delete_pesan':
            include './pages/pesan/delete_pesan/delete_pesan.php';
            break;
// end of pesan


        case 'edit_proses':
            include './pages/beranda/editkontakinf/edit_proses/edit_proses.php';
            break;
    }
} else {
    include './pages/beranda/beranda.php';
}
