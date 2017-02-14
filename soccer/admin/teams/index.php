<?php

require_once('../../util/main.php');
require_once('../../model/team_db.php');

function loadteamListPage() {
    global $teamList;

    $teamList = get_team_list();
    include 'team_list.php';
    exit();
}

verify_admin();

$action = strtolower(filter_input(INPUT_POST, 'action'));
if ($action == NULL) {
    $action = strtolower(filter_input(INPUT_GET, 'action'));
    if ($action == NULL) {
        $action = 'list';
    }
}

switch ($action) {
    case 'list':
        loadteamListPage();
        break;

    case 'show_add_team':
        $coachList = get_coach_list();
        $leagueList = get_league_list();
        $team_name = '';
        $coach_id = '';
        $league_id = '';
        include 'team_add.php';
        exit();
        break;

    case 'add_team':
        $choice = filter_input(INPUT_POST, 'choice');
        $team_name = filter_input(INPUT_POST, 'team_name');
        $coach_id = filter_input(INPUT_POST, 'coach_id');
        $league_id = filter_input(INPUT_POST, 'league_id');

        if ($choice == 'Add') {
            add_team($team_name, $league_id, $coach_id);
        }
        loadteamListPage();
        break;

    case 'show_modify_team';
        $team_id = filter_input(INPUT_GET, 'team_id');
        $team = get_team($team_id);
        $coachList = get_coach_list();
        $leagueList = get_league_list();

        $team_name = $team['name'];
        $coach_id = $team['coach_id'];
        $league_id = $team['league_id'];


        include 'team_modify.php';
        exit();
        break;

    case 'modify_team':
        $choice = filter_input(INPUT_POST, 'choice');
        $team_name = filter_input(INPUT_POST, 'team_name');
        $coach_id = filter_input(INPUT_POST, 'coach_id');
        $league_id = filter_input(INPUT_POST, 'league_id');
        $team_id = filter_input(INPUT_POST, 'team_id');

        if(filter_input(INPUT_POST, 'choice') == "Modify") {
            modify_team($team_id, $team_name, $league_id, $coach_id);
        }
        loadteamListPage();
        break;

    case 'delete_team':
        $team_id = filter_input(INPUT_GET, 'team_id');
        delete_team($team_id);

        loadteamListPage();
        break;

    default:
        display_error('Unknown team action: ' . $action);
        break;
}
?>