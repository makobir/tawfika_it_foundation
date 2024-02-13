<style type="text/css">

    #imagePreview,#imagePreview2 {
        width: 100px;
        height:100px;
        background-position: center center;
        background-size: cover;
        -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
        display: inline-block;
    </style>

<div class="card card-primary card-outline" style="width: 100%;">
	<div class="card-header">
		Gallery Upload
	</div>
	<div class="card-body">
		<form method="post" action="<?= base_url() ?>institute/upload_slider_photo" <?php echo form_open_multipart('upload/do_upload'); ?> 
		<div class="row">
			<div class="col-sm-6">
				<p>
					Image size : Height : 430px , Width : 1200px , Less then 3MB
				</p>
				<div class="form-group">
					<input type="text" name="title" class="form-control" placeholder="Image Caption" required>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<input style="margin-bottom: 10px;" type="file" name="userfile" size="20" id="uploadFile" />
                   		<div id="imagePreview" class="well" ></div>
					</div>
					<div class="col-sm-6 text-right">					
	                   <button type="submit" class="btn btn-info">Save Now</button>
					</div>				
				</div>
			</div>
		</div>
	</div>
</div>

    <script type="text/javascript">
        $(function () {
            $("#uploadFile").on("change", function ()
            {
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader)
                    return; // no file selected, or no FileReader support

                if (/^image/.test(files[0].type)) { // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function () { // set image data as background of div
                        $("#imagePreview").css("background-image", "url(" + this.result + ")");
                    }
                }
            });
        });
    </script>   