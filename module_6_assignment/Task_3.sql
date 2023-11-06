SELECT Categories.name AS category_name, SUM(Order_Items.quantity * Order_Items.unit_price) AS total_revenue
FROM Categories
INNER JOIN Products ON Categories.categoryID = Products.categoryID
INNER JOIN Order_Items ON Products.productID = Order_Items.productID
GROUP BY Categories.name
ORDER BY total_revenue DESC;
