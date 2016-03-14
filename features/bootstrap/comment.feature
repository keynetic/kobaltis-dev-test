@javascript
Feature: Comment
  In order use app
  As a app user
  I need to be able to log in

  Scenario: Access denied
    Given I am on "/ornicar/comment"
    Then I should be on "/login"

  Scenario: Successful comment
    When I am authenticated as "testuser" using "boboleyo66"
    And I am on "/ornicar/comment"
    When I fill in "comment[body]" with "new comment"
    And I press "comment[save]"
    Then I should see "new comment on ornicar"
