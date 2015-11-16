Feature: Administration backend

    Scenario: I can go on students list
        Given I am on "/student"
        Then I should see "Students list"

    Scenario: I can add a student
        Given I am on "/student/add"
        Then I fill in the following:
            | Email         | romaric.drigon@gmail.com  |
            | First name    | Romaric                   |
            | Last name     | Drigon                    |
        And I press "Save"
        Then I should be on "/student"
        And I should see "Romaric"
