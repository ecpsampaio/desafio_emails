// script do how it works
$(document).ready(function(){
    $('.tap-target').tapTarget();
});
$("#open_ds").click(function(){
    $('.tap-target').tapTarget('open');
});
$("#close_ds").click(function(){
    $('.tap-target').tapTarget('close');
});

