<?php

class Student
{
    private string $firstName;
    private string $lastName;
    private array $grades = [];

    public function __construct(string $firstName, string $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function addGrade(int $grade): void
    {
        if ($grade >= 0 && $grade <= 100) {
            $this->grades[] = $grade;
        } else {
            echo "Error: оценка должна быть числом от 0 до 100.\n";
        }
    }

    public function getAverage(): float
    {
        if (empty($this->grades)) {
            return 0.0;
        }
        return array_sum($this->grades) / count($this->grades);
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }
}