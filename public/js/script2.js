$(function(){

    // topページのセレクト処理
    $('select').change(function () {
        var val = $('option:selected').val();
        if(val == 1){
            $('#orSelect').removeClass('dis');
            $('#free').addClass('dis');
            $('#category').attr('placeholder','(例)猫派か犬派か')
            $('#word').attr('placeholder','(例)猫派')
        }
        if(val == 0){
            $('#free').removeClass('dis');
            $('#orSelect').addClass('dis');
            $('#category').attr('placeholder','(例)食べ物')
            $('#word').attr('placeholder','(例)ハンバーグ')
        };
    });

    $('.catebtn').click(function(){
        var cateval = $(this).val();
        // var catetype = $(this).
        $('#category').val(cateval);
        
    });


});