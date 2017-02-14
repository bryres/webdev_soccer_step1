<!DOCTYPE html>
<html lang="en">
<head>
    <title>Modify Team</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <!-- Styles -->
    <link href="../../../shared/ss/main.css<?php echo(getVersionString()); ?>" rel="stylesheet">
    <link href="styles_add_modify.css<?php echo(getVersionString()); ?>" rel="stylesheet">

</head>
<body>
<form action="." method="post">
    <input type="hidden" name="action" value="modify_team">
    <div class="box">
        <div class="wrapper">
            <div class="columns">
                <h1 class="title">Modify Team</h1>

                <input type="hidden" name="action" value="modify_team">
                <input type="hidden" name="team_id" value="<?php echo htmlspecialchars($team_id); ?>">

                <div class="row">
                    <label>Team Name</label>
                    <input type="text" name="team_name" value="<?php echo $team_name;?>" autofocus required>
                </div>

                <div class="row">
                    <label>League</label>
                    <select name="league_id" required>
                        <?php foreach ($leagueList as $league) { ?>
                            <option <?php echo($league_id === $league['league_id']?"selected":"")?>
                                    value="<?php echo $league['league_id'] ?>"><?php echo $league['league_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="row">
                    <label>Coach</label>
                    <select name="coach_id" required>
                        <?php foreach ($coachList as $coach) { ?>
                            <option <?php echo($coach_id === $coach['coach_id']?"selected":"")?>
                                    value="<?php echo $coach['coach_id'] ?>"><?php echo $coach['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="button-div">
                    <button style="cursor: pointer" class="submit s" type="submit" name="choice" value="Modify">Submit</button>
                    <button style="cursor: pointer" class="submit b" type="submit" name="choice" value="Back" formnovalidate>Cancel</button>
                </div>
            </div>
        </div>
</form>
</body>
</html>