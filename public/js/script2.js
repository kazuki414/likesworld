$(function(){

    // topページのセレクト処理
    $('select').change(function () {
        var val = $('option:selected').val();
        if(val == 1){
            $('#orSelect').removeClass('dis');
            $('#free').addClass('dis');
        }
        if(val == 0){
            $('#free').removeClass('dis');
            $('#orSelect').addClass('dis');
        };
    });


});