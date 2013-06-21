var toastmasters = toastmasters || {};

toastmasters.admin = function() {

	var _requestBase = './ops',

	init = function() {
		initBinders();
	},

	initBinders = function() {
		$('a[data-action=delete]').click(deleteUser);

		$('form').submit(function() { return false; });
		$('#user-add-form button[type=submit]').click(addUser);
	},

	addUser = function(e) {
		e.preventDefault();

		var form = $(this).parents("form:first");

		$.post(
			_requestBase,
			$(form).serialize() + '&op=add',
			function(data) {
				location.reload();
			});
	}

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

$.fn.clearForm = function() {
	  return this.each(function() {
	    var type = this.type, tag = this.tagName.toLowerCase();
	    if (tag == 'form')
	      return $(':input',this).clearForm();
	    if (type == 'text' || type == 'password' || tag == 'textarea')
	      this.value = '';
	    else if (type == 'checkbox' || type == 'radio')
	      this.checked = false;
	    else if (tag == 'select')
	      this.selectedIndex = -1;
	  });
	};
