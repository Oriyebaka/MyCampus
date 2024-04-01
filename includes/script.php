<script type="text/JavaScript" src="js/jquery.min.js"></script>
<script>
	$(function() {
		$('#mediaUpld').on('click', function() {
			$('#upld_image').trigger('click');
		});
	});

	function previewImage() {
		document.getElementById("filetxt").innerHTML = document.getElementById("upld_image").value;
		const input = document.getElementById('upld_image');
		const preview = document.getElementById('imagePreview');
		const file = input.files[0];
		const reader = new FileReader();
		reader.onload = function(e) {
			preview.src = e.target.result;
			preview.style.display = 'block';
		};
		reader.readAsDataURL(file);
	}
</script>
<script src="js/plugin.js"></script>
<script src="js/lightbox.js"></script>
<script src="js/scripts.js"></script>