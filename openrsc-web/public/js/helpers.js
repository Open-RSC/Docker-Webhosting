function loadContent(user, id, lvl, on) {
		var url = "/inc/account.php";
		$.post(url, {
				username: user,
				owner: id,
				combat: lvl,
				online: on
		}, function (data) {
				$("#character-details").html(data).show();

				$("#character-delete-form").bind("submit", function () {
						$("#verification-fails").hide();
						if ($("#verification").val() != 'yes') {
								$("#verification-fails").show();
								$.fancybox.resize();
								return false;
						}
						$.fancybox.showActivity();
						var i = $("#user-i").val();
						var ui = $("#user-ui").val();
						var y = $("#verification").val();
						setTimeout(function () {
								$.post("/inc/account.php", {id: i, hash: ui, ver: y}, function (data) {
										$.fancybox.hideActivity();
										$("#character-delete-form").hide();
										window.location.reload()
								});
						}, 5000);
						return false;
				});
		});
}

$(document).ready(function () {
		$("#toggle:first").addClass('active');
		$('#toggle').click(function () {
				$('#toggle').removeClass('active');
				$(this).toggleClass('active');
		});

		$("a#single_image").fancybox();



    var modal = document.querySelector(".modal-box");
    var trigger = document.querySelector(".trigger");
    var closeButton = document.querySelector(".close-button");

    function toggleModal() {
        modal.classList.toggle("show-modal");
    }

    function windowOnClick(event) {
        if (event.target === modal) {
            toggleModal();
        }
    }

    trigger.addEventListener("click", toggleModal);
    closeButton.addEventListener("click", toggleModal);

    window.addEventListener("click", windowOnClick);
    $("#character-creation-form").bind("submit", function () {
				$("#name-fails").hide();
				$("#pass-fails").hide();
				if ($("#name").val().length >= 11 || $("#name").val().length <= 3) {
						$("#name-fails").show();
						$.fancybox.resize();
						return false;
				}
				if ($("#password").val().length <= 4) {
						$("#pass-fails").show();
						$.fancybox.resize();
						return false;
				}

				$.fancybox.showActivity();
				var n = $("#name").val();
				var p = $("#password").val();

				setTimeout(function () {
						$.post("/inc/account.php", {nm: n, pw: p}, function (data) {
								if (data == 0) {
										$("#user-fails").show();
								} else if (data == 1) {
										$("#user-passes").show();
										$("#character-creation-form").hide();
										window.location.reload()
								}
								$.fancybox.hideActivity();
						});
				}, 3000);
				return false;
		});
});

