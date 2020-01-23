<script src="{{ mix('js/app.js') }}"></script>

<script>
    $(document).ready(function ($) {
        $(".clickable-row").click(function () {
            window.location = $(this).data("href");
        });
    });

    function search() {
        // Declare variables
        let input, filter, table, tr, td, i;
        input = document.getElementById("inputBox");
        filter = input.value.toUpperCase();
        table = document.getElementById("List");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");

            if (td.length > 0) { // to avoid th
                if (td[0].innerHTML.toUpperCase().indexOf(filter) > -1 || td[1].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<script>
	function redglow(id) {
		const elem = document.getElementById(id);
		elem.style.borderColor = '#A70700';
		elem.style.backgroundColor = '#A70700';
		elem.style.backgroundImage = '{{ asset('img/title/ssredbright.jpg') }}';
	}

	function unredglow(id) {
		const elem = document.getElementById(id);
		elem.style.borderColor = '#570700';
		elem.style.backgroundColor = '#570700';
		elem.style.backgroundImage = '{{ asset('img/title/shinystonered.jpg') }}';
	}

	function greyglow(id) {
		const elem = document.getElementById(id);
		elem.style.borderColor = '#878787';
		elem.style.backgroundColor = '#777777';
		elem.style.backgroundImage = '{{ asset('img/title/ssgreybright.png') }}';
	}

	function ungreyglow(id) {
		const elem = document.getElementById(id);
		elem.style.borderColor = '#373737';
		elem.style.backgroundColor = '#474747';
		elem.style.backgroundImage = '{{ asset('img/stoneback.gif') }}';
	}
</script>
