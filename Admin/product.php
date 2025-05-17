<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>
<?php include("includes/top-header.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Product Grid</title></head>
  <body>
<pre>
 1.  user table.
| Column Name    | Data Type      | Description             |
| -------------- | -------------- | ----------------------- |
| user\_id       | INT (PK)       | Unique ID for user      |
| name           | VARCHAR        | Full name               |
| email          | VARCHAR (UNIQ) | Login email             |
| password\_hash | VARCHAR        | Hashed password         |
| phone          | VARCHAR        | Phone number (optional) |
| address        | TEXT           | Shipping address        |
| created\_at    | TIMESTAMP      | Account creation date   |
</pre>
<pre>
  2.  Product table
| Column Name     | Data Type | Description              |
| --------------- | --------- | ------------------------ |
| product\_id     | INT (PK)  | Unique product ID        |
| name            | VARCHAR   | Product name             |
| description     | TEXT      | Product description      |
| price           | DECIMAL   | Price of the product     |
| stock\_quantity | INT       | Available stock          |
| category\_id    | INT (FK)  | Link to product category |
| image\_url      | VARCHAR   | URL to product image     |
| created\_at     | TIMESTAMP | When product was added   |
</pre><pre>3.
    category Table
| Column Name  | Data Type | Description                      |
| ------------ | --------- | -------------------------------- |
| category\_id | INT (PK)  | Category ID                      |
| name         | VARCHAR   | Category name                    |
| parent\_id   | INT (FK)  | Self-reference for subcategories |
</pre><pre>4. Cart Table
| Column Name    | Data Type | Description         |
| -------------- | --------- | ------------------- |
| cart\_item\_id | INT (PK)  | Unique ID           |
| user\_id       | INT (FK)  | Owner of the cart   |
| product\_id    | INT (FK)  | Product in the cart |
| quantity       | INT       | Number of units     |
| added\_at      | TIMESTAMP | When item was added |
    Or Review one of them
    | Column Name | Data Type | Description      |
| ----------- | --------- | ---------------- |
| review\_id  | INT (PK)  | Unique review ID |
| user\_id    | INT (FK)  | Reviewer         |
| product\_id | INT (FK)  | Reviewed product |
| rating      | INT       | 1–5 stars        |
| comment     | TEXT      | Review text      |
| created\_at | DATETIME  | Timestamp        |

</pre>

<pre>5. Order Table
| Column Name       | Data Type | Description                  |
| ----------------- | --------- | ---------------------------- |
| order\_id         | INT (PK)  | Unique order ID              |
| user\_id          | INT (FK)  | Buyer                        |
| status            | VARCHAR   | e.g., pending, shipped, etc. |
| total\_amount     | DECIMAL   | Total price                  |
| placed\_at        | TIMESTAMP | Date and time of order       |
| shipping\_address | TEXT      | Destination                  |
</pre><pre>
    6.order item table
| Column Name     | Data Type | Description            |
| --------------- | --------- | ---------------------- |
| order\_item\_id | INT (PK)  | Unique ID              |
| order\_id       | INT (FK)  | Linked order           |
| product\_id     | INT (FK)  | Product                |
| quantity        | INT       | Number of units        |
| price           | DECIMAL   | Price at purchase time |

</pre><pre>7.Peyment Table
| Column Name     | Data Type | Description               |
| --------------- | --------- | ------------------------- |
| payment\_id     | INT (PK)  | Unique payment ID         |
| order\_id       | INT (FK)  | Related order             |
| payment\_method | VARCHAR   | Credit card, PayPal, etc. |
| amount          | DECIMAL   | Payment amount            |
| paid\_at        | TIMESTAMP | Date/time of payment      |
| payment\_status | VARCHAR   | Paid, Failed, Pending     |
</pre>
  </body>
</html>