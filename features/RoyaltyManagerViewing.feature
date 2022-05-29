Feature:
    In order to add tracking info of the customer viewing
    As a user
    I want to use an endpoint to set the data, depending on the episode viewed
    and its corresponding studio

    Scenario: I call the viewing endpoint with valid body
        When the user sends a POST request to viewing endpoint
        And it contains a valid body
        Then the response should be 202
        And an insert should be done
        
    Scenario: I call the viewing endpoint with invalid body
        When the user sends a POST request to viewing endpoint
        And it contains an invalid body
        Then a bad request exception should be thrown