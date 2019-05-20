\c postgres
DROP DATABASE restaurant;
CREATE DATABASE restaurant;
\c restaurant

CREATE TABLE Restaurants (
    BranchID int primary key,
    Address varchar(255)
);


CREATE TABLE Staff (
    EmployeeID int primary key,
    Name varchar(55),
    DOB date,
    BranchID int not null,
	Position varchar(30),
	ManagerID int,
    Salary int ,
	FOREIGN KEY (BranchID) REFERENCES Restaurants(BranchID),
	FOREIGN KEY (ManagerID) REFERENCES Staff(EmployeeID)
);

CREATE TABLE Menu (
    DishID serial primary key,
    Name varchar(115),
    Price int
);

CREATE TABLE Ingredients(
    DateOfpurchase date,
    Name varchar(55) primary key,
    Price int,
    Vendor varchar(105)
);

CREATE TABLE IngredientDish (
    DishID int primary key,
    IngredientName varchar(55),
    DateOfPurchase date,
	FOREIGN KEY (DishID) REFERENCES Menu(DishID)
);

CREATE TABLE OrderDetails (
    OrderID int primary key,
    Billamount int,
    OrderTakenBy int,
    OrderStatus varchar(15),
	FOREIGN KEY (OrderTakenBy) REFERENCES Staff(EmployeeID)
);

CREATE TABLE OrderDishes(
	OrderID int,
	DishID int,
	Quantity int,
	FOREIGN KEY (OrderID) REFERENCES OrderDetails(OrderID),
	FOREIGN KEY (DishID) REFERENCES Menu(DishID)
);

CREATE TABLE PrepBy (
    EmployeeID int,
    OrderID int,
	FOREIGN KEY (EmployeeID) REFERENCES Staff(EmployeeID),
	FOREIGN KEY (OrderID) REFERENCES OrderDetails(OrderID)
);

CREATE TABLE Customer (
    CustomerID int primary key,
    TableNo int not null,
	ContactNo varchar
);

CREATE TABLE OrderCust (
    CustID int not null,
    OrderID int not null,
	FOREIGN KEY (CustID) REFERENCES Customer(CustomerID),
	FOREIGN KEY (OrderID) REFERENCES OrderDetails(OrderID)
);

CREATE TABLE Feedback (
    FeedbackID int primary key,
    CustID int,
    FeedbackText varchar(255),
    OrderID int,
	FOREIGN KEY (OrderID) REFERENCES OrderDetails(OrderID),
	FOREIGN KEY (CustID) REFERENCES Customer(CustomerID)
);

CREATE TABLE RestCust (
    BranchID int not null,
    CustID int not null,
	FOREIGN KEY (BranchID) REFERENCES Restaurants(BranchID),
	FOREIGN KEY (CustID) REFERENCES Customer(CustomerID) 
);

CREATE TABLE contact (
    id serial primary key,
    name varchar(100) not null,
    email varchar(100) not null,
    message varchar(300) not null,
    favourite varchar(20) not null
);    


CREATE TABLE orders (
    id serial primary key,
    name varchar(100) not null,
    dish varchar(100) not null,
    quantity int not null
); 