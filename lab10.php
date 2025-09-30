<?php
// 1.
class Student {
    private string $firstName;
    private string $lastName;
    private array $grades = [];

    public function __construct(string $firstName, string $lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
    public function addGrade(int $grade): void {
        if ($grade >= 0 && $grade <= 100) {
            $this->grades[] = $grade;
        } else {
            echo "Error: оценка должна быть числом от 0 до 100.\n";
        }
    }
    public function getAverage(): float {
        if (empty($this->grades)) {
            return 0.0;
        }
        $sumOfGrades = array_sum($this->grades);
        return $sumOfGrades / count($this->grades);
    }
    public function getFirstName(): string {
        return $this->firstName;
    }
    public function getLastName(): string {
        return $this->lastName;
    }
}
// 2.
class Group {
    private string $groupName;
    private array $students = [];

    public function __construct(string $groupName) {
        $this->groupName = $groupName;
    }
        public function addStudent(Student $student): void {
        $this->students[] = $student;
    }
    public function getGroupAverage(): float {
        if (empty($this->students)) {
            return 0.0;
        }
        $totalAverage = 0.0;
        foreach ($this->students as $student) {
            $totalAverage += $student->getAverage();
        }
        return $totalAverage / count($this->students);
    }
    public function getBestStudent(): ?Student {
        if (empty($this->students)) {
            return null;
        }
        $bestStudent = $this->students[0];
        foreach ($this->students as $student) {
            if ($student->getAverage() > $bestStudent->getAverage()) {
                $bestStudent = $student;
            }
        }
        return $bestStudent;
    }
    public function getGroupName(): string {
        return $this->groupName;
    }
    public function getStudents(): array {
        return $this->students;
    }
}
// 3.
function printStudentInfo(Student $student): void {
    echo "Студент: {$student->getFirstName()} {$student->getLastName()}, Средний балл: " . number_format($student->getAverage(), 2) . "\n";
}
function printGroupInfo(Group $group): void {
    echo "\nИнформация о группе \"{$group->getGroupName()}\" ---\n";
    echo "Количество студентов: " . count($group->getStudents()) . "\n";
    echo "Общий средний балл группы: " . number_format($group->getGroupAverage(), 2) . "\n";
}

// 4.
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


echo "Информация о студентах\n";
printStudentInfo($studentOne);
printStudentInfo($studentTwo);
printStudentInfo($studentThree);

printGroupInfo($myGroup);

$bestStudent = $myGroup->getBestStudent();
if ($bestStudent) {
    echo "\nЛучший студент группы: {$bestStudent->getFirstName()} {$bestStudent->getLastName()} (Средний балл: " . number_format($bestStudent->getAverage(), 2) . ")\n";
} else {
    echo "\nВ группе нет студентов.\n";
}