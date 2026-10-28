$.fn.editable.defaults.params = function (params) {
    params._token = LA.token;
    params._editable = 1;
    params._method = 'PUT';
    return params;
};

$.fn.editable.defaults.error = function (data) {
    var msg = '';
    if (data.responseJSON.errors) {
        $.each(data.responseJSON.errors, function (k, v) {
            msg += v + "\n";
        });
    }
    return msg
};

toastr.options = {
    closeButton: true,
    progressBar: true,
    showMethod: 'slideDown',
    timeOut: 4000
};

$.pjax.defaults.timeout = 5000;
$.pjax.defaults.maxCacheLength = 0;
$(document).pjax('a:not(a[target="_blank"])', {
    container: '#pjax-container'
});

// [Fix] jquery-pjax merges the response's <head> stylesheets into the
// document on every navigation without deduplication - a stylesheet that
// ships with a form field (e.g. select2.min.css) got re-appended after
// AdminLTE's skin overrides on each pjax entry, and whichever copy came
// last won the cascade (select2 tags flipped from the AdminLTE blue to
// bare grey). Watch <head> and drop any stylesheet whose href+media pair
// is already present - insertion order stops mattering entirely.
$(function () {
    var head = document.head;
    if (!head || head.__adminStylesheetDeduper) {
        return;
    }
    head.__adminStylesheetDeduper = true;

    // [Fix] the same stylesheet reaches the head in two spellings - the
    // full-page render emits absolute urls while pjax fragments keep the
    // relative path, so the dedupe key must be the pathname
    var dedupe = function () {
        var seen = {};
        var links = head.querySelectorAll('link[rel="stylesheet"]');

        for (var i = 0; i < links.length; i++) {
            var link = links[i];
            var href = link.getAttribute('href') || '';

            var path = href;
            try {
                path = new URL(href, location.origin).pathname;
            } catch (e) {}

            var key = path + '|' + (link.getAttribute('media') || '');

            if (seen[key]) {
                link.parentNode && link.parentNode.removeChild(link);
                continue;
            }
            seen[key] = true;
        }
    };

    // catch insertions from any source (jquery-pjax, extensions, scripts)
    new MutationObserver(dedupe).observe(head, {childList: true});

    dedupe();
});

NProgress.configure({parent: '#app'});

$(document).on('pjax:timeout', function (event) {
    event.preventDefault();
})

$(document).on('submit', 'form[pjax-container]', function (event) {
    $.pjax.submit(event, '#pjax-container')
});

$(document).on("pjax:popstate", function () {

    $(document).one("pjax:end", function (event) {
        $(event.target).find("script[data-exec-on-popstate]").each(function () {
            $.globalEval(this.text || this.textContent || this.innerHTML || '');
        });
    });
});

$(document).on('pjax:send', function (xhr) {
    if (xhr.relatedTarget && xhr.relatedTarget.tagName && xhr.relatedTarget.tagName.toLowerCase() === 'form') {
        $submit_btn = $('form[pjax-container] :submit');
        if ($submit_btn) {
            $submit_btn.button('loading')
        }
    }
    NProgress.start();
});

$(document).on('pjax:complete', function (xhr) {
    if (xhr.relatedTarget && xhr.relatedTarget.tagName && xhr.relatedTarget.tagName.toLowerCase() === 'form') {
        $submit_btn = $('form[pjax-container] :submit');
        if ($submit_btn) {
            $submit_btn.button('reset')
        }
    }
    NProgress.done();
    $.admin.grid.selects = {};
});

$(document).click(function () {
    $('.sidebar-form .dropdown-menu').hide();
});

$(function () {
    $('.sidebar-menu li:not(.treeview) > a').on('click', function () {
        var $parent = $(this).parent().addClass('active');
        $parent.siblings('.treeview.active').find('> a').trigger('click');
        $parent.siblings().removeClass('active').find('li').removeClass('active');
    });
    var menu = $('.sidebar-menu li > a[href$="' + (location.pathname + location.search + location.hash) + '"]').parent().addClass('active');
    menu.parents('ul.treeview-menu').addClass('menu-open');
    menu.parents('li.treeview').addClass('active');

    $('[data-toggle="popover"]').popover();

    // Sidebar form autocomplete
    $('.sidebar-form .autocomplete').on('keyup focus', function () {
        var $menu = $('.sidebar-form .dropdown-menu');
        var text = $(this).val();

        if (text === '') {
            $menu.hide();
            return;
        }

        var regex = new RegExp(text, 'i');
        var matched = false;

        $menu.find('li').each(function () {
            if (!regex.test($(this).find('a').text())) {
                $(this).hide();
            } else {
                $(this).show();
                matched = true;
            }
        });

        if (matched) {
            $menu.show();
        }
    }).click(function(event){
        event.stopPropagation();
    });

    $('.sidebar-form .dropdown-menu li a').click(function (){
        $('.sidebar-form .autocomplete').val($(this).text());
    });
});

$(window).scroll(function() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        $('#totop').fadeIn(500);
    } else {
        $('#totop').fadeOut(500);
    }
});

$('#totop').on('click', function (e) {
    e.preventDefault();
    $('html,body').animate({scrollTop: 0}, 500);
});

(function ($) {

    var Grid = function () {
        this.selects = {};
    };

    Grid.prototype.select = function (id) {
        this.selects[id] = id;
    };

    Grid.prototype.unselect = function (id) {
        delete this.selects[id];
    };

    Grid.prototype.selected = function () {
        var rows = [];
        $.each(this.selects, function (key, val) {
            rows.push(key);
        });

        return rows;
    };

    $.fn.admin = LA;
    $.admin = LA;
    $.admin.swal = swal;
    $.admin.toastr = toastr;
    $.admin.grid = new Grid();

    $.admin.reload = function () {
        $.pjax.reload('#pjax-container');
        $.admin.grid = new Grid();
    };

    $.admin.redirect = function (url) {
        $.pjax({container:'#pjax-container', url: url });
        $.admin.grid = new Grid();
    };

    $.admin.getToken = function () {
        return $('meta[name="csrf-token"]').attr('content');
    };

    $.admin.loadedScripts = [];

    $.admin.loadScripts = function(arr) {
        var _arr = $.map(arr, function(src) {

            if ($.inArray(src, $.admin.loadedScripts)) {
                return;
            }

            $.admin.loadedScripts.push(src);

            return $.getScript(src);
        });

        _arr.push($.Deferred(function(deferred){
            $(deferred.resolve);
        }));

        return $.when.apply($, _arr);
    }

})(jQuery);
