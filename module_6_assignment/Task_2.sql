SELECT Products.name AS product_name, Order_Items.quantity, (Order_Items.quantity * Order_Items.unit_price) AS total_amount
FROM Order_Items
INNER JOIN Products ON Order_Items.productID = Products.productID
ORDER BY Order_Items.orderID ASC;
