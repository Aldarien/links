$(document).ready(function() {
    $("[class^='icon-'],[class*=' icon-']").each(function(i, e) {
        var cls = $(this).attr('class');
        var ini = cls.indexOf('icon-') + "icon-".length;
        var end = cls.indexOf(' ', ini);
        var size = 0;
        if (end == -1) {
            size = cls.substring(ini);
        } else {
            size = cls.substring(ini, end);
        }
        $(this).css('height', size + 'px');
    });
});
