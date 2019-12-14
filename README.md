# Open Arms Food Bank
## Installation
### Windows 10
I. Installing XAMPP
1. Download and install [XAMPP](https://www.apachefriends.org/download.html) 64-bit for Windows.
2. Run the installer, and make sure the following options are selected:
a. Apache
b. MySQL
c. PHP
d. PHPMyAdmin
All other options can be deselected.
3. The installer should install to the c:\xampp directory.

II. Installing Git
1. Download and install the [Git command line](https://git-scm.com/) for Windows
2. Run the installer, and use the default options.
3. Download and install [Tortoise Git](https://tortoisegit.org/).
4. During the install, it will ask about an SSH client. Choose OpenSSH.
5. Other default options should be fine.

III. Set up an SSH key
(You can also use the git credential manager that comes installed with git, but this is recommended.)
1. Create an account at Github.
2. Follow [these instructions](https://help.github.com/en/github/authenticating-to-github/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent).

IV. Download the code
1. Under the C:\xampp folder, _delete_ the htdocs folder.
2. Copy the link to clone this repository.
3. Under the C:\xampp folder, right-click the folder and use Tortoise to *clone* this repository.
4. Once cloned, rename the folder to **htdocs** (the folder that Apache looks in for the website).

V. Set up the database
1. In the XAMPP control panel, make sure Apache and MySQL processes are started.
2. Open a web browser, and go to http://localhost/phpmyadmin.
3. Click the Import tab at the top, and browse to locate the schema file.
4. Select the database_structure.sql file under the htdocs folder in xampp.
5. Import the database with default options.

VI. Create the SQL user
1. Click the User Accounts tab at the top of the PHPMyAdmin panel.
2. Click "Add user account."
3. Set "openarms" as the username, "localhost" as the host name, and the password can be retrieved from the dbcon.php file.
4. Next to Global Privileges, click "check all."
5. Click Go to create the user.

Now you should be able to navigate to localhost in a browser to see the web client. If you restart the computer, you'll need to make sure the Apache and MySQL processes are started again.