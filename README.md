# College AdmissionSystem
Web application for student admission system

## Pre-requisites
  Xampp / Apache / mysql

  ## :rocket: Steps to run the application
   ### Running in xampp server
  1. start apache and mysql in xampp server
  2. clone this repository to your xampp *htdocs* folder
  3. navigate to [localhost/phpmyadmin](http://localhost/phpmyadmin) dashboad
  4. import and run the sql file(database.sql file in admission/database folder)
  5. head to [localhost/AdmissionSystem](http://localhost/AdmissionSystem) for running application
  6. use *admin* for username and password
  
   ### Running as docker container
  1. clone this repository to your local machine
  2. navigate to AdmissionSystem folder in *terminal/commandline*
  3. run **docker-compose up -d** 
  
    Note: application runs on port 8000 and mysql on port 3306
    
  ## Configuring application
  - change your passwords in *login table* in **admission database**
  - assign ports and database connection details in *admission/database/dbconnection.php* if your running apache and mysql in different ports

 ## :busts_in_silhouette: Maintainers
  - [G-vicky](https://github.com/G-vicky)
