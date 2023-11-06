SELECT Customers.name, SUM(Order_Items.quantity * Order_Items.unit_price) AS total_purchase_amount
FROM Customers
INNER JOIN Orders ON Customers.customerID = Orders.customerID
INNER JOIN Order_Items ON Orders.orderID = Order_Items.orderID
GROUP BY Customers.name
ORDER BY total_purchase_amount DESC
LIMIT 5;
