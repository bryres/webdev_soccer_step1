<!DOCTYPE html>
<html lang="en">
    <script type="text/javascript">
        function deleteLeague(leagueID) {
            if (confirm('Are you sure you would like to delete this league?')) {
                window.parent.parent.location.href = 'index.php?action=delete_league&league_id=' + leagueID;
            }
        }

    </script>
    <head>
        <title>Admin: Leagues</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

        <!-- Styles -->
        <link href="../../../shared/ss/main.css<?php echo(getVersionString()); ?>" rel="stylesheet">
        <link href="styles.css<?php echo(getVersionString()); ?>" rel="stylesheet">
    </head>

    <body>

        <header>
            <h1 class="title">Leagues</h1>
        </header>
        <div class="button-wrap">
            <a href="./index.php?league_id=<?php echo $league_id ?>&action=show_add_league"><button id="add_league" class="s">Add League</button></a>
            <a href="../index.php"><button id="return_home" class="b">Back</button></a>
        </div>

        <nav style="width:60em;" class="navbar">
            <div id="navinside">
                <a href="#">
                    <div id="namenav" class="session-filter"><h2><strong>League</strong></h2></div>
                </a>
            </div>
        </nav>


        <div style="width:60em;" class="list-container">

            <?php foreach ($leagueList as $league) {
                $league_id = $league['league_id'];
                $league_name = $league['league_name'];

                ?>

                <div class="mentor" id="league">
                    <div class="session-filter league_name" onclick="javascript:location.href='./index.php?league_id=<?php echo $league_id ?>&action=show_modify_league'"><h2><?php echo($league_name); ?></h2></div>
                    <div style="float:right;">
                        <div class="session-filter delete">
                            <h4 class="del_icon" onclick="deleteLeague(<?php echo $league_id; ?>);">d</h4>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
        <script type="text/javascript" src="../../js/jquery.min.js<?php echo(getVersionString()); ?>"></script>
        <script type="text/javascript" src="../../js/jquery.easing.min.js<?php echo(getVersionString()); ?>"></script>
        <script type="text/javascript" src="../../js/jquery.plusanchor.min.js<?php echo(getVersionString()); ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('body').plusAnchor({
                    easing: 'easeInOutExpo',
                    speed: 700
                });
            });

            $('#fab-action').click(function () {
                $.featherlight($('<iframe width="1000" height="800" src="' + $(this).attr('trigger') + '"/>'))
            })

        </script>


    </body>
</html>
