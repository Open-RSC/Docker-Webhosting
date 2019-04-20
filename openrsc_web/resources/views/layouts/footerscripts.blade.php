<script src="{{ mix('js/app.js') }}"></script>
<script>
	$(document).ready(function ($) {
		$(".clickable-row").click(function () {
			window.location = $(this).data("href");
		});
	});
</script>
<script>

	function search() {
		// Declare variables
		var input, filter, table, tr, td, i, txtValue;
		input = document.getElementById("inputBox");
		filter = input.value.toUpperCase();
		table = document.getElementById("itemList");
		tr = table.getElementsByTagName("tr");

		// Loop through all table rows, and hide those who don't match the search query
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[0];
			if (td) {
				txtValue = td.textContent || td.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}
		}
	}
</script>
