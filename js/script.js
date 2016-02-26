$(document).ready(function(){
	var dragArea =  $(".drag-area");
	function uploadFiles(files){
		$(this).removeClass('drag-hover');
		var formData = new FormData();
		for (var i = 0; i < files.length; i++) {	
			formData.append("file[]" , files[i]);
		}
		$.ajax({
			url:"/learning/app/upload.php",
			type: "post",
			data : formData,
			processData : false,
			contentType: false,
			success: function(response){
				console.log(response);
			},
			xhr: function(){
		        // get the native XmlHttpRequest object
		        var xhr = $.ajaxSettings.xhr() ;
		        // set the onprogress event handler
		        xhr.upload.onprogress = function(evt){
		        	var progress  = Math.round(evt.loaded/evt.total*100);
		        	$(".progress-bar").css("width" , progress+"%");
		        	$(".progress-status").html(progress+"%");	
		        } ;
		       /* // set the onload event handler
		        xhr.upload.onload = function(){ console.log('DONE!') } ;
		        // return the customized object*/
		        return xhr ;
		    }

		});	
	}

	dragArea.on("dragover",  function(){
		$(this).addClass('drag-hover');
		return false;
	}).on("dragleave",function(){
		$(this).removeClass('drag-hover');
		return false;
	}).on("drop",function(e){
		e.preventDefault();
		$(this).removeClass('drag-hover');
		var files = e.originalEvent.dataTransfer.files;
		uploadFiles(files);
	});
});