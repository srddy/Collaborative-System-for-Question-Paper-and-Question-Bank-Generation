function initials() {
  // Sort
  $(".list ul li").sort(asc_sort).appendTo('ul');
  function asc_sort(a, b){
    return ($(b).text()) < ($(a).text()) ? 1 : -1;
  }

  // Initials' Array
  var initials = [];
  $(".list ul li").each(function(i) {
    // Get first letter
    var initial = $(this).html().charAt(0).toLowerCase();
    // If the letter isn't in the array
    if ( initials.indexOf(initial) === -1 )
      // Add to the array
      initials.push(initial);
  });
  
  // Append the letters to the div
  $.each(initials, function(index, value) {
    $(".initials").append("<b>" + value + "</b>");
  });
}
initials();
// When click to an initial
$(".initials b").click(function() {
  var letter = $(this).html().toLowerCase(),
      found  = 0,
      index  = 0;
  
  $(".list ul li").each(function(i) {
    if (found == 0) {
      var initial = $(this).html().charAt(0).toLowerCase();
      
      if ( initial == letter ) {
        index = $(this).index();
        found = 1;
      }
    }
  });
  
  $(".list ul").scrollTo($(".list ul li:eq(" + (index) + ")"), 400, {offset:-10});
});