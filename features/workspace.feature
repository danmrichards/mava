Feature: Workspace administration
  In order to manage workspaces
  As an admin
  I am able to see, add, edit and delete workspaces in the backend

  @javascript
  Scenario: Seeing a list of available workspaces
  Given I am logged in as admin
  And There are 3 workspaces
  And I am on "/admin"
  When I click on "Workspaces"
  Then I should see 3 items in the table

  @javascript
  Scenario: Adding a new workspace
  Given I am logged in as admin
  And I am on "/admin/workspaces"
  When I click on "New"
  And I fill the "Title" with "My Workspace"
  And I fill the "Description" with "Testing add functionality"
  And I press "save"
  Then I should see "New workspace created"

  @javascript
  Scenario: Editing a workspace
  Given I am logged in as admin
  And I am on "/admin/workspaces"
  When I click on "edit"
  And I fill the "Title" with "Edited Title"
  And I fill the "Description" with "Edited description"
  And I press "save"
  Then I should see "All changes are saved"

  @javascript
  Scenario: Deleting a workspace
  Given I am logged in as admin
  And I am on "/admin/workspaces"
  When I click on "delete"
  And I press "yes"
  Then I should see "The workspace has been removed"