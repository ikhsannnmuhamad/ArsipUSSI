"use strict"


var path = location.pathname.split('/')
var url = location.origin + '/' + path[1]
$('ul.sidebar-menu li a').each(function(){
    if($(this).attr('href').indexOf(url) !== -1){
        $(this).parent().addClass('active').parent().parent('li').addClass('active')
    }
})