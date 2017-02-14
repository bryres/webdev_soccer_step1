<?php

function get_team_list() {
    $query = 'SELECT team_id, t.name, CONCAT(coach_last_name, ", ", coach_first_name) as coach, league_name
              from team t, league l, coach c
              where t.league_id = l.league_id
              and t.coach_id = c.coach_id
			  order by name';
    return get_list($query);
}

function get_coach_list() {
    $query = 'SELECT coach_id, CONCAT(coach_last_name, ", ", coach_first_name) as name
              from coach
			  order by coach_last_name, coach_first_name';
    return get_list($query);
}

function get_league_list() {
    $query = 'SELECT league_id, league_name
              from league
			  order by league_name';
    return get_list($query);
}

function get_team($team_id) {
    global $db;
    $query = 'select team_id, league_id, name, coach_id
              from team 
              where team_id = :team_id';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':team_id', $team_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    }
    catch (PDOException $e) {
        display_db_exception($e);
        exit();
    }
}

function add_team($team_name, $league_id, $coach_id) {
    global $db;
    $query = 'INSERT INTO team
                 (league_id, name, coach_id)
              VALUES
                 (:league_id, :team_name, :coach_id)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':team_name', $team_name);
        $statement->bindValue(':league_id', $league_id);
        $statement->bindValue(':coach_id', $coach_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_exception($e);
        exit();
    }
}


function modify_team($team_id, $team_name, $league_id, $coach_id) {
    global $db;
    $query = 'update team set
                 name = :team_name,
                 league_id = :league_id,
                 coach_id = :coach_id
                 where team_id = :team_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':team_name', $team_name);
        $statement->bindValue(':league_id', $league_id);
        $statement->bindValue(':coach_id', $coach_id);
        $statement->bindValue(':team_id', $team_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_exception($e);
        exit();
    }
}


function delete_team($team_id){
    global $db;
    $query = 'delete from team
              where team_id = :team_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':team_id', $team_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_exception($e);
        exit();
    }
}

?>