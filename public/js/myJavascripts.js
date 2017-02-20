/**
 * @return {boolean}
 */
function ConfirmDelete()
{
	return confirm("Are you sure you want to delete?");
}

function toggleCommentsForm(commentId)
{
	$("#addCommentsForm-" + commentId).toggle();
}