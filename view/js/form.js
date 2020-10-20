$('#moreOptions').on("click", function(){
    if($('#hiddenOnForm').hasClass('hide')){
        $('#hiddenOnForm').removeClass('hide');
    }else{
        $('#hiddenOnForm').addClass('hide');
    }

  });