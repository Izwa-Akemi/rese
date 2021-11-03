$(function() {
    
    $('.edit').on('click',function() {
        console.log('クリック');
        /*何番目のeditかを取ってくる */
        var index = $('.edit').index(this);
        $('.reseve-edit-table').eq(index).css('display', 'block');
        $('.reseve-table').eq(index).css('display', 'none');
      
    });
    $('.cancel').on('click',function() {
        console.log('クリック');
        /*何番目のeditかを取ってくる */
        var index = $('.cancel').index(this);
        $('.reseve-edit-table').eq(index).css('display', 'none');
        $('.reseve-table').eq(index).css('display', 'block');
      
    });

    $('.js-modal-open').on('click',function(){
        var index = $('.js-modal-open').index(this);
        console.log(index);
        $('.js-modal').eq(index).fadeIn();
        return false;
    });
    $('.js-modal-close').on('click',function(){
        var index = $('.js-modal-close').index(this);
        console.log(index);
        $('.js-modal').eq(index).fadeOut();
        return false;
    });
});