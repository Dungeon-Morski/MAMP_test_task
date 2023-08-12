import './bootstrap';
import $ from 'jquery'
import 'laravel-datatables-vite';
import toastr from 'toastr';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import 'sweetalert2/src/sweetalert2.scss';
import 'selectize';



//loader
window.addEventListener('load', function () {

    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-56980351-1', 'auto');
    ga('send', 'pageview');

    $('#loading').fadeOut('slow');

});

$('.createBtn').on('click',function () {
    let currentBtn = $(this);
    $('.depositOverlayBlock').fadeIn(300, function () {
        let methodId = $(currentBtn).attr('data-id')
        $('.deposit-btn').attr('data-id',methodId)
        $(this).removeClass('hidden')
        $(this).addClass('!flex')
    })

})
$('.overlay').click(function () {
    $('.depositOverlayBlock ').fadeOut(300, function () {
        $(this).addClass('hidden')
        $(this).removeClass('!flex')
    })
})
