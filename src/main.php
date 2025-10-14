<?php

require_once 'Student.php';
require_once 'Group.php';

function printStudentInfo(Student $student): void
{
    echo "Студент: {$student->getFirstName()} {$student->getLastName()}, " .
         "Средний балл: " . number_format($student->getAverage(), 2) . "\n";
}

function printGroupInfo(Group $group): void
{
    echo "\nИнформация о группе \"{$group->getGroupName()}\" ---\n";
    echo "Количество студентов: " . count($group->getStudents()) . "\n";
    echo "Общий средний балл группы: " . number_format($group->getGroupAverage(), 2) . "\n";
}

$studentOne = new Student("Иван", "Петров");
$studentOne->addGrade(85);
$studentOne->addGrade(92);
$studentOne->addGrade(78);

$studentTwo = new Student("Лена", "Орлова");
$studentTwo->addGrade(95);
$studentTwo->addGrade(88);
$studentTwo->addGrade(90);

$studentThree = new Student("Алексей", "Иванов");
$studentThree->addGrade(70);
$studentThree->addGrade(75);
$studentThree->addGrade(80);


$myGroup = new Group("Группа А");
$myGroup->addStudent($studentOne);
$myGroup->addStudent($studentTwo);
$myGroup->addStudent($studentThree);

echo "Информация о студентах:\n";
printStudentInfo($studentOne);
printStudentInfo($studentTwo);
printStudentInfo($studentThree);

printGroupInfo($myGroup);

$bestStudent = $myGroup->getBestStudent();
if ($bestStudent) {
    echo "\nЛучший студент группы: {$bestStudent->getFirstName()} {$bestStudent->getLastName()} " .
         "(Средний балл: " . number_format($bestStudent->getAverage(), 2) . ")\n";
} else {
    echo "\nВ группе нет студентов.\n";
}