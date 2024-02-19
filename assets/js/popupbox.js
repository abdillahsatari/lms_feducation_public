new WOW().init();

// MDB Lightbox Init
// $(function () {
//     $("#mdb-lightbox-ui").load("https://astronacci.com/mdb/mdb-addons/mdb-lightbox-ui.html");
// });

// $('.carousel').carousel({
//     touch: true // default
// });

// (function ($) {
//     if ($("#navbarToggleExternalContent").hasClass("show")) {
//         $('.logo').attr('src', 'https://www.astronacci.com/images/2019/logo-navbar-header-white.png');
//         $('#navbarActive').css("cssText", "background-color: #4c4c4c !important;");
//         $('#navbarActive .nav-item a').css("cssText", "color: #bdbdbd !important;");
//         $('#navbarActive .nav-item p').css("cssText", "color: #bdbdbd !important;");
//         $('#navbarActive .nav-item i').css("cssText", "color: #bdbdbd !important;");
//         $('#menutext').css("cssText", "color: #bdbdbd !important;");
//     } else {
//         $('.logo').attr('src', 'https://www.astronacci.com/images/2019/logo-navbar-header.png');
//         $('#navbarActive').css("cssText", "background-color: transparent !important;");
//         $('#navbarActive .nav-item a').css("cssText", "color: #696969 !important;");
//         $('#navbarActive .nav-item p').css("cssText", "color: #696969 !important;");
//         $('#navbarActive .nav-item i').css("cssText", "color: #696969 !important;");
//         $('#menutext').css("cssText", "color: #696969 !important;");
//     }
//     $("#menutext").click(function () {
//         if ($("#navbarToggleExternalContent").hasClass("show")) {
//             $('.logo').attr('src', 'https://www.astronacci.com/images/2019/logo-navbar-header.png');
//             $('#navbarActive').css("cssText", "background-color: transparent !important;");
//             $('#navbarActive .nav-item a').css("cssText", "color: #696969 !important;");
//             $('#navbarActive .nav-item p').css("cssText", "color: #696969 !important;");
//             $('#navbarActive .nav-item i').css("cssText", "color: #696969 !important;");
//             $('#menutext').css("cssText", "color: #696969 !important;");
//         } else {
//             $('.logo').attr('src', 'https://www.astronacci.com/images/2019/logo-navbar-header-white.png');
//             $('#navbarActive').css("cssText", "background-color: #4c4c4c !important;");
//             $('#navbarActive .nav-item a').css("cssText", "color: #bdbdbd !important;");
//             $('#navbarActive .nav-item p').css("cssText", "color: #bdbdbd !important;");
//             $('#navbarActive .nav-item i').css("cssText", "color: #bdbdbd !important;");
//             $('#menutext').css("cssText", "color: #bdbdbd !important;");
//         }
//     });
//     $(window).scroll(function () {
//         if ($(this).scrollTop() > 30) {
//             if ($("#navbarToggleExternalContent").hasClass("show")) {
//                 $('.logo').attr('src', 'https://www.astronacci.com/images/2019/logo-navbar.png');
//                 $('#navbarActive').css("cssText", "background-color: #4c4c4c !important;");
//                 $('#navbarActive .nav-item a').css("cssText", "color: #bdbdbd !important;");
//                 $('#navbarActive .nav-item p').css("cssText", "color: #bdbdbd !important;");
//                 $('#navbarActive .nav-item i').css("cssText", "color: #bdbdbd !important;");
//                 $('#menutext').css("cssText", "color: #bdbdbd !important;");
//             } else {
//                 $('.logo').attr('src', 'https://www.astronacci.com/images/2019/logo-navbar.png');
//                 $('#navbarActive').css("cssText", "background-color: #4c4c4c !important;");
//                 $('#navbarActive .nav-item a').css("cssText", "color: #bdbdbd !important;");
//                 $('#navbarActive .nav-item p').css("cssText", "color: #bdbdbd !important;");
//                 $('#navbarActive .nav-item i').css("cssText", "color: #bdbdbd !important;");
//                 $('#menutext').css("cssText", "color: #bdbdbd !important;");
//             }
//             $("#menutext").click(function () {
//                 if ($("#navbarToggleExternalContent").hasClass("show")) {
//                     $('.logo').attr('src', 'https://www.astronacci.com/images/2019/logo-navbar.png');
//                     $('#navbarActive').css("cssText", "background-color: #4c4c4c !important;");
//                     $('#navbarActive .nav-item a').css("cssText", "color: #bdbdbd !important;");
//                     $('#navbarActive .nav-item p').css("cssText", "color: #bdbdbd !important;");
//                     $('#navbarActive .nav-item i').css("cssText", "color: #bdbdbd !important;");
//                     $('#menutext').css("cssText", "color: #bdbdbd !important;");
//                 } else {
//                     $('.logo').attr('src', 'https://www.astronacci.com/images/2019/logo-navbar.png');
//                     $('#navbarActive').css("cssText", "background-color: #4c4c4c !important;");
//                     $('#navbarActive .nav-item a').css("cssText", "color: #bdbdbd !important;");
//                     $('#navbarActive .nav-item p').css("cssText", "color: #bdbdbd !important;");
//                     $('#navbarActive .nav-item i').css("cssText", "color: #bdbdbd !important;");
//                     $('#menutext').css("cssText", "color: #bdbdbd !important;");
//                 }
//             });
//         } else {
//             if ($("#navbarToggleExternalContent").hasClass("show")) {
//                 $('.logo').attr('src', 'https://www.astronacci.com/images/2019/logo-navbar-header-white.png');
//                 $('#navbarActive').css("cssText", "background-color: #4c4c4c !important;");
//                 $('#navbarActive .nav-item a').css("cssText", "color: #bdbdbd !important;");
//                 $('#navbarActive .nav-item p').css("cssText", "color: #bdbdbd !important;");
//                 $('#navbarActive .nav-item i').css("cssText", "color: #bdbdbd !important;");
//                 $('#menutext').css("cssText", "color: #bdbdbd !important;");
//             } else {
//                 $('.logo').attr('src', 'https://www.astronacci.com/images/2019/logo-navbar-header.png');
//                 $('#navbarActive').css("cssText", "background-color: transparent !important;");
//                 $('#navbarActive .nav-item a').css("cssText", "color: #696969 !important;");
//                 $('#navbarActive .nav-item p').css("cssText", "color: #696969 !important;");
//                 $('#navbarActive .nav-item i').css("cssText", "color: #696969 !important;");
//                 $('#menutext').css("cssText", "color: #696969 !important;");
//             }
//             $("#menutext").click(function () {
//                 if ($("#navbarToggleExternalContent").hasClass("show")) {
//                     $('.logo').attr('src', 'https://www.astronacci.com/images/2019/logo-navbar-header.png');
//                     $('#navbarActive').css("cssText", "background-color: transparent !important;");
//                     $('#navbarActive .nav-item a').css("cssText", "color: #696969 !important;");
//                     $('#navbarActive .nav-item p').css("cssText", "color: #696969 !important;");
//                     $('#navbarActive .nav-item i').css("cssText", "color: #696969 !important;");
//                     $('#menutext').css("cssText", "color: #696969 !important;");
//                 } else {
//                     $('.logo').attr('src', 'https://www.astronacci.com/images/2019/logo-navbar-header-white.png');
//                     $('#navbarActive').css("cssText", "background-color: #4c4c4c !important;");
//                     $('#navbarActive .nav-item a').css("cssText", "color: #bdbdbd !important;");
//                     $('#navbarActive .nav-item p').css("cssText", "color: #bdbdbd !important;");
//                     $('#navbarActive .nav-item i').css("cssText", "color: #bdbdbd !important;");
//                     $('#menutext').css("cssText", "color: #bdbdbd !important;");
//                 }
//             });
//         }
//     });
// }(jQuery));

// var modal = document.getElementById('popupBox');
// var span = document.getElementsByClassName("close")[0];
//
// $(document).ready(function () {
//     modal.style.display = "block";
// });
//
// span.onclick = function () {
//     modal.style.display = "none";
//     modal.fadeOut();
// };
//
// window.onclick = function (event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//         modal.fadeOut();
//     }
// };
