# Task2 Calculator

## Usage
`php task1\indexphp add`
`php task1\indexphp add 1`
`php task1\indexphp add 2,3`
`php task1\indexphp add 4,5,6`
`php task1\indexphp add 2,3,4,5`
`php task2\index.php add 4,7,3,4,7,3,5,6,7,4,3,2,5,7,5,3,4,6,7,8,9,5,5,5,4,3,2`

## Problem:

In task 1, we were handling 0, 1 or 2 parameters. Now we need to add capability of handling multiple numbers so that all  following commands work correctly.

`php calculator.php add`
`php calculator.php add 1`
`php calculator.php add 2,3`
`php calculator.php add 4,5,6`
`php calculator.php add 2,3,4,5`
`php calculator.php add 4,7,3,4,7,3,5,6,7,4,3,2,5,7,5,3,4,6,7,8,9,5,5,5,4,3,2`

Obviously, its output should be:
0
1
5
15
14
133
In short, it should be able to take multiple numbers and should add them.