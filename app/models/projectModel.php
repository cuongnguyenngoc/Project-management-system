<?php

class ProjectModel extends DBModel {

    public function getProjectData() {

        $q = "SELECT pr.dept_id, pr.description, pr.project_id, pr.project_Name
					FROM project AS pr, teacher AS tc
					WHERE pr.teacher_id = tc.teacher_id";
        return $this->getDataManyRows($q);
    }

    function updateProjects($project_name, $description, $project_id) {
        $q = "UPDATE project SET project_name = '{$project_name}', description = '{$description}'";
        $q .= " WHERE project_id = {$project_id}";

        return $this->insertData($q);
    }

    public function insertProject($dept_id, $project_name, $description, $teacher_id) {

        $q = "INSERT INTO project(dept_id,project_name, description, teacher_id)";
        $q .= " VALUES({$dept_id}, '{$project_name}', '{$description}', {$teacher_id})";

        return $this->insertData($q);
    }

    public function getProjectDataById($project_id) {

        $q = "SELECT pr.dept_id, pr.description, pr.project_name
    			FROM project AS pr
    			WHERE project_id = $project_id";

        return $this->getDataOneRow($q);
    }

    public function deleteProjectById($project_id) {

        $q = "DELETE FROM project WHERE project_id = {$project_id}";
        return $this->deleteRow($q);
    }

}

?>