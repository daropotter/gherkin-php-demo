[![MIT License](https://img.shields.io/apm/l/atomic-design-ui.svg?)](https://choosealicense.com/licenses/mit/)

# Gherkin in PHP demo

This is a demo of Gherkin in PHP using Behat library. The example app is a simple
Symfony application with a few JSON endpoints. The demo shows how you can use Behat
to test your endpoints checking the response code and body against the expected values.

## Setup

The demo project is already set up.
If you don't want to set up your own project, skip this chapter directly to execution.

The setup is really straightforward. Use Composer to add the dependency and initialize it.

Add Behat to your project:
```bash
composer require --dev behat/behat
```
Initialize Behat. This creates `features` directory and `FeatureContext.php` where you
can add new steps:
```bash
php vendor/bin/behat --init
```

## Execute

1. Add more tests to your feature file(s). Unrecognized steps will be highlighted in the IDE.
With help from the Cucumber plugin add missing steps to the context file(s).

1. Alternatively, run the tests. Behat will recognize missing steps and will tell
you what to add to the context file(s).

1. Fill the new methods with your code that do what the steps suggest.

1. Run your tests with:
```bash
php vendor/bin/behat
```
Alternatively, you can run tests directly from PhpStorm or VS Code using the Cucumber plugin.


## License

[MIT](https://choosealicense.com/licenses/mit/)


## 🔗 Links
[![github](https://img.shields.io/badge/github-000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/daropotter)
[![gitlab](https://img.shields.io/badge/gitlab-003385?style=for-the-badge&logo=gitlab&logoColor=white)](https://gitlab.com/daropotter)
[![gitlab](https://img.shields.io/badge/discord-0A66C2?style=for-the-badge&logo=discord&logoColor=white)](https://discordapp.com/users/355099945805807627)
[![twitter](https://img.shields.io/badge/twitter-1DA1F2?style=for-the-badge&logo=twitter&logoColor=white)](https://twitter.com/daropotter)

