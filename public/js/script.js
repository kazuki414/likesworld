$ (function(){
    $('.btn').click(function(){
        $('.cercle').css('opacity',0)
        $('.cercle').css('width','200em')
        $('.cercle').css('height','200em')

    });

    // $(window).load(function(){
    //     $('.cercle1').addClass('.dis')
    // });
    
    $(document).ready(function(){
        $('.cercle1').css('opacity',1)
        $('.cercle2').css('opacity',1)
        $('.cercle3').css('opacity',1)
        $('.cercle4').css('opacity',1)
        $('.cercle').css('opacity',1)
    });
});