var toastmasters = toastmasters || {};

toastmasters.admin = function() {

	var _requestBase = './ops',

	init = function() {
		initBinders();
	},

	initBinders = function() {
		$('a[data-action=delete]').click(deleteUser);
		$('a[data-action=edit]').click(editUser);

		$('form').submit(function() { return false; });
		$('#user-submit-form button[type=submit]').click(submitUser);
	},

	submitUser = function(e) {
		e.preventDefault();

		var form = $(this).parents("form:first");

		$.post(
			_requestBase,
			$(form).serialize() + '&op=save',
			function(data) {
				location.reload();
			});
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
	},

	editUser = function(e) {
		e.preventDefault();
		var userRow = $(this).parents("tr:first");
		var id = userRow.attr("data-id");

		$.post(
			_requestBase,
			{
				op : 'edit',
				id : id
			},
			function(data) {
				var user = $.parseJSON(data);
				$('#user-name').val(user.name);
				$('#user-email').val(user.email);
				$('#user-phone').val(user.phone);
				$('#user-admin').prop('checked', user.admin !== undefined && user.admin);

				if ($('#user-id').length === 0)
					$('<input type="hidden" name="id" id="user-id">').appendTo($('#user-submit-form'));
				$('#user-id').val(user.id);

				$('#user-submit').html('Save');
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
