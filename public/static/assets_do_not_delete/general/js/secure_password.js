"use strict";
function secure_password(input) {
    var password = input.val();
    var capital = /[ABCDEFGHIJKLMNOPQRSTUVWXYZ]/;
    var capital = capital.test(password);
    if (!capital) {
        $('.capital').removeClass('success');
        $('.capital').addClass('error');
    } else {
        $('.capital').removeClass('error');
        $('.capital').addClass('success');
    }
    var lower = /[abcdefghijklmnopqrstuvwxyz]/;
    var lower = lower.test(password);
    if (!lower) {
        $('.lower').removeClass('success');
        $('.lower').addClass('error');
    } else {
        $('.lower').removeClass('error');
        $('.lower').addClass('success');
    }
    var number = /[1234567890]/;
    var number = number.test(password);
    if (!number) {
        $('.number').removeClass('success');
        $('.number').addClass('error');
    } else {
        $('.number').removeClass('error');
        $('.number').addClass('success');
    }
    var special = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
    var special = special.test(password);
    if (!special) {
        $('.special').removeClass('success');
        $('.special').addClass('error');
    } else {
        $('.special').removeClass('error');
        $('.special').addClass('success');
    }
    var minimum = password.length;
    if (minimum < 6) {
        $('.minimum').removeClass('success');
        $('.minimum').addClass('error');
    } else {
        $('.minimum').removeClass('error');
        $('.minimum').addClass('success');
    }
}

(function ($) {
    $('.secure-password').on('input', function () {
        secure_password($(this));
    });

    $('.secure-password').on('focus',function () {
        $(this).closest('div').addClass('hover-input-popup');
    });

    $('.secure-password').on('focusout',function () {
        $(this).closest('div').removeClass('hover-input-popup');
    });
    $('.secure-password').closest('div').append(`
    <div class="input-popup">
        <p class="error lower">1 small letter minimum</p>
        <p class="error capital">1 capital letter minimum</p>
        <p class="error number">1 number minimum</p>
        <p class="error special">1 special character minimum</p>
        <p class="error minimum">6 character password</p>
    </div>`);
})(jQuery);