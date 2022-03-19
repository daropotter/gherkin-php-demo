Feature: Test someController

  Scenario: I want to get boilerplate controller response
    Given I am authorised as "test_user"
    When I send a "GET" request to "/some"
    Then The response code should be 200
    And The response should be the following JSON:
    """
      {
        "message": "Welcome to your new controller!",
        "path": "src/Controller/SomeController.php"
      }
    """

  Scenario: I want to get a table response
    When I send a "GET" request to "/some/table"
    Then The response code should be 200
    And The response should form the following table:
      | name   | surname | age | position   | payment |
      | John   | Smith   | 32  | Accountant | 1000    |
      | Monica | Belucci | 45  | Actress    | 2500    |
      | John   | Paul    | 38  | Musician   | 2800    |

  Scenario: Test
    When I am "Dariusz"