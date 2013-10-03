(function ($) {

  /*BootPress Rig - rigs Bootstrap classes to BootPress' elements*/
  bpRig = [
    //
    //  Nav
    //
      //From index.php
      {"bpElement": "#site-navigation",	"bsClass": "navbar navbar-default navbar-fixed-top"},
      {"bpElement": "#navhead", "bsClass": "navbar-header"},
      {"bpElement": "#navhead #brand", "bsClass": "navbar-brand"},
      {"bpElement": "#navhead button", "bsClass": "navbar-toggle"},
      {"bpElement": "#navchoices", "bsClass": "navbar-collapse collapse"},
      //From functions.php
      {"bpElement": "#paging-navigation ul", "bsClass": "col-12 pager"},
      {"bpElement": "#post-navigation ul", "bsClass": "col-12 pager"},
    //
    //  Page layouts
    //
      //From index.php, single.php and page.php
      {"bpElement": "#primary", "bsClass": "container"},
      {"bpElement": ".sidebar-layout", "bsClass": "row row-offcanvas row-offcanvas-right"},
      {"bpElement": ".sidebar-layout #content", "bsClass": "col-xs-12 col-sm-8 col-md-7 col-md-offset-1"},
      {"bpElement": ".flank", "bsClass": "col-md-1"},
      //From image.php
      {"bpElement": ".full-layout", "bsClass": "row"},
      {"bpElement": ".full-layout #content", "bsClass": "col-xs-12 col-md-10 col-md-offset-1"},
    //
    //  Entry headers and footers
    //
      //From content.php
      {"bpElement": "button.edit-link", "bsClass": "button btn btn-primary btn-xs pull-right"},
      {"bpElement": ".entry-title-meta", "bsClass": "text-muted"},
      {"bpElement": ".entry-title-meta .leave-reply", "bsClass": "pull-right"},
      {"bpElement": ".entry-title-meta .has-replies", "bsClass": "pull-right badge"},
      {"bpElement": ".entry-footer-meta", "bsClass": "text-muted"},
      //From image.php
      {"bpElement": ".attachment-meta.full-size-link", "bsClass": "pull-right"},
    //
    //  Main content
    //
      //From index.php
      {"bpElement": ".excerpt", "bsClass": "col-12"},
      {"bpElement": ".excerpt .time", "bsClass": "text-muted"},
      {"bpElement": ".excerpt .readmore", "bsClass": "btn btn-default"},
    //
    //  Sidebars
    //
      //From index.php, single.php and page.php
      {"bpElement": "#sidebar-toggle", "bsClass": "pull-right visible-xs btn btn-primary btn-xs"},
      {"bpElement": "#sidebar-container", "bsClass": "col-xs-12 col-sm-4 col-md-3 sidebar-offcanvas"},
      {"bpElement": "#sidebar", "bsClass": "well sidebar-nav"},
      //From sidebar.php
      {"bpElement": ".sidebar-nav input[type='text']", "bsClass": "form-control"},
    //
    //  Comments
    //
      //From comments.php
      {"bpElement": "#respond", "bsClass": "well well-lg"},
      {"bpElement": ".comment-form-author input", "bsClass": "form-control"},
      {"bpElement": ".comment-form-email input", "bsClass": "form-control"},
      {"bpElement": ".comment-form-url input", "bsClass": "form-control"},
      {"bpElement": ".comment-form-comment textarea", "bsClass": "form-control"},
      {"bpElement": ".comment-form-author label", "bsClass": "sr-only"},
      {"bpElement": ".comment-form-email label", "bsClass": "sr-only"},
      {"bpElement": ".comment-form-url label", "bsClass": "sr-only"},
      {"bpElement": ".comment-form-comment label", "bsClass": "sr-only"},
      //From functions.php
      {"bpElement": ".comment-author.vcard", "bsClass": "pull-left"},
      {"bpElement": "comment-author cite small", "bsClass": "text-muted"},
      {"bpElement": "comment-body-p", "bsClass": "pull-left"},
    //
    //  Footer
    //
      //From footer.php
      {"bpElement": "footer#colophon", "bsClass": "row"},
      {"bpElement": ".site-info", "bsClass": "col-xs-12"},
    //
    //  Images
    //
      //From content-gallery.php
      {"bpElement": ".gallery p", "bsClass": "clearfix"},
      {"bpElement": ".gallery a", "bsClass": "col-xs-12 col-sm-6 col-md-4"},
      {"bpElement": ".gallery a", "bsClass": "img-thumbnail"},
    //
    //  Helper Styles
    //
      //From sidebar.php
      {"bpElement": ".screen-reader-text", "bsClass": "sr-only"}
  ];

  $.each(bpRig, function(i){
  	$( bpRig[i].bpElement ).addClass( bpRig[i].bsClass );
  });

$('.gallery a').css({
  'height': 185,
  'overflow' : 'hidden',
  'verticalAlign' : 'top',
  'background' : 'gray',
  'border' : 'solid 1pt lime',
  'textAlign' : 'center',
  'position' : 'relative'
});
$('.gallery img').css({
  'maxWidth' : '100%',
  'height': 'auto'
});

$('.gallery img').wrap('<div style="position:absolute;clip:rect(6px,188px,166px,0px);"></div>')

/*Bootstrap component script - TBD on how to load these separately as needed */

  //Offcanvas Script
  $('[data-toggle=offcanvas]').click(function() {
    $('.row-offcanvas').toggleClass('active');
  });
  

})(jQuery);