"use strict";

$('#moreOptions').on("click", function () {
  if ($('#hiddenOnForm').hasClass('hide')) {
    $('#hiddenOnForm').removeClass('hide');
  } else {
    $('#hiddenOnForm').addClass('hide');
    document.getElementById('pass').value = '';
    $('#date').prop('selectedIndex', 0);
  }
});