MegaDL
======

MegaDL is a web interface for megatools.

Requirement :
============

You need to have a linux server, running php,mysql and apache.
php exec() function must be accepted to allow you to use correctly the service.
on your Linux server you need to install one packet megatools who can be here :
http://megatools.megous.com/



Install megaTools
=================

1. Build it from sources available at http://megatools.megous.com/
2. OR : On Debian : use the unstable repo to install megatools 
   * Add ```deb http://ftp.fr.debian.org/debian/ unstable non-free contrib main``` to /etc/apt/sources.list
   * Then ``` apt-get update``` 
   * Then ``` apt-get install megatools```
   
Prepare Project
===============

- In file ``` addMegaDL.php ``` change database connetion informations.
- In file ``` deleteMegaDL.php ``` change database connetion informations.
- In file ``` function.php ``` change database connetion informations.

Create a folder "share" in /home/. This directory will contain all the downloaded files ! 

1. mkdir /home/share/
2. chmod -R 777 /home/share/

Add the right to execute ```start.sh``` and ```testPid.sh```
```
chmod +x start.sh 
chmod +x testPid.sh
```


SQL
===

Here you can find sql code to create, tables that are needed for this project:
```

CREATE TABLE IF NOT EXISTS `list` (
`id` int(11) NOT NULL,
  `username` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `link` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `password`, `date`) VALUES
(1, 'Admin', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '2016-02-03 17:22:01');
ALTER TABLE `list`
ADD PRIMARY KEY (`id`);
ALTER TABLE `users`
ADD PRIMARY KEY (`id`);
```

First login
===========

Table users is initialised with user "Admin" and password "test", To create more user, just add them to the database manualy.
Note: password is crypted with SHA1.

