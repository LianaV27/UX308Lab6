jQuery(document).ready(function ($) {
    // $('.site-header .header-b .tools .btn-search').click(function(){
    //     $('.site-header .header-b .tools .btn-search .search-form-holder').slideToggle();
    //     $('.site-header .header-b .tools .btn-search .search-form-holder').click(function(event) {
    //         event.stopPropagation();
    //     });
    // }) ;

    // $('body').click(function(){
    //     $('.site-header .header-b .tools .btn-search .search-form-holder').hide();
    //     $('.site-header .header-b .tools .btn-search').click(function(event) {
    //         event.stopPropagation();
    //     });
    // }) ;           
    
    $('html').on( 'click', function() {
        $('.search-form-holder').slideUp();
    });

    $('.site-header .form-section').on( 'click', function(event) {
        event.stopPropagation();
    });
    $("#btn-search").on( 'click', function() {
        $(".search-form-holder").slideToggle();
        return false;
    });
    $(".btn-form-close").on( 'click', function() {
        $(".search-form-holder").slideToggle();
        return false;
    });
   
});



