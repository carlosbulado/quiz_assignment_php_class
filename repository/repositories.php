<?php
include '../../repository/database.php';

function getAll($tableName)
{
    $db = new Database();
    $db->connect();
    $db->prepare('SELECT * FROM ' . $tableName);
    $db->execute();
    $regs = $db->$result;
    $db->close();
    return $regs;
}

function getById($tableName, $id)
{
    $db = new Database();
    $reg = [];
    $db->connect();
    $db->prepare('SELECT * FROM ' . $tableName . ' WHERE id = :id');
    $db->bindParam(':id', $id);
    $db->execute();
    $reg = $db->$result[0];
    $db->close();
    return $reg;
}

function removeById($tableName, $id)
{
    if($id)
    {
        $db = new Database();
        $db->connect();
        $db->prepare('DELETE FROM ' . $tableName . ' WHERE id = :id');
        $db->bindParam(':id', $id);
        $db->execute();
        $db->close();
    }
}

class TestRepository
{
    function getAll() { return getAll('tests'); }

    function getById($id)
    {
        $regs = getById('tests', $id);

        if($regs)
        {
            $dbQuestions = new Database();
            $dbQuestions->connect();
            $dbQuestions->prepare('SELECT * FROM questios WHERE testId = :testId');
            $dbQuestions->bindParam(':testId', $id);
            $dbQuestions->execute();
            $regs['questions'] = $dbQuestions->$result;
            $dbQuestions->close();

            return $regs;
        }
        else
        {
            $reg['id'] = 0;
            $reg['name'] = '';
            $reg['categoryId'] = 0;
        }

        return $reg;
    }

    function save($id, $name, $categoryId)
    {
        $db = new Database();
        $db->connect();

        $sqlInsert = "INSERT INTO tests (name, categoryId) VALUES (:name, :categoryId)";
        $sqlUpdate = "UPDATE tests SET name = :name, categoryId = :categoryId WHERE id = :id";

        if($id)
        {
            $db->prepare($sqlUpdate);
            $db->bindParam(':id', $id);
        }
        else
        {
            $db->prepare($sqlInsert);
        }

        $db->bindParam(':name', $name);
        $db->bindParam(':categoryId', $categoryId);
        $db->execute();
        $db->close();
    }

    function saveTestDone($testId, $name, $categoryId, $userId)
    {
        $db = new Database();
        $db->connect();

        $sqlInsert = "INSERT INTO tests_done (name, categoryId, testId, userId) VALUES (:name, :categoryId, :testId, :userId); SELECT LAST_INSERT_ID();";

        $db->prepare($sqlInsert);

        $db->bindParam(':name', $name);
        $db->bindParam(':categoryId', $categoryId);
        $db->bindParam(':testId', $testId);
        $db->bindParam(':userId', $userId);
        $db->execute();
        $dbLastId = new Database();
        $stmtLastId = $dbLastId->$conn->query("SELECT id FROM tests_done ORDER BY id DESC");
        $last_id = $stmtLastId->fetchColumn();
        $db->close();
        $dbLastId->close();

        return $last_id;
    }

    function remove($id) { removeById('tests', $id); }

    function getTestDoneById($id)
    {
        $regs = getById('tests_done', $id);

        if($regs)
        {
            $dbQuestions = new Database();
            $dbQuestions->connect();
            $dbQuestions->prepare('SELECT * FROM questions_done WHERE testId = :testId');
            $dbQuestions->bindParam(':testId', $id);
            $dbQuestions->execute();
            $regs['questions'] = $dbQuestions->$result;
            $dbQuestions->close();

            return $regs;
        }
        else
        {
            $reg['id'] = 0;
            $reg['name'] = '';
            $reg['categoryId'] = 0;
        }

        return $reg;
    }
}

class QuestionRepository
{
    function getAll() { return getAll('questios'); }

    function getById($id)
    {
        $regs = getById('questios', $id);

        if($regs) return $regs;
        else
        {
            $reg['id'] = 0;
            $reg['testId'] = 0;
            $reg['name'] = '';
            $reg['rightAnswer'] = -1;
            $reg['answer_01'] = '';
            $reg['answer_02'] = '';
            $reg['answer_03'] = '';
            $reg['answer_04'] = '';
        }

        return $reg;
    }

    function save($id, $name, $testId, $rightAnswer, $answer_01, $answer_02, $answer_03, $answer_04)
    {
        $db = new Database();
        $db->connect();

        $sqlInsert = "INSERT INTO questios (name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) VALUES (:name, :testId, :rightAnswer, :answer_01, :answer_02, :answer_03, :answer_04)";
        $sqlUpdate = "UPDATE questios SET name = :name, testId = :testId, rightAnswer = :rightAnswer, answer_01 = :answer_01, answer_02 = :answer_02, answer_03 = :answer_03, answer_04 = :answer_04 WHERE id = :id";

        if($id)
        {
            $db->prepare($sqlUpdate);
            $db->bindParam(':id', $id);
        }
        else
        {
            $db->prepare($sqlInsert);
        }

        $db->bindParam(':name', $name);
        $db->bindParam(':testId', $testId);
        $db->bindParam(':rightAnswer', $rightAnswer);
        $db->bindParam(':answer_01', $answer_01);
        $db->bindParam(':answer_02', $answer_02);
        $db->bindParam(':answer_03', $answer_03);
        $db->bindParam(':answer_04', $answer_04);
        $db->execute();
        $db->close();
    }

    function remove($id) { removeById('questios', $id); }

    function saveQuestionDone($name, $testId, $optionSelected, $answer_01, $answer_02, $answer_03, $answer_04, $isCorrect)
    {
        $db = new Database();
        $db->connect();

        $sqlInsert = "INSERT INTO questions_done (name, testId, optionSelected, answer_01, answer_02, answer_03, answer_04, isCorrect) VALUES (:name, :testId, :optionSelected, :answer_01, :answer_02, :answer_03, :answer_04, :isCorrect)";

        $db->prepare($sqlInsert);

        $db->bindParam(':name', $name);
        $db->bindParam(':testId', $testId);
        $db->bindParam(':optionSelected', $optionSelected);
        $db->bindParam(':answer_01', $answer_01);
        $db->bindParam(':answer_02', $answer_02);
        $db->bindParam(':answer_03', $answer_03);
        $db->bindParam(':answer_04', $answer_04);
        $db->bindParam(':isCorrect', $isCorrect);
        
        $db->execute();
        $db->close();
    } 
}

class UserRepository
{
    function getAll() { return getAll('user'); }

    function getById($id)
    {
        $regs = getById('user', $id);

        if($regs) return $regs;
        else
        {
            $reg['id'] = 0;
            $reg['idAdmin'] = 0;
            $reg['first_name'] = '';
            $reg['last_name'] = '';
            $reg['username'] = '';
            $reg['password'] = '';
        }

        return $reg;
    }

    function save($id, $first_name, $last_name, $isAdmin, $username, $password)
    {
        $db = new Database();
        $db->connect();

        $sqlInsert = "INSERT INTO user (first_name, last_name, isAdmin, username, password) VALUES (:first_name, :last_name, :isAdmin, :username, :password)";
        $sqlUpdate = "UPDATE user SET first_name = :first_name, last_name = :last_name, isAdmin = :isAdmin, username = :username, password = :password WHERE id = :id";

        if($id)
        {
            $db->prepare($sqlUpdate);
            $db->bindParam(':id', $id);
        }
        else
        {
            $db->prepare($sqlInsert);
        }

        $db->bindParam(':first_name', $first_name);
        $db->bindParam(':last_name', $last_name);
        $db->bindParam(':isAdmin', $isAdmin);
        $db->bindParam(':username', $username);
        $db->bindParam(':password', $password);
        $db->execute();
        if($id)
        {
            $last_id = $id;
        }
        else
        {
            $dbLastId = new Database();
            $stmtLastId = $dbLastId->$conn->query("SELECT id FROM user ORDER BY id DESC");
            $last_id = $stmtLastId->fetchColumn();
            $dbLastId->close();
        }
        $db->close();

        return $last_id;
    }

    function remove($id) { removeById('user', $id); }
}
?>