<div id="target" class="loading"></div>
<script type="text/javascript">
	showLoading = function() {
		$("#target").css("display", "block");
		$("#target").loadingOverlay();
	};
	removeLoading = function() {
		setTimeout(function() {
			$("#target").css("display", "none");
			$("#target").loadingOverlay('remove');
		}, 500);
	}
</script>