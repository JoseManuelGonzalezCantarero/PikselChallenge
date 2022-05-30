Feature:
    In order to reset the internal state of the system
    As a user
    I want to use an endpoint to set everything back to 0

    Scenario: I call the reset endpoint
        Given the user sends a POST request to reset endpoint
        Then the response should be 202
        And the royalties table should be clean
