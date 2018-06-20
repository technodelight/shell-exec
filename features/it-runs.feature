Feature: it works!
  As a developer
  I want easily mockable shell outputs
  So I can use Shell\FixtureContext in my own project

  Scenario: A command can be executed
    Given the command "test" will return the following output:
    """
    yay it works!
    """