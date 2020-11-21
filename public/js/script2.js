$(function(){

    // topページのセレクト処理
    $('#FormControlSelect1').change(function () {
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
        $('#category').val(cateval);

        var num =$('.cateSele:selected').val();
        $('#FormControlSelect1').val(num);
    });

    $('#excategory').change(function(){
        var type = $('.cateSele:selected').val();
        if(type == 0){
            $('#type0').removeClass('dis');
            $('#type1').addClass('dis');
        }
        if(type == 1){
            $('#type1').removeClass('dis');
            $('#type0').addClass('dis');
        }
    })

});