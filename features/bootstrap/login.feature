@javascript
Feature: Log in
  In order use app
  As a app user
  I need to be able to log in

  Scenario: Successful log in
    Given I am on "/login"
    When I am authenticated as "testuser" using "boboleyo66"
    Then I should be on the homepage

  Scenario: Unsuccessful log in
    Given I am on "/login"
    When I fill in "_username" with "error"
    And I fill in "_password" with "error"
    And I press "_submit"
    Then I should be on "/login"

