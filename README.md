# College AdmissionSystem
Web application for student admission system

## Pre-requisites
  Xampp / Apache / mysql

  ## Steps to run the application
   ### Running in xampp server
    1. start apache and mysql in xampp server
    2. clone this repository to your xampp htdocs folder
    3. navigate to [localhost/phpmyadmin](http://localhost/phpmyadmin) dashboad
    4. import and run the sql file(database.sql file in admission/database folder)
    5. head to [localhost/AdmissionSystem](http://localhost/AdmissionSystem) for running application
        
  ## Configuring application
    - change your passwords in *login table* in **admission database**
    - assign ports in *admission/database/dbconnection.php* if your running apache and mysql in different ports
