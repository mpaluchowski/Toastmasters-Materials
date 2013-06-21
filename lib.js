var toastmasters = toastmasters || {};

toastmasters.admin = function() {

	var _requestBase = './ops',

	init = function() {
		initBinders();
	},

	initBinders = function() {
		$('a[data-action=delete]').click(deleteUser);
	},

	deleteUser = function(e) {
		e.preventDefault();
		var userRow = $(this).parents("tr:first");
		var id = userRow.attr("data-id");

		$.post(
			_requestBase,
			{
				op : 'remove',
				id : id
			},
			function(data) {
				$(userRow).fadeOut(200, function() {
					$(this).remove();
				});
			}
			);
	}

	return {
		init: init
	}

}();