$.ajaxSetup({
    headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
});

$(function () {
    $('#side-menu').metisMenu();

    // enable tooltips
    $('[data-toggle="tooltip"]').tooltip();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function () {
    $(window).bind("load resize", function () {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function () {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
});

function changeStatus(id) {
    $.ajax({
        url: 'users/activate',
        type: 'post',
        data: {'userId': id},
        success: function () {
            location.reload(true);
        }
    });
}

function deleteRole(id) {
    $.ajax({
        url: 'roles/' + id,
        type: 'delete',
        data: {'roleId': id},
        success: function () {
            location.reload(true);
        }
    });
}
function deleteUser(id) {
    $.ajax({
        url: 'users/' + id,
        type: 'delete',
        data: {'userId': id},
        success: function () {
            location.reload(true);
        }
    });
}


