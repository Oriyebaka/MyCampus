<?php
if (isset($_SESSION["alert"])) {
?>
	<style>
		/* Modal Styles */
		.mdl {
			font-family: sans-serif;
			display: none;
			position: fixed;
			z-index: 9999;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgba(0, 0, 0, 0.4);
		}

		.mc {
			background-color: white;
			margin: auto;
			margin-top: 10%;
			margin-bottom: 10%;
			padding: 20px;
			border-radius: 10px;
			width: 50%;
			max-width: 300px;
		}

		.mh {
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.mt {
			font-size: 20px;
			font-weight: bold;
			margin: 0;
		}

		.mbd {
			margin-top: 20px;
			margin-bottom: 20px;
		}

		.mtxt {
			text-align: center;
			font-size: 16px;
		}

		.mft {
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.mcb {
			background-color: #5142FC;
			color: white;
			border: none;
			border-radius: 5px;
			padding: 10px;
			font-size: 16px;
			cursor: pointer;
		}

		/* Modal Trigger Styles */
		.mdt {
			background-color: #007AFF;
			color: white;
			border: none;
			border-radius: 5px;
			padding: 10px;
			font-size: 16px;
			cursor: pointer;
		}

		/* Show Modal */
		.mdl.show {
			display: block;
		}
	</style>
	<!-- Modal -->
	<div id="md" class="mdl show">
		<div class="mc">
			<div class="mh">
				<h2 class="mt">Alert</h2>
			</div>
			<div class="mbd">
				<p class="mtxt"><?= $_SESSION["alert"] ?></p>
			</div>
			<div class="mft">
				<button id="mbc" class="mcb">OK</button>
			</div>
		</div>
	</div>

	<script>
		var modal = document.getElementById("md");
		var modalBtn = document.getElementById("mb");
		var closeBtn = document.getElementById("mbc");
		window.onload = function() {
			modal.classList.add("show");
		}
		closeBtn.onclick = function() {
			modal.classList.remove("show");
		}
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.classList.remove("show");
			}
		}
	</script>
<?php
	unset($_SESSION["alert"]);
}
?>