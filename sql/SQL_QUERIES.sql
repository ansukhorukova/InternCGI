SELECT emp.id, emp.name, emp.surname, pay.amount
FROM employees as emp
JOIN payments as pay
ON emp.id = pay.employee_id
WHERE pay.amount = (SELECT MAX(amount) FROM payments) AND pay.payment_date = '2016-06-10';

SELECT emp.id, emp.name, emp.surname, pay.amount
FROM employees as emp
JOIN payments as pay
ON emp.id = pay.employee_id
WHERE pay.amount = (SELECT MAX(amount) FROM payments) AND pay.payment_date >= '2016-04-01' AND pay.payment_date < '2016-07-01' LIMIT 1;

SELECT SUM(amount) FROM payments WHERE payment_date >= '2016-06-01' AND payment_date < '2016-07-01';

SELECT name, surname, amount
FROM employees as e
JOIN payments as p
ON e.id = p.employee_id
WHERE (SELECT MAX(amount) FROM payments WHERE amount < (SELECT MAX(amount) FROM payments)) LIMIT 1
;
