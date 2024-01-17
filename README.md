# PHP Complete CRUD Application

### \***\*Creating the Database Table\*\***

Create a table named *crud* inside your MySQL database using the following code.

```sql
CREATE TABLE `crud` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
)
```

### \***\*Copy files to htdocs folder\*\***

Download the above files. Create a folder named _crud_ inside _htdocs_ folder in _xampp_ directory. Finally, copy the _crud_ folder inside _htdocs_ folder. Now, visit [localhost/crud](http://localhost/crud) in your browser and you should see the application.
