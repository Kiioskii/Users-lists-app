-------------------------------------------------------------------------------------------
Name:            
                                    SZU

-------------------------------------------------------------------------------------------
Purpose:
            APLICATION FOR MANAGING USERS AND LISTS OF USERS

-------------------------------------------------------------------------------------------
Actions:
    ->CREATING NEW USERS        |   ->CREATING LISTS    
    ->EDITING USER DATA         |   ->EDITING LISTS DATA
    ->ADDING USERS TO lists     |   ->DELETING LISTS
    ->DELETING USERS            |   ->LIST VIEW
                                |   ->EDITING LISTS MEMBERS

-------------------------------------------------------------------------------------------
Structure:

./ ----> index.php
         php/ ---------------------->  config.php
         |                             pages/---------------------------------------------------------------->users.php
         |                             getData-----------------------------------> getUsersData.php           addUser.php
         |                             interaction/--------->deleteList.php        datUSersDataToList.php     addUserToList.php
         |                                                   deleteUser.php        getUsersOfList.php         editUser.php
         |                                                                         getLastAdded.php           lists.php
         |                                                                         getListsOfData.php         addList.php
         |                                                                         getSetOfLists.php          editList.php
         |                                                                                                    lookList.php
         |
          js/----------------------> startPage.js
         |                           Users/------------------------------------------->addUser.js
         |                           Lists/-----------------> getLists.js              addUserToList.js 
         |                                                     editList.js              editUser.js 
         |                                                     getUsersToList.js        getUSers.js  
         |                                                     lookList.js               
         |                                                               
         css/---------------------->addUserStyle.css
                                    headerStyle.css
                                    style.css
                                    userPageStyle.css

-------------------------------------------------------------------------------------------
Assumption:
    There are three main folders in the application structure, the name of each corresponds to the stored files.

    CSS FOLDER -> The folder in which the files responsible for giving the page the right look are located

    PHP FOLDER -> In this folder there are three subfolders responsible for:
                PAGES FOLDER        -> Contains individual page files. They are displayed to the user and constitute the framework of the application
                GETDATA FOLDER      -> The data from the files in this folder is passed to the files in the PAGES folder.
                                        Files in this folder are used to download data and display them appropriately, and then, using .JS files, they are transferred to files in the PAGES folder
                INTERACTIONS FOLDER -> Files in this folder are used to handle simple actions on lists or users
                config.php          -> A file containing data about the connection to the database

    JS FOLDER -> In this folder there are two subfolders in which there are respectively for users and lists, support files
                 interaction and queries between .php files from the GETDATA and PAGES subfolders.           

-------------------------------------------------------------------------------------------
Connections:
    index.php           <---->  startPage.js    <---->  getLastAdded.php
    users.php           <---->  getUsers.js     <---->  getUsersData.php    
    lists.php           <---->  getLists.js     <---->  getListsData.php
    addUser.php         <---->  addUser.js      
    addUserToList.php   <---->  addUserToList.js<---->  getSetOfLists.php
    addLists.php        <---->  getUsersToList.js<----> getUsersDataToList.php
    editList.php        <---->  editList.js      <----> getUsersDataToList.php
    editUser.php        <---->  editUser.js    
    lookList.php        <---->  lookList.js      <----> getUsersOfList.php

+ evry php file is conected to config.php
-------------------------------------------------------------------------------------------
Configuration:
    The config.php file contains database connection settings.
    Default settings:
    ------------------
    host -> localhost
    user -> root
    NO PASSWORD
    database-> users
    post -> 3308
    ------------------
-------------------------------------------------------------------------------------------
Database:
    The database was created with mySQL.
    name:users,
    Tables: 
        users--->(id,nick,password,name,surname,birthday) -->Users information is stored in the users table
        user_lists--->(id,list_name)                      -->The user-lists table contains information about the name of the lists and the unique ids assigned to them
        user_list_members--->(list_id,user_id)            -->The user_list_members table contains information about list ids and user ids on the basis of which it is possible to determine which user is assigned to which lists
-------------------------------------------------------------------------------------------
created by:
Maciej Kiowski 
email:maciekkij01@gmail.com
