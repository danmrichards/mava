@userDashboard
Feature: dashboard blocks
  In order to see my finished tasks
  As a user
  I am able to see finished task block in the dashboard

  @javascript
  Scenario: Showing the finished task block in the dashboard
  Given I log in as Jack
  And I am on "/dashboard"
  Then the response status code should be 200
  And I should see "Finished Tasks"