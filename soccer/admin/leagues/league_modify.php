<!DOCTYPE html>
<html lang="en">
<head>
    <title>Modify League</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <!-- Styles -->
    <link href="../../../shared/ss/main.css<?php echo(getVersionString()); ?>" rel="stylesheet">
    <link href="styles_add_modify.css<?php echo(getVersionString()); ?>" rel="stylesheet">

</head>

<body>
<form action="." method="post">
    <input type="hidden" name="action" value="modify_league">
    <div id="box">
        <div id="wrapper">
            <div id ="columns">
                <h1 class="title">Modify League</h1>

                <input type="hidden" name="action" value="modify_league">
                <input type="hidden" name="league_id" value="<?php echo htmlspecialchars($league_id); ?>">
                <label>League name</label>
                <input type="text" placeholder="League Name" name="league_name" value="<?php echo htmlspecialchars($league_name);?>" autofocus required>

                <div id="button-div">
                    <button style="cursor: pointer" class="submit s" type="submit" name="choice" value="Modify">Submit</button>
                    <button style="cursor: pointer" class="submit b" type="submit" name="choice" value="Back" formnovalidate>Cancel</button>
                </div>
            </div>
        </div>
</form>
</body>
</html>