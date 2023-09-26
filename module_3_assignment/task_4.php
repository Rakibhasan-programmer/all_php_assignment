<?php

function calculateAverageGrades($grades) {
    foreach ($grades as $student => $subjects) {
        $total = array_sum($subjects);
        $count = count($subjects);
        $average = $total / $count;
        printf("Student: %d, Average Grade: %.2f \n", $student+1, $average);
    }
}

$studentGrades = array(
    array('Math' => 85, 'English' => 92, 'Science' => 78),
    array('Math' => 88, 'English' => 95, 'Science' => 90),
    array('Math' => 75, 'English' => 82, 'Science' => 88)
);

calculateAverageGrades($studentGrades);

