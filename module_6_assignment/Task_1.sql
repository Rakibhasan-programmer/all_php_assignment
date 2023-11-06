SELECT Customers.customerID, Customers.name, Customers.email, Customers.location, COUNT(Orders.orderID) AS total_orders
FROM Customers
LEFT JOIN Orders ON Customers.customerID = Orders.customerID
GROUP BY Customers.customerID, Customers.name, Customers.email, Customers.location
ORDER BY total_orders DESC;
