(function($) {
 
    // Initialize the Lightbox for any links with the 'fancybox' class
    jQuery(".fancybox-button").fancybox();
 
    // Initialize the Lightbox automatically for any links to images with extensions .jpg, .jpeg, .png or .gif
    jQuery("a[href$='.jpg'], a[href$='.png'], a[href$='.jpeg'], a[href$='.gif']").fancybox();
 
    
    // Initalize the Lightbox for any links with the 'video' class and provide improved video embed support
    jQuery(".video-fancybox").fancybox({
        maxWidth        : 800,
        maxHeight       : 600,
        fitToView       : false,
        width           : '70%',
        height          : '70%',
        autoSize        : false,
        closeClick      : false,
        openEffect      : 'none',
        closeEffect     : 'none'
    });
 
})(jQuery)