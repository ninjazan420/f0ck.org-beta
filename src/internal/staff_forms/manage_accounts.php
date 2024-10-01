<?php
include_once "../database.php";
include_once "../staff_session.php";

if (!staff_session_is_valid())
	die("You are not allowed here");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Manage boards</title>
		<?php include "../link_css.php" ?>
	</head>

	<body>
		<?php include "../../topbar.php" ?>
		
		<h1 class=title>Manage staff accounts</h1>

		<table class=manage_table>
			<tr>
				<th>Username</th>
				<th>Role</th>
				<th>Contact email</th>
				<th>Edit</th>
			</tr>

			<?php
				$database = new Database();
				$accounts = $database->get_staff_accounts();

				foreach ($accounts as $account)
				{
					echo "
					<tr>
						<td>$account->username</td>
						<td>$account->role</td>
						<td>$account->contact_email</td>
						<td><a href=/internal/actions/staff/edit_account.php?username=$account->username>Edit (TODO)</a></td>
					</tr>
					";
				}
			?>
		</table>

		<a class=manage_link href=/internal/actions/staff/add_user.php>Add user (TODO)</a>

		<?php include "../../footer.php" ?>
	</body>
</html>