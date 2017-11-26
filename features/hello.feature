Feature: Hello world!

  Scenario: Saying hello
    Given my name is "Kuba"
     When I visit the hello world page
     Then I should see "Hello Kuba!"

  Scenario: Saying hello anonymously
     When I visit the hello world page
     Then I should see "Hello stranger!"
