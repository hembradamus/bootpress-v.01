(function ($) {

  /*BootPress Rig - rigs Bootstrap classes to BootPress' elements*/
  bpRig = [
    //
    //  Nav elements
    //
      //From index.php
      {"bpElement": "#site-navigation",	"bsClass": "navbar navbar-default navbar-fixed-top"},
      {"bpElement": "#navhead", "bsClass": "navbar-header"},
      {"bpElement": "#navhead #brand", "bsClass": "navbar-brand"},
      {"bpElement": "#navhead button", "bsClass": "navbar-toggle"},
      {"bpElement": "#navchoices", "bsClass": "navbar-collapse collapse"},
      //From functions.php
      {"bpElement": ".paging-navigation", "bsClass": "col-12 pager"},
      {"bpElement": ".post-navigation", "bsClass": "col-12 pager"},
    //
    //  Page layouts
    //
      //From index.php, single.php and page.php
      {"bpElement": "#primary", "bsClass": "container"},
      {"bpElement": ".sidebar-layout", "bsClass": "row row-offcanvas row-offcanvas-right"},
      {"bpElement": ".sidebar-layout #content", "bsClass": "col-xs-12 col-sm-8 col-md-7"},
      {"bpElement": ".flank", "bsClass": "col-md-1"},
    //
    //  Entry headers and footers
    //
      //From content.php
      {"bpElement": "h1.entry-title", "bsClass": "pull-left"},
      {"bpElement": "button.edit-link", "bsClass": "button btn btn-primary btn-xs pull-right"},
      {"bpElement": ".entry-title-meta", "bsClass": "text-muted"},
      {"bpElement": ".entry-title-meta .leave-reply", "bsClass": "pull-right"},
      {"bpElement": ".entry-title-meta .has-replies", "bsClass": "pull-right badge"},
      {"bpElement": ".entry-footer-meta", "bsClass": "text-muted"},
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
    //
    //  Comments
    //
      //From comments.php
      {"bpElement": "textarea#comment", "bsClass": "col-xs-12"},
      //From functions.php
      {"bpElement": ".comment-author.vcard", "bsClass": "pull-left"},
      {"bpElement": "comment-author cite small", "bsClass": "text-muted"},
      {"bpElement": "comment-body-p", "bsClass": "pull-left"},
    //
    //  Footer
    //
      //From footer.php
      {"bpElement": "footer#colophon", "bsClass": "row"},
      {"bpElement": ".site-info", "bsClass": "col-xs-12"}
  ];

  $.each(bpRig, function(i){
  	$( bpRig[i].bpElement ).addClass( bpRig[i].bsClass );
  });


/*Bootstrap component script - TBD on how to load these separately as needed */

  //Offcanvas Script
  $('[data-toggle=offcanvas]').click(function() {
    $('.row-offcanvas').toggleClass('active');
  });

})(jQuery);