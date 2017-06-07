jQuery( document ).ready(function() {
    console.log( "ready!" );
  
jQuery('#select-type').click( function() {
      jQuery('#select-type').toggleClass('open');
});
  var prof = jQuery('#select-type li:first-child').attr('id');
jQuery('#select-type li').click(function() {
    var $this = jQuery(this);
    $this.insertBefore($this.siblings(':eq(0)'));
    var prof = jQuery('#select-type li:first-child').attr('id');
    jQuery('#prof').attr('value', prof)
});  

  });