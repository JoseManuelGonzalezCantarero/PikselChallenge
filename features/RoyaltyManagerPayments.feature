Feature:
    In order to list the royalty payments owed to the studios
    As a user
    I want to use an endpoint to get a list with all studios and another endpoint
    to retrieve only one studio, given its ID

    Scenario: I call the payments endpoint
      Given the user sends a GET request to the payments endpoint
      Then the response should be 200
      And I should have a Json body

    Scenario: I call the payment endpoint
      Given the user sends a GET request to the payment endpoint
      Then the response should be 200 using "665115721c6f44e49be3bd3e26606026" as rightsownerId
      And I should have a Json body

