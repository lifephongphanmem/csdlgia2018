$(function () {
    //còn pải tính toán
    var url = window.location.href;
    var m = url.indexOf('?');
    if (m > 0) {
        url = url.substring(0, m);
    }
    var chk = url.split('/');

    var index = chk.indexOf('create');
    if(index > -1) {
        url = '';
        for (var i = 0; i < index; i++) {
            if(i == index - 1){
                url += chk[i];
            }else {
                url += chk[i] + "/";
            }
        }
    }

    index = chk.indexOf('edit');
    if(index > -1) {
        url = '';
        for (var i = 0; i < index - 1; i++) {
            if(i == index - 2){
                url += chk[i];
            }else {
                url += chk[i] + "/";
            }
        }
    }

    chk = url.split('/');

    if (chk.length>3 && chk[3] != '') {
        var element = $('ul.sub-menu a').filter(function () {
            return this.href == url || this.href.indexOf(url) == 0;
            //return this.href == url;
        }).parent().addClass('active').parent().parent().addClass('active').addClass('open');

        if (element.is('li')) {
            element.parent().parent().addClass('open').addClass('active');
        }
    }
});