$(function () {
	$("#dialog").dialog();
});
$("#add-todo-button").on("click", function () {
	$("#add-todo-dialog")
		.dialog()
		.find(":input:first").select();
});
$("#add-todo-dialog form").on("submit", function (event) {
	event.preventDefault();
	$.ajax({
		method: "POST",
		url: "addTodo.php",
		data: $(this).serialize(),
		dataType: 'json'
	}).then(function (response) {
		// TODO: update without refreshing
		window.location.reload();
	}).fail(function (e) {
		alert(e);
	});
});