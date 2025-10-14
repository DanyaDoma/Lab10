<?php

class Group
{
    private string $groupName;
    private array $students = [];

    public function __construct(string $groupName)
    {
        $this->groupName = $groupName;
    }

    public function addStudent(Student $student): void
    {
        $this->students[] = $student;
    }

    public function getGroupAverage(): float
    {
        if (empty($this->students)) {
            return 0.0;
        }

        $total = 0;
        foreach ($this->students as $student) {
            $total += $student->getAverage();
        }
        return $total / count($this->students);
    }

    public function getBestStudent(): ?Student
    {
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

    public function getGroupName(): string
    {
        return $this->groupName;
    }

    public function getStudents(): array
    {
        return $this->students;
    }
}