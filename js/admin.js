(function($){

	"use strict";

	$('.efp-upload').each(function(){

	    "use strict";

	    var custom_uploader;
	    var $this   = $(this);
	    var upload  = $this.find('.efp-button-upload');
	    var path    = $this.find('.efp-upload-path');
	    var preview = $this.find('.efp-preview-upload');
	    var remove  = $this.find('.efp-button-remove');

	    upload.click(function(e) {

	        e.preventDefault();

	        if (custom_uploader) {
	            custom_uploader.open();
	            return;
	        }

	        custom_uploader = wp.media.frames.file_frame = wp.media({
	            title: 'Upload demo preview',
	            button: {
	                text: 'Upload demo preview'
	            },
	            multiple: false
	        });

	        custom_uploader.on('select', function() {
	            var attachment = custom_uploader.state().get('selection').first().toJSON();
	            path.val(attachment.url);
	            preview.attr('src',attachment.url).css('display','block');
	            remove.addClass('active');
	        });

	        custom_uploader.open();

	    });

	    remove.click(function(e){
	        e.preventDefault();
	        path.val("");
	        preview.attr('src',"").hide(0);
	        remove.removeClass('active');
	    });

	    if (path.val()) {
	        preview.show(0);
	        remove.addClass('active');
	    }
	});

})(jQuery);