var base_url = $('#base').val();

(document.querySelectorAll("[toast-list]") ||
	document.querySelectorAll("[data-choices]") ||
	document.querySelectorAll("[data-provider]")) &&
	(document.writeln(
		"<script type='text/javascript' src='"+base_url+"assets/libs/toastify/toastify-js.js'></script>"
	),
	document.writeln(
		"<script type='text/javascript' src='"+base_url+"assets/libs/choices.js/public/assets/scripts/choices.min.js'></script>"
	),
	document.writeln(
		"<script type='text/javascript' src='"+base_url+"assets/libs/flatpickr/flatpickr.min.js'></script>"
	));
