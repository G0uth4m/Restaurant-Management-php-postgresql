SELECT M.name, O.Quantity from Menu M, OrderDetails OD, OrderDishes O where OD.OrderID=O.OrderID and O.DishID=M.DishID and OD.OrderStatus='Not Done';
/*To get the orders that are still pending i.e not sent out (for chefs)*/

SELECT OC.CustID, M.name, O.Quantity from Menu M, OrderDetails OD, OrderDishes O, OrderCust OC where OC.OrderID=OD.OrderID AND OD.OrderID=O.OrderID and O.DishID=M.DishID;
/*To get the total dishes ordered for the day to which customer*/

SELECT M.name, O.Quantity, M.Price from Menu M, OrderDetails OD, OrderDishes O, OrderCust OC where OC.OrderID=OD.OrderID AND OD.OrderID=O.OrderID and O.DishID=M.DishID and OC.CustID=1;
/*To get the bill details of each customer i.e. in this case customer 1*/

SELECT S.Name, Y.NoOfOrders  from Staff S, (SELECT OrderTakenBy, COUNT (OrderTakenBy) NoOfOrders from OrderDetails group by OrderTakenBy) as Y where Y.OrderTakenBy=S.EmployeeID;
/*To get the number of orders taken by each employee (waiter) i.e. performance report*/

SELECT S.*, d.age from (SELECT S.DOB,('2019/03/26'-S.DOB)/365 as Age from Staff S) as d, Staff S where S.DOB=d.DOB;
/* To get the details of each of each employee, including age*/ 

SELECT S.* from Staff S, Restaurants R where R.Address='Brigade Road' and R.BranchID=S.BranchID;
/* To get the details of the employees who work in a particular branch, in this case Brigade Road*/

SELECT M.name from Customer as C, OrderCust as OC, OrderDishes as OD, Menu as M where C.TableNo=3 AND C.CustomerID=OC.CustID AND OC.OrderID=OD.OrderID AND M.DishID=OD.DishID;
/*To get the dishes that a particular table number has ordered, in this case table 3*/

SELECT i.name from (SELECT i.dateofpurchase,'2019/03/26'-i.dateofpurchase as Duration from ingredients i) as d, ingredients i where d.duration>15 and i.dateofpurchase=d.dateofpurchase;
/*To select the ingredients that have been bought 15 or more days ago (Expired stock)*/

SELECT M.name, O.Quantity, C.TableNo from Menu M, OrderDetails OD, OrderDishes O, Customer C, OrderCust OC where OC.CustID=C.CustomerID and OC.OrderID=O.OrderID and OD.OrderID=O.OrderID and O.DishID=M.DishID and OD.OrderStatus='Not Done';
/*To get the orders that are still pending i.e not sent out, and the table number that they belong to (for waiters)*/

SELECT * from  Staff S where S.managerid=30001;
/* To get the details of each of each employee under a certain manager, in this case manager with ID 30001*/

 SELECT M.name, OD.Quantity from Menu M, OrderDishes OD, RestCust RC, OrderCust OC, Restaurants R where RC.BranchId=R.BranchID and RC.CustID=OC.CustID and OC.OrderID=OD.OrderID and OD.DishID=M.DishID and R.Address='HSR Layout';
 /*To get the dishes that were ordered in a particular branch of a restaurant, in this case HSR Layout*/

 SELECT favourite, COUNT(favourite) AS cnt FROM contact GROUP BY favourite ORDER by cnt DESC LIMIT 3
 /* To get top 3 liked foods by the customers*/